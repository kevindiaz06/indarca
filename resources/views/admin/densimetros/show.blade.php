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
                            <h5>{{ $densimetro->formatFechaEntrada() }}</h5>
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

                        @if($densimetro->estado == 'finalizado' || $densimetro->estado == 'entregado')
                        <div class="col-md-6">
                            <p class="mb-1 text-muted">Estado de Calibración</p>
                            @if($densimetro->calibrado === null)
                                <h5><span class="badge bg-secondary">No especificado</span></h5>
                            @elseif($densimetro->calibrado)
                                <h5><span class="badge bg-success">Calibrado</span></h5>
                                <p class="mb-1 text-muted mt-2">Próxima fecha de calibración</p>
                                <h5>{{ $densimetro->fecha_proxima_calibracion instanceof \DateTime ? $densimetro->fecha_proxima_calibracion->format('d/m/Y') : ($densimetro->fecha_proxima_calibracion ?: 'No especificada') }}</h5>
                            @else
                                <h5><span class="badge bg-danger">No calibrado</span></h5>
                            @endif
                        </div>
                        @endif
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
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Información importante sobre límites -->
                    <div class="alert alert-info border-left-info mb-4">
                        <div class="text-info">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Información importante:</strong> Puedes subir un máximo de <strong>10 archivos</strong> por vez.
                            Si necesitas subir más archivos, hazlo en varias cargas separadas.
                        </div>
                    </div>

                    <form action="{{ route('admin.densimetros.archivos.store', $densimetro->id) }}" method="POST" enctype="multipart/form-data" class="mb-4 border-bottom pb-4" id="uploadForm">
                        @csrf
                        <div class="mb-3">
                            <label for="archivos" class="form-label">Subir archivos</label>
                            <input type="file" class="form-control @error('archivos') is-invalid @enderror @error('archivos.*') is-invalid @enderror" id="archivos" name="archivos[]" multiple required accept=".jpg,.jpeg,.png,.gif,.webp,.pdf,.doc,.docx,.xls,.xlsx,.txt">
                            @error('archivos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @error('archivos.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                <strong>Límite:</strong> Máximo 10 archivos por carga.
                                <br><strong>Formatos permitidos:</strong> imágenes (JPG, PNG, GIF, WEBP), documentos (PDF, DOC, DOCX, XLS, XLSX, TXT).
                                <br><strong>Tamaño:</strong> Máximo 10MB por archivo.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="uploadBtn">
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

                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#emailModal">
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

<!-- Modal de Envío de Correo Personalizado -->
<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emailModalLabel">
                    <i class="bi bi-envelope me-2"></i>Enviar Correo al Cliente
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.densimetros.enviar-correo', $densimetro->id) }}" method="POST" id="emailForm">
                @csrf
                <div class="modal-body">
                    <!-- Información del destinatario -->
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        <strong>Destinatario:</strong> {{ $densimetro->cliente ? $densimetro->cliente->name : 'Cliente no disponible' }}
                        ({{ $densimetro->cliente ? $densimetro->cliente->email : 'Email no disponible' }})
                    </div>

                    <!-- Información del densímetro -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-0"><i class="bi bi-gear me-2"></i>Información del Densímetro</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Referencia:</strong> {{ $densimetro->referencia_reparacion }}</p>
                                    <p class="mb-1"><strong>Número de Serie:</strong> {{ $densimetro->numero_serie }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Marca:</strong> {{ $densimetro->marca ?: 'No especificada' }}</p>
                                    <p class="mb-1"><strong>Estado:</strong>
                                        @if($densimetro->estado == 'recibido')
                                            <span class="badge bg-secondary">Recibido</span>
                                        @elseif($densimetro->estado == 'en_reparacion')
                                            <span class="badge bg-primary">En reparación</span>
                                        @elseif($densimetro->estado == 'finalizado')
                                            <span class="badge bg-success">Finalizado</span>
                                        @elseif($densimetro->estado == 'entregado')
                                            <span class="badge bg-info">Entregado</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Formulario de correo -->
                    <div class="mb-3">
                        <label for="asunto" class="form-label">
                            <i class="bi bi-tag me-1"></i>Asunto del correo <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('asunto') is-invalid @enderror"
                               id="asunto" name="asunto" value="{{ old('asunto') }}"
                               placeholder="Ej: Actualización sobre su densímetro" maxlength="255" required>
                        @error('asunto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Máximo 255 caracteres</div>
                    </div>

                    <div class="mb-3">
                        <label for="mensaje" class="form-label">
                            <i class="bi bi-chat-text me-1"></i>Mensaje <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control @error('mensaje') is-invalid @enderror"
                                  id="mensaje" name="mensaje" rows="8"
                                  placeholder="Escriba aquí el mensaje que desea enviar al cliente..."
                                  maxlength="2000" required>{{ old('mensaje') }}</textarea>
                        @error('mensaje')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            <span id="charCount">0</span>/2000 caracteres
                        </div>
                    </div>

                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <strong>Nota:</strong> Este correo se enviará desde la cuenta oficial de INDARCA y incluirá automáticamente la información del densímetro.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i>Cancelar
                    </button>
                    <button type="submit" class="btn btn-success" id="sendEmailBtn">
                        <i class="bi bi-send me-1"></i>Enviar Correo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteForm = document.getElementById('deleteForm');
    const deleteBtn = document.getElementById('deleteBtn');
    const uploadForm = document.getElementById('uploadForm');
    const uploadBtn = document.getElementById('uploadBtn');
    const archivosInput = document.getElementById('archivos');
    const emailForm = document.getElementById('emailForm');
    const sendEmailBtn = document.getElementById('sendEmailBtn');
    const mensajeTextarea = document.getElementById('mensaje');
    const charCount = document.getElementById('charCount');

    // Contador de caracteres para el mensaje
    if (mensajeTextarea && charCount) {
        mensajeTextarea.addEventListener('input', function() {
            const currentLength = this.value.length;
            charCount.textContent = currentLength;

            if (currentLength > 1800) {
                charCount.style.color = '#dc3545'; // Rojo cuando se acerca al límite
            } else {
                charCount.style.color = '#6c757d'; // Gris normal
            }
        });

        // Inicializar contador
        charCount.textContent = mensajeTextarea.value.length;
    }

    // Manejo del formulario de envío de correo
    if (emailForm && sendEmailBtn) {
        emailForm.addEventListener('submit', function() {
            // Deshabilitar el botón de envío
            sendEmailBtn.disabled = true;
            // Cambiar el texto del botón para indicar proceso
            sendEmailBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando correo...';
        });
    }

    // Manejo del formulario de eliminación
    if (deleteForm && deleteBtn) {
        deleteForm.addEventListener('submit', function() {
            // Deshabilitar el botón de envío
            deleteBtn.disabled = true;
            // Cambiar el texto del botón para indicar proceso
            deleteBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Eliminando...';
        });
    }

    // Manejo del formulario de subida de archivos
    if (uploadForm && uploadBtn && archivosInput) {
        // Validación de archivos antes del envío
        archivosInput.addEventListener('change', function() {
            const files = this.files;
            const maxFiles = 10; // Límite máximo de archivos
            const maxSize = 10 * 1024 * 1024; // 10MB en bytes
            const allowedTypes = [
                'image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp',
                'application/pdf',
                'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'text/plain'
            ];

            let hasError = false;
            let errorMessage = '';

            // Verificar límite de cantidad de archivos
            if (files.length > maxFiles) {
                hasError = true;
                errorMessage += `Has excedido el límite máximo de ${maxFiles} archivos. Has seleccionado ${files.length} archivos.\nPor favor, selecciona menos archivos e inténtalo de nuevo.\n\n`;
            }

            // Solo continuar con otras validaciones si no se excedió el límite
            if (!hasError) {
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];

                    // Verificar tamaño
                    if (file.size > maxSize) {
                        hasError = true;
                        errorMessage += `El archivo "${file.name}" excede el tamaño máximo de 10MB.\n`;
                    }

                    // Verificar tipo
                    if (!allowedTypes.includes(file.type)) {
                        hasError = true;
                        errorMessage += `El archivo "${file.name}" no es de un tipo permitido.\n`;
                    }
                }
            }

            if (hasError) {
                alert('❌ Errores encontrados:\n\n' + errorMessage);
                this.value = ''; // Limpiar la selección
                return false;
            }
        });

        // Manejo del envío del formulario
        uploadForm.addEventListener('submit', function(e) {
            console.log('Formulario de subida enviado');
            console.log('Action URL:', this.action);
            console.log('Method:', this.method);

            // Verificar que hay archivos seleccionados
            if (archivosInput.files.length === 0) {
                e.preventDefault();
                alert('Por favor, selecciona al menos un archivo.');
                return false;
            }

            // Verificar límite de archivos nuevamente antes del envío
            const maxFiles = 10;
            if (archivosInput.files.length > maxFiles) {
                e.preventDefault();
                alert(`❌ Error: Has excedido el límite máximo de ${maxFiles} archivos.\n\nHas seleccionado ${archivosInput.files.length} archivos. Por favor, selecciona menos archivos e inténtalo de nuevo.`);
                return false;
            }

            // Deshabilitar el botón y mostrar estado de carga
            uploadBtn.disabled = true;
            uploadBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Subiendo archivos...';

            // Log para debugging
            console.log('Archivos seleccionados:', archivosInput.files.length);
            for (let i = 0; i < archivosInput.files.length; i++) {
                console.log(`Archivo ${i + 1}:`, archivosInput.files[i].name, archivosInput.files[i].size, archivosInput.files[i].type);
            }
        });
    }
});
</script>
@endsection
