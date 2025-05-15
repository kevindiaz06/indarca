@extends('layout')
@section('content')

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ __('general.error') }}:</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif



    <body class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section light-background">
            <video class="hero-video" autoplay loop muted playsinline>
                <source src="{{ asset('assets/img/otros/videoHeroindarca.mov') }}" type="video/quicktime">
                <!-- Formato alternativo para mayor compatibilidad con navegadores -->
                <source src="{{ asset('assets/img/otros/videoHeroindarca.mov') }}" type="video/mp4">
            </video>
            <div class="container">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-lg-8 text-center text-lg-start" data-aos="zoom-out">
                        <h1 class="display-4 fw-bold mb-4">{!! __('inicio.hero_title') !!}</h1>
                        <p class="lead mb-4">{{ __('inicio.hero_description') }}</p>
                        <div class="d-flex justify-content-center justify-content-lg-start">
                            <a href="#contact" class="btn-get-started btn-lg">{{ __('inicio.contact_us_button') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Hero Section -->

        <!-- Featured Services Section -->
        <section id="featured-services" class="featured-services section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div
                                class="icon bg-dark rounded-circle d-flex align-items-center justify-content-center mb-3 icon-animate">
                                <i class="bi bi-gear-wide-connected text-danger fs-3"></i>
                            </div>
                            <h4>{{ __('inicio.service_densimeters_title') }}</h4>
                            <p>{{ __('inicio.service_densimeters_desc') }}</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div
                                class="icon bg-dark rounded-circle d-flex align-items-center justify-content-center mb-3 icon-animate">
                                <i class="bi bi-buildings-fill text-danger fs-3"></i>
                            </div>
                            <h4>{{ __('inicio.service_design_title') }}</h4>
                            <p>{{ __('inicio.service_design_desc') }}</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div
                                class="icon bg-dark rounded-circle d-flex align-items-center justify-content-center mb-3 icon-animate">
                                <i class="bi bi-clipboard-data-fill text-danger fs-3"></i>
                            </div>
                            <h4>{{ __('inicio.service_supervision_title') }}</h4>
                            <p>{{ __('inicio.service_supervision_desc') }}</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div
                                class="icon bg-dark rounded-circle d-flex align-items-center justify-content-center mb-3 icon-animate">
                                <i class="bi bi-people-fill text-danger fs-3"></i>
                            </div>
                            <h4>{{ __('inicio.service_advisory_title') }}</h4>
                            <p>{{ __('inicio.service_advisory_desc') }}</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Featured Services Section -->

        <!-- About Section -->
        <section id="about" class="about section light-background py-5">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('inicio.about_title') }}</h2>
                <p><span>{{ __('inicio.about_subtitle_1') }}</span> <span class="description-title">{{ __('inicio.about_subtitle_2') }}</span></p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row g-4">
                    <!-- Imagen principal con overlay de información -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="position-relative rounded-4 overflow-hidden shadow-lg h-100">
                            <img src="{{ asset('assets\img\INDARCA_OFICINA\INDARCA_OFICINA_1.jpg') }}" alt="{{ __('inicio.team_indarca_alt') }}"
                                class="img-fluid w-100 h-100 object-fit-cover">
                            <div class="position-absolute bottom-0 start-0 w-100 p-4 bg-dark bg-opacity-75 text-white">
                                <h3 class="fw-bold border-start border-danger border-4 ps-3 mb-2 text-white">{{ __('inicio.our_history') }}</h3>
                                <p>{{ __('inicio.history_description') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Contenido en tarjetas -->
                    <div class="col-lg-6 d-flex flex-column" data-aos="fade-up" data-aos-delay="200">
                        <!-- Tarjeta principal con certificaciones -->
                        <div class="card border-0 shadow-lg rounded-4 mb-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div
                                        class="icon-box bg-dark rounded-circle p-3 d-flex justify-content-center align-items-center me-3">
                                        <i class="bi bi-award text-danger fs-1"></i>
                                    </div>
                                    <h3 class="fw-bold mb-0">{{ __('inicio.certifications_title') }}</h3>
                                </div>
                                <p class="fst-italic mb-4">
                                    <span class="fw-bold text-danger">INDARCA</span>
                                    {{ __('inicio.certifications_description') }}
                                </p>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-3 bg-light rounded-3 h-100 hover-shadow">
                                            <div class="icon-box bg-dark rounded-circle d-flex align-items-center justify-content-center me-3"
                                                style="width: 50px; height: 50px;">
                                                <i class="bi bi-patch-check text-danger fs-3"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-1">{{ __('inicio.iso_9001') }}</h6>
                                                <p class="small mb-0">{{ __('inicio.quality_management') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-3 bg-light rounded-3 h-100 hover-shadow">
                                            <div class="icon-box bg-dark rounded-circle d-flex align-items-center justify-content-center me-3"
                                                style="width: 50px; height: 50px;">
                                                <i class="bi bi-shield-check text-danger fs-3"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-1">{{ __('inicio.iso_14001') }}</h6>
                                                <p class="small mb-0">{{ __('inicio.environmental_management') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tarjetas de características -->
                        <div class="row g-4">
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="card border-0 shadow h-100 rounded-4 bg-gradient hover-shadow">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <div
                                                class="icon-box bg-dark rounded-circle p-3 d-flex justify-content-center align-items-center me-3">
                                                <i class="bi bi-diagram-3 text-danger fs-1"></i>
                                            </div>
                                            <h4 class="card-title fw-bold mb-0">{{ __('inicio.innovative_engineering_title') }}</h4>
                                        </div>
                                        <p class="card-text">{{ __('inicio.innovative_engineering_desc') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="card border-0 shadow h-100 rounded-4 bg-gradient hover-shadow">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <div
                                                class="icon-box bg-dark rounded-circle p-3 d-flex justify-content-center align-items-center me-3">
                                                <i class="bi bi-fullscreen-exit text-danger fs-1"></i>
                                            </div>
                                            <h4 class="card-title fw-bold mb-0">{{ __('inicio.creative_design_title') }}</h4>
                                        </div>
                                        <p class="card-text">{{ __('inicio.creative_design_desc') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección valores con iconos -->
                <div class="row mt-5 pt-4 g-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="col-12 text-center mb-4">
                        <h3 class="fw-bold">{{ __('inicio.our_values_title') }}</h3>
                        <div class="d-inline-block mx-auto border-bottom border-danger border-2 pb-2 px-5"></div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="text-center p-4 rounded-4 bg-white shadow-sm hover-shadow transition-all h-100">
                            <div
                                class="icon-box bg-dark rounded-circle p-3 d-inline-flex justify-content-center align-items-center mb-3 icon-animate">
                                <i class="bi bi-stars text-danger fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3">{{ __('inicio.value_excellence_title') }}</h5>
                            <p>{{ __('inicio.value_excellence_desc') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="text-center p-4 rounded-4 bg-white shadow-sm hover-shadow transition-all h-100">
                            <div
                                class="icon-box bg-dark rounded-circle p-3 d-inline-flex justify-content-center align-items-center mb-3 icon-animate">
                                <i class="bi bi-people-fill text-danger fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3">{{ __('inicio.value_teamwork_title') }}</h5>
                            <p>{{ __('inicio.value_teamwork_desc') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="text-center p-4 rounded-4 bg-white shadow-sm hover-shadow transition-all h-100">
                            <div
                                class="icon-box bg-dark rounded-circle p-3 d-inline-flex justify-content-center align-items-center mb-3 icon-animate">
                                <i class="bi bi-lightbulb-fill text-danger fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3">{{ __('inicio.value_innovation_title') }}</h5>
                            <p>{{ __('inicio.value_innovation_desc') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="text-center p-4 rounded-4 bg-white shadow-sm hover-shadow transition-all h-100">
                            <div
                                class="icon-box bg-dark rounded-circle p-3 d-inline-flex justify-content-center align-items-center mb-3 icon-animate">
                                <i class="bi bi-trophy-fill text-danger fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3">{{ __('inicio.value_integrity_title') }}</h5>
                            <p>{{ __('inicio.value_integrity_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /About Section -->


        <!-- Stats Section -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <div
                            class="icon-box rounded-circle d-flex align-items-center justify-content-center mb-3 float-animation">
                            <i class="bi bi-emoji-smile fs-3"></i>
                        </div>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $totalClientes ?? 0 }}"
                                data-purecounter-duration="5" class="purecounter"></span>
                            <p>+ {{ __('inicio.clients') }}</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <div
                            class="icon-box rounded-circle d-flex align-items-center justify-content-center mb-3 float-animation">
                            <i class="bi bi-journal-richtext fs-3"></i>
                        </div>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="125" data-purecounter-duration="5"
                                class="purecounter"></span>
                            <p>{{ __('inicio.projects') }}</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <div
                            class="icon-box rounded-circle d-flex align-items-center justify-content-center mb-3 float-animation">
                            <i class="bi bi-activity fs-3"></i>
                        </div>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="5"
                                class="purecounter"></span>
                            <p>{{ __('inicio.maintenance') }}</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <div
                            class="icon-box rounded-circle d-flex align-items-center justify-content-center mb-3 float-animation">
                            <i class="bi bi-people fs-3"></i>
                        </div>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $totalTrabajadores ?? 0 }}"
                                data-purecounter-duration="5" class="purecounter"></span>
                            <p>{{ __('inicio.employees') }}</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Clients Section -->
        <section id="clients" class="clients section py-5">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('inicio.clients_title') }}</h2>
                <p>{!! __('inicio.clients_subtitle') !!}</p>
            </div>

            <div class="container">
                <div class="bg-gradient-light rounded-4 p-5 shadow-lg position-relative overflow-hidden"
                    style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                    <!-- Elementos decorativos de fondo -->
                    <div class="position-absolute top-0 start-0 translate-middle-y opacity-10">
                        <i class="bi bi-hexagon-fill text-primary" style="font-size: 15rem;"></i>
                    </div>
                    <div class="position-absolute bottom-0 end-0 translate-middle-y opacity-10">
                        <i class="bi bi-circle-fill text-primary" style="font-size: 18rem;"></i>
                    </div>

                    <!-- Texto introductorio -->
                    <div class="row mb-5">
                        <div class="col-lg-8 mx-auto text-center">
                            <h3 class="fw-bold mb-4">{{ __('inicio.strategic_alliances') }}</h3>
                        </div>
                    </div>

                    @if (isset($empresas) && $empresas->where('activo', true)->count() > 0)
                        <!-- Carrusel de empresas -->
                        <div id="empresasCarrusel" class="carousel slide" data-bs-ride="false" data-bs-touch="true">
                            <div class="carousel-inner">
                                @php
                                    $empresasActivas = $empresas->where('activo', true);
                                    $totalEmpresas = $empresasActivas->count();
                                    $totalPaginas = ceil($totalEmpresas / 8);
                                @endphp

                                @for ($pagina = 0; $pagina < $totalPaginas; $pagina++)
                                    <div class="carousel-item {{ $pagina == 0 ? 'active' : '' }}">
                                        <div class="row row-cols-2 row-cols-md-4 row-cols-lg-4 g-4 position-relative">
                                            @foreach ($empresasActivas->slice($pagina * 8, 8) as $empresa)
                                                <div class="col" data-aos="fade-up">
                                                    <div
                                                        class="card h-100 border-0 rounded-4 client-card shadow-sm {{ $empresa->destacado ? 'border border-danger border-2' : '' }}">
                                                        <div
                                                            class="card-body d-flex align-items-center justify-content-center p-4">
                                                            @if ($empresa->logo)
                                                                <img src="{{ asset('storage/' . $empresa->logo) }}"
                                                                    class="img-fluid client-img"
                                                                    alt="{{ $empresa->nombre }}">
                                                            @else
                                                                <div class="text-center">
                                                                    <div class="display-4 text-muted mb-2">
                                                                        <i class="bi bi-building"></i>
                                                                    </div>
                                                                    <h6 class="mb-0 fw-bold">{{ $empresa->nombre }}</h6>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="card-overlay">
                                                            <div class="overlay-content">
                                                                <span class="badge bg-dark rounded-pill px-3 py-2 mb-2">
                                                                    {{ $empresa->tipo_cliente }}
                                                                </span>
                                                                <h5 class="fw-bold">{{ $empresa->nombre }}</h5>
                                                                @if ($empresa->destacado)
                                                                    <div class="mt-2">
                                                                        <span
                                                                            class="badge bg-warning text-dark rounded-pill px-3 py-2">
                                                                            <i class="bi bi-star-fill me-1"></i> {{ __('inicio.featured') }}
                                                                        </span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endfor
                            </div>

                            @if ($totalPaginas > 1)
                                <!-- Controles de navegación -->
                                <div class="position-relative">
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#empresasCarrusel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon bg-danger rounded-circle p-3"
                                            aria-hidden="true"></span>
                                        <span class="visually-hidden">{{ __('general.previous') }}</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#empresasCarrusel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon bg-danger rounded-circle p-3"
                                            aria-hidden="true"></span>
                                        <span class="visually-hidden">{{ __('general.next') }}</span>
                                    </button>
                                </div>

                                <!-- Indicadores de página con texto informativo -->
                                <div class="text-center mt-4">
                                    <div class="carousel-indicators">
                                        @for ($i = 0; $i < $totalPaginas; $i++)
                                            <button type="button" data-bs-target="#empresasCarrusel"
                                                data-bs-slide-to="{{ $i }}"
                                                class="{{ $i == 0 ? 'active' : '' }}"
                                                aria-current="{{ $i == 0 ? 'true' : 'false' }}"
                                                aria-label="Página {{ $i + 1 }}"></button>
                                        @endfor
                                    </div>
                                    <p class="text-muted small mt-3">Desliza para ver más empresas (<span
                                            id="paginaActual">1</span>/<span
                                            id="totalPaginas">{{ $totalPaginas }}</span>)</p>
                                </div>

                                <!-- Script para actualizar el contador de páginas -->
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const carousel = document.getElementById('empresasCarrusel');
                                        const paginaActual = document.getElementById('paginaActual');

                                        carousel.addEventListener('slide.bs.carousel', function(event) {
                                            paginaActual.textContent = event.to + 1;
                                        });
                                    });
                                </script>
                            @endif
                        </div>
                    @else
                        <div class="card border-0 shadow-lg rounded-4 py-5 bg-light bg-gradient overflow-hidden position-relative">
                            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, rgba(217,0,0,0.02) 0%, rgba(0,0,0,0.04) 100%);"></div>
                            <div class="card-body text-center p-5">
                                <div class="mb-4">
                                    <div class="icon-box bg-white shadow-sm rounded-circle d-inline-flex mx-auto mb-3 icon-animate" style="width: 95px; height: 95px;">
                                        <i class="bi bi-buildings text-danger" style="font-size: 3rem;"></i>
                                    </div>
                                    <h3 class="fw-bold mb-2">{{ __('inicio.alliances_developing') }}</h3>
                                    <div class="border-bottom border-danger w-25 mx-auto my-3 opacity-50"></div>
                                    <p class="text-muted mb-4">{!! __('inicio.alliances_desc') !!}</p>
                                </div>
                                <div class="d-flex justify-content-center gap-3">
                                    <div class="shadow-sm p-3 rounded-4 border border-light bg-white">
                                        <i class="bi bi-building-add fs-1 text-dark opacity-50"></i>
                                    </div>
                                    <div class="shadow-sm p-3 rounded-4 border border-light bg-white">
                                        <i class="bi bi-building-check fs-1 text-dark opacity-50"></i>
                                    </div>
                                    <div class="shadow-sm p-3 rounded-4 border border-light bg-white">
                                        <i class="bi bi-building-gear fs-1 text-dark opacity-50"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif

                    <!-- Call to action -->
                    <div class="text-center mt-5 pt-3">
                        <a href="#contact" class="btn btn-danger btn-lg rounded-pill px-4 py-2">
                            <i class="bi bi-building me-2"></i>{{ __('inicio.become_client') }}
                        </a>
                    </div>
                </div>
            </div>


        </section><!-- /Clients Section -->

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Portafolio</h2>
                <p><span>Nuestros</span> <span class="description-title">Proyectos</span></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">Todos</li>
                        <li data-filter=".filter-densimetros">Densímetros</li>
                        <li data-filter=".filter-arquitectura">Arquitectura</li>
                        <li data-filter=".filter-modelado3d">Modelado 3D</li>
                        <li data-filter=".filter-oficinas">Oficinas INDARCA</li>
                        <li data-filter=".filter-capacitacion">Capacitación</li>
                        <li data-filter=".filter-otros">Otros Proyectos</li>
                    </ul><!-- End Portfolio Filters -->

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                        <!-- Densímetros Items -->
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-densimetros">
                            <img src="{{ asset('assets/img/DENSIMETROS/TROXLER/DENSIMETROS_TROXLER_1.jpg') }}" class="img-fluid" alt="Densímetro Troxler">
                            <div class="portfolio-info">
                                <h4>Densímetros Troxler</h4>
                                <p>Calibración especializada</p>
                                <a href="{{ asset('assets/img/DENSIMETROS/TROXLER/DENSIMETROS_TROXLER_1.jpg') }}" title="Densímetros Troxler" data-gallery="portfolio-gallery-densimetros" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-densimetros">
                            <img src="{{ asset('assets/img/DENSIMETROS/TROXLER/DENSIMETROS_TROXLER_2.jpg') }}" class="img-fluid" alt="Mantenimiento Densímetros">
                            <div class="portfolio-info">
                                <h4>Mantenimiento Preventivo</h4>
                                <p>Equipos Troxler</p>
                                <a href="{{ asset('assets/img/DENSIMETROS/TROXLER/DENSIMETROS_TROXLER_2.jpg') }}" title="Mantenimiento Densímetros" data-gallery="portfolio-gallery-densimetros" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-densimetros">
                            <img src="{{ asset('assets/img/DENSIMETROS/DENSIMETROS_1.jpeg') }}" class="img-fluid" alt="Servicio Técnico Densímetros">
                            <div class="portfolio-info">
                                <h4>Servicio Técnico</h4>
                                <p>Reparación de Equipos</p>
                                <a href="{{ asset('assets/img/DENSIMETROS/DENSIMETROS_1.jpeg') }}" title="Servicio Técnico Densímetros" data-gallery="portfolio-gallery-densimetros" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-densimetros">
                            <img src="{{ asset('assets/img/DENSIMETROS/ENTRENAMIENTOS/DENSIMETROS_ENTRENAMIENTOS_1.jpg') }}" class="img-fluid" alt="Capacitación en Densímetros">
                            <div class="portfolio-info">
                                <h4>Capacitación Técnica</h4>
                                <p>Entrenamiento profesional</p>
                                <a href="{{ asset('assets/img/DENSIMETROS/ENTRENAMIENTOS/DENSIMETROS_ENTRENAMIENTOS_1.jpg') }}" title="Capacitación en Densímetros" data-gallery="portfolio-gallery-densimetros" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-densimetros">
                            <img src="{{ asset('assets/img/DENSIMETROS/ENTRENAMIENTOS/DENSIMETROS_ENTRENAMIENTOS_16.jpg') }}" class="img-fluid" alt="Laboratorio de Calibración">
                            <div class="portfolio-info">
                                <h4>Laboratorio de Calibración</h4>
                                <p>Instrumentos de precisión</p>
                                <a href="{{ asset('assets/img/DENSIMETROS/ENTRENAMIENTOS/DENSIMETROS_ENTRENAMIENTOS_16.jpg') }}" title="Laboratorio de Calibración" data-gallery="portfolio-gallery-densimetros" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-densimetros">
                            <img src="{{ asset('assets/img/DENSIMETROS/ENTRENAMIENTOS/DENSIMETROS_ENTRENAMIENTOS_28.jpg') }}" class="img-fluid" alt="Talleres Especializados">
                            <div class="portfolio-info">
                                <h4>Talleres Especializados</h4>
                                <p>Formación técnica certificada</p>
                                <a href="{{ asset('assets/img/DENSIMETROS/ENTRENAMIENTOS/DENSIMETROS_ENTRENAMIENTOS_28.jpg') }}" title="Talleres Especializados" data-gallery="portfolio-gallery-densimetros" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-densimetros">
                            <img src="{{ asset('assets/img/DENSIMETROS/TROXLER/DENSIMETROS_TROXLER_5.jpeg') }}" class="img-fluid" alt="Equipos Troxler">
                            <div class="portfolio-info">
                                <h4>Equipos Troxler</h4>
                                <p>Tecnología de precisión</p>
                                <a href="{{ asset('assets/img/DENSIMETROS/TROXLER/DENSIMETROS_TROXLER_5.jpeg') }}" title="Equipos Troxler" data-gallery="portfolio-gallery-densimetros" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-densimetros">
                            <img src="{{ asset('assets/img/DENSIMETROS/TROXLER/DENSIMETROS_TROXLER_7.jpeg') }}" class="img-fluid" alt="Calibración de Campo">
                            <div class="portfolio-info">
                                <h4>Calibración de Campo</h4>
                                <p>Verificación in situ</p>
                                <a href="{{ asset('assets/img/DENSIMETROS/TROXLER/DENSIMETROS_TROXLER_7.jpeg') }}" title="Calibración de Campo" data-gallery="portfolio-gallery-densimetros" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <!-- Arquitectura Items -->
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-arquitectura">
                            <img src="{{ asset('assets/img/ARQUITECTURA/VIVIENDA/ARQUITECTURA_VIVIENDA_1.jpeg') }}" class="img-fluid" alt="Arquitectura Vivienda">
                            <div class="portfolio-info">
                                <h4>Proyecto Residencial</h4>
                                <p>Vivienda unifamiliar</p>
                                <a href="{{ asset('assets/img/ARQUITECTURA/VIVIENDA/ARQUITECTURA_VIVIENDA_1.jpeg') }}" title="Proyecto Residencial" data-gallery="portfolio-gallery-arquitectura" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-arquitectura">
                            <img src="{{ asset('assets/img/ARQUITECTURA/VIVIENDA/APARTAMENTO/ARQUITECTURA_VIVIENDA_APARTAMENTO_11.jpg') }}" class="img-fluid" alt="Apartamento Diseño">
                            <div class="portfolio-info">
                                <h4>Diseño de Apartamento</h4>
                                <p>Arquitectura interior</p>
                                <a href="{{ asset('assets/img/ARQUITECTURA/VIVIENDA/APARTAMENTO/ARQUITECTURA_VIVIENDA_APARTAMENTO_11.jpg') }}" title="Diseño de Apartamento" data-gallery="portfolio-gallery-arquitectura" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-arquitectura">
                            <img src="{{ asset('assets/img/ARQUITECTURA/VIVIENDA/APARTAMENTO/ARQUITECTURA_VIVIENDA_APARTAMENTO_12.jpg') }}" class="img-fluid" alt="Apartamento Moderno">
                            <div class="portfolio-info">
                                <h4>Apartamento Moderno</h4>
                                <p>Diseño espacial</p>
                                <a href="{{ asset('assets/img/ARQUITECTURA/VIVIENDA/APARTAMENTO/ARQUITECTURA_VIVIENDA_APARTAMENTO_12.jpg') }}" title="Apartamento Moderno" data-gallery="portfolio-gallery-arquitectura" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-arquitectura">
                            <img src="{{ asset('assets/img/ARQUITECTURA/SALON/ARQUITECTURA_SALON_1.jpeg') }}" class="img-fluid" alt="Diseño de Salón">
                            <div class="portfolio-info">
                                <h4>Diseño de Salón</h4>
                                <p>Espacios comerciales</p>
                                <a href="{{ asset('assets/img/ARQUITECTURA/SALON/ARQUITECTURA_SALON_1.jpeg') }}" title="Diseño de Salón" data-gallery="portfolio-gallery-arquitectura" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-arquitectura">
                            <img src="{{ asset('assets/img/ARQUITECTURA/CLINICA-DENTAL/ARQUITECTURA_CLINICA-DENTAL_2.jpeg') }}" class="img-fluid" alt="Clínica Dental">
                            <div class="portfolio-info">
                                <h4>Clínica Dental</h4>
                                <p>Diseño funcional especializado</p>
                                <a href="{{ asset('assets/img/ARQUITECTURA/CLINICA-DENTAL/ARQUITECTURA_CLINICA-DENTAL_2.jpeg') }}" title="Clínica Dental" data-gallery="portfolio-gallery-arquitectura" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-arquitectura">
                            <img src="{{ asset('assets/img/ARQUITECTURA/SALON/ARQUITECTURA_SALON_3.JPG') }}" class="img-fluid" alt="Centro de Eventos">
                            <div class="portfolio-info">
                                <h4>Centro de Eventos</h4>
                                <p>Espacios multifuncionales</p>
                                <a href="{{ asset('assets/img/ARQUITECTURA/SALON/ARQUITECTURA_SALON_3.JPG') }}" title="Centro de Eventos" data-gallery="portfolio-gallery-arquitectura" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <!-- Modelado 3D Items -->
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-modelado3d">
                            <img src="{{ asset('assets/img/modelado3D/modelado3D_1.jpg') }}" class="img-fluid" alt="Modelado 3D Visual">
                            <div class="portfolio-info">
                                <h4>Visualización 3D</h4>
                                <p>Renderizado arquitectónico</p>
                                <a href="{{ asset('assets/img/modelado3D/modelado3D_1.jpg') }}" title="Visualización 3D" data-gallery="portfolio-gallery-modelado3d" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-modelado3d">
                            <img src="{{ asset('assets/img/modelado3D/modelado3D_7.jpg') }}" class="img-fluid" alt="Diseño Conceptual 3D">
                            <div class="portfolio-info">
                                <h4>Diseño Conceptual</h4>
                                <p>Modelado 3D avanzado</p>
                                <a href="{{ asset('assets/img/modelado3D/modelado3D_7.jpg') }}" title="Diseño Conceptual" data-gallery="portfolio-gallery-modelado3d" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-modelado3d">
                            <img src="{{ asset('assets/img/modelado3D/modelado3D_30.jpg') }}" class="img-fluid" alt="Renderizado Interior 3D">
                            <div class="portfolio-info">
                                <h4>Renderizado Interior</h4>
                                <p>Visualización espacial</p>
                                <a href="{{ asset('assets/img/modelado3D/modelado3D_30.jpg') }}" title="Renderizado Interior" data-gallery="portfolio-gallery-modelado3d" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-modelado3d">
                            <img src="{{ asset('assets/img/modelado3D/modelado3D_4.jpg') }}" class="img-fluid" alt="Diseño Exterior 3D">
                            <div class="portfolio-info">
                                <h4>Diseño Exterior</h4>
                                <p>Modelado arquitectónico</p>
                                <a href="{{ asset('assets/img/modelado3D/modelado3D_4.jpg') }}" title="Diseño Exterior" data-gallery="portfolio-gallery-modelado3d" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-modelado3d">
                            <img src="{{ asset('assets/img/modelado3D/modelado3D_14.jpg') }}" class="img-fluid" alt="Concepto Urbano 3D">
                            <div class="portfolio-info">
                                <h4>Concepto Urbano</h4>
                                <p>Planificación espacial</p>
                                <a href="{{ asset('assets/img/modelado3D/modelado3D_14.jpg') }}" title="Concepto Urbano" data-gallery="portfolio-gallery-modelado3d" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-modelado3d">
                            <img src="{{ asset('assets/img/modelado3D/modelado3D_28.jpg') }}" class="img-fluid" alt="Diseño Interior 3D">
                            <div class="portfolio-info">
                                <h4>Diseño Interior</h4>
                                <p>Visualización detallada</p>
                                <a href="{{ asset('assets/img/modelado3D/modelado3D_28.jpg') }}" title="Diseño Interior" data-gallery="portfolio-gallery-modelado3d" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <!-- Oficinas INDARCA Items -->
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-oficinas">
                            <img src="{{ asset('assets/img/INDARCA_OFICINA/INDARCA_OFICINA_1.jpg') }}" class="img-fluid" alt="Oficinas Principales INDARCA">
                            <div class="portfolio-info">
                                <h4>Oficinas Principales</h4>
                                <p>Sede corporativa INDARCA</p>
                                <a href="{{ asset('assets/img/INDARCA_OFICINA/INDARCA_OFICINA_1.jpg') }}" title="Oficinas Principales INDARCA" data-gallery="portfolio-gallery-oficinas" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-oficinas">
                            <img src="{{ asset('assets/img/INDARCA_OFICINA/INDARCA_OFICINA_20.jpg') }}" class="img-fluid" alt="Área de Trabajo INDARCA">
                            <div class="portfolio-info">
                                <h4>Área de Trabajo</h4>
                                <p>Espacio colaborativo</p>
                                <a href="{{ asset('assets/img/INDARCA_OFICINA/INDARCA_OFICINA_20.jpg') }}" title="Área de Trabajo INDARCA" data-gallery="portfolio-gallery-oficinas" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-oficinas">
                            <img src="{{ asset('assets/img/INDARCA_OFICINA/INDARCA_OFICINA_21.jpg') }}" class="img-fluid" alt="Recepción INDARCA">
                            <div class="portfolio-info">
                                <h4>Área de Recepción</h4>
                                <p>Primera impresión empresarial</p>
                                <a href="{{ asset('assets/img/INDARCA_OFICINA/INDARCA_OFICINA_21.jpg') }}" title="Recepción INDARCA" data-gallery="portfolio-gallery-oficinas" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-oficinas">
                            <img src="{{ asset('assets/img/INDARCA_OFICINA/INDARCA_OFICINA_23.jpg') }}" class="img-fluid" alt="Sala de Reuniones INDARCA">
                            <div class="portfolio-info">
                                <h4>Sala de Reuniones</h4>
                                <p>Espacio para colaboración y proyectos</p>
                                <a href="{{ asset('assets/img/INDARCA_OFICINA/INDARCA_OFICINA_23.jpg') }}" title="Sala de Reuniones INDARCA" data-gallery="portfolio-gallery-oficinas" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <!-- Capacitación Personal Items -->
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-capacitacion">
                            <img src="{{ asset('assets/img/CAPACITACION_PERSONAL_INDARCA/CAPACITACION_PERSONAL_INDARCA_5.jpeg') }}" class="img-fluid" alt="Seminario de Capacitación">
                            <div class="portfolio-info">
                                <h4>Seminario Técnico</h4>
                                <p>Formación continua del personal</p>
                                <a href="{{ asset('assets/img/CAPACITACION_PERSONAL_INDARCA/CAPACITACION_PERSONAL_INDARCA_5.jpeg') }}" title="Seminario de Capacitación" data-gallery="portfolio-gallery-capacitacion" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-capacitacion">
                            <img src="{{ asset('assets/img/CAPACITACION_PERSONAL_INDARCA/CAPACITACION_PERSONAL_INDARCA_7.jpg') }}" class="img-fluid" alt="Taller Práctico">
                            <div class="portfolio-info">
                                <h4>Taller Práctico</h4>
                                <p>Desarrollo de habilidades técnicas</p>
                                <a href="{{ asset('assets/img/CAPACITACION_PERSONAL_INDARCA/CAPACITACION_PERSONAL_INDARCA_7.jpg') }}" title="Taller Práctico" data-gallery="portfolio-gallery-capacitacion" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-capacitacion">
                            <img src="{{ asset('assets/img/CAPACITACION_PERSONAL_INDARCA/CAPACITACION_PERSONAL_INDARCA_6.jpg') }}" class="img-fluid" alt="Certificación Profesional">
                            <div class="portfolio-info">
                                <h4>Certificación Profesional</h4>
                                <p>Reconocimiento de competencias</p>
                                <a href="{{ asset('assets/img/CAPACITACION_PERSONAL_INDARCA/CAPACITACION_PERSONAL_INDARCA_6.jpg') }}" title="Certificación Profesional" data-gallery="portfolio-gallery-capacitacion" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-capacitacion">
                            <img src="{{ asset('assets/img/DENSIMETROS/ENTRENAMIENTOS/DENSIMETROS_ENTRENAMIENTOS_47.jpg') }}" class="img-fluid" alt="Entrenamiento con Equipos">
                            <div class="portfolio-info">
                                <h4>Entrenamiento con Equipos</h4>
                                <p>Manejo de instrumentos especializados</p>
                                <a href="{{ asset('assets/img/DENSIMETROS/ENTRENAMIENTOS/DENSIMETROS_ENTRENAMIENTOS_47.jpg') }}" title="Entrenamiento con Equipos" data-gallery="portfolio-gallery-capacitacion" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-capacitacion">
                            <img src="{{ asset('assets/img/DENSIMETROS/ENTRENAMIENTOS/DENSIMETROS_ENTRENAMIENTOS_4.jpg') }}" class="img-fluid" alt="Capacitación Técnica">
                            <div class="portfolio-info">
                                <h4>Capacitación Técnica</h4>
                                <p>Actualización de conocimientos</p>
                                <a href="{{ asset('assets/img/DENSIMETROS/ENTRENAMIENTOS/DENSIMETROS_ENTRENAMIENTOS_4.jpg') }}" title="Capacitación Técnica" data-gallery="portfolio-gallery-capacitacion" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-capacitacion">
                            <img src="{{ asset('assets/img/DENSIMETROS/ENTRENAMIENTOS/DENSIMETROS_ENTRENAMIENTOS_48.jpg') }}" class="img-fluid" alt="Talleres Prácticos">
                            <div class="portfolio-info">
                                <h4>Talleres Prácticos</h4>
                                <p>Aprendizaje experiencial</p>
                                <a href="{{ asset('assets/img/DENSIMETROS/ENTRENAMIENTOS/DENSIMETROS_ENTRENAMIENTOS_48.jpg') }}" title="Talleres Prácticos" data-gallery="portfolio-gallery-capacitacion" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <!-- Otros Proyectos Items -->
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-otros">
                            <img src="{{ asset('assets/img/OTROS/OTROS_2.jpg') }}" class="img-fluid" alt="Proyecto Especial">
                            <div class="portfolio-info">
                                <h4>Proyecto Especial</h4>
                                <p>Soluciones a medida</p>
                                <a href="{{ asset('assets/img/OTROS/OTROS_2.jpg') }}" title="Proyecto Especial" data-gallery="portfolio-gallery-otros" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-otros">
                            <img src="{{ asset('assets/img/OTROS/OTROS_1.jpg') }}" class="img-fluid" alt="Servicios Adicionales">
                            <div class="portfolio-info">
                                <h4>Servicios Adicionales</h4>
                                <p>Complementos a nuestra oferta</p>
                                <a href="{{ asset('assets/img/OTROS/OTROS_1.jpg') }}" title="Servicios Adicionales" data-gallery="portfolio-gallery-otros" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-otros">
                            <img src="{{ asset('assets/img/OTROS/OTROS_3.jpg') }}" class="img-fluid" alt="Soluciones Innovadoras">
                            <div class="portfolio-info">
                                <h4>Soluciones Innovadoras</h4>
                                <p>Respuestas a desafíos únicos</p>
                                <a href="{{ asset('assets/img/OTROS/OTROS_3.jpg') }}" title="Soluciones Innovadoras" data-gallery="portfolio-gallery-otros" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-otros">
                            <img src="{{ asset('assets/img/OTROS/OTROS_9.jpg') }}" class="img-fluid" alt="Proyectos Diversos">
                            <div class="portfolio-info">
                                <h4>Proyectos Diversos</h4>
                                <p>Adaptación a nuevos retos</p>
                                <a href="{{ asset('assets/img/OTROS/OTROS_9.jpg') }}" title="Proyectos Diversos" data-gallery="portfolio-gallery-otros" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                    </div><!-- End Portfolio Container -->

                </div>

            </div>

        </section><!-- /Portfolio Section -->


        <!-- Contact Section -->
        <section id="contact" class="contact section py-5">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('inicio.contact_title') }}</h2>
                <p>{!! __('inicio.contact_subtitle') !!}</p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <!-- Presentación corporativa -->
                <div class="row mb-5">
                    <div class="col-lg-8 mx-auto text-center">
                        <p class="lead text-muted mb-0">{{ __('inicio.contact_intro') }}</p>
                    </div>
                </div>

                <!-- Contenedor principal -->
                <div class="bg-white rounded-4 shadow overflow-hidden"
                    style="box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08) !important; transform: translateY(0); transition: all 0.3s ease;">
                    <div class="row g-0">
                        <!-- Panel izquierdo - Información de contacto -->
                        <div class="col-lg-4">
                            <div class="h-100 p-4 p-lg-5 text-white"
                                style="background: linear-gradient(135deg, #000000 0%, #D90000 100%);">
                                <!-- Logo y título -->
                                <div class="text-center mb-5">
                                    <div class="mb-4">
                                        <img src="{{ asset('assets/img/OTROS/logo_indarca.png') }}" alt="INDARCA"
                                            class="img-fluid" style="max-height: 60px;">
                                    </div>
                                    <h3 class="fw-light mb-2 text-white">{!! __('inicio.service_center') !!}</h3>
                                    <div class="mx-auto"
                                        style="width: 50px; height: 3px; background-color: rgba(255, 255, 255, 0.5); margin-top: 10px;">
                                    </div>
                                </div>

                                <!-- Información de contacto -->
                                <div class="mb-5">
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="me-3 rounded-circle bg-white bg-opacity-25 d-flex align-items-center justify-content-center"
                                            style="width: 40px; height: 40px;">
                                            <i class="bi bi-geo-alt text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="text-white-50 mb-1 small">{{ __('inicio.main_address') }}</h6>
                                            <p class="mb-0">{!! __('inicio.address_value') !!}</p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-4">
                                        <div class="me-3 rounded-circle bg-white bg-opacity-25 d-flex align-items-center justify-content-center"
                                            style="width: 40px; height: 40px; background-color: rgba(255, 255, 255, 0.2);">
                                            <i class="bi bi-telephone text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="text-white-50 mb-1 small">{{ __('inicio.phone') }}</h6>
                                            <p class="mb-0">+1809 596 0333</p>

                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-4">
                                        <div class="me-3 rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 40px; height: 40px; background-color: rgba(255, 255, 255, 0.2);">
                                            <i class="bi bi-envelope text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="text-white-50 mb-1 small">{{ __('inicio.email') }}</h6>
                                            <p class="mb-0">contacto@indarca.com</p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <div class="me-3 rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 40px; height: 40px; background-color: rgba(255, 255, 255, 0.2);">
                                            <i class="bi bi-clock text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="text-white-50 mb-1 small">{{ __('inicio.business_hours') }}</h6>
                                            <p class="mb-0">{{ __('inicio.business_hours_value') }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Redes sociales -->
                                <div class="mt-5 pt-2">
                                    <h6 class="text-white-50 mb-3 small">{{ __('inicio.connect_with_us') }}</h6>
                                    <div class="d-flex gap-2">
                                        <a href="https://www.facebook.com/share/1EJq41gUNs/?mibextid=wwXIfr"
                                            class="rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 36px; height: 36px; background-color: rgba(255, 255, 255, 0.2); transition: all 0.3s ease;">
                                            <i class="bi bi-facebook text-white"></i>
                                        </a>
                                        <a href="https://x.com/indarca_srl?s=11"
                                            class="rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 36px; height: 36px; background-color: rgba(255, 255, 255, 0.2); transition: all 0.3s ease;">
                                            <i class="bi bi-twitter-x text-white"></i>
                                        </a>
                                        <a href="https://www.instagram.com/indarca.srl?igsh=MXZzN2l3cTBxaG1jOA=="
                                            class="rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 36px; height: 36px; background-color: rgba(255, 255, 255, 0.2); transition: all 0.3s ease;">
                                            <i class="bi bi-instagram text-white"></i>
                                        </a>
                                        <a href="https://www.linkedin.com/company/indarca-srl/"
                                            class="rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 36px; height: 36px; background-color: rgba(255, 255, 255, 0.2); transition: all 0.3s ease;">
                                            <i class="bi bi-linkedin text-white"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Panel derecho - Formulario de contacto -->
                        <div class="col-lg-8">
                            <div class="p-4 p-lg-5">
                                <!-- Título del formulario -->
                                <div class="mb-5">
                                    <h4 class="fw-bold text-dark mb-2">{{ __('inicio.send_message') }}</h4>
                                    <p class="text-muted mb-0">{{ __('inicio.form_intro') }}</p>
                                </div>

                                @if (session('success'))
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            Swal.fire({
                                                icon: 'success',
                                                title: '{{ __('inicio.message_sent') }}',
                                                text: '{{ session('success') }}',
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

                                @if (session('error'))
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            Swal.fire({
                                                icon: 'error',
                                                title: '{{ __('inicio.error_occurred') }}',
                                                text: '{{ session('error') }}',
                                                showConfirmButton: true,
                                                confirmButtonText: '{{ __('inicio.accept') }}'
                                            });
                                        });
                                    </script>
                                @endif

                                <!-- Formulario de contacto -->
                                <form action="/contacto/enviar" method="post" class="row g-4" data-aos="fade-up"
                                    id="contactForm">
                                    @csrf
                                    <!-- Nombre -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name-field" class="form-label text-muted fw-medium mb-2">{{ __('inicio.full_name') }}</label>
                                            <div class="input-group shadow-sm rounded-3 overflow-hidden">
                                                <span class="input-group-text bg-white border-end-0 text-muted">
                                                    <i class="bi bi-person"></i>
                                                </span>
                                                <input type="text" name="name" id="name-field"
                                                    class="form-control border-start-0 @error('name') is-invalid @enderror"
                                                    placeholder="{{ __('inicio.enter_name') }}"
                                                    value="{{ auth()->check() ? auth()->user()->name : old('name') }}"
                                                    {{ auth()->check() ? 'readonly' : '' }} required>
                                            </div>
                                            @error('name')
                                                <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Correo electrónico -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email-field" class="form-label text-muted fw-medium mb-2">{{ __('inicio.email') }}</label>
                                            <div class="input-group shadow-sm rounded-3 overflow-hidden">
                                                <span class="input-group-text bg-white border-end-0 text-muted">
                                                    <i class="bi bi-envelope"></i>
                                                </span>
                                                <input type="email" name="email" id="email-field"
                                                    class="form-control border-start-0 @error('email') is-invalid @enderror"
                                                    placeholder="{{ __('inicio.enter_email') }}"
                                                    value="{{ auth()->check() ? auth()->user()->email : old('email') }}"
                                                    {{ auth()->check() ? 'readonly' : '' }} required>
                                            </div>
                                            @error('email')
                                                <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Departamento -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="subject-field"
                                                class="form-label text-muted fw-medium mb-2">{{ __('inicio.department') }}</label>
                                            <div class="input-group shadow-sm rounded-3 overflow-hidden">
                                                <span class="input-group-text bg-white border-end-0 text-muted">
                                                    <i class="bi bi-building"></i>
                                                </span>
                                                <select name="subject" id="subject-field"
                                                    class="form-select border-start-0 @error('subject') is-invalid @enderror"
                                                    required>
                                                    <option value="" disabled selected>{{ __('inicio.select_department') }}</option>
                                                    <option value="Ventas"
                                                        {{ old('subject') == 'Ventas' ? 'selected' : '' }}>{{ __('inicio.sales_department') }}</option>
                                                    <option value="Taller"
                                                        {{ old('subject') == 'Taller' ? 'selected' : '' }}>{{ __('inicio.workshop') }}</option>
                                                    <option value="Secretaría"
                                                        {{ old('subject') == 'Secretaría' ? 'selected' : '' }}>{{ __('inicio.general_secretary') }}</option>
                                                    <option value="Oficinas Centrales"
                                                        {{ old('subject') == 'Oficinas Centrales' ? 'selected' : '' }}>
                                                        {{ __('inicio.central_offices') }}</option>
                                                    <option value="Arquitectura"
                                                        {{ old('subject') == 'Arquitectura' ? 'selected' : '' }}>
                                                        {{ __('inicio.architecture_department') }}</option>
                                                </select>
                                            </div>
                                            @error('subject')
                                                <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Mensaje -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="message-field" class="form-label text-muted fw-medium mb-2">{{ __('inicio.your_message') }}</label>
                                            <textarea name="message" id="message-field" rows="5"
                                                class="form-control shadow-sm rounded-3 @error('message') is-invalid @enderror"
                                                placeholder="{{ __('inicio.message_placeholder') }}" required>{{ old('message') }}</textarea>
                                            @error('message')
                                                <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Botones y términos -->
                                    <div class="col-md-12 mt-3">
                                        <div class="d-md-flex justify-content-between align-items-center">
                                            <div class="form-text small text-muted mb-3 mb-md-0">
                                                <i class="bi bi-shield-lock me-1"></i> {{ __('inicio.privacy_note') }}
                                            </div>
                                            <button type="submit" class="btn btn-danger px-4 py-2 shadow"
                                                id="submitBtn">
                                                <i class="bi bi-send me-2"></i>{{ __('inicio.send_message_button') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mapa corporativo -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="card rounded-4 shadow-sm overflow-hidden border-0">
                            <div class="card-header bg-light p-3 border-0 d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0"><i class="bi bi-geo-alt me-2 text-danger"></i>{{ __('inicio.our_location') }}</h5>

                            </div>
                            <div class="card-body p-0">
                                <!-- Mapa interactivo de Google Maps -->
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.3777486213357!2d-69.85581222117607!3d18.48678452536387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eaf87da711f0f45%3A0x6c001d00bc641b4!2sIndarca%20Ingenier%C3%ADa%20Dise%C3%B1o%20Arquitectura%20y%20Construcci%C3%B3n%20Avanzada!5e0!3m2!1ses!2ses!4v1743442269603!5m2!1ses!2ses"
                                    style="border:0; width: 100%; height: 400px;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>

                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <!-- Estilos para el formulario -->


            <!-- Script para activar mapa al hacer clic -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Prevenir envíos múltiples del formulario
                    const contactForm = document.getElementById('contactForm');
                    const submitBtn = document.getElementById('submitBtn');

                    if (contactForm && submitBtn) {
                        contactForm.addEventListener('submit', function() {
                            // Deshabilitar el botón de envío
                            submitBtn.disabled = true;
                            // Cambiar el texto del botón para indicar proceso
                            submitBtn.innerHTML =
                                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando...';

                            // Si el formulario se envía normalmente (no por AJAX), mantener el botón deshabilitado
                            setTimeout(function() {
                                if (!submitBtn.disabled)
                            return; // Si ya fue habilitado por alguna razón, no hacer nada

                                // Verificar si hubo algún error (en caso de que la página se recargue con errores)
                                const hasErrors = document.querySelector('.is-invalid');
                                if (hasErrors) {
                                    submitBtn.disabled = false;
                                    submitBtn.innerHTML = '<i class="bi bi-send me-2"></i>' + '{{ __('inicio.send_message_button') }}';
                                }
                            }, 2000);
                        });
                    }
                });
            </script>
        </section><!-- /Contact Section -->

         <!-- Estilos -->
         <style>
            :root {
                --color-primary: #D90000;
                --color-dark: #000000;
                --color-light: #FFFFFF;
                --color-primary-light: rgba(217, 0, 0, 0.1);
                --color-primary-medium: rgba(217, 0, 0, 0.5);
                --color-dark-light: rgba(0, 0, 0, 0.8);
                --color-dark-medium: rgba(0, 0, 0, 0.5);
                --color-dark-subtle: rgba(0, 0, 0, 0.1);
            }

            /* Animaciones personalizadas para los iconos */
            @keyframes pulse-border {
                0% {
                    transform: scale(1);
                    border-color: rgba(217, 0, 0, 0.2);
                }

                50% {
                    transform: scale(1.05);
                    border-color: rgba(217, 0, 0, 0.6);
                }

                100% {
                    transform: scale(1);
                    border-color: rgba(217, 0, 0, 0.2);
                }
            }

            @keyframes float {
                0% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-8px);
                }

                100% {
                    transform: translateY(0px);
                }
            }
            .map-card-overlay {
                                position: absolute;
                                bottom: 20px;
                                left: 20px;
                                z-index: 1000;
                                max-width: 300px;
                            }

                            .map-card {
                                border-left: 4px solid #D90000;
                                transition: all 0.3s ease;
                            }

                            .map-card:hover {
                                transform: translateY(-5px);
                            }

                            @media (max-width: 576px) {
                                .map-card-overlay {
                                    left: 50%;
                                    transform: translateX(-50%);
                                    width: 90%;
                                    max-width: none;
                                }
                            }
            .icon-box,
            .service-item .icon {
                width: 70px;
                height: 70px;
                transition: all 0.4s ease;
                border: 1px solid rgba(217, 0, 0, 0.2);
                box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .icon-animate {
                animation: pulse-border 2s infinite;
            }

            .float-animation {
                animation: float 3s ease-in-out infinite;
            }

            .hover-shadow {
                transition: all 0.3s ease;
            }

            .hover-shadow:hover {
                transform: translateY(-5px);
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
            }

            .service-item {
                transition: all 0.4s ease;
                padding: 20px;
                border-radius: 10px;
                background: #fff;
                box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            }

            .service-item:hover {
                transform: translateY(-10px);
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            }

            .service-item:hover .icon {
                background-color: var(--color-primary) !important;
            }

            .service-item:hover .icon i {
                color: var(--color-light) !important;
            }

            .stats-item {
                padding: 20px;
                width: 100%;
                background: rgba(255, 255, 255, 0.9);
                box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
                transition: all 0.4s;
                text-align: center;
                border-radius: 10px;
            }

            .stats .icon-box {
                animation: float 3s ease-in-out infinite;
                background-color: #FFFFFF !important;
            }

            .stats .icon-box i {
                color: #F40006 !important;
            }

            .stats .icon-box:hover {
                background-color: #292929 !important;
            }

            .stats .icon-box:hover i {
                color: #FFFFFF !important;
            }

            .stats-item:hover {
                transform: translateY(-5px);
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            }

            .transition-all {
                transition: all 0.3s ease;
            }

            .client-card {
                transition: all 0.3s ease;
                overflow: hidden;
                background-color: white;
                height: 180px;
            }

            .client-img {
                transition: all 0.3s ease;
                max-height: 100px;
                filter: grayscale(100%);
            }

            .client-card:hover .client-img {
                filter: grayscale(0%);
                transform: scale(1.05);
            }

            .card-overlay {
                position: absolute;
                bottom: -100%;
                left: 0;
                right: 0;
                background: rgba(217, 0, 0, 0.9);
                color: white;
                padding: 15px;
                transition: all 0.3s ease;
                border-radius: 0 0 18px 18px;
            }

            .client-card:hover .card-overlay {
                bottom: 0;
            }

            .overlay-content {
                text-align: center;
            }

            .opacity-10 {
                opacity: 0.1;
            }

            /* Estilos personalizados para el carrusel */
            #empresasCarrusel .carousel-control-prev,
            #empresasCarrusel .carousel-control-next {
                width: 40px;
                height: 40px;
                top: 50%;
                transform: translateY(-50%);
                opacity: 0.9;
            }

            #empresasCarrusel .carousel-control-prev {
                left: -20px;
            }

            #empresasCarrusel .carousel-control-next {
                right: -20px;
            }

            #empresasCarrusel .carousel-control-prev-icon,
            #empresasCarrusel .carousel-control-next-icon {
                width: 24px;
                height: 24px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            }

            #empresasCarrusel .carousel-indicators {
                bottom: -40px;
                margin-bottom: 0;
            }

            #empresasCarrusel .carousel-indicators button {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background-color: #D90000;
                opacity: 0.3;
                margin: 0 4px;
            }

            #empresasCarrusel .carousel-indicators button.active {
                opacity: 1;
            }

            #empresasCarrusel .carousel-item {
                padding-bottom: 20px;
            }

            /* Styles for Hero Button */
            .btn-get-started {
                background-color: var(--color-primary);
                border: 2px solid var(--color-primary);
                color: var(--color-light) !important; /* Ensure text is light over primary background */
                padding: 0.75rem 1.5rem; /* Generous padding for a main CTA */
                border-radius: 0.5rem;   /* 8px rounded corners for a modern look */
                text-transform: uppercase; /* Common for corporate buttons */
                font-weight: 600; /* Bold text */
                letter-spacing: 0.5px; /* Slight spacing for readability */
                transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out, border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
                text-decoration: none; /* Remove underline from link */
                line-height: 1.5; /* Standard line height for buttons */
                display: inline-block; /* Behaves like a block for padding/margin but flows inline */
                text-align: center; /* Center text within the button */
                vertical-align: middle; /* Align properly if next to other inline elements */
                cursor: pointer; /* Indicates it's clickable */
                box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Subtle initial shadow */
            }

            .btn-get-started:hover,
            .btn-get-started:focus { /* Style for hover and focus states for accessibility */
                background-color: var(--color-light); /* Light background on hover */
                color: var(--color-light) !important; /* Black text on hover */
                border-color: var(--color-primary); /* Keep primary border */
                box-shadow: 0 4px 12px rgba(217,0,0,0.2); /* More pronounced shadow on hover, using primary color tone */
                text-decoration: none; /* Ensure no underline on hover/focus */
            }
            /* End Styles for Hero Button */
        </style>

    </body>
@endsection
