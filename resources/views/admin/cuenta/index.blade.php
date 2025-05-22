@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Título y descripción de la página -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="bi bi-person-workspace me-2"></i>{{ Auth::user()->role === 'admin' ? 'Panel de Administración' : 'Panel de Trabajador' }}
        </h1>
        <a href="{{ route('profile.edit') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="bi bi-pencil-square me-1"></i> Editar mi perfil
        </a>
    </div>

    <!-- Resumen de estadísticas -->
    <div class="row mb-4">
        @if(Auth::user()->role === 'admin')
            <!-- Estadísticas para administradores -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Densímetros Totales</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['densimetros_totales'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-tools fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Usuarios Administrados</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['usuarios_administrados'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-people fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Empresas Registradas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['empresas_registradas'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-building fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Densímetros Activos</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['densimetros_activos'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-clock-history fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Estadísticas para trabajadores -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Densímetros Asignados</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['densimetros_asignados'] ?? 0 }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-tools fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Densímetros Completados</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['densimetros_completados'] ?? 0 }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-check-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Densímetros Pendientes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['densimetros_pendientes'] ?? 0 }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-exclamation-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Sección de Acceso Rápido -->
    <div class="row mb-4">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Acceso Rápido</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('admin.usuarios') }}" class="btn btn-primary btn-block d-flex align-items-center justify-content-center py-3">
                                <i class="bi bi-people me-2"></i>
                                <span>Gestionar Usuarios</span>
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('admin.empresas') }}" class="btn btn-success btn-block d-flex align-items-center justify-content-center py-3">
                                <i class="bi bi-building me-2"></i>
                                <span>Gestionar Empresas</span>
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('admin.densimetros.index') }}" class="btn btn-info btn-block d-flex align-items-center justify-content-center py-3 text-white">
                                <i class="bi bi-tools me-2"></i>
                                <span>Gestionar Densímetros</span>
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('profile.edit') }}" class="btn btn-warning btn-block d-flex align-items-center justify-content-center py-3">
                                <i class="bi bi-person-fill me-2"></i>
                                <span>Editar Mi Perfil</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Información de la Cuenta -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Información de la Cuenta</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar bg-primary rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 64px; height: 64px;">
                                <span class="text-white fs-4">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <div>
                                <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                                <p class="mb-0 text-muted">{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <p class="mb-0"><strong>Rol: </strong>
                                    @if(Auth::user()->role === 'admin')
                                        <span class="badge bg-primary">Administrador</span>
                                    @elseif(Auth::user()->role === 'trabajador')
                                        <span class="badge bg-success">Trabajador</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6 mb-2">
                                <p class="mb-0"><strong>Fecha de registro: </strong>
                                    <span>{{ Auth::user()->created_at->format('d/m/Y') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actividad Reciente -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Actividad Reciente</h6>
                </div>
                <div class="card-body">
                    @if($densimetrosRecientes->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Referencia</th>
                                        <th>N° Serie</th>
                                        <th>Estado</th>
                                        <th>Última Actualización</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($densimetrosRecientes as $densimetro)
                                    <tr>
                                        <td>
                                            <span class="badge bg-primary">{{ $densimetro->referencia_reparacion }}</span>
                                        </td>
                                        <td>{{ $densimetro->numero_serie }}</td>
                                        <td>
                                            @if($densimetro->estado == 'recibido')
                                                <span class="badge bg-info">Recibido</span>
                                            @elseif($densimetro->estado == 'en_reparacion')
                                                <span class="badge bg-warning">En Reparación</span>
                                            @elseif($densimetro->estado == 'finalizado')
                                                <span class="badge bg-success">Finalizado</span>
                                            @elseif($densimetro->estado == 'entregado')
                                                <span class="badge bg-secondary">Entregado</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $densimetro->estado }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $densimetro->updated_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.densimetros.show', $densimetro->id) }}" class="btn btn-sm btn-info text-white">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info mb-0">
                            <i class="bi bi-info-circle me-2"></i>
                            No hay actividad reciente para mostrar.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
