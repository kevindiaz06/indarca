@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0"><i class="bi bi-person-fill me-2"></i>{{ __('general.edit_my_profile') }}</h5>
                </div>
                <div class="card-body p-4">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <!-- Tarjetas informativas -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="card-title d-flex align-items-center">
                                        <i class="bi bi-info-circle text-primary me-2"></i>
                                        Información de la cuenta
                                    </h6>
                                    <hr>
                                    <div class="mb-3">
                                        <p class="mb-1"><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
                                        <p class="mb-1"><strong>Correo:</strong> {{ Auth::user()->email }}</p>
                                        <p class="mb-0">
                                            <strong>Rol:</strong>
                                            @if(Auth::user()->role === 'admin')
                                                <span class="badge bg-primary">Administrador</span>
                                            @elseif(Auth::user()->role === 'trabajador')
                                                <span class="badge bg-success">Trabajador</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="card-title d-flex align-items-center">
                                        <i class="bi bi-shield-lock text-primary me-2"></i>
                                        Seguridad de la cuenta
                                    </h6>
                                    <hr>
                                    <div class="mb-3">
                                        <p>Puedes actualizar tu información personal y cambiar tu contraseña en cualquier momento.</p>
                                        <p class="mb-0 small text-muted">
                                            <i class="bi bi-clock-history me-1"></i>
                                            Último inicio de sesión: {{ Auth::user()->last_login ? Auth::user()->last_login->format('d/m/Y H:i') : 'No disponible' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Formulario de edición -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-light py-3">
                            <h6 class="mb-0 fw-bold">Actualizar información personal</h6>
                        </div>
                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('profile.update') }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label for="name" class="form-label fw-medium">{{ __('general.full_name') }} <span class="text-danger">*</span></label>
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
                                    <label for="email" class="form-label fw-medium">{{ __('general.email') }} <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                        <input id="email" type="email" class="form-control" value="{{ Auth::user()->email }}" readonly disabled>
                                    </div>
                                    <small class="text-muted">{{ __('general.email_cannot_be_modified') }}</small>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="password" class="form-label fw-medium">{{ __('general.password') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="bi bi-key"></i></span>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="********">
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="form-text">{{ __('general.leave_blank') }}</div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="password-confirm" class="form-label fw-medium">{{ __('general.confirm_password') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="bi bi-key-fill"></i></span>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="********">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save me-1"></i> {{ __('general.save_changes') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
