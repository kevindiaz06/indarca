@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-danger py-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 text-white"><i class="bi bi-info-circle me-2"></i>{{ __('estado.calibration_info') }}</h4>
                        <span class="badge bg-light text-danger fs-6">{{ $calibracion['numero_serie'] }}</span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="mb-1 fw-bold">{{ __('estado.brand') }}</p>
                            <p>{{ $calibracion['marca'] ?: __('estado.not_specified') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1 fw-bold">{{ __('estado.model') }}</p>
                            <p>{{ $calibracion['modelo'] ?: __('estado.not_specified') }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p class="mb-1 fw-bold">{{ __('estado.last_revision') }}</p>
                            <p>{{ $calibracion['ultima_revision'] ?: __('estado.not_available') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1 fw-bold">{{ __('estado.calibration_status') }}</p>
                            @if($calibracion['estado_calibracion'] === true)
                                <span class="badge bg-success p-2">{{ __('estado.calibrated') }}</span>
                            @elseif($calibracion['estado_calibracion'] === false)
                                <span class="badge bg-danger p-2">{{ __('estado.not_calibrated') }}</span>
                            @else
                                <span class="badge bg-secondary p-2">{{ __('estado.not_available') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="mb-1 fw-bold">{{ __('estado.next_calibration') }}</p>
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
                                    {!! __('estado.days_remaining', ['days' => (int)$diasRestantes]) !!}
                                </div>
                            @elseif($diasRestantes > 0)
                                <div class="alert alert-warning">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                    {!! __('estado.days_remaining_warning', ['days' => (int)$diasRestantes]) !!}
                                </div>
                            @else
                                <div class="alert alert-danger">
                                    <i class="bi bi-x-circle-fill me-2"></i>
                                    {!! __('estado.calibration_expired', ['days' => abs((int)$diasRestantes)]) !!}
                                </div>
                            @endif
                        @else
                            <p>{{ __('estado.not_scheduled') }}</p>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('estado') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> {{ __('estado.back') }}
                        </a>
                        <a href="{{ route('calibracion.pdf', ['numero_serie' => $calibracion['numero_serie'], 'marca' => $calibracion['marca'], 'modelo' => $calibracion['modelo']]) }}" class="btn btn-outline-danger">
                            <i class="bi bi-printer me-1"></i> {{ __('estado.print_info') }}
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
