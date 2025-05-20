<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDARCA - Panel de Administración</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- GLightbox CSS -->
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <style>
        :root {
            --primary-color: #2C3E50;
            --secondary-color: #3498DB;
            --success-color: #2ECC71;
            --danger-color: #E74C3C;
            --warning-color: #F39C12;
            --info-color: #3498DB;
            --light-color: #ECF0F1;
            --dark-color: #2C3E50;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        /* Sidebar */
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            height: 100vh;
            background: var(--primary-color);
            color: #fff;
            transition: all 0.3s;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            z-index: 999;
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            overflow-y: auto;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: rgba(0, 0, 0, 0.1);
        }

        #sidebar ul.components {
            padding: 20px 0;
            flex-grow: 1;
            max-height: calc(100vh - 320px);
            overflow-y: auto;
        }

        #sidebar ul p {
            color: #fff;
            padding: 10px;
        }

        #sidebar ul li a {
            padding: 12px 20px;
            font-size: 1rem;
            display: block;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        #sidebar ul li a:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left: 3px solid var(--secondary-color);
        }

        #sidebar ul li.active > a {
            background: rgba(255, 255, 255, 0.1);
            border-left: 3px solid var(--secondary-color);
        }

        /* Submenu styles */
        #sidebar ul ul a {
            padding-left: 30px;
            background: rgba(0, 0, 0, 0.15);
            font-size: 0.9rem;
        }

        #sidebar ul ul a:hover {
            background: rgba(0, 0, 0, 0.25);
        }

        #sidebar ul ul li.active > a {
            background: rgba(0, 0, 0, 0.25);
        }

        /* Footer sidebar */
        #sidebar .mt-auto {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: sticky;
            bottom: 0;
            background-color: var(--primary-color);
        }

        #sidebar .mt-auto .bg-dark {
            background-color: rgba(0, 0, 0, 0.2) !important;
        }

        /* Navbar */
        .admin-navbar {
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        /* Content */
        .content {
            width: 100%;
            min-height: 100vh;
            transition: all 0.3s;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .stats-card {
            border-left: 4px solid;
        }

        .stats-card.primary {
            border-left-color: var(--primary-color);
        }

        .stats-card.success {
            border-left-color: var(--success-color);
        }

        .stats-card.warning {
            border-left-color: var(--warning-color);
        }

        .stats-card.danger {
            border-left-color: var(--danger-color);
        }

        .stats-card .icon {
            font-size: 2rem;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: #fff;
        }

        .stats-card .icon.primary {
            background-color: var(--primary-color);
        }

        .stats-card .icon.success {
            background-color: var(--success-color);
        }

        .stats-card .icon.warning {
            background-color: var(--warning-color);
        }

        .stats-card .icon.danger {
            background-color: var(--danger-color);
        }

        /* Media query */
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
            #sidebarCollapse span {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header d-flex align-items-center">
                <div class="logo me-2">
                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="#3498DB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 17L12 22L22 17" stroke="#3498DB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 12L12 17L22 12" stroke="#3498DB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div>
                    <h5 class="mb-0">INDARCA</h5>
                    <small class="text-muted">Panel Administrativo</small>
                </div>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.usuarios*') ? 'active' : '' }}">
                    <a href="{{ route('admin.usuarios') }}">
                        <i class="bi bi-people me-2"></i> Usuarios
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.empresas*') ? 'active' : '' }}">
                    <a href="{{ route('admin.empresas') }}">
                        <i class="bi bi-building me-2"></i> Empresas
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.densimetros*') ? 'active' : '' }}">
                    <a href="{{ route('admin.densimetros.index') }}">
                        <i class="bi bi-tools me-2"></i> Densímetros
                    </a>
                </li>
                @if(Auth::user()->role === 'admin')
                <li class="{{ request()->routeIs('admin.views*') ? 'active' : '' }}">
                    <a href="#viewsSubmenu" data-bs-toggle="collapse" aria-expanded="{{ request()->routeIs('admin.views*') ? 'true' : 'false' }}" class="dropdown-toggle">
                        <i class="bi bi-layout-text-window me-2"></i> Vistas
                    </a>
                    <ul class="collapse list-unstyled {{ request()->routeIs('admin.views*') ? 'show' : '' }}" id="viewsSubmenu">
                        <li class="{{ request()->routeIs('admin.team*') ? 'active' : '' }}">
                            <a href="{{ route('admin.team.index') }}" class="ps-4">
                                <i class="bi bi-people-fill me-2"></i> Equipo
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>

            <!-- Sección inferior siempre visible -->
            <div class="mt-auto">
                <div class="px-4 mb-2">
                    <a href="{{ route('inicio') }}" class="btn btn-outline-light w-100">
                        <i class="bi bi-house-door me-2"></i> Volver al Sitio Web
                    </a>
                </div>

                <div class="px-4 py-3 bg-dark">
                    <div class="d-flex align-items-center">
                        <div class="me-2">
                            <div class="avatar bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <span class="text-primary fw-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-0 fs-6 fw-medium">{{ Auth::user()->name }}</p>
                            <small class="text-light opacity-75 small">
                                @if(Auth::user()->role === 'admin')
                                    Administrador
                                @elseif(Auth::user()->role === 'trabajador')
                                    Trabajador
                                @else
                                    Usuario
                                @endif
                            </small>
                        </div>
                        <div>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-light">
                                <i class="bi bi-box-arrow-right"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="content">
            <!-- Top Navbar -->
            <nav class="navbar admin-navbar navbar-expand-lg px-4 py-3">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-light">
                        <i class="bi bi-list"></i>
                    </button>

                    <div class="d-flex align-items-center ms-auto">


                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="me-2 d-none d-lg-inline text-dark">{{ Auth::user()->name }}</span>
                                <div class="avatar bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                    <span class="text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Mi Perfil</a></li>

                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i>Cerrar Sesión
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- GLightbox JS -->
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle sidebar
            document.getElementById('sidebarCollapse').addEventListener('click', function() {
                document.getElementById('sidebar').classList.toggle('active');
            });

            // Inicializar GLightbox
            const lightbox = GLightbox({
                selector: '.glightbox',
                touchNavigation: true,
                loop: true,
                autoplayVideos: true
            });
        });
    </script>

    <!-- Custom scripts -->
    <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>

    @yield('scripts')
</body>
</html>
