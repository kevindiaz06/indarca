@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-danger py-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 text-white"><i class="bi bi-info-circle me-2"></i>Información de Calibración</h4>
                        <span class="badge bg-light text-danger fs-6">{{ $calibracion['numero_serie'] }}</span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="mb-1 fw-bold">Marca</p>
                            <p>{{ $calibracion['marca'] ?: 'No especificada' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1 fw-bold">Modelo</p>
                            <p>{{ $calibracion['modelo'] ?: 'No especificado' }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="mb-1 fw-bold">Última Revisión</p>
                            <p>{{ $calibracion['ultima_revision'] ?: 'No disponible' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1 fw-bold">Estado de Calibración</p>
                            @if($calibracion['estado_calibracion'] === true)
                                <span class="badge bg-success p-2">Calibrado</span>
                            @elseif($calibracion['estado_calibracion'] === false)
                                <span class="badge bg-danger p-2">No calibrado</span>
                            @else
                                <span class="badge bg-secondary p-2">No disponible</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="mb-1 fw-bold">Próxima Calibración</p>
                        @if($calibracion['proxima_calibracion'])
                            <p>{{ $calibracion['proxima_calibracion'] }}</p>
                            @php
                                $hoy = new \Carbon\Carbon();
                                $fechaProxima = \Carbon\Carbon::createFromFormat('d/m/Y', $calibracion['proxima_calibracion']);
                                $diasRestantes = $hoy->diffInDays($fechaProxima, false);
                            @endphp

                            @if($diasRestantes > 30)
                                <div class="alert alert-success">
                                    <i class="bi bi-check-circle-fill me-2"></i>
                                    Quedan <strong>{{ (int)$diasRestantes }}</strong> días para la próxima calibración
                                </div>
                            @elseif($diasRestantes > 0)
                                <div class="alert alert-warning">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                    <strong>¡Atención!</strong> Solo quedan <strong>{{ (int)$diasRestantes }}</strong> días para la próxima calibración
                                </div>
                            @else
                                <div class="alert alert-danger">
                                    <i class="bi bi-x-circle-fill me-2"></i>
                                    <strong>¡Calibración vencida!</strong> Han pasado <strong>{{ abs((int)$diasRestantes) }}</strong> días desde la fecha programada
                                </div>
                            @endif
                        @else
                            <p>No programada</p>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('estado') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Volver
                        </a>
                        <a href="{{ route('calibracion.pdf', ['numero_serie' => $calibracion['numero_serie'], 'marca' => $calibracion['marca'], 'modelo' => $calibracion['modelo']]) }}" class="btn btn-outline-danger">
                            <i class="bi bi-printer me-1"></i> Imprimir Información
                        </a>
                    </div>
                </div>
            </div>

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
