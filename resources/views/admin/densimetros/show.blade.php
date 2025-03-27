@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Detalles del Densímetro</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.densimetros.index') }}">Densímetros</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalles</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.densimetros.edit', $densimetro->id) }}" class="btn btn-warning me-2">
                <i class="bi bi-pencil me-1"></i> Editar
            </a>
            <a href="{{ route('admin.densimetros.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Volver
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Detalles del Densímetro -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Información del Densímetro</h6>
                    <span class="badge bg-primary">Ref: {{ $densimetro->referencia_reparacion }}</span>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="mb-1 text-muted">Número de Serie</p>
                            <h5>{{ $densimetro->numero_serie }}</h5>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1 text-muted">Fecha de Entrada</p>
                            <h5>{{ $densimetro->fecha_entrada->format('d/m/Y') }}</h5>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="mb-1 text-muted">Marca</p>
                            <h5>{{ $densimetro->marca ?: 'No especificada' }}</h5>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1 text-muted">Modelo</p>
                            <h5>{{ $densimetro->modelo ?: 'No especificado' }}</h5>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="mb-1 text-muted">Estado Actual</p>
                            @if($densimetro->estado == 'recibido')
                                <h5><span class="badge bg-secondary">Recibido</span></h5>
                            @elseif($densimetro->estado == 'en_reparacion')
                                <h5><span class="badge bg-primary">En reparación</span></h5>
                            @elseif($densimetro->estado == 'finalizado')
                                <h5><span class="badge bg-success">Finalizado</span></h5>
                            @elseif($densimetro->estado == 'entregado')
                                <h5><span class="badge bg-info">Entregado</span></h5>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1 text-muted">Fecha de Registro</p>
                            <h5>{{ $densimetro->created_at->format('d/m/Y H:i') }}</h5>
                        </div>
                    </div>

                    @if(($densimetro->estado == 'finalizado' || $densimetro->estado == 'entregado') && $densimetro->fecha_finalizacion)
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="mb-1 text-muted">Fecha de Finalización</p>
                            <h5>{{ $densimetro->fecha_finalizacion->format('d/m/Y') }}</h5>
                        </div>
                    </div>
                    @endif

                    <div class="mb-4">
                        <p class="mb-1 text-muted">Observaciones</p>
                        <div class="border rounded p-3 bg-light">
                            {{ $densimetro->observaciones ?: 'Sin observaciones' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Información del Cliente -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Datos del Cliente</h6>
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <div class="avatar bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;">
                            <span class="text-white fs-1">{{ substr($densimetro->cliente->name, 0, 1) }}</span>
                        </div>
                        <h5 class="mb-0">{{ $densimetro->cliente->name }}</h5>
                        <p class="text-muted">Cliente</p>
                    </div>

                    <div class="border-top pt-3">
                        <p class="mb-1"><i class="bi bi-envelope me-2"></i> {{ $densimetro->cliente->email }}</p>

                        <a href="{{ route('admin.densimetros.index') }}?filtro_cliente={{ $densimetro->cliente_id }}" class="btn btn-outline-primary w-100 mt-3">
                            <i class="bi bi-search me-1"></i> Ver todos sus densímetros
                        </a>
                    </div>
                </div>
            </div>

            <!-- Acciones -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Acciones</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.densimetros.edit', $densimetro->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil me-1"></i> Editar densímetro
                        </a>

                        <button type="button" class="btn btn-success" onclick="alert('Esta funcionalidad enviaría un correo al cliente.')">
                            <i class="bi bi-envelope me-1"></i> Enviar correo al cliente
                        </button>

                        <button type="button" class="btn btn-info" onclick="window.print()">
                            <i class="bi bi-printer me-1"></i> Imprimir ficha
                        </button>

                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="bi bi-trash me-1"></i> Eliminar densímetro
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmación de Eliminación -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro de que desea eliminar este densímetro? Esta acción no se puede deshacer.</p>
                <p><strong>Referencia:</strong> {{ $densimetro->referencia_reparacion }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('admin.densimetros.destroy', $densimetro->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
