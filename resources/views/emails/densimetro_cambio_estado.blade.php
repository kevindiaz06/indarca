<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de Estado de Densímetro - INDARCA</title>
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
            color: #1a5276;
        }
        .estado {
            font-size: 1.2em;
            font-weight: bold;
            text-align: center;
            padding: 15px;
            margin: 25px 0;
            border-radius: 5px;
        }
        .estado-recibido {
            color: #0d6efd;
            background-color: #cfe2ff;
            border: 1px solid #0d6efd;
        }
        .estado-en_reparacion {
            color: #fd7e14;
            background-color: #fff3cd;
            border: 1px solid #fd7e14;
        }
        .estado-finalizado {
            color: #198754;
            background-color: #d1e7dd;
            border: 1px solid #198754;
        }
        .estado-entregado {
            color: #6c757d;
            background-color: #e2e3e5;
            border: 1px solid #6c757d;
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
            <img src="{{ $message->embed(public_path('images/logo.png')) }}" alt="INDARCA Logo" class="logo">
            <h1>Actualización de Estado de Densímetro</h1>
        </div>

        <div class="content">
            <p>Estimado/a <strong>{{ $cliente ? $cliente->name : 'Cliente' }}</strong>,</p>

            <p>Le informamos que el estado de su densímetro ha sido actualizado en nuestro sistema. A continuación, encontrará los detalles:</p>

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
            <div class="info-item" style="margin-top: 15px; text-align: center;">
                <span class="label">Fecha de finalización:</span> {{ $densimetro->fecha_finalizacion->format('d/m/Y') }}
            </div>
            <p>Su densímetro ha sido reparado y está listo para ser recogido. Por favor, contacte con nosotros para coordinar la entrega.</p>
            @endif

            <p>Si tiene alguna pregunta sobre el estado de su densímetro, no dude en contactarnos.</p>

            <div style="text-align: center;">
                <a href="{{ url('/contacto') }}" class="button">Contactar con INDARCA</a>
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
