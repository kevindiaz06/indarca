@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page Title -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Gestión de Usuarios</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary me-2">
                <i class="bi bi-arrow-left-circle me-1"></i> Volver al Dashboard
            </a>
            <a href="{{ route('admin.usuarios.crear') }}" class="btn btn-primary">
                <i class="bi bi-person-plus me-1"></i> Nuevo Usuario
            </a>
        </div>
    </div>

    <!-- Filtros y búsqueda -->
    <div class="card shadow mb-4">
        <div class="card-body p-4">
            <form action="{{ route('admin.usuarios') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="search" class="form-label">Buscar</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" id="search" name="search" placeholder="Nombre o email..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="role" class="form-label">Rol</label>
                    <select class="form-select" id="role" name="role">
                        <option value="">Todos los roles</option>
                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Administradores</option>
                        <option value="trabajador" {{ request('role') == 'trabajador' ? 'selected' : '' }}>Trabajadores</option>
                        <option value="web" {{ request('role') == 'web' ? 'selected' : '' }}>Clientes</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="order" class="form-label">Ordenar por</label>
                    <select class="form-select" id="order" name="order">
                        <option value="newest" {{ request('order') == 'newest' ? 'selected' : '' }}>Más recientes</option>
                        <option value="oldest" {{ request('order') == 'oldest' ? 'selected' : '' }}>Más antiguos</option>
                        <option value="name" {{ request('order') == 'name' ? 'selected' : '' }}>Nombre (A-Z)</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-filter me-1"></i> Filtrar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Alertas -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tabla de Usuarios -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">Usuarios Registrados</h6>
            <span class="badge bg-primary">{{ count($usuarios) }} usuarios</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Fecha de Registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar me-3 bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <span class="text-white">{{ substr($usuario->name, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $usuario->name }}</h6>
                                        <small class="text-muted">
                                            @if($usuario->id == Auth::id())
                                            <span class="text-primary">(Tú)</span>
                                            @endif
                                        </small>
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
                                    <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
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
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <div class="py-5">
                                    <i class="bi bi-people fs-1 text-muted"></i>
                                    <p class="mt-3">No se encontraron usuarios con los filtros seleccionados.</p>
                                    <a href="{{ route('admin.usuarios') }}" class="btn btn-sm btn-outline-primary mt-2">Ver todos los usuarios</a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
