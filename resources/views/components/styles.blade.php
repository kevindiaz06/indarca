<style>
/* Definición de variables de colores */
:root {
    --color-primary: #D90000;
    --color-dark: #000000;
    --color-light: #FFFFFF;
    --color-primary-light: rgba(217, 0, 0, 0.1);
    --color-primary-medium: rgba(217, 0, 0, 0.5);
    --color-dark-light: rgba(0, 0, 0, 0.8);
    --color-dark-medium: rgba(0, 0, 0, 0.5);
    --color-dark-subtle: rgba(0, 0, 0, 0.1);
}

/* Animaciones personalizadas para los iconos */
@keyframes pulse-border {
    0% {
        transform: scale(1);
        border-color: rgba(217, 0, 0, 0.2);
    }
    50% {
        transform: scale(1.05);
        border-color: rgba(217, 0, 0, 0.6);
    }
    100% {
        transform: scale(1);
        border-color: rgba(217, 0, 0, 0.2);
    }
}

@keyframes float {
    0% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-8px);
    }
    100% {
        transform: translateY(0px);
    }
}

.icon-box, .service-item .icon {
    width: 70px;
    height: 70px;
    transition: all 0.4s ease;
    border: 1px solid rgba(217, 0, 0, 0.2);
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon-animate {
    animation: pulse-border 2s infinite;
}

.float-animation {
    animation: float 3s ease-in-out infinite;
}

.hover-shadow {
    transition: all 0.3s ease;
}

.hover-shadow:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

.service-item {
    transition: all 0.4s ease;
    padding: 20px;
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.service-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.service-item:hover .icon {
    background-color: var(--color-primary) !important;
}

.service-item:hover .icon i {
    color: var(--color-light) !important;
}

.stats-item {
    padding: 20px;
    width: 100%;
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    transition: all 0.4s;
    text-align: center;
    border-radius: 10px;
}

.stats .icon-box {
    animation: float 3s ease-in-out infinite;
    background-color: #FFFFFF !important;
}

.stats .icon-box i {
    color: #F40006 !important;
}

.stats .icon-box:hover {
    background-color: #292929 !important;
}

.stats .icon-box:hover i {
    color: #FFFFFF !important;
}

.stats-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.transition-all {
    transition: all 0.3s ease;
}
</style>
