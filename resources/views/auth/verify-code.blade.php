@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-primary text-white py-3 text-center rounded-top-4">
                    <h4 class="mb-0">{{ __('Verificar Correo Electrónico') }}</h4>
                </div>

                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="alert alert-info mb-4">
                        <p class="mb-0">{{ __('Hemos enviado un código de verificación a tu correo electrónico.') }}</p>
                        <p class="mb-0">{{ __('Por favor, revisa tu bandeja de entrada e ingresa el código de 6 dígitos a continuación.') }}</p>
                        <p class="mb-0 mt-2"><strong>{{ __('Nota:') }}</strong> {{ __('Si no encuentras el correo, revisa también tu carpeta de spam o correos no deseados.') }}</p>
                    </div>

                    <form method="POST" action="{{ route('verification.verify') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="mb-4">
                            <label for="code" class="form-label fw-medium">{{ __('Código de Verificación') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-shield-lock"></i></span>
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" required autocomplete="off" autofocus maxlength="6" placeholder="Ingresa el código de 6 dígitos">
                            </div>
                            @error('code')
                                <div class="text-danger small mt-2">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            @error('email')
                                <div class="text-danger small mt-2">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-medium">
                                <i class="bi bi-check-circle me-2"></i>{{ __('Verificar Correo') }}
                            </button>
                        </div>
                    </form>

                    <hr>

                    <div class="text-center">
                        <p>{{ __('¿No recibiste el código?') }}</p>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <button type="submit" class="btn btn-link">{{ __('Reenviar código de verificación') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
