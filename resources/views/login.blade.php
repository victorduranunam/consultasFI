<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CONSULTASFI</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Tus estilos -->
  <link rel="stylesheet" href="{{ asset('css/estilos_login.css') }}">
</head>
<body>

<div class="container">
  <div class="login-container">

    <!-- Logo y encabezado -->
    <div class="empresa-header text-center">
        <img src="{{ asset('img/banner1.jpg') }}" alt="Logo" class="logo">
        <div class="empresa-text" style="font-size:28px; font-weight:bold;">
            CONSULTASFI
        </div>
    </div>

    <!-- Formulario -->
    <form action="{{ secure_url('/login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Usuario</label>
            <input type="text"
                   class="form-control"
                   name="username"
                   value="invitado"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Contrase&ntilde;a</label>
            <input type="text"
                   class="form-control"
                   name="password"
                   value="invitado1234"
                   required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">
                Iniciar sesi√≥n
            </button>
        </div>
    </form>

    <!-- Ì†ΩÌ¥¥ MENSAJE DE ERROR CON FONDO DE COLOR -->
    @if(session('mensaje'))
        <div class="mt-3 p-3 rounded text-center fw-semibold"
             style="background-color:#f8d7da; color:#842029;">
            {{ session('mensaje') }}
        </div>
    @endif

  </div>
</div>

</body>
</html>