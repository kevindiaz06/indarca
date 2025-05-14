@extends('layout')
@section('content')



<!-- Banner principal -->
<div class="container-fluid py-5 text-white text-center" style="background-image: url('https://images.unsplash.com/photo-1487958449943-2429e8be8625?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center; position: relative;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(108, 37, 190, 0.8) 0%, rgba(150, 68, 232, 0.5) 100%);"></div>
    <div class="container position-relative py-5">
        <h1 class="display-3 fw-bold mb-4">{{ __('arquitectura.banner_title') }}</h1>
        <p class="lead fs-4">{{ __('arquitectura.banner_subtitle') }}</p>
        <div class="divider-custom my-4">
            <div class="divider-line bg-white"></div>
            <div class="divider-icon"><i class="bi bi-buildings-fill text-white"></i></div>
            <div class="divider-line bg-white"></div>
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
                                <i class="bi bi-building-gear fs-2"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h2 class="fw-bold mb-0">{{ __('arquitectura.intro_title') }}</h2>
                                <p class="text-muted mb-0">{{ __('arquitectura.intro_subtitle') }}</p>
                            </div>
                        </div>
                        <p class="fs-5">{{ __('arquitectura.intro_desc') }}</p>
                        <a href="#servicios" class="btn btn-primary btn-lg mt-3 rounded-pill" style="background-color: #6c25be; border-color: #6c25be;">
                            <i class="bi bi-arrow-right-circle me-2"></i>{{ __('arquitectura.know_services') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative p-3">
                    <img src="{{ asset('assets/img/ARQUITECTURA/SALON/ARQUITECTURA_SALON_4.png') }}" alt="Arquitectura moderna" class="img-fluid rounded-3 img-shadow">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Servicios Ofrecidos -->
<section id="servicios" class="py-5 bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="display-5 fw-bold mb-3">{{ __('arquitectura.services_title') }}</h2>
                <p class="lead text-muted col-lg-8 mx-auto">{{ __('arquitectura.services_subtitle') }}</p>
                <div class="divider-custom my-4">
                    <div class="divider-line bg-primary"></div>
                    <div class="divider-icon"><i class="bi bi-gear-wide-connected text-primary" style="color: #6c25be !important;"></i></div>
                    <div class="divider-line bg-primary"></div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Servicio 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card service-card h-100 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="service-icon mx-auto mb-4">
                            <i class="bi bi-building"></i>
                        </div>
                        <h4 class="card-title fw-bold">{{ __('arquitectura.service_design_title') }}</h4>
                        <p class="card-text">{{ __('arquitectura.service_design_desc') }}</p>
                    </div>
                </div>
            </div>

            <!-- Servicio 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card service-card h-100 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="service-icon mx-auto mb-4">
                            <i class="bi bi-clipboard-check"></i>
                        </div>
                        <h4 class="card-title fw-bold">{{ __('arquitectura.service_supervision_title') }}</h4>
                        <p class="card-text">{{ __('arquitectura.service_supervision_desc') }}</p>
                    </div>
                </div>
            </div>

            <!-- Servicio 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card service-card h-100 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="service-icon mx-auto mb-4">
                            <i class="bi bi-calculator"></i>
                        </div>
                        <h4 class="card-title fw-bold">{{ __('arquitectura.service_budget_title') }}</h4>
                        <p class="card-text">{{ __('arquitectura.service_budget_desc') }}</p>
                    </div>
                </div>
            </div>

            <!-- Servicio 4 -->
            <div class="col-md-6 col-lg-4">
                <div class="card service-card h-100 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="service-icon mx-auto mb-4">
                            <i class="bi bi-house-heart"></i>
                        </div>
                        <h4 class="card-title fw-bold">{{ __('arquitectura.service_interior_title') }}</h4>
                        <p class="card-text">{{ __('arquitectura.service_interior_desc') }}</p>
                    </div>
                </div>
            </div>

            <!-- Servicio 5 -->
            <div class="col-md-6 col-lg-4">
                <div class="card service-card h-100 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="service-icon mx-auto mb-4">
                            <i class="bi bi-box"></i>
                        </div>
                        <h4 class="card-title fw-bold">{{ __('arquitectura.service_3d_title') }}</h4>
                        <p class="card-text">{{ __('arquitectura.service_3d_desc') }}</p>
                    </div>
                </div>
            </div>

            <!-- Servicio 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="card service-card h-100 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="service-icon mx-auto mb-4">
                            <i class="bi bi-diagram-3"></i>
                        </div>
                        <h4 class="card-title fw-bold">{{ __('arquitectura.service_consulting_title') }}</h4>
                        <p class="card-text">{{ __('arquitectura.service_consulting_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Proyectos Destacados -->
<section id="proyectos" class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="display-5 fw-bold mb-3">{{ __('arquitectura.projects_title') }}</h2>
                <p class="lead text-muted col-lg-8 mx-auto">{{ __('arquitectura.projects_subtitle') }}</p>
                <div class="divider-custom my-4">
                    <div class="divider-line bg-primary"></div>
                    <div class="divider-icon"><i class="bi bi-star-fill text-primary" style="color: #6c25be !important;"></i></div>
                    <div class="divider-line bg-primary"></div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Proyecto 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card project-card h-100 shadow-sm">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('assets/img/modelado3D/modelado3D_20.jpg') }}" class="card-img" alt="Arquitectura Hospitalaria">
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h5 class="card-title text-white fw-bold">{{ __('arquitectura.project_hospital_title') }}</h5>
                            <p class="card-text text-white">{{ __('arquitectura.project_hospital_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Proyecto 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card project-card h-100 shadow-sm">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('assets/img/modelado3D/modelado3D_24.jpg') }}" class="card-img" alt="Edificaciones Comerciales">
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h5 class="card-title text-white fw-bold">{{ __('arquitectura.project_commercial_title') }}</h5>
                            <p class="card-text text-white">{{ __('arquitectura.project_commercial_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Proyecto 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card project-card h-100 shadow-sm">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('assets/img/modelado3D/modelado3D_43.jpg') }}" class="card-img" alt="Viviendas">
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h5 class="card-title text-white fw-bold">{{ __('arquitectura.project_housing_title') }}</h5>
                            <p class="card-text text-white">{{ __('arquitectura.project_housing_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Proyecto 4 -->
            <div class="col-md-6 col-lg-4">
                <div class="card project-card h-100 shadow-sm">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('assets/img/modelado3D/modelado3D_10.jpg') }}" class="card-img" alt="Infraestructura Educativa">
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h5 class="card-title text-white fw-bold">{{ __('arquitectura.project_education_title') }}</h5>
                            <p class="card-text text-white">{{ __('arquitectura.project_education_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Proyecto 5 -->
            <div class="col-md-6 col-lg-4">
                <div class="card project-card h-100 shadow-sm">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('assets/img/modelado3D/modelado3D_28.jpg') }}" class="card-img" alt="Edificios Multifamiliares">
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h5 class="card-title text-white fw-bold">{{ __('arquitectura.project_multifamily_title') }}</h5>
                            <p class="card-text text-white">{{ __('arquitectura.project_multifamily_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Proyecto 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="card project-card h-100 shadow-sm">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('assets/img/modelado3D/modelado3D_1.jpg') }}" class="card-img" alt="Espacios Recreativos">
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h5 class="card-title text-white fw-bold">{{ __('arquitectura.project_recreation_title') }}</h5>
                            <p class="card-text text-white">{{ __('arquitectura.project_recreation_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Compromiso con la Calidad -->
<section id="compromiso" class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card border-0 card-3d">
                    <div class="card-body p-5 text-center">
                        <div class="icon-3d mx-auto mb-4" style="width: 90px; height: 90px;">
                            <i class="bi bi-trophy fs-1"></i>
                        </div>
                        <h3 class="fw-bold mb-4">{{ __('arquitectura.commitment_title') }}</h3>
                        <p class="fs-5 mb-4">{{ __('arquitectura.commitment_desc') }}</p>
                        <div class="row g-4 mt-3">
                            <div class="col-md-4">
                                <div class="card border-0 bg-light p-3 h-100">
                                    <div class="text-center">
                                        <i class="bi bi-award text-primary mb-3 fs-1" style="color: #6c25be !important;"></i>
                                        <h5 class="mb-0">{{ __('arquitectura.quality_label') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 bg-light p-3 h-100">
                                    <div class="text-center">
                                        <i class="bi bi-lightbulb text-primary mb-3 fs-1" style="color: #6c25be !important;"></i>
                                        <h5 class="mb-0">{{ __('arquitectura.innovation_label') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 bg-light p-3 h-100">
                                    <div class="text-center">
                                        <i class="bi bi-tree-fill text-primary mb-3 fs-1" style="color: #6c25be !important;"></i>
                                        <h5 class="mb-0">{{ __('arquitectura.sustainability_label') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contacto CTA -->
<section id="contacto" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-card bg-white rounded-4 shadow-sm p-4 p-md-5 text-center position-relative overflow-hidden">
                    <div class="position-absolute" style="opacity: 0.05; right: -100px; top: -100px; width: 500px; height: 500px; border-radius: 50%; background-color: #6c25be;"></div>
                    <div class="position-relative">
                        <i class="bi bi-envelope-paper-fill text-primary display-1 mb-3" style="color: #6c25be !important;"></i>
                        <h3 class="fw-bold mb-3">{{ __('arquitectura.contact_title') }}</h3>
                        <p class="mb-4 fs-5">{{ __('arquitectura.contact_desc') }}</p>
                        <a href="{{ route('inicio') }}#contact" class="btn btn-lg px-4 py-2 rounded-pill" style="background-color: #6c25be; color: white;">
                            <i class="bi bi-send me-2"></i>{{ __('arquitectura.contact_button') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
        border-left: 4px solid #6c25be;
    }

    .icon-3d {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #6c25be, #9644e8);
        color: white;
        height: 60px;
        width: 60px;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(108, 37, 190, 0.3);
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
        background: linear-gradient(to right, #6c25be, transparent);
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

    .service-card {
        transition: all 0.4s ease;
        border-radius: 15px;
        overflow: hidden;
        border: none;
        height: 100%;
    }

    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 1rem 2rem rgba(0,0,0,0.15) !important;
    }

    .service-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2rem;
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.08);
        position: relative;
        z-index: 1;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #6c25be, #9644e8);
        color: white;
    }

    .service-card:hover .service-icon {
        transform: scale(1.1) rotate(10deg);
    }

    .project-card {
        transition: all 0.4s ease;
        border-radius: 12px;
        overflow: hidden;
        border: none;
        height: 100%;
    }

    .project-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,0.2) !important;
    }

    .project-card img {
        height: 200px;
        object-fit: cover;
        transition: all 0.5s ease;
    }

    .project-card:hover img {
        transform: scale(1.05);
    }

    .project-card .card-img-overlay {
        background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.1) 100%);
        transition: all 0.3s ease;
    }

    .project-card:hover .card-img-overlay {
        background: linear-gradient(to top, rgba(108, 37, 190, 0.8) 0%, rgba(108, 37, 190, 0.1) 100%);
    }

    .contact-card {
        transition: all 0.3s ease;
        border-radius: 15px;
        border-left: 5px solid #6c25be;
    }

    .contact-card:hover {
        box-shadow: 0 1rem 3rem rgba(0,0,0,0.15) !important;
    }
</style>

@endsection
