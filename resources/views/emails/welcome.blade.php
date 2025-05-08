<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a INDARCA</title>
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
        .info {
            background-color: #fff8f8;
            border-left: 4px solid #dc3545;
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
        .features {
            margin: 30px 0;
            text-align: center;
        }
        .feature {
            margin-bottom: 20px;
            padding: 0 15px;
        }
        .feature h3 {
            color: #dc3545;
            margin-bottom: 8px;
        }
        ul li {
            margin-bottom: 8px;
            position: relative;
            padding-left: 20px;
        }
        ul li::before {
            content: "•";
            color: #dc3545;
            font-weight: bold;
            font-size: 18px;
            position: absolute;
            left: 0;
        }
        strong {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Logo de la empresa -->
            <img src="{{ $message->embed($logoPath) }}" alt="INDARCA Logo" class="logo">
            <h1>¡Bienvenido a INDARCA!</h1>
        </div>

        <div class="content">
            <p>Estimado/a <strong>{{ $user->name }}</strong>,</p>

            <p>¡Nos complace darle la bienvenida a la plataforma de gestión de INDARCA! Su cuenta ha sido creada exitosamente y ahora puede acceder a todos nuestros servicios en línea.</p>

            <p>Con su cuenta puede:</p>
            <ul>
                <li>Consultar el estado de calibración de sus densímetros</li>
                <li>Solicitar nuevas calibraciones</li>
                <li>Recibir notificaciones sobre el estado de sus equipos</li>
                <li>Acceder a información técnica y certificados</li>
            </ul>

            <div class="info">
                <strong>Información de acceso:</strong><br>
                <strong>Usuario:</strong> {{ $user->email }}<br>
                <strong>Contraseña:</strong> {{ $password }}
            </div>

            <p>Le recomendamos cambiar su contraseña después del primer inicio de sesión para mayor seguridad.</p>
        </div>

        <div class="footer">
            <div class="contact-info">
                <strong>INDARCA S.A.</strong><br>
                C. C 16, Santo Domingo Este 11506<br>
                República Dominicana<br>
                contacto@indarca.com | +1809 596 0333
            </div>

            <div class="social-links">
                <a href="https://x.com/indarca_srl?s=11">Twitter</a> |
                <a href="https://www.instagram.com/indarca.srl?igsh=MXZzN2l3cTBxaG1jOA==">Instagram</a> |
                <a href="https://www.linkedin.com/company/indarca-srl">LinkedIn</a> |
                <a href="https://www.facebook.com/profile.php?id=100069160367684">Facebook</a>
            </div>

            <div style="margin: 15px 0;">
                <strong>Horario de Atención:</strong><br>
                Lunes - Viernes: 9:00 AM - 5:00 PM
            </div>

            <div style="margin: 15px 0;">
                <strong>Empresa Certificada:</strong><br>
                ISO 9001:2015 | ISO 14001
            </div>

            <div class="disclaimer">
                <p>Este es un mensaje automático. Por favor, no responda a este correo.</p>
                <p>&copy; {{ date('Y') }} <strong>INDARCA</strong>. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</body>
</html>
