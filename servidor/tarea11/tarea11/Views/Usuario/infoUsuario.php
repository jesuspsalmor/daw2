<?php
session_start(); // Asegúrate de iniciar la sesión

if(isset($_SESSION['nombreUsuario'])) {
    $nombreUsuario = $_SESSION['nombreUsuario'];
    $emailUsuario = $_SESSION['email'];

    echo "<h1>Información del usuario</h1>";
    echo "<p>Nombre: $nombreUsuario</p>";
    echo "<p>Email: $emailUsuario</p>";
} else {
    echo "<p>No hay información de usuario disponible. Por favor, inicia sesión.</p>";
}
?>
