@extends('reports.pdf_layout')

@section('title', 'INDARCA - Reporte de Usuarios')
@section('document_title', 'Reporte de Usuarios')
@section('document_date', $date)

@section('content')
@if(isset($filters) && count(array_filter($filters)) > 0)
<div style="background-color: #f8f9fa; padding: 10px; margin-bottom: 20px; font-size: 11px; border: 1px solid #eee; border-radius: 4px;">
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
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Fecha Registro</th>
            </tr>
        </thead>
        <tbody>
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
                <td colspan="5" style="text-align: center; padding: 15px;">No se encontraron usuarios con los filtros seleccionados</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="background-color: #f8f9fa; padding: 10px; border-radius: 4px; margin-top: 20px; text-align: center;">
    <strong>Total:</strong> {{ count($users) }} usuarios
</div>
@endsection

@section('footer_extra')
Generado por: {{ Auth::user()->name }}
@endsection
