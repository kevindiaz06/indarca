@extends('layout')

@section('content')
<main id="main">
    <!-- Hero Section Corporativo -->
    <section class="privacy-hero position-relative overflow-hidden">
        <div class="hero-background"></div>
        <div class="container position-relative">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <div class="hero-content">
                        <div class="hero-icon mb-4">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h1 class="hero-title mb-3">{{ __('politicas.title') }}</h1>
                        <p class="hero-subtitle mb-4">{{ __('politicas.intro_text') }}</p>
                        <div class="hero-meta">
                            <span class="badge bg-primary-soft text-primary px-3 py-2">
                                <i class="fas fa-calendar-alt me-2"></i>
                                {{ __('politicas.last_update') }}: {{ date('d/m/Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Navegación Inteligente -->
    <section class="privacy-navigation bg-white shadow-sm sticky-top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#privacyNav">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="privacyNav">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link privacy-nav-link" href="#introduccion">
                                        <i class="fas fa-info-circle me-2"></i>{{ __('politicas.introduction') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link privacy-nav-link" href="#responsable">
                                        <i class="fas fa-building me-2"></i>{{ __('politicas.data_controller') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link privacy-nav-link" href="#datos">
                                        <i class="fas fa-database me-2"></i>{{ __('politicas.collected_data') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link privacy-nav-link" href="#finalidad">
                                        <i class="fas fa-bullseye me-2"></i>{{ __('politicas.purpose_legal') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link privacy-nav-link" href="#derechos">
                                        <i class="fas fa-user-shield me-2"></i>{{ __('politicas.your_rights') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link privacy-nav-link" href="#contacto">
                                        <i class="fas fa-envelope me-2"></i>{{ __('politicas.contact') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenido Principal -->
    <section class="privacy-content py-5">
        <div class="container">
            <div class="row">
                <!-- Sidebar de Navegación -->
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="privacy-sidebar">
                        <div class="sidebar-card">
                            <h5 class="sidebar-title">{{ __('politicas.quick_nav') }}</h5>
                            <nav class="sidebar-nav">
                                <a href="#introduccion" class="sidebar-link active">
                                    <span class="sidebar-icon"><i class="fas fa-info-circle"></i></span>
                                    <span class="sidebar-text">{{ __('politicas.introduction') }}</span>
                                </a>
                                <a href="#responsable" class="sidebar-link">
                                    <span class="sidebar-icon"><i class="fas fa-building"></i></span>
                                    <span class="sidebar-text">{{ __('politicas.data_controller') }}</span>
                                </a>
                                <a href="#datos" class="sidebar-link">
                                    <span class="sidebar-icon"><i class="fas fa-database"></i></span>
                                    <span class="sidebar-text">{{ __('politicas.collected_data') }}</span>
                                </a>
                                <a href="#como-recopilamos" class="sidebar-link">
                                    <span class="sidebar-icon"><i class="fas fa-clipboard-list"></i></span>
                                    <span class="sidebar-text">{{ __('politicas.how_collect') }}</span>
                                </a>
                                <a href="#finalidad" class="sidebar-link">
                                    <span class="sidebar-icon"><i class="fas fa-bullseye"></i></span>
                                    <span class="sidebar-text">{{ __('politicas.purpose_legal') }}</span>
                                </a>
                                <a href="#destinatarios" class="sidebar-link">
                                    <span class="sidebar-icon"><i class="fas fa-share-alt"></i></span>
                                    <span class="sidebar-text">{{ __('politicas.data_recipients') }}</span>
                                </a>
                                <a href="#transferencias" class="sidebar-link">
                                    <span class="sidebar-icon"><i class="fas fa-globe"></i></span>
                                    <span class="sidebar-text">{{ __('politicas.international_transfers') }}</span>
                                </a>
                                <a href="#conservacion" class="sidebar-link">
                                    <span class="sidebar-icon"><i class="fas fa-clock"></i></span>
                                    <span class="sidebar-text">{{ __('politicas.data_retention') }}</span>
                                </a>
                                <a href="#derechos" class="sidebar-link">
                                    <span class="sidebar-icon"><i class="fas fa-user-shield"></i></span>
                                    <span class="sidebar-text">{{ __('politicas.your_rights') }}</span>
                                </a>
                                <a href="#cookies" class="sidebar-link">
                                    <span class="sidebar-icon"><i class="fas fa-cookie-bite"></i></span>
                                    <span class="sidebar-text">{{ __('politicas.cookies') }}</span>
                                </a>
                                <a href="#cambios" class="sidebar-link">
                                    <span class="sidebar-icon"><i class="fas fa-sync-alt"></i></span>
                                    <span class="sidebar-text">{{ __('politicas.policy_changes') }}</span>
                                </a>
                                <a href="#contacto" class="sidebar-link">
                                    <span class="sidebar-icon"><i class="fas fa-envelope"></i></span>
                                    <span class="sidebar-text">{{ __('politicas.contact') }}</span>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Contenido Principal -->
                <div class="col-lg-9">
                    <!-- Sección 1: Introducción -->
                    <div class="privacy-section" id="introduccion">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <div class="section-title-wrapper">
                                <h2 class="section-title">{{ __('politicas.section_1_title') }}</h2>
                                <p class="section-subtitle">Información general sobre nuestro compromiso con la privacidad</p>
                            </div>
                        </div>
                        <div class="section-content">
                            <div class="content-card">
                                <p class="lead">{{ __('politicas.section_1_text_1') }}</p>
                                <p>{{ __('politicas.section_1_text_2') }}</p>
                                <div class="highlight-box">
                                    <i class="fas fa-lightbulb text-warning me-2"></i>
                                    <strong>Importante:</strong> Esta política se aplica a todos los servicios y productos de INDARCA.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección 2: Responsable del Tratamiento -->
                    <div class="privacy-section" id="responsable">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="section-title-wrapper">
                                <h2 class="section-title">{{ __('politicas.section_2_title') }}</h2>
                                <p class="section-subtitle">Información de contacto y datos corporativos</p>
                            </div>
                        </div>
                        <div class="section-content">
                            <div class="content-card">
                                <p>{{ __('politicas.section_2_text') }}</p>
                                <div class="contact-grid">
                                    <div class="contact-item">
                                        <div class="contact-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="contact-info">
                                            <h6>{{ __('politicas.address') }}</h6>
                                            <p>{{ __('politicas.address_value') }}</p>
                                        </div>
                                    </div>
                                    <div class="contact-item">
                                        <div class="contact-icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="contact-info">
                                            <h6>{{ __('politicas.phone') }}</h6>
                                            <p>{{ __('politicas.phone_value') }}</p>
                                        </div>
                                    </div>
                                    <div class="contact-item">
                                        <div class="contact-icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="contact-info">
                                            <h6>{{ __('politicas.email') }}</h6>
                                            <p>{{ __('politicas.email_value') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección 3: Datos que Recopilamos -->
                    <div class="privacy-section" id="datos">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fas fa-database"></i>
                            </div>
                            <div class="section-title-wrapper">
                                <h2 class="section-title">{{ __('politicas.section_3_title') }}</h2>
                                <p class="section-subtitle">Tipos de información que recopilamos y procesamos</p>
                            </div>
                        </div>
                        <div class="section-content">
                            <div class="content-card">
                                <p>{{ __('politicas.section_3_text') }}</p>
                                <div class="data-types-grid">
                                    <div class="data-type-card">
                                        <div class="data-type-icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <h5>{{ __('politicas.identity_data') }}</h5>
                                        <p>{{ __('politicas.identity_data_desc') }}</p>
                                    </div>
                                    <div class="data-type-card">
                                        <div class="data-type-icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <h5>{{ __('politicas.contact_data') }}</h5>
                                        <p>{{ __('politicas.contact_data_desc') }}</p>
                                    </div>
                                    <div class="data-type-card">
                                        <div class="data-type-icon">
                                            <i class="fas fa-laptop"></i>
                                        </div>
                                        <h5>{{ __('politicas.technical_data') }}</h5>
                                        <p>{{ __('politicas.technical_data_desc') }}</p>
                                    </div>
                                    <div class="data-type-card">
                                        <div class="data-type-icon">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                        <h5>{{ __('politicas.usage_data') }}</h5>
                                        <p>{{ __('politicas.usage_data_desc') }}</p>
                                    </div>
                                    <div class="data-type-card">
                                        <div class="data-type-icon">
                                            <i class="fas fa-user-circle"></i>
                                        </div>
                                        <h5>{{ __('politicas.profile_data') }}</h5>
                                        <p>{{ __('politicas.profile_data_desc') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección 4: Cómo Recopilamos los Datos -->
                    <div class="privacy-section" id="como-recopilamos">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <div class="section-title-wrapper">
                                <h2 class="section-title">{{ __('politicas.section_4_title') }}</h2>
                                <p class="section-subtitle">Métodos y fuentes de recopilación de datos</p>
                            </div>
                        </div>
                        <div class="section-content">
                            <div class="content-card">
                                <p>{{ __('politicas.section_4_text') }}</p>
                                <div class="collection-methods">
                                    <div class="method-card">
                                        <div class="method-header">
                                            <i class="fas fa-comments"></i>
                                            <h5>{{ __('politicas.direct_interactions') }}</h5>
                                        </div>
                                        <p>{{ __('politicas.direct_interactions_desc') }}</p>
                                    </div>
                                    <div class="method-card">
                                        <div class="method-header">
                                            <i class="fas fa-cogs"></i>
                                            <h5>{{ __('politicas.automated_tech') }}</h5>
                                        </div>
                                        <p>{{ __('politicas.automated_tech_desc') }}</p>
                                    </div>
                                    <div class="method-card">
                                        <div class="method-header">
                                            <i class="fas fa-users"></i>
                                            <h5>{{ __('politicas.third_parties') }}</h5>
                                        </div>
                                        <p>{{ __('politicas.third_parties_desc') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección 5: Finalidad y Base Legal -->
                    <div class="privacy-section" id="finalidad">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <div class="section-title-wrapper">
                                <h2 class="section-title">{{ __('politicas.section_5_title') }}</h2>
                                <p class="section-subtitle">Propósitos del tratamiento y bases legales</p>
                            </div>
                        </div>
                        <div class="section-content">
                            <div class="content-card">
                                <p>{{ __('politicas.section_5_text') }}</p>
                                <div class="legal-basis-grid">
                                    <div class="legal-basis-card">
                                        <div class="legal-basis-icon">
                                            <i class="fas fa-check-square"></i>
                                        </div>
                                        <h5>{{ __('politicas.consent') }}</h5>
                                        <p>{{ __('politicas.consent_desc') }}</p>
                                    </div>
                                    <div class="legal-basis-card">
                                        <div class="legal-basis-icon">
                                            <i class="fas fa-file-contract"></i>
                                        </div>
                                        <h5>{{ __('politicas.contract') }}</h5>
                                        <p>{{ __('politicas.contract_desc') }}</p>
                                    </div>
                                    <div class="legal-basis-card">
                                        <div class="legal-basis-icon">
                                            <i class="fas fa-balance-scale"></i>
                                        </div>
                                        <h5>{{ __('politicas.legal_obligation') }}</h5>
                                        <p>{{ __('politicas.legal_obligation_desc') }}</p>
                                    </div>
                                    <div class="legal-basis-card">
                                        <div class="legal-basis-icon">
                                            <i class="fas fa-lightbulb"></i>
                                        </div>
                                        <h5>{{ __('politicas.legitimate_interest') }}</h5>
                                        <p>{{ __('politicas.legitimate_interest_desc') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de Derechos del Usuario -->
                    <div class="privacy-section" id="derechos">
                        <div class="section-header">
                            <div class="section-icon">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <div class="section-title-wrapper">
                                <h2 class="section-title">{{ __('politicas.your_rights') }}</h2>
                                <p class="section-subtitle">Sus derechos como titular de los datos</p>
                            </div>
                        </div>
                        <div class="section-content">
                            <div class="content-card">
                                <div class="rights-showcase">
                                    <div class="rights-intro">
                                        <p class="lead">Como titular de datos personales, usted tiene los siguientes derechos fundamentales:</p>
                                    </div>
                                    <div class="rights-grid">
                                        <div class="right-item">
                                            <div class="right-icon">
                                                <i class="fas fa-eye"></i>
                                            </div>
                                            <h6>Derecho de Acceso</h6>
                                            <p>Conocer qué datos tenemos sobre usted</p>
                                        </div>
                                        <div class="right-item">
                                            <div class="right-icon">
                                                <i class="fas fa-edit"></i>
                                            </div>
                                            <h6>Derecho de Rectificación</h6>
                                            <p>Corregir datos inexactos o incompletos</p>
                                        </div>
                                        <div class="right-item">
                                            <div class="right-icon">
                                                <i class="fas fa-trash"></i>
                                            </div>
                                            <h6>Derecho de Supresión</h6>
                                            <p>Solicitar la eliminación de sus datos</p>
                                        </div>
                                        <div class="right-item">
                                            <div class="right-icon">
                                                <i class="fas fa-ban"></i>
                                            </div>
                                            <h6>Derecho de Oposición</h6>
                                            <p>Oponerse al tratamiento de sus datos</p>
                                        </div>
                                        <div class="right-item">
                                            <div class="right-icon">
                                                <i class="fas fa-download"></i>
                                            </div>
                                            <h6>Portabilidad</h6>
                                            <p>Recibir sus datos en formato estructurado</p>
                                        </div>
                                        <div class="right-item">
                                            <div class="right-icon">
                                                <i class="fas fa-pause"></i>
                                            </div>
                                            <h6>Limitación</h6>
                                            <p>Restringir el procesamiento de datos</p>
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
        --primary-color: #2c5aa0;
        --primary-light: #4a7bc8;
        --primary-dark: #1e3f73;
        --secondary-color: #f8f9fa;
        --accent-color: #17a2b8;
        --text-primary: #2d3748;
        --text-secondary: #718096;
        --border-color: #e2e8f0;
        --shadow-sm: 0 1px 3px rgba(0,0,0,0.1);
        --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
        --shadow-lg: 0 10px 25px rgba(0,0,0,0.1);
        --gradient-primary: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
    }

    /* Hero Section */
    .privacy-hero {
        background: var(--gradient-primary);
        padding: 120px 0 80px;
        color: white;
        position: relative;
    }

    .hero-background {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grid" width="50" height="50" patternUnits="userSpaceOnUse"><path d="M 50 0 L 0 0 0 50" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
        opacity: 0.3;
    }

    .hero-icon i {
        font-size: 4rem;
        color: rgba(255,255,255,0.9);
        margin-bottom: 1rem;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }

    .hero-subtitle {
        font-size: 1.25rem;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
    }

    .bg-primary-soft {
        background-color: rgba(255,255,255,0.2) !important;
    }

    /* Navegación Sticky */
    .privacy-navigation {
        z-index: 1000;
        transition: all 0.3s ease;
    }

    .privacy-nav-link {
        color: var(--text-primary);
        font-weight: 500;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        position: relative;
    }

    .privacy-nav-link:hover {
        color: var(--primary-color);
        background-color: rgba(44, 90, 160, 0.1);
    }

    .privacy-nav-link.active {
        color: var(--primary-color);
        background-color: rgba(44, 90, 160, 0.1);
    }

    /* Sidebar */
    .privacy-sidebar {
        position: sticky;
        top: 120px;
    }

    .sidebar-card {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--border-color);
    }

    .sidebar-title {
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 1.5rem;
        font-size: 1.1rem;
    }

    .sidebar-nav {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        color: var(--text-secondary);
        text-decoration: none;
        border-radius: 8px;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .sidebar-link:hover {
        color: var(--primary-color);
        background-color: rgba(44, 90, 160, 0.05);
        text-decoration: none;
    }

    .sidebar-link.active {
        color: var(--primary-color);
        background-color: rgba(44, 90, 160, 0.1);
        font-weight: 600;
    }

    .sidebar-icon {
        width: 20px;
        margin-right: 0.75rem;
        text-align: center;
    }

    /* Secciones de Contenido */
    .privacy-section {
        margin-bottom: 4rem;
        scroll-margin-top: 120px;
    }

    .section-header {
        display: flex;
        align-items: flex-start;
        margin-bottom: 2rem;
        gap: 1.5rem;
    }

    .section-icon {
        background: var(--gradient-primary);
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
        box-shadow: var(--shadow-md);
    }

    .section-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        line-height: 1.3;
    }

    .section-subtitle {
        color: var(--text-secondary);
        font-size: 1rem;
        margin: 0;
    }

    .content-card {
        background: white;
        border-radius: 16px;
        padding: 2.5rem;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--border-color);
    }

    .content-card .lead {
        font-size: 1.1rem;
        color: var(--text-primary);
        margin-bottom: 1.5rem;
    }

    .highlight-box {
        background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
        border: 1px solid #ffeaa7;
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-top: 1.5rem;
        color: #856404;
    }

    /* Contact Grid */
    .contact-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.5rem;
        background: var(--secondary-color);
        border-radius: 12px;
        border: 1px solid var(--border-color);
    }

    .contact-icon {
        background: var(--gradient-primary);
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .contact-info h6 {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.25rem;
    }

    .contact-info p {
        color: var(--text-secondary);
        margin: 0;
        font-size: 0.9rem;
    }

    /* Data Types Grid */
    .data-types-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .data-type-card {
        background: var(--secondary-color);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
    }

    .data-type-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
    }

    .data-type-icon {
        background: var(--gradient-primary);
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin: 0 auto 1rem;
    }

    .data-type-card h5 {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 1rem;
    }

    .data-type-card p {
        color: var(--text-secondary);
        font-size: 0.9rem;
        margin: 0;
    }

    /* Collection Methods */
    .collection-methods {
        display: grid;
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .method-card {
        background: var(--secondary-color);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 2rem;
    }

    .method-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .method-header i {
        background: var(--gradient-primary);
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .method-header h5 {
        font-weight: 600;
        color: var(--text-primary);
        margin: 0;
    }

    /* Legal Basis Grid */
    .legal-basis-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .legal-basis-card {
        background: var(--secondary-color);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
    }

    .legal-basis-icon {
        background: var(--gradient-primary);
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        margin: 0 auto 1rem;
    }

    .legal-basis-card h5 {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 1rem;
    }

    .legal-basis-card p {
        color: var(--text-secondary);
        font-size: 0.9rem;
        margin: 0;
    }

    /* Rights Section */
    .rights-showcase {
        text-align: center;
    }

    .rights-intro {
        margin-bottom: 3rem;
    }

    .rights-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
    }

    .right-item {
        background: var(--secondary-color);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 2rem 1.5rem;
        transition: all 0.3s ease;
    }

    .right-item:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
    }

    .right-icon {
        background: var(--gradient-primary);
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        margin: 0 auto 1rem;
    }

    .right-item h6 {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
    }

    .right-item p {
        color: var(--text-secondary);
        font-size: 0.85rem;
        margin: 0;
    }

    /* Contact CTA */
    .contact-cta {
        background: var(--gradient-primary);
        border-radius: 20px;
        padding: 3rem;
        color: white;
        text-align: center;
        box-shadow: var(--shadow-lg);
    }

    .cta-content {
        max-width: 600px;
        margin: 0 auto;
    }

    .cta-icon i {
        font-size: 3rem;
        margin-bottom: 1.5rem;
        opacity: 0.9;
    }

    .cta-text h3 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .cta-text p {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 2rem;
    }

    .cta-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .cta-actions .btn {
        border-radius: 50px;
        padding: 0.75rem 2rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .cta-actions .btn-primary {
        background: white;
        color: var(--primary-color);
        border: 2px solid white;
    }

    .cta-actions .btn-primary:hover {
        background: transparent;
        color: white;
        border-color: white;
    }

    .cta-actions .btn-outline-primary {
        background: transparent;
        color: white;
        border: 2px solid rgba(255,255,255,0.5);
    }

    .cta-actions .btn-outline-primary:hover {
        background: rgba(255,255,255,0.1);
        border-color: white;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .section-header {
            flex-direction: column;
            gap: 1rem;
        }

        .section-title {
            font-size: 1.5rem;
        }

        .content-card {
            padding: 1.5rem;
        }

        .contact-grid {
            grid-template-columns: 1fr;
        }

        .data-types-grid {
            grid-template-columns: 1fr;
        }

        .legal-basis-grid {
            grid-template-columns: 1fr;
        }

        .rights-grid {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }

        .cta-actions {
            flex-direction: column;
            align-items: center;
        }

        .cta-actions .btn {
            width: 100%;
            max-width: 300px;
        }
    }

    /* Smooth Scrolling */
    html {
        scroll-behavior: smooth;
    }

    /* Loading Animation */
    .privacy-section {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease forwards;
    }

    .privacy-section:nth-child(1) { animation-delay: 0.1s; }
    .privacy-section:nth-child(2) { animation-delay: 0.2s; }
    .privacy-section:nth-child(3) { animation-delay: 0.3s; }
    .privacy-section:nth-child(4) { animation-delay: 0.4s; }
    .privacy-section:nth-child(5) { animation-delay: 0.5s; }
    .privacy-section:nth-child(6) { animation-delay: 0.6s; }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
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
        const hero = document.querySelector('.privacy-hero');
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
