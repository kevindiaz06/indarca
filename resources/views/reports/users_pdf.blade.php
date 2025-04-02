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
        }
        td {
            border-bottom: 1px solid #ddd;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
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
        @if(isset($filters['role']) && !empty($filters['role']))
            Rol: {{ $filters['role'] === 'admin' ? 'Administrador' : ($filters['role'] === 'trabajador' ? 'Trabajador' : 'Cliente') }}
        @endif
    </div>
    @endif

    <div class="section">
        <div class="section-title">Listado de Usuarios</div>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Fecha Registro</th>
            </tr>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->role === 'admin')
                        Administrador
                    @elseif($user->role === 'trabajador')
                        Trabajador
                    @else
                        Cliente
                    @endif
                </td>
                <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center;">No se encontraron usuarios con los filtros seleccionados</td>
            </tr>
            @endforelse
        </table>

        <div class="subtitle">Total: {{ count($users) }} usuarios</div>
    </div>

    <div class="footer">
        INDARCA © {{ date('Y') }} - Reporte generado automáticamente
    </div>
</body>
</html>
