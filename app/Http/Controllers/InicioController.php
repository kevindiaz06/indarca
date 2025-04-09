<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Empresa;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        // Obtener conteo de usuarios con rol 'web' (clientes)
        $totalClientes = User::where('role', 'cliente')->count();

        // Obtener conteo de trabajadores (suma de 'admin' y 'trabajador')
        $totalTrabajadores = User::whereIn('role', ['admin', 'trabajador'])->count();

        // Obtener todas las empresas ordenadas primero por destacado y luego por fecha de creación
        $empresas = Empresa::orderBy('destacado', 'desc')
                          ->orderBy('created_at', 'desc')
                          ->get();

        return view('inicio', compact('totalClientes', 'totalTrabajadores', 'empresas'));
    }
}
