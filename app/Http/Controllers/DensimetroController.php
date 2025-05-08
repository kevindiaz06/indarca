<?php

namespace App\Http\Controllers;

use App\Http\Requests\DensimetroStoreRequest;
use App\Http\Requests\DensimetroUpdateRequest;
use App\Models\Densimetro;
use App\Models\User;
use App\Repositories\DensimetroRepository;
use App\Services\DensimetroService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Mail\DensimetroCambioEstadoMail;
use App\Mail\DensimetroRecepcionMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;

class DensimetroController extends Controller
{
    protected DensimetroRepository $repository;
    protected DensimetroService $service;

    /**
     * Constructor para aplicar middleware de autenticación y roles
     *
     * @param DensimetroRepository $repository
     * @param DensimetroService $service
     */
    public function __construct(DensimetroRepository $repository, DensimetroService $service)
    {
        $this->middleware('auth');
        $this->middleware('role:admin,trabajador');
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $this->authorize('viewAny', Densimetro::class);

        $densimetros = $this->repository->getAll(10);
        return view('admin.densimetros.index', compact('densimetros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $this->authorize('create', Densimetro::class);

        $clientes = User::where('role', 'cliente')->orderBy('name')->get();
        return view('admin.densimetros.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DensimetroStoreRequest $request
     * @return RedirectResponse
     */
    public function store(DensimetroStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Densimetro::class);

        try {
            $data = $request->validated();
            $cliente = User::findOrFail($data['cliente_id']);

            $this->service->registrarNuevo($data, $cliente);

            return redirect()->route('admin.densimetros.index')
                ->with('success', 'Densímetro registrado correctamente. Se ha enviado un correo al cliente con la referencia de reparación.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $densimetro = $this->repository->findById($id);
        $this->authorize('view', $densimetro);

        return view('admin.densimetros.show', compact('densimetro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $densimetro = $this->repository->findById($id);
        $this->authorize('update', $densimetro);

        $clientes = User::where('role', 'cliente')->orderBy('name')->get();
        return view('admin.densimetros.edit', compact('densimetro', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DensimetroUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(DensimetroUpdateRequest $request, int $id): RedirectResponse
    {
        $densimetro = $this->repository->findById($id);
        $this->authorize('update', $densimetro);

        try {
            $data = $request->validated();
            $this->service->actualizar($id, $data);

            return redirect()->route('admin.densimetros.index')
                ->with('success', 'Densímetro actualizado correctamente.');
        } catch (\Exception $e) {
            $message = $e->getMessage();

            // Verificar si es la excepción específica de estado "entregado"
            if (str_contains($message, 'No se pueden modificar densímetros en estado "Entregado"')) {
                return redirect()->route('admin.densimetros.index')
                    ->with('error', $message);
            }

            // Verificar si es un error relacionado con la calibración
            if (str_contains($message, 'calibra')) {
                return redirect()->back()
                    ->withErrors(['calibrado' => $message])
                    ->withInput();
            }

            return redirect()->back()
                ->withErrors(['error' => $message])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $densimetro = $this->repository->findById($id);
        $this->authorize('delete', $densimetro);

        try {
            $this->service->eliminar($id);
            return redirect()->route('admin.densimetros.index')
                ->with('success', 'Densímetro eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Generar PDF con los detalles del densímetro
     *
     * @param int $id
     * @return mixed
     */
    public function generatePDF(int $id)
    {
        $densimetro = $this->repository->findById($id);
        $this->authorize('generatePDF', $densimetro);

        try {
            $result = $this->service->generarPDF($id);
            return $result['pdf']->download($result['fileName']);
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Error al generar el PDF: ' . $e->getMessage()]);
        }
    }

    /**
     * Envía correo electrónico al cliente con la referencia de reparación.
     *
     * @param  \App\Models\User  $cliente
     * @param  \App\Models\Densimetro  $densimetro
     * @return void
     */
    private function enviarCorreoRecepcion($cliente, $densimetro)
    {
        // Verificar si el cliente existe
        if (!$cliente) {
            \Log::warning('No se puede enviar correo de recepción para el densímetro ID: ' . $densimetro->id . ' porque el cliente no existe');
            return;
        }

        // Registra la información del correo en el log
        \Log::info('Correo de recepción enviado a ' . $cliente->email . ' con referencia ' . $densimetro->referencia_reparacion);

        // Envío del correo electrónico al cliente usando la clase Mailable
        Mail::to($cliente->email)
            ->send(new DensimetroRecepcionMail($cliente, $densimetro));
    }

    /**
     * Envía correo electrónico al cliente notificando el cambio de estado.
     *
     * @param  \App\Models\Densimetro  $densimetro
     * @return void
     */
    private function enviarCorreoCambioEstado($densimetro)
    {
        $cliente = $densimetro->cliente;

        // Verificar si el cliente existe antes de intentar enviar el correo
        if (!$cliente) {
            \Log::warning('No se puede enviar correo de cambio de estado para el densímetro ID: ' . $densimetro->id . ' porque el cliente no existe');
            return;
        }

        // Registra la información del correo en el log
        \Log::info('Correo de cambio de estado enviado a ' . $cliente->email . ' - Nuevo estado: ' . $densimetro->estado);

        // Envío del correo electrónico al cliente usando la clase Mailable
        Mail::to($cliente->email)
            ->send(new DensimetroCambioEstadoMail($cliente, $densimetro, now()->format('d/m/Y')));
    }
}
