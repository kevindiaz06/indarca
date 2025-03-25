<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de contacto - INDARCA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            padding: 20px;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 5px 5px;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Confirmación de Recepción</h1>
    </div>

    <div class="content">
        <p>Estimado/a <strong>{{ $nombre }}</strong>,</p>

        <p>Gracias por contactar con INDARCA. Hemos recibido su mensaje correctamente.</p>

        <p>Nos pondremos en contacto con usted a la mayor brevedad posible para atender su consulta.</p>

        <p>Si tiene alguna pregunta adicional, no dude en contactarnos nuevamente.</p>

        <p>Saludos cordiales,</p>
        <p><strong>Equipo INDARCA</strong></p>
    </div>

    <div class="footer">
        <p>Este es un mensaje automático. Por favor, no responda a este correo.</p>
        <p>© {{ date('Y') }} INDARCA. Todos los derechos reservados.</p>
    </div>
</body>
</html>
