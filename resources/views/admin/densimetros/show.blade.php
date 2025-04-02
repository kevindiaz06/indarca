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

            <!-- Archivos adjuntos -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Archivos de Observación</h6>
                </div>
                <div class="card-body">
                    <!-- Formulario para subir archivos -->
                    <form action="{{ route('admin.densimetros.archivos.store', $densimetro->id) }}" method="POST" enctype="multipart/form-data" class="mb-4 border-bottom pb-4">
                        @csrf
                        <div class="mb-3">
                            <label for="archivos" class="form-label">Subir archivos</label>
                            <input type="file" class="form-control @error('archivos') is-invalid @enderror @error('archivos.*') is-invalid @enderror" id="archivos" name="archivos[]" multiple required>
                            @error('archivos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @error('archivos.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Puedes seleccionar múltiples archivos. Formatos permitidos: imágenes (JPG, PNG, GIF), documentos (PDF, DOC, XLS). Máximo 10MB por archivo.</div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-upload me-1"></i> Subir archivos
                        </button>
                    </form>

                    <!-- Lista de archivos adjuntos -->
                    <h6 class="mb-3">Archivos adjuntos ({{ $densimetro->archivos->count() }})</h6>

                    @if($densimetro->archivos->isEmpty())
                        <div class="alert alert-info">
                            No hay archivos adjuntos para este densímetro.
                        </div>
                    @else
                        <div class="row">
                            @foreach($densimetro->archivos as $archivo)
                                <div class="col-md-6 col-lg-4 mb-3">
                                    <div class="card h-100">
                                        @if($archivo->tipo_archivo == 'imagen')
                                            <a href="{{ route('admin.densimetros.archivos.show', $archivo->id) }}" target="_blank">
                                                <img src="{{ route('admin.densimetros.archivos.show', $archivo->id) }}" class="card-img-top" alt="{{ $archivo->nombre_archivo }}" style="height: 140px; object-fit: cover;">
                                            </a>
                                        @elseif($archivo->tipo_archivo == 'pdf')
                                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 140px;">
                                                <i class="bi bi-file-pdf text-danger" style="font-size: 3rem;"></i>
                                            </div>
                                        @else
                                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 140px;">
                                                <i class="bi bi-file-earmark text-primary" style="font-size: 3rem;"></i>
                                            </div>
                                        @endif
                                        <div class="card-body">
                                            <h6 class="card-title text-truncate" title="{{ $archivo->nombre_archivo }}">{{ $archivo->nombre_archivo }}</h6>
                                            <p class="card-text small">
                                                <span class="text-muted">{{ strtoupper($archivo->extension) }} - {{ number_format($archivo->tamano / 1024, 2) }} KB</span><br>
                                                <span class="text-muted">{{ $archivo->created_at->format('d/m/Y H:i') }}</span>
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('admin.densimetros.archivos.show', $archivo->id) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <form action="{{ route('admin.densimetros.archivos.destroy', $archivo->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de eliminar este archivo?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
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
                            <span class="text-white fs-1">{{ $densimetro->cliente ? substr($densimetro->cliente->name, 0, 1) : 'N/A' }}</span>
                        </div>
                        <h5 class="mb-0">{{ $densimetro->cliente ? $densimetro->cliente->name : 'Cliente no disponible' }}</h5>
                        <p class="text-muted">Cliente</p>
                    </div>

                    <div class="border-top pt-3">
                        <p class="mb-1"><i class="bi bi-envelope me-2"></i> {{ $densimetro->cliente ? $densimetro->cliente->email : 'Email no disponible' }}</p>

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

                        <button type="button" class="btn btn-success" id="sendEmailBtn" onclick="sendEmailToClient(this)">
                            <i class="bi bi-envelope me-1"></i> Enviar correo al cliente
                        </button>

                        <a href="{{ route('admin.densimetros.pdf', $densimetro->id) }}" class="btn btn-info">
                            <i class="bi bi-printer me-1"></i> Imprimir ficha
                        </a>

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
                <form action="{{ route('admin.densimetros.destroy', $densimetro->id) }}" method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" id="deleteBtn">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Función para manejar el envío de correo al cliente
function sendEmailToClient(button) {
    // Deshabilitar el botón para prevenir múltiples clics
    button.disabled = true;
    // Cambiar el texto del botón
    button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando correo...';

    // Simulamos una operación de envío (por ahora solo muestra un alert)
    setTimeout(function() {
        alert('Esta funcionalidad enviaría un correo al cliente.');
        // Restaurar el botón después de completar la acción
        button.disabled = false;
        button.innerHTML = '<i class="bi bi-envelope me-1"></i> Enviar correo al cliente';
    }, 1000);
}

document.addEventListener('DOMContentLoaded', function() {
    const deleteForm = document.getElementById('deleteForm');
    const deleteBtn = document.getElementById('deleteBtn');

    if (deleteForm && deleteBtn) {
        deleteForm.addEventListener('submit', function() {
            // Deshabilitar el botón de envío
            deleteBtn.disabled = true;
            // Cambiar el texto del botón para indicar proceso
            deleteBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Eliminando...';
        });
    }
});
</script>
@endsection
