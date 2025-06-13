<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h5 class="card-title mb-0">
                    <i class="bi bi-exclamation-triangle me-2"></i>Alertas del Sistema
                </h5>
            </div>
            <div class="card-body">
                <div id="systemAlerts">
                    <!-- Las alertas se generarán dinámicamente aquí -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function checkSystemAlerts(data) {
    const alertsContainer = document.getElementById('systemAlerts');
    const alerts = [];
    
    // Verificar uso de memoria del sistema
    if (data.system.memory_usage.usage_percentage !== 'N/A' && 
        data.system.memory_usage.usage_percentage > 85) {
        alerts.push({
            type: 'danger',
            icon: 'bi-memory',
            title: 'Memoria del Sistema Alta',
            message: `El uso de memoria del sistema está al ${data.system.memory_usage.usage_percentage}%`
        });
    }
    
    // Verificar uso de disco
    if (data.storage.storage_usage_percentage !== 'N/A' && 
        data.storage.storage_usage_percentage > 90) {
        alerts.push({
            type: 'danger',
            icon: 'bi-hdd',
            title: 'Espacio en Disco Bajo',
            message: `El disco está al ${data.storage.storage_usage_percentage}% de su capacidad`
        });
    }
    
    // Verificar conexión a base de datos
    if (!data.database.connected) {
        alerts.push({
            type: 'danger',
            icon: 'bi-database-x',
            title: 'Error de Base de Datos',
            message: 'No se puede conectar a la base de datos'
        });
    }
    
    // Verificar carga del sistema
    if (data.system.load_average['1min'] !== 'N/A' && 
        data.system.load_average['1min'] > 2.0) {
        alerts.push({
            type: 'warning',
            icon: 'bi-speedometer2',
            title: 'Carga del Sistema Alta',
            message: `La carga promedio es ${data.system.load_average['1min']}`
        });
    }
    
    // Mostrar alertas o mensaje de que todo está bien
    if (alerts.length === 0) {
        alertsContainer.innerHTML = `
            <div class="alert alert-success d-flex align-items-center">
                <i class="bi bi-check-circle me-2"></i>
                <div>Todos los sistemas funcionan correctamente</div>
            </div>
        `;
    } else {
        alertsContainer.innerHTML = alerts.map(alert => `
            <div class="alert alert-${alert.type} d-flex align-items-center mb-2">
                <i class="${alert.icon} me-2"></i>
                <div>
                    <strong>${alert.title}:</strong> ${alert.message}
                </div>
            </div>
        `).join('');
    }
}
</script> 