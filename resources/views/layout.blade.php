<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>INDARCA</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="https://indarca.net/wp-content/uploads/2019/03/Favicon-3.ico" rel="icon">

    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/carousel.css') }}" rel="stylesheet">

    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Lightbox CSS para visualización de imágenes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">

    <!-- Estilos personalizados para el tema monocromático -->
    <style>
        :root {
            --color-primary: #F40006;
            --color-dark: #292929;
            --color-light: #FFFFFF;
            --color-primary-light: rgba(244, 0, 6, 0.1);
            --color-primary-medium: rgba(244, 0, 6, 0.5);
            --color-dark-light: rgba(41, 41, 41, 0.8);
            --color-dark-medium: rgba(41, 41, 41, 0.5);
            --color-dark-subtle: rgba(41, 41, 41, 0.1);
            --color-gray: #292929;
            --color-gray-light: #f8f9fa;
        }

        /* Redefinir clases de Bootstrap */
        .btn-primary {
            background-color: var(--color-primary);
            border-color: var(--color-primary);
        }

        .btn-primary:hover, .btn-primary:focus {
            background-color: #d30005;
            border-color: #d30005;
        }

        .btn-outline-primary {
            color: var(--color-primary);
            border-color: var(--color-primary);
        }

        .btn-outline-primary:hover, .btn-outline-primary:focus {
            background-color: var(--color-primary);
            border-color: var(--color-primary);
        }

        .text-primary {
            color: var(--color-primary) !important;
        }

        .bg-primary {
            background-color: var(--color-primary) !important;
        }

        .border-primary {
            border-color: var(--color-primary) !important;
        }

        .btn-danger {
            background-color: var(--color-primary);
            border-color: var(--color-primary);
        }

        .btn-danger:hover, .btn-danger:focus {
            background-color: #d30005;
            border-color: #d30005;

        }

        .text-danger {
            color: var(--color-primary) !important;
        }

        .border-danger {
            border-color: var(--color-primary) !important;
        }

        /* Estilo elegante para elementos clave */
        .sitename {
            font-weight: 700;
            letter-spacing: 1px;
        }

        /* Estilo monocromático para el header */
        .topbar {
            background-color: var(--color-dark);
        }

        .branding {
            background-color: var(--color-light);
        }
    </style>
</head>
<header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a
                        href="mailto:contact@example.com">contacto@indarca.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1809 596 0333</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="https://x.com/indarca_srl?s=11" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="https://www.facebook.com/share/1EJq41gUNs/?mibextid=wwXIfr" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/indarca.srl?igsh=MXZzN2l3cTBxaG1jOA==" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://www.linkedin.com/company/indarca-srl/" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-cente">

        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('inicio') }}" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!--   <img src="assets/img/logo_indarca.png" alt=""> -->
                <h1 class="sitename">INDARCA</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('inicio') }}" class="active">Inicio</a></li>
                    <li class="dropdown"><a href="{{ route('sobreNosotros') }}" class="{{ request()->routeIs('sobreNosotros') ? 'active' : '' }}">
                        <span>Sobre Nosotros</span>
                        <i class="bi bi-chevron-down toggle-dropdown"></i>
                    </a>
                        <ul>
                            <li><a href="{{ route('sobreNosotros') }}#Historia">Historia</a></li>
                            <li><a href="{{ route('sobreNosotros') }}#MisionVisionValores">Misión, visión y valores</a></li>
                            <li><a href="{{ route('sobreNosotros') }}#team">Equipo</a></li>
                            <li><a href="{{ route('sobreNosotros') }}#reconocimientos">Reconocimientos y certificaciones</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="{{ route('densimetros') }}"><span>Densímetros Nucleares</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Información General</a></li>
                            <li><a href="#">Servicios</a></li>
                            <li><a href="#">Marcas y Modelos</a></li>
                            <li><a href="#">Preguntas Frecuentes</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="{{ route('arquitectura') }}"><span>Arquitectura e Ingeniería</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Proyectos Realizados</a></li>
                            <li><a href="#">Servicios</a></li>
                            <li><a href="#">Asesoría Técnica</a></li>
                            <li><a href="#">Galería</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('inicio') }}#contact">Contacto</a></li>
                </ul>

                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="auth-buttons d-flex align-items-center">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary me-2">
                        <i class="bi bi-box-arrow-in-right me-1"></i>Iniciar Sesión
                    </a>
                    <a href="/estado" class="btn btn-sm btn-primary">
                        <i class="bi bi-clipboard-data me-1"></i>Estado
                    </a>
                @else
                    @if(Auth::user()->isStaff())
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-primary me-2">
                        <i class="bi bi-speedometer2 me-1"></i>Panel Admin
                    </a>
                    @endif
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            @if(Auth::user()->role === 'cliente')
                                <li><a class="dropdown-item" href="{{ route('cliente.historial') }}"><i class="bi bi-speedometer2 me-2"></i>Panel de Cliente</a></li>
                                <li><hr class="dropdown-divider"></li>
                            @endif
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i>{{ __('Cerrar Sesión') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </div>

        </div>

    </div>

</header>

@if(session('login_success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: '¡Bienvenido!',
            text: 'Has iniciado sesión correctamente.',
            showConfirmButton: false,
            timer: 10000,
            timerProgressBar: true,
            position: 'top-end',
            toast: true,
            showCloseButton: true
        });
    });
</script>
@endif

<body class="index-page">
    @yield('content')
</body>

<footer id="footer" class="footer position-relative">
    <!-- Forma decorativa superior -->
    <div class="position-absolute top-0 start-0 w-100 overflow-hidden" style="height: 80px; transform: translateY(-98%);">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" style="width: 100%; height: 100%;">
            <path fill="#292929" fill-opacity="1" d="M0,128L48,144C96,160,192,192,288,186.7C384,181,480,139,576,149.3C672,160,768,224,864,218.7C960,213,1056,139,1152,133.3C1248,128,1344,192,1392,224L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>

    <!-- Contenido principal del footer -->
    <div class="footer-top bg-dark text-white pt-5 pb-4">
        <div class="container">
            <div class="row g-5">
                <!-- Columna de la empresa -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="footer-widget">
                        <div class="d-flex align-items-center mb-4">
                            <h3 class="text-danger fw-bold mb-0">INDARCA</h3>
                        </div>
                        <p class="text-light mb-4">Ofrecemos soluciones innovadoras en arquitectura, ingeniería y densímetros nucleares para proyectos de construcción que superan expectativas.</p>

                        <h5 class="text-white border-start border-danger border-3 ps-3 mb-3">Horario de Atención</h5>
                        <div class="horarios-box bg-dark bg-opacity-50 p-3 rounded-3 border border-secondary border-opacity-25">
                            <div class="horario-item d-flex align-items-center">
                                <div class="icon-box bg-dark rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px; min-width: 40px;">
                                    <i class="bi bi-calendar-week text-danger"></i>
                                </div>
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-light fw-medium">Lunes - Viernes:</span>
                                        <span class="fw-semibold text-danger">9:00 AM - 5:00 PM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Columna de contacto -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="footer-widget">
                        <h4 class="text-white border-start border-danger border-3 ps-3 mb-4">Información de Contacto</h4>

                        <div class="footer-contact">
                            <div class="contact-item d-flex mb-3">
                                <div class="icon-box bg-dark rounded-circle d-flex align-items-center justify-content-center icon-animate me-3" style="width: 45px; height: 45px; min-width: 45px;">
                                    <i class="bi bi-geo-alt-fill text-danger fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-light">C. C 16, Santo Domingo Este 11506, <br>República Dominicana</p>
                                </div>
                            </div>

                            <div class="contact-item d-flex mb-3">
                                <div class="icon-box bg-dark rounded-circle d-flex align-items-center justify-content-center icon-animate me-3" style="width: 45px; height: 45px; min-width: 45px;">
                                    <i class="bi bi-telephone-fill text-danger fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-1">Llamanos</h6>
                                    <p class="mb-0 text-light">+1809 596 0333</p>

                                </div>
                            </div>

                            <div class="contact-item d-flex mb-3">
                                <div class="icon-box bg-dark rounded-circle d-flex align-items-center justify-content-center icon-animate me-3" style="width: 45px; height: 45px; min-width: 45px;">
                                    <i class="bi bi-envelope-fill text-danger fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-1">Email</h6>
                                    <a href="mailto:contacto@indarca.com" class="text-light text-decoration-none">contacto@indarca.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enlaces rápidos y servicios -->
                <div class="col-lg-2 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="footer-widget">
                        <h4 class="text-white border-start border-danger border-3 ps-3 mb-4">Enlaces Rápidos</h4>
                        <ul class="list-unstyled footer-links">
                            <li class="mb-3">
                                <a href="{{ route('inicio') }}" class="text-light d-flex align-items-center text-decoration-none hover-shadow transition-all">
                                    <i class="bi bi-chevron-right text-danger me-2"></i>
                                    <span>Inicio</span>
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('sobreNosotros') }}" class="text-light d-flex align-items-center text-decoration-none hover-shadow transition-all">
                                    <i class="bi bi-chevron-right text-danger me-2"></i>
                                    <span>Sobre Nosotros</span>
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('densimetros') }}" class="text-light d-flex align-items-center text-decoration-none hover-shadow transition-all">
                                    <i class="bi bi-chevron-right text-danger me-2"></i>
                                    <span>Densímetros</span>
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('arquitectura') }}" class="text-light d-flex align-items-center text-decoration-none hover-shadow transition-all">
                                    <i class="bi bi-chevron-right text-danger me-2"></i>
                                    <span>Arquitectura</span>
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('politicas.privacidad') }}" class="text-light d-flex align-items-center text-decoration-none hover-shadow transition-all">
                                    <i class="bi bi-chevron-right text-danger me-2"></i>
                                    <span>Políticas de Privacidad</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Columna de redes sociales -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="footer-widget">
                        <h4 class="text-white border-start border-danger border-3 ps-3 mb-4">Redes Sociales</h4>

                        <h5 class="text-white mb-3">Síguenos</h5>
                        <div class="social-links d-flex flex-wrap gap-2 mb-4">
                            <a href="https://x.com/indarca_srl?s=11" class="social-icon bg-dark rounded-circle d-flex align-items-center justify-content-center hover-shadow transition-all icon-animate" style="width: 40px; height: 40px;">
                                <i class="bi bi-twitter-x text-danger"></i>
                            </a>
                            <a href="https://www.instagram.com/indarca.srl?igsh=MXZzN2l3cTBxaG1jOA==" class="social-icon bg-dark rounded-circle d-flex align-items-center justify-content-center hover-shadow transition-all icon-animate" style="width: 40px; height: 40px;">
                                <i class="bi bi-instagram text-danger"></i>
                            </a>
                            <a href="https://www.linkedin.com/company/indarca-srl/" class="social-icon bg-dark rounded-circle d-flex align-items-center justify-content-center hover-shadow transition-all icon-animate" style="width: 40px; height: 40px;">
                                <i class="bi bi-linkedin text-danger"></i>
                            </a>
                            <a href="https://www.facebook.com/share/1EJq41gUNs/?mibextid=wwXIfr" class="social-icon bg-dark rounded-circle d-flex align-items-center justify-content-center hover-shadow transition-all icon-animate" style="width: 40px; height: 40px;">
                                <i class="bi bi-facebook text-danger"></i>
                            </a>
                        </div>

                        <div class="footer-certification mt-4 p-3 bg-dark bg-opacity-50 rounded-3 border border-secondary border-opacity-25">
                            <div class="text-center">
                                <div class="icon-box bg-dark rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3 float-animation" style="width: 55px; height: 55px;">
                                    <i class="bi bi-patch-check-fill text-danger fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-2">Empresa Certificada</h6>
                                    <p class="small mb-0 text-muted">ISO 9001:2015 | ISO 14001</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer inferior - Copyright -->
    <div class="footer-bottom bg-darker py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0 text-light">© <span>2025</span> <strong class="text-danger">INDARCA</strong> - Todos los derechos reservados</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0 text-light">Diseñado por <a href="#" class="text-danger text-decoration-none">Indarca Web Team</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Elementos decorativos flotantes -->
    <div class="position-absolute bottom-0 start-0 translate-middle-y  d-none d-lg-block">
        <i class="bi bi-hexagon-fill text-danger" style="font-size: 15rem;"></i>
    </div>
    <div class="position-absolute top-50 end-0 translate-middle-y  d-none d-lg-block">
        <i class="bi bi-circle-fill text-danger" style="font-size: 10rem;"></i>
    </div>
</footer>

<!-- Estilos adicionales para el footer -->
<style>
    .bg-darker {
        background-color: #1d1d1d;
    }

    .footer {
        overflow: hidden;
        color: rgba(255, 255, 255, 0.8);
    }

    .footer-links a {
        transition: all 0.3s ease;
        padding: 5px 0;
        display: block;
    }

    .footer-links a:hover {
        transform: translateX(5px);
        color: var(--color-primary) !important;
    }

    .social-icon:hover {
        background-color: var(--color-primary) !important;
    }

    .social-icon:hover i {
        color: white !important;
    }


    .float-animation {
        animation: float 3s ease-in-out infinite;
    }

    .icon-animate {
        animation: pulse-border 2s infinite;
    }

    .transition-all {
        transition: all 0.3s ease;
    }
</style>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Lightbox JS para visualización de imágenes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'albumLabel': "Imagen %1 de %2"
    });
</script>

</html>
