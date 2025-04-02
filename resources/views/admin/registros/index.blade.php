@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Gestión de Registros de Incidencias</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registros</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('admin.registros.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Nueva Incidencia
        </a>
    </div>

    <!-- Alertas -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Listado de Registros -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold">Listado de Incidencias</h6>
            <span class="badge bg-primary">Total: {{ $registros->total() }}</span>
        </div>
        <div class="card-body">
            @if($registros->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Referencia</th>
                                <th>Número Serie</th>
                                <th>Marca/Modelo</th>
                                <th>Cliente</th>
                                <th>Entrada</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registros as $registro)
                                <tr>
                                    <td><span class="badge bg-primary">{{ $registro->referencia_reparacion }}</span></td>
                                    <td>{{ $registro->densimetro->numero_serie }}</td>
                                    <td>
                                        {{ $registro->densimetro->marca ?: 'No especificada' }}
                                        <small class="d-block text-muted">{{ $registro->densimetro->modelo ?: 'No especificado' }}</small>
                                    </td>
                                    <td>
                                        @if($registro->cliente)
                                            {{ $registro->cliente->name }}
                                            <small class="d-block text-muted">{{ $registro->cliente->email }}</small>
                                        @else
                                            <span class="text-muted">Cliente no disponible</span>
                                        @endif
                                    </td>
                                    <td>{{ $registro->fecha_entrada->format('d/m/Y') }}</td>
                                    <td>
                                        @if($registro->estado == 'recibido')
                                            <span class="badge bg-info">Recibido</span>
                                        @elseif($registro->estado == 'en_reparacion')
                                            <span class="badge bg-warning">En reparación</span>
                                        @elseif($registro->estado == 'finalizado')
                                            <span class="badge bg-success">Finalizado</span>
                                        @elseif($registro->estado == 'entregado')
                                            <span class="badge bg-secondary">Entregado</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $registro->estado }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('admin.registros.show', $registro->id) }}" class="btn btn-info" title="Ver detalles">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.registros.edit', $registro->id) }}" class="btn btn-primary" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $registro->id }}" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Modal de Eliminación -->
                                        <div class="modal fade" id="deleteModal{{ $registro->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $registro->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $registro->id }}">Confirmar Eliminación</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro de que desea eliminar el registro de incidencia <strong>{{ $registro->referencia_reparacion }}</strong>?
                                                        <p class="text-danger mt-3">Esta acción no se puede deshacer.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('admin.registros.destroy', $registro->id) }}" method="POST" class="d-inline">
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Paginación -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $registros->links() }}
                </div>
            @else
                <div class="alert alert-info mb-0">
                    <i class="bi bi-info-circle me-2"></i>No hay registros de incidencias disponibles.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
