@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-primary text-white py-3 text-center rounded-top-4">
                    <h4 class="mb-0">{{ __('Recuperar Contraseña') }}</h4>
                </div>

                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            <p class="mb-0 mt-2"><strong>{{ __('Nota:') }}</strong> {{ __('Si no encuentras el correo, revisa también tu carpeta de spam o correos no deseados.') }}</p>
                        </div>
                    @else
                        <div class="alert alert-info mb-4" role="alert">
                            <p class="mb-0">{{ __('Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.') }}</p>
                            <p class="mb-0 mt-2"><strong>{{ __('Nota:') }}</strong> {{ __('Si no recibes el correo, revisa también tu carpeta de spam o correos no deseados.') }}</p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label fw-medium">{{ __('Correo Electrónico') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Introduce tu correo">
                            </div>
                            @error('email')
                                <div class="text-danger small mt-2">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-medium">
                                <i class="bi bi-envelope-paper me-2"></i>{{ __('Enviar Enlace de Recuperación') }}
                            </button>
                        </div>

                        <div class="text-center">
                            <a class="text-decoration-none" href="{{ route('login') }}">
                                {{ __('Volver a iniciar sesión') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
