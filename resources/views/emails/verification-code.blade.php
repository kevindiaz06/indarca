<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Cuenta - INDARCA</title>
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
        .verification-code {
            background-color: #f8f9fa;
            border-left: 4px solid #1a5276;
            border-radius: 4px;
            padding: 20px;
            margin: 25px 0;
            text-align: center;
        }
        .code {
            font-family: 'Arial', sans-serif;
            font-size: 32px;
            font-weight: bold;
            color: #1a5276;
            letter-spacing: 4px;
            margin: 10px 0;
        }
        .button {
            display: inline-block;
            padding: 12px 28px;
            background-color: #1a5276;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            margin-top: 20px;
            transition: all 0.3s ease;
        }
        .button:hover {
            background-color: #154360;
        }
        .info {
            background-color: #f8f9fa;
            border-left: 4px solid #f39c12;
            padding: 15px;
            margin: 25px 0;
            font-size: 14px;
        }
        .footer {
            background-color: #292929;
            padding: 30px 20px;
            text-align: center;
            font-size: 13px;
            color: #ffffff;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        .contact-info {
            margin: 15px 0;
            line-height: 1.8;
        }
        .contact-info strong {
            color: #dc3545;
        }
        .social-links {
            margin: 20px 0 15px;
        }
        .social-links a {
            display: inline-block;
            margin: 0 8px;
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .social-links a:hover {
            color: #dc3545;
        }
        .disclaimer {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 15px;
            margin-top: 15px;
            font-size: 12px;
            color: rgba(255,255,255,0.7);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Logo de la empresa -->
            <img src="{{ $message->embed(public_path('images/logo.png')) }}" alt="INDARCA Logo" class="logo">
            <h1>Verificación de Cuenta</h1>
        </div>

        <div class="content">
            <p>Estimado/a <strong>{{ $nombre }}</strong>,</p>

            <p>Le damos la bienvenida a <strong>INDARCA</strong>. Para garantizar la seguridad de su cuenta, es necesario completar el proceso de verificación utilizando el siguiente código:</p>

            <div class="verification-code">
                <p class="code">{{ $codigo }}</p>
                <p>Este código es válido durante <strong>10 minutos</strong></p>
            </div>

            <p>Por favor, introduzca este código en la página de verificación para activar su cuenta y comenzar a utilizar nuestros servicios.</p>

            <div style="text-align: center;">
                <a href="{{ $url }}" class="button">Verificar mi cuenta</a>
            </div>

            <div class="info">
                <p><strong>¿No ha solicitado esta verificación?</strong> Si no ha creado una cuenta en INDARCA, por favor ignore este mensaje o póngase en contacto con nuestro departamento de atención al cliente.</p>
            </div>

            <p>Atentamente,</p>
            <p><strong>Equipo INDARCA</strong></p>
        </div>

        <div class="footer">
            <div class="contact-info">
                <strong>INDARCA S.A.</strong><br>
                Calle Principal #123, Santo Domingo<br>
                República Dominicana<br>
                contacto@indarca.com | +1809 596 0333
            </div>

            <div class="social-links">
                <a href="#">LinkedIn</a> |
                <a href="#">Twitter</a> |
                <a href="#">Facebook</a> |
                <a href="#">Instagram</a>
            </div>

            <div class="disclaimer">
                <p>Este es un mensaje automático. Por favor, no responda a este correo.</p>
                <p>&copy; {{ date('Y') }} <strong>INDARCA</strong>. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</body>
</html>
