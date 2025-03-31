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
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
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
                            <li><a href="#">Reconocimientos y certificaciones</a></li>
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
                    <li><a href="{{ route('inicio') }}#portfolio">Galería</a></li>
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
                                <li><a class="dropdown-item" href="{{ route('usuario.historial-incidencias') }}"><i class="bi bi-journal-text me-2"></i>Historial de Incidencias</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-person me-2"></i>Mi Perfil</a></li>
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

<footer id="footer" class="footer bg-dark text-white py-5">
    <div class="container">
        <!-- Footer Top -->
        <div class="row g-4 mb-4">
            <!-- Columna de Información de Contacto -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-brand mb-3">
                    <a href="{{ route('inicio') }}" class="text-decoration-none">
                        <h3 class="text-primary fw-bold">INDARCA</h3>
                    </a>
                </div>
                <p class="text-light mb-3">Soluciones en arquitectura, ingeniería y densímetros nucleares para proyectos de construcción de alta calidad.</p>
                <div class="footer-contact">
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                        <p class="mb-0">Calle Principal #123, Santo Domingo, Rep. Dom.</p>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-telephone-fill text-primary me-2"></i>
                        <p class="mb-0">+1809 596 0333</p>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-envelope-fill text-primary me-2"></i>
                        <p class="mb-0">contacto@indarca.com</p>
                    </div>
                </div>
            </div>

            <!-- Columna de Enlaces Rápidos -->
            <div class="col-lg-2 col-md-3 col-6">
                <h5 class="text-white border-start border-primary border-3 ps-3 mb-4">Enlaces Rápidos</h5>
                <ul class="list-unstyled footer-links">
                    <li class="mb-2"><a href="{{ route('inicio') }}" class="text-light text-decoration-none"><i class="bi bi-chevron-right text-primary me-1"></i> Inicio</a></li>
                    <li class="mb-2"><a href="{{ route('sobreNosotros') }}" class="text-light text-decoration-none"><i class="bi bi-chevron-right text-primary me-1"></i> Sobre Nosotros</a></li>
                    <li class="mb-2"><a href="{{ route('densimetros') }}" class="text-light text-decoration-none"><i class="bi bi-chevron-right text-primary me-1"></i> Densímetros</a></li>
                    <li class="mb-2"><a href="{{ route('arquitectura') }}" class="text-light text-decoration-none"><i class="bi bi-chevron-right text-primary me-1"></i> Arquitectura</a></li>
                </ul>
            </div>

            <!-- Columna de Servicios -->
            <div class="col-lg-2 col-md-3 col-6">
                <h5 class="text-white border-start border-primary border-3 ps-3 mb-4">Servicios</h5>
                <ul class="list-unstyled footer-links">
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none"><i class="bi bi-chevron-right text-primary me-1"></i> Densímetros</a></li>
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none"><i class="bi bi-chevron-right text-primary me-1"></i> Arquitectura</a></li>
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none"><i class="bi bi-chevron-right text-primary me-1"></i> Ingeniería</a></li>
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none"><i class="bi bi-chevron-right text-primary me-1"></i> Consultoría</a></li>
                </ul>
            </div>

            <!-- Columna de Subscripción y Redes Sociales -->
            <div class="col-lg-4 col-md-12">
                <h5 class="text-white border-start border-primary border-3 ps-3 mb-4">Síguenos</h5>
                <p class="text-light mb-3">Conéctate con nosotros en redes sociales y mantente actualizado sobre nuestros servicios y novedades.</p>

                <div class="social-links d-flex gap-2">
                    <a href="#" class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="#" class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Divider -->
    <div class="border-top border-secondary my-2"></div>

    <!-- Copyright -->
    <div class="container">
        <div class="row py-3">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-md-0">© <span>2023</span> <strong class="text-primary">INDARCA</strong> - Todos los derechos reservados</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="mb-0">Diseñado con <i class="bi bi-heart-fill text-danger"></i> por <a href="#" class="text-primary text-decoration-none">Indarca Web Team</a></p>
            </div>
        </div>
    </div>
</footer>
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
