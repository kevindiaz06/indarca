@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0"><i class="bi bi-journal-text me-2"></i>Historial de Incidencias</h4>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted mb-4">A continuación se muestra el historial de todas las incidencias relacionadas con su correo electrónico.</p>

                    @if($densimetros->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Referencia</th>
                                        <th>Nº Serie</th>
                                        <th>Marca/Modelo</th>
                                        <th>Fecha Entrada</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($densimetros as $densimetro)
                                    <tr>
                                        <td><span class="badge bg-primary">{{ $densimetro->referencia_reparacion }}</span></td>
                                        <td>{{ $densimetro->numero_serie }}</td>
                                        <td>
                                            {{ $densimetro->marca ?: 'No especificada' }}
                                            <small class="d-block text-muted">{{ $densimetro->modelo ?: 'No especificado' }}</small>
                                        </td>
                                        <td>{{ $densimetro->fecha_entrada->format('d/m/Y') }}</td>
                                        <td>
                                            @if($densimetro->estado == 'recibido')
                                                <span class="badge bg-info">Recibido</span>
                                            @elseif($densimetro->estado == 'en_reparacion')
                                                <span class="badge bg-warning">En reparación</span>
                                            @elseif($densimetro->estado == 'finalizado')
                                                <span class="badge bg-success">Finalizado</span>
                                            @elseif($densimetro->estado == 'entregado')
                                                <span class="badge bg-secondary">Entregado</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $densimetro->estado }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detalleModal{{ $densimetro->id }}">
                                                <i class="bi bi-eye"></i> Ver detalles
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            No se encontraron incidencias asociadas a su correo electrónico.
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-4 text-center">
                <p class="text-muted">¿Tiene alguna pregunta? <a href="{{ route('inicio') }}#contact">Contáctenos</a></p>
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
                    Detalles del Densímetro #{{ $densimetro->referencia_reparacion }}
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <p class="mb-1 fw-bold">Número de Serie</p>
                        <p>{{ $densimetro->numero_serie }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1 fw-bold">Fecha de Entrada</p>
                        <p>{{ $densimetro->fecha_entrada->format('d/m/Y') }}</p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <p class="mb-1 fw-bold">Marca</p>
                        <p>{{ $densimetro->marca ?: 'No especificada' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1 fw-bold">Modelo</p>
                        <p>{{ $densimetro->modelo ?: 'No especificado' }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <p class="mb-1 fw-bold">Estado Actual</p>
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
                            <div class="estado-texto {{ $densimetro->estado == 'recibido' ? 'activo' : ($densimetro->estado == 'en_reparacion' || $densimetro->estado == 'finalizado' || $densimetro->estado == 'entregado' ? 'completado' : '') }}">Recibido</div>
                            <div class="estado-texto {{ $densimetro->estado == 'en_reparacion' ? 'activo' : ($densimetro->estado == 'finalizado' || $densimetro->estado == 'entregado' ? 'completado' : '') }}">En reparación</div>
                            <div class="estado-texto {{ $densimetro->estado == 'finalizado' ? 'activo' : ($densimetro->estado == 'entregado' ? 'completado' : '') }}">Finalizado</div>
                            <div class="estado-texto {{ $densimetro->estado == 'entregado' ? 'activo' : '' }}">Entregado</div>
                        </div>
                    </div>
                </div>

                @if($densimetro->observaciones)
                <div class="mb-4">
                    <p class="mb-1 fw-bold">Observaciones</p>
                    <div class="border rounded p-3 bg-light">
                        {{ $densimetro->observaciones }}
                    </div>
                </div>
                @endif

                @if($densimetro->fecha_finalizacion)
                <div class="mb-4">
                    <p class="mb-1 fw-bold">Fecha de Finalización</p>
                    <p>{{ $densimetro->fecha_finalizacion->format('d/m/Y') }}</p>
                </div>
                @endif

                @if(($densimetro->estado == 'finalizado' || $densimetro->estado == 'entregado'))
                <div class="mb-4">
                    <p class="mb-1 fw-bold">Estado de Calibración</p>
                    @if($densimetro->calibrado === null)
                        <span class="badge bg-secondary p-2">No especificado</span>
                    @elseif($densimetro->calibrado)
                        <span class="badge bg-success p-2">Calibrado</span>
                        @if($densimetro->fecha_proxima_calibracion)
                        <div class="mt-3">
                            <p class="mb-1 fw-bold">Próxima fecha de calibración</p>
                            <p>{{ $densimetro->fecha_proxima_calibracion instanceof \DateTime ? $densimetro->fecha_proxima_calibracion->format('d/m/Y') : ($densimetro->fecha_proxima_calibracion ?: 'No especificada') }}</p>
                        </div>
                        @endif
                    @else
                        <span class="badge bg-danger p-2">No calibrado</span>
                    @endif
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="window.print()">
                    <i class="bi bi-printer me-1"></i> Imprimir
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
