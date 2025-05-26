<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de Credenciales - INDARCA</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Montserrat', 'Arial', sans-serif;
            line-height: 1.7;
            color: #2d3748;
            max-width: 650px;
            margin: 0 auto;
            padding: 0;
            background-color: #f7f7f7;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin: 20px auto;
        }
        .header {
            background: linear-gradient(135deg, #F40006 0%, #d10005 100%);
            color: white;
            padding: 32px 25px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .logo {
            max-width: 180px;
            margin-bottom: 18px;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.15));
        }
        .content {
            padding: 40px 35px;
            color: #4a5568;
        }
        .credentials {
            background-color: #fff8f8;
            border-left: 4px solid #F40006;
            border-radius: 0 6px 6px 0;
            padding: 20px;
            margin: 28px 0;
            font-size: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            letter-spacing: 1px;
        }
        .footer {
            background: linear-gradient(to bottom, #292929, #1a1a1a);
            padding: 35px 25px;
            text-align: center;
            font-size: 14px;
            color: #e0e0e0;
        }
        .contact-info {
            margin: 18px 0;
            line-height: 1.9;
        }
        .contact-info strong {
            color: #f8b0b7;
            font-weight: 600;
        }
        .warning {
            background-color: #fff8f8;
            border-left: 4px solid #F40006;
            border-radius: 0 6px 6px 0;
            padding: 20px;
            margin: 28px 0;
            font-size: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        .social-links {
            margin: 25px 0 20px;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #ffffff;
            text-decoration: none;
            transition: all 0.3s ease;
            border-bottom: 1px solid transparent;
            padding-bottom: 2px;
        }
        .social-links a:hover {
            color: #f8b0b7;
            border-bottom: 1px solid #f8b0b7;
        }
        .disclaimer {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 18px;
            margin-top: 18px;
            font-size: 12px;
            color: rgba(255,255,255,0.6);
        }
        .cert-badges {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 15px 0;
        }
        .cert-badge {
            background-color: #333;
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        strong {
            color: #F40006;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Logo de la empresa -->
            @if(isset($logoPath) && $logoPath)
                <img src="{{ $message->embed($logoPath) }}" alt="INDARCA Logo" class="logo">
            @else
                <h2 style="margin-bottom: 12px;">INDARCA</h2>
            @endif
            <h1>Actualización de Credenciales</h1>
        </div>

        <div class="content">
            <p>Estimado/a <strong>{{ $user->name }}</strong>,</p>

            <p>Le informamos que un administrador ha actualizado la contraseña de su cuenta en INDARCA. Sus nuevas credenciales de acceso son:</p>

            <div class="credentials">
                <strong>Correo electrónico:</strong> {{ $user->email }}<br>
                <strong>Nueva contraseña:</strong> {{ $password }}
            </div>

            <p>Le recomendamos que cambie esta contraseña por una de su preferencia la próxima vez que inicie sesión.</p>

            <div class="warning">
                <strong>Nota de seguridad:</strong> Nunca compartiremos sus datos de acceso con terceros. Por su seguridad, guarde esta información en un lugar seguro y no la comparta con nadie.
            </div>
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

            <div style="margin: 18px 0;">
                <strong>Horario de Atención:</strong><br>
                Lunes - Viernes: 9:00 AM - 5:00 PM
            </div>

            <div class="cert-badges">
                <span class="cert-badge">ISO 9001:2015</span>
                <span class="cert-badge">ISO 14001</span>
            </div>

            <div class="disclaimer">
                <p>Este es un mensaje automático. Por favor, no responda a este correo.</p>
                <p>&copy; {{ date('Y') }} <strong>INDARCA</strong>. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</body>
</html>
