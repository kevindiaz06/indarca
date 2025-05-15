@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            @if(session('login_success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <strong><i class="bi bi-check-circle me-2"></i>{{ __('general.welcome') }}!</strong> {{ __('general.login_success_message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0"><i class="bi bi-person-check me-2"></i>{{ __('general.client_panel') }}</h4>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted mb-4">{{ __('general.welcome_panel') }}</p>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-journal-text text-primary me-2"></i>{{ __('general.my_densimeters') }}</h5>
                                    <p class="card-text">{{ __('general.review_status') }}</p>
                                    <a href="{{ route('usuario.historial-incidencias') }}" class="btn btn-outline-primary">{{ __('general.view_densimeters') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-person text-primary me-2"></i>{{ __('general.my_profile') }}</h5>
                                    <p class="card-text">{{ __('general.update_personal_info') }}</p>
                                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">{{ __('general.edit_profile') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="mb-3 border-bottom pb-2"><i class="bi bi-clock-history me-2"></i>{{ __('general.recent_activity') }}</h5>

                    @if($densimetros->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>{{ __('general.reference') }}</th>
                                        <th>{{ __('general.serial_number_short') }}</th>
                                        <th>{{ __('general.entry_date') }}</th>
                                        <th>{{ __('general.status') }}</th>
                                        <th>{{ __('general.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($densimetros->take(5) as $densimetro)
                                    <tr>
                                        <td><span class="badge bg-primary">{{ $densimetro->referencia_reparacion }}</span></td>
                                        <td>{{ $densimetro->numero_serie }}</td>
                                        <td>{{ $densimetro->fecha_entrada->format('d/m/Y') }}</td>
                                        <td>
                                            @if($densimetro->estado == 'recibido')
                                                <span class="badge bg-info">{{ __('general.received') }}</span>
                                            @elseif($densimetro->estado == 'en_reparacion')
                                                <span class="badge bg-warning">{{ __('general.in_repair') }}</span>
                                            @elseif($densimetro->estado == 'finalizado')
                                                <span class="badge bg-success">{{ __('general.completed') }}</span>
                                            @elseif($densimetro->estado == 'entregado')
                                                <span class="badge bg-secondary">{{ __('general.delivered') }}</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $densimetro->estado }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detalleModal{{ $densimetro->id }}">
                                                <i class="bi bi-eye"></i> {{ __('general.view_details') }}
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @if($densimetros->count() > 5)
                                <div class="text-center mt-3">
                                    <a href="{{ route('usuario.historial-incidencias') }}" class="btn btn-primary">{{ __('general.view_all_densimeters') }}</a>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            {{ __('general.no_densimeters_found') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-4 text-center">
                <p class="text-muted">{{ __('general.questions') }} <a href="{{ route('contacto') }}">{{ __('general.contact_us_link') }}</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Modales para detalles -->
@foreach($densimetros as $densimetro)
<div class="modal fade" id="detalleModal{{ $densimetro->id }}" tabindex="-1" aria-labelledby="detalleModalLabel{{ $densimetro->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="detalleModalLabel{{ $densimetro->id }}">
                    {{ __('general.densimeter_details') }} #{{ $densimetro->referencia_reparacion }}
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <p class="mb-1 fw-bold">{{ __('general.serial_number') }}</p>
                        <p>{{ $densimetro->numero_serie }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1 fw-bold">{{ __('general.entry_date') }}</p>
                        <p>{{ $densimetro->fecha_entrada->format('d/m/Y') }}</p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <p class="mb-1 fw-bold">{{ __('general.brand') }}</p>
                        <p>{{ $densimetro->marca ?: __('general.not_specified_f') }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1 fw-bold">{{ __('general.model') }}</p>
                        <p>{{ $densimetro->modelo ?: __('general.not_specified_m') }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <p class="mb-1 fw-bold">{{ __('general.current_status') }}</p>
                    <div class="estado-timeline">
                        <div class="d-flex justify-content-between position-relative mb-1">
                            <div class="estado-punto {{ $densimetro->estado == 'recibido' ? 'activo' : ($densimetro->estado == 'en_reparacion' || $densimetro->estado == 'finalizado' || $densimetro->estado == 'entregado' ? 'completado' : '') }}">
                                <i class="bi bi-box"></i>
                            </div>
                            <div class="estado-punto {{ $densimetro->estado == 'en_reparacion' ? 'activo' : ($densimetro->estado == 'finalizado' || $densimetro->estado == 'entregado' ? 'completado' : '') }}">
                                <i class="bi bi-tools"></i>
                            </div>
                            <div class="estado-punto {{ $densimetro->estado == 'finalizado' ? 'activo' : ($densimetro->estado == 'entregado' ? 'completado' : '') }}">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div class="estado-punto {{ $densimetro->estado == 'entregado' ? 'activo' : '' }}">
                                <i class="bi bi-truck"></i>
                            </div>
                            <div class="estado-linea position-absolute"></div>
                        </div>
                        <div class="d-flex justify-content-between text-center">
                            <div class="estado-texto {{ $densimetro->estado == 'recibido' ? 'activo' : ($densimetro->estado == 'en_reparacion' || $densimetro->estado == 'finalizado' || $densimetro->estado == 'entregado' ? 'completado' : '') }}">{{ __('general.received') }}</div>
                            <div class="estado-texto {{ $densimetro->estado == 'en_reparacion' ? 'activo' : ($densimetro->estado == 'finalizado' || $densimetro->estado == 'entregado' ? 'completado' : '') }}">{{ __('general.in_repair') }}</div>
                            <div class="estado-texto {{ $densimetro->estado == 'finalizado' ? 'activo' : ($densimetro->estado == 'entregado' ? 'completado' : '') }}">{{ __('general.completed') }}</div>
                            <div class="estado-texto {{ $densimetro->estado == 'entregado' ? 'activo' : '' }}">{{ __('general.delivered') }}</div>
                        </div>
                    </div>
                </div>

                @if($densimetro->observaciones)
                <div class="mb-4">
                    <p class="mb-1 fw-bold">{{ __('general.observations') }}</p>
                    <div class="border rounded p-3 bg-light">
                        {{ $densimetro->observaciones }}
                    </div>
                </div>
                @endif

                @if($densimetro->fecha_finalizacion)
                <div class="mb-4">
                    <p class="mb-1 fw-bold">{{ __('general.completion_date') }}</p>
                    <p>{{ $densimetro->fecha_finalizacion->format('d/m/Y') }}</p>
                </div>
                @endif

                @if(($densimetro->estado == 'finalizado' || $densimetro->estado == 'entregado'))
                <div class="mb-4">
                    <p class="mb-1 fw-bold">{{ __('general.calibration_status') }}</p>
                    @if($densimetro->calibrado === null)
                        <span class="badge bg-secondary p-2">{{ __('general.not_specified') }}</span>
                    @elseif($densimetro->calibrado)
                        <span class="badge bg-success p-2">{{ __('general.calibrated') }}</span>
                        @if($densimetro->fecha_proxima_calibracion)
                        <div class="mt-3">
                            <p class="mb-1 fw-bold">{{ __('general.next_calibration_date') }}</p>
                            <p>{{ $densimetro->fecha_proxima_calibracion instanceof \DateTime ? $densimetro->fecha_proxima_calibracion->format('d/m/Y') : ($densimetro->fecha_proxima_calibracion ?: __('general.not_specified_f')) }}</p>
                        </div>
                        @endif
                    @else
                        <span class="badge bg-danger p-2">{{ __('general.not_calibrated') }}</span>
                    @endif
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('general.close') }}</button>
                <a href="{{ route('estado.pdf', $densimetro->referencia_reparacion) }}" class="btn btn-primary">
                    <i class="bi bi-printer me-1"></i> {{ __('general.print') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
