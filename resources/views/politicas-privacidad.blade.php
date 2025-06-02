@extends('layout')

@section('content')
<main id="main">
    <!-- Hero Section Renovado -->
    <section class="privacy-hero-new position-relative overflow-hidden">
        <!-- Elementos decorativos de fondo -->
        <div class="hero-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>

        <!-- Partículas animadas -->
        <div class="particles">
            <div class="particle particle-1"></div>
            <div class="particle particle-2"></div>
            <div class="particle particle-3"></div>
            <div class="particle particle-4"></div>
            <div class="particle particle-5"></div>
        </div>

        <div class="container position-relative">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="hero-content-new" data-aos="fade-up" data-aos-duration="800">
                        <!-- Badge superior -->
                        <div class="hero-badge mb-4">
                            <span class="badge-pill">
                                <i class="fas fa-shield-check me-2"></i>
                                Protección de Datos Garantizada
                            </span>
                        </div>

                        <!-- Título principal -->
                        <h1 class="hero-title-new mb-4">
                            <span class="title-highlight">Políticas de</span>
                            <span class="title-main">Privacidad</span>
                        </h1>

                        <!-- Subtítulo -->
                        <p class="hero-subtitle-new mb-5">
                            Tu privacidad es nuestra prioridad. Conoce cómo protegemos y manejamos tu información personal con total transparencia y cumplimiento legal.
                        </p>

                        <!-- Estadísticas rápidas -->
                        <div class="hero-stats">
                            <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                                <div class="stat-icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="stat-number">100%</div>
                                <div class="stat-label">Seguro</div>
                            </div>
                            <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                                <div class="stat-icon">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <div class="stat-number">GDPR</div>
                                <div class="stat-label">Cumplimiento</div>
                            </div>
                            <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
                                <div class="stat-icon">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="stat-number">100%</div>
                                <div class="stat-label">Transparente</div>
                            </div>
                        </div>

                        <!-- Meta información -->
                        <div class="hero-meta" data-aos="fade-up" data-aos-delay="500">
                            <div class="meta-item">
                                <i class="fas fa-calendar-alt me-2"></i>
                                <span>Última actualización: {{ date('d/m/Y') }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-clock me-2"></i>
                                <span>Tiempo de lectura: 8 min</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scroll indicator -->
            <div class="scroll-indicator" data-aos="bounce" data-aos-delay="1000">
                <div class="scroll-arrow">
                    <i class="fas fa-chevron-down"></i>
                </div>
                <span>Desliza para continuar</span>
            </div>
        </div>
    </section>

    <!-- Navegación Moderna -->
    <section class="privacy-nav-modern sticky-top">
        <div class="container">
            <div class="nav-container">
                <!-- Navegación horizontal -->
                <nav class="nav-horizontal" id="privacyNav">
                    <div class="nav-track">
                        <a href="#introduccion" class="nav-item-modern active" data-section="introduccion">
                            <div class="nav-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <span class="nav-text">Introducción</span>
                        </a>
                        <a href="#responsable" class="nav-item-modern" data-section="responsable">
                            <div class="nav-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <span class="nav-text">Responsable</span>
                        </a>
                        <a href="#datos" class="nav-item-modern" data-section="datos">
                            <div class="nav-icon">
                                <i class="fas fa-database"></i>
                            </div>
                            <span class="nav-text">Datos</span>
                        </a>
                        <a href="#finalidad" class="nav-item-modern" data-section="finalidad">
                            <div class="nav-icon">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <span class="nav-text">Finalidad</span>
                        </a>
                        <a href="#derechos" class="nav-item-modern" data-section="derechos">
                            <div class="nav-icon">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <span class="nav-text">Derechos</span>
                        </a>
                        <a href="#cookies" class="nav-item-modern" data-section="cookies">
                            <div class="nav-icon">
                                <i class="fas fa-cookie-bite"></i>
                            </div>
                            <span class="nav-text">Cookies</span>
                        </a>
                        <a href="#contacto" class="nav-item-modern" data-section="contacto">
                            <div class="nav-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <span class="nav-text">Contacto</span>
                        </a>
                    </div>
                </nav>

                <!-- Progress bar -->
                <div class="reading-progress">
                    <div class="progress-bar" id="progressBar"></div>
                </div>

                <!-- Botón móvil -->
                <button class="nav-mobile-toggle d-lg-none" data-bs-toggle="collapse" data-bs-target="#mobileNav">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>
            </div>

            <!-- Navegación móvil -->
            <div class="collapse nav-mobile-menu" id="mobileNav">
                <div class="mobile-nav-grid">
                    <a href="#introduccion" class="mobile-nav-item">
                        <i class="fas fa-info-circle"></i>
                        <span>Introducción</span>
                    </a>
                    <a href="#responsable" class="mobile-nav-item">
                        <i class="fas fa-building"></i>
                        <span>Responsable</span>
                    </a>
                    <a href="#datos" class="mobile-nav-item">
                        <i class="fas fa-database"></i>
                        <span>Datos</span>
                    </a>
                    <a href="#finalidad" class="mobile-nav-item">
                        <i class="fas fa-bullseye"></i>
                        <span>Finalidad</span>
                    </a>
                    <a href="#derechos" class="mobile-nav-item">
                        <i class="fas fa-user-shield"></i>
                        <span>Derechos</span>
                    </a>
                    <a href="#cookies" class="mobile-nav-item">
                        <i class="fas fa-cookie-bite"></i>
                        <span>Cookies</span>
                    </a>
                    <a href="#contacto" class="mobile-nav-item">
                        <i class="fas fa-envelope"></i>
                        <span>Contacto</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenido Principal -->
    <section class="privacy-content-new py-5">
        <div class="container">
            <div class="row">
                <!-- Contenido Principal -->
                <div class="col-12">
                    <!-- Sección 1: Introducción -->
                    <div class="privacy-section-new" id="introduccion" data-aos="fade-up">
                        <div class="section-container">
                            <div class="section-header-new">
                                <div class="section-number">01</div>
                                <div class="section-icon-new">
                                    <div class="icon-circle">
                                        <i class="fas fa-info-circle"></i>
                                    </div>
                                </div>
                                <div class="section-title-wrapper-new">
                                    <h2 class="section-title-new">Introducción</h2>
                                    <p class="section-subtitle-new">Nuestro compromiso con tu privacidad</p>
                                </div>
                            </div>

                            <div class="section-content-new">
                                <div class="content-grid">
                                    <div class="content-main">
                                        <div class="text-block">
                                            <p class="lead-text">En INDARCA, tu privacidad es fundamental para nosotros. Nos comprometemos a proteger y respetar tu información personal.</p>
                                            <p class="body-text">Esta política explica cómo recopilamos, utilizamos, almacenamos y protegemos tu información cuando visitas nuestro sitio web o utilizas nuestros servicios. Cumplimos con todas las normativas aplicables de protección de datos.</p>
                                        </div>

                                        <div class="highlight-card">
                                            <div class="highlight-icon">
                                                <i class="fas fa-lightbulb"></i>
                                            </div>
                                            <div class="highlight-content">
                                                <h5>Importante</h5>
                                                <p>Esta política se aplica a todos los servicios y productos de INDARCA, incluyendo nuestros servicios de densimetría y arquitectura.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content-sidebar">
                                        <div class="info-card">
                                            <div class="info-icon">
                                                <i class="fas fa-shield-check"></i>
                                            </div>
                                            <h6>Protección Garantizada</h6>
                                            <p>Cumplimos con GDPR, LGPD y normativas locales</p>
                                        </div>

                                        <div class="info-card">
                                            <div class="info-icon">
                                                <i class="fas fa-eye"></i>
                                            </div>
                                            <h6>Transparencia Total</h6>
                                            <p>Información clara sobre el uso de tus datos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección 2: Responsable del Tratamiento -->
                    <div class="privacy-section-new" id="responsable" data-aos="fade-up">
                        <div class="section-container">
                            <div class="section-header-new">
                                <div class="section-number">02</div>
                                <div class="section-icon-new">
                                    <div class="icon-circle">
                                        <i class="fas fa-building"></i>
                                    </div>
                                </div>
                                <div class="section-title-wrapper-new">
                                    <h2 class="section-title-new">Responsable del Tratamiento</h2>
                                    <p class="section-subtitle-new">Información de contacto y datos corporativos</p>
                                </div>
                            </div>

                            <div class="section-content-new">
                                <div class="company-info-grid">
                                    <div class="company-card main-card">
                                        <div class="company-logo">
                                            <h3 class="company-name">INDARCA</h3>
                                            <p class="company-tagline">Innovación, Desarrollo y Arquitectura del Caribe</p>
                                        </div>

                                        <div class="company-description">
                                            <p>Somos el responsable del tratamiento de sus datos personales. Nos comprometemos a procesar su información de manera segura, transparente y conforme a la ley.</p>
                                        </div>
                                    </div>

                                    <div class="contact-cards-grid">
                                        <div class="contact-card-new">
                                            <div class="contact-icon-new">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="contact-details">
                                                <h6>Dirección</h6>
                                                <p>C. C 16, Santo Domingo Este 11506<br>República Dominicana</p>
                                            </div>
                                        </div>

                                        <div class="contact-card-new">
                                            <div class="contact-icon-new">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            <div class="contact-details">
                                                <h6>Teléfono</h6>
                                                <p>+1809 596 0333</p>
                                            </div>
                                        </div>

                                        <div class="contact-card-new">
                                            <div class="contact-icon-new">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <div class="contact-details">
                                                <h6>Email</h6>
                                                <p>contacto@indarca.com</p>
                                            </div>
                                        </div>

                                        <div class="contact-card-new">
                                            <div class="contact-icon-new">
                                                <i class="fas fa-globe"></i>
                                            </div>
                                            <div class="contact-details">
                                                <h6>Sitio Web</h6>
                                                <p>www.indarca.com</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección 3: Datos que Recopilamos -->
                    <div class="privacy-section-new" id="datos" data-aos="fade-up">
                        <div class="section-container">
                            <div class="section-header-new">
                                <div class="section-number">03</div>
                                <div class="section-icon-new">
                                    <div class="icon-circle">
                                        <i class="fas fa-database"></i>
                                    </div>
                                </div>
                                <div class="section-title-wrapper-new">
                                    <h2 class="section-title-new">Datos que Recopilamos</h2>
                                    <p class="section-subtitle-new">Tipos de información que procesamos</p>
                                </div>
                            </div>

                            <div class="section-content-new">
                                <div class="data-intro">
                                    <p class="lead-text">Recopilamos diferentes tipos de información para proporcionarte nuestros servicios de manera eficiente y personalizada.</p>
                                </div>

                                <div class="data-types-modern">
                                    <div class="data-type-modern" data-aos="zoom-in" data-aos-delay="100">
                                        <div class="data-icon-wrapper">
                                            <div class="data-icon">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="data-badge">Esencial</div>
                                        </div>
                                        <div class="data-content">
                                            <h5>Datos de Identificación</h5>
                                            <p class="data-description">Información básica necesaria para identificarte</p>
                                            <ul class="data-list">
                                                <li>Nombre completo</li>
                                                <li>Documento de identidad</li>
                                                <li>Fecha de nacimiento</li>
                                                <li>Fotografía (si aplica)</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="data-type-modern" data-aos="zoom-in" data-aos-delay="200">
                                        <div class="data-icon-wrapper">
                                            <div class="data-icon">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <div class="data-badge">Comunicación</div>
                                        </div>
                                        <div class="data-content">
                                            <h5>Datos de Contacto</h5>
                                            <p class="data-description">Información para mantenernos en contacto</p>
                                            <ul class="data-list">
                                                <li>Dirección de correo electrónico</li>
                                                <li>Número de teléfono</li>
                                                <li>Dirección postal</li>
                                                <li>Preferencias de contacto</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="data-type-modern" data-aos="zoom-in" data-aos-delay="300">
                                        <div class="data-icon-wrapper">
                                            <div class="data-icon">
                                                <i class="fas fa-laptop"></i>
                                            </div>
                                            <div class="data-badge">Técnico</div>
                                        </div>
                                        <div class="data-content">
                                            <h5>Datos Técnicos</h5>
                                            <p class="data-description">Información sobre tu dispositivo y navegación</p>
                                            <ul class="data-list">
                                                <li>Dirección IP</li>
                                                <li>Tipo de navegador</li>
                                                <li>Sistema operativo</li>
                                                <li>Cookies y tecnologías similares</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="data-type-modern" data-aos="zoom-in" data-aos-delay="400">
                                        <div class="data-icon-wrapper">
                                            <div class="data-icon">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>
                                            <div class="data-badge">Analítico</div>
                                        </div>
                                        <div class="data-content">
                                            <h5>Datos de Uso</h5>
                                            <p class="data-description">Información sobre cómo utilizas nuestros servicios</p>
                                            <ul class="data-list">
                                                <li>Páginas visitadas</li>
                                                <li>Tiempo de permanencia</li>
                                                <li>Patrones de navegación</li>
                                                <li>Interacciones con contenido</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección 4: Finalidad y Base Legal -->
                    <div class="privacy-section-new" id="finalidad" data-aos="fade-up">
                        <div class="section-container">
                            <div class="section-header-new">
                                <div class="section-number">04</div>
                                <div class="section-icon-new">
                                    <div class="icon-circle">
                                        <i class="fas fa-bullseye"></i>
                                    </div>
                                </div>
                                <div class="section-title-wrapper-new">
                                    <h2 class="section-title-new">Finalidad y Base Legal</h2>
                                    <p class="section-subtitle-new">Propósitos del tratamiento y bases legales</p>
                                </div>
                            </div>

                            <div class="section-content-new">
                                <div class="purpose-intro">
                                    <p class="lead-text">Procesamos tu información personal únicamente para fines específicos y con bases legales sólidas.</p>
                                </div>

                                <div class="legal-basis-modern">
                                    <div class="basis-card" data-aos="slide-right" data-aos-delay="100">
                                        <div class="basis-icon-wrapper">
                                            <div class="basis-icon success">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                        </div>
                                        <div class="basis-content">
                                            <h5>Consentimiento</h5>
                                            <p class="basis-description">Cuando nos das tu autorización explícita</p>
                                            <div class="basis-examples">
                                                <span class="example-tag">Newsletter</span>
                                                <span class="example-tag">Marketing</span>
                                                <span class="example-tag">Cookies analíticas</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="basis-card" data-aos="slide-right" data-aos-delay="200">
                                        <div class="basis-icon-wrapper">
                                            <div class="basis-icon info">
                                                <i class="fas fa-file-contract"></i>
                                            </div>
                                        </div>
                                        <div class="basis-content">
                                            <h5>Ejecución de Contrato</h5>
                                            <p class="basis-description">Para cumplir con nuestros servicios contratados</p>
                                            <div class="basis-examples">
                                                <span class="example-tag">Servicios de densimetría</span>
                                                <span class="example-tag">Proyectos arquitectura</span>
                                                <span class="example-tag">Facturación</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="basis-card" data-aos="slide-right" data-aos-delay="300">
                                        <div class="basis-icon-wrapper">
                                            <div class="basis-icon warning">
                                                <i class="fas fa-balance-scale"></i>
                                            </div>
                                        </div>
                                        <div class="basis-content">
                                            <h5>Obligación Legal</h5>
                                            <p class="basis-description">Cuando debemos cumplir con la ley</p>
                                            <div class="basis-examples">
                                                <span class="example-tag">Retención fiscal</span>
                                                <span class="example-tag">Auditorías</span>
                                                <span class="example-tag">Regulaciones</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="basis-card" data-aos="slide-right" data-aos-delay="400">
                                        <div class="basis-icon-wrapper">
                                            <div class="basis-icon primary">
                                                <i class="fas fa-lightbulb"></i>
                                            </div>
                                        </div>
                                        <div class="basis-content">
                                            <h5>Interés Legítimo</h5>
                                            <p class="basis-description">Para nuestros intereses comerciales legítimos</p>
                                            <div class="basis-examples">
                                                <span class="example-tag">Mejora de servicios</span>
                                                <span class="example-tag">Seguridad</span>
                                                <span class="example-tag">Análisis web</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección 5: Derechos del Usuario -->
                    <div class="privacy-section-new" id="derechos" data-aos="fade-up">
                        <div class="section-container">
                            <div class="section-header-new">
                                <div class="section-number">05</div>
                                <div class="section-icon-new">
                                    <div class="icon-circle">
                                        <i class="fas fa-user-shield"></i>
                                    </div>
                                </div>
                                <div class="section-title-wrapper-new">
                                    <h2 class="section-title-new">Tus Derechos</h2>
                                    <p class="section-subtitle-new">Conoce y ejerce tus derechos como titular de datos</p>
                                </div>
                            </div>

                            <div class="section-content-new">
                                <div class="rights-intro">
                                    <p class="lead-text">Como titular de datos personales, tienes derechos fundamentales que puedes ejercer en cualquier momento.</p>
                                </div>

                                <div class="rights-modern-grid">
                                    <div class="right-card-modern" data-aos="flip-left" data-aos-delay="100">
                                        <div class="right-icon-modern">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                        <div class="right-content-modern">
                                            <h6>Derecho de Acceso</h6>
                                            <p>Conocer qué datos tenemos sobre ti y cómo los procesamos</p>
                                            <a href="#contacto" class="right-action">Solicitar acceso</a>
                                        </div>
                                    </div>

                                    <div class="right-card-modern" data-aos="flip-left" data-aos-delay="200">
                                        <div class="right-icon-modern">
                                            <i class="fas fa-edit"></i>
                                        </div>
                                        <div class="right-content-modern">
                                            <h6>Derecho de Rectificación</h6>
                                            <p>Corregir datos inexactos o incompletos que tengamos</p>
                                            <a href="#contacto" class="right-action">Solicitar corrección</a>
                                        </div>
                                    </div>

                                    <div class="right-card-modern" data-aos="flip-left" data-aos-delay="300">
                                        <div class="right-icon-modern">
                                            <i class="fas fa-trash-alt"></i>
                                        </div>
                                        <div class="right-content-modern">
                                            <h6>Derecho de Supresión</h6>
                                            <p>Solicitar la eliminación de tus datos personales</p>
                                            <a href="#contacto" class="right-action">Solicitar eliminación</a>
                                        </div>
                                    </div>

                                    <div class="right-card-modern" data-aos="flip-left" data-aos-delay="400">
                                        <div class="right-icon-modern">
                                            <i class="fas fa-ban"></i>
                                        </div>
                                        <div class="right-content-modern">
                                            <h6>Derecho de Oposición</h6>
                                            <p>Oponerte al tratamiento de tus datos personales</p>
                                            <a href="#contacto" class="right-action">Ejercer oposición</a>
                                        </div>
                                    </div>

                                    <div class="right-card-modern" data-aos="flip-left" data-aos-delay="500">
                                        <div class="right-icon-modern">
                                            <i class="fas fa-download"></i>
                                        </div>
                                        <div class="right-content-modern">
                                            <h6>Portabilidad de Datos</h6>
                                            <p>Recibir tus datos en formato estructurado y portátil</p>
                                            <a href="#contacto" class="right-action">Solicitar portabilidad</a>
                                        </div>
                                    </div>

                                    <div class="right-card-modern" data-aos="flip-left" data-aos-delay="600">
                                        <div class="right-icon-modern">
                                            <i class="fas fa-pause"></i>
                                        </div>
                                        <div class="right-content-modern">
                                            <h6>Limitación del Tratamiento</h6>
                                            <p>Restringir el procesamiento de tus datos</p>
                                            <a href="#contacto" class="right-action">Solicitar limitación</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="rights-footer">
                                    <div class="rights-note">
                                        <div class="note-icon">
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                        <div class="note-content">
                                            <h6>¿Cómo ejercer tus derechos?</h6>
                                            <p>Contacta con nosotros a través de cualquiera de nuestros canales de comunicación. Procesaremos tu solicitud en un máximo de 30 días.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Cookies -->
                    <div class="privacy-section" id="cookies">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fas fa-cookie-bite"></i>
                            </div>
                            <div class="section-title-wrapper">
                                <h2 class="section-title">{{ __('politicas.cookies') }}</h2>
                                <p class="section-subtitle">Información sobre el uso de cookies en nuestro sitio web</p>
                            </div>
                        </div>
                        <div class="section-content">
                            <div class="content-card">
                                <div class="cookies-intro mb-4">
                                    <p class="lead">Las cookies son pequeños archivos de texto que se almacenan en su dispositivo cuando visita nuestro sitio web. Utilizamos cookies para mejorar su experiencia de navegación y para analizar el uso de nuestro sitio.</p>
                                </div>

                                <!-- Tipos de Cookies -->
                                <div class="cookies-types mb-5">
                                    <h4 class="mb-4">Tipos de Cookies que Utilizamos</h4>
                                    <div class="cookie-types-grid">
                                        <div class="cookie-type-card">
                                            <div class="cookie-type-icon">
                                                <i class="fas fa-cog"></i>
                                            </div>
                                            <h5>Cookies Técnicas</h5>
                                            <p><strong>Necesarias:</strong> Estas cookies son esenciales para el funcionamiento del sitio web.</p>
                                            <ul class="small">
                                                <li>Mantener la sesión de usuario</li>
                                                <li>Recordar preferencias de idioma</li>
                                                <li>Garantizar la seguridad del sitio</li>
                                                <li>Funcionamiento del banner de cookies</li>
                                            </ul>
                                            <span class="badge bg-success">Siempre Activas</span>
                                        </div>

                                        <div class="cookie-type-card">
                                            <div class="cookie-type-icon">
                                                <i class="fas fa-chart-line"></i>
                                            </div>
                                            <h5>Cookies Analíticas</h5>
                                            <p><strong>Opcionales:</strong> Nos ayudan a entender cómo los visitantes interactúan con el sitio.</p>
                                            <ul class="small">
                                                <li>Análisis de tráfico web</li>
                                                <li>Páginas más visitadas</li>
                                                <li>Tiempo de permanencia</li>
                                                <li>Origen de las visitas</li>
                                            </ul>
                                            <span class="badge bg-info">Requiere Consentimiento</span>
                                        </div>

                                        <div class="cookie-type-card">
                                            <div class="cookie-type-icon">
                                                <i class="fas fa-user-cog"></i>
                                            </div>
                                            <h5>Cookies de Personalización</h5>
                                            <p><strong>Funcionales:</strong> Mejoran la funcionalidad y personalización del sitio.</p>
                                            <ul class="small">
                                                <li>Recordar configuraciones</li>
                                                <li>Preferencias de visualización</li>
                                                <li>Información de formularios</li>
                                                <li>Región y ubicación</li>
                                            </ul>
                                            <span class="badge bg-warning text-dark">Requiere Consentimiento</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Banner de Cookies -->
                                <div class="cookies-banner-info mb-5">
                                    <h4 class="mb-4">Banner de Consentimiento de Cookies</h4>
                                    <div class="row align-items-center">
                                        <div class="col-lg-8">
                                            <div class="banner-description">
                                                <p class="mb-3">Cuando visita nuestro sitio web por primera vez, aparece un banner en la parte inferior de la pantalla solicitando su consentimiento para el uso de cookies.</p>
                                                <div class="banner-features">
                                                    <div class="feature-item d-flex align-items-center mb-2">
                                                        <i class="fas fa-check-circle text-success me-2"></i>
                                                        <span>Información clara sobre el uso de cookies</span>
                                                    </div>
                                                    <div class="feature-item d-flex align-items-center mb-2">
                                                        <i class="fas fa-check-circle text-success me-2"></i>
                                                        <span>Bloqueo temporal de navegación hasta decidir</span>
                                                    </div>
                                                    <div class="feature-item d-flex align-items-center mb-2">
                                                        <i class="fas fa-check-circle text-success me-2"></i>
                                                        <span>Su decisión se guarda para futuras visitas</span>
                                                    </div>
                                                    <div class="feature-item d-flex align-items-center mb-2">
                                                        <i class="fas fa-check-circle text-success me-2"></i>
                                                        <span>Puede cambiar sus preferencias en cualquier momento</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="banner-preview bg-light p-3 rounded text-center">
                                                <div class="mock-banner bg-white shadow rounded p-3">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="bg-danger text-white rounded-circle me-2 d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">
                                                            <i class="fas fa-shield-alt"></i>
                                                        </div>
                                                        <div class="text-start">
                                                            <h6 class="mb-0 fw-bold">Uso de Cookies</h6>
                                                            <small class="text-muted">Este sitio web utiliza cookies...</small>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fas fa-check me-1"></i>Aceptar
                                                    </button>
                                                </div>
                                                <small class="text-muted d-block mt-2">Vista previa del banner</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Gestión de Cookies -->
                                <div class="cookies-management mb-5">
                                    <h4 class="mb-4">Cómo Gestionar sus Cookies</h4>
                                    <div class="management-options">
                                        <div class="management-card">
                                            <div class="management-header">
                                                <i class="fas fa-browser"></i>
                                                <h5>A través del Navegador</h5>
                                            </div>
                                            <p class="mb-3">Puede configurar su navegador para rechazar cookies o para que le notifique cuando se envían cookies:</p>
                                            <div class="browser-links">
                                                <a href="https://support.google.com/chrome/answer/95647" target="_blank" class="btn btn-outline-primary btn-sm me-2 mb-2">
                                                    <i class="fab fa-chrome me-1"></i>Chrome
                                                </a>
                                                <a href="https://support.mozilla.org/en-US/kb/enable-and-disable-cookies-website-preferences" target="_blank" class="btn btn-outline-primary btn-sm me-2 mb-2">
                                                    <i class="fab fa-firefox-browser me-1"></i>Firefox
                                                </a>
                                                <a href="https://support.apple.com/guide/safari/manage-cookies-and-website-data-sfri11471/mac" target="_blank" class="btn btn-outline-primary btn-sm me-2 mb-2">
                                                    <i class="fab fa-safari me-1"></i>Safari
                                                </a>
                                                <a href="https://support.microsoft.com/en-us/help/17442/windows-internet-explorer-delete-manage-cookies" target="_blank" class="btn btn-outline-primary btn-sm mb-2">
                                                    <i class="fab fa-edge me-1"></i>Edge
                                                </a>
                                            </div>
                                        </div>

                                        <div class="management-card">
                                            <div class="management-header">
                                                <i class="fas fa-cogs"></i>
                                                <h5>Herramientas de Control</h5>
                                            </div>
                                            <p class="mb-3">También puede usar herramientas externas para gestionar cookies:</p>
                                            <ul class="list-unstyled">
                                                <li class="mb-2">
                                                    <i class="fas fa-external-link-alt text-primary me-2"></i>
                                                    <a href="https://www.aboutads.info/choices/" target="_blank">Digital Advertising Alliance</a>
                                                </li>
                                                <li class="mb-2">
                                                    <i class="fas fa-external-link-alt text-primary me-2"></i>
                                                    <a href="https://www.youronlinechoices.com/" target="_blank">Your Online Choices</a>
                                                </li>
                                                <li class="mb-2">
                                                    <i class="fas fa-external-link-alt text-primary me-2"></i>
                                                    <a href="https://tools.google.com/dlpage/gaoptout" target="_blank">Google Analytics Opt-out</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Consecuencias de Rechazar Cookies -->
                                <div class="cookies-consequences">
                                    <div class="alert alert-info d-flex align-items-start">
                                        <div class="alert-icon me-3">
                                            <i class="fas fa-info-circle fs-4"></i>
                                        </div>
                                        <div>
                                            <h5 class="alert-heading mb-2">Importante: Consecuencias de Deshabilitar Cookies</h5>
                                            <p class="mb-2">Si decide deshabilitar las cookies, algunos aspectos de nuestro sitio web pueden no funcionar correctamente:</p>
                                            <ul class="mb-0">
                                                <li>Pérdida de configuraciones personalizadas</li>
                                                <li>Necesidad de volver a iniciar sesión frecuentemente</li>
                                                <li>Funciones de recordar información deshabilitadas</li>
                                                <li>Experiencia de usuario menos personalizada</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Actualización de Políticas -->
                                <div class="cookies-updates mt-4">
                                    <div class="highlight-box">
                                        <i class="fas fa-sync-alt text-warning me-2"></i>
                                        <strong>Actualizaciones:</strong> Esta política de cookies puede ser actualizada periódicamente. Le recomendamos revisar esta página regularmente para mantenerse informado sobre nuestro uso de cookies.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Cambios en la Política -->
                    <div class="privacy-section" id="cambios">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fas fa-sync-alt"></i>
                            </div>
                            <div class="section-title-wrapper">
                                <h2 class="section-title">{{ __('politicas.policy_changes') }}</h2>
                                <p class="section-subtitle">Cómo manejamos las actualizaciones de nuestra política</p>
                            </div>
                        </div>
                        <div class="section-content">
                            <div class="content-card">
                                <p class="lead">Nos reservamos el derecho de actualizar esta Política de Privacidad en cualquier momento.</p>
                                <p>{{ __('politicas.changes_text') }}</p>

                                <div class="changes-timeline mt-4">
                                    <h5 class="mb-3">Historial de Cambios</h5>
                                    <div class="timeline-item">
                                        <div class="timeline-date">
                                            <span class="badge bg-primary">{{ date('d/m/Y') }}</span>
                                        </div>
                                        <div class="timeline-content">
                                            <h6>Versión Actual</h6>
                                            <ul class="small mb-0">
                                                <li>Agregada sección detallada sobre cookies</li>
                                                <li>Información sobre banner de consentimiento</li>
                                                <li>Guías para gestión de cookies en navegadores</li>
                                                <li>Clarificación de tipos de cookies utilizadas</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Call to Action de Contacto -->
                    <div class="privacy-section" id="contacto">
                        <div class="contact-cta">
                            <div class="cta-content">
                                <div class="cta-icon">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <div class="cta-text">
                                    <h3>{{ __('politicas.questions_privacy') }}</h3>
                                    <p>{{ __('politicas.help_text') }}</p>
                                </div>
                                <div class="cta-actions">
                                    <a href="mailto:contacto@indarca.com" class="btn btn-primary btn-lg">
                                        <i class="fas fa-envelope me-2"></i>{{ __('politicas.contact_us') }}
                                    </a>
                                    <a href="tel:+34123456789" class="btn btn-outline-primary btn-lg">
                                        <i class="fas fa-phone me-2"></i>Llamar Ahora
                                    </a>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    :root {
        --primary-color: #F40006;
        --primary-light: #ff4d4f;
        --primary-dark: #d30005;
        --secondary-color: #f8f9fa;
        --accent-color: #17a2b8;
        --text-primary: #2d3748;
        --text-secondary: #718096;
        --text-light: #a0aec0;
        --border-color: #e2e8f0;
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.05);
        --shadow-md: 0 8px 25px rgba(0,0,0,0.1);
        --shadow-lg: 0 20px 40px rgba(0,0,0,0.1);
        --shadow-xl: 0 25px 50px rgba(0,0,0,0.15);
        --gradient-primary: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
        --gradient-secondary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --gradient-accent: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --border-radius: 16px;
        --border-radius-lg: 24px;
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Reset y base */
    * {
        box-sizing: border-box;
    }

    /* Hero Section Nuevo */
    .privacy-hero-new {
        background: var(--gradient-primary);
        min-height: 80vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .hero-shapes {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        pointer-events: none;
        z-index: 1;
    }

    .shape {
        position: absolute;
        border-radius: 50%;
        opacity: 0.1;
        animation: float 6s ease-in-out infinite;
    }

    .shape-1 {
        width: 300px;
        height: 300px;
        background: white;
        top: 10%;
        left: 10%;
        animation-delay: 0s;
    }

    .shape-2 {
        width: 200px;
        height: 200px;
        background: white;
        top: 50%;
        right: 20%;
        animation-delay: 2s;
    }

    .shape-3 {
        width: 150px;
        height: 150px;
        background: white;
        bottom: 20%;
        left: 20%;
        animation-delay: 4s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(10deg); }
    }

    .particles {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
    }

    .particle {
        position: absolute;
        width: 6px;
        height: 6px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        animation: particle-float 8s linear infinite;
    }

    .particle-1 { top: 20%; left: 20%; animation-delay: 0s; }
    .particle-2 { top: 40%; left: 80%; animation-delay: 2s; }
    .particle-3 { top: 60%; left: 40%; animation-delay: 4s; }
    .particle-4 { top: 80%; left: 60%; animation-delay: 6s; }
    .particle-5 { top: 30%; left: 70%; animation-delay: 8s; }

    @keyframes particle-float {
        0%, 100% { transform: translateY(0px) scale(1); opacity: 0.3; }
        50% { transform: translateY(-30px) scale(1.2); opacity: 0.8; }
    }

    .hero-content-new {
        position: relative;
        z-index: 10;
        color: white;
        text-align: center;
    }

    .hero-badge .badge-pill {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 12px 24px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        border: 1px solid rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(10px);
        display: inline-flex;
        align-items: center;
    }

    .hero-title-new {
        font-size: 4rem;
        font-weight: 800;
        line-height: 1.1;
        margin: 0;
    }

    .title-highlight {
        display: block;
        font-weight: 300;
        opacity: 0.9;
        font-size: 0.7em;
    }

    .title-main {
        display: block;
        background: linear-gradient(45deg, #fff, #ffcccc);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-subtitle-new {
        font-size: 1.4rem;
        line-height: 1.6;
        opacity: 0.9;
        max-width: 700px;
        margin: 0 auto;
    }

    .hero-stats {
        display: flex;
        justify-content: center;
        gap: 3rem;
        margin: 3rem 0;
    }

    .stat-item {
        text-align: center;
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin: 0 auto 1rem;
        backdrop-filter: blur(10px);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        line-height: 1;
    }

    .stat-label {
        font-size: 1rem;
        opacity: 0.8;
        margin-top: 0.5rem;
    }

    .hero-meta {
        display: flex;
        justify-content: center;
        gap: 2rem;
        margin-top: 2rem;
        opacity: 0.8;
    }

    .meta-item {
        display: flex;
        align-items: center;
        font-size: 0.95rem;
    }

    .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        color: rgba(255, 255, 255, 0.8);
        z-index: 10;
    }

    .scroll-arrow {
        animation: bounce 2s infinite;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-10px); }
        60% { transform: translateY(-5px); }
    }

    /* Navegación Moderna */
    .privacy-nav-modern {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-bottom: 1px solid var(--border-color);
        z-index: 1000;
        transition: var(--transition);
    }

    .nav-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .nav-horizontal {
        display: flex;
        gap: 0.5rem;
    }

    .nav-track {
        display: flex;
        gap: 0.5rem;
    }

    .nav-item-modern {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        text-decoration: none;
        color: var(--text-secondary);
        border-radius: 12px;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }

    .nav-item-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--gradient-primary);
        opacity: 0;
        transition: var(--transition);
        z-index: -1;
    }

    .nav-item-modern:hover::before,
    .nav-item-modern.active::before {
        opacity: 1;
    }

    .nav-item-modern:hover,
    .nav-item-modern.active {
        color: white;
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .nav-icon {
        margin-right: 0.5rem;
        font-size: 1.1rem;
    }

    .nav-text {
        font-weight: 600;
        font-size: 0.9rem;
    }

    .reading-progress {
        flex: 1;
        max-width: 200px;
        height: 4px;
        background: var(--border-color);
        border-radius: 2px;
        margin-left: 2rem;
        overflow: hidden;
    }

    .progress-bar {
        height: 100%;
        background: var(--gradient-primary);
        width: 0%;
        transition: width 0.3s ease;
        border-radius: 2px;
    }

    /* Secciones Nuevas */
    .privacy-content-new {
        background: linear-gradient(180deg, #fafafa 0%, #ffffff 100%);
    }

    .privacy-section-new {
        margin-bottom: 6rem;
        scroll-margin-top: 120px;
    }

    .section-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .section-header-new {
        display: flex;
        align-items: center;
        margin-bottom: 3rem;
        gap: 2rem;
    }

    .section-number {
        font-size: 4rem;
        font-weight: 900;
        color: var(--primary-color);
        opacity: 0.3;
        line-height: 1;
        min-width: 80px;
    }

    .section-icon-new {
        position: relative;
    }

    .icon-circle {
        width: 80px;
        height: 80px;
        background: var(--gradient-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        box-shadow: var(--shadow-lg);
        position: relative;
    }

    .icon-circle::before {
        content: '';
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        background: var(--gradient-primary);
        border-radius: 50%;
        opacity: 0.2;
        animation: pulse-ring 2s infinite;
    }

    @keyframes pulse-ring {
        0% { transform: scale(0.8); opacity: 0.8; }
        100% { transform: scale(1.2); opacity: 0; }
    }

    .section-title-wrapper-new {
        flex: 1;
    }

    .section-title-new {
        font-size: 3rem;
        font-weight: 800;
        color: var(--text-primary);
        margin: 0 0 0.5rem 0;
        line-height: 1.2;
    }

    .section-subtitle-new {
        color: var(--text-secondary);
        font-size: 1.2rem;
        margin: 0;
        font-weight: 400;
    }

    .section-content-new {
        position: relative;
    }

    /* Contenido de Introducción */
    .content-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 3rem;
        align-items: start;
    }

    .content-main {
        space-y: 2rem;
    }

    .text-block {
        margin-bottom: 2rem;
    }

    .lead-text {
        font-size: 1.3rem;
        line-height: 1.6;
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 1.5rem;
    }

    .body-text {
        font-size: 1.1rem;
        line-height: 1.7;
        color: var(--text-secondary);
    }

    .highlight-card {
        background: linear-gradient(135deg, #fff7e6 0%, #fff2d9 100%);
        border: 1px solid #ffd700;
        border-radius: var(--border-radius);
        padding: 2rem;
        display: flex;
        align-items: flex-start;
        gap: 1rem;
    }

    .highlight-icon {
        width: 50px;
        height: 50px;
        background: #ffd700;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #b8860b;
        flex-shrink: 0;
    }

    .highlight-content h5 {
        color: #b8860b;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .highlight-content p {
        color: #8b7355;
        margin: 0;
    }

    .content-sidebar {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .info-card {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: var(--border-radius);
        padding: 2rem;
        text-align: center;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .info-icon {
        width: 60px;
        height: 60px;
        background: var(--gradient-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        margin: 0 auto 1rem;
    }

    .info-card h6 {
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
    }

    .info-card p {
        color: var(--text-secondary);
        font-size: 0.95rem;
        margin: 0;
    }

    /* Responsive para Hero y navegación */
    @media (max-width: 768px) {
        .hero-title-new {
            font-size: 2.5rem;
        }

        .hero-stats {
            flex-direction: column;
            gap: 2rem;
        }

        .hero-meta {
            flex-direction: column;
            gap: 1rem;
        }

        .nav-horizontal {
            display: none;
        }

        .section-header-new {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }

        .section-number {
            font-size: 2rem;
        }

        .section-title-new {
            font-size: 2rem;
        }

        .content-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Navegación activa en sidebar
    const sidebarLinks = document.querySelectorAll('.sidebar-link');
    const sections = document.querySelectorAll('.privacy-section');

    // Intersection Observer para navegación activa
    const observerOptions = {
        root: null,
        rootMargin: '-20% 0px -70% 0px',
        threshold: 0
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');

                // Actualizar sidebar
                sidebarLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${id}`) {
                        link.classList.add('active');
                    }
                });

                // Actualizar navegación superior
                const navLinks = document.querySelectorAll('.privacy-nav-link');
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${id}`) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }, observerOptions);

    sections.forEach(section => {
        observer.observe(section);
    });

    // Scroll suave para enlaces
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                const offsetTop = targetElement.offsetTop - 120;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Efecto parallax sutil en hero
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const hero = document.querySelector('.privacy-hero-new');
        if (hero) {
            hero.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });

    // Animación de entrada para las tarjetas
    const cards = document.querySelectorAll('.data-type-card, .legal-basis-card, .right-item');
    const cardObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
            }
        });
    }, { threshold: 0.1 });

    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'all 0.6s ease';
        cardObserver.observe(card);
    });
});
</script>
@endpush
@endsection
