<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EDUCAFI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos_login.css">
</head>
<body>

<?php
session_start(); 
$mensaje = '';
$tipo = ''; // 'error' o 'success'

if (isset($_SESSION['login_error'])) {
    $mensaje = "Usuario inválido, por favor ingrese de nuevo sus datos.";
    $tipo = 'error';
    unset($_SESSION['login_error']);
} elseif (isset($_SESSION['login_success'])) {
    $mensaje = $_SESSION['login_success'];
    $tipo = 'success';
    unset($_SESSION['login_success']);
}
?>

<div class="container">
  <div class="login-container">

    <!-- Logo y texto -->
    <div class="empresa-header">
        <img src="img/banner1.jpg" alt="Logo de la empresa" class="logo">
        <div class="empresa-text">CONSULTASFI</div>
    </div>

    <!-- Mensaje de error o éxito -->
    <?php if (!empty($mensaje)): ?>
        <div class="alert alert-<?= $tipo ?>">
            <?= htmlspecialchars($mensaje) ?>
        </div>
    <?php endif; ?>

    <!-- Formulario -->
    <form action="login_process.php" method="POST">
        <div class="mb-3">
          <label for="username" class="form-label">Usuario</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </div>
    </form>
  </div>
</div>

</body>
</html>