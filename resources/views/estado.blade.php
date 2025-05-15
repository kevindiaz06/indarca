@extends('layout')

@section('content')
<div class="container py-5">


    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Toast Container para alertas flotantes -->
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1050;">
        @if($errors->any())
        <div class="toast align-items-center text-white bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ $errors->first() }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="{{ __('estado.close') }}"></button>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="toast align-items-center text-white bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="{{ __('estado.close') }}"></button>
            </div>
        </div>
        @endif
    </div>
            <!-- Primera tarjeta: Consulta por referencia -->
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-primary py-3">
                    <h4 class="mb-0 text-white"><i class="bi bi-clipboard-data me-2"></i>{{ __('estado.device_status_title') }}</h4>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted mb-4">{{ __('estado.reference_description') }}</p>

                    <form action="{{ route('estado.consultar') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-light"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control @error('referencia') is-invalid @enderror" name="referencia" placeholder="{{ __('estado.reference_placeholder') }}" value="{{ old('referencia') }}" required>
                            <button type="submit" class="btn btn-primary">{{ __('estado.submit_query') }}</button>

                            @error('referencia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>

            <!-- Segunda tarjeta: Consulta por Estado de Calibración -->
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-danger py-3">
                    <h4 class="mb-0 text-white"><i class="bi bi-calendar-check me-2"></i>{{ __('estado.calibration_status_title') }}</h4>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted mb-4">{!! __('estado.calibration_description') !!}</p>

                    <form action="{{ route('calibracion.consultar') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="numero_serie" class="form-label">{{ __('estado.serial_number') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-upc-scan"></i></span>
                                <input type="text" class="form-control @error('numero_serie') is-invalid @enderror" id="numero_serie" name="numero_serie" placeholder="{{ __('estado.serial_number_placeholder') }}" value="{{ old('numero_serie') }}" required>
                                @error('numero_serie')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="marca" class="form-label">{{ __('estado.brand') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-tag"></i></span>
                                    <input type="text" class="form-control @error('marca') is-invalid @enderror" id="marca" name="marca" placeholder="{{ __('estado.brand_placeholder') }}" value="{{ old('marca') }}" required>
                                    @error('marca')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="modelo" class="form-label">{{ __('estado.model') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-cpu"></i></span>
                                    <input type="text" class="form-control @error('modelo') is-invalid @enderror" id="modelo" name="modelo" placeholder="{{ __('estado.model_placeholder') }}" value="{{ old('modelo') }}" required>
                                    @error('modelo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-danger text-white">{{ __('estado.verify_calibration') }}</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-4 text-center">
                <p class="text-muted">{{ __('estado.questions') }} <a href="{{ route('inicio') }}#contact">{{ __('estado.contact_us') }}</a></p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Inicializar los toasts y configurarlos para desaparecer automáticamente después de 5 segundos
    document.addEventListener('DOMContentLoaded', function() {
        var toastElList = [].slice.call(document.querySelectorAll('.toast'));
        var toastList = toastElList.map(function(toastEl) {
            var toast = new bootstrap.Toast(toastEl, {
                autohide: true,
                delay: 5000
            });
            return toast;
        });
    });
</script>
@endpush
@endsection
