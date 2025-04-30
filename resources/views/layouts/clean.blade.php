<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>INDARCA - Estado de Densímetros</title>
    <meta name="description" content="Verificación de estado de densímetros nucleares">
    <meta name="keywords" content="densímetro, nuclear, estado, verificación">

    <!-- Favicons -->
    <link href="https://indarca.net/wp-content/uploads/2019/03/Favicon-3.ico" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            padding: 0;
            margin: 0;
        }
        .clean-layout {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .logo-small {
            position: fixed;
            bottom: 10px;
            left: 10px;
            opacity: 0.5;
            transition: opacity 0.3s;
        }
        .logo-small:hover {
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="clean-layout">
        @yield('content')
    </div>

    <a href="{{ route('inicio') }}" class="logo-small">
        <img src="{{ asset('assets/img/OTROS/logo_indarca.png') }}" alt="INDARCA" height="30">
    </a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
