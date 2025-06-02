@extends('layout')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-primary">Demo Banner de Cookies</h1>
                <p class="lead text-muted">Esta página demuestra el funcionamiento del banner de cookies</p>
            </div>

            <div class="card shadow-lg border-0">
                <div class="card-body p-5">
                    <h3 class="mb-4">¿Cómo funciona el banner?</h3>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; flex-shrink: 0;">
                                    <i class="bi bi-eye"></i>
                                </div>
                                <div>
                                    <h5>Aparición Automática</h5>
                                    <p class="text-muted small">El banner aparece automáticamente 1 segundo después de cargar la página si no se ha aceptado previamente.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; flex-shrink: 0;">
                                    <i class="bi bi-lock"></i>
                                </div>
                                <div>
                                    <h5>Bloqueo de Scroll</h5>
                                    <p class="text-muted small">Mientras el banner esté visible, el scroll de la página está desactivado hasta aceptar las cookies.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; flex-shrink: 0;">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                                <div>
                                    <h5>Guardado Persistente</h5>
                                    <p class="text-muted small">Una vez aceptado, se guarda en localStorage y no volverá a mostrarse.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; flex-shrink: 0;">
                                    <i class="bi bi-phone"></i>
                                </div>
                                <div>
                                    <h5>Diseño Responsivo</h5>
                                    <p class="text-muted small">Se adapta perfectamente a dispositivos móviles y tablets con un diseño elegante.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Funciones Adicionales</h4>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Animación suave de entrada y salida
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Efecto de blur en el fondo
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Accesibilidad mejorada (tecla Escape)
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Prevención de scroll táctil en móviles
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Evento personalizado para analytics
                        </li>
                    </ul>

                    <div class="mt-4 p-3 bg-light rounded">
                        <h5>Para probar el banner nuevamente:</h5>
                        <p class="mb-2 small">Ejecuta este código en la consola del navegador:</p>
                        <code class="small">localStorage.removeItem('cookies-accepted'); location.reload();</code>
                    </div>
                </div>
            </div>

            <!-- Contenido adicional para probar el scroll -->
            <div class="mt-5">
                <h3>Contenido de Prueba</h3>
                <p>Este es contenido adicional para probar que el scroll funciona correctamente después de aceptar las cookies.</p>

                @for($i = 1; $i <= 10; $i++)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>Sección {{ $i }}</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection
