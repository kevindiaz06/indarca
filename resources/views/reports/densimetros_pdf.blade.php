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
        .filter-info {
            background-color: #f8f9fa;
            padding: 8px;
            margin-bottom: 15px;
            font-size: 10px;
            border: 1px solid #ddd;
        }
        .stats-container {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
            gap: 10px;
        }
        .stat-card {
            background-color: #f8f9fa;
            border-left: 4px solid #3498DB;
            padding: 10px;
            margin-bottom: 10px;
            width: 30%;
            box-sizing: border-box;
        }
        .stat-label {
            font-size: 10px;
            color: #7f8c8d;
            margin-bottom: 3px;
        }
        .stat-value {
            font-size: 16px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #ddd;
            padding: 8px;
            text-align: left;
            font-weight: bold;
            font-size: 11px;
        }
        td {
            border-bottom: 1px solid #ddd;
            padding: 8px;
            font-size: 10px;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .status-badge {
            display: inline-block;
            padding: 3px 6px;
            border-radius: 3px;
            color: white;
            font-size: 9px;
            text-align: center;
        }
        .status-recibido {
            background-color: #6c757d;
        }
        .status-en_reparacion {
            background-color: #007bff;
        }
        .status-finalizado {
            background-color: #28a745;
        }
        .status-entregado {
            background-color: #17a2b8;
        }
        .page-number {
            text-align: center;
            color: #7f8c8d;
            font-size: 10px;
            margin-top: 20px;
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
    </style>
</head>
<body>
    <div class="logo">
        <b>INDARCA</b> - Panel de Administración
    </div>

    <h1>{{ $title }}</h1>
    <div class="subtitle">Generado el {{ $date }}</div>

    @if(isset($filters) && count(array_filter($filters)) > 0)
    <div class="filter-info">
        <strong>Filtros aplicados:</strong>
        @if(isset($filters['search']) && !empty($filters['search']))
            Búsqueda: "{{ $filters['search'] }}"
        @endif
        @if(isset($filters['estado']) && !empty($filters['estado']))
            Estado: {{ $filters['estado'] === 'recibido' ? 'Recibido' : ($filters['estado'] === 'en_reparacion' ? 'En reparación' : ($filters['estado'] === 'finalizado' ? 'Finalizado' : 'Entregado')) }}
        @endif
        @if(isset($filters['cliente_id']) && !empty($filters['cliente_id']))
            Cliente ID: {{ $filters['cliente_id'] }}
        @endif
    </div>
    @endif

    <div class="section">
        <div class="section-title">Resumen de Densímetros</div>

        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-label">Total Densímetros</div>
                <div class="stat-value">{{ $totalDensimetros }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Recibidos</div>
                <div class="stat-value">{{ $totalRecibidos }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">En Reparación</div>
                <div class="stat-value">{{ $totalEnReparacion }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Finalizados</div>
                <div class="stat-value">{{ $totalFinalizados }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Entregados</div>
                <div class="stat-value">{{ $totalEntregados }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Listado de Densímetros</div>

        <table>
            <tr>
                <th>Ref</th>
                <th>Número Serie</th>
                <th>Marca/Modelo</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>F. Entrada</th>
                <th>F. Finalización</th>
            </tr>
            @forelse($densimetros as $densimetro)
            <tr>
                <td>{{ $densimetro->referencia_reparacion }}</td>
                <td>{{ $densimetro->numero_serie }}</td>
                <td>{{ $densimetro->marca ?? 'No especificada' }} / {{ $densimetro->modelo ?? 'No especificado' }}</td>
                <td>{{ $densimetro->cliente ? $densimetro->cliente->name : 'No asignado' }}</td>
                <td>
                    @if($densimetro->estado === 'recibido')
                        <span class="status-badge status-recibido">Recibido</span>
                    @elseif($densimetro->estado === 'en_reparacion')
                        <span class="status-badge status-en_reparacion">En reparación</span>
                    @elseif($densimetro->estado === 'finalizado')
                        <span class="status-badge status-finalizado">Finalizado</span>
                    @elseif($densimetro->estado === 'entregado')
                        <span class="status-badge status-entregado">Entregado</span>
                    @endif
                </td>
                <td>{{ $densimetro->fecha_entrada->format('d/m/Y') }}</td>
                <td>{{ $densimetro->fecha_finalizacion ? $densimetro->fecha_finalizacion->format('d/m/Y') : 'Pendiente' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center;">No se encontraron densímetros con los filtros seleccionados</td>
            </tr>
            @endforelse
        </table>

        <div class="subtitle">Total: {{ count($densimetros) }} densímetros</div>
    </div>

    <div class="footer">
        INDARCA © {{ date('Y') }} - Reporte generado automáticamente
    </div>
</body>
</html>
