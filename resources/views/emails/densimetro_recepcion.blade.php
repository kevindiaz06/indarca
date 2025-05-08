<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepción de Densímetro - INDARCA</title>
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
        .info-item {
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
            color: #dc3545;
        }
        .referencia {
            font-weight: bold;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Logo de la empresa -->
            <img src="{{ $message->embed('@logo_indarca.png') }}" alt="INDARCA Logo" class="logo">
            <h1>Confirmación de Recepción de Densímetro</h1>
        </div>

        <div class="content">
            <p>Estimado/a <strong>{{ $cliente ? $cliente->name : 'Cliente' }}</strong>,</p>

            <p>Le confirmamos que hemos recibido su densímetro en nuestras instalaciones para su revisión y/o reparación. A continuación, encontrará los detalles:</p>

            <div class="info-item">
                <span class="label">Fecha de recepción:</span> {{ $densimetro->fecha_entrada->format('d/m/Y') }}
            </div>

            <div class="info-item">
                <span class="label">Referencia de reparación:</span> <span class="referencia">{{ $densimetro->referencia_reparacion }}</span>
            </div>

            <div class="info-item">
                <span class="label">Número de serie:</span> {{ $densimetro->numero_serie }}
            </div>

            @if($densimetro->marca)
            <div class="info-item">
                <span class="label">Marca:</span> {{ $densimetro->marca }}
            </div>
            @endif

            @if($densimetro->modelo)
            <div class="info-item">
                <span class="label">Modelo:</span> {{ $densimetro->modelo }}
            </div>
            @endif

            <div class="info-item">
                <span class="label">Estado actual:</span> Recibido
            </div>

            <div class="info">
                <strong>Importante:</strong> Guarde la referencia de reparación para consultar el estado de su densímetro en cualquier momento a través de nuestra página web.
            </div>

            <p>Procederemos a revisar su densímetro y le informaremos del diagnóstico y los trabajos a realizar. Si tiene alguna pregunta, no dude en contactarnos.</p>
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
