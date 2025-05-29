<?php

namespace App\Http\Controllers;

use App\Models\Densimetro;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:cliente');
    }

    /**
     * Muestra el historial de incidencias asociadas al correo del usuario.
     *
     * @return \Illuminate\View\View
     */
    public function historialIncidencias()
    {
        $user = auth()->user();
        $email = $user->email;

        // Buscar densímetros asociados al correo del usuario (sin archivos)
        $densimetros = Densimetro::with('cliente')
            ->whereHas('cliente', function($query) use ($email) {
                $query->where('email', $email);
            })
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('usuarios.historial-incidencias', compact('densimetros'));
    }

    /**
     * Muestra el historial general del cliente.
     *
     * @return \Illuminate\View\View
     */
    public function historial()
    {
        $user = auth()->user();
        $email = $user->email;

        // Buscar densímetros asociados al correo del usuario (sin archivos)
        $densimetros = Densimetro::with('cliente')
            ->whereHas('cliente', function($query) use ($email) {
                $query->where('email', $email);
            })
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('usuarios.historial', compact('densimetros'));
    }
}
