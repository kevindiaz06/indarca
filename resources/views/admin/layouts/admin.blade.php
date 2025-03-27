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

    <!-- Lightbox CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">

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
            min-height: 100vh;
            background: var(--primary-color);
            color: #fff;
            transition: all 0.3s;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            z-index: 999;
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
                <li>
                    <a href="#">
                        <i class="bi bi-gear me-2"></i> Configuración
                    </a>
                </li>
            </ul>

            <div class="px-4 py-3 mt-auto">
                <hr class="mb-3 bg-light">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <div class="avatar bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                            <span class="text-primary fw-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <p class="mb-0 fw-medium">{{ Auth::user()->name }}</p>
                        <small class="text-muted">
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
                        <div class="dropdown me-3">
                            <a class="nav-link position-relative" href="#" role="button" id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-bell fs-5"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    3
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
                                <li><a class="dropdown-item" href="#">Notificación 1</a></li>
                                <li><a class="dropdown-item" href="#">Notificación 2</a></li>
                                <li><a class="dropdown-item" href="#">Notificación 3</a></li>
                            </ul>
                        </div>

                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="me-2 d-none d-lg-inline text-dark">{{ Auth::user()->name }}</span>
                                <div class="avatar bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                    <span class="text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Mi Perfil</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Configuración</a></li>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle sidebar
            document.getElementById('sidebarCollapse').addEventListener('click', function() {
                document.getElementById('sidebar').classList.toggle('active');
            });
        });
    </script>

    <!-- Custom scripts -->
    <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>

    @yield('scripts')
</body>
</html>
