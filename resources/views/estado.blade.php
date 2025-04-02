@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-primary py-3">
                    <h4 class="mb-0 text-white"><i class="bi bi-clipboard-data me-2"></i>Consulta de Estado de Densímetros</h4>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted mb-4">Introduzca la referencia de reparación que recibió por correo electrónico para consultar el estado actual de su densímetro.</p>

                    <form action="{{ route('estado.consultar') }}" method="POST" class="mb-4">
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

                    @if(isset($estado))
                    <div class="border-top pt-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h5 class="mb-0">Resultado de la Consulta</h5>
                            <span class="badge bg-primary">{{ $estado['referencia'] }}</span>
                        </div>

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

                        @if($estado['observaciones'])
                        <div class="mb-4">
                            <p class="mb-1 fw-bold">Observaciones</p>
                            <div class="border rounded p-3 bg-light">
                                {{ $estado['observaciones'] }}
                            </div>
                        </div>
                        @endif

                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary" onclick="window.print()">
                                <i class="bi bi-printer me-1"></i> Imprimir Resultado
                            </button>
                        </div>
                    </div>
                    @elseif($errors->any())
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        {{ $errors->first() }}
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
@endsection
