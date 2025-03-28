<?php

namespace App\Http\Controllers;

use App\Mail\DensimetroCambioEstadoMail;
use App\Mail\DensimetroRecepcionMail;
use App\Models\Densimetro;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DensimetroController extends Controller
{
    /**
     * Constructor para aplicar middleware de autenticación y roles
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,trabajador');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $densimetros = Densimetro::with('cliente')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.densimetros.index', compact('densimetros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Obtener sólo usuarios tipo cliente
        $clientes = User::where('role', 'cliente')->orderBy('name')->get();
        return view('admin.densimetros.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar la solicitud
        $validator = Validator::make($request->all(), [
            'cliente_id' => 'required|exists:users,id',
            'numero_serie' => 'required|string|max:50',
            'marca' => 'nullable|string|max:50',
            'modelo' => 'nullable|string|max:50',
            'observaciones' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        // Verificar si el densímetro ya está en reparación
        if (Densimetro::where('numero_serie', $request->numero_serie)
                      ->whereNull('fecha_finalizacion')
                      ->exists()) {
            return redirect()->back()
                ->withErrors(['numero_serie' => 'Este densímetro ya está en proceso de reparación y no puede registrarse nuevamente hasta que finalice.'])
                ->withInput();
        }

        // Generar una referencia única para la reparación
        $referencia = Densimetro::generarReferencia();

        // Crear el nuevo registro de densímetro
        $densimetro = new Densimetro([
            'cliente_id' => $request->cliente_id,
            'numero_serie' => $request->numero_serie,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'fecha_entrada' => now()->toDateString(),
            'referencia_reparacion' => $referencia,
            'estado' => 'recibido',
            'observaciones' => $request->observaciones,
        ]);

        // Si el estado inicial es finalizado o entregado, registrar la fecha de finalización
        if ($request->has('estado') && ($request->estado == 'finalizado' || $request->estado == 'entregado')) {
            $densimetro->estado = $request->estado;
            $densimetro->fecha_finalizacion = now()->toDateString();
        }

        $densimetro->save();

        // Obtener el cliente/usuario para enviar el correo
        $cliente = User::findOrFail($request->cliente_id);

        // Enviar correo electrónico al cliente
        $this->enviarCorreoRecepcion($cliente, $densimetro);

        return redirect()->route('admin.densimetros.index')
                        ->with('success', 'Densímetro registrado correctamente. Se ha enviado un correo al cliente con la referencia de reparación.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $densimetro = Densimetro::with('cliente')->findOrFail($id);
        return view('admin.densimetros.show', compact('densimetro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $densimetro = Densimetro::findOrFail($id);
        $clientes = User::where('role', 'cliente')->orderBy('name')->get();
        return view('admin.densimetros.edit', compact('densimetro', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validar la solicitud
        $validator = Validator::make($request->all(), [
            'cliente_id' => 'required|exists:users,id',
            'numero_serie' => 'required|string|max:50',
            'marca' => 'nullable|string|max:50',
            'modelo' => 'nullable|string|max:50',
            'estado' => 'required|string|in:recibido,en_reparacion,finalizado,entregado',
            'observaciones' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        // Actualizar el densímetro
        $densimetro = Densimetro::findOrFail($id);

        // Verificar si está cambiando el número de serie y si el nuevo ya está en reparación
        if ($request->numero_serie !== $densimetro->numero_serie &&
            Densimetro::where('numero_serie', $request->numero_serie)
                      ->whereNull('fecha_finalizacion')
                      ->exists()) {
            return redirect()->back()
                ->withErrors(['numero_serie' => 'Este densímetro ya está en proceso de reparación y no puede registrarse nuevamente hasta que finalice.'])
                ->withInput();
        }

        // Guardar el estado anterior para verificar si cambió
        $estadoAnterior = $densimetro->estado;

        $densimetro->cliente_id = $request->cliente_id;
        $densimetro->numero_serie = $request->numero_serie;
        $densimetro->marca = $request->marca;
        $densimetro->modelo = $request->modelo;
        $densimetro->estado = $request->estado;
        $densimetro->observaciones = $request->observaciones;

        // Si el estado cambia a finalizado o entregado, registrar la fecha de finalización si no existe
        if (($request->estado == 'finalizado' || $request->estado == 'entregado') && !$densimetro->fecha_finalizacion) {
            $densimetro->fecha_finalizacion = now()->toDateString();
        }
        // Si el estado cambia desde finalizado o entregado a otro estado (que no sea finalizado ni entregado), anular la fecha de finalización
        elseif (($estadoAnterior == 'finalizado' || $estadoAnterior == 'entregado') &&
                ($request->estado != 'finalizado' && $request->estado != 'entregado')) {
            $densimetro->fecha_finalizacion = null;
        }

        $densimetro->save();

        // Si cambió el estado, notificar al cliente
        if ($estadoAnterior != $request->estado) {
            $this->enviarCorreoCambioEstado($densimetro);
        }

        return redirect()->route('admin.densimetros.index')
                        ->with('success', 'Densímetro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $densimetro = Densimetro::findOrFail($id);

        // Se elimina el densímetro normalmente
        // Ahora, si el cliente es eliminado, el densímetro permanecerá en la base de datos
        // debido a la modificación de la relación onDelete('set null') en la migración
        $densimetro->delete();

        return redirect()->route('admin.densimetros.index')
                        ->with('success', 'Densímetro eliminado correctamente.');
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
            ->send(new DensimetroCambioEstadoMail($densimetro));
    }
}
