@extends('reports.pdf_layout')

@section('title', 'INDARCA - Reporte de Empresas')
@section('document_title', 'Reporte de Empresas')
@section('document_date', $date)

@section('content')
@if(isset($filters) && count(array_filter($filters)) > 0)
<div style="background-color: #f8f9fa; padding: 10px; margin-bottom: 20px; font-size: 11px; border: 1px solid #eee; border-radius: 4px;">
    <strong>Filtros aplicados:</strong>
    @if(isset($filters['search']) && !empty($filters['search']))
        Búsqueda: "{{ $filters['search'] }}"
    @endif
</div>
@endif

<div class="section">
    <div class="section-title">Listado de Empresas</div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Fecha Registro</th>
            </tr>
        </thead>
        <tbody>
            @forelse($empresas as $empresa)
            <tr>
                <td>{{ $empresa->id }}</td>
                <td>{{ $empresa->nombre }}</td>
                <td>{{ $empresa->direccion }}</td>
                <td>{{ $empresa->telefono }}</td>
                <td>{{ $empresa->email ?? 'N/A' }}</td>
                <td>{{ $empresa->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 15px;">No se encontraron empresas con los filtros seleccionados</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="background-color: #f8f9fa; padding: 10px; border-radius: 4px; margin-top: 20px; text-align: center;">
    <strong>Total:</strong> {{ count($empresas) }} empresas
</div>
@endsection

@section('footer_extra')
Generado por: {{ Auth::user()->name }}
@endsection
