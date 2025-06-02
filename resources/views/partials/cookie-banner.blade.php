{{-- Banner de Cookies --}}
<div id="cookie-banner" class="cookie-banner position-fixed bottom-0 start-0 end-0 d-none" style="z-index: 9999;">
    <div class="cookie-overlay position-fixed top-0 start-0 end-0 bottom-0" style="background-color: rgba(0, 0, 0, 0.5); backdrop-filter: blur(2px);"></div>
    <div class="cookie-content bg-white shadow-lg border-top border-4 border-danger">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-7 mb-3 mb-md-0">
                    <div class="d-flex align-items-center">
                        <div class="cookie-icon me-3 d-flex align-items-center justify-content-center bg-danger text-white rounded-circle" style="width: 50px; height: 50px; flex-shrink: 0;">
                            <i class="bi bi-shield-check fs-4"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold text-dark">Uso de Cookies</h6>
                            <p class="mb-0 text-muted small">Este sitio web utiliza cookies para mejorar la experiencia del usuario.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 text-md-end">
                    <button type="button" id="accept-cookies" class="btn btn-danger btn-lg px-4 py-2 fw-bold shadow-sm">
                        <i class="bi bi-check-circle me-2"></i>Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Estilos CSS del Banner --}}
<style>
    .cookie-banner {
        animation: slideInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        transform: translateY(100%);
    }

    .cookie-banner.show {
        transform: translateY(0);
    }

    .cookie-content {
        position: relative;
        z-index: 10000;
        border-radius: 12px 12px 0 0;
        box-shadow: 0 -10px 40px rgba(0, 0, 0, 0.15);
    }

    .cookie-icon {
        animation: pulse 2s infinite;
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
    }

    .cookie-banner .btn-danger {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        border: none;
        border-radius: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
    }

    .cookie-banner .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(220, 53, 69, 0.4);
        background: linear-gradient(135deg, #c82333 0%, #a02834 100%);
    }

    .cookie-banner .btn-danger:active {
        transform: translateY(0);
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(100%);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }

    /* Desactivar scroll cuando el banner está activo */
    body.cookie-banner-active {
        overflow: hidden;
        position: fixed;
        width: 100%;
    }

    /* Responsivo */
    @media (max-width: 767px) {
        .cookie-content {
            margin: 0 10px;
            border-radius: 12px;
            margin-bottom: 10px;
        }

        .cookie-icon {
            width: 40px;
            height: 40px;
        }

        .cookie-banner .btn-danger {
            width: 100%;
            margin-top: 10px;
        }

        .cookie-content .row {
            text-align: center;
        }
    }
</style>

{{-- JavaScript del Banner --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const cookieBanner = document.getElementById('cookie-banner');
    const acceptButton = document.getElementById('accept-cookies');
    const body = document.body;

    // Verificar si ya se aceptaron las cookies
    if (!localStorage.getItem('cookies-accepted')) {
        // Mostrar el banner después de un pequeño retraso para mejor UX
        setTimeout(() => {
            cookieBanner.classList.remove('d-none');
            cookieBanner.classList.add('show');
            body.classList.add('cookie-banner-active');

            // Enfocar el botón de aceptar para accesibilidad
            setTimeout(() => {
                acceptButton.focus();
            }, 300);
        }, 1000);
    }

    // Manejar clic en el botón de aceptar
    acceptButton.addEventListener('click', function() {
        // Guardar preferencia en localStorage
        localStorage.setItem('cookies-accepted', 'true');
        localStorage.setItem('cookies-accepted-date', new Date().toISOString());

        // Animación de salida
        cookieBanner.style.animation = 'slideOutDown 0.5s cubic-bezier(0.55, 0, 0.1, 1) forwards';

        // Reactivar scroll
        body.classList.remove('cookie-banner-active');

        // Remover el banner después de la animación
        setTimeout(() => {
            cookieBanner.remove();
        }, 500);

        // Opcional: Disparar evento personalizado para analytics
        window.dispatchEvent(new CustomEvent('cookies-accepted', {
            detail: {
                timestamp: new Date().toISOString(),
                userAgent: navigator.userAgent
            }
        }));
    });

    // Manejar tecla Escape para accesibilidad
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !cookieBanner.classList.contains('d-none')) {
            acceptButton.click();
        }
    });

    // Prevenir scroll con mouse wheel cuando el banner está activo
    document.addEventListener('wheel', function(e) {
        if (body.classList.contains('cookie-banner-active')) {
            e.preventDefault();
            e.stopPropagation();
        }
    }, { passive: false });

    // Prevenir scroll táctil en dispositivos móviles
    document.addEventListener('touchmove', function(e) {
        if (body.classList.contains('cookie-banner-active')) {
            e.preventDefault();
        }
    }, { passive: false });
});

// Agregar animación de salida
const slideOutDownKeyframes = `
    @keyframes slideOutDown {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(100%);
        }
    }
`;

// Inyectar keyframes de salida
const styleSheet = document.createElement('style');
styleSheet.textContent = slideOutDownKeyframes;
document.head.appendChild(styleSheet);
</script>
