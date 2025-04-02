@extends('reports.pdf_layout')

@section('title', 'INDARCA - Ficha de Densímetro')
@section('document_title', 'Ficha de Densímetro')
@section('document_date', $date)
@section('reference_number', 'Ref: ' . $densimetro->referencia_reparacion)

@section('content')
<div class="section">
    <div class="section-title">Información del Densímetro</div>

    <div class="info-grid">
        <div class="info-item">
            <div class="info-label">Número de Serie</div>
            <div class="info-value">{{ $densimetro->numero_serie }}</div>
        </div>

        <div class="info-item">
            <div class="info-label">Fecha de Entrada</div>
            <div class="info-value">{{ $densimetro->fecha_entrada->format('d/m/Y') }}</div>
        </div>

        <div class="info-item">
            <div class="info-label">Marca</div>
            <div class="info-value">{{ $densimetro->marca ?: 'No especificada' }}</div>
        </div>

        <div class="info-item">
            <div class="info-label">Modelo</div>
            <div class="info-value">{{ $densimetro->modelo ?: 'No especificado' }}</div>
        </div>

        <div class="info-item">
            <div class="info-label">Estado Actual</div>
            <div class="info-value">
                @if($densimetro->estado == 'recibido')
                    <span class="estado estado-recibido">Recibido</span>
                @elseif($densimetro->estado == 'en_reparacion')
                    <span class="estado estado-en_reparacion">En reparación</span>
                @elseif($densimetro->estado == 'finalizado')
                    <span class="estado estado-finalizado">Finalizado</span>
                @elseif($densimetro->estado == 'entregado')
                    <span class="estado estado-entregado">Entregado</span>
                @endif
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Fecha de Registro</div>
            <div class="info-value">{{ $densimetro->created_at->format('d/m/Y H:i') }}</div>
        </div>

        @if(($densimetro->estado == 'finalizado' || $densimetro->estado == 'entregado') && $densimetro->fecha_finalizacion)
        <div class="info-item">
            <div class="info-label">Fecha de Finalización</div>
            <div class="info-value">{{ $densimetro->fecha_finalizacion->format('d/m/Y') }}</div>
        </div>
        @endif
    </div>

    <div class="info-item" style="margin-top: 20px;">
        <div class="info-label">Observaciones</div>
        <div class="observaciones">
            {{ $densimetro->observaciones ?: 'Sin observaciones' }}
        </div>
    </div>

    <!-- Archivos adjuntos -->
    <div class="archivos-titulo">Archivos Adjuntos</div>

    @if($densimetro->archivos->isEmpty())
        <div style="text-align: center; font-style: italic; color: #7f8c8d; padding: 15px; border: 1px dashed #ddd; border-radius: 4px;">
            No hay archivos adjuntos para este densímetro
        </div>
    @else
        @php
            $imagenes = $densimetro->archivos->filter(function($archivo) {
                return $archivo->tipo_archivo == 'imagen';
            });

            $documentos = $densimetro->archivos->filter(function($archivo) {
                return $archivo->tipo_archivo != 'imagen';
            });
        @endphp

        <!-- Imágenes -->
        @if($imagenes->count() > 0)
            <div class="archivos-container">
                @foreach($imagenes as $imagen)
                    <div class="archivo-item">
                        <img class="archivo-imagen" src="{{ public_path('storage/' . $imagen->ruta_archivo) }}" alt="{{ $imagen->nombre_archivo }}">
                        <div class="archivo-info">
                            {{ $imagen->nombre_archivo }} ({{ strtoupper($imagen->extension) }})
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Documentos -->
        @if($documentos->count() > 0)
            <div style="margin-top: 15px; background-color: #f8f9fa; padding: 12px; border-radius: 4px; border: 1px solid #eee;">
                <div style="font-weight: bold; margin-bottom: 10px; color: #2C3E50;">Otros archivos adjuntos:</div>
                <ul style="padding-left: 20px;">
                    @foreach($documentos as $documento)
                        <li>{{ $documento->nombre_archivo }} ({{ strtoupper($documento->extension) }} - {{ number_format($documento->tamano / 1024, 2) }} KB)</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @endif
</div>

<div style="background-color: #f8f9fa; padding: 15px; border-radius: 4px; margin-top: 25px; border: 1px solid #eee;">
    <div style="font-weight: bold; margin-bottom: 15px; color: #2C3E50; border-bottom: 1px solid #eee; padding-bottom: 5px;">
        Datos del Cliente
    </div>
    <div class="info-grid">
        <div class="info-item">
            <div class="info-label">Nombre</div>
            <div class="info-value">{{ $densimetro->cliente ? $densimetro->cliente->name : 'Cliente no disponible' }}</div>
        </div>

        <div class="info-item">
            <div class="info-label">Email</div>
            <div class="info-value">{{ $densimetro->cliente ? $densimetro->cliente->email : 'Email no disponible' }}</div>
        </div>
    </div>
</div>
@endsection

@section('footer_extra')
Generado por: {{ Auth::user()->name }}
@endsection
