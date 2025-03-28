@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-primary text-white py-3 text-center rounded-top-4">
<<<<<<< HEAD
                    <h4 class="mb-0">{{ __('Verificar Correo Electrónico') }}</h4>
=======
                    <h4 class="mb-0">{{ __('Verificar correo electrónico') }}</h4>
>>>>>>> dd982336b7279ad9ffc9f29f819bd77da54cd9ff
                </div>

                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<<<<<<< HEAD
                    <div class="alert alert-info mb-4">
                        <p class="mb-0">{{ __('Hemos enviado un código de verificación a tu correo electrónico.') }}</p>
                        <p class="mb-0">{{ __('Por favor, revisa tu bandeja de entrada e ingresa el código de 6 dígitos a continuación.') }}</p>
=======
                    <div class="mb-4 text-center">
                        <p>{{ __('Se ha enviado un código de verificación a tu correo electrónico.') }}</p>
                        <p>{{ __('Por favor, revisa tu bandeja de entrada e ingresa el código a continuación para completar tu registro.') }}</p>
>>>>>>> dd982336b7279ad9ffc9f29f819bd77da54cd9ff
                    </div>

                    <form method="POST" action="{{ route('verification.verify') }}">
                        @csrf
<<<<<<< HEAD
                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="mb-4">
                            <label for="code" class="form-label fw-medium">{{ __('Código de Verificación') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-shield-lock"></i></span>
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" required autocomplete="off" autofocus maxlength="6" placeholder="Ingresa el código de 6 dígitos">
=======

                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="mb-4">
                            <label for="code" class="form-label fw-medium">{{ __('Código de verificación') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-shield-lock"></i></span>
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" required autofocus placeholder="Ingresa el código de 6 dígitos">
>>>>>>> dd982336b7279ad9ffc9f29f819bd77da54cd9ff
                            </div>
                            @error('code')
                                <div class="text-danger small mt-2">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
<<<<<<< HEAD
                            @error('email')
                                <div class="text-danger small mt-2">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
=======
>>>>>>> dd982336b7279ad9ffc9f29f819bd77da54cd9ff
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-medium">
<<<<<<< HEAD
                                <i class="bi bi-check-circle me-2"></i>{{ __('Verificar Correo') }}
=======
                                <i class="bi bi-check-circle me-2"></i>{{ __('Verificar') }}
>>>>>>> dd982336b7279ad9ffc9f29f819bd77da54cd9ff
                            </button>
                        </div>
                    </form>

<<<<<<< HEAD
                    <hr>

                    <div class="text-center">
                        <p>{{ __('¿No recibiste el código?') }}</p>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <button type="submit" class="btn btn-link">{{ __('Reenviar código de verificación') }}</button>
=======
                    <div class="text-center mt-3">
                        <form method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <p>{{ __('¿No recibiste el código?') }}</p>
                            <button type="submit" class="btn btn-link text-decoration-none p-0">
                                {{ __('Haz clic aquí para enviar otro') }}
                            </button>
>>>>>>> dd982336b7279ad9ffc9f29f819bd77da54cd9ff
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
