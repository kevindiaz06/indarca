<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje de Contacto - INDARCA</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 650px;
            margin: 0 auto;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            background-color: #ffffff;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #1a5276;
            color: white;
            padding: 25px 20px;
            text-align: center;
            border-bottom: 5px solid #2980b9;
        }
        .header h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 600;
        }
        .logo {
            max-width: 180px;
            margin-bottom: 12px;
        }
        .content {
            padding: 35px 30px;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #1a5276;
        }
        .message {
            background-color: #f8f9fa;
            border-left: 4px solid #1a5276;
            padding: 15px;
            border-radius: 4px;
            margin: 25px 0;
        }
        .footer {
            background-color: #2c3e50;
            padding: 20px;
            text-align: center;
            font-size: 13px;
            color: #ecf0f1;
        }
        .contact-info {
            margin: 15px 0;
            line-height: 1.8;
        }
        .social-links {
            margin: 20px 0 15px;
        }
        .social-links a {
            display: inline-block;
            margin: 0 8px;
            color: #ecf0f1;
            text-decoration: none;
        }
        .disclaimer {
            border-top: 1px solid rgba(255,255,255,0.2);
            padding-top: 15px;
            margin-top: 15px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Logo de la empresa -->
            <img src="{{ $message->embed(public_path('images/logo.png')) }}" alt="INDARCA Logo" class="logo">
            <h1>Mensaje de Contacto</h1>
        </div>

        <div class="content">
            <div class="field">
                <span class="label">Nombre:</span>
                <div>{{ $datos['nombre'] }}</div>
            </div>

            <div class="field">
                <span class="label">Correo electrónico:</span>
                <div>{{ $datos['correo'] }}</div>
            </div>

            <div class="field">
                <span class="label">Asunto:</span>
                <div>{{ $datos['asunto'] }}</div>
            </div>

            <div class="field">
                <span class="label">Mensaje:</span>
                <div class="message">{{ $datos['mensaje'] }}</div>
            </div>
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
                <p>Este correo fue enviado desde el formulario de contacto de la página web de INDARCA.</p>
                <p>&copy; {{ date('Y') }} INDARCA. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</body>
</html>
