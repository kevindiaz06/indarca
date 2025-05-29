<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $asunto }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .logo {
            max-width: 150px;
            height: auto;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 300;
        }
        .content {
            padding: 40px 30px;
        }
        .info-item {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 5px;
            padding: 15px;
            margin: 15px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .label {
            font-weight: 600;
            color: #495057;
        }
        .referencia {
            background: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-weight: bold;
            font-size: 14px;
        }
        .mensaje-personalizado {
            background: #f8f9fa;
            border-left: 4px solid #007bff;
            padding: 20px;
            margin: 25px 0;
            border-radius: 0 5px 5px 0;
        }
        .footer {
            background: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            border-top: 1px solid #e9ecef;
            font-size: 14px;
            color: #6c757d;
        }
        .button {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 500;
            margin: 10px 0;
        }
        .button:hover {
            background: #0056b3;
            color: white;
        }
        .remitente-info {
            background: #e7f3ff;
            border: 1px solid #b3d9ff;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            @if($logoPath)
            <img src="{{ $message->embed($logoPath) }}" alt="INDARCA Logo" class="logo">
            @endif
            <h1>{{ $asunto }}</h1>
        </div>

        <div class="content">
            <p>Estimado/a <strong>{{ $cliente ? $cliente->name : 'Cliente' }}</strong>,</p>

            <div class="mensaje-personalizado">
                {!! nl2br(e($mensaje)) !!}
            </div>

            <h4>Información del Densímetro:</h4>

            <div class="info-item">
                <span class="label">Referencia de reparación:</span>
                <span class="referencia">{{ $densimetro->referencia_reparacion }}</span>
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
                <span class="label">Estado actual:</span>
                @if($densimetro->estado == 'recibido')
                    Recibido
                @elseif($densimetro->estado == 'en_reparacion')
                    En reparación
                @elseif($densimetro->estado == 'finalizado')
                    Finalizado
                @elseif($densimetro->estado == 'entregado')
                    Entregado
                @endif
            </div>

            <div class="info-item">
                <span class="label">Fecha de entrada:</span> {{ $densimetro->fecha_entrada->format('d/m/Y') }}
            </div>

            @if($densimetro->fecha_finalizacion)
            <div class="info-item">
                <span class="label">Fecha de finalización:</span> {{ $densimetro->fecha_finalizacion->format('d/m/Y') }}
            </div>
            @endif

            <div style="text-align: center; margin: 30px 0 20px;">
                <a href="https://indarca.com/login" class="button">Consultar Estado en la Plataforma</a>
            </div>

            @if($remitente)
            <div class="remitente-info">
                <strong>Mensaje enviado por:</strong> {{ $remitente }}<br>
                <strong>Desde:</strong> Panel de Administración INDARCA
            </div>
            @endif
        </div>

        <div class="footer">
            <p><strong>INDARCA</strong> - Instrumentos de Análisis y Reparación de Calibradores</p>
            <p>Este es un correo automático, por favor no responda a esta dirección.</p>
            <p>Si tiene alguna consulta, contacte con nosotros a través de nuestros canales oficiales.</p>
        </div>
    </div>
</body>
</html>
