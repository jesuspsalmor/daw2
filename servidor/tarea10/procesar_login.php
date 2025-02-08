<?php
session_start();
require_once('conexionBD.php');

if (isset($_POST['nombre']) && isset($_POST['contrasena'])) {
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];

    $conexion = new mysqli(IP, USER, CLAVE, BD);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $stmt = $conexion->prepare("SELECT `id`, `rol` FROM `usuarios` WHERE `nombre` = ? AND `contrasena` = ?");
    $stmt->bind_param("ss", $nombre, $contrasena);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $rol);
        $stmt->fetch();
        $_SESSION['user_id'] = $id;
        $_SESSION['user_rol'] = $rol;
        header("Location: index.php");
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }

    $stmt->close();
    $conexion->close();
} else {
    echo "Por favor, complete todos los campos.";
}
?>
