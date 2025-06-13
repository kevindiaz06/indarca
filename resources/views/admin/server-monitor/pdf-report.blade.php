<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Estado del Servidor - INDARCA</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
            background-color: #fff;
        }
        
        .header {
            background-color: #2C3E50;
            color: white;
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .header h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        .header p {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .report-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 25px;
            border-left: 4px solid #3498DB;
        }
        
        .report-info h3 {
            color: #2C3E50;
            margin-bottom: 10px;
            font-size: 16px;
        }
        
        .report-info p {
            margin-bottom: 5px;
        }
        
        .section {
            margin-bottom: 30px;
            page-break-inside: avoid;
        }
        
        .section h2 {
            background-color: #3498DB;
            color: white;
            padding: 10px 15px;
            margin-bottom: 15px;
            font-size: 16px;
            border-radius: 3px;
        }
        
        .section h3 {
            color: #2C3E50;
            margin-bottom: 10px;
            font-size: 14px;
            border-bottom: 2px solid #ecf0f1;
            padding-bottom: 5px;
        }
        
        .info-grid {
            display: table;
            width: 100%;
            margin-bottom: 15px;
        }
        
        .info-row {
            display: table-row;
        }
        
        .info-label {
            display: table-cell;
            font-weight: bold;
            padding: 8px 15px 8px 0;
            width: 40%;
            vertical-align: top;
        }
        
        .info-value {
            display: table-cell;
            padding: 8px 0;
            border-bottom: 1px solid #ecf0f1;
        }
        
        .alert {
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 4px;
            border-left: 4px solid;
        }
        
        .alert-success {
            background-color: #d4edda;
            border-left-color: #28a745;
            color: #155724;
        }
        
        .alert-warning {
            background-color: #fff3cd;
            border-left-color: #ffc107;
            color: #856404;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            border-left-color: #dc3545;
            color: #721c24;
        }
        
        .progress-bar {
            background-color: #ecf0f1;
            height: 10px;
            border-radius: 5px;
            overflow: hidden;
            margin: 5px 0;
        }
        
        .progress-fill {
            height: 100%;
            background-color: #3498DB;
            transition: width 0.3s ease;
        }
        
        .progress-fill.warning {
            background-color: #f39c12;
        }
        
        .progress-fill.danger {
            background-color: #e74c3c;
        }
        
        .stats-grid {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }
        
        .stats-row {
            display: table-row;
        }
        
        .stats-cell {
            display: table-cell;
            width: 25%;
            padding: 15px;
            text-align: center;
            border: 1px solid #ecf0f1;
            background-color: #f8f9fa;
        }
        
        .stats-value {
            font-size: 18px;
            font-weight: bold;
            color: #2C3E50;
            margin-bottom: 5px;
        }
        
        .stats-label {
            font-size: 11px;
            color: #666;
            text-transform: uppercase;
        }
        
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #dee2e6;
        }
        
        .page-break {
            page-break-before: always;
        }
        
        .text-center {
            text-align: center;
        }
        
        .mb-0 {
            margin-bottom: 0 !important;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>INDARCA - Informe de Estado del Servidor</h1>
        <p>Reporte completo del estado y rendimiento del sistema</p>
    </div>

    <!-- Información del Reporte -->
    <div class="report-info">
        <h3>Información del Reporte</h3>
        <p><strong>Generado:</strong> {{ $generatedAt }}</p>
        <p><strong>Generado por:</strong> {{ $generatedBy }}</p>
        <p><strong>Servidor:</strong> {{ $serverInfo['server_name'] ?? 'N/A' }}</p>
    </div>

    <!-- Alertas del Sistema -->
    <div class="section">
        <h2>🚨 Estado de Alertas del Sistema</h2>
        @if(count($alerts) > 0)
            @foreach($alerts as $alert)
                <div class="alert alert-{{ $alert['type'] }}">
                    <strong>{{ $alert['title'] }}:</strong> {{ $alert['message'] }}
                </div>
            @endforeach
        @else
            <div class="alert alert-success">
                <strong>✅ Estado Óptimo:</strong> Todos los sistemas funcionan correctamente
            </div>
        @endif
    </div>

    <!-- Resumen Ejecutivo -->
    <div class="section">
        <h2>📊 Resumen Ejecutivo</h2>
        <div class="stats-grid">
            <div class="stats-row">
                <div class="stats-cell">
                    <div class="stats-value">{{ $systemInfo['operating_system'] }}</div>
                    <div class="stats-label">Sistema Operativo</div>
                </div>
                <div class="stats-cell">
                    <div class="stats-value">{{ $systemInfo['current_memory_usage'] }}</div>
                    <div class="stats-label">Memoria PHP</div>
                </div>
                <div class="stats-cell">
                    <div class="stats-value">
                        @if($systemInfo['load_average']['1min'] !== 'N/A')
                            {{ $systemInfo['load_average']['1min'] }}
                        @else
                            N/A
                        @endif
                    </div>
                    <div class="stats-label">Carga Sistema</div>
                </div>
                <div class="stats-cell">
                    <div class="stats-value">{{ $storageInfo['storage_usage_percentage'] }}%</div>
                    <div class="stats-label">Uso de Disco</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Información del Servidor -->
    <div class="section">
        <h2>🖥️ Información del Servidor</h2>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Versión PHP:</div>
                <div class="info-value">{{ $serverInfo['php_version'] }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Versión Laravel:</div>
                <div class="info-value">{{ $serverInfo['laravel_version'] }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Software del Servidor:</div>
                <div class="info-value">{{ $serverInfo['server_software'] }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Puerto del Servidor:</div>
                <div class="info-value">{{ $serverInfo['server_port'] }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Límite de Memoria:</div>
                <div class="info-value">{{ $serverInfo['memory_limit'] }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tiempo Máximo de Ejecución:</div>
                <div class="info-value">{{ $serverInfo['max_execution_time'] }} segundos</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tamaño Máximo de Upload:</div>
                <div class="info-value">{{ $serverInfo['upload_max_filesize'] }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tamaño Máximo POST:</div>
                <div class="info-value">{{ $serverInfo['post_max_size'] }}</div>
            </div>
        </div>
    </div>

    <!-- Información del Sistema -->
    <div class="section">
        <h2>💻 Información del Sistema</h2>
        
        <h3>Sistema Operativo y Tiempo de Actividad</h3>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Sistema Operativo:</div>
                <div class="info-value">{{ $systemInfo['operating_system'] }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tiempo de Actividad:</div>
                <div class="info-value">{{ $systemInfo['uptime'] }}</div>
            </div>
        </div>

        <h3>Memoria PHP</h3>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Memoria Actual:</div>
                <div class="info-value">{{ $systemInfo['current_memory_usage'] }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Pico de Memoria:</div>
                <div class="info-value">{{ $systemInfo['peak_memory_usage'] }}</div>
            </div>
        </div>

        @if($systemInfo['load_average']['1min'] !== 'N/A')
        <h3>Carga del Sistema</h3>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Carga 1 minuto:</div>
                <div class="info-value">{{ $systemInfo['load_average']['1min'] }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Carga 5 minutos:</div>
                <div class="info-value">{{ $systemInfo['load_average']['5min'] }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Carga 15 minutos:</div>
                <div class="info-value">{{ $systemInfo['load_average']['15min'] }}</div>
            </div>
        </div>
        @endif

        @if($systemInfo['memory_usage']['total'] !== 'N/A')
        <h3>Memoria del Sistema</h3>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Memoria Total:</div>
                <div class="info-value">{{ $systemInfo['memory_usage']['total'] }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Memoria Utilizada:</div>
                <div class="info-value">{{ $systemInfo['memory_usage']['used'] }} ({{ $systemInfo['memory_usage']['usage_percentage'] }}%)</div>
            </div>
            <div class="info-row">
                <div class="info-label">Memoria Disponible:</div>
                <div class="info-value">{{ $systemInfo['memory_usage']['available'] }}</div>
            </div>
        </div>
        <div class="progress-bar">
            <div class="progress-fill {{ $systemInfo['memory_usage']['usage_percentage'] > 85 ? 'danger' : ($systemInfo['memory_usage']['usage_percentage'] > 70 ? 'warning' : '') }}" 
                 style="width: {{ $systemInfo['memory_usage']['usage_percentage'] }}%"></div>
        </div>
        @endif

        @if($systemInfo['disk_usage']['total'] !== 'N/A')
        <h3>Uso de Disco del Sistema</h3>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Espacio Total:</div>
                <div class="info-value">{{ $systemInfo['disk_usage']['total'] }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Espacio Utilizado:</div>
                <div class="info-value">{{ $systemInfo['disk_usage']['used'] }} ({{ $systemInfo['disk_usage']['usage_percentage'] }}%)</div>
            </div>
            <div class="info-row">
                <div class="info-label">Espacio Libre:</div>
                <div class="info-value">{{ $systemInfo['disk_usage']['free'] }}</div>
            </div>
        </div>
        <div class="progress-bar">
            <div class="progress-fill {{ $systemInfo['disk_usage']['usage_percentage'] > 90 ? 'danger' : ($systemInfo['disk_usage']['usage_percentage'] > 80 ? 'warning' : '') }}" 
                 style="width: {{ $systemInfo['disk_usage']['usage_percentage'] }}%"></div>
        </div>
        @endif
    </div>

    <!-- Base de Datos -->
    <div class="section">
        <h2>🗄️ Información de Base de Datos</h2>
        @if($databaseInfo['connected'])
            <div class="alert alert-success mb-0">
                <strong>✅ Estado:</strong> Conexión establecida correctamente
            </div>
            <div class="info-grid">
                <div class="info-row">
                    <div class="info-label">Driver:</div>
                    <div class="info-value">{{ $databaseInfo['driver'] }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Nombre de la Base de Datos:</div>
                    <div class="info-value">{{ $databaseInfo['database_name'] }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Número de Tablas:</div>
                    <div class="info-value">{{ $databaseInfo['table_count'] }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Tamaño de la Base de Datos:</div>
                    <div class="info-value">{{ $databaseInfo['size_mb'] }} MB</div>
                </div>
            </div>
        @else
            <div class="alert alert-danger mb-0">
                <strong>❌ Error de Conexión:</strong> {{ $databaseInfo['error'] ?? 'Error desconocido' }}
            </div>
        @endif
    </div>

    <!-- Almacenamiento -->
    <div class="section">
        <h2>💾 Información de Almacenamiento</h2>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Ruta de Storage:</div>
                <div class="info-value">{{ $storageInfo['storage_path'] }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Espacio Total:</div>
                <div class="info-value">{{ $storageInfo['storage_total_space'] }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Espacio Utilizado:</div>
                <div class="info-value">{{ $storageInfo['storage_used_space'] }} ({{ $storageInfo['storage_usage_percentage'] }}%)</div>
            </div>
            <div class="info-row">
                <div class="info-label">Espacio Libre:</div>
                <div class="info-value">{{ $storageInfo['storage_free_space'] }}</div>
            </div>
        </div>
        <div class="progress-bar">
            <div class="progress-fill {{ $storageInfo['storage_usage_percentage'] > 90 ? 'danger' : ($storageInfo['storage_usage_percentage'] > 80 ? 'warning' : '') }}" 
                 style="width: {{ $storageInfo['storage_usage_percentage'] }}%"></div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Informe generado automáticamente por INDARCA - Sistema de Monitoreo de Servidor | {{ $generatedAt }}</p>
    </div>
</body>
</html> 