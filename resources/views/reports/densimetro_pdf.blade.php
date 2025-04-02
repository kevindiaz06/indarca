<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 12px;
        }
        h1 {
            text-align: center;
            color: #2C3E50;
            font-size: 20px;
            margin-bottom: 5px;
        }
        .subtitle {
            text-align: center;
            color: #7f8c8d;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 30px;
        }
        .section-title {
            background-color: #f8f9fa;
            padding: 8px;
            border-left: 4px solid #3498DB;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }
        .info-item {
            margin-bottom: 15px;
        }
        .info-label {
            font-size: 10px;
            color: #7f8c8d;
            margin-bottom: 3px;
        }
        .info-value {
            font-size: 14px;
            font-weight: bold;
        }
        .estado {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            color: white;
            background-color: #6c757d;
        }
        .estado-recibido {
            background-color: #6c757d;
        }
        .estado-en_reparacion {
            background-color: #007bff;
        }
        .estado-finalizado {
            background-color: #28a745;
        }
        .estado-entregado {
            background-color: #17a2b8;
        }
        .observaciones {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
            margin-top: 5px;
        }
        .cliente-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
            margin-top: 20px;
        }
        .cliente-titulo {
            font-weight: bold;
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #7f8c8d;
            border-top: 1px solid #ddd;
            padding-top: 5px;
        }
        .archivos-titulo {
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        .archivos-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 10px;
        }

        .archivo-item {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .archivo-imagen {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto 10px auto;
            max-height: 150px;
        }

        .archivo-info {
            font-size: 10px;
            color: #7f8c8d;
            text-align: center;
        }

        .sin-archivos {
            font-style: italic;
            color: #7f8c8d;
            text-align: center;
            padding: 10px;
            border: 1px dashed #ddd;
            border-radius: 4px;
        }

        .archivo-icon {
            display: block;
            margin: 0 auto;
            font-size: 40px;
            text-align: center;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="logo">
        <b>INDARCA</b> - Gestión de Densímetros
    </div>

    <h1>{{ $title }}</h1>
    <div class="subtitle">Generado el {{ $date }}</div>

    <div class="section">
        <div class="section-title">Información del Densímetro</div>
        <div style="text-align: right; margin-bottom: 10px;">
            <span style="font-weight: bold;">Referencia:</span> {{ $densimetro->referencia_reparacion }}
        </div>

        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Número de Serie</div>
                <div class="info-value">{{ $densimetro->numero_serie }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">Fecha de Entrada</div>
                <div class="info-value">{{ $densimetro->fecha_entrada->format('d/m/Y') }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">Marca</div>
                <div class="info-value">{{ $densimetro->marca ?: 'No especificada' }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">Modelo</div>
                <div class="info-value">{{ $densimetro->modelo ?: 'No especificado' }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">Estado Actual</div>
                <div class="info-value">
                    @if($densimetro->estado == 'recibido')
                        <span class="estado estado-recibido">Recibido</span>
                    @elseif($densimetro->estado == 'en_reparacion')
                        <span class="estado estado-en_reparacion">En reparación</span>
                    @elseif($densimetro->estado == 'finalizado')
                        <span class="estado estado-finalizado">Finalizado</span>
                    @elseif($densimetro->estado == 'entregado')
                        <span class="estado estado-entregado">Entregado</span>
                    @endif
                </div>
            </div>

            <div class="info-item">
                <div class="info-label">Fecha de Registro</div>
                <div class="info-value">{{ $densimetro->created_at->format('d/m/Y H:i') }}</div>
            </div>

            @if(($densimetro->estado == 'finalizado' || $densimetro->estado == 'entregado') && $densimetro->fecha_finalizacion)
            <div class="info-item">
                <div class="info-label">Fecha de Finalización</div>
                <div class="info-value">{{ $densimetro->fecha_finalizacion->format('d/m/Y') }}</div>
            </div>
            @endif
        </div>

        <div class="info-item" style="margin-top: 20px;">
            <div class="info-label">Observaciones</div>
            <div class="observaciones">
                {{ $densimetro->observaciones ?: 'Sin observaciones' }}
            </div>
        </div>

        <!-- Archivos adjuntos -->
        <div class="archivos-titulo">Archivos Adjuntos</div>

        @if($densimetro->archivos->isEmpty())
            <div class="sin-archivos">No hay archivos adjuntos para este densímetro</div>
        @else
            @php
                $imagenes = $densimetro->archivos->filter(function($archivo) {
                    return $archivo->tipo_archivo == 'imagen';
                });

                $documentos = $densimetro->archivos->filter(function($archivo) {
                    return $archivo->tipo_archivo != 'imagen';
                });
            @endphp

            <!-- Imágenes -->
            @if($imagenes->count() > 0)
                <div class="archivos-container">
                    @foreach($imagenes as $imagen)
                        <div class="archivo-item">
                            <img class="archivo-imagen" src="{{ public_path('storage/' . $imagen->ruta_archivo) }}" alt="{{ $imagen->nombre_archivo }}">
                            <div class="archivo-info">
                                {{ $imagen->nombre_archivo }} ({{ strtoupper($imagen->extension) }})
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Documentos -->
            @if($documentos->count() > 0)
                <div style="margin-top: 10px;">
                    <div class="info-label">Otros archivos adjuntos:</div>
                    <ul>
                        @foreach($documentos as $documento)
                            <li>{{ $documento->nombre_archivo }} ({{ strtoupper($documento->extension) }} - {{ number_format($documento->tamano / 1024, 2) }} KB)</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endif
    </div>

    <div class="cliente-info">
        <div class="cliente-titulo">Datos del Cliente</div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Nombre</div>
                <div class="info-value">{{ $densimetro->cliente ? $densimetro->cliente->name : 'Cliente no disponible' }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">Email</div>
                <div class="info-value">{{ $densimetro->cliente ? $densimetro->cliente->email : 'Email no disponible' }}</div>
            </div>
        </div>
    </div>

    <div class="footer">
        INDARCA © {{ date('Y') }} - Ficha de densímetro generada automáticamente
    </div>
</body>
</html>
