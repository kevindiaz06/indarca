@extends('layouts.clean')

@section('content')
<div class="container py-4">
    <div class="mb-3">
        <a href="{{ route('inicio') }}" class="btn btn-outline-primary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Volver a la página principal
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-primary text-white py-3 text-center rounded-top-4">
                    <h4 class="mb-0">{{ __('Estado de Densímetro') }}</h4>
                </div>

                <div class="card-body p-4">
                    @if(isset($estado))
                        <div class="alert alert-success mb-4">
                            <h5 class="alert-heading mb-3"><i class="bi bi-check-circle me-2"></i>Información encontrada</h5>

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr class="table-primary">
                                        <th colspan="2" class="text-center">Detalles del Densímetro</th>
                                    </tr>
                                    <tr>
                                        <th width="40%">Código</th>
                                        <td>{{ $estado['codigo'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Modelo</th>
                                        <td>{{ $estado['modelo'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Estado</th>
                                        <td>
                                            <span class="badge bg-success">{{ $estado['estado'] }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Última revisión</th>
                                        <td>{{ $estado['ultima_revision'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Próxima revisión</th>
                                        <td>{{ $estado['proxima_revision'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cliente</th>
                                        <td>{{ $estado['cliente'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Observaciones</th>
                                        <td>{{ $estado['observaciones'] }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="text-center mt-3">
                                <a href="{{ route('estado') }}" class="btn btn-outline-primary">
                                    <i class="bi bi-search me-2"></i>Nueva Consulta
                                </a>
                            </div>
                        </div>
                    @else
                        <form method="POST" action="{{ route('estado.consultar') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="codigo" class="form-label fw-medium">{{ __('Código del Densímetro') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-upc-scan"></i></span>
                                    <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ old('codigo') }}" required autofocus placeholder="Introduce el código del densímetro">
                                </div>
                                @error('codigo')
                                    <div class="text-danger small mt-2">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary w-100 py-2 fw-medium">
                                    <i class="bi bi-search me-2"></i>{{ __('Consultar Estado') }}
                                </button>
                            </div>

                            <div class="text-center mt-4">
                                <p class="mb-0 text-muted">
                                    <small>Introduce el código único de tu densímetro para verificar su estado actual, fecha de revisión y más detalles.</small>
                                </p>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
