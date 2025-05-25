@extends('layout')
@section('content')
    <!-- Banner principal -->
    <div class="container-fluid py-5 text-white text-center"
        style="background-image: url({{ asset('assets/img/DENSIMETROS/TROXLER/DENSIMETROS_TROXLER_8.jpeg') }}); background-size: cover; background-position: center; position: relative;">
        <div
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.5) 100%);">
        </div>
        <div class="container position-relative py-5">
            <h1 class="display-3 fw-bold mb-4 text-white">{{ __('densimetros.banner_title') }}</h1>
            <p class="lead fs-4">{{ __('densimetros.banner_subtitle') }}</p>
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
                                    <h2 class="fw-bold mb-0">{{ __('densimetros.intro_title') }}</h2>
                                    <p class="text-muted mb-0">{{ __('densimetros.intro_subtitle') }}</p>
                                </div>
                            </div>
                            <p class="fs-5">{{ __('densimetros.intro_desc') }}</p>
                            <a href="#servicios" class="btn btn-warning btn-lg mt-3 rounded-pill">
                                <i class="bi bi-arrow-right-circle me-2"></i>{{ __('densimetros.know_services') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative p-3">
                        <img src="{{ asset('assets/img/DENSIMETROS/TROXLER/DENSIMETROS_TROXLERR_10.png') }}"
                            alt="Densímetro nuclear en uso" class="img-fluid rounded-3 img-shadow">
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
                    <h2 class="display-5 fw-bold mb-3">{{ __('densimetros.applications_title') }}</h2>
                    <p class="lead text-muted col-lg-8 mx-auto">{{ __('densimetros.applications_subtitle') }}</p>
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
                            <h5 class="card-title fw-bold">{{ __('densimetros.quality_control_title') }}</h5>
                            <p class="card-text">{{ __('densimetros.quality_control_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card application-card h-100 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="application-icon">
                                <i class="bi bi-layers-fill"></i>
                            </div>
                            <h5 class="card-title fw-bold">{{ __('densimetros.compaction_title') }}</h5>
                            <p class="card-text">{{ __('densimetros.compaction_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card application-card h-100 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="application-icon">
                                <i class="bi bi-moisture"></i>
                            </div>
                            <h5 class="card-title fw-bold">{{ __('densimetros.moisture_title') }}</h5>
                            <p class="card-text">{{ __('densimetros.moisture_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card application-card h-100 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="application-icon">
                                <i class="bi bi-clipboard-check-fill"></i>
                            </div>
                            <h5 class="card-title fw-bold">{{ __('densimetros.verification_title') }}</h5>
                            <p class="card-text">{{ __('densimetros.verification_desc') }}</p>
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
                    <h2 class="display-5 fw-bold mb-3">{{ __('densimetros.brands_title') }}</h2>
                    <p class="lead text-muted col-lg-8 mx-auto">{{ __('densimetros.brands_subtitle') }}</p>
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
                                <img src="{{ asset('assets/img/clients/client-4.png') }}"
                                    class="card-img-top" alt="Troxler">

                            </div>
                            <div class="p-4">
                                <h5 class="card-title fw-bold">Troxler</h5>
                                <p class="card-text mb-0">{{ __('densimetros.available_models') }}</p>
                                <ul class="list-unstyled mt-2">
                                    <li class="mb-1"><i class="bi bi-check-circle-fill text-warning me-2"></i>3430</li>
                                    <li class="mb-1"><i class="bi bi-check-circle-fill text-warning me-2"></i>3430-P</li>
                                    <li class="mb-1"><i class="bi bi-check-circle-fill text-warning me-2"></i>3440</li>
                                    <li class="mb-1"><i class="bi bi-check-circle-fill text-warning me-2"></i>3440-P</li>
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
                                <img src="{{ asset('assets/img/clients/client-2.svg') }}"
                                    class="card-img-top" alt="Humboldt">

                            </div>
                            <div class="p-4">
                                <h5 class="card-title fw-bold">Humboldt</h5>
                                <p class="card-text mb-0">{{ __('densimetros.available_models') }}</p>
                                <ul class="list-unstyled mt-2">
                                    <li class="mb-1"><i class="bi bi-check-circle-fill text-warning me-2"></i>HS-5001EZ
                                    </li>
                                    <li class="mb-1"><i class="bi bi-check-circle-fill text-warning me-2"></i>HS-5001EZ-2
                                    </li>
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
                                <img src="{{ asset('assets/img/clients/client-3.avif') }}"
                                    class="card-img-top" alt="Instrotek">
                            </div>
                            <div class="p-4">
                                <h5 class="card-title fw-bold">Instrotek</h5>
                                <p class="card-text mb-0">{{ __('densimetros.available_models') }}</p>
                                <ul class="list-unstyled mt-2">
                                    <li><i class="bi bi-check-circle-fill text-warning me-2"></i>Xplorer 3500</li>
                                    <li><i class="bi bi-check-circle-fill text-warning me-2"></i>Xplorer 3500-2</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card model-card h-100 shadow-sm">
                        <div class="card-body p-0">
                            <div class="position-relative overflow-hidden">
                                <img src="{{ asset('assets/img/clients/client-5.webp') }}"
                                    class="card-img-top" alt="CPN">
                            </div>
                            <div class="p-4">
                                <h5 class="card-title fw-bold">CPN</h5>
                                <p class="card-text mb-0">{{ __('densimetros.available_models') }}</p>
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
                <p class="fst-italic">{{ __('densimetros.specific_model_note') }}</p>
            </div>
        </div>
    </section>

    <!-- Servicios -->
    <section id="servicios" class="py-5 bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="display-5 fw-bold mb-3">{{ __('densimetros.services_title') }}</h2>
                    <p class="lead text-muted col-lg-8 mx-auto">{{ __('densimetros.services_subtitle') }}</p>
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
                                <h4 class="fw-bold mb-0">{{ __('densimetros.service_calibration_title') }}</h4>
                            </div>
                            <ul class="list-unstyled ps-4">
                                <li class="mb-3 d-flex">
                                    <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                    <span>{{ __('densimetros.service_calibration_1') }}</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                    <span>{{ __('densimetros.service_calibration_2') }}</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                    <span>{{ __('densimetros.service_calibration_3') }}</span>
                                </li>
                                <li class="d-flex">
                                    <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                    <span>{{ __('densimetros.service_calibration_4') }}</span>
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
                                <h4 class="fw-bold mb-0">{{ __('densimetros.service_rental_title') }}</h4>
                            </div>
                            <ul class="list-unstyled ps-4">
                                <li class="mb-3 d-flex">
                                    <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                    <span>{{ __('densimetros.service_rental_1') }}</span>
                                </li>
                                <li class="d-flex">
                                    <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                    <span>{{ __('densimetros.service_rental_2') }}</span>
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
                                <h4 class="fw-bold mb-0">{{ __('densimetros.service_training_title') }}</h4>
                            </div>
                            <ul class="list-unstyled ps-4">
                                <li class="mb-3 d-flex">
                                    <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                    <span>{{ __('densimetros.service_training_1') }}</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                    <span>{{ __('densimetros.service_training_2') }}</span>
                                </li>
                                <li class="d-flex">
                                    <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                    <span>{{ __('densimetros.service_training_3') }}</span>
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
                                <h4 class="fw-bold mb-0">{{ __('densimetros.service_advisory_title') }}</h4>
                            </div>
                            <ul class="list-unstyled ps-4">
                                <li class="mb-3 d-flex">
                                    <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                    <span>{{ __('densimetros.service_advisory_1') }}</span>
                                </li>
                                <li class="mb-3 d-flex">
                                    <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                    <span>{{ __('densimetros.service_advisory_2') }}</span>
                                </li>
                                <li class="d-flex">
                                    <i class="bi bi-check-circle-fill text-warning me-2 mt-1"></i>
                                    <span>{{ __('densimetros.service_advisory_3') }}</span>
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
                            <h3 class="fw-bold mb-3">{{ __('densimetros.commitment_title') }}</h3>
                            <p class="fs-5 mb-0">{{ __('densimetros.commitment_desc') }}</p>
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
                    <h2 class="display-5 fw-bold mb-3">{{ __('densimetros.faq_title') }}</h2>
                    <p class="lead text-muted col-lg-8 mx-auto">{{ __('densimetros.faq_subtitle') }}</p>
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
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="bi bi-patch-question-fill text-warning me-2"></i> {{ __('densimetros.faq_1_question') }}
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{ __('densimetros.faq_1_answer') }}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item faq-item mb-3 shadow-sm">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="bi bi-patch-question-fill text-warning me-2"></i> {{ __('densimetros.faq_2_question') }}
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{ __('densimetros.faq_2_answer') }}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item faq-item mb-3 shadow-sm">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="bi bi-patch-question-fill text-warning me-2"></i> {{ __('densimetros.faq_3_question') }}
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{ __('densimetros.faq_3_answer') }}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item faq-item mb-3 shadow-sm">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <i class="bi bi-patch-question-fill text-warning me-2"></i> {{ __('densimetros.faq_4_question') }}
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{ __('densimetros.faq_4_answer') }}
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
                    <div
                        class="contact-info-card bg-white rounded-4 shadow-sm p-4 p-md-5 text-center position-relative overflow-hidden">
                        <div class="contact-bg-shape position-absolute"
                            style="opacity: 0.05; right: -100px; top: -100px; width: 500px; height: 500px; border-radius: 50%; background-color: var(--color-primary);">
                        </div>
                        <div class="position-relative">
                            <i class="bi bi-envelope-paper-fill text-warning display-1 mb-3"></i>
                            <h3 class="fw-bold mb-3">{{ __('densimetros.cta_title') }}</h3>
                            <p class="mb-4">{{ __('densimetros.cta_subtitle') }}</p>
                            <a href="{{ route('inicio') }}#contact" class="btn btn-warning btn-lg px-4 py-2 rounded-pill">
                                <i class="bi bi-send me-2"></i>{{ __('densimetros.contact_us_now') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .card-3d {
                transition: transform 0.5s ease, box-shadow 0.5s ease;
                transform: perspective(1000px) rotateY(0deg);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1), 0 6px 6px rgba(0, 0, 0, 0.1);
                border-radius: 12px;
                overflow: hidden;
                transform-style: preserve-3d;
                background: linear-gradient(to bottom right, #ffffff, #f8f9fa);
            }

            .card-3d:hover {
                transform: perspective(1000px) rotateY(2deg) translateY(-5px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2), 0 15px 12px rgba(0, 0, 0, 0.15);
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
                box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
                transform: perspective(1000px) rotateY(-2deg);
                transition: transform 0.5s ease, box-shadow 0.5s ease;
            }

            .img-shadow:hover {
                transform: perspective(1000px) rotateY(0deg) translateY(-5px);
                box-shadow: 0 25px 30px rgba(0, 0, 0, 0.25);
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
                box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15) !important;
            }

            .application-icon {
                width: 80px;
                height: 80px;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 2.5rem;
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08);
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
                box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.2) !important;
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
                box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15) !important;
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
                box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1) !important;
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
                background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, rgba(255, 255, 255, 0) 60%);
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
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.2);
            }

            .contact-info-card {
                transition: all 0.3s ease;
                border-left: 5px solid #fd7e14;
            }

            .contact-info-card:hover {
                box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15) !important;
            }

            .contact-info-card {
                transition: all 0.3s ease;
                border-left: 5px solid #fd7e14;
            }

            .contact-info-card:hover {
                box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15) !important;
            }
        </style>
    </section>
@endsection
