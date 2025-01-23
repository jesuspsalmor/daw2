<?php
include("Config/conexionBDDefecto.php");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

function ComprobarNombreDeUsuario($nombreUsuario) {
    try {
        $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
        $consulta = $conexion->prepare("SELECT usuario FROM usuarios WHERE usuario = ?");
        $consulta->bind_param("s", $nombreUsuario);
        $consulta->execute();
        $resultado = $consulta->get_result();
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        $conexion->close();
    }
    return $resultado->num_rows > 0;
}
function ComprobarEmail($email) {
    try {
        $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
        $consulta = $conexion->prepare("SELECT usuario FROM usuarios WHERE email = ?");
        $consulta->bind_param("s", $email);
        $consulta->execute();
        $resultado = $consulta->get_result();
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        $conexion->close();
    }
    return $resultado->num_rows > 0;
}

function leerUsuario($usuarioId) {
    try {
        $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
        $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE id = ?");
        $consulta->bind_param("i", $usuarioId);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $usuario = $resultado->fetch_assoc();
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        $conexion->close();
    }
    return $usuario;
}

function registrarUsuario($nombreUsuario, $email, $contraseñaHash, $fechaNacimiento, $rolId = 3) {
    try {
        // Validate and format the date
        $fechaNacimientoObject = DateTime::createFromFormat('Y-m-d', $fechaNacimiento);
        if (!$fechaNacimientoObject || $fechaNacimientoObject->format('Y-m-d') !== $fechaNacimiento) {
            throw new Exception("Fecha de nacimiento no válida. El formato debe ser YYYY-MM-DD.");
        }

        $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
        $consulta = $conexion->prepare("INSERT INTO usuarios (usuario, email, contraseña, fecha_nacimiento, rol_id) VALUES (?, ?, ?, ?, ?)");
        $consulta->bind_param("ssssi", $nombreUsuario, $email, $contraseñaHash, $fechaNacimiento, $rolId);
        $resultado = $consulta->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        $conexion->close();
    }
    return $resultado;
}



function actualizarUsuario($usuarioId, $nombreUsuario, $email, $contraseñaHash, $fechaNacimiento) {
    try {
        $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
        $consulta = $conexion->prepare("UPDATE usuarios SET usuario = ?, email = ?, contraseña = ?, fecha_nacimiento = ? WHERE id = ?");
        $consulta->bind_param("ssssi", $nombreUsuario, $email, $contraseñaHash, $fechaNacimiento, $usuarioId);
        $resultado = $consulta->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        $conexion->close();
    }
    return $resultado;
}

function BorrarUsuario($usuarioId) {
    try {
        $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
        $consulta = $conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        $consulta->bind_param("i", $usuarioId);
        $resultado = $consulta->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        $conexion->close();
    }
    return $resultado;
}
?>
