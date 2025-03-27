<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Cuenta - INDARCA</title>
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
        .code-container {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            text-align: center;
            border: 1px dashed #ccc;
        }
        .code {
            font-family: 'Courier New', monospace;
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            letter-spacing: 4px;
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
        .info {
            background-color: #e9f7fe;
            border-left: 4px solid #007bff;
            padding: 10px;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Verificación de Cuenta - INDARCA</h1>
    </div>

    <div class="content">
        <p>Estimado/a <strong>{{ $name }}</strong>,</p>

        <p>¡Gracias por registrarte en INDARCA! Para completar tu registro y verificar tu cuenta, utiliza el siguiente código:</p>

        <div class="code-container">
            <p class="code">{{ $code }}</p>
        </div>

        <div class="info">
            <p>Este código expirará en 60 minutos. Si no realizas la verificación en este tiempo, deberás solicitar un nuevo código.</p>
        </div>

        <p class="warning">Por tu seguridad, no compartas este código con nadie más.</p>

        <p>Si no has solicitado esta cuenta, puedes ignorar este correo.</p>

        <p>Saludos cordiales,</p>
        <p><strong>Equipo INDARCA</strong></p>
    </div>

    <div class="footer">
        <p>Este es un mensaje automático. Por favor, no responda a este correo.</p>
        <p>© {{ date('Y') }} INDARCA. Todos los derechos reservados.</p>
    </div>
</body>
</html>
