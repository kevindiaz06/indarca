<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Centro;
use App\Models\Empresa;
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
        $totalClientes = User::where('role', 'cliente')->count();
        $totalEmpresas = Empresa::count();

        // Para la vista de inicio.blade.php - Total de trabajadores (admin + trabajador)
        $totalTrabajadoresPublic = $totalAdmins + $totalTrabajadores;

        // Últimos usuarios registrados
        $ultimosUsuarios = User::orderBy('created_at', 'desc')->take(5)->get();

        // Últimas empresas registradas
        $ultimasEmpresas = Empresa::orderBy('created_at', 'desc')->take(5)->get();

        // Inicializar variables para evitar errores
        $distribucionRoles = [];
        $usuariosPorMes = [];

        // Solo calcular datos de gráficos para administradores
        if (auth()->user()->role !== 'trabajador') {
            // Distribución de usuarios por rol (para gráficos)
            $distribucionRoles = [
                'admin' => $totalAdmins,
                'trabajador' => $totalTrabajadores,
                'cliente' => $totalClientes
            ];

            // Obtener evolución mensual de usuarios para el gráfico de línea
            $year = date('Y');

            for ($i = 1; $i <= 12; $i++) {
                $usuariosPorMes[$i] = User::whereYear('created_at', $year)
                    ->whereMonth('created_at', $i)
                    ->count();
            }
        }

        return view('admin.dashboard', compact(
            'totalUsuarios',
            'totalAdmins',
            'totalTrabajadores',
            'totalClientes',
            'totalEmpresas',
            'totalTrabajadoresPublic',
            'ultimosUsuarios',
            'ultimasEmpresas',
            'distribucionRoles',
            'usuariosPorMes'
        ));
    }

    /**
     * Mostrar página de administración de usuarios
     */
    public function usuarios(Request $request)
    {
        $query = User::query();

        // Filtrar por búsqueda (nombre o email)
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('email', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Filtrar por rol
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // Ordenar resultados
        if ($request->filled('order')) {
            switch ($request->order) {
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'name':
                    $query->orderBy('name', 'asc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $usuarios = $query->get();

        return view('admin.usuarios.index', compact('usuarios'));
    }

    /**
     * Mostrar página de administración de empresas
     */
    public function empresas(Request $request)
    {
        $query = Empresa::query();

        // Filtrar por búsqueda (nombre, dirección o teléfono)
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('nombre', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('direccion', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('telefono', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Ordenar resultados
        if ($request->filled('order')) {
            switch ($request->order) {
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'name':
                    $query->orderBy('nombre', 'asc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $empresas = $query->get();

        return view('admin.empresas.index', compact('empresas'));
    }

    /**
     * Actualizar los datos de los gráficos del dashboard vía AJAX
     */
    public function refreshDashboardData()
    {
        // Verificar que el usuario no sea trabajador
        if (auth()->user()->role === 'trabajador') {
            return response()->json([
                'error' => 'No tienes permiso para acceder a estos datos',
                'status' => 403
            ], 403);
        }

        // Obtener datos actualizados para los gráficos
        $totalAdmins = User::where('role', 'admin')->count();
        $totalTrabajadores = User::where('role', 'trabajador')->count();
        $totalClientes = User::where('role', 'cliente')->count();

        // Distribución de usuarios por rol
        $distribucionRoles = [
            'admin' => $totalAdmins,
            'trabajador' => $totalTrabajadores,
            'cliente' => $totalClientes
        ];

        // Evolución mensual de usuarios
        $year = date('Y');
        $usuariosPorMes = [];

        for ($i = 1; $i <= 12; $i++) {
            $usuariosPorMes[$i] = User::whereYear('created_at', $year)
                ->whereMonth('created_at', $i)
                ->count();
        }

        return response()->json([
            'distribucionRoles' => $distribucionRoles,
            'usuariosPorMes' => $usuariosPorMes
        ]);
    }
}
