<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'ConsultasFI')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body {
            overflow-x: hidden;
        }
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: #0d1b2a;
            color: white;
        }
        .sidebar a {
            color: #cfd8dc;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
        }
        .sidebar a:hover {
            background: #1b263b;
            color: white;
        }
        .topbar {
            height: 60px;
            background: white;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            align-items: center;
            padding: 0 20px;
        }
        .content {
            background: #f5f7fa;
            min-height: calc(100vh - 60px);
            padding: 20px;
        }
    </style>
</head>

<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="p-3 text-center border-bottom">
            <strong>ConsultasFI</strong>
        </div>

        <a href="{{ url('/Menu') }}"><i class="bi bi-house-door"></i> Inicio</a>
       <a href="{{ url('/clases') }}"><i class="bi bi-book"></i> Informaci&oacute;n Escolar</a>
        <a href="{{ url('/inventarios') }}"><i class="bi bi-box-seam"></i> Inventarios de Laboratorios</a>
        
       
        <a href="{{ url('/noticias') }}"><i class="bi bi-newspaper"></i> Noticias</a>
        
        <a href="{{ url('/salones') }}"><i class="bi bi-building"></i> Informaci&oacute;n de Salones</a>
        
        <form action="{{ secure_url('/logout') }}" method="POST" style="margin:0;">
 
    @csrf
    <button type="submit" 
            style="background:none;border:none;color:#cfd8dc;padding:12px 20px;width:100%;text-align:left;">
        <i class="bi bi-box-arrow-right"></i> Cerrar sesi&oacute;n
    </button>
</form>
        
    </div>

    <!-- MAIN -->
    <div class="flex-grow-1">

        <!-- TOPBAR -->
        <div class="topbar d-flex align-items-center" 
             style="background-color: #fff; height:60px; padding:0; margin:0;">
            <img src="{{ asset('https://www.ingenieria.unam.mx/consultasfi/img/header_TD.png') }}" 
                 style="height:60px; object-fit: contain; margin-left:0;" 
                 class="ms-0">
        </div>

        <!-- CONTENT -->
        <div class="content">
            @yield('content')
        </div>

    </div>
</div>

{{-- Scripts de vistas hijas --}}
@yield('scripts')

</body>
</html>
