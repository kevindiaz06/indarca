<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'INDARCA') }} - Iniciar Sesión</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="https://indarca.net/wp-content/uploads/2019/03/Favicon-3.ico" rel="icon">

    <style>
        :root {
            --color-primary: #F40006;
            --color-dark: #292929;
            --color-light: #FFFFFF;
            --color-primary-light: rgba(244, 0, 6, 0.1);
            --color-primary-medium: rgba(244, 0, 6, 0.5);
            --color-dark-light: rgba(41, 41, 41, 0.8);
            --color-dark-medium: rgba(41, 41, 41, 0.5);
            --color-dark-subtle: rgba(41, 41, 41, 0.1);
            --color-gray: #292929;
            --color-gray-light: #f8f9fa;
        }

        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        .form-floating>label {
            padding-left: 1rem;
        }

        .form-floating>.form-control {
            padding-left: 1rem;
        }

        .btn-primary {
            background-color: var(--color-primary);
            border-color: var(--color-primary);
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #d30005;
            border-color: #d30005;
        }

        .form-check-input:checked {
            background-color: var(--color-primary);
            border-color: var(--color-primary);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 0.25rem var(--color-primary-light);
        }

        a {
            color: var(--color-primary);
        }

        a:hover {
            color: #d30005;
        }

        .text-primary {
            color: var(--color-primary) !important;
        }

        .text-danger {
            color: var(--color-primary) !important;
        }

        .border-primary {
            border-color: var(--color-primary) !important;
        }

        .bg-primary {
            background-color: var(--color-primary) !important;
        }

        .bg-dark {
            background-color: var(--color-dark) !important;
        }
    </style>
</head>

<body>
    <div class="min-vh-100 d-flex align-items-center position-relative py-5"
         style="background: url('https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&q=80') center/cover no-repeat fixed;">

        <!-- Overlay de fondo -->
        <div class="position-absolute top-0 start-0 w-100 h-100"
             style="background: linear-gradient(135deg, rgba(41, 41, 41, 0.6) 0%, rgba(41, 41, 41, 0.85) 100%);"></div>

        <div class="container position-relative">
            <!-- Logo principal en la parte superior -->
            <div class="text-center mb-5">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" height="70" style="filter: brightness(0) invert(1);">
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <!-- Tarjeta con efecto glassmorphism -->
                    <div class="card border-0 shadow-lg"
                         style="border-radius: 16px; backdrop-filter: blur(10px); background-color: rgba(255, 255, 255, 0.9);">
                        <div class="card-body p-5">
                            <h2 class="text-center fw-bold mb-1" style="color: var(--color-dark);">{{ __('Bienvenido') }}</h2>
                            <p class="text-center text-muted mb-4">{{ __('Accede a tu cuenta para continuar') }}</p>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-4">
                                    <div class="form-floating">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}"
                                               required autocomplete="email" autofocus
                                               placeholder="Correo electrónico">
                                        <label for="email">{{ __('Correo Electrónico') }}</label>
                                    </div>
                                    @error('email')
                                        <div class="small mt-2" style="color: var(--color-primary);">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-floating">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password"
                                               placeholder="Contraseña">
                                        <label for="password">{{ __('Contraseña') }}</label>
                                        <button class="btn btn-light border-0 position-absolute end-0 top-50 translate-middle-y me-2 d-flex align-items-center justify-content-center"
                                                type="button" id="togglePassword" style="width: 38px; height: 38px; z-index: 5; border-radius: 50%;">
                                            <i class="bi bi-eye" id="toggleIcon" style="color: var(--color-gray);"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <div class="small mt-2" style="color: var(--color-primary);">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Recordar sesión') }}
                                        </label>
                                    </div>

                                    @if (Route::has('password.request'))
                                        <a class="text-decoration-none small" href="{{ route('password.request') }}" style="color: var(--color-primary);">
                                            {{ __('¿Olvidaste tu contraseña?') }}
                                        </a>
                                    @endif
                                </div>

                                <div class="d-grid gap-2 mb-4">
                                    <button type="submit" class="btn btn-primary py-3 rounded-pill fw-medium">
                                        {{ __('Iniciar Sesión') }}
                                    </button>
                                </div>

                                @if (Route::has('register'))
                                    <div class="text-center">
                                        <p class="mb-0">
                                            {{ __('¿No tienes cuenta?') }}
                                            <a class="text-decoration-none fw-medium" href="{{ route('register') }}" style="color: var(--color-primary);">
                                                {{ __('Regístrate aquí') }}
                                            </a>
                                        </p>
                                    </div>
                                @endif

                                <div class="text-center mt-4">
                                    <a href="{{ route('inicio') }}" class="text-decoration-none d-inline-flex align-items-center" style="color: var(--color-primary);">
                                        <i class="bi bi-arrow-left me-2"></i>{{ __('Volver a INDARCA') }}
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <p class="text-white mb-0 small">
                            © {{ date('Y') }} Indarca. Todos los derechos reservados.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts necesarios -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            togglePassword.addEventListener('click', function() {
                // Cambiar el tipo de input
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Cambiar el icono
                if (type === 'text') {
                    toggleIcon.classList.remove('bi-eye');
                    toggleIcon.classList.add('bi-eye-slash');
                } else {
                    toggleIcon.classList.remove('bi-eye-slash');
                    toggleIcon.classList.add('bi-eye');
                }
            });
        });
    </script>

    @if (session('login_success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: '¡Bienvenido!',
                text: 'Has iniciado sesión correctamente.',
                showConfirmButton: false,
                timer: 10000,
                timerProgressBar: true,
                position: 'top-end',
                toast: true,
                showCloseButton: true
            });
        });
    </script>
    @endif
</body>
</html>
