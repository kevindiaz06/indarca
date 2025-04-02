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
            <div class="dropdown">
                <button class="btn btn-primary shadow-sm dropdown-toggle" type="button" id="reportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-download me-1"></i> Generar Reporte
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="reportDropdown">
                    <li><a class="dropdown-item" href="{{ route('admin.reportes.dashboard.pdf') }}"><i class="bi bi-file-pdf me-2"></i>Exportar PDF</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.reportes.usuarios.excel') }}"><i class="bi bi-file-excel me-2"></i>Exportar Usuarios (Excel)</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.reportes.empresas.excel') }}"><i class="bi bi-file-excel me-2"></i>Exportar Empresas (Excel)</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#" onclick="window.print()"><i class="bi bi-printer me-2"></i>Imprimir Página</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stats-card primary h-100 border-start border-primary border-4 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="text-muted mb-1">Total Usuarios</h5>
                            <h2 class="mb-0 fw-bold">{{ $totalUsuarios }}</h2>
                        </div>
                        <div class="icon primary rounded-circle p-3">
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
            <div class="card stats-card success h-100 border-start border-success border-4 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="text-muted mb-1">Administradores</h5>
                            <h2 class="mb-0 fw-bold">{{ $totalAdmins }}</h2>
                        </div>
                        <div class="icon success rounded-circle p-3">
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
            <div class="card stats-card warning h-100 border-start border-warning border-4 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="text-muted mb-1">Trabajadores</h5>
                            <h2 class="mb-0 fw-bold">{{ $totalTrabajadores }}</h2>
                        </div>
                        <div class="icon warning rounded-circle p-3">
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
            <div class="card stats-card danger h-100 border-start border-danger border-4 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="text-muted mb-1">Clientes</h5>
                            <h2 class="mb-0 fw-bold">{{ $totalClientes }}</h2>
                        </div>
                        <div class="icon danger rounded-circle p-3">
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

    <!-- Empresas Stats -->
    <div class="row mb-4">
        <div class="col-12 mb-4">
            <div class="card stats-card info h-100 border-start border-info border-4 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="text-muted mb-1">Total Empresas</h5>
                            <h2 class="mb-0 fw-bold">{{ $totalEmpresas }}</h2>
                        </div>
                        <div class="icon rounded-circle p-3" style="background-color: #3498DB;">
                            <i class="bi bi-building"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light py-2">
                    <small class="text-muted">
                        <i class="bi bi-arrow-up me-1 text-success"></i>
                        <span class="text-success">8%</span> desde el mes pasado
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    @if(Auth::user()->role !== 'trabajador')
    <div class="row mb-4">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Evolución de Usuarios</h6>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-light me-2" id="refreshActivityChartBtn">
                            <i class="bi bi-arrow-repeat"></i>
                        </button>
                        <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Este Año
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
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
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Distribución de Usuarios</h6>
                    <button class="btn btn-sm btn-light" id="refreshChartBtn">
                        <i class="bi bi-arrow-repeat"></i>
                    </button>
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
    @else
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body text-center py-5">
                    <i class="bi bi-lock-fill text-muted mb-3" style="font-size: 3rem;"></i>
                    <h5 class="mb-3">Acceso restringido a los gráficos</h5>
                    <p class="text-muted mb-0">Los usuarios con rol trabajador no tienen acceso a las visualizaciones de gráficos estadísticos.</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Latest Users and Companies -->
    <div class="row">
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Últimos Usuarios Registrados</h6>
                    <div>
                        <button class="btn btn-sm btn-light me-2" id="refreshUsersBtn">
                            <i class="bi bi-arrow-repeat"></i>
                        </button>
                        <a href="{{ route('admin.usuarios') }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-people me-1"></i> Ver Todos
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Usuario</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Fecha</th>
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
                                    <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
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

        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Últimas Empresas Registradas</h6>
                    <div>
                        <button class="btn btn-sm btn-light me-2" id="refreshCompaniesBtn">
                            <i class="bi bi-arrow-repeat"></i>
                        </button>
                        <a href="{{ route('admin.empresas') }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-building me-1"></i> Ver Todas
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Empresa</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ultimasEmpresas as $empresa)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-3 bg-info rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="bi bi-building text-white"></i>
                                            </div>
                                            <span class="fw-medium">{{ $empresa->nombre }}</span>
                                        </div>
                                    </td>
                                    <td>{{ Str::limit($empresa->direccion, 20) }}</td>
                                    <td>{{ $empresa->telefono }}</td>
                                    <td>{{ $empresa->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Acciones
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('admin.empresas.editar', $empresa->id) }}">
                                                        <i class="bi bi-pencil me-2"></i> Editar
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('admin.empresas.destroy', $empresa->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm('¿Estás seguro de eliminar esta empresa?')">
                                                            <i class="bi bi-trash me-2"></i> Eliminar
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-3">
                                        <p class="text-muted mb-0">No hay empresas registradas aún</p>
                                        <a href="{{ route('admin.empresas.crear') }}" class="btn btn-sm btn-primary mt-2">
                                            <i class="bi bi-building-add me-1"></i> Crear Empresa
                                        </a>
                                    </td>
                                </tr>
                                @endforelse
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
    @if(Auth::user()->role !== 'trabajador')
    // Datos para los gráficos
    const userDistributionData = {
        labels: ['Administradores', 'Trabajadores', 'Clientes'],
        datasets: [{
            data: [{{ $distribucionRoles['admin'] }}, {{ $distribucionRoles['trabajador'] }}, {{ $distribucionRoles['cliente'] }}],
            backgroundColor: ['#2C3E50', '#2ECC71', '#E74C3C'],
            hoverBackgroundColor: ['#1a252f', '#27ae60', '#c0392b'],
            borderWidth: 1,
            borderColor: '#fff'
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
            data: [
                {{ $usuariosPorMes[1] }},
                {{ $usuariosPorMes[2] }},
                {{ $usuariosPorMes[3] }},
                {{ $usuariosPorMes[4] }},
                {{ $usuariosPorMes[5] }},
                {{ $usuariosPorMes[6] }},
                {{ $usuariosPorMes[7] }},
                {{ $usuariosPorMes[8] }},
                {{ $usuariosPorMes[9] }},
                {{ $usuariosPorMes[10] }},
                {{ $usuariosPorMes[11] }},
                {{ $usuariosPorMes[12] }}
            ]
        }]
    };

    // Configuración del gráfico de pastel
    const configPie = {
        type: 'doughnut',
        data: userDistributionData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            let value = context.raw || 0;
                            let total = context.dataset.data.reduce((a, b) => a + b, 0);
                            let percentage = ((value * 100) / total).toFixed(1) + '%';
                            return `${label}: ${value} (${percentage})`;
                        }
                    }
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true
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
                },
                tooltip: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyColor: "#858796",
                    titleColor: "#6e707e",
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    caretPadding: 10,
                    displayColors: false
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            elements: {
                line: {
                    tension: 0.3
                }
            }
        }
    };

    // Renderizar los gráficos
    let pieChart, lineChart;

    document.addEventListener('DOMContentLoaded', function() {
        const ctxPie = document.getElementById('userDistributionChart').getContext('2d');
        pieChart = new Chart(ctxPie, configPie);

        const ctxLine = document.getElementById('userActivityChart').getContext('2d');
        lineChart = new Chart(ctxLine, configLine);

        // Botón para refrescar el gráfico de distribución
        document.getElementById('refreshChartBtn').addEventListener('click', function() {
            // Hacer una petición AJAX para obtener datos actualizados
            fetch('{{ route("admin.dashboard.refresh") }}')
                .then(response => response.json())
                .then(data => {
                    // Actualizar datos del gráfico de distribución
                    pieChart.data.datasets[0].data = [
                        data.distribucionRoles.admin,
                        data.distribucionRoles.trabajador,
                        data.distribucionRoles.cliente
                    ];
                    pieChart.update();

                    // Actualizar también el gráfico de actividad de usuarios
                    lineChart.data.datasets[0].data = [
                        data.usuariosPorMes[1],
                        data.usuariosPorMes[2],
                        data.usuariosPorMes[3],
                        data.usuariosPorMes[4],
                        data.usuariosPorMes[5],
                        data.usuariosPorMes[6],
                        data.usuariosPorMes[7],
                        data.usuariosPorMes[8],
                        data.usuariosPorMes[9],
                        data.usuariosPorMes[10],
                        data.usuariosPorMes[11],
                        data.usuariosPorMes[12]
                    ];
                    lineChart.update();

                    // Mostrar notificación
                    showToast('Gráficos actualizados correctamente');
                })
                .catch(error => {
                    console.error('Error al actualizar gráfico:', error);
                    showToast('Error al actualizar los gráficos', 'danger');
                });
        });

        // Botón para refrescar sólo el gráfico de actividad de usuarios
        document.getElementById('refreshActivityChartBtn').addEventListener('click', function() {
            // Hacer una petición AJAX para obtener datos actualizados
            fetch('{{ route("admin.dashboard.refresh") }}')
                .then(response => response.json())
                .then(data => {
                    // Actualizar el gráfico de actividad de usuarios
                    lineChart.data.datasets[0].data = [
                        data.usuariosPorMes[1],
                        data.usuariosPorMes[2],
                        data.usuariosPorMes[3],
                        data.usuariosPorMes[4],
                        data.usuariosPorMes[5],
                        data.usuariosPorMes[6],
                        data.usuariosPorMes[7],
                        data.usuariosPorMes[8],
                        data.usuariosPorMes[9],
                        data.usuariosPorMes[10],
                        data.usuariosPorMes[11],
                        data.usuariosPorMes[12]
                    ];
                    lineChart.update();

                    // Mostrar notificación
                    showToast('Gráfico de evolución actualizado correctamente');
                })
                .catch(error => {
                    console.error('Error al actualizar gráfico:', error);
                    showToast('Error al actualizar el gráfico de evolución', 'danger');
                });
        });
    });
    @endif

    // Inicializar tooltips
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });

    // Función para mostrar toast de notificación
    function showToast(message, type = 'success') {
        // Crear el toast si no existe
        if (!document.getElementById('liveToast')) {
            const toastContainer = document.createElement('div');
            toastContainer.className = 'toast-container position-fixed bottom-0 end-0 p-3';

            toastContainer.innerHTML = `
                <div id="liveToast" class="toast align-items-center text-white border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            ${message}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            `;

            document.body.appendChild(toastContainer);
        } else {
            document.querySelector('.toast-body').textContent = message;
        }

        const toastElement = document.getElementById('liveToast');

        // Eliminar clases bg- anteriores
        toastElement.classList.forEach(className => {
            if (className.startsWith('bg-')) {
                toastElement.classList.remove(className);
            }
        });

        // Agregar la clase según el tipo
        toastElement.classList.add(`bg-${type}`);

        const toast = new bootstrap.Toast(toastElement);
        toast.show();
    }
</script>
@endsection
