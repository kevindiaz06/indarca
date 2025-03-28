<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Cuenta - INDARCA</title>
    <style>
        body {
<<<<<<< HEAD
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
=======
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            padding: 20px;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 5px 5px;
        }
        .code-container {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            text-align: center;
            border: 1px dashed #ccc;
        }
        .code {
            font-family: 'Courier New', monospace;
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            letter-spacing: 4px;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
        .warning {
            color: #dc3545;
            font-weight: bold;
        }
        .info {
            background-color: #e9f7fe;
            border-left: 4px solid #007bff;
            padding: 10px;
            margin: 15px 0;
>>>>>>> dd982336b7279ad9ffc9f29f819bd77da54cd9ff
        }
    </style>
</head>
<body>
<<<<<<< HEAD
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
=======
    <div class="header">
        <h1>Verificación de Cuenta - INDARCA</h1>
    </div>

    <div class="content">
        <p>Estimado/a <strong>{{ $name }}</strong>,</p>

        <p>¡Gracias por registrarte en INDARCA! Para completar tu registro y verificar tu cuenta, utiliza el siguiente código:</p>

        <div class="code-container">
            <p class="code">{{ $code }}</p>
        </div>

        <div class="info">
            <p>Este código expirará en 60 minutos. Si no realizas la verificación en este tiempo, deberás solicitar un nuevo código.</p>
        </div>

        <p class="warning">Por tu seguridad, no compartas este código con nadie más.</p>

        <p>Si no has solicitado esta cuenta, puedes ignorar este correo.</p>

        <p>Saludos cordiales,</p>
        <p><strong>Equipo INDARCA</strong></p>
    </div>

    <div class="footer">
        <p>Este es un mensaje automático. Por favor, no responda a este correo.</p>
        <p>© {{ date('Y') }} INDARCA. Todos los derechos reservados.</p>
>>>>>>> dd982336b7279ad9ffc9f29f819bd77da54cd9ff
    </div>
</body>
</html>
