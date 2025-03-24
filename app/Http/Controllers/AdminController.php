<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Centro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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
     * Mostrar el dashboard principal del panel de administración
     */
    public function index()
    {
        // Estadísticas generales para el dashboard
        $totalUsuarios = User::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalTrabajadores = User::where('role', 'trabajador')->count();
        $totalClientes = User::where('role', 'web')->count();

        // Últimos usuarios registrados
        $ultimosUsuarios = User::orderBy('created_at', 'desc')->take(5)->get();

        // Distribución de usuarios por rol (para gráficos)
        $distribucionRoles = [
            'admin' => $totalAdmins,
            'trabajador' => $totalTrabajadores,
            'web' => $totalClientes
        ];

        return view('admin.dashboard', compact(
            'totalUsuarios',
            'totalAdmins',
            'totalTrabajadores',
            'totalClientes',
            'ultimosUsuarios',
            'distribucionRoles'
        ));
    }

    /**
     * Mostrar página de administración de usuarios
     */
    public function usuarios()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }
}
