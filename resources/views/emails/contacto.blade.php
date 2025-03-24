<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje de Contacto - INDARCA</title>
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
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .message {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-top: 10px;
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
        <h1>INDARCA - Mensaje de Contacto</h1>
    </div>

    <div class="content">
        <div class="field">
            <span class="label">Nombre:</span>
            <div>{{ $datos['nombre'] }}</div>
        </div>

        <div class="field">
            <span class="label">Correo electrónico:</span>
            <div>{{ $datos['correo'] }}</div>
        </div>

        <div class="field">
            <span class="label">Asunto:</span>
            <div>{{ $datos['asunto'] }}</div>
        </div>

        <div class="field">
            <span class="label">Mensaje:</span>
            <div class="message">{{ $datos['mensaje'] }}</div>
        </div>
    </div>

    <div class="footer">
        <p>Este correo fue enviado desde el formulario de contacto de la página web de INDARCA.</p>
        <p>© {{ date('Y') }} INDARCA. Todos los derechos reservados.</p>
    </div>
</body>
</html>
