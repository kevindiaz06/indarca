<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de contacto - INDARCA</title>
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
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Logo de la empresa -->
            <img src="{{ $message->embed(public_path('images/logo.png')) }}" alt="INDARCA Logo" class="logo">
            <h1>Confirmación de Contacto</h1>
        </div>

        <div class="content">
            <p>Estimado/a <strong>{{ $nombre }}</strong>,</p>

            <p>Gracias por contactar con INDARCA. Hemos recibido su mensaje correctamente.</p>

            <div class="info">
                <p>Nos pondremos en contacto con usted a la mayor brevedad posible para atender su consulta.</p>
            </div>

            <p>Si tiene alguna pregunta adicional, no dude en contactarnos nuevamente.</p>

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
