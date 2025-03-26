<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepción de Densímetro - INDARCA</title>
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
        .referencia {
            font-size: 1.2em;
            font-weight: bold;
            color: #dc3545;
            text-align: center;
            padding: 10px;
            margin: 15px 0;
            border: 1px dashed #dc3545;
            background-color: #f8d7da;
            border-radius: 5px;
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
        <h1>INDARCA - Recepción de Densímetro</h1>
    </div>

    <div class="content">
        <p>Estimado/a <strong>{{ $cliente->name }}</strong>,</p>

        <p>Le informamos que hemos recibido su densímetro en nuestro taller para su reparación o mantenimiento. A continuación, encontrará los detalles:</p>

        <div class="info-item">
            <span class="label">Fecha de recepción:</span> {{ $fecha }}
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

        <p>Su densímetro ha sido registrado con la siguiente referencia de reparación:</p>

        <div class="referencia">
            {{ $densimetro->referencia_reparacion }}
        </div>

        <p>Por favor, conserve esta referencia para cualquier consulta relacionada con su densímetro. Nos pondremos en contacto con usted cuando hayamos evaluado el equipo o cuando se complete la reparación.</p>

        <p>Si tiene alguna pregunta, no dude en contactarnos.</p>

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
