@extends('layout')

@section('content')
<main id="main">
    <!-- Sección de Cabecera con Fondo -->
    <section class="policy-header py-5" style="background: linear-gradient(rgba(40, 58, 90, 0.9), rgba(40, 58, 90, 0.9)), url('{{ asset('img/policy-bg.jpg') }}') center/cover no-repeat; min-height: 200px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="text-white mb-3 fw-bold">Políticas de Privacidad</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('inicio') }}" class="text-white-50">Inicio</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Políticas de Privacidad</li>
                </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenido Principal -->
    <section class="policy-content py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Tarjeta de Introducción -->
                    <div class="card border-0 shadow-sm rounded-lg mb-5">
                        <div class="card-body p-4 p-lg-5">
                            <div class="text-center mb-5">
                                <i class="fa fa-shield-alt text-primary" style="font-size: 3rem;"></i>
                                <h2 class="mt-3 mb-2 fw-bold">Protegemos tu Privacidad</h2>
                                <p class="text-muted mb-0">Última actualización: {{ date('d/m/Y') }}</p>
                                <hr class="my-4 w-25 mx-auto">
                                <p class="lead">En INDARCA nos comprometemos a proteger tus datos personales con los más altos estándares de seguridad y transparencia.</p>
                            </div>
                        </div>
                            </div>

                    <!-- Navegación Rápida -->
                    <div class="card border-0 shadow-sm rounded-lg mb-5">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-3"><i class="fa fa-list me-2 text-primary"></i>Navegación Rápida</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="nav flex-column policy-nav">
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#introduccion">
                                                <i class="fa fa-info-circle me-2 text-primary"></i>
                                                <span>Introducción</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#responsable">
                                                <i class="fa fa-user-tie me-2 text-primary"></i>
                                                <span>Responsable del Tratamiento</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#datos">
                                                <i class="fa fa-database me-2 text-primary"></i>
                                                <span>Datos que Recopilamos</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#como-recopilamos">
                                                <i class="fa fa-clipboard-list me-2 text-primary"></i>
                                                <span>Cómo Recopilamos sus Datos</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#finalidad">
                                                <i class="fa fa-bullseye me-2 text-primary"></i>
                                                <span>Finalidad y Base Legal</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#destinatarios">
                                                <i class="fa fa-share-alt me-2 text-primary"></i>
                                                <span>Destinatarios de los Datos</span>
                                            </a>
                                        </li>
                                </ul>
                            </div>
                                <div class="col-md-6">
                                    <ul class="nav flex-column policy-nav">
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#transferencias">
                                                <i class="fa fa-globe me-2 text-primary"></i>
                                                <span>Transferencias Internacionales</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#conservacion">
                                                <i class="fa fa-clock me-2 text-primary"></i>
                                                <span>Conservación de Datos</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#derechos">
                                                <i class="fa fa-check-circle me-2 text-primary"></i>
                                                <span>Sus Derechos</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#cookies">
                                                <i class="fa fa-cookie me-2 text-primary"></i>
                                                <span>Cookies</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#cambios">
                                                <i class="fa fa-sync-alt me-2 text-primary"></i>
                                                <span>Cambios en esta Política</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#contacto">
                                                <i class="fa fa-envelope me-2 text-primary"></i>
                                                <span>Contacto</span>
                                            </a>
                                        </li>
                                </ul>
                            </div>
                            </div>
                        </div>
                            </div>

                    <!-- Secciones de Políticas -->
                    <div class="accordion shadow-sm rounded-lg overflow-hidden mb-5" id="politicasAccordion">
                        <!-- Sección 1: Introducción -->
                        <div class="accordion-item border-0" id="introduccion">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-info-circle me-2 text-primary"></i> 1. Introducción
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#politicasAccordion">
                                <div class="accordion-body bg-light">
                                    <div class="card border-0 shadow-sm mb-0">
                                        <div class="card-body p-4">
                                            <p>En INDARCA valoramos su privacidad y nos comprometemos a proteger sus datos personales. Esta política de privacidad le informará sobre cómo cuidamos sus datos personales cuando visita nuestro sitio web y le informará sobre sus derechos de privacidad y cómo la ley lo protege.</p>
                                            <p class="mb-0">Le invitamos a leer detenidamente esta política de privacidad junto con nuestros términos y condiciones para entender completamente cómo recopilamos, utilizamos y protegemos su información personal.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        <!-- Sección 2: Responsable del Tratamiento -->
                        <div class="accordion-item border-0" id="responsable">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fa fa-user-tie me-2 text-primary"></i> 2. Responsable del Tratamiento
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#politicasAccordion">
                                <div class="accordion-body bg-light">
                                    <div class="card border-0 shadow-sm mb-0">
                                        <div class="card-body p-4">
                                            <p>INDARCA es el responsable del tratamiento de los datos personales que nos proporcione a través de este sitio web.</p>
                                            <div class="bg-white p-4 rounded-3 mt-3">
                                                <h5 class="fw-bold">Datos de contacto:</h5>
                                                <div class="row mt-3">
                                                    <div class="col-md-4 mb-3 mb-md-0">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fa fa-map-marker-alt text-primary me-3" style="font-size: 1.5rem;"></i>
                                                            <div>
                                                                <h6 class="mb-1 fw-bold">Dirección</h6>
                                                                <p class="mb-0">C. C 16, Santo Domingo Este 11506, República Dominicana</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3 mb-md-0">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fa fa-phone text-primary me-3" style="font-size: 1.5rem;"></i>
                                                            <div>
                                                                <h6 class="mb-1 fw-bold">Teléfono</h6>
                                                                <p class="mb-0">+1809 596 0333</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fa fa-envelope text-primary me-3" style="font-size: 1.5rem;"></i>
                                                            <div>
                                                                <h6 class="mb-1 fw-bold">Email</h6>
                                                                <p class="mb-0">contacto@indarca.com</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        <!-- Sección 3: Datos que Recopilamos -->
                        <div class="accordion-item border-0" id="datos">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="fa fa-database me-2 text-primary"></i> 3. Datos que Recopilamos
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#politicasAccordion">
                                <div class="accordion-body bg-light">
                                    <div class="card border-0 shadow-sm mb-0">
                                        <div class="card-body p-4">
                                            <p>Podemos recopilar, utilizar, almacenar y transferir diferentes tipos de datos personales sobre usted, que hemos agrupado de la siguiente manera:</p>
                                            <div class="row g-4 mt-2">
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-user text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">Datos de identidad</h5>
                                                            </div>
                                                            <p class="card-text mb-0">Nombre, apellidos, nombre de usuario o identificador similar.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-envelope text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">Datos de contacto</h5>
                                                            </div>
                                                            <p class="card-text mb-0">Dirección de correo electrónico, número de teléfono y dirección postal.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-laptop text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">Datos técnicos</h5>
                                                            </div>
                                                            <p class="card-text mb-0">Dirección IP, datos de inicio de sesión, tipo de navegador, información sobre su dispositivo.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-chart-bar text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">Datos de uso</h5>
                                                            </div>
                                                            <p class="card-text mb-0">Información sobre cómo utiliza nuestro sitio web y servicios.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-user-circle text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">Datos de perfil</h5>
                                                            </div>
                                                            <p class="card-text mb-0">Su nombre de usuario y contraseña, sus interacciones con nuestro sitio.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        <!-- Resto de secciones en formato de acordeón similar -->
                        <div class="accordion-item border-0" id="como-recopilamos">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <i class="fa fa-clipboard-list me-2 text-primary"></i> 4. Cómo Recopilamos sus Datos
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#politicasAccordion">
                                <div class="accordion-body bg-light">
                                    <div class="card border-0 shadow-sm mb-0">
                                        <div class="card-body p-4">
                                            <p>Utilizamos diferentes métodos para recopilar datos de y sobre usted, incluidos:</p>
                                            <div class="row g-4 mt-2">
                                                <div class="col-md-4">
                                                    <div class="card h-100 border-0 shadow-sm text-center">
                                                        <div class="card-body p-4">
                                                            <div class="icon-circle bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                                                <i class="fa fa-comments text-primary fs-4"></i>
                                                            </div>
                                                            <h5 class="card-title fw-bold">Interacciones directas</h5>
                                                            <p class="card-text">Datos que proporciona al completar formularios en nuestro sitio web, crear una cuenta o solicitar información.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card h-100 border-0 shadow-sm text-center">
                                                        <div class="card-body p-4">
                                                            <div class="icon-circle bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                                                <i class="fa fa-cogs text-primary fs-4"></i>
                                                            </div>
                                                            <h5 class="card-title fw-bold">Tecnologías automatizadas</h5>
                                                            <p class="card-text">Datos técnicos recopilados automáticamente cuando interactúa con nuestro sitio web mediante cookies.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card h-100 border-0 shadow-sm text-center">
                                                        <div class="card-body p-4">
                                                            <div class="icon-circle bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                                                <i class="fa fa-users text-primary fs-4"></i>
                                                            </div>
                                                            <h5 class="card-title fw-bold">Terceros</h5>
                                                            <p class="card-text">Datos personales recibidos de diversos terceros como proveedores de análisis o redes publicitarias.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        <!-- Sección 5: Finalidad y Base Legal -->
                        <div class="accordion-item border-0" id="finalidad">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <i class="fa fa-bullseye me-2 text-primary"></i> 5. Finalidad y Base Legal
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#politicasAccordion">
                                <div class="accordion-body bg-light">
                                    <div class="card border-0 shadow-sm mb-0">
                                        <div class="card-body p-4">
                                            <p>Solo utilizaremos sus datos personales cuando la ley nos lo permita. Las bases legales en las que nos apoyamos para procesar su información personal incluyen:</p>
                                            <div class="row g-4 mt-2">
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-check-square text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">Consentimiento</h5>
                                                            </div>
                                                            <p class="card-text mb-0">Cuando ha dado su consentimiento para el procesamiento de sus datos personales.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-file-contract text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">Ejecución de un contrato</h5>
                                                            </div>
                                                            <p class="card-text mb-0">Cuando el procesamiento es necesario para cumplir con un contrato que tenemos con usted.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-balance-scale text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">Obligación legal</h5>
                                                            </div>
                                                            <p class="card-text mb-0">Cuando el procesamiento es necesario para cumplir con una obligación legal.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-lightbulb text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">Interés legítimo</h5>
                                                            </div>
                                                            <p class="card-text mb-0">Cuando el procesamiento es necesario para nuestros intereses legítimos y sus derechos fundamentales no prevalecen.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        <!-- Agrega las secciones restantes siguiendo el mismo formato -->
                        <!-- Destinatarios, Transferencias, Conservación, Derechos, Cookies, Cambios -->
                            </div>

                    <!-- Sección de Contacto Rápido -->
                    <div class="card border-0 shadow-sm rounded-lg mb-5" id="contacto">
                        <div class="card-body p-4 p-lg-5">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <h3 class="fw-bold mb-3">¿Tienes preguntas sobre tu privacidad?</h3>
                                    <p class="mb-0">Estamos aquí para ayudarte. Contáctanos si necesitas más información sobre cómo protegemos tus datos personales.</p>
                                </div>
                                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                                    <a href="mailto:contacto@indarca.com" class="btn btn-primary btn-lg rounded-pill"><i class="fa fa-envelope me-2"></i>Contáctanos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@push('styles')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    /* Estilos personalizados para políticas */
    .policy-nav .nav-link {
        color: #495057;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        transition: all 0.3s ease;
    }

    .policy-nav .nav-link:hover {
        background-color: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
    }

    .accordion-button:not(.collapsed) {
        color: #0d6efd;
        background-color: rgba(13, 110, 253, 0.1);
        box-shadow: none;
    }

    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(13, 110, 253, 0.25);
    }

    .icon-circle {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    .icon-box {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Scroll suave para anclas
        document.querySelectorAll('.policy-nav a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    // Abrir el acordeón correspondiente
                    const accordionButton = targetElement.querySelector('.accordion-button');
                    if (accordionButton && accordionButton.classList.contains('collapsed')) {
                        accordionButton.click();
                    }

                    // Desplazamiento suave
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
    });
</script>
@endpush
@endsection
