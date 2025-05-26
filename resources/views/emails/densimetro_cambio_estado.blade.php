<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de Estado de Densímetro - INDARCA</title>
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
        .button {
            display: inline-block;
            padding: 14px 30px;
            background: linear-gradient(to right, #F40006, #d10005);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            margin-top: 25px;
            transition: all 0.3s ease;
            text-align: center;
            box-shadow: 0 4px 10px rgba(244, 0, 6, 0.2);
        }
        .button:hover {
            background: linear-gradient(to right, #d10005, #b80005);
            box-shadow: 0 6px 12px rgba(244, 0, 6, 0.3);
            transform: translateY(-2px);
        }
        .info {
            background-color: #fff8f8;
            border-left: 4px solid #F40006;
            border-radius: 0 6px 6px 0;
            padding: 20px;
            margin: 28px 0;
            font-size: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
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
        .info-item {
            margin-bottom: 14px;
            background-color: #fafafa;
            border-radius: 6px;
            padding: 10px 15px;
            border: 1px solid #eee;
        }
        .label {
            font-weight: 600;
            color: #F40006;
        }
        .estado {
            font-size: 1.3em;
            font-weight: bold;
            text-align: center;
            padding: 20px;
            margin: 28px 0;
            border-radius: 6px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
            letter-spacing: 0.5px;
        }
        .estado-recibido {
            color: #0d6efd;
            background: linear-gradient(to right, #cfe2ff, #e6efff);
            border: 1px solid rgba(13, 110, 253, 0.2);
        }
        .estado-en_reparacion {
            color: #fd7e14;
            background: linear-gradient(to right, #fff3cd, #fff9e6);
            border: 1px solid rgba(253, 126, 20, 0.2);
        }
        .estado-finalizado {
            color: #198754;
            background: linear-gradient(to right, #d1e7dd, #e8f5f0);
            border: 1px solid rgba(25, 135, 84, 0.2);
        }
        .estado-entregado {
            color: #6c757d;
            background: linear-gradient(to right, #e2e3e5, #f0f0f2);
            border: 1px solid rgba(108, 117, 125, 0.2);
        }
        .referencia {
            font-weight: 600;
            color: #F40006;
            background-color: #fff8f8;
            padding: 3px 8px;
            border-radius: 4px;
        }
        .section-title {
            font-size: 18px;
            margin-bottom: 20px;
            color: #333;
            border-bottom: 2px solid #f3f3f3;
            padding-bottom: 8px;
            font-weight: 600;
        }
        .highlight-box {
            background-color: #fafafa;
            border-radius: 6px;
            padding: 15px;
            margin: 20px 0;
            border: 1px solid #eee;
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
        .details-box {
            background: #f9f9f9;
            border-radius: 6px;
            padding: 20px;
            margin: 25px 0;
            border: 1px solid #eee;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Logo de la empresa -->
            <img src="{{ $message->embed($logoPath) }}" alt="INDARCA Logo" class="logo">
            <h1>Actualización de Estado de Densímetro</h1>
        </div>

        <div class="content">
            <p>Estimado/a <strong>{{ $cliente ? $cliente->name : 'Cliente' }}</strong>,</p>

            <p>Le informamos que el estado de su densímetro ha sido actualizado en nuestro sistema. A continuación, encontrará los detalles:</p>

            <div class="details-box">
                <div class="section-title">Información del equipo</div>
                <div class="info-item">
                    <span class="label">Fecha de actualización:</span> {{ $fecha }}
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
            </div>

            <p>El estado de su densímetro ha cambiado a:</p>

            <div class="estado estado-{{ $densimetro->estado }}">
                @switch($densimetro->estado)
                    @case('recibido')
                        RECIBIDO EN TALLER
                        @break
                    @case('en_reparacion')
                        EN PROCESO DE REPARACIÓN
                        @break
                    @case('finalizado')
                        REPARACIÓN FINALIZADA
                        @break
                    @case('entregado')
                        ENTREGADO AL CLIENTE
                        @break
                    @default
                        {{ strtoupper($densimetro->estado) }}
                @endswitch
            </div>

            @if($densimetro->estado == 'finalizado')
            <div class="highlight-box">
                <div class="info-item" style="margin: 0; border: none; background: transparent; padding: 0;">
                    <span class="label">Fecha de finalización:</span> {{ $densimetro->fecha_finalizacion->format('d/m/Y') }}
                </div>
                <p style="margin-bottom: 0;">Su densímetro ha sido reparado y está listo para ser recogido. Por favor, contacte con nosotros para coordinar la entrega.</p>
            </div>
            @endif

            <p>Si tiene alguna pregunta sobre el estado de su densímetro, no dude en contactarnos.</p>

            <div style="text-align: center; margin: 30px 0 20px;">
                <a href="https://indarca.com/login" class="button">Ver detalles en la plataforma</a>
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
