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

    <!-- Formulario de Registro -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold">Datos del Densímetro</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.densimetros.store') }}" method="POST">
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
                        <div class="form-text">El cliente debe estar registrado previamente.</div>
                    </div>

                    <div class="col-md-6">
                        <label for="numero_serie" class="form-label">Número de Serie <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('numero_serie') is-invalid @enderror" id="numero_serie" name="numero_serie" value="{{ old('numero_serie') }}" required>
                        @error('numero_serie')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control @error('marca') is-invalid @enderror" id="marca" name="marca" value="{{ old('marca') }}">
                        @error('marca')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control @error('modelo') is-invalid @enderror" id="modelo" name="modelo" value="{{ old('modelo') }}">
                        @error('modelo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
                    Al registrar el densímetro, se generará automáticamente una referencia única y se enviará un correo electrónico al cliente con la información.
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-outline-secondary me-md-2">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Registrar Densímetro
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
