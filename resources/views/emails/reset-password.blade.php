<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña - INDARCA</title>
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
            background-color: #dc3545;
            color: white;
            padding: 25px 20px;
            text-align: center;
            border-bottom: 5px solid #b82634;
        }
        .logo {
            max-width: 180px;
            margin-bottom: 12px;
        }
        .content {
            padding: 35px 30px;
        }
        .reset-code {
            display: block;
            background-color: #fff8f8;
            border-left: 4px solid #dc3545;
            padding: 15px;
            margin: 20px 0;
            font-size: 24px;
            text-align: center;
            font-weight: bold;
            letter-spacing: 2px;
        }
        .button {
            display: inline-block;
            padding: 12px 28px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            margin-top: 20px;
            transition: all 0.3s ease;
        }
        .button:hover {
            background-color: #b82634;
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
        .warning {
            background-color: #fff8f8;
            border-left: 4px solid #dc3545;
            padding: 15px;
            margin: 25px 0;
            font-size: 14px;
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
            <h1>Restablecer Contraseña</h1>
        </div>

        <div class="content">
            <p>Estimado/a <strong>{{ $usuario->nombre }}</strong>,</p>

            <p>Hemos recibido una solicitud para restablecer la contraseña de su cuenta en INDARCA. Para continuar con el proceso, por favor utilice el siguiente código:</p>

            <div class="reset-code">
                {{ $codigo }}
            </div>

            <p>Este código es válido por 30 minutos. Si no ha solicitado este cambio, puede ignorar este correo y su contraseña seguirá siendo la misma.</p>

            <p>Para completar el proceso, haga clic en el botón a continuación e introduzca el código cuando se le solicite:</p>

            <div style="text-align: center;">
                <a href="{{ $resetUrl }}" class="button">Restablecer Contraseña</a>
            </div>

            <div class="warning">
                <strong>Nota de seguridad:</strong> Nunca compartiremos sus datos de acceso ni le solicitaremos su contraseña por correo electrónico. Siempre acceda a nuestro sitio web directamente escribiendo la URL en su navegador.
            </div>
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
