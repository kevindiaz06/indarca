@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Cabecera -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Registrar Nuevo Densímetro</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.densimetros.index') }}">Densímetros</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nuevo</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('admin.densimetros.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Volver
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Formulario de Registro</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.densimetros.store') }}" method="POST">
                @csrf

                <!-- Mensajes de error -->
                @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Cliente -->
                <div class="mb-3">
                    <label for="cliente_id" class="form-label">Cliente <span class="text-danger">*</span></label>
                    <select name="cliente_id" id="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror" required>
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

                <!-- Número de Serie con botón de búsqueda -->
                <div class="mb-3">
                    <label for="numero_serie" class="form-label">Número de Serie <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" name="numero_serie" id="numero_serie" class="form-control @error('numero_serie') is-invalid @enderror" value="{{ old('numero_serie') }}" required>
                        <button type="button" id="buscarDensimetro" class="btn btn-outline-secondary">
                            <i class="bi bi-search"></i> Buscar
                        </button>
                        @error('numero_serie')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <small class="text-muted" id="infoDensimetro"></small>
                </div>

                <!-- Marca -->
                <div class="mb-3">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" name="marca" id="marca" class="form-control @error('marca') is-invalid @enderror" value="{{ old('marca') }}">
                    @error('marca')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Modelo -->
                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" name="modelo" id="modelo" class="form-control @error('modelo') is-invalid @enderror" value="{{ old('modelo') }}">
                    @error('modelo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Observaciones -->
                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <textarea name="observaciones" id="observaciones" rows="3" class="form-control @error('observaciones') is-invalid @enderror">{{ old('observaciones') }}</textarea>
                    @error('observaciones')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-1"></i> Registrar Densímetro
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
        // Manejador para el botón de búsqueda de densímetro
        document.getElementById('buscarDensimetro').addEventListener('click', function() {
            const numeroSerie = document.getElementById('numero_serie').value.trim();

            if (!numeroSerie) {
                alert('Por favor, ingrese un número de serie para buscar');
                return;
            }

            // Realizar petición AJAX para buscar densímetro
            fetch(`/api/densimetros/buscar?numero_serie=${encodeURIComponent(numeroSerie)}`)
                .then(response => response.json())
                .then(data => {
                    const infoElement = document.getElementById('infoDensimetro');

                    if (data.existe) {
                        if (data.en_reparacion) {
                            infoElement.innerHTML = `<span class="text-danger">⚠️ Este densímetro ya está en reparación actualmente. No puede registrarse nuevamente.</span>`;
                        } else {
                            infoElement.innerHTML = `<span class="text-success">✓ Densímetro encontrado. Se han cargado los datos existentes.</span>`;
                            // Rellenar campos con datos existentes
                            document.getElementById('marca').value = data.densimetro.marca || '';
                            document.getElementById('modelo').value = data.densimetro.modelo || '';
                        }
                    } else {
                        infoElement.innerHTML = `<span class="text-info">ℹ️ No se encontró un densímetro con este número de serie. Se registrará como nuevo.</span>`;
                    }
                })
                .catch(error => {
                    console.error('Error al buscar densímetro:', error);
                    document.getElementById('infoDensimetro').innerHTML = `<span class="text-danger">Error al buscar densímetro. Intente nuevamente.</span>`;
                });
        });
    });
</script>
@endsection
