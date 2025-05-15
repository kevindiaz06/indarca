@extends('layout')
@section('content')


    <section id="MisionVisionValores" class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="display-5 fw-bold mb-3">{{ __('sobre_nosotros.identity_title') }}</h2>
                    <p class="lead text-muted col-lg-8 mx-auto">{{ __('sobre_nosotros.identity_subtitle') }}</p>
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
                                    <h3 class="h3 mb-0 fw-bold">{{ __('sobre_nosotros.history_title') }}</h3>
                                    <p class="text-muted mb-0">{{ __('sobre_nosotros.history_subtitle') }}</p>
                                </div>
                            </div>
                            <p class="card-text">{{ __('sobre_nosotros.history_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative p-3">
                        <img src="{{ asset('assets\img\INDARCA_OFICINA\OBRA\INDARCA_OFICINA_OBRA_7.jpg') }}"
                            class="img-fluid rounded-3 img-shadow" alt="{{ __('sobre_nosotros.history_title') }}">
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
                                    <h3 class="h3 mb-0 fw-bold">{{ __('sobre_nosotros.mission_title') }}</h3>
                                    <p class="text-muted mb-0">{{ __('sobre_nosotros.mission_subtitle') }}</p>
                                </div>
                            </div>
                            <p class="card-text">{{ __('sobre_nosotros.mission_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative p-3">
                        <img src="{{ asset('assets\img\OTROS\OTROS_2.jpg') }}" class="img-fluid rounded-3 img-shadow"
                            alt="{{ __('sobre_nosotros.mission_title') }}">
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
                                    <h3 class="h3 mb-0 fw-bold">{{ __('sobre_nosotros.vision_title') }}</h3>
                                    <p class="text-muted mb-0">{{ __('sobre_nosotros.vision_subtitle') }}</p>
                                </div>
                            </div>
                            <p class="card-text">{!! __('sobre_nosotros.vision_desc') !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative p-3">
                       <img src="{{ asset('assets\img\INDARCA_OFICINA\OBRA\INDARCA_OFICINA_OBRA_5.jpeg') }}" class="img-fluid rounded-3 img-shadow"
                            alt="{{ __('sobre_nosotros.vision_title') }}">
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
                    <h2 class="display-5 fw-bold mb-3">{{ __('sobre_nosotros.values_title') }}</h2>
                    <p class="lead text-muted col-lg-8 mx-auto">{{ __('sobre_nosotros.values_subtitle') }}</p>
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
                                <h4 class="card-title fw-bold mb-3">{{ __('sobre_nosotros.excellence_title') }}</h4>
                                <p class="card-text">{{ __('sobre_nosotros.excellence_desc') }}</p>
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
                                <h4 class="card-title fw-bold mb-3">{{ __('sobre_nosotros.innovation_title') }}</h4>
                                <p class="card-text">{{ __('sobre_nosotros.innovation_desc') }}</p>
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
                                <h4 class="card-title fw-bold mb-3">{{ __('sobre_nosotros.integrity_title') }}</h4>
                                <p class="card-text">{{ __('sobre_nosotros.integrity_desc') }}</p>
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
                                <h4 class="card-title fw-bold mb-3">{{ __('sobre_nosotros.commitment_title') }}</h4>
                                <p class="card-text">{{ __('sobre_nosotros.commitment_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section><!-- /Sección de Valores Corporativos -->

    <!-- Sección Reconocimientos y Certificaciones -->
    <section id="reconocimientos" class="reconocimientos-certificaciones py-5 bg-light">
        <div class="container">
            <!-- Título de la sección -->
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="display-5 fw-bold mb-3">{{ __('sobre_nosotros.recognition_title') }}</h2>
                    <p class="lead text-muted col-lg-8 mx-auto">{{ __('sobre_nosotros.recognition_subtitle') }}</p>
                    <div class="divider-custom my-4">
                        <div class="divider-line bg-danger"></div>
                        <div class="divider-icon"><i class="bi bi-award-fill text-danger"></i></div>
                        <div class="divider-line bg-danger"></div>
                    </div>
                </div>
            </div>

            <!-- Introducción -->
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 order-lg-2">
                    <div class="card border-0 card-3d h-100">
                        <div class="card-body p-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-shrink-0 icon-3d">
                                    <i class="bi bi-patch-check-fill fs-2"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="h3 mb-0 fw-bold">{{ __('sobre_nosotros.quality_guarantee') }}</h3>
                                    <p class="text-muted mb-0">{{ __('sobre_nosotros.quality_guarantee_subtitle') }}</p>
                                </div>
                            </div>
                            <p class="card-text">{{ __('sobre_nosotros.quality_guarantee_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="position-relative p-3">
                        <img src="{{ asset('assets\img\DENSIMETROS\ENTRENAMIENTOS\DENSIMETROS_ENTRENAMIENTOS_30.jpeg') }}"
                            class="img-fluid rounded-3 img-shadow" alt="{{ __('sobre_nosotros.quality_guarantee') }}">
                    </div>
                </div>
            </div>

            <!-- Certificaciones Clave -->
            <div class="row mb-5">
                <div class="col-12">
                    <h3 class="text-center fw-bold mb-4 section-title"><span
                            class="border-bottom border-danger pb-2">{{ __('sobre_nosotros.key_certifications') }}</span></h3>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm hover-card">
                        <div class="icon-container position-absolute d-flex justify-content-center w-100"
                            style="top: -30px;">
                            <div class="certificate-icon bg-danger text-white rounded-circle p-3 mx-auto shadow"
                                style="width: 70px; height: 70px;">
                                <i class="bi bi-radioactive fs-1"></i>
                            </div>
                        </div>
                        <div class="card-body p-4 pt-5 mt-3 text-center">
                            <h4 class="card-title fw-bold">{{ __('sobre_nosotros.radiological_safety') }}</h4>
                            <p class="card-text">{{ __('sobre_nosotros.radiological_safety_desc') }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center pb-4">
                            <span class="badge bg-danger px-3 py-2"><i
                                    class="bi bi-check-circle me-2"></i>{{ __('sobre_nosotros.verified') }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm hover-card">
                        <div class="icon-container position-absolute d-flex justify-content-center w-100"
                            style="top: -30px;">
                            <div class="certificate-icon bg-danger text-white rounded-circle p-3 mx-auto shadow"
                                style="width: 70px; height: 70px;">
                                <i class="bi bi-rulers fs-1"></i>
                            </div>
                        </div>
                        <div class="card-body p-4 pt-5 mt-3 text-center">
                            <h4 class="card-title fw-bold">{{ __('sobre_nosotros.calibration_cert') }}</h4>
                            <p class="card-text">{{ __('sobre_nosotros.calibration_cert_desc') }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center pb-4">
                            <span class="badge bg-danger px-3 py-2"><i
                                    class="bi bi-check-circle me-2"></i>{{ __('sobre_nosotros.verified') }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm hover-card">
                        <div class="icon-container position-absolute d-flex justify-content-center w-100"
                            style="top: -30px;">
                            <div class="certificate-icon bg-danger text-white rounded-circle p-3 mx-auto shadow"
                                style="width: 70px; height: 70px;">
                                <i class="bi bi-clipboard2-check fs-1"></i>
                            </div>
                        </div>
                        <div class="card-body p-4 pt-5 mt-3 text-center">
                            <h4 class="card-title fw-bold">{{ __('sobre_nosotros.official_registry') }}</h4>
                            <p class="card-text">{{ __('sobre_nosotros.official_registry_desc') }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center pb-4">
                            <span class="badge bg-danger px-3 py-2"><i
                                    class="bi bi-check-circle me-2"></i>{{ __('sobre_nosotros.verified') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cursos y Capacitaciones -->
            <div class="row mb-5">
                <div class="col-12 text-center mb-5">
                    <h3 class="fw-bold mb-3 section-title"><span class="border-bottom border-danger pb-2">{{ __('sobre_nosotros.courses_title') }}</span></h3>
                    <p class="text-muted">{{ __('sobre_nosotros.courses_desc') }}</p>
                </div>

                <!-- Programas de capacitación -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="curso-card card border-0 shadow-sm h-100 position-relative">
                        <img src="{{ asset('assets\img\DENSIMETROS\ENTRENAMIENTOS\DENSIMETROS_ENTRENAMIENTOS_45.jpeg') }}"
                            class="card-img-top" alt="{{ __('sobre_nosotros.densimeter_handling') }}">
                        <div class="card-body p-4">
                            <div class="curso-badge position-absolute top-0 end-0 mt-3 me-3">
                                <span class="badge bg-danger">{{ __('sobre_nosotros.verified') }}</span>
                            </div>
                            <h4 class="card-title fw-bold mb-3">{{ __('sobre_nosotros.densimeter_handling') }}</h4>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2 d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>{{ __('sobre_nosotros.equipment_use') }}</span>
                                </li>
                                <li class="mb-2 d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>{{ __('sobre_nosotros.safety_protocols') }}</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>{{ __('sobre_nosotros.maintenance_calibration') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="curso-card card border-0 shadow-sm h-100 position-relative">
                        <img src="{{ asset('assets\img\DENSIMETROS\ENTRENAMIENTOS\DENSIMETROS_ENTRENAMIENTOS_9.jpeg') }}"
                            class="card-img-top" alt="{{ __('sobre_nosotros.measurement_techniques') }}">
                        <div class="card-body p-4">
                            <div class="curso-badge position-absolute top-0 end-0 mt-3 me-3">
                                <span class="badge bg-danger">{{ __('sobre_nosotros.verified') }}</span>
                            </div>
                            <h4 class="card-title fw-bold mb-3">{{ __('sobre_nosotros.measurement_techniques') }}</h4>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2 d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>{{ __('sobre_nosotros.soil_asphalt') }}</span>
                                </li>
                                <li class="mb-2 d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>{{ __('sobre_nosotros.results_interpretation') }}</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>{{ __('sobre_nosotros.best_practices') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="curso-card card border-0 shadow-sm h-100 position-relative">
                        <img src="https://images.unsplash.com/photo-1556155092-490a1ba16284?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                            class="card-img-top" alt="{{ __('sobre_nosotros.regulations_title') }}">
                        <div class="card-body p-4">
                            <div class="curso-badge position-absolute top-0 end-0 mt-3 me-3">
                                <span class="badge bg-danger">{{ __('sobre_nosotros.verified') }}</span>
                            </div>
                            <h4 class="card-title fw-bold mb-3">{{ __('sobre_nosotros.regulations_title') }}</h4>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2 d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>{{ __('sobre_nosotros.nuclear_legislation') }}</span>
                                </li>
                                <li class="mb-2 d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>{{ __('sobre_nosotros.astm_standards') }}</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>{{ __('sobre_nosotros.compliance') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contacto para más información -->
            <div class="row">
                <div class="col-12">
                    <div
                        class="contact-info-card bg-white rounded-4 shadow-sm p-4 p-md-5 text-center position-relative overflow-hidden">
                        <div class="contact-bg-shape position-absolute"
                            style="opacity: 0.05; right: -100px; top: -100px; width: 500px; height: 500px; border-radius: 50%; background-color: var(--color-primary);">
                        </div>
                        <div class="position-relative">
                            <i class="bi bi-envelope-paper-fill text-danger display-1 mb-3"></i>
                            <h3 class="fw-bold mb-3">{{ __('sobre_nosotros.training_interest') }}</h3>
                            <p class="mb-4">{{ __('sobre_nosotros.training_info') }}</p>
                            <a href="{{ route('inicio') }}#contact" class="btn btn-danger btn-lg px-4 py-2 rounded-pill">
                                <i class="bi bi-send me-2"></i>{{ __('sobre_nosotros.contact_us') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- Fin Sección Reconocimientos y Certificaciones -->

    <!-- Team Section -->
    <section id="team" class="team-section py-5">
        <div class="container">
            <!-- Título de la sección -->
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="display-5 fw-bold mb-3">{{ __('sobre_nosotros.team_title') }}</h2>
                    <p class="lead text-muted col-lg-8 mx-auto">{{ __('sobre_nosotros.team_subtitle') }}</p>
                    <div class="divider-custom my-4">
                        <div class="divider-line bg-danger"></div>
                        <div class="divider-icon">★</div>
                        <div class="divider-line bg-danger"></div>
                    </div>
                </div>
            </div>

            <!-- Tarjetas del equipo -->
            @if (count($teamMembers) > 0)
                @if (count($teamMembers) <= 4)
                    <!-- Visualización normal para 4 o menos miembros -->
                    <div class="row g-4 justify-content-center">
                        @foreach ($teamMembers as $member)
                            <!-- Miembro {{ $loop->iteration }} -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="team-card h-100">
                                    <div class="card border-0 shadow-sm h-100">
                                        <div class="position-relative team-img-container">
                                            @if ($member->image)
                                                <img src="{{ Storage::url($member->image) }}"
                                                    class="card-img-top team-img" alt="{{ $member->name }}">
                                            @else
                                                <img src="{{ asset('assets/img/team/team-' . (($loop->iteration % 4) + 1) . '.jpg') }}"
                                                    class="card-img-top team-img" alt="{{ $member->name }}">
                                            @endif
                                            <div class="team-overlay">
                                                <div class="team-social">
                                                    @if (is_array($member->social_networks) && count($member->social_networks) > 0)
                                                        @foreach ($member->social_networks as $network)
                                                            <a href="{{ $network['url'] }}" class="text-white mx-2"
                                                                target="_blank">
                                                                <i class="bi {{ $network['icon'] ?? 'bi-link' }}"></i>
                                                            </a>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <h4 class="card-title fw-bold mb-1">{{ $member->name }}</h4>
                                            <p class="text-danger fw-semibold mb-3">{{ $member->position }}</p>
                                            @if ($member->short_description)
                                                <p class="card-text fst-italic text-muted">
                                                    "{{ $member->short_description }}"</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Carrusel para más de 4 miembros -->
                    <div id="teamCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @php
                                $totalMembers = count($teamMembers);
                                $totalSlides = ceil($totalMembers / 4);
                            @endphp

                            @for ($i = 0; $i < $totalSlides; $i++)
                                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                    <div class="row g-4 justify-content-center">
                                        @foreach ($teamMembers->slice($i * 4, 4) as $member)
                                            <div class="col-lg-3 col-md-6 mb-4">
                                                <div class="team-card h-100">
                                                    <div class="card border-0 shadow-sm h-100">
                                                        <div class="position-relative team-img-container">
                                                            @if ($member->image)
                                                                <img src="{{ Storage::url($member->image) }}"
                                                                    class="card-img-top team-img"
                                                                    alt="{{ $member->name }}">
                                                            @else
                                                                <img src="{{ asset('assets/img/team/team-' . (($loop->iteration % 4) + 1) . '.jpg') }}"
                                                                    class="card-img-top team-img"
                                                                    alt="{{ $member->name }}">
                                                            @endif
                                                            <div class="team-overlay">
                                                                <div class="team-social">
                                                                    @if (is_array($member->social_networks) && count($member->social_networks) > 0)
                                                                        @foreach ($member->social_networks as $network)
                                                                            <a href="{{ $network['url'] }}"
                                                                                class="text-white mx-2" target="_blank">
                                                                                <i
                                                                                    class="bi {{ $network['icon'] ?? 'bi-link' }}"></i>
                                                                            </a>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <h4 class="card-title fw-bold mb-1">{{ $member->name }}</h4>
                                                            <p class="text-danger fw-semibold mb-3">
                                                                {{ $member->position }}</p>
                                                            @if ($member->short_description)
                                                                <p class="card-text fst-italic text-muted">
                                                                    "{{ $member->short_description }}"</p>
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

                        <!-- Controles de navegación del carrusel -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#teamCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-danger rounded p-3" aria-hidden="true"></span>
                            <span class="visually-hidden">{{ __('general.previous') }}</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#teamCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-danger rounded p-3" aria-hidden="true"></span>
                            <span class="visually-hidden">{{ __('general.next') }}</span>
                        </button>

                        <!-- Indicadores del carrusel -->
                        <div class="carousel-indicators position-relative mt-4">
                            @for ($i = 0; $i < $totalSlides; $i++)
                                <button type="button" data-bs-target="#teamCarousel"
                                    data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"
                                    aria-current="{{ $i == 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $i + 1 }}"></button>
                            @endfor
                        </div>
                    </div>
                @endif
            @else
                <!-- Mensaje cuando no hay miembros en el equipo -->
                <div class="row">
                    <div class="col-12 text-center py-5">
                        <div class="empty-team-container">
                            <i class="bi bi-people display-1 text-muted mb-3"></i>
                            <h4 class="text-muted">{{ __('sobre_nosotros.coming_soon') }}</h4>
                            <p class="text-muted mb-4">{{ __('sobre_nosotros.coming_soon_desc') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Botón para unirse al equipo -->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="{{ route('inicio') }}#contact"
                        class="btn btn-outline-danger btn-lg px-5 py-3 rounded-pill fw-bold">
                        <i class="bi bi-person-plus-fill me-2"></i>{{ __('sobre_nosotros.join_team') }}
                    </a>
                </div>
            </div>
        </div>

        <!-- Estilos específicos para la sección de equipo -->
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
                box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15) !important;
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
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08);
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

            /* Estilos específicos para la sección de reconocimientos */
            .hover-card {
                transition: all 0.3s ease;
                border-radius: 12px;
                margin-top: 40px;
                position: relative;
            }

            .hover-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15) !important;
            }

            .certificate-icon {
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 2;
            }

            .hover-card:hover .certificate-icon {
                transform: scale(1.1) rotate(5deg);
            }

            .curso-card {
                transition: all 0.3s ease;
                border-radius: 12px;
                overflow: hidden;
            }

            .curso-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15) !important;
            }

            .curso-card img {
                height: 200px;
                object-fit: cover;
                transition: all 0.5s ease;
            }

            .curso-card:hover img {
                transform: scale(1.05);
            }

            .contact-info-card {
                transition: all 0.3s ease;
                border-left: 5px solid var(--color-primary);
            }

            .contact-info-card:hover {
                box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15) !important;
            }

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
                background: linear-gradient(135deg, #0d6efd, #0099ff);
                color: white;
                height: 60px;
                width: 60px;
                border-radius: 50%;
                box-shadow: 0 4px 8px rgba(13, 110, 253, 0.3);
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

            /* Estilos generales */
            .team-section {
                background-color: #ffffff;
                position: relative;
                overflow: hidden;
            }

            /* Divider personalizado */
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
                color: #dc3545;
            }

            /* Estilos para las tarjetas de equipo */
            .team-card .card {
                border-radius: 15px;
                overflow: hidden;
                transition: all 0.3s ease;
            }

            .team-card .card:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
            }

            /* Contenedor de imagen */
            .team-img-container {
                overflow: hidden;
                height: 300px;
            }

            .team-img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s ease;
            }

            .team-card:hover .team-img {
                transform: scale(1.05);
            }

            /* Overlay para redes sociales */
            .team-overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: linear-gradient(to top, rgba(220, 53, 69, 0.9), transparent);
                overflow: hidden;
                width: 100%;
                height: 0;
                transition: .5s ease;
                display: flex;
                align-items: flex-end;
                justify-content: center;
                padding-bottom: 20px;
            }

            .team-card:hover .team-overlay {
                height: 100%;
            }

            .team-social {
                transition: all 0.3s ease;
                opacity: 0;
            }

            .team-card:hover .team-social {
                opacity: 1;
            }

            .team-social a {
                display: inline-block;
                width: 40px;
                height: 40px;
                line-height: 40px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.25);
                backdrop-filter: blur(5px);
                text-align: center;
                transition: all 0.3s ease;
                font-weight: bold;
                text-decoration: none;
            }

            .team-social a:hover {
                background: white;
                color: #dc3545 !important;
                transform: translateY(-5px);
            }

            /* Estilo para títulos de miembros */
            .team-card h4 {
                position: relative;
                display: inline-block;
                padding-bottom: 10px;
            }

            .team-card h4::after {
                content: '';
                position: absolute;
                width: 50px;
                height: 2px;
                background-color: #dc3545;
                bottom: 0;
                left: 50%;
                transform: translateX(-50%);
                transition: width 0.3s ease;
            }

            .team-card:hover h4::after {
                width: 80px;
            }

            /* Estilos para el carrusel */
            #teamCarousel {
                padding-bottom: 40px;
            }

            #teamCarousel .carousel-control-prev,
            #teamCarousel .carousel-control-next {
                width: auto;
                opacity: 1;
            }

            #teamCarousel .carousel-control-prev {
                left: -20px;
            }

            #teamCarousel .carousel-control-next {
                right: -20px;
            }

            #teamCarousel .carousel-indicators {
                bottom: 0;
                margin-bottom: 0;
            }

            #teamCarousel .carousel-indicators button {
                width: 12px;
                height: 12px;
                border-radius: 50%;
                background-color: #ddd;
                border: none;
                margin: 0 4px;
            }

            #teamCarousel .carousel-indicators button.active {
                background-color: #dc3545;
            }

            /* Media query para dispositivos móviles */
            @media (max-width: 767px) {
                #teamCarousel .carousel-control-prev {
                    left: 10px;
                }

                #teamCarousel .carousel-control-next {
                    right: 10px;
                }
            }
        </style>
    </section>
    <!-- End Team Section -->

    </section>
    <!-- Fin Sección Sobre Nosotros -->

@endsection
