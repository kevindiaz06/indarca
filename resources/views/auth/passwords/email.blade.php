@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-primary text-white py-3 text-center rounded-top-4">
                    <h4 class="mb-0">{{ __('auth.recover_password') }}</h4>
                </div>

                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ session('status') }}
                            <p class="mb-0 mt-2"><strong>{{ __('auth.note') }}</strong> {{ __('auth.check_spam') }}</p>
                        </div>
                    @else
                        <div class="alert alert-info mb-4" role="alert">
                            <i class="bi bi-info-circle-fill me-2"></i>
                            <p class="mb-0">{{ __('auth.reset_intro') }}</p>
                            <p class="mb-0 mt-2"><strong>{{ __('auth.note') }}</strong> {{ __('auth.check_spam') }}</p>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" id="resetForm">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label fw-medium">{{ __('auth.email') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('auth.email_placeholder') }}">
                            </div>
                            @error('email')
                                <div class="text-danger small mt-2">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-medium" id="submitBtn">
                                <span class="btn-text">
                                    <i class="bi bi-envelope-paper me-2"></i>{{ __('auth.send_reset_link') }}
                                </span>
                                <span class="btn-loading d-none">
                                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                    Enviando...
                                </span>
                            </button>
                        </div>

                        <div class="text-center">
                            <a class="text-decoration-none" href="{{ route('login') }}">
                                {{ __('auth.back_to_login') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('resetForm');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoading = submitBtn.querySelector('.btn-loading');

    form.addEventListener('submit', function(e) {
        // Mostrar estado de carga
        submitBtn.disabled = true;
        btnText.classList.add('d-none');
        btnLoading.classList.remove('d-none');

        // Permitir que el formulario se envíe normalmente
        // El estado de carga se mantendrá hasta que la página se recargue
    });

    // Regenerar token CSRF si la página ha estado abierta por mucho tiempo
    setInterval(function() {
        fetch('{{ route("password.request") }}')
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newToken = doc.querySelector('input[name="_token"]').value;
                document.querySelector('input[name="_token"]').value = newToken;
            })
            .catch(error => {
                console.log('Error al actualizar token CSRF:', error);
            });
    }, 300000); // Actualizar cada 5 minutos
});
</script>
@endsection
