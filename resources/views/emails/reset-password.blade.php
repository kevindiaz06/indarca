<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva contraseña - INDARCA</title>
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
        .password-container {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            text-align: center;
            border: 1px dashed #ccc;
        }
        .password {
            font-family: 'Courier New', monospace;
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
            letter-spacing: 1px;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
        .warning {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Nueva Contraseña - INDARCA</h1>
    </div>

    <div class="content">
        <p>Estimado/a <strong>{{ $nombre }}</strong>,</p>

        <p>Hemos recibido una solicitud para restablecer la contraseña de su cuenta. Hemos generado una nueva contraseña temporal para usted:</p>

        <div class="password-container">
            <p class="password">{{ $password }}</p>
        </div>

        <p class="warning">Por seguridad, le recomendamos cambiar esta contraseña una vez que acceda a su cuenta.</p>

        <p>Si usted no ha solicitado este restablecimiento de contraseña, por favor póngase en contacto con nosotros inmediatamente.</p>

        <p>Saludos cordiales,</p>
        <p><strong>Equipo INDARCA</strong></p>
    </div>

    <div class="footer">
        <p>Este es un mensaje automático. Por favor, no responda a este correo.</p>
        <p>© {{ date('Y') }} INDARCA. Todos los derechos reservados.</p>
    </div>
</body>
</html>
