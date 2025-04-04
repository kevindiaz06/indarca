@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            @if(session('login_success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <strong><i class="bi bi-check-circle me-2"></i>¡Bienvenido!</strong> Has iniciado sesión correctamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0"><i class="bi bi-person-check me-2"></i>Panel de Cliente</h4>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted mb-4">Bienvenido a su panel de cliente. Aquí puede gestionar sus densímetros y ver el historial de servicios.</p>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-journal-text text-primary me-2"></i>Mis Densímetros</h5>
                                    <p class="card-text">Revise el estado de sus densímetros y su historial de reparaciones.</p>
                                    <a href="{{ route('usuario.historial-incidencias') }}" class="btn btn-outline-primary">Ver densímetros</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-person text-primary me-2"></i>Mi Perfil</h5>
                                    <p class="card-text">Actualice su información personal y contraseña.</p>
                                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">Editar perfil</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="mb-3 border-bottom pb-2"><i class="bi bi-clock-history me-2"></i>Actividad Reciente</h5>

                    @if($densimetros->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Referencia</th>
                                        <th>Nº Serie</th>
                                        <th>Fecha Entrada</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
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

                            @if($densimetros->count() > 5)
                                <div class="text-center mt-3">
                                    <a href="{{ route('usuario.historial-incidencias') }}" class="btn btn-primary">Ver todos los densímetros</a>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            No se encontraron densímetros asociados a su cuenta. Si tiene densímetros en reparación, contacte con nosotros.
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-4 text-center">
                <p class="text-muted">¿Tiene alguna pregunta? <a href="{{ route('contacto') }}">Contáctenos</a></p>
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
