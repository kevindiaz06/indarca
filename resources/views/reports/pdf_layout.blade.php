<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'INDARCA - Reporte')</title>
    <style>
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            src: url(https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap);
        }

        body {
            font-family: 'Montserrat', 'Arial', sans-serif;
            margin: 20px;
            font-size: 12px;
            line-height: 1.5;
            color: #333;
            position: relative;
        }

        /* Estilo para la marca de agua */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: -1;
            background-image: url('{{ public_path('/assets/img/logo_indarca.png') }}');
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            opacity: 0.05;
            transform: rotate(-10deg) scale(1.5);
        }

        .header {
            border-bottom: 2px solid #2C3E50;
            padding-bottom: 15px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            max-width: 130px;
            max-height: 60px;
        }

        .logo-text {
            margin-left: 10px;
        }

        .company-name {
            font-size: 22px;
            font-weight: bold;
            color: #2C3E50;
            margin: 0;
        }

        .company-slogan {
            font-size: 12px;
            color: #7f8c8d;
            margin: 0;
        }

        .document-info {
            text-align: right;
            font-size: 12px;
        }

        .document-title {
            font-size: 18px;
            font-weight: bold;
            color: #2C3E50;
            margin-bottom: 5px;
        }

        .document-date {
            color: #7f8c8d;
        }

        .document-author {
            color: #3498DB;
            font-weight: 600;
            margin-top: 5px;
        }

        .reference-number {
            margin-top: 5px;
            padding: 5px 10px;
            background-color: #f5f5f5;
            border-radius: 4px;
            border-left: 4px solid #3498DB;
            font-weight: bold;
        }

        h1 {
            color: #2C3E50;
            font-size: 20px;
            margin-top: 30px;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 1px solid #eee;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-title {
            background-color: #f8f9fa;
            padding: 8px 12px;
            border-left: 4px solid #3498DB;
            font-weight: bold;
            margin-bottom: 15px;
            color: #2C3E50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th {
            background-color: #2C3E50;
            color: white;
            border: 1px solid #2C3E50;
            padding: 8px;
            text-align: left;
            font-weight: bold;
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            border-top: 1px solid #eee;
            padding-top: 10px;
            display: flex;
            justify-content: space-between;
            font-size: 10px;
            color: #7f8c8d;
        }

        .footer-left {
            text-align: left;
        }

        .footer-right {
            text-align: right;
        }

        .page-number:after {
            content: counter(page);
        }

        .document-validation {
            margin-top: 40px;
            margin-bottom: 40px;
            page-break-inside: avoid;
        }

        .signature-box {
            border-top: 1px solid #ddd;
            margin-top: 60px;
            width: 200px;
            text-align: center;
            padding-top: 5px;
            font-size: 11px;
            color: #555;
        }

        /* Estilos para cuadros de información */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }

        .info-item {
            margin-bottom: 15px;
        }

        .info-label {
            font-size: 10px;
            color: #7f8c8d;
            margin-bottom: 3px;
            text-transform: uppercase;
        }

        .info-value {
            font-size: 14px;
            font-weight: bold;
        }

        /* Estados para densímetros */
        .estado {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            color: white;
        }

        .estado-recibido {
            background-color: #6c757d;
        }

        .estado-en_reparacion {
            background-color: #3498DB;
        }

        .estado-finalizado {
            background-color: #2ECC71;
        }

        .estado-entregado {
            background-color: #17a2b8;
        }

        /* Estados para calibración */
        .estado-secondary {
            background-color: #6c757d;
        }

        .estado-success {
            background-color: #2ECC71;
        }

        .estado-danger {
            background-color: #dc3545;
        }

        /* Contenedor para observaciones */
        .observaciones {
            background-color: #f8f9fa;
            padding: 12px;
            border-radius: 4px;
            border: 1px solid #eee;
        }

        /* Estilos para archivos/documentos */
        .archivos-titulo {
            font-weight: bold;
            margin-top: 25px;
            margin-bottom: 15px;
            color: #2C3E50;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }

        .archivos-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .archivo-item {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
            background-color: white;
        }

        .archivo-imagen {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto 10px auto;
            max-height: 150px;
        }

        .archivo-info {
            font-size: 10px;
            color: #7f8c8d;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo-container">
            <img src="{{ public_path('/assets/img/logo_indarca.png') }}" class="logo" alt="INDARCA Logo">
            <div class="logo-text">

                <div class="company-slogan">Servicios Industriales de Calidad</div>
            </div>
        </div>
        <div class="document-info">
            <div class="document-title">@yield('document_title', 'Reporte')</div>
            <div class="document-date">Generado: @yield('document_date', date('d/m/Y H:i:s'))</div>
            <div class="document-author">Autor: {{ Auth::user()->name }} ({{ Auth::user()->role === 'admin' ? 'Administrador' : (Auth::user()->role === 'trabajador' ? 'Trabajador' : 'Cliente') }})</div>
            @hasSection('reference_number')
            <div class="reference-number">@yield('reference_number')</div>
            @endif
        </div>
    </div>

    <div class="content">
        @yield('content')
    </div>

    @if(in_array(Request::route()->getName(), ['admin.densimetros.pdf', 'admin.reportes.densimetros.pdf']))
    <div class="document-validation">
        <div style="display: flex; justify-content: space-between;">
            <div>
                <div class="signature-box">
                    Firma del Técnico
                </div>
            </div>
            <div>
                <div class="signature-box">
                    Firma del Cliente
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="footer">
        <div class="footer-left">
            INDARCA © {{ date('Y') }} - Documento oficial
        </div>
        <div class="footer-right">
            Página <span class="page-number"></span>
            @hasSection('footer_extra')
            | @yield('footer_extra')
            @endif
        </div>
    </div>

    <div style="position: fixed; bottom: 20px; left: 20px; font-size: 8px; color: #999; text-align: left;">
        ID: {{ md5(Auth::id() . time() . rand(1000,9999)) }} | Fecha emisión: {{ date('d/m/Y H:i:s') }}
    </div>
</body>
</html>
