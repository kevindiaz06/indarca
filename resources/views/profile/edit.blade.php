@extends('layout')

@section('content')
@if(Auth::user()->role === 'cliente')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Editar Mi Perfil</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="name" class="form-label fw-medium">{{ __('Nombre completo') }} <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', Auth::user()->name) }}" required autocomplete="name" autofocus>
                                </div>
                                @error('name')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fw-medium">{{ __('Correo electrónico') }} <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', Auth::user()->email) }}" required autocomplete="email">
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="password" class="form-label fw-medium">{{ __('Contraseña') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-key"></i></span>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="********">
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-text">Dejar en blanco para mantener la contraseña actual</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="password-confirm" class="form-label fw-medium">{{ __('Confirmar Contraseña') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-key-fill"></i></span>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="********">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                                    <i class="bi bi-trash me-1"></i> Eliminar mi cuenta
                                </button>

                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i> Guardar Cambios
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación para eliminar cuenta -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteAccountModalLabel">Confirmar eliminación de cuenta</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 3rem;"></i>
                    </div>
                    <p class="fs-5 text-center">¿Estás seguro de que deseas eliminar tu cuenta?</p>
                    <p class="text-center text-muted">Esta acción no se puede deshacer y perderás todos tus datos.</p>

                    <div class="mt-4">
                        <label for="confirm_email" class="form-label">Por favor, escribe tu correo electrónico para confirmar:</label>
                        <input type="email" class="form-control" id="confirm_email" name="confirm_email" required placeholder="{{ Auth::user()->email }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('profile.destroy') }}" method="POST" class="m-0" id="deleteAccountForm">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="confirm_email" id="confirm_email_hidden">
                        <button type="submit" class="btn btn-danger" id="deleteAccountButton" disabled>Eliminar definitivamente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const confirmEmail = document.getElementById('confirm_email');
            const confirmEmailHidden = document.getElementById('confirm_email_hidden');
            const deleteAccountButton = document.getElementById('deleteAccountButton');
            const userEmail = "{{ Auth::user()->email }}";

            confirmEmail.addEventListener('input', function() {
                if (this.value === userEmail) {
                    deleteAccountButton.disabled = false;
                    confirmEmailHidden.value = this.value;
                } else {
                    deleteAccountButton.disabled = true;
                    confirmEmailHidden.value = '';
                }
            });
        });
    </script>
@else
    <div class="container mt-5">
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-triangle me-2"></i>
            No tienes permisos para acceder a esta página.
        </div>
    </div>
@endif
@endsection
