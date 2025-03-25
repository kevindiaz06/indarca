@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page Title -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Editar Empresa</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.empresas') }}">Empresas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary me-2">
                <i class="bi bi-arrow-left-circle me-1"></i> Volver al Dashboard
            </a>
            <a href="{{ route('admin.empresas') }}" class="btn btn-outline-primary">
                <i class="bi bi-building me-1"></i> Lista de Empresas
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">Editar Información de la Empresa</h6>
                    <span class="badge bg-primary px-3 py-2 rounded-pill">
                        <i class="bi bi-building me-1"></i> ID: {{ $empresa->id }}
                    </span>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.empresas.update', $empresa->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nombre" class="form-label fw-medium">{{ __('Nombre de la empresa') }} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-building"></i></span>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre', $empresa->nombre) }}" required autofocus placeholder="Nombre de la empresa">
                            </div>
                            @error('nombre')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="direccion" class="form-label fw-medium">{{ __('Dirección') }} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-geo-alt"></i></span>
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion', $empresa->direccion) }}" required placeholder="Dirección completa">
                            </div>
                            @error('direccion')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="telefono" class="form-label fw-medium">{{ __('Teléfono') }} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-telephone"></i></span>
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono', $empresa->telefono) }}" required placeholder="Número de teléfono">
                            </div>
                            @error('telefono')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end mt-5">
                            <a href="{{ route('admin.empresas') }}" class="btn btn-light me-2">
                                <i class="bi bi-x-circle me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
