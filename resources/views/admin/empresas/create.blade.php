@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Page Title -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Crear Nueva Empresa</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.empresas') }}">Empresas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Crear</li>
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
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Información de la Empresa</h6>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.empresas.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="nombre" class="form-label fw-medium">{{ __('Nombre de la empresa') }} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-building"></i></span>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autofocus placeholder="Nombre de la empresa">
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
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required placeholder="Dirección completa">
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
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required placeholder="Número de teléfono">
                            </div>
                            @error('telefono')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="logo" class="form-label fw-medium">{{ __('Logo de la empresa') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-image"></i></span>
                                <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" accept="image/*">
                            </div>
                            <small class="text-muted">Formatos permitidos: JPG, PNG, GIF, SVG. Tamaño máximo: 2MB.</small>
                            @error('logo')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tipo_cliente" class="form-label fw-medium">{{ __('Tipo de Cliente') }} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-tag"></i></span>
                                <select id="tipo_cliente" class="form-select @error('tipo_cliente') is-invalid @enderror" name="tipo_cliente" required>
                                    <option value="Cliente Habitual" {{ old('tipo_cliente') == 'Cliente Habitual' ? 'selected' : '' }}>Cliente Habitual</option>
                                    <option value="Colaborador" {{ old('tipo_cliente') == 'Colaborador' ? 'selected' : '' }}>Colaborador</option>
                                    <option value="Patrocinador" {{ old('tipo_cliente') == 'Patrocinador' ? 'selected' : '' }}>Patrocinador</option>
                                </select>
                            </div>
                            @error('tipo_cliente')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-check form-switch">
                                <input id="destacado" type="checkbox" class="form-check-input @error('destacado') is-invalid @enderror" name="destacado" {{ old('destacado') ? 'checked' : '' }}>
                                <label for="destacado" class="form-check-label fw-medium">{{ __('Mostrar como destacado') }}</label>
                            </div>
                            <small class="text-muted">Las empresas destacadas aparecerán primero en la página principal.</small>
                            @error('destacado')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-check form-switch">
                                <input id="activo" type="checkbox" class="form-check-input @error('activo') is-invalid @enderror" name="activo" {{ old('activo') ? 'checked' : '' }}>
                                <label for="activo" class="form-check-label fw-medium">{{ __('Mostrar en la página principal') }}</label>
                            </div>
                            <small class="text-muted">Las empresas inactivas no se mostrarán en la página principal.</small>
                            @error('activo')
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
                                <i class="bi bi-building-add me-1"></i> Crear Empresa
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
