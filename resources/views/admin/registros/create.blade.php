@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Registrar Nueva Incidencia</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.registros.index') }}">Registros</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nueva Incidencia</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('admin.registros.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Volver
        </a>
    </div>

    <!-- Formulario de Registro -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Datos de la Incidencia</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.registros.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cliente_id" class="form-label">Cliente <span class="text-danger">*</span></label>
                        <select class="form-select @error('cliente_id') is-invalid @enderror" id="cliente_id" name="cliente_id" required>
                            <option value="">Seleccione un cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                    {{ $cliente->name }} ({{ $cliente->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('cliente_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="densimetro_id" class="form-label">Densímetro <span class="text-danger">*</span></label>
                        <select class="form-select @error('densimetro_id') is-invalid @enderror" id="densimetro_id" name="densimetro_id" required>
                            <option value="">Seleccione un densímetro</option>
                            @foreach($densimetros as $densimetro)
                                <option value="{{ $densimetro->id }}" {{ old('densimetro_id') == $densimetro->id ? 'selected' : '' }}
                                    data-marca="{{ $densimetro->marca }}" data-modelo="{{ $densimetro->modelo }}">
                                    {{ $densimetro->numero_serie }}
                                    @if($densimetro->marca || $densimetro->modelo)
                                        ({{ $densimetro->marca }} {{ $densimetro->modelo }})
                                    @endif
                                </option>
                            @endforeach
                        </select>
                        @error('densimetro_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Si el densímetro no existe, primero debe <a href="{{ route('admin.densimetros.create') }}" target="_blank">registrarlo</a>.</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="info_densimetro" class="form-label">Marca y Modelo</label>
                        <input type="text" class="form-control" id="info_densimetro" readonly>
                        <div class="form-text">Esta información se carga automáticamente del densímetro seleccionado.</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <textarea class="form-control @error('observaciones') is-invalid @enderror" id="observaciones" name="observaciones" rows="3">{{ old('observaciones') }}</textarea>
                    @error('observaciones')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>
                    Al registrar la incidencia, se generará automáticamente una referencia única y se enviará un correo electrónico al cliente con la información.
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-outline-secondary me-md-2">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Registrar Incidencia
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const densimetroSelect = document.getElementById('densimetro_id');
        const infoDensimetroInput = document.getElementById('info_densimetro');

        // Actualizar información del densímetro cuando se seleccione uno
        densimetroSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            if (selectedOption.value) {
                const marca = selectedOption.dataset.marca || 'No especificada';
                const modelo = selectedOption.dataset.modelo || 'No especificado';
                infoDensimetroInput.value = `${marca} / ${modelo}`;
            } else {
                infoDensimetroInput.value = '';
            }
        });

        // Actualizar al cargar la página si hay un densímetro seleccionado
        if (densimetroSelect.value) {
            const selectedOption = densimetroSelect.options[densimetroSelect.selectedIndex];
            const marca = selectedOption.dataset.marca || 'No especificada';
            const modelo = selectedOption.dataset.modelo || 'No especificado';
            infoDensimetroInput.value = `${marca} / ${modelo}`;
        }
    });
</script>
@endsection
