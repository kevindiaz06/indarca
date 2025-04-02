@extends('reports.pdf_layout')

@section('title', 'INDARCA - Reporte de Densímetros')
@section('document_title', 'Reporte de Densímetros')
@section('document_date', $date)

@section('content')
@if(isset($filters) && count(array_filter($filters)) > 0)
<div style="background-color: #f8f9fa; padding: 10px; margin-bottom: 20px; font-size: 11px; border: 1px solid #eee; border-radius: 4px;">
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

    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 20px;">
        <div style="background-color: #f8f9fa; border-left: 4px solid #3498DB; padding: 12px; border-radius: 4px;">
            <div style="font-size: 10px; color: #7f8c8d; text-transform: uppercase;">Total Densímetros</div>
            <div style="font-size: 24px; font-weight: bold; color: #2C3E50;">{{ $totalDensimetros }}</div>
        </div>

        <div style="background-color: #f8f9fa; border-left: 4px solid #f39c12; padding: 12px; border-radius: 4px;">
            <div style="font-size: 10px; color: #7f8c8d; text-transform: uppercase;">En Reparación</div>
            <div style="font-size: 24px; font-weight: bold; color: #2C3E50;">{{ $totalEnReparacion }}</div>
        </div>

        <div style="background-color: #f8f9fa; border-left: 4px solid #2ECC71; padding: 12px; border-radius: 4px;">
            <div style="font-size: 10px; color: #7f8c8d; text-transform: uppercase;">Finalizados</div>
            <div style="font-size: 24px; font-weight: bold; color: #2C3E50;">{{ $totalFinalizados }}</div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; margin-bottom: 20px;">
        <div style="background-color: #f8f9fa; border-left: 4px solid #6c757d; padding: 12px; border-radius: 4px;">
            <div style="font-size: 10px; color: #7f8c8d; text-transform: uppercase;">Recibidos</div>
            <div style="font-size: 24px; font-weight: bold; color: #2C3E50;">{{ $totalRecibidos }}</div>
        </div>

        <div style="background-color: #f8f9fa; border-left: 4px solid #17a2b8; padding: 12px; border-radius: 4px;">
            <div style="font-size: 10px; color: #7f8c8d; text-transform: uppercase;">Entregados</div>
            <div style="font-size: 24px; font-weight: bold; color: #2C3E50;">{{ $totalEntregados }}</div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-title">Listado de Densímetros</div>

    <table>
        <thead>
            <tr>
                <th>Ref</th>
                <th>Número Serie</th>
                <th>Marca/Modelo</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>F. Entrada</th>
                <th>F. Finalización</th>
            </tr>
        </thead>
        <tbody>
            @forelse($densimetros as $densimetro)
            <tr>
                <td>{{ $densimetro->referencia_reparacion }}</td>
                <td>{{ $densimetro->numero_serie }}</td>
                <td>{{ $densimetro->marca ?? 'No especificada' }} / {{ $densimetro->modelo ?? 'No especificado' }}</td>
                <td>{{ $densimetro->cliente ? $densimetro->cliente->name : 'No asignado' }}</td>
                <td>
                    @if($densimetro->estado === 'recibido')
                        <span class="estado estado-recibido">Recibido</span>
                    @elseif($densimetro->estado === 'en_reparacion')
                        <span class="estado estado-en_reparacion">En reparación</span>
                    @elseif($densimetro->estado === 'finalizado')
                        <span class="estado estado-finalizado">Finalizado</span>
                    @elseif($densimetro->estado === 'entregado')
                        <span class="estado estado-entregado">Entregado</span>
                    @endif
                </td>
                <td>{{ $densimetro->fecha_entrada->format('d/m/Y') }}</td>
                <td>{{ $densimetro->fecha_finalizacion ? $densimetro->fecha_finalizacion->format('d/m/Y') : 'Pendiente' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 15px;">No se encontraron densímetros con los filtros seleccionados</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="background-color: #f8f9fa; padding: 10px; border-radius: 4px; margin-top: 20px; text-align: center;">
    <strong>Total:</strong> {{ count($densimetros) }} densímetros
</div>
@endsection

@section('footer_extra')
Generado por: {{ Auth::user()->name }}
@endsection
