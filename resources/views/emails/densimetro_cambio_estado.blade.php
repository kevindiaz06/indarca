<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de Estado de Densímetro - INDARCA</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 650px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            padding: 10px;
            background-color: #0056b3;
            color: white;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .content {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .info-item {
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
            color: #0056b3;
        }
        .footer {
            font-size: 0.8em;
            text-align: center;
            color: #6c757d;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
        }
        .estado {
            font-size: 1.2em;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            margin: 15px 0;
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
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #0056b3;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
        }
        .button:hover {
            background-color: #003d7e;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>INDARCA - Actualización de Estado</h1>
    </div>

    <div class="content">
        <p>Estimado/a <strong>{{ $cliente->name }}</strong>,</p>

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
        <p>Este es un correo automático, por favor no responda a este mensaje.</p>
        <p>&copy; {{ date('Y') }} INDARCA. Todos los derechos reservados.</p>
    </div>
</body>
</html>
