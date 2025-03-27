@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-primary text-white py-3 text-center rounded-top-4">
                    <h4 class="mb-0">{{ __('Verificar correo electrónico') }}</h4>
                </div>

                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-4 text-center">
                        <p>{{ __('Se ha enviado un código de verificación a tu correo electrónico.') }}</p>
                        <p>{{ __('Por favor, revisa tu bandeja de entrada e ingresa el código a continuación para completar tu registro.') }}</p>
                    </div>

                    <form method="POST" action="{{ route('verification.verify') }}">
                        @csrf

                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="mb-4">
                            <label for="code" class="form-label fw-medium">{{ __('Código de verificación') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-shield-lock"></i></span>
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" required autofocus placeholder="Ingresa el código de 6 dígitos">
                            </div>
                            @error('code')
                                <div class="text-danger small mt-2">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-medium">
                                <i class="bi bi-check-circle me-2"></i>{{ __('Verificar') }}
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <form method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <p>{{ __('¿No recibiste el código?') }}</p>
                            <button type="submit" class="btn btn-link text-decoration-none p-0">
                                {{ __('Haz clic aquí para enviar otro') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
