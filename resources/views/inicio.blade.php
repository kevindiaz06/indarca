@extends('layout')
@section('content')

<style>
/* Animaciones personalizadas para los iconos */
@keyframes pulse-border {
    0% {
        transform: scale(1);
        border-color: rgba(13, 110, 253, 0.2);
    }
    50% {
        transform: scale(1.05);
        border-color: rgba(13, 110, 253, 0.6);
    }
    100% {
        transform: scale(1);
        border-color: rgba(13, 110, 253, 0.2);
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

.icon-box, .service-item .icon {
    width: 70px;
    height: 70px;
    transition: all 0.4s ease;
    border: 1px solid rgba(13, 110, 253, 0.2);
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
    background-color: var(--bs-primary) !important;
}

.service-item:hover .icon i {
    color: white !important;
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
}

.stats .icon-box:hover {
    background-color: var(--bs-primary) !important;
}

.stats .icon-box:hover i {
    color: white !important;
}

.stats-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.transition-all {
    transition: all 0.3s ease;
}
</style>

    <body class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section light-background">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                        <h1>Bienvenidos a <span>INDARCA</span></h1>
                        <p>Soluciones innovadoras en arquitectura, ingeniería y densímetros nucleares para proyectos de construcción que superan expectativas.</p>
                        <div class="d-flex">
                            <a href="#contact" class="btn-get-started">Contáctanos</a>
                            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                                class="glightbox btn-watch-video d-flex align-items-center"><i
                                    class="bi bi-play-circle"></i><span>Ver Video</span></a>
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
                            <div class="icon bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mb-3 icon-animate">
                                <i class="bi bi-activity text-primary fs-3"></i>
                            </div>
                            <h4><a href="" class="stretched-link">Calibración y mantenimiento de densímetros
                                    nucleares</a></h4>
                            <p>Servicio especializado para garantizar la precisión y fiabilidad de sus equipos de medición de densidad y humedad.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mb-3 icon-animate">
                                <i class="bi bi-bounding-box-circles text-primary fs-3"></i>
                            </div>
                            <h4><a href="" class="stretched-link">Diseño y construcción de proyectos
                                    arquitectónicos</a></h4>
                            <p>Creamos espacios funcionales y estéticos que se adaptan perfectamente a las necesidades de nuestros clientes.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mb-3 icon-animate">
                                <i class="bi bi-gear text-primary fs-3"></i>
                            </div>
                            <h4><a href="" class="stretched-link">Supervisión y gestión de obras</a></h4>
                            <p>Control integral de proyectos para asegurar el cumplimiento de plazos, presupuestos y estándares de calidad.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mb-3 icon-animate">
                                <i class="bi bi-broadcast text-primary fs-3"></i>
                            </div>
                            <h4><a href="" class="stretched-link">Asesoría técnica especializada</a></h4>
                            <p>Consultoría profesional para optimizar sus proyectos y resolver desafíos técnicos específicos en construcción.</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Featured Services Section -->

        <!-- About Section -->
        <section id="about" class="about section light-background py-5">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Sobre Nosotros</h2>
                <p><span>Conoce más</span> <span class="description-title">sobre INDARCA</span></p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row g-4">
                    <!-- Imagen principal con overlay de información -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="position-relative rounded-4 overflow-hidden shadow-lg h-100">
                            <img src="assets/img/ramces_carolina.jpg" alt="Equipo INDARCA" class="img-fluid w-100 h-100 object-fit-cover">
                            <div class="position-absolute bottom-0 start-0 w-100 p-4 bg-dark bg-opacity-75 text-white">
                                <h3 class="fw-bold border-start border-primary border-4 ps-3 mb-2">Nuestra Historia</h3>
                                <p>Fundada en 2005, INDARCA ha evolucionado hasta convertirse en un referente en la industria de la construcción, arquitectura y calibración de densímetros nucleares en República Dominicana.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Contenido en tarjetas -->
                    <div class="col-lg-6 d-flex flex-column" data-aos="fade-up" data-aos-delay="200">
                        <!-- Tarjeta principal con certificaciones -->
                        <div class="card border-0 shadow-lg rounded-4 mb-4 h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary rounded-circle p-3 me-3 text-white icon-animate">
                                        <i class="bi bi-award fs-3"></i>
                                    </div>
                                    <h3 class="fw-bold mb-0">Certificaciones y Reconocimientos</h3>
                                </div>
                                <p class="fst-italic mb-4">
                                    <span class="fw-bold text-primary">INDARCA</span>
                                ha sido reconocida por su compromiso con
                                la calidad y la seguridad en el sector,
                                contando con certificaciones de alto estándar en ingeniería y arquitectura.
                            </p>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-3 bg-light rounded-3 h-100 hover-shadow">
                                            <div class="icon-box bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                                <i class="bi bi-patch-check-fill text-primary fs-3"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-1">ISO 9001:2015</h6>
                                                <p class="small mb-0">Gestión de Calidad</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-3 bg-light rounded-3 h-100 hover-shadow">
                                            <div class="icon-box bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                                <i class="bi bi-shield-check text-primary fs-3"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-1">ISO 14001</h6>
                                                <p class="small mb-0">Gestión Ambiental</p>
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
                                            <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-3 d-flex justify-content-center align-items-center me-3">
                                                <i class="bi bi-diagram-3 text-primary fs-1"></i>
                                            </div>
                                            <h4 class="card-title fw-bold mb-0">Ingeniería Innovadora</h4>
                                        </div>
                                        <p class="card-text">Con soluciones creativas y un enfoque vanguardista, redefinimos los proyectos de ingeniería, superando expectativas en cada etapa.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="card border-0 shadow h-100 rounded-4 bg-gradient hover-shadow">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-3 d-flex justify-content-center align-items-center me-3">
                                                <i class="bi bi-fullscreen-exit text-primary fs-1"></i>
                                            </div>
                                            <h4 class="card-title fw-bold mb-0">Diseño Creativo</h4>
                                        </div>
                                        <p class="card-text">Transformamos proyectos en obras de alto impacto, destacando por nuestra calidad y eficiencia en cada detalle constructivo.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sección valores con iconos -->
                <div class="row mt-5 pt-4 g-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="col-12 text-center mb-4">
                        <h3 class="fw-bold">Nuestros Valores</h3>
                        <div class="d-inline-block mx-auto border-bottom border-primary border-2 pb-2 px-5"></div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="text-center p-4 rounded-4 bg-white shadow-sm hover-shadow transition-all h-100">
                            <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-3 d-inline-flex justify-content-center align-items-center mb-3 icon-animate">
                                <i class="bi bi-stars text-primary fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Excelencia</h5>
                            <p>Buscamos la perfección en cada detalle de nuestros proyectos y servicios.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="text-center p-4 rounded-4 bg-white shadow-sm hover-shadow transition-all h-100">
                            <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-3 d-inline-flex justify-content-center align-items-center mb-3 icon-animate">
                                <i class="bi bi-people-fill text-primary fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Trabajo en Equipo</h5>
                            <p>Colaboramos efectivamente para lograr resultados excepcionales en cada proyecto.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="text-center p-4 rounded-4 bg-white shadow-sm hover-shadow transition-all h-100">
                            <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-3 d-inline-flex justify-content-center align-items-center mb-3 icon-animate">
                                <i class="bi bi-lightbulb-fill text-primary fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Innovación</h5>
                            <p>Implementamos soluciones creativas a los desafíos más complejos de ingeniería.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="text-center p-4 rounded-4 bg-white shadow-sm hover-shadow transition-all h-100">
                            <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-3 d-inline-flex justify-content-center align-items-center mb-3 icon-animate">
                                <i class="bi bi-shield-check text-primary fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Integridad</h5>
                            <p>Operamos con los más altos estándares éticos y profesionales en todas nuestras actividades.</p>
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
                        <div class="icon-box bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mb-3 float-animation">
                            <i class="bi bi-emoji-smile text-primary fs-3"></i>
                        </div>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $totalClientes ?? 0 }}" data-purecounter-duration="5"
                                class="purecounter"></span>
                            <p>+ Clientes</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <div class="icon-box bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mb-3 float-animation">
                            <i class="bi bi-journal-richtext text-primary fs-3"></i>
                        </div>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="125" data-purecounter-duration="5"
                                class="purecounter"></span>
                            <p>proyectos</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <div class="icon-box bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mb-3 float-animation">
                            <i class="bi bi-activity text-primary fs-3"></i>
                        </div>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="5"
                                class="purecounter"></span>
                            <p>mantenimientos</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <div class="icon-box bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mb-3 float-animation">
                            <i class="bi bi-people text-primary fs-3"></i>
                        </div>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $totalTrabajadores ?? 0 }}" data-purecounter-duration="5"
                                class="purecounter"></span>
                            <p>Trabajadores</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Clients Section -->
        <section id="clients" class="clients section py-5">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Nuestros Clientes</h2>
                <p><span>Empresas que</span> <span class="description-title">Confían en Nosotros</span></p>
            </div>

            <div class="container">
                <div class="bg-gradient-light rounded-4 p-5 shadow-lg position-relative overflow-hidden" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
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
                            <h3 class="fw-bold mb-4">Alianzas Estratégicas</h3>
                            <p class="lead mb-0">Colaboramos con las empresas más importantes del sector, estableciendo relaciones de confianza basadas en la excelencia y el profesionalismo.</p>
                    </div>
                </div>

                    <!-- Grid de logos de clientes -->
                    <div class="row row-cols-2 row-cols-md-4 row-cols-lg-4 g-4 position-relative">
                        <!-- Cliente 1 -->
                        <div class="col" data-aos="fade-up" data-aos-delay="100">
                            <div class="card h-100 border-0 rounded-4 client-card shadow-sm">
                                <div class="card-body d-flex align-items-center justify-content-center p-4">
                                    <img src="assets/img/clients/client-1.png" class="img-fluid client-img" alt="Cliente 1">
                                </div>
                                <div class="card-overlay">
                                    <div class="overlay-content">
                                        <h5 class="fw-bold">Cliente Destacado</h5>
                                        <p class="mb-0 small">Colaboración desde 2018</p>
                                    </div>
                                </div>
                            </div>
            </div>

                        <!-- Cliente 2 -->
                        <div class="col" data-aos="fade-up" data-aos-delay="150">
                            <div class="card h-100 border-0 rounded-4 client-card shadow-sm">
                                <div class="card-body d-flex align-items-center justify-content-center p-4">
                                    <img src="assets/img/clients/client-2.png" class="img-fluid client-img" alt="Cliente 2">
                                </div>
                                <div class="card-overlay">
                                    <div class="overlay-content">
                                        <h5 class="fw-bold">Cliente Premium</h5>
                                        <p class="mb-0 small">Socio estratégico</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cliente 3 -->
                        <div class="col" data-aos="fade-up" data-aos-delay="200">
                            <div class="card h-100 border-0 rounded-4 client-card shadow-sm">
                                <div class="card-body d-flex align-items-center justify-content-center p-4">
                                    <img src="assets/img/clients/client-3.png" class="img-fluid client-img" alt="Cliente 3">
                                </div>
                                <div class="card-overlay">
                                    <div class="overlay-content">
                                        <h5 class="fw-bold">Alianza Internacional</h5>
                                        <p class="mb-0 small">Presencia global</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cliente 4 -->
                        <div class="col" data-aos="fade-up" data-aos-delay="250">
                            <div class="card h-100 border-0 rounded-4 client-card shadow-sm">
                                <div class="card-body d-flex align-items-center justify-content-center p-4">
                                    <img src="assets/img/clients/client-4.png" class="img-fluid client-img" alt="Cliente 4">
                                </div>
                                <div class="card-overlay">
                                    <div class="overlay-content">
                                        <h5 class="fw-bold">Construcción Avanzada</h5>
                                        <p class="mb-0 small">Proyectos de alta complejidad</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cliente 5 -->
                        <div class="col" data-aos="fade-up" data-aos-delay="300">
                            <div class="card h-100 border-0 rounded-4 client-card shadow-sm">
                                <div class="card-body d-flex align-items-center justify-content-center p-4">
                                    <img src="assets/img/clients/client-5.png" class="img-fluid client-img" alt="Cliente 5">
                                </div>
                                <div class="card-overlay">
                                    <div class="overlay-content">
                                        <h5 class="fw-bold">Tecnología Constructiva</h5>
                                        <p class="mb-0 small">Innovación constante</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cliente 6 -->
                        <div class="col" data-aos="fade-up" data-aos-delay="350">
                            <div class="card h-100 border-0 rounded-4 client-card shadow-sm">
                                <div class="card-body d-flex align-items-center justify-content-center p-4">
                                    <img src="assets/img/clients/client-6.png" class="img-fluid client-img" alt="Cliente 6">
                                </div>
                                <div class="card-overlay">
                                    <div class="overlay-content">
                                        <h5 class="fw-bold">Diseño Arquitectónico</h5>
                                        <p class="mb-0 small">Estética y funcionalidad</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cliente 7 -->
                        <div class="col" data-aos="fade-up" data-aos-delay="400">
                            <div class="card h-100 border-0 rounded-4 client-card shadow-sm">
                                <div class="card-body d-flex align-items-center justify-content-center p-4">
                                    <img src="assets/img/clients/client-7.png" class="img-fluid client-img" alt="Cliente 7">
                                </div>
                                <div class="card-overlay">
                                    <div class="overlay-content">
                                        <h5 class="fw-bold">Ingeniería Civil</h5>
                                        <p class="mb-0 small">Proyectos sostenibles</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cliente 8 -->
                        <div class="col" data-aos="fade-up" data-aos-delay="450">
                            <div class="card h-100 border-0 rounded-4 client-card shadow-sm">
                                <div class="card-body d-flex align-items-center justify-content-center p-4">
                                    <img src="assets/img/clients/client-8.png" class="img-fluid client-img" alt="Cliente 8">
                                </div>
                                <div class="card-overlay">
                                    <div class="overlay-content">
                                        <h5 class="fw-bold">Materiales Avanzados</h5>
                                        <p class="mb-0 small">Calidad garantizada</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Call to action -->
                    <div class="text-center mt-5 pt-3">
                        <a href="#contact" class="btn btn-primary btn-lg rounded-pill px-4 py-2">
                            <i class="bi bi-building me-2"></i>Conviértete en cliente
                        </a>
                    </div>
                </div>
            </div>

            <!-- Estilos específicos para esta sección -->
            <style>
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
                    background: rgba(13, 110, 253, 0.9);
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
            </style>
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
                        <li data-filter=".filter-app">Densímetros</li>
                        <li data-filter=".filter-product">Arquitectura</li>
                        <li data-filter=".filter-branding">Ingeniería</li>
                    </ul><!-- End Portfolio Filters -->

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="assets/img/masonry-portfolio/masonry-portfolio-1.jpg" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Densímetros 1</h4>
                                <p>Calibración especializada</p>
                                <a href="assets/img/masonry-portfolio/masonry-portfolio-1.jpg" title="Densímetros 1"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <img src="assets/img/masonry-portfolio/masonry-portfolio-2.jpg" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Arquitectura 1</h4>
                                <p>Proyecto residencial</p>
                                <a href="assets/img/masonry-portfolio/masonry-portfolio-2.jpg" title="Arquitectura 1"
                                    data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <img src="assets/img/masonry-portfolio/masonry-portfolio-3.jpg" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Ingeniería 1</h4>
                                <p>Supervisión de obra</p>
                                <a href="assets/img/masonry-portfolio/masonry-portfolio-3.jpg" title="Ingeniería 1"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="assets/img/masonry-portfolio/masonry-portfolio-4.jpg" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Densímetros 2</h4>
                                <p>Mantenimiento preventivo</p>
                                <a href="assets/img/masonry-portfolio/masonry-portfolio-4.jpg" title="Densímetros 2"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <img src="assets/img/masonry-portfolio/masonry-portfolio-5.jpg" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Arquitectura 2</h4>
                                <p>Diseño comercial</p>
                                <a href="assets/img/masonry-portfolio/masonry-portfolio-5.jpg" title="Arquitectura 2"
                                    data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <img src="assets/img/masonry-portfolio/masonry-portfolio-6.jpg" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Ingeniería 2</h4>
                                <p>Consultoría estructural</p>
                                <a href="assets/img/masonry-portfolio/masonry-portfolio-6.jpg" title="Ingeniería 2"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="assets/img/masonry-portfolio/masonry-portfolio-7.jpg" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Densímetros 3</h4>
                                <p>Reparación de equipos</p>
                                <a href="assets/img/masonry-portfolio/masonry-portfolio-7.jpg" title="Densímetros 3"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <img src="assets/img/masonry-portfolio/masonry-portfolio-8.jpg" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Arquitectura 3</h4>
                                <p>Proyecto institucional</p>
                                <a href="assets/img/masonry-portfolio/masonry-portfolio-8.jpg" title="Arquitectura 3"
                                    data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <img src="assets/img/masonry-portfolio/masonry-portfolio-9.jpg" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Ingeniería 3</h4>
                                <p>Gestión de proyectos</p>
                                <a href="assets/img/masonry-portfolio/masonry-portfolio-9.jpg" title="Ingeniería 3"
                                    data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->

                    </div><!-- End Portfolio Container -->

                </div>

            </div>

        </section><!-- /Portfolio Section -->



        <!-- Pricing Section -->
        <section id="pricing" class="pricing section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Precios</h2>
                <p><span>Nuestros</span> <span class="description-title">Planes</span></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-3">

                    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="pricing-item">
                            <h3>Básico</h3>
                            <h4><sup>$</sup>199<span> / mes</span></h4>
                            <ul>
                                <li>Mantenimiento básico</li>
                                <li>Calibración trimestral</li>
                                <li>Soporte por email</li>
                                <li class="na">Respuesta prioritaria</li>
                                <li class="na">Servicio 24/7</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Comprar</a>
                            </div>
                        </div>
                    </div><!-- End Pricing Item -->

                    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="pricing-item featured">
                            <h3>Estándar</h3>
                            <h4><sup>$</sup>399<span> / mes</span></h4>
                            <ul>
                                <li>Mantenimiento completo</li>
                                <li>Calibración mensual</li>
                                <li>Soporte telefónico</li>
                                <li>Respuesta prioritaria</li>
                                <li class="na">Servicio 24/7</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Comprar</a>
                            </div>
                        </div>
                    </div><!-- End Pricing Item -->

                    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="pricing-item">
                            <h3>Profesional</h3>
                            <h4><sup>$</sup>599<span> / mes</span></h4>
                            <ul>
                                <li>Mantenimiento preventivo y correctivo</li>
                                <li>Calibración quincenal</li>
                                <li>Soporte personalizado</li>
                                <li>Respuesta en 24 horas</li>
                                <li>Asesoría técnica</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Comprar</a>
                            </div>
                        </div>
                    </div><!-- End Pricing Item -->

                    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="pricing-item">
                            <span class="advanced">Premium</span>
                            <h3>Empresarial</h3>
                            <h4><sup>$</sup>999<span> / mes</span></h4>
                            <ul>
                                <li>Servicio completo todo incluido</li>
                                <li>Calibración semanal</li>
                                <li>Soporte dedicado</li>
                                <li>Respuesta inmediata</li>
                                <li>Servicio 24/7</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Comprar</a>
                            </div>
                        </div>
                    </div><!-- End Pricing Item -->

                </div>

            </div>

        </section><!-- /Pricing Section -->



        <!-- Contact Section -->
        <section id="contact" class="contact section py-5">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contacto</h2>
                <p><span>Comuníquese con</span> <span class="description-title">Nuestro Equipo</span></p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <!-- Presentación corporativa -->
                <div class="row mb-5">
                    <div class="col-lg-8 mx-auto text-center">
                        <p class="lead text-muted mb-0">Valoramos su interés en INDARCA. Nuestro equipo de especialistas está preparado para atender sus consultas y brindarle soluciones personalizadas para sus proyectos.</p>
                    </div>
                </div>

                <!-- Contenedor principal -->
                <div class="bg-white rounded-4 shadow overflow-hidden" style="box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08) !important; transform: translateY(0); transition: all 0.3s ease;">
                    <div class="row g-0">
                        <!-- Panel izquierdo - Información de contacto -->
                        <div class="col-lg-4">
                            <div class="h-100 p-4 p-lg-5 text-white" style="background: linear-gradient(135deg, #0d6efd 0%, #084298 100%);">
                                <!-- Logo y título -->
                                <div class="text-center mb-5">
                                    <div class="mb-4">
                                        <img src="{{ asset('assets/img/logo_indarca.png') }}" alt="INDARCA" class="img-fluid" style="max-height: 60px;">
                                    </div>
                                    <h3 class="fw-light mb-2">Centro de <span class="fw-bold">Atención</span></h3>
                                    <div class="mx-auto" style="width: 50px; height: 3px; background-color: rgba(255, 255, 255, 0.5); margin-top: 10px;"></div>
                                </div>

                                <!-- Información de contacto -->
                                <div class="mb-5">
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="me-3 rounded-circle bg-white bg-opacity-25 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="bi bi-geo-alt text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="text-white-50 mb-1 small">Dirección Principal</h6>
                                            <p class="mb-0">Calle Principal #123, Santo Domingo, Rep. Dom.</p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-4">
                                        <div class="me-3 rounded-circle bg-white bg-opacity-25 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background-color: rgba(255, 255, 255, 0.2);">
                                            <i class="bi bi-telephone text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="text-white-50 mb-1 small">Teléfono</h6>
                                            <p class="mb-0">+1809 596 0333</p>
                                            <p class="mb-0">+1809 596 0334</p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-4">
                                        <div class="me-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background-color: rgba(255, 255, 255, 0.2);">
                                            <i class="bi bi-envelope text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="text-white-50 mb-1 small">Correo Electrónico</h6>
                                            <p class="mb-0">contacto@indarca.com</p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <div class="me-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background-color: rgba(255, 255, 255, 0.2);">
                                            <i class="bi bi-clock text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="text-white-50 mb-1 small">Horario de Atención</h6>
                                            <p class="mb-0">Lunes - Viernes: 8:00 AM - 6:00 PM</p>
                                            <p class="mb-0">Sábados: 9:00 AM - 1:00 PM</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Redes sociales -->
                                <div class="mt-5 pt-2">
                                    <h6 class="text-white-50 mb-3 small">Conéctese con nosotros</h6>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; background-color: rgba(255, 255, 255, 0.2); transition: all 0.3s ease;">
                                            <i class="bi bi-facebook text-white"></i>
                                        </a>
                                        <a href="#" class="rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; background-color: rgba(255, 255, 255, 0.2); transition: all 0.3s ease;">
                                            <i class="bi bi-twitter-x text-white"></i>
                                        </a>
                                        <a href="#" class="rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; background-color: rgba(255, 255, 255, 0.2); transition: all 0.3s ease;">
                                            <i class="bi bi-instagram text-white"></i>
                                        </a>
                                        <a href="#" class="rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; background-color: rgba(255, 255, 255, 0.2); transition: all 0.3s ease;">
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
                                    <h4 class="fw-bold text-dark mb-2">Envíe su mensaje</h4>
                                    <p class="text-muted mb-0">Complete el formulario y nos pondremos en contacto a la brevedad</p>
                                </div>

                                <!-- Alertas -->
                                @if(session('success'))
                                    <div class="alert alert-success border-0 rounded-3 shadow-sm mb-4" role="alert">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px; background-color: rgba(25, 135, 84, 0.15);">
                                                <i class="bi bi-check-circle text-success fs-4"></i>
                                            </div>
                                            <div>
                                                <h6 class="alert-heading mb-1">¡Mensaje enviado correctamente!</h6>
                                                <p class="mb-0 small">{{ session('success') }}</p>
                                            </div>
                                            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger border-0 rounded-3 shadow-sm mb-4" role="alert">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px; background-color: rgba(220, 53, 69, 0.15);">
                                                <i class="bi bi-exclamation-circle text-danger fs-4"></i>
                                            </div>
                                            <div>
                                                <h6 class="alert-heading mb-1">Ha ocurrido un error</h6>
                                                <p class="mb-0 small">{{ session('error') }}</p>
                                            </div>
                                            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                @endif

                                <!-- Formulario de contacto -->
                                <form action="/contacto/enviar" method="post" class="row g-4" data-aos="fade-up">
                                    @csrf
                                    <!-- Nombre -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name-field" class="form-label text-muted fw-medium mb-2">Nombre completo</label>
                                            <div class="input-group shadow-sm rounded-3 overflow-hidden">
                                                <span class="input-group-text bg-white border-end-0 text-muted">
                                                    <i class="bi bi-person"></i>
                                                </span>
                                                <input type="text" name="name" id="name-field" class="form-control border-start-0 @error('name') is-invalid @enderror"
                                                    placeholder="Ingrese su nombre" value="{{ auth()->check() ? auth()->user()->name : old('name') }}" {{ auth()->check() ? 'readonly' : '' }} required>
                                            </div>
                                            @error('name')
                                                <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Correo electrónico -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email-field" class="form-label text-muted fw-medium mb-2">Correo electrónico</label>
                                            <div class="input-group shadow-sm rounded-3 overflow-hidden">
                                                <span class="input-group-text bg-white border-end-0 text-muted">
                                                    <i class="bi bi-envelope"></i>
                                                </span>
                                                <input type="email" name="email" id="email-field" class="form-control border-start-0 @error('email') is-invalid @enderror"
                                                    placeholder="Ingrese su correo" value="{{ auth()->check() ? auth()->user()->email : old('email') }}" {{ auth()->check() ? 'readonly' : '' }} required>
                                            </div>
                                            @error('email')
                                                <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Departamento -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="subject-field" class="form-label text-muted fw-medium mb-2">Departamento</label>
                                            <div class="input-group shadow-sm rounded-3 overflow-hidden">
                                                <span class="input-group-text bg-white border-end-0 text-muted">
                                                    <i class="bi bi-building"></i>
                                                </span>
                                                <select name="subject" id="subject-field" class="form-select border-start-0 @error('subject') is-invalid @enderror" required>
                                                    <option value="" disabled selected>Seleccione el departamento correspondiente</option>
                                                    <option value="Ventas" {{ old('subject') == 'Ventas' ? 'selected' : '' }}>Departamento de Ventas</option>
                                                    <option value="Taller" {{ old('subject') == 'Taller' ? 'selected' : '' }}>Taller y Mantenimiento</option>
                                                    <option value="Secretaría" {{ old('subject') == 'Secretaría' ? 'selected' : '' }}>Secretaría General</option>
                                                    <option value="Oficinas Centrales" {{ old('subject') == 'Oficinas Centrales' ? 'selected' : '' }}>Oficinas Centrales</option>
                                                    <option value="Arquitectura" {{ old('subject') == 'Arquitectura' ? 'selected' : '' }}>Departamento de Arquitectura</option>
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
                                            <label for="message-field" class="form-label text-muted fw-medium mb-2">Su mensaje</label>
                                            <textarea name="message" id="message-field" rows="5" class="form-control shadow-sm rounded-3 @error('message') is-invalid @enderror"
                                                placeholder="Describa detalladamente el motivo de su consulta" required>{{ old('message') }}</textarea>
                                            @error('message')
                                                <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Botones y términos -->
                                    <div class="col-md-12 mt-3">
                                        <div class="d-md-flex justify-content-between align-items-center">
                                            <div class="form-text small text-muted mb-3 mb-md-0">
                                                <i class="bi bi-shield-lock me-1"></i> Su información está protegida por nuestra política de privacidad
                                            </div>
                                            <button type="submit" class="btn btn-primary px-4 py-2 shadow">
                                                <i class="bi bi-send me-2"></i>Enviar mensaje
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
                            <div class="card-header bg-light p-3 border-0">
                                <h5 class="card-title mb-0"><i class="bi bi-geo-alt me-2 text-primary"></i>Nuestra ubicación</h5>
                            </div>
                            <div class="card-body p-0 position-relative">
                                <div id="map-overlay" class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(255, 255, 255, 0.5); z-index: 10; transition: opacity 0.3s ease;">
                                    <button id="activate-map-btn" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm" style="transition: all 0.3s ease;">
                                        <i class="bi bi-map me-2"></i>Activar mapa interactivo
                                    </button>
                                </div>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.3777486213357!2d-69.85581222117607!3d18.48678452536387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eaf87da711f0f45%3A0x6c001d00bc641b4!2sIndarca%20Ingenier%C3%ADa%20Dise%C3%B1o%20Arquitectura%20y%20Construcci%C3%B3n%20Avanzada!5e1!3m2!1ses!2ses!4v1743442269603!5m2!1ses!2ses"
                                    style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estilos para el formulario -->
            <style>
                /* Estilos para campos del formulario */
                .form-control, .form-select, .input-group-text {
                    padding: 0.6rem 1rem;
                    border-color: #e8e8e8;
                    transition: all 0.3s ease;
                }

                .form-control:focus, .form-select:focus {
                    border-color: #0d6efd;
                    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15) !important;
                    transform: translateY(-2px);
                }

                .input-group {
                    transition: all 0.3s ease;
                }

                .input-group:focus-within {
                    transform: translateY(-2px);
                    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08) !important;
                }

                textarea.form-control {
                    resize: none;
                }

                /* Efectos hover para botones y enlaces */
                .btn-primary:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
                }

                a[style*="width: 36px;"]:hover {
                    background-color: rgba(255, 255, 255, 0.4) !important;
                    transform: translateY(-3px);
                }

                /* Ajustes responsive */
                @media (max-width: 992px) {
                    .col-lg-4 .h-100 {
                        border-radius: 0.75rem 0.75rem 0 0;
                    }
                }

                /* Profundidad del formulario */
                .form-group {
                    margin-bottom: 1.25rem;
                    position: relative;
                    z-index: 1;
                }

                /* Efecto 3D para el contenedor principal */
                .bg-white.rounded-4:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
                }
            </style>

            <!-- Script para activar mapa al hacer clic -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const mapOverlay = document.getElementById('map-overlay');
                    const activateMapBtn = document.getElementById('activate-map-btn');

                    if (mapOverlay && activateMapBtn) {
                        activateMapBtn.addEventListener('click', function() {
                            mapOverlay.style.opacity = '0';
                            setTimeout(function() {
                                mapOverlay.style.display = 'none';
                            }, 300);
                        });
                    }
                });
            </script>
        </section><!-- /Contact Section -->

    </body>
@endsection
