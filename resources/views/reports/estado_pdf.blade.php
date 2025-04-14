@extends('reports.pdf_layout')

@section('title', 'INDARCA - Estado de Densímetro')
@section('document_title', 'Estado de Densímetro')
@section('document_date', $date)
@section('reference_number', 'Referencia: ' . $estado['referencia'])

@section('content')
<div class="section">
    <div class="section-title">Información del Densímetro</div>

    <div class="info-grid">
        <div class="info-item">
            <div class="info-label">Número de Serie</div>
            <div class="info-value">{{ $estado['numero_serie'] }}</div>
        </div>

        <div class="info-item">
            <div class="info-label">Fecha de Entrada</div>
            <div class="info-value">{{ $estado['fecha_entrada'] }}</div>
        </div>

        <div class="info-item">
            <div class="info-label">Marca</div>
            <div class="info-value">{{ $estado['marca'] ?: 'No especificada' }}</div>
        </div>

        <div class="info-item">
            <div class="info-label">Modelo</div>
            <div class="info-value">{{ $estado['modelo'] ?: 'No especificado' }}</div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-title">Estado Actual</div>

    <div style="margin-top: 10px; margin-bottom: 20px;">
        <div style="display: flex; justify-content: space-between; position: relative; margin-bottom: 15px;">
            <div style="text-align: center; position: relative; z-index: 2;">
                <div style="width: 20px; height: 20px; border-radius: 50%; margin: 0 auto 5px;
                    background-color: {{ $estado['estado'] == 'Recibido' ? '#3498DB' :
                        (in_array($estado['estado'], ['En reparación', 'Reparación finalizada', 'Entregado al cliente']) ? '#2ECC71' : '#ddd') }};">
                </div>
                <div style="font-size: 11px; {{ $estado['estado'] == 'Recibido' ? 'font-weight: bold; color: #3498DB;' :
                    (in_array($estado['estado'], ['En reparación', 'Reparación finalizada', 'Entregado al cliente']) ? 'color: #2ECC71;' : '') }}">
                    Recibido
                </div>
            </div>

            <div style="text-align: center; position: relative; z-index: 2;">
                <div style="width: 20px; height: 20px; border-radius: 50%; margin: 0 auto 5px;
                    background-color: {{ $estado['estado'] == 'En reparación' ? '#3498DB' :
                        (in_array($estado['estado'], ['Reparación finalizada', 'Entregado al cliente']) ? '#2ECC71' : '#ddd') }};">
                </div>
                <div style="font-size: 11px; {{ $estado['estado'] == 'En reparación' ? 'font-weight: bold; color: #3498DB;' :
                    (in_array($estado['estado'], ['Reparación finalizada', 'Entregado al cliente']) ? 'color: #2ECC71;' : '') }}">
                    En reparación
                </div>
            </div>

            <div style="text-align: center; position: relative; z-index: 2;">
                <div style="width: 20px; height: 20px; border-radius: 50%; margin: 0 auto 5px;
                    background-color: {{ $estado['estado'] == 'Reparación finalizada' ? '#3498DB' :
                        (in_array($estado['estado'], ['Entregado al cliente']) ? '#2ECC71' : '#ddd') }};">
                </div>
                <div style="font-size: 11px; {{ $estado['estado'] == 'Reparación finalizada' ? 'font-weight: bold; color: #3498DB;' :
                    (in_array($estado['estado'], ['Entregado al cliente']) ? 'color: #2ECC71;' : '') }}">
                    Finalizado
                </div>
            </div>

            <div style="text-align: center; position: relative; z-index: 2;">
                <div style="width: 20px; height: 20px; border-radius: 50%; margin: 0 auto 5px;
                    background-color: {{ $estado['estado'] == 'Entregado al cliente' ? '#3498DB' : '#ddd' }};">
                </div>
                <div style="font-size: 11px; {{ $estado['estado'] == 'Entregado al cliente' ? 'font-weight: bold; color: #3498DB;' : '' }}">
                    Entregado
                </div>
            </div>

            <!-- Línea de progreso -->
            <div style="position: absolute; top: 10px; left: 10px; right: 10px; height: 2px; background-color: #ddd; z-index: 1;"></div>
        </div>

        <div style="margin-top: 15px; padding: 10px; background-color: #f8f9fa; border-radius: 4px; text-align: center;">
            <strong>Estado actual:</strong> {{ $estado['estado'] }}
        </div>
    </div>
</div>

@if(isset($estado['calibrado']) && ($estado['estado'] == 'Reparación finalizada' || $estado['estado'] == 'Entregado al cliente'))
<div class="section">
    <div class="section-title">Información de Calibración</div>

    <div style="margin-top: 10px; padding: 15px; background-color: #f8f9fa; border-radius: 4px;">
        <div style="margin-bottom: 10px;">
            <strong>Estado de Calibración:</strong>
            @if($estado['calibrado'] === null)
                <span style="display: inline-block; padding: 3px 8px; background-color: #6c757d; color: white; border-radius: 3px; font-size: 11px;">No especificado</span>
            @elseif($estado['calibrado'])
                <span style="display: inline-block; padding: 3px 8px; background-color: #28a745; color: white; border-radius: 3px; font-size: 11px;">Calibrado</span>
            @else
                <span style="display: inline-block; padding: 3px 8px; background-color: #dc3545; color: white; border-radius: 3px; font-size: 11px;">No calibrado</span>
            @endif
        </div>

        @if(isset($estado['fecha_proxima_calibracion']) && $estado['calibrado'])
        <div style="margin-top: 10px;">
            <strong>Próxima fecha de calibración:</strong> {{ $estado['fecha_proxima_calibracion'] }}
        </div>
        @endif
    </div>
</div>
@endif

<div style="background-color: #f8f9fa; padding: 15px; border-radius: 4px; margin-top: 25px; border: 1px solid #eee;">
    <div style="font-weight: bold; margin-bottom: 15px; color: #2C3E50; border-bottom: 1px solid #eee; padding-bottom: 5px;">
        Datos del Cliente
    </div>
    <div>
        <strong>Nombre:</strong> {{ $estado['cliente'] }}
    </div>
</div>
@endsection

@section('footer_extra')
Documento generado el {{ $date }}
@endsection
