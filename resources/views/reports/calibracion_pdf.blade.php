@extends('reports.pdf_layout')

@section('title', 'INDARCA - ' . __('estado.calibration_status'))
@section('document_title', __('estado.densimeter_calibration_status'))
@section('document_date', $date)
@section('reference_number', __('estado.serial_number') . ': ' . $calibracion['numero_serie'])

@section('content')
<div class="section">
    <div class="section-title">{{ __('estado.densimeter_info') }}</div>

    <div class="info-grid">
        <div class="info-item">
            <div class="info-label">{{ __('estado.brand') }}</div>
            <div class="info-value">{{ $calibracion['marca'] ?: __('estado.not_specified') }}</div>
        </div>

        <div class="info-item">
            <div class="info-label">{{ __('estado.model') }}</div>
            <div class="info-value">{{ $calibracion['modelo'] ?: __('estado.not_specified') }}</div>
        </div>

        <div class="info-item">
            <div class="info-label">{{ __('estado.last_revision') }}</div>
            <div class="info-value">{{ $calibracion['ultima_revision'] ?: __('estado.not_available') }}</div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-title">{{ __('estado.calibration_status') }}</div>

    <div style="margin-top: 20px; padding: 15px; background-color: #f8f9fa; border-radius: 4px; text-align: center;">
        @if($calibracion['estado_calibracion'] === true)
            <div style="margin-bottom: 15px;">
                <span style="display: inline-block; padding: 8px 15px; background-color: #28a745; color: white; border-radius: 4px; font-size: 14px; font-weight: bold;">
                    {{ strtoupper(__('estado.calibrated')) }}
                </span>
            </div>
        @elseif($calibracion['estado_calibracion'] === false)
            <div style="margin-bottom: 15px;">
                <span style="display: inline-block; padding: 8px 15px; background-color: #dc3545; color: white; border-radius: 4px; font-size: 14px; font-weight: bold;">
                    {{ strtoupper(__('estado.not_calibrated')) }}
                </span>
            </div>
        @else
            <div style="margin-bottom: 15px;">
                <span style="display: inline-block; padding: 8px 15px; background-color: #6c757d; color: white; border-radius: 4px; font-size: 14px; font-weight: bold;">
                    {{ strtoupper(__('estado.not_available')) }}
                </span>
            </div>
        @endif
    </div>
</div>

@if($calibracion['proxima_calibracion'])
<div class="section">
    <div class="section-title">{{ __('estado.next_calibration') }}</div>

    <div style="margin-top: 10px; padding: 15px; background-color: #f8f9fa; border-radius: 4px;">
        <div style="margin-bottom: 15px; font-size: 14px;">
            <strong>{{ __('estado.date') }}:</strong> {{ $calibracion['proxima_calibracion'] }}
        </div>

        @php
            $hoy = new \Carbon\Carbon();
            $fechaProxima = \Carbon\Carbon::createFromFormat('d/m/Y', $calibracion['proxima_calibracion']);
            $diasRestantes = $hoy->diffInDays($fechaProxima, false);
        @endphp

        @if($diasRestantes > 30)
            <div style="padding: 10px; background-color: #d4edda; border-left: 4px solid #28a745; border-radius: 4px; margin-top: 10px;">
                <div style="color: #155724; font-weight: bold;">✓ {{ __('estado.calibration_valid') }}</div>
                <div style="color: #155724;">{!! __('estado.days_remaining', ['days' => (int)$diasRestantes]) !!}</div>
            </div>
        @elseif($diasRestantes > 0)
            <div style="padding: 10px; background-color: #fff3cd; border-left: 4px solid #ffc107; border-radius: 4px; margin-top: 10px;">
                <div style="color: #856404; font-weight: bold;">⚠️ {{ __('estado.warning') }}</div>
                <div style="color: #856404;">{!! __('estado.days_remaining_warning_simple', ['days' => (int)$diasRestantes]) !!}</div>
            </div>
        @else
            <div style="padding: 10px; background-color: #f8d7da; border-left: 4px solid #dc3545; border-radius: 4px; margin-top: 10px;">
                <div style="color: #721c24; font-weight: bold;">❌ {{ __('estado.calibration_expired_title') }}</div>
                <div style="color: #721c24;">{!! __('estado.calibration_expired_simple', ['days' => abs((int)$diasRestantes)]) !!}</div>
            </div>
        @endif
    </div>
</div>
@endif

<div style="margin-top: 30px; padding: 15px; background-color: #eee; border-radius: 4px; font-size: 11px;">
    <strong>{{ __('estado.important_note') }}:</strong> {{ __('estado.calibration_note') }}
</div>

<div class="document-validation">
    <div style="display: flex; justify-content: flex-end;">
        <div>
            <div class="signature-box">
                {{ __('estado.indarca_seal') }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_extra')
{{ __('estado.document_generated') }} {{ $date }} | {{ __('estado.validity') }}: {{ __('estado.one_year') }}
@endsection
