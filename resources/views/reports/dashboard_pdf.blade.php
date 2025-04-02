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
        .stats-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .stat-card {
            border-left: 4px solid #3498DB;
            background-color: #f8f9fa;
            padding: 10px;
            width: 30%;
            margin-bottom: 10px;
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

    <div class="section">
        <div class="section-title">Resumen Estadístico</div>

        <table>
            <tr>
                <th>Categoría</th>
                <th>Cantidad</th>
            </tr>
            <tr>
                <td>Total Usuarios</td>
                <td>{{ $totalUsuarios }}</td>
            </tr>
            <tr>
                <td>Administradores</td>
                <td>{{ $totalAdmins }}</td>
            </tr>
            <tr>
                <td>Trabajadores</td>
                <td>{{ $totalTrabajadores }}</td>
            </tr>
            <tr>
                <td>Clientes</td>
                <td>{{ $totalClientes }}</td>
            </tr>
            <tr>
                <td>Total Empresas</td>
                <td>{{ $totalEmpresas }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Últimos Usuarios Registrados</div>

        <table>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Fecha Registro</th>
            </tr>
            @foreach($ultimosUsuarios as $usuario)
            <tr>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>
                    @if($usuario->role === 'admin')
                        Administrador
                    @elseif($usuario->role === 'trabajador')
                        Trabajador
                    @else
                        Cliente
                    @endif
                </td>
                <td>{{ $usuario->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="section">
        <div class="section-title">Últimas Empresas Registradas</div>

        <table>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Fecha Registro</th>
            </tr>
            @forelse($ultimasEmpresas as $empresa)
            <tr>
                <td>{{ $empresa->nombre }}</td>
                <td>{{ $empresa->direccion }}</td>
                <td>{{ $empresa->telefono }}</td>
                <td>{{ $empresa->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center;">No hay empresas registradas</td>
            </tr>
            @endforelse
        </table>
    </div>

    <div class="footer">
        INDARCA © {{ date('Y') }} - Reporte generado automáticamente
    </div>
</body>
</html>
