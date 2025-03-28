<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        // Obtener conteo de usuarios con rol 'web' (clientes)
        $totalClientes = User::where('role', 'cliente')->count();

        // Obtener conteo de trabajadores (suma de 'admin' y 'trabajador')
        $totalTrabajadores = User::whereIn('role', ['admin', 'trabajador'])->count();

        return view('inicio', compact('totalClientes', 'totalTrabajadores'));
    }
}
