@extends('layout')
@section('content')
<style>
    .card-3d {
        transition: transform 0.5s ease, box-shadow 0.5s ease;
        transform: perspective(1000px) rotateY(0deg);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1), 0 6px 6px rgba(0,0,0,0.1);
        border-radius: 12px;
        overflow: hidden;
        transform-style: preserve-3d;
        background: linear-gradient(to bottom right, #ffffff, #f8f9fa);
    }

    .card-3d:hover {
        transform: perspective(1000px) rotateY(2deg) translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.2), 0 15px 12px rgba(0,0,0,0.15);
        border-left: 4px solid #0d6efd;
    }

    .icon-3d {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #0d6efd, #0099ff);
        color: white;
        height: 60px;
        width: 60px;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(13, 110, 253, 0.3);
        transform: translateZ(20px);
    }

    .img-shadow {
        box-shadow: 0 15px 25px rgba(0,0,0,0.15);
        transform: perspective(1000px) rotateY(-2deg);
        transition: transform 0.5s ease, box-shadow 0.5s ease;
    }

    .img-shadow:hover {
        transform: perspective(1000px) rotateY(0deg) translateY(-5px);
        box-shadow: 0 25px 30px rgba(0,0,0,0.25);
    }

    .section-title h2 {
        position: relative;
        display: inline-block;
    }

    .section-title h2:after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(to right, #0d6efd, transparent);
    }
</style>

<section id="MisionVisionValores" class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="display-5 fw-bold mb-3">Nuestra Identidad</h2>
                <p class="lead text-muted col-lg-8 mx-auto">Los pilares que guían nuestro camino hacia la excelencia</p>
                <div class="divider-custom my-4">
                    <div class="divider-line bg-danger"></div>
                    <div class="divider-icon"><i class="bi bi-star-fill text-danger"></i></div>
                    <div class="divider-line bg-danger"></div>
                </div>
            </div>
        </div>

        <!-- Origen -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <div class="card border-0 card-3d h-100">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-shrink-0 icon-3d">
                                <i class="bi bi-house-heart fs-2"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h3 class="h3 mb-0 fw-bold">Historia</h3>
                                <p class="text-muted mb-0">Nuestros inicios</p>
                            </div>
                        </div>
                        <p class="card-text">Fundada el 3 de octubre de 2014, por el Ing. Ramcés Gómez y la Arq. Gloria Carolina Santos; INDARCA, SRL es el sueño materializado de dos dominicanos soñadores que solo teniendo ideas y nada más que los respaldara, se atrevieron a emprender. Y de esta forma causar un impacto de inspiración a todas las personas que, de una forma u otra, a través de sus habilidades quieren hacer a la Republica Dominicana y el mundo un lugar de mejores oportunidades y digno para vivir.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative p-3">
                    <img src="https://fastly.picsum.photos/id/426/500/300.jpg?hmac=DbwEHoaBb3kcMaWC52bEZFDboG7L8zgkuvfBlS6O7hQ" class="img-fluid rounded-3 img-shadow" alt="Historia">
                </div>
            </div>
        </div>

        <!-- Misión -->
        <div class="row align-items-center mb-5 flex-lg-row-reverse">
            <div class="col-lg-6">
                <div class="card border-0 card-3d h-100">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-shrink-0 icon-3d">
                                <i class="bi bi-bullseye fs-2"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h3 class="h3 mb-0 fw-bold">Misión</h3>
                                <p class="text-muted mb-0">Nuestro propósito y compromiso</p>
                            </div>
                        </div>
                        <p class="card-text">INDARCA, SRL es una empresa comprometida con brindar soluciones efectivas,
                            responsables y creativas a nuestros clientes, tanto en el ámbito del servicio técnico de
                            laboratorio como en el desarrollo de proyectos arquitectónicos e ingeniería. Nos enfocamos
                            en ofrecer un servicio de alto nivel, cumpliendo con los más altos estándares de calidad y
                            rendimiento, incorporando constantemente tecnología e innovación para optimizar nuestros
                            procesos y garantizar la excelencia en cada proyecto.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative p-3">
                    <img src="https://picsum.photos/id/20/500/300" class="img-fluid rounded-3 img-shadow" alt="Misión">
                </div>
            </div>
        </div>

        <!-- Visión -->
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="card border-0 card-3d h-100">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-shrink-0 icon-3d">
                                <i class="bi bi-eye fs-2"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h3 class="h3 mb-0 fw-bold">Visión</h3>
                                <p class="text-muted mb-0">El futuro que nos inspira</p>
                            </div>
                        </div>
                        <p class="card-text">Nuestra misión no es solo liderar, es redefinir el estándar. En <span
                                class="fw-bold">INDARCA</span>, no seguimos tendencias, las creamos. Somos una empresa
                            organizada, confiable e innovadora, que no se conforma con lo ordinario. Aspiramos a la
                            excelencia absoluta y trabajamos cada día para superar no solo las expectativas, sino
                            cualquier límite impuesto. No buscamos solo ganancias, buscamos impacto. Queremos ser el
                            motor de crecimiento de nuestra nación, generando empleo, revolucionando ideas y dejando
                            huella.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative p-3">
                    <img src="https://picsum.photos/id/25/500/300" class="img-fluid rounded-3 img-shadow" alt="Visión">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Valores Corporativos -->
<section id="valores" class="valores section py-5">
    <div class="container">
        <!-- Título de la sección -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="display-5 fw-bold mb-3">Nuestros Valores</h2>
                <p class="lead text-muted col-lg-8 mx-auto">Los principios fundamentales que guían nuestras acciones y definen nuestra identidad corporativa</p>
                <div class="divider-custom my-4">
                    <div class="divider-line bg-danger"></div>
                    <div class="divider-icon"><i class="bi bi-star-fill text-danger"></i></div>
                    <div class="divider-line bg-danger"></div>
                </div>
            </div>
        </div>

        <!-- Tarjetas de valores -->
        <div class="row g-4">
            <!-- Valor 1: Excelencia -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card valor-card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-0">
                        <div class="valor-header bg-light p-4 text-center">
                            <div class="valor-icon mx-auto">
                                <i class="bi bi-trophy text-primary"></i>
                            </div>
                        </div>
                        <div class="valor-content p-4">
                            <h4 class="card-title fw-bold mb-3">Excelencia</h4>
                            <p class="card-text">Buscamos la perfección en cada detalle, elevando constantemente nuestros estándares para entregar productos y servicios de calidad excepcional.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Valor 2: Innovación -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="card valor-card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-0">
                        <div class="valor-header bg-light p-4 text-center">
                            <div class="valor-icon mx-auto">
                                <i class="bi bi-lightbulb text-danger"></i>
                            </div>
                        </div>
                        <div class="valor-content p-4">
                            <h4 class="card-title fw-bold mb-3">Innovación</h4>
                            <p class="card-text">Fomentamos el pensamiento creativo y la búsqueda constante de soluciones disruptivas para los desafíos más complejos en nuestro campo.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Valor 3: Integridad -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="card valor-card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-0">
                        <div class="valor-header bg-light p-4 text-center">
                            <div class="valor-icon mx-auto">
                                <i class="bi bi-shield-check text-success"></i>
                            </div>
                        </div>
                        <div class="valor-content p-4">
                            <h4 class="card-title fw-bold mb-3">Integridad</h4>
                            <p class="card-text">Actuamos con honestidad, transparencia y ética en todas nuestras relaciones, construyendo confianza tanto interna como externamente.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Valor 4: Compromiso -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="card valor-card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-0">
                        <div class="valor-header bg-light p-4 text-center">
                            <div class="valor-icon mx-auto">
                                <i class="bi bi-people text-warning"></i>
                            </div>
                        </div>
                        <div class="valor-content p-4">
                            <h4 class="card-title fw-bold mb-3">Compromiso</h4>
                            <p class="card-text">Nos dedicamos plenamente a cada proyecto con pasión y determinación, asumiendo la responsabilidad de entregar resultados que superen expectativas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Estilos para la sección de valores */
        .divider-custom {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .divider-line {
            width: 40%;
            height: 2px;
            opacity: 0.25;
        }

        .divider-icon {
            font-size: 1.5rem;
            margin: 0 1rem;
        }

        .valor-card {
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .valor-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 1rem 2rem rgba(0,0,0,0.15) !important;
        }

        .valor-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.08);
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .valor-card:hover .valor-icon {
            transform: scale(1.1);
        }

        .valor-header {
            position: relative;
        }

        .valor-header::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            border-bottom: 15px solid white;
        }

        .valores {
            background-color: #f9f9f9;
        }

        .rounded-4 {
            border-radius: 0.5rem !important;
        }
    </style>
</section><!-- /Sección de Valores Corporativos -->

<!-- Team Section -->
<section id="team" class="team section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Equipo</h2>
        <p><span>Nuestro Talentoso</span> <span class="description-title">Equipo</span></p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="team-member">
                    <div class="member-img">
                        <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="Director Ejecutivo">
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Walter White</h4>
                        <span>Director Ejecutivo</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="team-member">
                    <div class="member-img">
                        <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="Gerente de Producto">
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Sarah Jhonson</h4>
                        <span>Gerente de Producto</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                <div class="team-member">
                    <div class="member-img">
                        <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="Director de Tecnología">
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>William Anderson</h4>
                        <span>Director de Tecnología</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                <div class="team-member">
                    <div class="member-img">
                        <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="Contadora">
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Amanda Jepson</h4>
                        <span>Contadora</span>
                    </div>
                </div>
            </div><!-- End Team Member -->

        </div>

    </div>

</section><!-- /Sección de Equipo -->

@endsection
