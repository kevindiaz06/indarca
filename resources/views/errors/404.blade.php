@extends('layout')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-1 fw-bold text-primary">404</h1>
            <h2 class="mb-4">Página no encontrada</h2>
            <p class="mb-4">Lo sentimos, la página que estás buscando no existe o ha sido movida.</p>
            <div class="mb-5">
                <i class="bi bi-file-earmark-x text-danger" style="font-size: 150px;"></i>
            </div>
            <a href="{{ route('inicio') }}" class="btn btn-primary">
                <i class="bi bi-house-door me-2"></i>Volver al inicio
            </a>
        </div>
    </div>
</div>
@endsection
