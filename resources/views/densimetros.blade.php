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
        background: linear-gradient(135deg, #fd7e14, #fb5507);
        color: white;
        height: 60px;
        width: 60px;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(253, 126, 20, 0.3);
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

    .section-title {
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(to right, #fd7e14, transparent);
    }

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

    .application-card {
        transition: all 0.4s ease;
        border-radius: 15px;
        overflow: hidden;
        border: none;
    }

    .application-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 1rem 2rem rgba(0,0,0,0.15) !important;
    }

    .application-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2.5rem;
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.08);
        margin: 0 auto 1.5rem;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #fd7e14, #fb5507);
        color: white;
    }

    .application-card:hover .application-icon {
        transform: scale(1.1) rotate(10deg);
    }

    .model-card {
        transition: all 0.4s ease;
        border-radius: 12px;
        overflow: hidden;
        border: none;
    }

    .model-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,0.2) !important;
    }

    .model-card img {
        height: 180px;
        object-fit: cover;
        transition: all 0.5s ease;
    }

    .model-card:hover img {
        transform: scale(1.05);
    }

    .service-icon {
        height: 70px;
        width: 70px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #fd7e14, #fb5507);
        color: white;
        border-radius: 50%;
        box-shadow: 0 0.5rem 1rem rgba(253, 126, 20, 0.2);
        margin-right: 1.5rem;
        transition: all 0.3s ease;
    }

    .service-card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        border: none;
    }

    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,0.15) !important;
    }

    .service-card:hover .service-icon {
        transform: rotate(10deg) scale(1.1);
    }

    .faq-item {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        border: none;
        margin-bottom: 1rem;
    }

    .faq-item:hover {
        transform: translateX(10px);
        box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.1) !important;
    }

    .accordion-button {
        border-radius: 12px !important;
        font-weight: 600;
    }

    .accordion-button:not(.collapsed) {
        background-color: rgba(253, 126, 20, 0.1);
        color: #fd7e14;
    }

    .cta-card {
        border-radius: 15px;
        background: linear-gradient(135deg, #fd7e14, #e76f10);
        transition: all 0.5s ease;
        overflow: hidden;
        position: relative;
    }

    .cta-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 60%);
        transform: scale(0);
        transition: transform 0.8s ease;
    }

    .cta-card:hover::before {
        transform: scale(1);
    }

    .cta-btn {
        transition: all 0.3s ease;
        border-radius: 30px;
        padding: 0.8rem 2rem;
        font-weight: 600;
        border: 2px solid white;
    }

    .cta-btn:hover {
        background-color: #f8f9fa;
        color: #e76f10;
        transform: translateY(-3px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.2);
    }

    .contact-info-card {
        transition: all 0.3s ease;
        border-left: 5px solid #fd7e14;
    }

    .contact-info-card:hover {
        box-shadow: 0 1rem 3rem rgba(0,0,0,0.15) !important;
    }
</style>

<!-- Banner principal -->
<div class="container-fluid py-5 text-white text-center" style="background-image: url('https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center; position: relative;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.5) 100%);"></div>
    <div class="container position-relative py-5">
        <h1 class="display-3 fw-bold mb-4">DENSÍMETROS NUCLEARES</h1>
        <p class="lead fs-4">Tecnología avanzada para mediciones precisas en ingeniería civil</p>
        <div class="divider-custom my-4">
            <div class="divider-line bg-warning"></div>
            <div class="divider-icon"><i class="bi bi-radioactive text-warning"></i></div>
            <div class="divider-line bg-warning"></div>
        </div>
    </div>
</div>

<!-- Introducción -->
<section id="introduccion" class="py-5">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <div class="card border-0 card-3d h-100">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-shrink-0 icon-3d">
                                <i class="bi bi-gear-fill fs-2"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h2 class="fw-bold mb-0">¿Qué es un densímetro nuclear?</h2>
                                <p class="text-muted mb-0">Tecnología de precisión</p>
                            </div>
                        </div>
                        <p class="fs-5">Es un equipo que emplea tecnología nuclear para medir la densidad y humedad del suelo, mezclas asfálticas y otros materiales de construcción sin necesidad de extraer muestras. Es una herramienta esencial en la ingeniería civil para garantizar la calidad y seguridad de las estructuras.</p>
                        <a href="#servicios" class="btn btn-warning btn-lg mt-3 rounded-pill">
                            <i class="bi bi-arrow-right-circle me-2"></i>Conoce nuestros servicios
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative p-3">
                    <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Densímetro nuclear en uso" class="img-fluid rounded-3 img-shadow">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Aplicaciones -->
<section id="aplicaciones" class="py-5 bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="display-5 fw-bold mb-3">Aplicaciones del densímetro nuclear</h2>
                <p class="lead text-muted col-lg-8 mx-auto">Soluciones de alta precisión para múltiples escenarios</p>
                <div class="divider-custom my-4">
                    <div class="divider-line bg-warning"></div>
                    <div class="divider-icon"><i class="bi bi-tools text-warning"></i></div>
                    <div class="divider-line bg-warning"></div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card application-card h-100 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="application-icon">
                            <i class="bi bi-cone-striped"></i>
                        </div>
                        <h5 class="card-title fw-bold">Control de calidad</h5>
                        <p class="card-text">En la construcción de carreteras, aeropuertos y pavimentos para garantizar su durabilidad y seguridad.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card application-card h-100 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="application-icon">
                            <i class="bi bi-layers-fill"></i>
                        </div>
                        <h5 class="card-title fw-bold">Evaluación de compactación</h5>
                        <p class="card-text">En suelos y materiales de relleno para construcción, asegurando cimientos sólidos y estables.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card application-card h-100 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="application-icon">
                            <i class="bi bi-moisture"></i>
                        </div>
                        <h5 class="card-title fw-bold">Medición de humedad</h5>
                        <p class="card-text">En diferentes capas del terreno para análisis precisos que previenen problemas estructurales a futuro.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card application-card h-100 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="application-icon">
                            <i class="bi bi-clipboard-check-fill"></i>
                        </div>
                        <h5 class="card-title fw-bold">Verificación</h5>
                        <p class="card-text">De especificaciones en proyectos de infraestructura para cumplir con normativas y requerimientos técnicos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Marcas y modelos -->
<section id="modelos" class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="display-5 fw-bold mb-3">Marcas y Modelos Disponibles</h2>
                <p class="lead text-muted col-lg-8 mx-auto">En INDARCA trabajamos con equipos de las principales marcas del sector, garantizando calidad y precisión en cada medición</p>
                <div class="divider-custom my-4">
                    <div class="divider-line bg-warning"></div>
                    <div class="divider-icon"><i class="bi bi-award-fill text-warning"></i></div>
                    <div class="divider-line bg-warning"></div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <div class="col">
                <div class="card model-card h-100 shadow-sm">
                    <div class="card-body p-0">
                        <div class="position-relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1581092335397-9583eb92d232?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Troxler">
                            <div class="position-absolute top-0 start-0 p-3">
                                <span class="badge bg-warning px-3 py-2 rounded-pill">Premium</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h5 class="card-title fw-bold">Troxler</h5>
                            <p class="card-text mb-0">Modelos disponibles:</p>
                            <ul class="list-unstyled mt-2">
                                <li class="mb-1"><i class="bi bi-check-circle-fill text-warning me-2"></i>3430</li>
                                <li class="mb-1"><i class="bi bi-check-circle-fill text-warning me-2"></i>3440</li>
                                <li><i class="bi bi-check-circle-fill text-warning me-2"></i>4640-B</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card model-card h-100 shadow-sm">
                    <div class="card-body p-0">
                        <div class="position-relative overflow-hidden">
                            <img src="https://images.pexels.com/photos/416405/pexels-photo-416405.jpeg?auto=compress&cs=tinysrgb&w=600" class="card-img-top" alt="Humboldt">
                            <div class="position-absolute top-0 start-0 p-3">
                                <span class="badge bg-warning px-3 py-2 rounded-pill">Premium</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h5 class="card-title fw-bold">Humboldt</h5>
                            <p class="card-text mb-0">Modelos disponibles:</p>
                            <ul class="list-unstyled mt-2">
                                <li class="mb-1"><i class="bi bi-check-circle-fill text-warning me-2"></i>HS-5001EZ</li>
                                <li><i class="bi bi-check-circle-fill text-warning me-2"></i>HS-5001SD</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card model-card h-100 shadow-sm">
                    <div class="card-body p-0">
                        <div class="position-relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Instrotek">
                        </div>
                        <div class="p-4">
                            <h5 class="card-title fw-bold">Instrotek</h5>
                            <p class="card-text mb-0">Modelos disponibles:</p>
                            <ul class="list-unstyled mt-2">
                                <li><i class="bi bi-check-circle-fill text-warning me-2"></i>Xplorer 3500</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card model-card h-100 shadow-sm">
                    <div class="card-body p-0">
                        <div class="position-relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="CPN">
                        </div>
                        <div class="p-4">
                            <h5 class="card-title fw-bold">CPN</h5>
                            <p class="card-text mb-0">Modelos disponibles:</p>
                            <ul class="list-unstyled mt-2">
                                <li class="mb-1"><i class="bi bi-check-circle-fill text-warning me-2"></i>MC-3</li>
                                <li><i class="bi bi-check-circle-fill text-warning me-2"></i>MC-1DRP</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <p class="fst-italic">Si necesitas un modelo específico, consúltanos para disponibilidad y opciones de compra o alquiler.</p>
        </div>
    </div>
</section>

<!-- Servicios -->
<section id="servicios" class="py-5 bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="display-5 fw-bold mb-3">Servicios de INDARCA en Densímetros Nucleares</h2>
                <p class="lead text-muted col-lg-8 mx-auto">Soluciones integrales para cada necesidad en el ámbito de los densímetros nucleares</p>
                <div class="divider-custom my-4">
                    <div class="divider-line bg-warning"></div>
                    <div class="divider-icon"><i class="bi bi-gear-wide-connected text-warning"></i></div>
                    <div class="divider-line bg-warning"></div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card service-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="service-icon">
                                <i class="bi bi-tools fs-2"></i>
                            </div>
                            <h4 class="fw-bold mb-0">Calibración y Mantenimiento</h4>
                        </div>
                        <ul class="list-unstyled ps-4">
                            <li class="mb-3 d-flex">
                                <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                <span>Calibraciones certificadas bajo los estándares ASTM y AASHTO, garantizando precisión en cada medición.</span>
                            </li>
                            <li class="d-flex">
                                <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                <span>Mantenimiento preventivo y correctivo para garantizar la precisión del equipo y prolongar su vida útil.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card service-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="service-icon">
                                <i class="bi bi-cart-plus fs-2"></i>
                            </div>
                            <h4 class="fw-bold mb-0">Alquiler y Venta de Equipos</h4>
                        </div>
                        <ul class="list-unstyled ps-4">
                            <li class="mb-3 d-flex">
                                <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                <span>Disponemos de densímetros de marcas reconocidas como Troxler, Humboldt, Instrotek y CPN para satisfacer cualquier necesidad.</span>
                            </li>
                            <li class="d-flex">
                                <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                <span>Opciones de alquiler a corto y largo plazo según las necesidades del cliente, con soporte técnico incluido.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card service-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="service-icon">
                                <i class="bi bi-mortarboard-fill fs-2"></i>
                            </div>
                            <h4 class="fw-bold mb-0">Capacitación y Certificación</h4>
                        </div>
                        <ul class="list-unstyled ps-4">
                            <li class="mb-3 d-flex">
                                <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                <span>Formación en el manejo seguro de densímetros nucleares con instructores certificados.</span>
                            </li>
                            <li class="mb-3 d-flex">
                                <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                <span>Capacitación en normativas y seguridad radiológica para un uso responsable.</span>
                            </li>
                            <li class="d-flex">
                                <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                <span>Certificaciones para operadores de equipos nucleares con validez internacional.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card service-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="service-icon">
                                <i class="bi bi-headset fs-2"></i>
                            </div>
                            <h4 class="fw-bold mb-0">Asesoría Técnica Especializada</h4>
                        </div>
                        <ul class="list-unstyled ps-4">
                            <li class="mb-3 d-flex">
                                <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                <span>Consultoría en normativas internacionales para el uso de densímetros con expertos en el área.</span>
                            </li>
                            <li class="mb-3 d-flex">
                                <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                <span>Apoyo en la gestión de licencias y permisos para su operación legal y segura.</span>
                            </li>
                            <li class="d-flex">
                                <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                <span>Implementación de protocolos de seguridad en obras para prevenir accidentes.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Compromiso con seguridad -->
<section id="compromiso" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card border-0 card-3d">
                    <div class="card-body p-5 text-center">
                        <div class="icon-3d mx-auto mb-4" style="width: 90px; height: 90px;">
                            <i class="bi bi-shield-check fs-1"></i>
                        </div>
                        <h3 class="fw-bold mb-3">Compromiso con la Seguridad</h3>
                        <p class="fs-5 mb-0">En INDARCA, garantizamos el uso responsable de los densímetros nucleares con medidas de seguridad rigurosas, cumpliendo con las regulaciones locales e internacionales. La protección de nuestros clientes y del medio ambiente es nuestra prioridad.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section id="faq" class="py-5 bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="display-5 fw-bold mb-3">Preguntas Frecuentes (FAQ)</h2>
                <p class="lead text-muted col-lg-8 mx-auto">Resolvemos tus dudas sobre el uso y manejo de densímetros nucleares</p>
                <div class="divider-custom my-4">
                    <div class="divider-line bg-warning"></div>
                    <div class="divider-icon"><i class="bi bi-question-circle-fill text-warning"></i></div>
                    <div class="divider-line bg-warning"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item faq-item mb-3 shadow-sm">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="bi bi-patch-question-fill text-warning me-2"></i> ¿Es necesario tener una licencia para operar un densímetro nuclear?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Sí, en la mayoría de los países se requiere una licencia otorgada por las autoridades de regulación nuclear. Además, los operadores deben recibir capacitación certificada en seguridad radiológica para garantizar un manejo seguro del equipo.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item faq-item mb-3 shadow-sm">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="bi bi-patch-question-fill text-warning me-2"></i> ¿Cada cuánto tiempo se debe calibrar un densímetro nuclear?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Se recomienda realizar una calibración anual para asegurar la precisión del equipo y cumplir con los estándares internacionales. Sin embargo, en caso de uso intensivo o condiciones adversas, pueden requerirse calibraciones más frecuentes.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item faq-item mb-3 shadow-sm">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="bi bi-patch-question-fill text-warning me-2"></i> ¿Qué tan seguro es el uso de un densímetro nuclear?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Los densímetros nucleares están diseñados con estrictas medidas de seguridad para evitar la exposición a la radiación. Sin embargo, es obligatorio seguir protocolos de manejo seguro y contar con la capacitación adecuada para minimizar cualquier riesgo potencial.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item faq-item mb-3 shadow-sm">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <i class="bi bi-patch-question-fill text-warning me-2"></i> ¿Puedo alquilar un densímetro en INDARCA sin ser operador certificado?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                No, para alquilar un densímetro nuclear es necesario contar con la certificación correspondiente y cumplir con los requisitos de seguridad exigidos por la normativa vigente. En INDARCA ofrecemos programas de certificación para quienes necesiten operar estos equipos.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section id="contacto" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-info-card bg-white rounded-4 shadow-sm p-4 p-md-5 text-center position-relative overflow-hidden">
                    <div class="contact-bg-shape position-absolute" style="opacity: 0.05; right: -100px; top: -100px; width: 500px; height: 500px; border-radius: 50%; background-color: var(--color-primary);"></div>
                    <div class="position-relative">
                        <i class="bi bi-envelope-paper-fill text-warning display-1 mb-3"></i>
                        <h3 class="fw-bold mb-3">Consulta por nuestros planes de mantenimiento, certificaciones y alquiler de equipos</h3>
                        <p class="mb-4">Estamos para ayudarte en todos tus proyectos de ingeniería civil con equipos de alta calidad y el respaldo de los mejores profesionales</p>
                        <a href="{{ route('inicio') }}#contact" class="btn btn-warning btn-lg px-4 py-2 rounded-pill">
                            <i class="bi bi-send me-2"></i>Contáctanos ahora
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .contact-info-card {
            transition: all 0.3s ease;
            border-left: 5px solid #fd7e14;
        }

        .contact-info-card:hover {
            box-shadow: 0 1rem 3rem rgba(0,0,0,0.15) !important;
        }
    </style>
</section>

@endsection
