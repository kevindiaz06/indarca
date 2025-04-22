@extends('layout')
@section('content')


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
                            <p class="card-text">Fundada el 3 de octubre de 2014, por el Ing. Ramcés Gómez y la Arq. Gloria
                                Carolina Santos; INDARCA, SRL es el sueño materializado de dos dominicanos soñadores que
                                solo teniendo ideas y nada más que los respaldara, se atrevieron a emprender. Y de esta
                                forma causar un impacto de inspiración a todas las personas que, de una forma u otra, a
                                través de sus habilidades quieren hacer a la Republica Dominicana y el mundo un lugar de
                                mejores oportunidades y digno para vivir.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative p-3">
                        <img src="https://fastly.picsum.photos/id/426/500/300.jpg?hmac=DbwEHoaBb3kcMaWC52bEZFDboG7L8zgkuvfBlS6O7hQ"
                            class="img-fluid rounded-3 img-shadow" alt="Historia">
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
                        <img src="https://picsum.photos/id/20/500/300" class="img-fluid rounded-3 img-shadow"
                            alt="Misión">
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
                        <img src="https://picsum.photos/id/25/500/300" class="img-fluid rounded-3 img-shadow"
                            alt="Visión">
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
                    <p class="lead text-muted col-lg-8 mx-auto">Los principios fundamentales que guían nuestras acciones y
                        definen nuestra identidad corporativa</p>
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
                                <p class="card-text">Buscamos la perfección en cada detalle, elevando constantemente
                                    nuestros estándares para entregar productos y servicios de calidad excepcional.</p>
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
                                <p class="card-text">Fomentamos el pensamiento creativo y la búsqueda constante de
                                    soluciones disruptivas para los desafíos más complejos en nuestro campo.</p>
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
                                <p class="card-text">Actuamos con honestidad, transparencia y ética en todas nuestras
                                    relaciones, construyendo confianza tanto interna como externamente.</p>
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
                                <p class="card-text">Nos dedicamos plenamente a cada proyecto con pasión y determinación,
                                    asumiendo la responsabilidad de entregar resultados que superen expectativas.</p>
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
                    <h2 class="display-5 fw-bold mb-3">Reconocimientos y Certificaciones</h2>
                    <p class="lead text-muted col-lg-8 mx-auto">Nuestro compromiso con la excelencia avalado por entidades
                        de prestigio</p>
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
                                    <h3 class="h3 mb-0 fw-bold">Garantía de Calidad</h3>
                                    <p class="text-muted mb-0">Estándares que nos respaldan</p>
                                </div>
                            </div>
                            <p class="card-text">INDARCA ha sido reconocida por su compromiso con la calidad y la seguridad
                                en el sector de la ingeniería y arquitectura. Contamos con certificaciones que garantizan el
                                cumplimiento de los estándares internacionales en la calibración, mantenimiento y uso de
                                densímetros nucleares.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="position-relative p-3">
                        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                            class="img-fluid rounded-3 img-shadow" alt="Certificaciones de Calidad">
                    </div>
                </div>
            </div>

            <!-- Certificaciones Clave -->
            <div class="row mb-5">
                <div class="col-12">
                    <h3 class="text-center fw-bold mb-4 section-title"><span
                            class="border-bottom border-danger pb-2">Certificaciones Clave</span></h3>
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
                            <h4 class="card-title fw-bold">Certificación en Seguridad Radiológica</h4>
                            <p class="card-text">Avalada por organismos especializados en la regulación del uso de equipos
                                nucleares.</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center pb-4">
                            <span class="badge bg-danger px-3 py-2"><i
                                    class="bi bi-check-circle me-2"></i>Verificado</span>
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
                            <h4 class="card-title fw-bold">Certificación en Calibración</h4>
                            <p class="card-text">Emitida bajo normativas ASTM y AASHTO, asegurando la precisión de los
                                equipos de densímetros nucleares.</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center pb-4">
                            <span class="badge bg-danger px-3 py-2"><i
                                    class="bi bi-check-circle me-2"></i>Verificado</span>
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
                            <h4 class="card-title fw-bold">Registro en Organismos Oficiales</h4>
                            <p class="card-text">Cumplimiento de todas las regulaciones nacionales e internacionales para
                                la operación y ejecución de proyectos.</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center pb-4">
                            <span class="badge bg-danger px-3 py-2"><i
                                    class="bi bi-check-circle me-2"></i>Verificado</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cursos y Capacitaciones -->
            <div class="row mb-5">
                <div class="col-12 text-center mb-5">
                    <h3 class="fw-bold mb-3 section-title"><span class="border-bottom border-danger pb-2">Cursos y
                            Capacitaciones</span></h3>
                    <p class="text-muted">INDARCA ofrece formación especializada para profesionales del sector,
                        garantizando el conocimiento y manejo adecuado de densímetros nucleares.</p>
                </div>

                <!-- Programas de capacitación -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="curso-card card border-0 shadow-sm h-100 position-relative">
                        <img src="https://images.pexels.com/photos/8636622/pexels-photo-8636622.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            class="card-img-top" alt="Curso de Manejo y Seguridad">
                        <div class="card-body p-4">
                            <div class="curso-badge position-absolute top-0 end-0 mt-3 me-3">
                                <span class="badge bg-danger">Certificado</span>
                            </div>
                            <h4 class="card-title fw-bold mb-3">Manejo y Seguridad de Densímetros Nucleares</h4>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2 d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>Uso correcto del equipo</span>
                                </li>
                                <li class="mb-2 d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>Protocolos de seguridad radiológica</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>Mantenimiento y calibración</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="curso-card card border-0 shadow-sm h-100 position-relative">
                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                            class="card-img-top" alt="Certificación en Técnicas de Medición">
                        <div class="card-body p-4">
                            <div class="curso-badge position-absolute top-0 end-0 mt-3 me-3">
                                <span class="badge bg-danger">Certificado</span>
                            </div>
                            <h4 class="card-title fw-bold mb-3">Técnicas de Medición con Densímetros</h4>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2 d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>Aplicación en suelos y asfaltos</span>
                                </li>
                                <li class="mb-2 d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>Interpretación de resultados</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>Buenas prácticas en medición</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="curso-card card border-0 shadow-sm h-100 position-relative">
                        <img src="https://images.unsplash.com/photo-1556155092-490a1ba16284?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                            class="card-img-top" alt="Capacitación en Normativas">
                        <div class="card-body p-4">
                            <div class="curso-badge position-absolute top-0 end-0 mt-3 me-3">
                                <span class="badge bg-danger">Certificado</span>
                            </div>
                            <h4 class="card-title fw-bold mb-3">Normativas y Regulaciones</h4>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2 d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>Legislación sobre equipos nucleares</span>
                                </li>
                                <li class="mb-2 d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>Normativas ASTM y AASHTO</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <span>Cumplimiento de estándares</span>
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
                            <h3 class="fw-bold mb-3">¿Interesado en nuestros programas de capacitación?</h3>
                            <p class="mb-4">Para más información sobre inscripciones y fechas, contáctanos a través de
                                nuestros canales oficiales.</p>
                            <a href="{{ route('inicio') }}#contact" class="btn btn-danger btn-lg px-4 py-2 rounded-pill">
                                <i class="bi bi-send me-2"></i>Contáctanos
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
                    <h2 class="display-5 fw-bold mb-3">Nuestro Equipo</h2>
                    <p class="lead text-muted col-lg-8 mx-auto">El talento detrás de cada proyecto exitoso</p>
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
                                                    @else
                                                        <a href="#" class="text-white mx-2"><i
                                                                class="bi bi-linkedin"></i></a>
                                                        <a href="#" class="text-white mx-2"><i
                                                                class="bi bi-x"></i></a>
                                                        <a href="#" class="text-white mx-2"><i
                                                                class="bi bi-instagram"></i></a>
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
                                                                    @else
                                                                        <a href="#" class="text-white mx-2"><i
                                                                                class="bi bi-linkedin"></i></a>
                                                                        <a href="#" class="text-white mx-2"><i
                                                                                class="bi bi-x"></i></a>
                                                                        <a href="#" class="text-white mx-2"><i
                                                                                class="bi bi-instagram"></i></a>
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
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#teamCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-danger rounded p-3" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
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
                            <h4 class="text-muted">Próximamente conocerás a nuestro equipo</h4>
                            <p class="text-muted mb-4">Estamos trabajando en presentar a los talentosos profesionales
                                detrás de INDARCA</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Botón para unirse al equipo -->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="{{ route('contacto') }}"
                        class="btn btn-outline-danger btn-lg px-5 py-3 rounded-pill fw-bold">
                        <i class="bi bi-person-plus-fill me-2"></i>Únete a Nuestro Equipo
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
