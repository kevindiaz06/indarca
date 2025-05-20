<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
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

    <!-- Utilizamos GLightbox para visualización de imágenes -->

    <!-- Estilos personalizados para el tema monocromático -->
    <style>
        .language-selector {
            margin-right: 15px;
        }
        .language-selector .dropdown-menu {
            min-width: 120px;
        }
        .language-selector .dropdown-item {
            padding: 0.5rem 1rem;
            display: flex;
            align-items: center;
        }
        .language-selector .dropdown-item .flag-icon {
            margin-right: 8px;
        }
        .language-selector .dropdown-toggle::after {
            margin-left: 0.5em;
        }
        @media (max-width: 1199px) {
            .mobile-menu-divider {
                border-top: 1px solid rgba(0, 0, 0, 0.1);
                margin: 15px 0;
                padding: 0 15px;
            }

            .mobile-auth-item {
                padding: 10px 20px;
            }

            .mobile-auth-item .btn {
                width: 100%;
                margin-bottom: 8px;
                text-align: left;
            }

            /* Estilos mejorados para los elementos de autenticación e idioma en móvil */
            .language-switcher {
                display: flex;
                align-items: center;
                margin-bottom: 15px;
                padding: 10px 20px;
            }

            .language-switcher .lang-label {
                margin-right: 15px;
                font-size: 14px;
                color: #666;
            }

            .language-switcher .lang-options {
                display: flex;
                align-items: center;
                background-color: #f8f9fa;
                border-radius: 4px;
                padding: 5px 10px;
                border: 1px solid #dee2e6;
            }

            .language-switcher .lang-option {
                padding: 3px 8px;
                text-decoration: none;
                font-weight: 500;
                color: #495057;
                font-size: 14px;
            }

            .language-switcher .lang-option.active {
                color: var(--color-primary);
                font-weight: 700;
            }

            .language-switcher .separator {
                color: #adb5bd;
                margin: 0 5px;
            }

            /* Estilos para los elementos de autenticación e idioma en móvil */
            .mobile-menu-footer {
                margin-top: 20px;
                border-top: 1px solid rgba(0, 0, 0, 0.1);
                padding: 15px;
            }

            .mobile-auth-item {
                margin-bottom: 15px;
            }

            .mobile-auth-item .btn {
                width: 100%;
                margin-bottom: 8px;
                text-align: left;
            }

            .mobile-auth-actions {
                margin-top: 15px;
            }

            .mobile-auth-link {
                display: flex;
                align-items: center;
                padding: 8px 0;
                color: #212529;
                text-decoration: none;
                border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            }

            .mobile-auth-link:last-child {
                border-bottom: none;
            }

            .mobile-auth-link i {
                margin-right: 10px;
                font-size: 16px;
            }

            .mobile-auth-link.logout {
                color: var(--color-primary);
            }
        }
    </style>
</head>
<header id="header" class="header sticky-top">
    <div class="branding d-flex align-items-cente">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('inicio') }}" class="logo d-flex align-items-center">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('assets/img/OTROS/logo_indarca.png') }}" alt="INDARCA" height="50">
                </a>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('inicio') }}"
                            class="{{ request()->routeIs('inicio') ? 'active' : '' }}">{{ __('general.home') }}</a></li>
                    <li class="dropdown"><a href="{{ route('sobreNosotros') }}"
                            class="{{ request()->routeIs('sobreNosotros') ? 'active' : '' }}">
                            <span>{{ __('general.about') }}</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <ul>
                            <li><a href="{{ route('sobreNosotros') }}">{{ __('general.history') }}</a></li>
                            <li><a href="{{ route('sobreNosotros') }}#MisionVisionValores">{{ __('general.mission_vision_values') }}</a>
                            </li>
                            <li><a href="{{ route('sobreNosotros') }}#reconocimientos">{{ __('general.recognitions_certifications') }}</a></li>
                            <li><a href="{{ route('sobreNosotros') }}#team">{{ __('general.team') }}</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="{{ route('densimetros') }}"
                            class="{{ request()->routeIs('densimetros') ? 'active' : '' }}"><span>{{ __('general.densimeters') }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ route('densimetros') }}#introduccion">{{ __('general.general_info') }}</a></li>
                            <li><a href="{{ route('densimetros') }}#aplicaciones">{{ __('general.applications') }}</a></li>
                            <li><a href="{{ route('densimetros') }}#modelos">{{ __('general.brands_models') }}</a></li>
                            <li><a href="{{ route('densimetros') }}#servicios">{{ __('general.services_section') }}</a></li>
                            <li><a href="{{ route('densimetros') }}#faq">{{ __('general.faq') }}</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="{{ route('arquitectura') }}"
                            class="{{ request()->routeIs('arquitectura') ? 'active' : '' }}"><span>{{ __('general.architecture') }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ route('arquitectura') }}#introduccion">{{ __('general.introduction') }}</a></li>
                            <li><a href="{{ route('arquitectura') }}#servicios">{{ __('general.services_offered') }}</a></li>
                            <li><a href="{{ route('arquitectura') }}#proyectos">{{ __('general.completed_projects') }}</a></li>
                            <li><a href="{{ route('arquitectura') }}#compromiso">{{ __('general.quality_commitment') }}</a></li>
                            <li><a href="{{ route('arquitectura') }}#contacto">{{ __('general.contact_section') }}</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('inicio') }}#contact"
                            class="{{ request()->is('contacto') ? 'active' : '' }}">{{ __('general.contact') }}</a></li>

                    <!-- Elementos móviles - Solo visibles en pantallas pequeñas -->
                    <li class="d-xl-none">
                        <div class="mobile-menu-footer">
                            <!-- Selector de idiomas tipo ES|EN -->
                            <div class="language-switcher">
                                <div class="lang-label">
                                    <i class="bi bi-globe me-1"></i> {{ __('general.language') }}:
                                </div>
                                <div class="lang-options">
                                    <a href="{{ route('change.language', 'es') }}" class="lang-option {{ app()->getLocale() == 'es' ? 'active' : '' }}">ES</a>
                                    <span class="separator">|</span>
                                    <a href="{{ route('change.language', 'en') }}" class="lang-option {{ app()->getLocale() == 'en' ? 'active' : '' }}">EN</a>
                                </div>
                            </div>

                            <!-- Opciones de autenticación -->
                            <div class="mobile-auth-item">
                                @guest
                                    <!-- Usuario no logueado - mostrar botones de login y estado -->
                                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-box-arrow-in-right me-1"></i>{{ __('general.login') }}
                                    </a>
                                    <a href="{{ route('estado') }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-clipboard-data me-1"></i>{{ __('general.status') }}
                                    </a>
                                @else
                                    <!-- Usuario logueado - mostrar nombre, panel y opción de cerrar sesión -->
                                    <div class="user-info mb-3">
                                        <span class="d-block fw-bold mb-2">
                                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                                        </span>
                                    </div>

                                    <div class="mobile-auth-actions">
                                        @if (Auth::user()->isStaff())
                                            <!-- Para staff/admin -->
                                            <a href="{{ route('admin.dashboard') }}" class="mobile-auth-link">
                                                <i class="bi bi-speedometer2"></i> {{ __('general.dashboard') }}
                                            </a>
                                        @elseif (Auth::user()->role === 'cliente')
                                            <!-- Para clientes -->
                                            <a href="{{ route('cliente.historial') }}" class="mobile-auth-link">
                                                <i class="bi bi-person-lines-fill"></i> {{ __('general.client_panel') }}
                                            </a>
                                        @endif

                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                                           class="mobile-auth-link logout">
                                            <i class="bi bi-box-arrow-right"></i> {{ __('general.logout') }}
                                        </a>
                                        <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </li>
                </ul>

                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <!-- Autenticación y selector de idioma para escritorio -->
            <div class="auth-buttons d-none d-xl-flex align-items-center">
                <!-- Selector de idioma -->
                <div class="language-selector dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="languageDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @if (app()->getLocale() == 'es')
                            <i class="bi bi-globe me-1"></i> ES
                        @else
                            <i class="bi bi-globe me-1"></i> EN
                        @endif
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                        <li>
                            <a class="dropdown-item {{ app()->getLocale() == 'es' ? 'active' : '' }}" href="{{ route('change.language', 'es') }}">
                                <span class="flag-icon">🇪🇸</span> {{ __('general.spanish') }}
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}" href="{{ route('change.language', 'en') }}">
                                <span class="flag-icon">🇺🇸</span> {{ __('general.english') }}
                            </a>
                        </li>
                    </ul>
                </div>

                @guest
                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary ms-2 me-2">
                        <i class="bi bi-box-arrow-in-right me-1"></i>{{ __('general.login') }}
                    </a>
                    <a href="{{ route('estado') }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-clipboard-data me-1"></i>{{ __('general.status') }}
                    </a>
                @else
                    @if (Auth::user()->isStaff())
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-primary ms-2 me-2">
                            <i class="bi bi-speedometer2 me-1"></i>{{ __('general.dashboard') }}
                        </a>
                    @endif
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="userDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            @if (Auth::user()->role === 'cliente')
                                <li><a class="dropdown-item" href="{{ route('cliente.historial') }}"><i
                                            class="bi bi-speedometer2 me-2"></i>{{ __('general.client_panel') }}</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i>{{ __('general.logout') }}
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

@if (session('login_success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: '{{ __('general.welcome') }}!',
                text: '{{ __('general.login_success_message') }}',
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
    <div class="position-absolute top-0 start-0 w-100 overflow-hidden"
        style="height: 80px; transform: translateY(-98%);">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none"
            style="width: 100%; height: 100%;">
            <path fill="#292929" fill-opacity="1"
                d="M0,128L48,144C96,160,192,192,288,186.7C384,181,480,139,576,149.3C672,160,768,224,864,218.7C960,213,1056,139,1152,133.3C1248,128,1344,192,1392,224L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
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
                        <p class="text-light mb-4">{{ __('general.company_info') }}</p>

                        <h5 class="text-white border-start border-danger border-3 ps-3 mb-3">{{ __('general.business_hours') }}</h5>
                        <div
                            class="horarios-box bg-dark bg-opacity-50 p-3 rounded-3 border border-secondary border-opacity-25">
                            <div class="horario-item d-flex align-items-center">
                                <div class="icon-box bg-dark rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 40px; height: 40px; min-width: 40px;">
                                    <i class="bi bi-calendar-week text-danger"></i>
                                </div>
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-light fw-medium">{{ __('general.monday_friday') }}:</span>
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
                        <h4 class="text-white border-start border-danger border-3 ps-3 mb-4">{{ __('general.contact_info') }}
                        </h4>

                        <div class="footer-contact">
                            <div class="contact-item d-flex mb-3">
                                <div class="icon-box bg-dark rounded-circle d-flex align-items-center justify-content-center icon-animate me-3"
                                    style="width: 45px; height: 45px; min-width: 45px;">
                                    <i class="bi bi-geo-alt-fill text-danger fs-4"></i>
                                </div>
                                <div>
                                    <p class="mb-0 text-light">C. C 16, Santo Domingo Este 11506, <br>República
                                        Dominicana</p>
                                </div>
                            </div>

                            <div class="contact-item d-flex mb-3">
                                <div class="icon-box bg-dark rounded-circle d-flex align-items-center justify-content-center icon-animate me-3"
                                    style="width: 45px; height: 45px; min-width: 45px;">
                                    <i class="bi bi-telephone-fill text-danger fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-1">{{ __('general.call_us') }}</h6>
                                    <p class="mb-0 text-light">+1809 596 0333</p>

                                </div>
                            </div>

                            <div class="contact-item d-flex mb-3">
                                <div class="icon-box bg-dark rounded-circle d-flex align-items-center justify-content-center icon-animate me-3"
                                    style="width: 45px; height: 45px; min-width: 45px;">
                                    <i class="bi bi-envelope-fill text-danger fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-1">Email</h6>
                                    <a href="mailto:contacto@indarca.com"
                                        class="text-light text-decoration-none">contacto@indarca.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enlaces rápidos y servicios -->
                <div class="col-lg-2 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="footer-widget">
                        <h4 class="text-white border-start border-danger border-3 ps-3 mb-4">{{ __('general.quick_links') }}</h4>
                        <ul class="list-unstyled footer-links">
                            <li class="mb-3">
                                <a href="{{ route('inicio') }}"
                                    class="text-light d-flex align-items-center text-decoration-none hover-shadow transition-all">
                                    <i class="bi bi-chevron-right text-danger me-2"></i>
                                    <span>{{ __('general.home') }}</span>
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('sobreNosotros') }}"
                                    class="text-light d-flex align-items-center text-decoration-none hover-shadow transition-all">
                                    <i class="bi bi-chevron-right text-danger me-2"></i>
                                    <span>{{ __('general.about') }}</span>
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('densimetros') }}"
                                    class="text-light d-flex align-items-center text-decoration-none hover-shadow transition-all">
                                    <i class="bi bi-chevron-right text-danger me-2"></i>
                                    <span>{{ __('general.densimeters') }}</span>
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('arquitectura') }}"
                                    class="text-light d-flex align-items-center text-decoration-none hover-shadow transition-all">
                                    <i class="bi bi-chevron-right text-danger me-2"></i>
                                    <span>{{ __('general.architecture') }}</span>
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('politicas.privacidad') }}"
                                    class="text-light d-flex align-items-center text-decoration-none hover-shadow transition-all">
                                    <i class="bi bi-chevron-right text-danger me-2"></i>
                                    <span>{{ __('general.privacy_policies') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Columna de redes sociales -->
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="footer-widget">
                        <h4 class="text-white border-start border-danger border-3 ps-3 mb-4">{{ __('general.social_networks') }}</h4>

                        <h5 class="text-white mb-3">{{ __('general.follow_us_text') }}</h5>
                        <div class="social-links d-flex flex-wrap gap-2 mb-4">
                            <a href="https://x.com/indarca_srl?s=11"
                                class="social-icon bg-dark rounded-circle d-flex align-items-center justify-content-center hover-shadow transition-all icon-animate"
                                style="width: 40px; height: 40px;" target="_blank">
                                <i class="bi bi-twitter-x text-danger"></i>
                            </a>
                            <a href="https://www.instagram.com/indarca.srl?igsh=MXZzN2l3cTBxaG1jOA=="
                                class="social-icon bg-dark rounded-circle d-flex align-items-center justify-content-center hover-shadow transition-all icon-animate"
                                style="width: 40px; height: 40px;" target="_blank">
                                <i class="bi bi-instagram text-danger"></i>
                            </a>
                            <a href="https://www.linkedin.com/company/indarca-srl"
                                class="social-icon bg-dark rounded-circle d-flex align-items-center justify-content-center hover-shadow transition-all icon-animate"
                                style="width: 40px; height: 40px; z-index: 10; position: relative;" target="_blank"
                                rel="noopener">
                                <i class="bi bi-linkedin text-danger"></i>
                            </a>
                            <a href="https://www.facebook.com/profile.php?id=100069160367684"
                                class="social-icon bg-dark rounded-circle d-flex align-items-center justify-content-center hover-shadow transition-all icon-animate"
                                style="width: 40px; height: 40px; z-index: 10; position: relative;" target="_blank"
                                rel="noopener">
                                <i class="bi bi-facebook text-danger"></i>
                            </a>
                        </div>

                        <div
                            class="footer-certification mt-4 p-3 bg-dark bg-opacity-50 rounded-3 border border-secondary border-opacity-25">
                            <div class="text-center">
                                <div class="icon-box bg-dark rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3 float-animation"
                                    style="width: 55px; height: 55px;">
                                    <i class="bi bi-patch-check-fill text-danger fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-2">{{ __('general.certified_company') }}</h6>
                                    <p class="small mb-0 text-white">ISO 9001:2015 | ISO 14001</p>
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
                    <p class="mb-md-0 text-light">© <span>2025</span> <strong class="text-danger">INDARCA</strong> -
                        {{ __('general.all_rights_reserved') }}</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0 text-light">{{ __('general.designed_by') }} <a href="#"
                            class="text-danger text-decoration-none">{{ __('general.web_team') }}</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Elementos decorativos flotantes -->
    <div class="position-absolute top-0 start-0 translate-middle-y opacity-10">
        <i class="bi bi-hexagon-fill text-primary" style="font-size: 15rem;"></i>
    </div>
    <div class="position-absolute bottom-0 end-0 translate-middle-y opacity-10">
        <i class="bi bi-circle-fill text-primary" style="font-size: 18rem;"></i>
    </div>
</footer>

<!-- Estilos adicionales para el footer -->
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

    .btn-primary:hover,
    .btn-primary:focus {
        background-color: #d30005;
        border-color: #d30005;
    }

    .btn-outline-primary {
        color: var(--color-primary);
        border-color: var(--color-primary);
    }

    .btn-outline-primary:hover,
    .btn-outline-primary:focus {
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

    .btn-danger:hover,
    .btn-danger:focus {
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

    /* Corregir colores azules en elementos interactivos */
    a:focus, button:focus, input:focus, textarea:focus, select:focus {
        outline-color: var(--color-primary) !important;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--color-primary) !important;
        box-shadow: 0 0 0 0.25rem rgba(244, 0, 6, 0.25) !important;
    }

    /* Sobrescribir estilos de Bootstrap para enlaces y botones */
    a {
        color: var(--color-primary);
    }

    a:hover {
        color: #d30005;
    }

    .dropdown-item.active, .dropdown-item:active {
        background-color: var(--color-primary) !important;
    }

    .page-link {
        color: var(--color-primary);
    }

    .page-link:hover {
        color: #d30005;
    }

    .page-item.active .page-link {
        background-color: var(--color-primary);
        border-color: var(--color-primary);
    }
</style>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>



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

<!-- Configuración de GLightbox que ya está cargado arriba -->
<script>
    // Configuración GLightbox
    const lightbox = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: true,
        autoplayVideos: true
    });
</script>

<!-- Script adicional para asegurar funcionamiento de los dropdown en móvil -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Ajustar comportamiento de los dropdown en móvil
    const mobileLanguageToggle = document.querySelector('.mobile-language-selector .dropdown-toggle');

    if (mobileLanguageToggle) {
        mobileLanguageToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            const dropdownMenu = this.nextElementSibling;

            // Cerrar otros menús desplegables abiertos
            document.querySelectorAll('.dropdown-menu.show').forEach(function(menu) {
                if (menu !== dropdownMenu) {
                    menu.classList.remove('show');
                }
            });

            // Alternar el estado del menú actual
            dropdownMenu.classList.toggle('show');
        });

        // Cerrar el menú al hacer clic fuera
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.mobile-language-selector')) {
                const mobileLanguageMenu = document.querySelector('.mobile-language-selector .dropdown-menu');
                if (mobileLanguageMenu && mobileLanguageMenu.classList.contains('show')) {
                    mobileLanguageMenu.classList.remove('show');
                }
            }
        });
    }
});
</script>

<!-- Script para manejar el scroll suave con retardo hacia las secciones -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Función para realizar scroll suave a un elemento
    function smoothScrollTo(target, duration = 800) {
        if (!target) return;

        const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
        const startPosition = window.pageYOffset;
        const distance = targetPosition - startPosition;
        let startTime = null;

        function animation(currentTime) {
            if (startTime === null) startTime = currentTime;
            const timeElapsed = currentTime - startTime;
            const run = ease(timeElapsed, startPosition, distance, duration);
            window.scrollTo(0, run);
            if (timeElapsed < duration) requestAnimationFrame(animation);
        }

        // Función de easing para hacer el scroll más natural
        function ease(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        }

        requestAnimationFrame(animation);
    }

    // Verificar si hay un hash en la URL al cargar la página
    if (window.location.hash) {
        // Prevenir el scroll automático del navegador
        setTimeout(function() {
            window.scrollTo(0, 0);

            // Esperar un poco para que las animaciones se carguen
            setTimeout(function() {
                const targetElement = document.querySelector(window.location.hash);
                if (targetElement) {
                    smoothScrollTo(targetElement);
                }
            }, 500); // 500ms de retardo antes de hacer scroll
        }, 1);
    }

    // Manejar clics en enlaces con hash para hacer scroll suave
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            // Solo para enlaces que apuntan a elementos en la misma página
            if (this.getAttribute('href').length > 1) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    // Pequeño retardo antes del scroll
                    setTimeout(function() {
                        smoothScrollTo(targetElement);

                        // Actualizar la URL sin recargar la página
                        history.pushState(null, null, targetId);
                    }, 100);
                }
            }
        });
    });
});
</script>

</html>
