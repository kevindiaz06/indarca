@extends('reports.pdf_layout')

@section('title', 'INDARCA - Estado de Calibración')
@section('document_title', 'Estado de Calibración de Densímetro')
@section('document_date', $date)
@section('reference_number', 'Número de Serie: ' . $calibracion['numero_serie'])

@section('content')
<div class="section">
    <div class="section-title">Información del Densímetro</div>

    <div class="info-grid">
        <div class="info-item">
            <div class="info-label">Marca</div>
            <div class="info-value">{{ $calibracion['marca'] ?: 'No especificada' }}</div>
        </div>

        <div class="info-item">
            <div class="info-label">Modelo</div>
            <div class="info-value">{{ $calibracion['modelo'] ?: 'No especificado' }}</div>
        </div>

        <div class="info-item">
            <div class="info-label">Última Revisión</div>
            <div class="info-value">{{ $calibracion['ultima_revision'] ?: 'No disponible' }}</div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-title">Estado de Calibración</div>

    <div style="margin-top: 20px; padding: 15px; background-color: #f8f9fa; border-radius: 4px; text-align: center;">
        @if($calibracion['estado_calibracion'] === true)
            <div style="margin-bottom: 15px;">
                <span style="display: inline-block; padding: 8px 15px; background-color: #28a745; color: white; border-radius: 4px; font-size: 14px; font-weight: bold;">
                    CALIBRADO
                </span>
            </div>
        @elseif($calibracion['estado_calibracion'] === false)
            <div style="margin-bottom: 15px;">
                <span style="display: inline-block; padding: 8px 15px; background-color: #dc3545; color: white; border-radius: 4px; font-size: 14px; font-weight: bold;">
                    NO CALIBRADO
                </span>
            </div>
        @else
            <div style="margin-bottom: 15px;">
                <span style="display: inline-block; padding: 8px 15px; background-color: #6c757d; color: white; border-radius: 4px; font-size: 14px; font-weight: bold;">
                    NO DISPONIBLE
                </span>
            </div>
        @endif
    </div>
</div>

@if($calibracion['proxima_calibracion'])
<div class="section">
    <div class="section-title">Próxima Calibración</div>

    <div style="margin-top: 10px; padding: 15px; background-color: #f8f9fa; border-radius: 4px;">
        <div style="margin-bottom: 15px; font-size: 14px;">
            <strong>Fecha:</strong> {{ $calibracion['proxima_calibracion'] }}
        </div>

        @php
            $hoy = new \Carbon\Carbon();
            $fechaProxima = \Carbon\Carbon::createFromFormat('d/m/Y', $calibracion['proxima_calibracion']);
            $diasRestantes = $hoy->diffInDays($fechaProxima, false);
        @endphp

        @if($diasRestantes > 30)
            <div style="padding: 10px; background-color: #d4edda; border-left: 4px solid #28a745; border-radius: 4px; margin-top: 10px;">
                <div style="color: #155724; font-weight: bold;">✓ Estado de calibración en regla</div>
                <div style="color: #155724;">Quedan <strong>{{ (int)$diasRestantes }}</strong> días para la próxima calibración</div>
            </div>
        @elseif($diasRestantes > 0)
            <div style="padding: 10px; background-color: #fff3cd; border-left: 4px solid #ffc107; border-radius: 4px; margin-top: 10px;">
                <div style="color: #856404; font-weight: bold;">⚠️ ¡Atención!</div>
                <div style="color: #856404;">Solo quedan <strong>{{ (int)$diasRestantes }}</strong> días para la próxima calibración</div>
            </div>
        @else
            <div style="padding: 10px; background-color: #f8d7da; border-left: 4px solid #dc3545; border-radius: 4px; margin-top: 10px;">
                <div style="color: #721c24; font-weight: bold;">❌ ¡Calibración vencida!</div>
                <div style="color: #721c24;">Han pasado <strong>{{ abs((int)$diasRestantes) }}</strong> días desde la fecha programada</div>
            </div>
        @endif
    </div>
</div>
@endif

<div style="margin-top: 30px; padding: 15px; background-color: #eee; border-radius: 4px; font-size: 11px;">
    <strong>Nota importante:</strong> Mantenga sus equipos con la calibración al día para asegurar mediciones precisas y cumplir con los estándares de calidad requeridos.
</div>

<div class="document-validation">
    <div style="display: flex; justify-content: flex-end;">
        <div>
            <div class="signature-box">
                Sello INDARCA
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_extra')
Documento generado el {{ $date }} | Validez: 1 año
@endsection
