@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Primera tarjeta: Consulta por referencia -->
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-primary py-3">
                    <h4 class="mb-0 text-white"><i class="bi bi-clipboard-data me-2"></i>Consulta de Estado de Densímetros</h4>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted mb-4">Introduzca la referencia de reparación que recibió por correo electrónico para consultar el estado actual de su densímetro.</p>

                    <form action="{{ route('estado.consultar') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-light"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control @error('referencia') is-invalid @enderror" name="referencia" placeholder="Ej. REF-ABCD1234" value="{{ old('referencia') }}" required>
                            <button type="submit" class="btn btn-primary">Consultar</button>

                            @error('referencia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>

            <!-- Segunda tarjeta: Consulta por Estado de Calibración -->
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-danger py-3">
                    <h4 class="mb-0 text-white"><i class="bi bi-calendar-check me-2"></i>Consulta por Estado de Calibración</h4>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted mb-4">Introduzca el número de serie, marca y modelo para verificar el estado de calibración del densímetro.</p>

                    <form action="{{ route('calibracion.consultar') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="numero_serie" class="form-label">Número de Serie</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-upc-scan"></i></span>
                                <input type="text" class="form-control @error('numero_serie') is-invalid @enderror" id="numero_serie" name="numero_serie" placeholder="Número de serie del densímetro" value="{{ old('numero_serie') }}" required>
                                @error('numero_serie')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="marca" class="form-label">Marca</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-tag"></i></span>
                                    <input type="text" class="form-control @error('marca') is-invalid @enderror" id="marca" name="marca" placeholder="Marca del densímetro" value="{{ old('marca') }}" required>
                                    @error('marca')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="modelo" class="form-label">Modelo</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-cpu"></i></span>
                                    <input type="text" class="form-control @error('modelo') is-invalid @enderror" id="modelo" name="modelo" placeholder="Modelo del densímetro" value="{{ old('modelo') }}" required>
                                    @error('modelo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-danger text-white">Verificar Estado de Calibración</button>
                        </div>
                    </form>
                </div>
            </div>

            @if($errors->any())
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ $errors->first() }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}
            </div>
            @endif

            <div class="mt-4 text-center">
                <p class="text-muted">¿Tiene alguna pregunta? <a href="{{ route('inicio') }}#contact">Contáctenos</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
