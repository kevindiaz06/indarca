<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Correo Electrónico</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        .verification-modal {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            padding: 0;
            overflow: hidden;
        }
        .modal-header {
            background-color: #0d6efd;
            color: white;
            padding: 20px;
            text-align: center;
            border-bottom: none;
        }
        .modal-body {
            padding: 30px;
        }
        .code-input {
            letter-spacing: 8px;
            font-size: 24px;
            text-align: center;
        }
        .btn-verify {
            background-color: #0d6efd;
            color: white;
            border: none;
            padding: 12px;
            font-weight: 500;
            border-radius: 5px;
            width: 100%;
        }
        .alert {
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="verification-modal">
        <div class="modal-header">
            <h4 class="mb-0">Verificar Correo Electrónico</h4>
        </div>

        <div class="modal-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="alert alert-info mb-4">
                <p class="mb-0">Hemos enviado un código de verificación a tu correo electrónico.</p>
                <p class="mb-0">Por favor, revisa tu bandeja de entrada e ingresa el código de 6 dígitos a continuación.</p>
            </div>

            <form method="POST" action="{{ route('verification.verify') }}">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="mb-4">
                    <label for="code" class="form-label fw-medium">Código de Verificación</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-shield-lock"></i></span>
                        <input id="code" type="text" class="form-control code-input @error('code') is-invalid @enderror"
                               name="code" required autocomplete="off" autofocus maxlength="6"
                               placeholder="______" inputmode="numeric">
                    </div>
                    @error('code')
                        <div class="text-danger small mt-2">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    @error('email')
                        <div class="text-danger small mt-2">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn-verify">
                        <i class="bi bi-check-circle me-2"></i>Verificar Correo
                    </button>
                </div>
            </form>

            <div class="text-center mt-3">
                <p class="mb-2">¿No recibiste el código?</p>
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    <button type="submit" class="btn btn-link p-0">Reenviar código de verificación</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        // Enfoque automático en el campo de código cuando se carga la página
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('code').focus();
        });

        // Permitir solo dígitos en el campo de entrada
        document.getElementById('code').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
</body>
</html>
