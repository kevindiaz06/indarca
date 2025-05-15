@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-primary py-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 text-white"><i class="bi bi-info-circle me-2"></i>{{ __('estado.query_result') }}</h4>
                        <span class="badge bg-light text-primary fs-6">{{ $estado['referencia'] }}</span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="mb-1 fw-bold">{{ __('estado.serial_number') }}</p>
                            <p>{{ $estado['numero_serie'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1 fw-bold">{{ __('estado.entry_date') }}</p>
                            <p>{{ $estado['fecha_entrada'] }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="mb-1 fw-bold">{{ __('estado.brand') }}</p>
                            <p>{{ $estado['marca'] ?: __('estado.not_specified') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1 fw-bold">{{ __('estado.model') }}</p>
                            <p>{{ $estado['modelo'] ?: __('estado.not_specified') }}</p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="mb-1 fw-bold">{{ __('estado.current_status') }}</p>
                        <div class="estado-timeline">
                            <div class="d-flex justify-content-between position-relative mb-1">
                                <div class="estado-punto {{ $estado['estado'] == __('estado.status_received') ? 'activo' : ($estado['estado'] == __('estado.status_in_repair') || $estado['estado'] == __('estado.status_completed') || $estado['estado'] == __('estado.status_delivered') ? 'completado' : '') }}">
                                    <i class="bi bi-box"></i>
                                </div>
                                <div class="estado-punto {{ $estado['estado'] == __('estado.status_in_repair') ? 'activo' : ($estado['estado'] == __('estado.status_completed') || $estado['estado'] == __('estado.status_delivered') ? 'completado' : '') }}">
                                    <i class="bi bi-tools"></i>
                                </div>
                                <div class="estado-punto {{ $estado['estado'] == __('estado.status_completed') ? 'activo' : ($estado['estado'] == __('estado.status_delivered') ? 'completado' : '') }}">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                                <div class="estado-punto {{ $estado['estado'] == __('estado.status_delivered') ? 'activo' : '' }}">
                                    <i class="bi bi-truck"></i>
                                </div>
                                <div class="estado-linea position-absolute"></div>
                            </div>
                            <div class="d-flex justify-content-between text-center">
                                <div class="estado-texto {{ $estado['estado'] == __('estado.status_received') ? 'activo' : ($estado['estado'] == __('estado.status_in_repair') || $estado['estado'] == __('estado.status_completed') || $estado['estado'] == __('estado.status_delivered') ? 'completado' : '') }}">{{ __('estado.status_received_short') }}</div>
                                <div class="estado-texto {{ $estado['estado'] == __('estado.status_in_repair') ? 'activo' : ($estado['estado'] == __('estado.status_completed') || $estado['estado'] == __('estado.status_delivered') ? 'completado' : '') }}">{{ __('estado.status_in_repair_short') }}</div>
                                <div class="estado-texto {{ $estado['estado'] == __('estado.status_completed') ? 'activo' : ($estado['estado'] == __('estado.status_delivered') ? 'completado' : '') }}">{{ __('estado.status_completed_short') }}</div>
                                <div class="estado-texto {{ $estado['estado'] == __('estado.status_delivered') ? 'activo' : '' }}">{{ __('estado.status_delivered_short') }}</div>
                            </div>
                        </div>
                    </div>

                    @if(isset($estado['calibrado']) && ($estado['estado'] == __('estado.status_completed') || $estado['estado'] == __('estado.status_delivered')))
                    <div class="mb-4">
                        <p class="mb-1 fw-bold">{{ __('estado.calibration_status') }}</p>
                        @if($estado['calibrado'] === null)
                            <div class="badge bg-secondary p-2 mb-2">{{ __('estado.not_specified') }}</div>
                        @elseif($estado['calibrado'])
                            <div class="badge bg-success p-2 mb-2">{{ __('estado.calibrated') }}</div>
                            @if(isset($estado['fecha_proxima_calibracion']))
                            <div class="mt-3">
                                <p class="mb-1 fw-bold">{{ __('estado.next_calibration_date') }}</p>
                                <p>{{ $estado['fecha_proxima_calibracion'] }}</p>
                            </div>
                            @endif
                        @else
                            <div class="badge bg-danger p-2 mb-2">{{ __('estado.not_calibrated') }}</div>
                        @endif
                    </div>
                    @endif

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('estado') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> {{ __('estado.back') }}
                        </a>
                        <a href="{{ route('estado.pdf', $estado['referencia']) }}" class="btn btn-outline-primary">
                            <i class="bi bi-printer me-1"></i> {{ __('estado.print_result') }}
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
                <p class="text-muted">{{ __('estado.questions') }} <a href="{{ route('inicio') }}#contact">{{ __('estado.contact_us') }}</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
