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

    <!-- Formulario de Edición -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">Datos del Densímetro</h6>
            <span class="badge bg-primary">Ref: {{ $densimetro->referencia_reparacion }}</span>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.densimetros.update', $densimetro->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cliente_id" class="form-label">Cliente <span class="text-danger">*</span></label>
                        <select class="form-select @error('cliente_id') is-invalid @enderror" id="cliente_id" name="cliente_id" required>
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
                        <input type="text" class="form-control @error('numero_serie') is-invalid @enderror" id="numero_serie" name="numero_serie" value="{{ old('numero_serie', $densimetro->numero_serie) }}" required>
                        @error('numero_serie')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control @error('marca') is-invalid @enderror" id="marca" name="marca" value="{{ old('marca', $densimetro->marca) }}">
                        @error('marca')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control @error('modelo') is-invalid @enderror" id="modelo" name="modelo" value="{{ old('modelo', $densimetro->modelo) }}">
                        @error('modelo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="estado" class="form-label">Estado <span class="text-danger">*</span></label>
                        <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado" required>
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

                @if($densimetro->estado == 'finalizado' && $densimetro->fecha_finalizacion)
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="fecha_finalizacion" class="form-label">Fecha de Finalización</label>
                        <input type="text" class="form-control" id="fecha_finalizacion" value="{{ $densimetro->fecha_finalizacion->format('d/m/Y') }}" readonly>
                        <div class="form-text">Se establece automáticamente al cambiar el estado a "Finalizado".</div>
                    </div>
                </div>
                @endif

                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <textarea class="form-control @error('observaciones') is-invalid @enderror" id="observaciones" name="observaciones" rows="3">{{ old('observaciones', $densimetro->observaciones) }}</textarea>
                    @error('observaciones')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>
                    Si cambia el estado del densímetro a "Finalizado", se registrará automáticamente la fecha de finalización. Si cambia el estado a cualquier otro, se enviará automáticamente un correo electrónico al cliente notificándole el cambio.
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('admin.densimetros.index') }}" class="btn btn-outline-secondary me-md-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
