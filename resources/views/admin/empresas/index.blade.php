@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page Title -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Gestión de Empresas</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Empresas</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.empresas.crear') }}" class="btn btn-primary">
                <i class="bi bi-building-add me-1"></i> Nueva Empresa
            </a>
        </div>
    </div>

    <!-- Filtros y búsqueda -->
    <div class="card shadow mb-4">
        <div class="card-body p-4">
            <form action="{{ route('admin.empresas') }}" method="GET" class="row g-3">
                <div class="col-md-6">
                    <label for="search" class="form-label">Buscar</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" id="search" name="search" placeholder="Nombre, dirección o teléfono..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-4">
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

    <!-- Mensajes de éxito o error -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle me-1"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Tarjeta de Listado de Empresas -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">Listado de Empresas</h6>
            <span class="badge bg-primary">{{ count($empresas) }} empresas</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Fecha de Creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($empresas as $empresa)
                        <tr>
                            <td>{{ $empresa->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="icon-circle bg-primary text-white me-2">
                                        <i class="bi bi-building"></i>
                                    </div>
                                    <span class="fw-medium">{{ $empresa->nombre }}</span>
                                </div>
                            </td>
                            <td>{{ $empresa->direccion }}</td>
                            <td>{{ $empresa->telefono }}</td>
                            <td>{{ $empresa->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones de la empresa">
                                    <a href="{{ route('admin.empresas.editar', $empresa->id) }}" class="btn btn-sm btn-info me-1">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $empresa->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>

                                <!-- Modal para confirmar eliminación -->
                                <div class="modal fade" id="deleteModal{{ $empresa->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $empresa->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $empresa->id }}">Confirmar eliminación</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Estás seguro de que deseas eliminar la empresa <strong>{{ $empresa->nombre }}</strong>?
                                                <div class="alert alert-warning mt-3">
                                                    <i class="bi bi-exclamation-triangle me-1"></i> Esta acción no se puede deshacer.
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <form action="{{ route('admin.empresas.destroy', $empresa->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="d-flex flex-column align-items-center">
                                    <i class="bi bi-building-slash text-muted" style="font-size: 3rem;"></i>
                                    <h5 class="mt-3 text-muted">No hay empresas registradas</h5>
                                    @if(request('search'))
                                        <p class="text-muted">No se encontraron empresas con los filtros seleccionados</p>
                                        <a href="{{ route('admin.empresas') }}" class="btn btn-sm btn-outline-primary mt-2">
                                            <i class="bi bi-arrow-repeat me-1"></i> Ver todas las empresas
                                        </a>
                                    @else
                                        <p class="text-muted">Comienza creando una nueva empresa</p>
                                        <a href="{{ route('admin.empresas.crear') }}" class="btn btn-sm btn-primary mt-2">
                                            <i class="bi bi-building-add me-1"></i> Crear Empresa
                                        </a>
                                    @endif
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
