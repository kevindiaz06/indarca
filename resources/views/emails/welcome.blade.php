<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a INDARCA</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #0056b3;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 15px;
        }
        .content {
            padding: 30px;
        }
        .credentials-container {
            background-color: #f7f7f7;
            border-left: 4px solid #0056b3;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .credentials {
            font-family: monospace;
            font-size: 14px;
            margin: 5px 0;
        }
        .button {
            display: inline-block;
            background-color: #0056b3;
            color: #fff;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 4px;
            margin: 20px 0;
            font-weight: 600;
        }
        .footer {
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        .contact-info {
            margin-bottom: 15px;
        }
        .social-links {
            margin-bottom: 15px;
        }
        .social-links a {
            color: #0056b3;
            text-decoration: none;
        }
        .disclaimer {
            font-size: 11px;
        }
        .warning {
            color: #d63031;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Logo de la empresa -->
            <img src="{{ $message->embed(public_path('images/logo.png')) }}" alt="INDARCA Logo" class="logo">
            <h1>Bienvenido/a a INDARCA</h1>
        </div>

        <div class="content">
            <p>Estimado/a <strong>{{ $nombre }}</strong>,</p>

            <p>¡Le damos la bienvenida a INDARCA! Su cuenta ha sido creada con éxito por un administrador del sistema.</p>

            <p>A continuación, encontrará sus credenciales de acceso:</p>

            <div class="credentials-container">
                <p class="credentials"><strong>Correo electrónico:</strong> {{ $email }}</p>
                <p class="credentials"><strong>Contraseña:</strong> {{ $password }}</p>
            </div>

            <p class="warning">Por seguridad, le recomendamos cambiar esta contraseña una vez que acceda a su cuenta.</p>

            <div style="text-align: center;">
                <a href="{{ url('/login') }}" class="button">Iniciar sesión</a>
            </div>

            <p>Si tiene alguna pregunta o necesita asistencia, no dude en contactarnos.</p>

            <p>Atentamente,</p>
            <p><strong>Equipo INDARCA</strong></p>
        </div>

        <div class="footer">
            <div class="contact-info">
                <strong>INDARCA S.A.</strong><br>
                Av. Empresarial 123, Sector Corporativo<br>
                contacto@indarca.com | +34 900 123 456
            </div>

            <div class="social-links">
                <a href="#">LinkedIn</a> |
                <a href="#">Twitter</a> |
                <a href="#">Facebook</a> |
                <a href="#">Instagram</a>
            </div>

            <div class="disclaimer">
                <p>Este es un mensaje automático. Por favor, no responda a este correo.</p>
                <p>&copy; {{ date('Y') }} INDARCA. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</body>
</html>
