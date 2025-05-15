@extends('layout')

@section('content')
<main id="main">
    <!-- Sección de Cabecera con Fondo -->
    <section class="policy-header py-5" style="background: linear-gradient(rgba(40, 58, 90, 0.9), rgba(40, 58, 90, 0.9)), url('{{ asset('img/policy-bg.jpg') }}') center/cover no-repeat; min-height: 200px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="text-white mb-3 fw-bold">{{ __('politicas.title') }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('inicio') }}" class="text-white-50">{{ __('politicas.home') }}</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">{{ __('politicas.privacy_policies') }}</li>
                </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenido Principal -->
    <section class="policy-content py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Tarjeta de Introducción -->
                    <div class="card border-0 shadow-sm rounded-lg mb-5">
                        <div class="card-body p-4 p-lg-5">
                            <div class="text-center mb-5">
                                <i class="fa fa-shield-alt text-primary" style="font-size: 3rem;"></i>
                                <h2 class="mt-3 mb-2 fw-bold">{{ __('politicas.protect_privacy') }}</h2>
                                <p class="text-muted mb-0">{{ __('politicas.last_update') }}: {{ date('d/m/Y') }}</p>
                                <hr class="my-4 w-25 mx-auto">
                                <p class="lead">{{ __('politicas.intro_text') }}</p>
                            </div>
                        </div>
                            </div>

                    <!-- Navegación Rápida -->
                    <div class="card border-0 shadow-sm rounded-lg mb-5">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-3"><i class="fa fa-list me-2 text-primary"></i>{{ __('politicas.quick_nav') }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="nav flex-column policy-nav">
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#introduccion">
                                                <i class="fa fa-info-circle me-2 text-primary"></i>
                                                <span>{{ __('politicas.introduction') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#responsable">
                                                <i class="fa fa-user-tie me-2 text-primary"></i>
                                                <span>{{ __('politicas.data_controller') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#datos">
                                                <i class="fa fa-database me-2 text-primary"></i>
                                                <span>{{ __('politicas.collected_data') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#como-recopilamos">
                                                <i class="fa fa-clipboard-list me-2 text-primary"></i>
                                                <span>{{ __('politicas.how_collect') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#finalidad">
                                                <i class="fa fa-bullseye me-2 text-primary"></i>
                                                <span>{{ __('politicas.purpose_legal') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#destinatarios">
                                                <i class="fa fa-share-alt me-2 text-primary"></i>
                                                <span>{{ __('politicas.data_recipients') }}</span>
                                            </a>
                                        </li>
                                </ul>
                            </div>
                                <div class="col-md-6">
                                    <ul class="nav flex-column policy-nav">
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#transferencias">
                                                <i class="fa fa-globe me-2 text-primary"></i>
                                                <span>{{ __('politicas.international_transfers') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#conservacion">
                                                <i class="fa fa-clock me-2 text-primary"></i>
                                                <span>{{ __('politicas.data_retention') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#derechos">
                                                <i class="fa fa-check-circle me-2 text-primary"></i>
                                                <span>{{ __('politicas.your_rights') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#cookies">
                                                <i class="fa fa-cookie me-2 text-primary"></i>
                                                <span>{{ __('politicas.cookies') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#cambios">
                                                <i class="fa fa-sync-alt me-2 text-primary"></i>
                                                <span>{{ __('politicas.policy_changes') }}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#contacto">
                                                <i class="fa fa-envelope me-2 text-primary"></i>
                                                <span>{{ __('politicas.contact') }}</span>
                                            </a>
                                        </li>
                                </ul>
                            </div>
                            </div>
                        </div>
                            </div>

                    <!-- Secciones de Políticas -->
                    <div class="accordion shadow-sm rounded-lg overflow-hidden mb-5" id="politicasAccordion">
                        <!-- Sección 1: Introducción -->
                        <div class="accordion-item border-0" id="introduccion">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-info-circle me-2 text-primary"></i> {{ __('politicas.section_1_title') }}
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#politicasAccordion">
                                <div class="accordion-body bg-light">
                                    <div class="card border-0 shadow-sm mb-0">
                                        <div class="card-body p-4">
                                            <p>{{ __('politicas.section_1_text_1') }}</p>
                                            <p class="mb-0">{{ __('politicas.section_1_text_2') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        <!-- Sección 2: Responsable del Tratamiento -->
                        <div class="accordion-item border-0" id="responsable">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fa fa-user-tie me-2 text-primary"></i> {{ __('politicas.section_2_title') }}
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#politicasAccordion">
                                <div class="accordion-body bg-light">
                                    <div class="card border-0 shadow-sm mb-0">
                                        <div class="card-body p-4">
                                            <p>{{ __('politicas.section_2_text') }}</p>
                                            <div class="bg-white p-4 rounded-3 mt-3">
                                                <h5 class="fw-bold">{{ __('politicas.contact_details') }}</h5>
                                                <div class="row mt-3">
                                                    <div class="col-md-4 mb-3 mb-md-0">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fa fa-map-marker-alt text-primary me-3" style="font-size: 1.5rem;"></i>
                                                            <div>
                                                                <h6 class="mb-1 fw-bold">{{ __('politicas.address') }}</h6>
                                                                <p class="mb-0">{{ __('politicas.address_value') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3 mb-md-0">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fa fa-phone text-primary me-3" style="font-size: 1.5rem;"></i>
                                                            <div>
                                                                <h6 class="mb-1 fw-bold">{{ __('politicas.phone') }}</h6>
                                                                <p class="mb-0">{{ __('politicas.phone_value') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="d-flex align-items-center">
                                                            <i class="fa fa-envelope text-primary me-3" style="font-size: 1.5rem;"></i>
                                                            <div>
                                                                <h6 class="mb-1 fw-bold">{{ __('politicas.email') }}</h6>
                                                                <p class="mb-0">{{ __('politicas.email_value') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        <!-- Sección 3: Datos que Recopilamos -->
                        <div class="accordion-item border-0" id="datos">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="fa fa-database me-2 text-primary"></i> {{ __('politicas.section_3_title') }}
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#politicasAccordion">
                                <div class="accordion-body bg-light">
                                    <div class="card border-0 shadow-sm mb-0">
                                        <div class="card-body p-4">
                                            <p>{{ __('politicas.section_3_text') }}</p>
                                            <div class="row g-4 mt-2">
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-user text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">{{ __('politicas.identity_data') }}</h5>
                                                            </div>
                                                            <p class="card-text mb-0">{{ __('politicas.identity_data_desc') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-envelope text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">{{ __('politicas.contact_data') }}</h5>
                                                            </div>
                                                            <p class="card-text mb-0">{{ __('politicas.contact_data_desc') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-laptop text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">{{ __('politicas.technical_data') }}</h5>
                                                            </div>
                                                            <p class="card-text mb-0">{{ __('politicas.technical_data_desc') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-chart-bar text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">{{ __('politicas.usage_data') }}</h5>
                                                            </div>
                                                            <p class="card-text mb-0">{{ __('politicas.usage_data_desc') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-user-circle text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">{{ __('politicas.profile_data') }}</h5>
                                                            </div>
                                                            <p class="card-text mb-0">{{ __('politicas.profile_data_desc') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        <!-- Resto de secciones en formato de acordeón similar -->
                        <div class="accordion-item border-0" id="como-recopilamos">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <i class="fa fa-clipboard-list me-2 text-primary"></i> {{ __('politicas.section_4_title') }}
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#politicasAccordion">
                                <div class="accordion-body bg-light">
                                    <div class="card border-0 shadow-sm mb-0">
                                        <div class="card-body p-4">
                                            <p>{{ __('politicas.section_4_text') }}</p>
                                            <div class="row g-4 mt-2">
                                                <div class="col-md-4">
                                                    <div class="card h-100 border-0 shadow-sm text-center">
                                                        <div class="card-body p-4">
                                                            <div class="icon-circle bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                                                <i class="fa fa-comments text-primary fs-4"></i>
                                                            </div>
                                                            <h5 class="card-title fw-bold">{{ __('politicas.direct_interactions') }}</h5>
                                                            <p class="card-text">{{ __('politicas.direct_interactions_desc') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card h-100 border-0 shadow-sm text-center">
                                                        <div class="card-body p-4">
                                                            <div class="icon-circle bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                                                <i class="fa fa-cogs text-primary fs-4"></i>
                                                            </div>
                                                            <h5 class="card-title fw-bold">{{ __('politicas.automated_tech') }}</h5>
                                                            <p class="card-text">{{ __('politicas.automated_tech_desc') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card h-100 border-0 shadow-sm text-center">
                                                        <div class="card-body p-4">
                                                            <div class="icon-circle bg-primary bg-opacity-10 rounded-circle d-inline-flex p-3 mb-3">
                                                                <i class="fa fa-users text-primary fs-4"></i>
                                                            </div>
                                                            <h5 class="card-title fw-bold">{{ __('politicas.third_parties') }}</h5>
                                                            <p class="card-text">{{ __('politicas.third_parties_desc') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        <!-- Sección 5: Finalidad y Base Legal -->
                        <div class="accordion-item border-0" id="finalidad">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <i class="fa fa-bullseye me-2 text-primary"></i> {{ __('politicas.section_5_title') }}
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#politicasAccordion">
                                <div class="accordion-body bg-light">
                                    <div class="card border-0 shadow-sm mb-0">
                                        <div class="card-body p-4">
                                            <p>{{ __('politicas.section_5_text') }}</p>
                                            <div class="row g-4 mt-2">
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-check-square text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">{{ __('politicas.consent') }}</h5>
                                                            </div>
                                                            <p class="card-text mb-0">{{ __('politicas.consent_desc') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-file-contract text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">{{ __('politicas.contract') }}</h5>
                                                            </div>
                                                            <p class="card-text mb-0">{{ __('politicas.contract_desc') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-balance-scale text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">{{ __('politicas.legal_obligation') }}</h5>
                                                            </div>
                                                            <p class="card-text mb-0">{{ __('politicas.legal_obligation_desc') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card h-100 border-0 shadow-sm">
                                                        <div class="card-body p-3">
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="icon-box bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                                    <i class="fa fa-lightbulb text-primary"></i>
                                                                </div>
                                                                <h5 class="mb-0 fw-bold">{{ __('politicas.legitimate_interest') }}</h5>
                                                            </div>
                                                            <p class="card-text mb-0">{{ __('politicas.legitimate_interest_desc') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        <!-- Agrega las secciones restantes siguiendo el mismo formato -->
                        <!-- Destinatarios, Transferencias, Conservación, Derechos, Cookies, Cambios -->
                            </div>

                    <!-- Sección de Contacto Rápido -->
                    <div class="card border-0 shadow-sm rounded-lg mb-5" id="contacto">
                        <div class="card-body p-4 p-lg-5">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <h3 class="fw-bold mb-3">{{ __('politicas.questions_privacy') }}</h3>
                                    <p class="mb-0">{{ __('politicas.help_text') }}</p>
                                </div>
                                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                                    <a href="mailto:contacto@indarca.com" class="btn btn-primary btn-lg rounded-pill"><i class="fa fa-envelope me-2"></i>{{ __('politicas.contact_us') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@push('styles')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    /* Estilos personalizados para políticas */
    .policy-nav .nav-link {
        color: #495057;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        transition: all 0.3s ease;
    }

    .policy-nav .nav-link:hover {
        background-color: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
    }

    .accordion-button:not(.collapsed) {
        color: #0d6efd;
        background-color: rgba(13, 110, 253, 0.1);
        box-shadow: none;
    }

    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(13, 110, 253, 0.25);
    }

    .icon-circle {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    .icon-box {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Scroll suave para anclas
        document.querySelectorAll('.policy-nav a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    // Abrir el acordeón correspondiente
                    const accordionButton = targetElement.querySelector('.accordion-button');
                    if (accordionButton && accordionButton.classList.contains('collapsed')) {
                        accordionButton.click();
                    }

                    // Desplazamiento suave
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
    });
</script>
@endpush
@endsection
