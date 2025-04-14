<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recordatorio de Calibración de Densímetro - INDARCA</title>
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
            background-color: #f8f9fa;
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
        .fecha-destacada {
            font-size: 1.2em;
            font-weight: bold;
            text-align: center;
            padding: 15px;
            margin: 25px 0;
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #dc3545;
            border-radius: 5px;
        }
        .alerta {
            margin-top: 25px;
            padding: 15px;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
        }
        .alerta-amarilla {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }
        .alerta-roja {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .alerta-verde {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- Logo de la empresa -->
            <img src="{{ $message->embed(public_path('images/logo.png')) }}" alt="INDARCA Logo" class="logo">
            <h1>Recordatorio de Calibración</h1>
        </div>

        <div class="content">
            <p>Estimado/a <strong>{{ $cliente->name }}</strong>,</p>

            <p>Le informamos que su densímetro con número de serie <strong>{{ $densimetro->numero_serie }}</strong> requiere atención respecto a su calibración.</p>

            <div class="info-item">
                <span class="label">Referencia:</span> {{ $densimetro->referencia_reparacion }}
            </div>

            <div class="info-item">
                <span class="label">Marca:</span> {{ $densimetro->marca ?: 'No especificada' }}
            </div>

            <div class="info-item">
                <span class="label">Modelo:</span> {{ $densimetro->modelo ?: 'No especificado' }}
            </div>

            <div class="info-item">
                <span class="label">Última calibración:</span> {{ $densimetro->fecha_finalizacion ? $densimetro->fecha_finalizacion->format('d/m/Y') : 'No disponible' }}
            </div>

            <div class="info-item">
                <span class="label">Próxima calibración programada:</span>
            </div>

            <div class="fecha-destacada">
                {{ $densimetro->fecha_proxima_calibracion->format('d/m/Y') }}
            </div>

            @php
                $diasRestantes = now()->diffInDays($densimetro->fecha_proxima_calibracion, false);
            @endphp

            @if($diasRestantes < 0)
                <div class="alerta alerta-roja">
                    ⚠️ La calibración de su densímetro ha vencido hace {{ abs($diasRestantes) }} días
                </div>
                <p>Es importante realizar la calibración lo antes posible para asegurar el correcto funcionamiento de su equipo.</p>
            @elseif($diasRestantes <= 15)
                <div class="alerta alerta-amarilla">
                    ⚠️ Faltan solo {{ $diasRestantes }} días para la fecha de calibración programada
                </div>
                <p>Le recomendamos programar la calibración de su densímetro a la brevedad para evitar interrupciones en su uso.</p>
            @else
                <div class="alerta alerta-verde">
                    ✅ Faltan {{ $diasRestantes }} días para la fecha de calibración programada
                </div>
                <p>Le recordamos que es importante mantener su equipo calibrado según el calendario establecido para asegurar mediciones precisas.</p>
            @endif

            <div class="info">
                <strong>Recuerde:</strong> Mantener su densímetro correctamente calibrado es esencial para garantizar la precisión de las mediciones y cumplir con los estándares de calidad y normativas vigentes.
            </div>

            <p>Si desea programar una cita para la calibración de su densímetro o tiene alguna pregunta, no dude en contactarnos.</p>

            <div style="text-align: center;">
                <a href="{{ url('/contacto') }}" class="button">Programar Calibración</a>
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
