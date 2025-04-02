@extends('reports.pdf_layout')

@section('title', 'INDARCA - Reporte del Dashboard')
@section('document_title', 'Reporte del Dashboard')
@section('document_date', $date)

@section('content')
<div class="section">
    <div class="section-title">Resumen Estadístico</div>

    <div style="margin-bottom: 20px;">
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px;">
            <div style="background-color: #f8f9fa; border-left: 4px solid #3498DB; padding: 12px; border-radius: 4px;">
                <div style="font-size: 10px; color: #7f8c8d; text-transform: uppercase;">Total Usuarios</div>
                <div style="font-size: 24px; font-weight: bold; color: #2C3E50;">{{ $totalUsuarios }}</div>
            </div>

            <div style="background-color: #f8f9fa; border-left: 4px solid #2ECC71; padding: 12px; border-radius: 4px;">
                <div style="font-size: 10px; color: #7f8c8d; text-transform: uppercase;">Total Empresas</div>
                <div style="font-size: 24px; font-weight: bold; color: #2C3E50;">{{ $totalEmpresas }}</div>
            </div>

            <div style="background-color: #f8f9fa; border-left: 4px solid #E74C3C; padding: 12px; border-radius: 4px;">
                <div style="font-size: 10px; color: #7f8c8d; text-transform: uppercase;">Clientes</div>
                <div style="font-size: 24px; font-weight: bold; color: #2C3E50;">{{ $totalClientes }}</div>
            </div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Categoría</th>
                <th>Cantidad</th>
                <th>Porcentaje</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Total Usuarios</td>
                <td>{{ $totalUsuarios }}</td>
                <td>100%</td>
            </tr>
            <tr>
                <td>Administradores</td>
                <td>{{ $totalAdmins }}</td>
                <td>{{ $totalUsuarios > 0 ? number_format(($totalAdmins / $totalUsuarios) * 100, 1) : 0 }}%</td>
            </tr>
            <tr>
                <td>Trabajadores</td>
                <td>{{ $totalTrabajadores }}</td>
                <td>{{ $totalUsuarios > 0 ? number_format(($totalTrabajadores / $totalUsuarios) * 100, 1) : 0 }}%</td>
            </tr>
            <tr>
                <td>Clientes</td>
                <td>{{ $totalClientes }}</td>
                <td>{{ $totalUsuarios > 0 ? number_format(($totalClientes / $totalUsuarios) * 100, 1) : 0 }}%</td>
            </tr>
            <tr>
                <td>Total Empresas</td>
                <td>{{ $totalEmpresas }}</td>
                <td>-</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="section">
    <div class="section-title">Últimos Usuarios Registrados</div>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Fecha Registro</th>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>
</div>

<div class="section">
    <div class="section-title">Últimas Empresas Registradas</div>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Fecha Registro</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ultimasEmpresas as $empresa)
            <tr>
                <td>{{ $empresa->nombre }}</td>
                <td>{{ $empresa->direccion }}</td>
                <td>{{ $empresa->telefono }}</td>
                <td>{{ $empresa->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center; padding: 15px;">No hay empresas registradas</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@section('footer_extra')
Generado por: {{ Auth::user()->name }}
@endsection
