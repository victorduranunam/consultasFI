<?php
// checkSession.php

session_start();

if (!isset($_SESSION['usuario_activo'])) {
    // No hay usuario activo, redirige al login con mensaje
    $_SESSION['login_error'] = "Debes iniciar sesi&oacute;n primero";
    header("Location: /https://www.ingenieria.unam.mx/consultasfi");
    exit();
}