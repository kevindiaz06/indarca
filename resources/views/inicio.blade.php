@extends('layout')
@section('content')

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
                            <div class="icon"><i class="bi bi-activity icon"></i></div>
                            <h4><a href="" class="stretched-link">Calibración y mantenimiento de densímetros
                                    nucleares</a></h4>
                            <p>Servicio especializado para garantizar la precisión y fiabilidad de sus equipos de medición de densidad y humedad.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                            <h4><a href="" class="stretched-link">Diseño y construcción de proyectos
                                    arquitectónicos</a></h4>
                            <p>Creamos espacios funcionales y estéticos que se adaptan perfectamente a las necesidades de nuestros clientes.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-gear"></i></div>
                            <h4><a href="" class="stretched-link">Supervisión y gestión de obras</a></h4>
                            <p>Control integral de proyectos para asegurar el cumplimiento de plazos, presupuestos y estándares de calidad.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-broadcast icon"></i></div>
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
                                    <div class="bg-primary rounded-circle p-3 me-3 text-white">
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
                                        <div class="d-flex align-items-center p-3 bg-light rounded-3 h-100">
                                            <i class="bi bi-patch-check-fill text-primary fs-3 me-3"></i>
                                    <div>
                                                <h6 class="fw-bold mb-1">ISO 9001:2015</h6>
                                                <p class="small mb-0">Gestión de Calidad</p>
                                    </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-3 bg-light rounded-3 h-100">
                                            <i class="bi bi-shield-check text-primary fs-3 me-3"></i>
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
                                <div class="card border-0 shadow h-100 rounded-4 bg-gradient">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="bi bi-diagram-3 text-primary fs-1 me-3"></i>
                                            <h4 class="card-title fw-bold mb-0">Ingeniería Innovadora</h4>
                                        </div>
                                        <p class="card-text">Con soluciones creativas y un enfoque vanguardista, redefinimos los proyectos de ingeniería, superando expectativas en cada etapa.</p>
                                    </div>
                                </div>
                        </div>

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="card border-0 shadow h-100 rounded-4 bg-gradient">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="bi bi-fullscreen-exit text-primary fs-1 me-3"></i>
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

                    <div class="col-lg-3 col-md-6">
                        <div class="text-center p-4 rounded-4 bg-white shadow-sm hover-shadow transition-all h-100">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-3">
                                <i class="bi bi-stars text-primary fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Excelencia</h5>
                            <p>Buscamos la perfección en cada detalle de nuestros proyectos y servicios.</p>
                    </div>
                </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="text-center p-4 rounded-4 bg-white shadow-sm hover-shadow transition-all h-100">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-3">
                                <i class="bi bi-people-fill text-primary fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Trabajo en Equipo</h5>
                            <p>Colaboramos efectivamente para lograr resultados excepcionales en cada proyecto.</p>
                        </div>
            </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="text-center p-4 rounded-4 bg-white shadow-sm hover-shadow transition-all h-100">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-3">
                                <i class="bi bi-lightbulb-fill text-primary fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Innovación</h5>
                            <p>Implementamos soluciones creativas a los desafíos más complejos de ingeniería.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="text-center p-4 rounded-4 bg-white shadow-sm hover-shadow transition-all h-100">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-3">
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
                        <i class="bi bi-emoji-smile"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $totalClientes ?? 0 }}" data-purecounter-duration="5"
                                class="purecounter"></span>
                            <p>+ Clientes</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-journal-richtext"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="125" data-purecounter-duration="5"
                                class="purecounter"></span>
                            <p>proyectos</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-activity icon"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="5"
                                class="purecounter"></span>
                            <p>mantenimientos</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                        <i class="bi bi-people"></i>
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

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section dark-background">

            <img src="assets/img/testimonials-bg.jpg" class="testimonials-bg" alt="">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Carlos Rodríguez</h3>
                                <h4>Director de Construcción</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Los servicios de calibración de densímetros nucleares de INDARCA han sido fundamentales para garantizar la precisión en nuestros proyectos de infraestructura. Su equipo profesional y atento siempre responde con rapidez a nuestras necesidades.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img"
                                    alt="">
                                <h3>María Sánchez</h3>
                                <h4>Arquitecta</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>La colaboración con INDARCA en el diseño de nuestro complejo comercial fue excepcional. Su enfoque creativo y técnico, combinado con su atención al detalle, nos permitió crear un espacio único que ha superado todas nuestras expectativas.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                    alt="">
                                <h3>José Méndez</h3>
                                <h4>Gerente de Proyectos</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>La supervisión de obras realizada por INDARCA fue clave para el éxito de nuestro proyecto residencial. Su capacidad para coordinar equipos y resolver problemas en tiempo real garantizó que cumpliéramos con nuestros plazos y presupuestos.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Ana Martínez</h3>
                                <h4>Directora de Operaciones</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>El servicio de mantenimiento preventivo para nuestros densímetros ha sido impecable. INDARCA ha demostrado un profundo conocimiento técnico y una excelente capacidad de respuesta, lo que nos ha permitido mantener nuestras operaciones sin interrupciones.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Luis Fernández</h3>
                                <h4>Constructor</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>La asesoría técnica de INDARCA fue fundamental para resolver los desafíos estructurales en nuestro proyecto. Su equipo de ingenieros no solo identificó los problemas, sino que propuso soluciones innovadoras que mejoraron significativamente el resultado final.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Testimonials Section -->

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
                <p><span>¿Necesitas ayuda?</span> <span class="description-title">Contáctanos</span></p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <!-- Banner de introducción -->
                <div class="row mb-5">
                    <div class="col-lg-10 col-xl-8 mx-auto text-center">
                        <p class="lead mb-0">Estamos aquí para responder tus preguntas y ayudarte con tus proyectos. Completa el formulario y un especialista te contactará pronto.</p>
                    </div>
                </div>

                <div class="row g-5">
                    <!-- Información de contacto -->
                    <div class="col-lg-5">
                        <div class="contact-info-card rounded-4 shadow-lg overflow-hidden position-relative">
                            <div class="bg-primary text-white p-4 position-relative contact-info-header">
                                <div class="position-absolute top-0 end-0 translate-middle-y opacity-10 me-n3">
                                    <i class="bi bi-buildings-fill" style="font-size: 8rem;"></i>
                                </div>
                                <h3 class="fw-bold mb-2">INDARCA</h3>
                                <p class="fs-5 mb-0">Contacto directo</p>
                            </div>

                            <div class="p-4 bg-white">
                                <div class="info-item d-flex py-3 border-bottom" data-aos="fade-up" data-aos-delay="200">
                                    <div class="icon-box bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3">
                                        <i class="bi bi-geo-alt-fill text-primary fs-4"></i>
                                    </div>
                                <div>
                                        <h5 class="fw-bold mb-1">Dirección</h5>
                                        <p class="mb-0 text-muted">Calle Principal #123, Santo Domingo, Rep. Dom.</p>
                                </div>
                                </div>

                                <div class="info-item d-flex py-3 border-bottom" data-aos="fade-up" data-aos-delay="300">
                                    <div class="icon-box bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3">
                                        <i class="bi bi-telephone-fill text-primary fs-4"></i>
                                    </div>
                                <div>
                                        <h5 class="fw-bold mb-1">Teléfono</h5>
                                        <p class="mb-0 text-muted">+1809 596 0333</p>
                                        <p class="mb-0 text-muted">+1809 596 0334</p>
                                </div>
                                </div>

                                <div class="info-item d-flex py-3 mb-2" data-aos="fade-up" data-aos-delay="400">
                                    <div class="icon-box bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3">
                                        <i class="bi bi-envelope-fill text-primary fs-4"></i>
                                    </div>
                                <div>
                                        <h5 class="fw-bold mb-1">Email</h5>
                                        <p class="mb-0 text-muted">contacto@indarca.com</p>
                                        <p class="mb-0 text-muted">info@indarca.com</p>
                                </div>
                                </div>

                                <div class="mt-4">
                                    <h5 class="fw-bold border-start border-primary border-3 ps-2 mb-3">Horario de Atención</h5>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Lunes - Viernes:</span>
                                        <span class="fw-semibold">8:00 AM - 6:00 PM</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">Sábados:</span>
                                        <span class="fw-semibold">9:00 AM - 1:00 PM</span>
                        </div>
                    </div>

                                <div class="social-links d-flex mt-4 pt-2 gap-2">
                                    <a href="#" class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                        <i class="bi bi-twitter-x"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Tarjeta del mapa integrada con el mismo estilo que la tarjeta de información -->
                        <div class="contact-info-card rounded-4 shadow-lg overflow-hidden position-relative mt-4" data-aos="fade-up">
                            <div class="bg-primary text-white p-4 position-relative contact-info-header">
                                <div class="position-absolute top-0 end-0 translate-middle-y opacity-10 me-n3">
                                    <i class="bi bi-pin-map-fill" style="font-size: 8rem;"></i>
                                </div>
                                <h3 class="fw-bold mb-2">Ubicación</h3>
                                <p class="fs-5 mb-0">Encuéntranos en el mapa</p>
                            </div>

                            <div class="position-relative">
                                <div id="map-overlay" class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(13, 110, 253, 0.1); z-index: 10;">
                                    <button id="activate-map-btn" class="btn btn-primary btn-lg shadow">
                                        <i class="bi bi-geo-alt-fill me-2"></i>Ver Mapa Interactivo
                                    </button>
                                </div>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
                                    frameborder="0" style="border:0; width: 100%; height: 300px; display: block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>

                            <div class="p-3 bg-white border-top">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3">
                                        <i class="bi bi-signpost-split-fill text-primary fs-4"></i>
                                    </div>
                                    <p class="mb-0 text-muted">Estamos estratégicamente ubicados para atender rápidamente a todos nuestros clientes.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Formulario de contacto -->
                    <div class="col-lg-7">
                        <div class="contact-form-card bg-white rounded-4 shadow-lg p-4 p-lg-5 position-relative" data-aos="fade-up">
                            <div class="position-absolute top-0 end-0 translate-middle-y opacity-10 me-n5 d-none d-lg-block">
                                <i class="bi bi-send-fill text-primary" style="font-size: 12rem;"></i>
                            </div>

                        @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <i class="bi bi-check-circle-fill fs-3"></i>
                                        </div>
                                        <div>
                                            <h5 class="alert-heading mb-1">¡Mensaje enviado!</h5>
                                            <p class="mb-0">{{ session('success') }}</p>
                                        </div>
                                    </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <i class="bi bi-exclamation-triangle-fill fs-3"></i>
                                        </div>
                                        <div>
                                            <h5 class="alert-heading mb-1">Ha ocurrido un error</h5>
                                            <p class="mb-0">{{ session('error') }}</p>
                                        </div>
                                    </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                            <h4 class="fw-bold border-start border-primary border-4 ps-3 mb-4">Envíanos un mensaje</h4>

                            <form action="/contacto/enviar" method="post" class="contact-form row g-4" data-aos="fade-up" data-aos-delay="200">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-floating">
                                    <input type="text" name="name" id="name-field" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Su nombre" value="{{ auth()->check() ? auth()->user()->name : old('name') }}" {{ auth()->check() ? 'readonly' : '' }} required>
                                        <label for="name-field">Su Nombre</label>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email-field"
                                            placeholder="Su correo electrónico" value="{{ auth()->check() ? auth()->user()->email : old('email') }}" {{ auth()->check() ? 'readonly' : '' }} required>
                                        <label for="email-field">Su Correo Electrónico</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-select @error('subject') is-invalid @enderror" name="subject" id="subject-field" required aria-label="Asunto">
                                        <option value="" disabled selected>Seleccione un asunto</option>
                                        <option value="Ventas" {{ old('subject') == 'Ventas' ? 'selected' : '' }}>Ventas</option>
                                        <option value="Taller" {{ old('subject') == 'Taller' ? 'selected' : '' }}>Taller</option>
                                        <option value="Secretaría" {{ old('subject') == 'Secretaría' ? 'selected' : '' }}>Secretaría</option>
                                        <option value="Oficinas Centrales" {{ old('subject') == 'Oficinas Centrales' ? 'selected' : '' }}>Oficinas Centrales</option>
                                        <option value="Arquitectura" {{ old('subject') == 'Arquitectura' ? 'selected' : '' }}>Arquitectura</option>
                                    </select>
                                        <label for="subject-field">Asunto</label>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message-field"
                                            placeholder="Escriba su mensaje aquí" style="height: 180px" required>{{ old('message') }}</textarea>
                                        <label for="message-field">Su Mensaje</label>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg px-5 py-3 rounded-pill">
                                        <i class="bi bi-send-fill me-2"></i>Enviar Mensaje
                                    </button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estilos específicos para esta sección -->
            <style>
                .contact-info-card {
                    height: auto;
                }

                .icon-box {
                    width: 50px;
                    height: 50px;
                    min-width: 50px;
                }

                .opacity-10 {
                    opacity: 0.1;
                }

                #activate-map-btn {
                    transition: all 0.3s ease;
                }

                #map-overlay:hover #activate-map-btn {
                    transform: scale(1.05);
                    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
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
