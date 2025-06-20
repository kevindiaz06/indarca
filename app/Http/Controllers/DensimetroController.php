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
use App\Mail\DensimetroCorreoPersonalizadoMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
    public function index(Request $request): View
    {
        $this->authorize('viewAny', Densimetro::class);

        // Obtener parámetros de paginación
        $perPage = $request->get('per_page', 15); // Por defecto 15 elementos por página
        $perPage = in_array($perPage, [10, 15, 25, 50, 100]) ? $perPage : 15; // Validar valores permitidos

        // Consulta optimizada con eager loading y índices
        $densimetros = Densimetro::with(['cliente:id,name,email'])
            ->select([
                'id', 'cliente_id', 'numero_serie', 'marca', 'modelo',
                'fecha_entrada', 'fecha_finalizacion', 'referencia_reparacion',
                'estado', 'calibrado', 'fecha_proxima_calibracion', 'created_at'
            ])
            ->orderByDesc('created_at') // Usar orderByDesc para mejor performance
            ->paginate($perPage);

        // Mantener parámetros de consulta en la paginación
        $densimetros->appends($request->query());

        // Datos adicionales para la vista
        $totalRegistros = $densimetros->total();
        $estadisticas = [
            'total' => $totalRegistros,
            'paginas' => $densimetros->lastPage(),
            'actual' => $densimetros->currentPage()
        ];

        return view('admin.densimetros.index', compact('densimetros', 'perPage', 'estadisticas'));
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

    /**
     * Envía correo personalizado al cliente.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enviarCorreoPersonalizado(Request $request, int $id)
    {
        $densimetro = $this->repository->findById($id);
        $this->authorize('view', $densimetro);

        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'asunto' => 'required|string|max:255',
            'mensaje' => 'required|string|max:2000',
        ], [
            'asunto.required' => 'El asunto es obligatorio.',
            'asunto.max' => 'El asunto no puede exceder los 255 caracteres.',
            'mensaje.required' => 'El mensaje es obligatorio.',
            'mensaje.max' => 'El mensaje no puede exceder los 2000 caracteres.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $cliente = $densimetro->cliente;

        // Verificar si el cliente existe
        if (!$cliente) {
            return redirect()->back()
                ->withErrors(['error' => 'No se puede enviar el correo porque el densímetro no tiene un cliente asociado.']);
        }

        try {
            $asunto = $request->input('asunto');
            $mensaje = $request->input('mensaje');
            $remitente = Auth::user()->name;

            // Enviar el correo personalizado
            Mail::to($cliente->email)
                ->send(new DensimetroCorreoPersonalizadoMail($cliente, $densimetro, $asunto, $mensaje, $remitente));

            // Registrar en el log
            \Log::info('Correo personalizado enviado a ' . $cliente->email . ' por ' . $remitente . ' - Asunto: ' . $asunto);

            return redirect()->back()
                ->with('success', 'Correo enviado correctamente a ' . $cliente->email);

        } catch (\Exception $e) {
            \Log::error('Error al enviar correo personalizado: ' . $e->getMessage());

            return redirect()->back()
                ->withErrors(['error' => 'Error al enviar el correo: ' . $e->getMessage()]);
        }
    }
}
