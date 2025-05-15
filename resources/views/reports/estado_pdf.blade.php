@extends('reports.pdf_layout')

@section('title', 'INDARCA - ' . __('estado.densimeter_status'))
@section('document_title', __('estado.densimeter_status'))
@section('document_date', $date)
@section('reference_number', __('estado.reference') . ': ' . $estado['referencia'])

@section('content')
<div class="section">
    <div class="section-title">{{ __('estado.densimeter_info') }}</div>

    <div class="info-grid">
        <div class="info-item">
            <div class="info-label">{{ __('estado.serial_number') }}</div>
            <div class="info-value">{{ $estado['numero_serie'] }}</div>
        </div>

        <div class="info-item">
            <div class="info-label">{{ __('estado.entry_date') }}</div>
            <div class="info-value">{{ $estado['fecha_entrada'] }}</div>
        </div>

        <div class="info-item">
            <div class="info-label">{{ __('estado.brand') }}</div>
            <div class="info-value">{{ $estado['marca'] ?: __('estado.not_specified') }}</div>
        </div>

        <div class="info-item">
            <div class="info-label">{{ __('estado.model') }}</div>
            <div class="info-value">{{ $estado['modelo'] ?: __('estado.not_specified') }}</div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-title">{{ __('estado.current_status') }}</div>

    <div style="margin-top: 10px; margin-bottom: 20px;">
        <div style="display: flex; justify-content: space-between; position: relative; margin-bottom: 15px;">
            <div style="text-align: center; position: relative; z-index: 2;">
                <div style="width: 20px; height: 20px; border-radius: 50%; margin: 0 auto 5px;
                    background-color: {{ $estado['estado'] == __('estado.status_received') ? '#3498DB' :
                        (in_array($estado['estado'], [__('estado.status_in_repair'), __('estado.status_completed'), __('estado.status_delivered')]) ? '#2ECC71' : '#ddd') }};">
                </div>
                <div style="font-size: 11px; {{ $estado['estado'] == __('estado.status_received') ? 'font-weight: bold; color: #3498DB;' :
                    (in_array($estado['estado'], [__('estado.status_in_repair'), __('estado.status_completed'), __('estado.status_delivered')]) ? 'color: #2ECC71;' : '') }}">
                    {{ __('estado.status_received_short') }}
                </div>
            </div>

            <div style="text-align: center; position: relative; z-index: 2;">
                <div style="width: 20px; height: 20px; border-radius: 50%; margin: 0 auto 5px;
                    background-color: {{ $estado['estado'] == __('estado.status_in_repair') ? '#3498DB' :
                        (in_array($estado['estado'], [__('estado.status_completed'), __('estado.status_delivered')]) ? '#2ECC71' : '#ddd') }};">
                </div>
                <div style="font-size: 11px; {{ $estado['estado'] == __('estado.status_in_repair') ? 'font-weight: bold; color: #3498DB;' :
                    (in_array($estado['estado'], [__('estado.status_completed'), __('estado.status_delivered')]) ? 'color: #2ECC71;' : '') }}">
                    {{ __('estado.status_in_repair_short') }}
                </div>
            </div>

            <div style="text-align: center; position: relative; z-index: 2;">
                <div style="width: 20px; height: 20px; border-radius: 50%; margin: 0 auto 5px;
                    background-color: {{ $estado['estado'] == __('estado.status_completed') ? '#3498DB' :
                        (in_array($estado['estado'], [__('estado.status_delivered')]) ? '#2ECC71' : '#ddd') }};">
                </div>
                <div style="font-size: 11px; {{ $estado['estado'] == __('estado.status_completed') ? 'font-weight: bold; color: #3498DB;' :
                    (in_array($estado['estado'], [__('estado.status_delivered')]) ? 'color: #2ECC71;' : '') }}">
                    {{ __('estado.status_completed_short') }}
                </div>
            </div>

            <div style="text-align: center; position: relative; z-index: 2;">
                <div style="width: 20px; height: 20px; border-radius: 50%; margin: 0 auto 5px;
                    background-color: {{ $estado['estado'] == __('estado.status_delivered') ? '#3498DB' : '#ddd' }};">
                </div>
                <div style="font-size: 11px; {{ $estado['estado'] == __('estado.status_delivered') ? 'font-weight: bold; color: #3498DB;' : '' }}">
                    {{ __('estado.status_delivered_short') }}
                </div>
            </div>

            <!-- Línea de progreso -->
            <div style="position: absolute; top: 10px; left: 10px; right: 10px; height: 2px; background-color: #ddd; z-index: 1;"></div>
        </div>

        <div style="margin-top: 15px; padding: 10px; background-color: #f8f9fa; border-radius: 4px; text-align: center;">
            <strong>{{ __('estado.current_status') }}:</strong> {{ $estado['estado'] }}
        </div>
    </div>
</div>

@if(isset($estado['calibrado']) && ($estado['estado'] == __('estado.status_completed') || $estado['estado'] == __('estado.status_delivered')))
<div class="section">
    <div class="section-title">{{ __('estado.calibration_info') }}</div>

    <div style="margin-top: 10px; padding: 15px; background-color: #f8f9fa; border-radius: 4px;">
        <div style="margin-bottom: 10px;">
            <strong>{{ __('estado.calibration_status') }}:</strong>
            @if($estado['calibrado'] === null)
                <span style="display: inline-block; padding: 3px 8px; background-color: #6c757d; color: white; border-radius: 3px; font-size: 11px;">{{ __('estado.not_specified') }}</span>
            @elseif($estado['calibrado'])
                <span style="display: inline-block; padding: 3px 8px; background-color: #28a745; color: white; border-radius: 3px; font-size: 11px;">{{ __('estado.calibrated') }}</span>
            @else
                <span style="display: inline-block; padding: 3px 8px; background-color: #dc3545; color: white; border-radius: 3px; font-size: 11px;">{{ __('estado.not_calibrated') }}</span>
            @endif
        </div>

        @if(isset($estado['fecha_proxima_calibracion']) && $estado['calibrado'])
        <div style="margin-top: 10px;">
            <strong>{{ __('estado.next_calibration_date') }}:</strong> {{ $estado['fecha_proxima_calibracion'] }}
        </div>
        @endif
    </div>
</div>
@endif

<div style="background-color: #f8f9fa; padding: 15px; border-radius: 4px; margin-top: 25px; border: 1px solid #eee;">
    <div style="font-weight: bold; margin-bottom: 15px; color: #2C3E50; border-bottom: 1px solid #eee; padding-bottom: 5px;">
        {{ __('estado.client_data') }}
    </div>
    <div>
        <strong>{{ __('estado.name') }}:</strong> {{ $estado['cliente'] }}
    </div>
</div>
@endsection

@section('footer_extra')
{{ __('estado.document_generated') }} {{ $date }}
@endsection
