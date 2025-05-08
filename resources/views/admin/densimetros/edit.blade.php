@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Editar Densímetro</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.densimetros.index') }}">Densímetros</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.densimetros.show', $densimetro->id) }}" class="btn btn-info me-2">
                <i class="bi bi-eye me-1"></i> Ver Detalles
            </a>
            <a href="{{ route('admin.densimetros.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Volver
            </a>
        </div>
    </div>

    @if($densimetro->estado === 'entregado')
    <div class="alert alert-warning mb-4">
        <div class="d-flex align-items-center">
            <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
            <div>
                <h5 class="mb-1 alert-heading">¡Atención! Este densímetro está en estado "Entregado"</h5>
                <p class="mb-0">Los densímetros en estado "Entregado" no pueden ser modificados para evitar inconsistencias en el sistema. Si necesita realizar cambios, por favor registre un nuevo ingreso del densímetro.</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Formulario de Edición -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">Datos del Densímetro</h6>
            <span class="badge bg-primary">Ref: {{ $densimetro->referencia_reparacion }}</span>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.densimetros.update', $densimetro->id) }}" method="POST" id="editForm">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cliente_id" class="form-label">Cliente <span class="text-danger">*</span></label>
                        <select class="form-select @error('cliente_id') is-invalid @enderror" id="cliente_id" name="cliente_id" required {{ $densimetro->estado === 'entregado' ? 'disabled' : '' }}>
                            <option value="">Seleccione un cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ (old('cliente_id', $densimetro->cliente_id) == $cliente->id) ? 'selected' : '' }}>
                                    {{ $cliente->name }} ({{ $cliente->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('cliente_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="numero_serie" class="form-label">Número de Serie <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('numero_serie') is-invalid @enderror" id="numero_serie" name="numero_serie" value="{{ old('numero_serie', $densimetro->numero_serie) }}" required {{ $densimetro->estado === 'entregado' ? 'readonly' : '' }}>
                        @error('numero_serie')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control @error('marca') is-invalid @enderror" id="marca" name="marca" value="{{ old('marca', $densimetro->marca) }}" {{ $densimetro->estado === 'entregado' ? 'readonly' : '' }}>
                        @error('marca')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control @error('modelo') is-invalid @enderror" id="modelo" name="modelo" value="{{ old('modelo', $densimetro->modelo) }}" {{ $densimetro->estado === 'entregado' ? 'readonly' : '' }}>
                        @error('modelo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estado" class="form-label">Estado <span class="text-danger">*</span></label>
                        <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado" required {{ $densimetro->estado === 'entregado' ? 'disabled' : '' }}>
                            <option value="recibido" {{ (old('estado', $densimetro->estado) == 'recibido') ? 'selected' : '' }}>Recibido</option>
                            <option value="en_reparacion" {{ (old('estado', $densimetro->estado) == 'en_reparacion') ? 'selected' : '' }}>En reparación</option>
                            <option value="finalizado" {{ (old('estado', $densimetro->estado) == 'finalizado') ? 'selected' : '' }}>Reparación finalizada</option>
                            <option value="entregado" {{ (old('estado', $densimetro->estado) == 'entregado') ? 'selected' : '' }}>Entregado al cliente</option>
                        </select>
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="fecha_entrada" class="form-label">Fecha de Entrada</label>
                        <input type="text" class="form-control" id="fecha_entrada" value="{{ $densimetro->fecha_entrada->format('d/m/Y') }}" readonly>
                        <div class="form-text">La fecha de entrada no puede modificarse.</div>
                    </div>
                </div>

                @if(($densimetro->estado == 'finalizado' || $densimetro->estado == 'entregado') && $densimetro->fecha_finalizacion)
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="fecha_finalizacion" class="form-label">Fecha de Finalización</label>
                        <input type="text" class="form-control" id="fecha_finalizacion" value="{{ $densimetro->fecha_finalizacion->format('d/m/Y') }}" readonly>
                        <div class="form-text">Se establece automáticamente al cambiar el estado a "Finalizado" o "Entregado".</div>
                    </div>
                </div>
                @endif

                <!-- Campos de Calibración - Se muestran condicionalmente según el estado -->
                <div class="row mb-3" id="camposCalibrado" style="{{ old('estado', $densimetro->estado) == 'finalizado' || old('estado', $densimetro->estado) == 'entregado' ? '' : 'display: none;' }}">
                    <div class="col-md-6">
                        <label for="calibrado" class="form-label">¿Está calibrado? <span id="calibradoRequerido" class="text-danger {{ old('estado', $densimetro->estado) == 'entregado' ? '' : 'd-none' }}">*</span></label>
                        <select class="form-select @error('calibrado') is-invalid @enderror" id="calibrado" name="calibrado" {{ $densimetro->estado === 'entregado' ? 'disabled' : '' }}>
                            <option value="">Seleccione</option>
                            <option value="1" {{ (old('calibrado', $densimetro->calibrado) == '1') ? 'selected' : '' }}>Sí</option>
                            <option value="0" {{ (old('calibrado', $densimetro->calibrado) == '0' && $densimetro->calibrado !== null) ? 'selected' : '' }}>No</option>
                        </select>
                        @error('calibrado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6" id="campoFechaCalibrado" style="{{ (old('calibrado', $densimetro->calibrado) == '1') ? '' : 'display: none;' }}">
                        <label for="fecha_proxima_calibracion" class="form-label">Próxima fecha de calibración <span id="fechaCalibradoRequerido" class="text-danger {{ old('estado', $densimetro->estado) == 'entregado' && old('calibrado', $densimetro->calibrado) == '1' ? '' : 'd-none' }}">*</span></label>
                        <input type="date" class="form-control @error('fecha_proxima_calibracion') is-invalid @enderror"
                            id="fecha_proxima_calibracion" name="fecha_proxima_calibracion"
                            value="{{ old('fecha_proxima_calibracion', $densimetro->fecha_proxima_calibracion instanceof \DateTime ? $densimetro->fecha_proxima_calibracion->format('Y-m-d') : $densimetro->fecha_proxima_calibracion) }}"
                            {{ $densimetro->estado === 'entregado' ? 'readonly' : '' }}>
                        @error('fecha_proxima_calibracion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <textarea class="form-control @error('observaciones') is-invalid @enderror" id="observaciones" name="observaciones" rows="3" {{ $densimetro->estado === 'entregado' ? 'readonly' : '' }}>{{ old('observaciones', $densimetro->observaciones) }}</textarea>
                    @error('observaciones')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>
                    Si cambia el estado del densímetro a "Finalizado" o "Entregado", se registrará automáticamente la fecha de finalización si no existe. Si cambia el estado a cualquier otro, se enviará automáticamente un correo electrónico al cliente notificándole el cambio.
                </div>

                <div class="alert alert-warning" id="alertaCalibracion" style="display: none;">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>¡Atención!</strong> Al cambiar el estado a "Entregado", debe especificar si el densímetro está calibrado. Si está calibrado, también debe indicar la fecha de próxima calibración.
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('admin.densimetros.index') }}" class="btn btn-outline-secondary me-md-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary" id="submitBtn" {{ $densimetro->estado === 'entregado' ? 'disabled' : '' }}>
                        <i class="bi bi-save me-1"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editForm = document.getElementById('editForm');
    const submitBtn = document.getElementById('submitBtn');
    const estadoSelect = document.getElementById('estado');
    const camposCalibrado = document.getElementById('camposCalibrado');
    const calibradoSelect = document.getElementById('calibrado');
    const campoFechaCalibrado = document.getElementById('campoFechaCalibrado');
    const calibradoRequerido = document.getElementById('calibradoRequerido');
    const fechaCalibradoRequerido = document.getElementById('fechaCalibradoRequerido');
    const alertaCalibracion = document.getElementById('alertaCalibracion');

    // Mostrar/ocultar campos de calibración según el estado
    if (estadoSelect) {
        estadoSelect.addEventListener('change', function() {
            if (this.value === 'finalizado' || this.value === 'entregado') {
                camposCalibrado.style.display = '';

                // Si es entregado, marcar como requerido
                if (this.value === 'entregado') {
                    calibradoRequerido.classList.remove('d-none');
                    alertaCalibracion.style.display = 'block';
                } else {
                    calibradoRequerido.classList.add('d-none');
                    alertaCalibracion.style.display = 'none';
                }
            } else {
                camposCalibrado.style.display = 'none';
                calibradoRequerido.classList.add('d-none');
                alertaCalibracion.style.display = 'none';
            }
        });
    }

    // Mostrar/ocultar campo de fecha de calibración según esté calibrado o no
    if (calibradoSelect) {
        calibradoSelect.addEventListener('change', function() {
            if (this.value === '1') {
                campoFechaCalibrado.style.display = '';

                // Si está en estado entregado y está calibrado, la fecha es requerida
                if (estadoSelect.value === 'entregado') {
                    fechaCalibradoRequerido.classList.remove('d-none');
                } else {
                    fechaCalibradoRequerido.classList.add('d-none');
                }
            } else {
                campoFechaCalibrado.style.display = 'none';
                fechaCalibradoRequerido.classList.add('d-none');
            }
        });
    }

    if (editForm && submitBtn) {
        editForm.addEventListener('submit', function(event) {
            // Validar si es necesario
            if (estadoSelect.value === 'entregado') {
                if (!calibradoSelect.value) {
                    event.preventDefault();
                    alert('Debe especificar si el densímetro está calibrado antes de entregarlo al cliente.');
                    return false;
                }

                if (calibradoSelect.value === '1') {
                    const fechaCalibrado = document.getElementById('fecha_proxima_calibracion');
                    if (!fechaCalibrado.value) {
                        event.preventDefault();
                        alert('Para densímetros calibrados, debe especificar la fecha de próxima calibración antes de entregarlos al cliente.');
                        return false;
                    }
                }
            }

            // Continuar con el envío del formulario
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Guardando...';
        });
    }

    // Verificar el estado inicial
    if (estadoSelect && estadoSelect.value === 'entregado') {
        calibradoRequerido.classList.remove('d-none');
        alertaCalibracion.style.display = 'block';

        if (calibradoSelect && calibradoSelect.value === '1') {
            fechaCalibradoRequerido.classList.remove('d-none');
        }
    }
});
</script>

@endsection
