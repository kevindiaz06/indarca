<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Densimetro;
use App\Exports\UsersExport;
use App\Exports\EmpresasExport;
use App\Exports\DensimetrosExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;

class ReportController extends Controller
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
     * Generar reporte de usuarios en PDF
     */
    public function generateUsersPDF(Request $request)
    {
        // Solo administradores pueden acceder a datos sensibles de usuarios
        if (auth()->user()->role === 'trabajador') {
            return redirect()->back()->with('error', 'No tienes permisos para generar este reporte');
        }

        $filters = $request->only(['search', 'role']);

        // Consulta base
        $query = User::query()->orderBy('created_at', 'desc');

        // Aplicar filtros si existen
        if (isset($filters['role']) && !empty($filters['role'])) {
            $query->where('role', $filters['role']);
        }

        if (isset($filters['search']) && !empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        $users = $query->get();

        $date = Carbon::now()->format('d-m-Y_H-i-s');
        $fileName = "usuarios_{$date}.pdf";

        $data = [
            'users' => $users,
            'title' => 'Reporte de Usuarios',
            'date' => Carbon::now()->format('d/m/Y H:i:s'),
            'filters' => $filters
        ];

        $pdf = PDF::loadView('reports.users_pdf', $data);

        return $pdf->download($fileName);
    }

    /**
     * Generar reporte de empresas en PDF
     */
    public function generateEmpresasPDF(Request $request)
    {
        $filters = $request->only(['search']);

        // Consulta base
        $query = Empresa::query()->orderBy('created_at', 'desc');

        // Aplicar filtros si existen
        if (isset($filters['search']) && !empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function($q) use ($search) {
                $q->where('nombre', 'LIKE', "%{$search}%")
                  ->orWhere('direccion', 'LIKE', "%{$search}%")
                  ->orWhere('telefono', 'LIKE', "%{$search}%");
            });
        }

        $empresas = $query->get();

        $date = Carbon::now()->format('d-m-Y_H-i-s');
        $fileName = "empresas_{$date}.pdf";

        $data = [
            'empresas' => $empresas,
            'title' => 'Reporte de Empresas',
            'date' => Carbon::now()->format('d/m/Y H:i:s'),
            'filters' => $filters
        ];

        $pdf = PDF::loadView('reports.empresas_pdf', $data);

        return $pdf->download($fileName);
    }

    /**
     * Generar reporte de usuarios en Excel
     */
    public function generateUsersExcel(Request $request)
    {
        // Solo administradores pueden acceder a datos sensibles de usuarios
        if (auth()->user()->role === 'trabajador') {
            return redirect()->back()->with('error', 'No tienes permisos para generar este reporte');
        }

        $filters = $request->only(['search', 'role']);
        $date = Carbon::now()->format('d-m-Y_H-i-s');
        $fileName = "usuarios_{$date}.xlsx";

        return Excel::download(new UsersExport($filters), $fileName);
    }

    /**
     * Generar reporte de empresas en Excel
     */
    public function generateEmpresasExcel(Request $request)
    {
        $filters = $request->only(['search']);
        $date = Carbon::now()->format('d-m-Y_H-i-s');
        $fileName = "empresas_{$date}.xlsx";

        return Excel::download(new EmpresasExport($filters), $fileName);
    }

    /**
     * Generar reporte del dashboard en PDF
     */
    public function generateDashboardPDF()
    {
        $totalUsuarios = User::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalTrabajadores = User::where('role', 'trabajador')->count();
        $totalClientes = User::where('role', 'cliente')->count();
        $totalEmpresas = Empresa::count();

        $ultimosUsuarios = User::orderBy('created_at', 'desc')->take(5)->get();
        $ultimasEmpresas = Empresa::orderBy('created_at', 'desc')->take(5)->get();

        $date = Carbon::now()->format('d-m-Y_H-i-s');
        $fileName = "dashboard_{$date}.pdf";

        $data = [
            'totalUsuarios' => $totalUsuarios,
            'totalAdmins' => $totalAdmins,
            'totalTrabajadores' => $totalTrabajadores,
            'totalClientes' => $totalClientes,
            'totalEmpresas' => $totalEmpresas,
            'ultimosUsuarios' => $ultimosUsuarios,
            'ultimasEmpresas' => $ultimasEmpresas,
            'title' => 'Reporte del Dashboard',
            'date' => Carbon::now()->format('d/m/Y H:i:s')
        ];

        $pdf = PDF::loadView('reports.dashboard_pdf', $data);

        return $pdf->download($fileName);
    }

    /**
     * Generar reporte de densímetros en PDF
     */
    public function generateDensimetrosPDF(Request $request)
    {
        // Solo administradores pueden acceder a este reporte
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'No tienes permisos para generar este reporte');
        }

        $filters = $request->only(['search', 'estado', 'cliente_id']);

        // Consulta base
        $query = Densimetro::with('cliente')->orderBy('created_at', 'desc');

        // Aplicar filtros si existen
        if (isset($filters['estado']) && !empty($filters['estado'])) {
            $query->where('estado', $filters['estado']);
        }

        if (isset($filters['cliente_id']) && !empty($filters['cliente_id'])) {
            $query->where('cliente_id', $filters['cliente_id']);
        }

        if (isset($filters['search']) && !empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function($q) use ($search) {
                $q->where('numero_serie', 'LIKE', "%{$search}%")
                  ->orWhere('marca', 'LIKE', "%{$search}%")
                  ->orWhere('modelo', 'LIKE', "%{$search}%")
                  ->orWhere('referencia_reparacion', 'LIKE', "%{$search}%");
            });
        }

        $densimetros = $query->get();

        // Estadísticas
        $totalDensimetros = $densimetros->count();
        $totalRecibidos = $densimetros->where('estado', 'recibido')->count();
        $totalEnReparacion = $densimetros->where('estado', 'en_reparacion')->count();
        $totalFinalizados = $densimetros->where('estado', 'finalizado')->count();
        $totalEntregados = $densimetros->where('estado', 'entregado')->count();

        $date = Carbon::now()->format('d-m-Y_H-i-s');
        $fileName = "densimetros_{$date}.pdf";

        $data = [
            'densimetros' => $densimetros,
            'totalDensimetros' => $totalDensimetros,
            'totalRecibidos' => $totalRecibidos,
            'totalEnReparacion' => $totalEnReparacion,
            'totalFinalizados' => $totalFinalizados,
            'totalEntregados' => $totalEntregados,
            'title' => 'Reporte de Densímetros',
            'date' => Carbon::now()->format('d/m/Y H:i:s'),
            'filters' => $filters
        ];

        $pdf = PDF::loadView('reports.densimetros_pdf', $data);

        return $pdf->download($fileName);
    }

    /**
     * Generar reporte de densímetros en Excel
     */
    public function generateDensimetrosExcel(Request $request)
    {
        // Solo administradores pueden acceder a este reporte
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'No tienes permisos para generar este reporte');
        }

        $filters = $request->only(['search', 'estado', 'cliente_id']);
        $date = Carbon::now()->format('d-m-Y_H-i-s');
        $fileName = "densimetros_{$date}.xlsx";

        return Excel::download(new DensimetrosExport($filters), $fileName);
    }
}
