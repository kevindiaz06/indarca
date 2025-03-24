@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page Title -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex">
            <a href="{{ route('inicio') }}" class="btn btn-outline-secondary me-2">
                <i class="bi bi-house-door me-1"></i> Volver al Sitio Web
            </a>
            <a href="#" class="btn btn-primary shadow-sm">
                <i class="bi bi-download me-1"></i> Generar Reporte
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="text-muted mb-1">Total Usuarios</h5>
                            <h2 class="mb-0 fw-bold">{{ $totalUsuarios }}</h2>
                        </div>
                        <div class="icon primary">
                            <i class="bi bi-people"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light py-2">
                    <small class="text-muted">
                        <i class="bi bi-arrow-up me-1 text-success"></i>
                        <span class="text-success">16%</span> desde el mes pasado
                    </small>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="text-muted mb-1">Administradores</h5>
                            <h2 class="mb-0 fw-bold">{{ $totalAdmins }}</h2>
                        </div>
                        <div class="icon success">
                            <i class="bi bi-person-badge"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light py-2">
                    <small class="text-muted">
                        <i class="bi bi-arrow-up me-1 text-success"></i>
                        <span class="text-success">4%</span> desde el mes pasado
                    </small>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card warning h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="text-muted mb-1">Trabajadores</h5>
                            <h2 class="mb-0 fw-bold">{{ $totalTrabajadores }}</h2>
                        </div>
                        <div class="icon warning">
                            <i class="bi bi-person-workspace"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light py-2">
                    <small class="text-muted">
                        <i class="bi bi-arrow-down me-1 text-danger"></i>
                        <span class="text-danger">2%</span> desde el mes pasado
                    </small>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card danger h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="text-muted mb-1">Clientes</h5>
                            <h2 class="mb-0 fw-bold">{{ $totalClientes }}</h2>
                        </div>
                        <div class="icon danger">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light py-2">
                    <small class="text-muted">
                        <i class="bi bi-arrow-up me-1 text-success"></i>
                        <span class="text-success">12%</span> desde el mes pasado
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row mb-4">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Evolución de Usuarios</h6>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Este Año
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Último Mes</a></li>
                            <li><a class="dropdown-item" href="#">Últimos 6 Meses</a></li>
                            <li><a class="dropdown-item" href="#">Este Año</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="userActivityChart" style="height: 300px; width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Distribución de Usuarios</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie mb-3">
                        <canvas id="userDistributionChart" style="height: 300px; width: 100%;"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="me-2">
                            <i class="bi bi-circle-fill text-primary"></i> Administradores
                        </span>
                        <span class="me-2">
                            <i class="bi bi-circle-fill text-success"></i> Trabajadores
                        </span>
                        <span class="me-2">
                            <i class="bi bi-circle-fill text-danger"></i> Clientes
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Users -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Últimos Usuarios Registrados</h6>
                    <a href="{{ route('admin.usuarios') }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-people me-1"></i> Ver Todos
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Usuario</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Fecha de Registro</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ultimosUsuarios as $usuario)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-3 bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <span class="text-white">{{ substr($usuario->name, 0, 1) }}</span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $usuario->name }}</h6>
                                                @if($usuario->id == Auth::id())
                                                <small class="text-primary">(Tú)</small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        @if($usuario->role === 'admin')
                                            <span class="badge bg-danger">Administrador</span>
                                        @elseif($usuario->role === 'trabajador')
                                            <span class="badge bg-primary">Trabajador</span>
                                        @else
                                            <span class="badge bg-secondary">Cliente</span>
                                        @endif
                                    </td>
                                    <td>{{ $usuario->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Acciones
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                @if(!(Auth::user()->role === 'trabajador' && $usuario->role === 'admin') && !(Auth::user()->role === 'trabajador' && $usuario->role === 'trabajador' && $usuario->id !== Auth::id()))
                                                <li><a class="dropdown-item" href="{{ route('admin.usuarios.editar', $usuario->id) }}">
                                                    <i class="bi bi-pencil me-2"></i> Editar
                                                </a></li>
                                                @endif
                                                @if($usuario->id != Auth::id())
                                                    @if(!(Auth::user()->role === 'trabajador' && $usuario->role === 'admin'))
                                                        @if(!(Auth::user()->role === 'trabajador' && $usuario->role === 'trabajador'))
                                                        <li>
                                                            <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item text-danger" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                                                    <i class="bi bi-trash me-2"></i> Eliminar
                                                                </button>
                                                            </form>
                                                        </li>
                                                        @endif
                                                    @endif
                                                @endif
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Datos para los gráficos
    const userDistributionData = {
        labels: ['Administradores', 'Trabajadores', 'Clientes'],
        datasets: [{
            data: [{{ $distribucionRoles['admin'] }}, {{ $distribucionRoles['trabajador'] }}, {{ $distribucionRoles['web'] }}],
            backgroundColor: ['#2C3E50', '#2ECC71', '#E74C3C'],
            hoverBackgroundColor: ['#1a252f', '#27ae60', '#c0392b'],
        }]
    };

    const userActivityData = {
        labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        datasets: [{
            label: "Usuarios",
            lineTension: 0.3,
            backgroundColor: "rgba(52, 152, 219, 0.05)",
            borderColor: "rgba(52, 152, 219, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(52, 152, 219, 1)",
            pointBorderColor: "rgba(52, 152, 219, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(52, 152, 219, 1)",
            pointHoverBorderColor: "rgba(52, 152, 219, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [5, 8, 12, 15, 20, 25, 30, 35, 38, 42, 47, {{ $totalUsuarios }}]
        }]
    };

    // Configuración del gráfico de pastel
    const configPie = {
        type: 'doughnut',
        data: userDistributionData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '60%',
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    };

    // Configuración del gráfico de línea
    const configLine = {
        type: 'line',
        data: userActivityData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    }
                },
                y: {
                    ticks: {
                        beginAtZero: true
                    },
                    grid: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    };

    // Renderizar los gráficos
    document.addEventListener('DOMContentLoaded', function() {
        const ctxPie = document.getElementById('userDistributionChart').getContext('2d');
        new Chart(ctxPie, configPie);

        const ctxLine = document.getElementById('userActivityChart').getContext('2d');
        new Chart(ctxLine, configLine);
    });
</script>
@endsection
