@extends('layout')

@section('content')
@if(Auth::user()->role === 'cliente')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">{{ __('general.edit_my_profile') }}</h4>
                    </div>

                    <div class="card-body">
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

                            <div class="d-flex justify-content-between align-items-center">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                                    <i class="bi bi-trash me-1"></i> {{ __('general.delete_my_account') }}
                                </button>

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

    <!-- Modal de confirmación para eliminar cuenta -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteAccountModalLabel">{{ __('general.confirm_account_deletion') }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 3rem;"></i>
                    </div>
                    <p class="fs-5 text-center">{{ __('general.are_you_sure') }}</p>
                    <p class="text-center text-muted">{{ __('general.irreversible_action') }}</p>

                    <div class="mt-4">
                        <label for="confirm_email" class="form-label">{{ __('general.confirm_email') }}</label>
                        <input type="email" class="form-control" id="confirm_email" name="confirm_email" required placeholder="{{ Auth::user()->email }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('general.cancel') }}</button>
                    <form action="{{ route('profile.destroy') }}" method="POST" class="m-0" id="deleteAccountForm">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="confirm_email" id="confirm_email_hidden">
                        <button type="submit" class="btn btn-danger" id="deleteAccountButton" disabled>{{ __('general.delete_permanently') }}</button>
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
            {{ __('general.no_permissions') }}
        </div>
    </div>
@endif
@endsection
