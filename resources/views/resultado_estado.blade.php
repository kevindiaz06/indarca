@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-primary py-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 text-white"><i class="bi bi-info-circle me-2"></i>Resultado de la Consulta</h4>
                        <span class="badge bg-light text-primary fs-6">{{ $estado['referencia'] }}</span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="mb-1 fw-bold">Número de Serie</p>
                            <p>{{ $estado['numero_serie'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1 fw-bold">Fecha de Entrada</p>
                            <p>{{ $estado['fecha_entrada'] }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="mb-1 fw-bold">Marca</p>
                            <p>{{ $estado['marca'] ?: 'No especificada' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1 fw-bold">Modelo</p>
                            <p>{{ $estado['modelo'] ?: 'No especificado' }}</p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="mb-1 fw-bold">Estado Actual</p>
                        <div class="estado-timeline">
                            <div class="d-flex justify-content-between position-relative mb-1">
                                <div class="estado-punto {{ $estado['estado'] == 'Recibido' ? 'activo' : ($estado['estado'] == 'En reparación' || $estado['estado'] == 'Reparación finalizada' || $estado['estado'] == 'Entregado al cliente' ? 'completado' : '') }}">
                                    <i class="bi bi-box"></i>
                                </div>
                                <div class="estado-punto {{ $estado['estado'] == 'En reparación' ? 'activo' : ($estado['estado'] == 'Reparación finalizada' || $estado['estado'] == 'Entregado al cliente' ? 'completado' : '') }}">
                                    <i class="bi bi-tools"></i>
                                </div>
                                <div class="estado-punto {{ $estado['estado'] == 'Reparación finalizada' ? 'activo' : ($estado['estado'] == 'Entregado al cliente' ? 'completado' : '') }}">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                                <div class="estado-punto {{ $estado['estado'] == 'Entregado al cliente' ? 'activo' : '' }}">
                                    <i class="bi bi-truck"></i>
                                </div>
                                <div class="estado-linea position-absolute"></div>
                            </div>
                            <div class="d-flex justify-content-between text-center">
                                <div class="estado-texto {{ $estado['estado'] == 'Recibido' ? 'activo' : ($estado['estado'] == 'En reparación' || $estado['estado'] == 'Reparación finalizada' || $estado['estado'] == 'Entregado al cliente' ? 'completado' : '') }}">Recibido</div>
                                <div class="estado-texto {{ $estado['estado'] == 'En reparación' ? 'activo' : ($estado['estado'] == 'Reparación finalizada' || $estado['estado'] == 'Entregado al cliente' ? 'completado' : '') }}">En reparación</div>
                                <div class="estado-texto {{ $estado['estado'] == 'Reparación finalizada' ? 'activo' : ($estado['estado'] == 'Entregado al cliente' ? 'completado' : '') }}">Finalizado</div>
                                <div class="estado-texto {{ $estado['estado'] == 'Entregado al cliente' ? 'activo' : '' }}">Entregado</div>
                            </div>
                        </div>
                    </div>

                    @if(isset($estado['calibrado']) && ($estado['estado'] == 'Reparación finalizada' || $estado['estado'] == 'Entregado al cliente'))
                    <div class="mb-4">
                        <p class="mb-1 fw-bold">Estado de Calibración</p>
                        @if($estado['calibrado'] === null)
                            <div class="badge bg-secondary p-2 mb-2">No especificado</div>
                        @elseif($estado['calibrado'])
                            <div class="badge bg-success p-2 mb-2">Calibrado</div>
                            @if(isset($estado['fecha_proxima_calibracion']))
                            <div class="mt-3">
                                <p class="mb-1 fw-bold">Próxima fecha de calibración</p>
                                <p>{{ $estado['fecha_proxima_calibracion'] }}</p>
                            </div>
                            @endif
                        @else
                            <div class="badge bg-danger p-2 mb-2">No calibrado</div>
                        @endif
                    </div>
                    @endif

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('estado') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Volver
                        </a>
                        <a href="{{ route('estado.pdf', $estado['referencia']) }}" class="btn btn-outline-primary">
                            <i class="bi bi-printer me-1"></i> Imprimir Resultado
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
