@extends('admin.layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Monitor de Servidor</h1>
        <p class="mb-0 text-muted">Información en tiempo real del estado del servidor</p>
    </div>
    <div>
        <a href="{{ route('admin.server-monitor.download-report') }}" class="btn btn-success me-2">
            <i class="bi bi-file-earmark-pdf me-2"></i>
            Descargar Informe PDF
        </a>
        <button class="btn btn-primary" onclick="refreshData()">
            <i class="bi bi-arrow-clockwise me-2" id="refreshIcon"></i>
            Actualizar
        </button>
        <div class="form-check form-switch d-inline-block ms-3">
            <input class="form-check-input" type="checkbox" id="autoRefresh">
            <label class="form-check-label" for="autoRefresh">
                Auto-actualizar (30s)
            </label>
        </div>
    </div>
</div>

<!-- Alertas del Sistema -->
@include('admin.server-monitor.alerts')

<!-- Información del Servidor -->
<div class="row mb-4">
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">
                    <i class="bi bi-server me-2"></i>Información del Servidor
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>PHP:</strong> {{ $serverInfo['php_version'] }}</p>
                        <p><strong>Laravel:</strong> {{ $serverInfo['laravel_version'] }}</p>
                        <p><strong>Servidor:</strong> {{ $serverInfo['server_software'] }}</p>
                        <p><strong>Puerto:</strong> {{ $serverInfo['server_port'] }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Límite de memoria:</strong> {{ $serverInfo['memory_limit'] }}</p>
                        <p><strong>Tiempo ejecución:</strong> {{ $serverInfo['max_execution_time'] }}s</p>
                        <p><strong>Max upload:</strong> {{ $serverInfo['upload_max_filesize'] }}</p>
                        <p><strong>Post max:</strong> {{ $serverInfo['post_max_size'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-header bg-success text-white">
                <h5 class="card-title mb-0">
                    <i class="bi bi-database me-2"></i>Base de Datos
                </h5>
            </div>
            <div class="card-body">
                @if($databaseInfo['connected'])
                    <div class="alert alert-success d-flex align-items-center mb-3">
                        <i class="bi bi-check-circle me-2"></i>
                        <div>Conexión establecida</div>
                    </div>
                    <p><strong>Driver:</strong> {{ $databaseInfo['driver'] }}</p>
                    <p><strong>Base de datos:</strong> {{ $databaseInfo['database_name'] }}</p>
                    <p><strong>Tablas:</strong> {{ $databaseInfo['table_count'] }}</p>
                    <p><strong>Tamaño:</strong> {{ $databaseInfo['size_mb'] }} MB</p>
                @else
                    <div class="alert alert-danger d-flex align-items-center">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <div>
                            <strong>Error de conexión:</strong><br>
                            <small>{{ $databaseInfo['error'] ?? 'Error desconocido' }}</small>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Información del Sistema -->
<div class="row mb-4">
    <div class="col-lg-3">
        <div class="card stats-card primary">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon primary me-3">
                        <i class="bi bi-cpu"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0">Sistema Operativo</h6>
                        <h4 class="mb-0">{{ $systemInfo['operating_system'] }}</h4>
                        <small class="text-muted">Tiempo activo: {{ $systemInfo['uptime'] }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card stats-card success">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon success me-3">
                        <i class="bi bi-memory"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0">Memoria PHP</h6>
                        <h5 class="mb-0">{{ $systemInfo['current_memory_usage'] }}</h5>
                        <small class="text-muted">Pico: {{ $systemInfo['peak_memory_usage'] }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card stats-card warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon warning me-3">
                        <i class="bi bi-speedometer2"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0">Carga del Sistema</h6>
                        @if($systemInfo['load_average']['1min'] !== 'N/A')
                            <h5 class="mb-0">{{ $systemInfo['load_average']['1min'] }}</h5>
                            <small class="text-muted">1min / 5min / 15min<br>{{ $systemInfo['load_average']['1min'] }} / {{ $systemInfo['load_average']['5min'] }} / {{ $systemInfo['load_average']['15min'] }}</small>
                        @else
                            <h5 class="mb-0">N/A</h5>
                            <small class="text-muted">No disponible</small>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card stats-card danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon danger me-3">
                        <i class="bi bi-hdd"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0">Almacenamiento</h6>
                        @if($storageInfo['storage_usage_percentage'] !== 'N/A')
                            <h5 class="mb-0">{{ $storageInfo['storage_usage_percentage'] }}%</h5>
                            <small class="text-muted">{{ $storageInfo['storage_used_space'] }} / {{ $storageInfo['storage_total_space'] }}</small>
                        @else
                            <h5 class="mb-0">N/A</h5>
                            <small class="text-muted">No disponible</small>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Uso de Memoria y Disco del Sistema -->
<div class="row mb-4">
    @if($systemInfo['memory_usage']['total'] !== 'N/A')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="bi bi-memory me-2"></i>Uso de Memoria del Sistema
                </h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span>Memoria utilizada</span>
                    <span>{{ $systemInfo['memory_usage']['used'] }} / {{ $systemInfo['memory_usage']['total'] }}</span>
                </div>
                <div class="progress mb-3" style="height: 10px;">
                    <div class="progress-bar bg-info" role="progressbar" 
                         style="width: {{ $systemInfo['memory_usage']['usage_percentage'] }}%"
                         aria-valuenow="{{ $systemInfo['memory_usage']['usage_percentage'] }}" 
                         aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
                <small class="text-muted">
                    {{ $systemInfo['memory_usage']['usage_percentage'] }}% utilizado
                    ({{ $systemInfo['memory_usage']['available'] }} disponible)
                </small>
            </div>
        </div>
    </div>
    @endif

    @if($systemInfo['disk_usage']['total'] !== 'N/A')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="bi bi-hdd-rack me-2"></i>Uso de Disco del Sistema
                </h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span>Espacio utilizado</span>
                    <span>{{ $systemInfo['disk_usage']['used'] }} / {{ $systemInfo['disk_usage']['total'] }}</span>
                </div>
                <div class="progress mb-3" style="height: 10px;">
                    <div class="progress-bar bg-warning" role="progressbar" 
                         style="width: {{ $systemInfo['disk_usage']['usage_percentage'] }}%"
                         aria-valuenow="{{ $systemInfo['disk_usage']['usage_percentage'] }}" 
                         aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
                <small class="text-muted">
                    {{ $systemInfo['disk_usage']['usage_percentage'] }}% utilizado
                    ({{ $systemInfo['disk_usage']['free'] }} libre)
                </small>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Última actualización -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center">
                <small class="text-muted">
                    <i class="bi bi-clock me-1"></i>
                    Última actualización: <span id="lastUpdate">{{ now()->format('d/m/Y H:i:s') }}</span>
                </small>
            </div>
        </div>
    </div>
</div>

<script>
let autoRefreshInterval;

function refreshData() {
    const refreshIcon = document.getElementById('refreshIcon');
    refreshIcon.classList.add('fa-spin');
    
    fetch('{{ route("admin.server-monitor.data") }}')
        .then(response => response.json())
        .then(data => {
            updateUI(data);
            document.getElementById('lastUpdate').textContent = new Date().toLocaleString('es-ES');
        })
        .catch(error => {
            console.error('Error al actualizar datos:', error);
            // Mostrar notificación de error
        })
        .finally(() => {
            refreshIcon.classList.remove('fa-spin');
        });
}

function updateUI(data) {
    // Actualizar información del servidor
    // Esta función se puede expandir para actualizar dinámicamente los elementos de la UI
    console.log('Datos actualizados:', data);
    
    // Actualizar alertas del sistema
    if (typeof checkSystemAlerts === 'function') {
        checkSystemAlerts(data);
    }
}

// Auto-refresh toggle
document.getElementById('autoRefresh').addEventListener('change', function() {
    if (this.checked) {
        autoRefreshInterval = setInterval(refreshData, 30000); // 30 segundos
    } else {
        clearInterval(autoRefreshInterval);
    }
});

// Limpiar interval al salir de la página
window.addEventListener('beforeunload', function() {
    if (autoRefreshInterval) {
        clearInterval(autoRefreshInterval);
    }
});

// Inicializar alertas al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    // Simular datos iniciales para las alertas
    const initialData = {
        system: {
            memory_usage: {
                usage_percentage: {{ $systemInfo['memory_usage']['usage_percentage'] ?? 'null' }}
            },
            load_average: {
                '1min': {{ is_numeric($systemInfo['load_average']['1min'] ?? 'N/A') ? $systemInfo['load_average']['1min'] : 'null' }}
            }
        },
        storage: {
            storage_usage_percentage: {{ $storageInfo['storage_usage_percentage'] ?? 'null' }}
        },
        database: {
            connected: {{ $databaseInfo['connected'] ? 'true' : 'false' }}
        }
    };
    
    if (typeof checkSystemAlerts === 'function') {
        checkSystemAlerts(initialData);
    }
});
</script>

<style>
.progress {
    border-radius: 0.5rem;
}

.stats-card .card-body {
    padding: 1.5rem;
}

.card:hover {
    transform: translateY(-2px);
    transition: all 0.3s ease;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

.fa-spin {
    animation: fa-spin 1s infinite linear;
}

@keyframes fa-spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
@endsection 