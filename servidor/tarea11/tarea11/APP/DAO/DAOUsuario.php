<?php
include_once("Config/conexionBDDefecto.php");
include_once("../../Models/Usuario.php");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class DAOUsuario {
   
    
    public static function comprobarCredenciales($nombreUsuario, $contraseña) {
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $consulta = $conexion->prepare("SELECT id, usuario, email, fecha_nacimiento, rol_id FROM usuarios WHERE usuario = ? AND contraseña = ?");
            $consulta->bind_param("ss", $nombreUsuario, $contraseña);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $usuario = $resultado->fetch_assoc();
    
            if ($usuario) {
                $nuevousuario = new Usuario($usuario['id'], $usuario['usuario'], $usuario['email'], $usuario['fecha_nacimiento'], $usuario['rol_id']);
                return $nuevousuario;
            } else {
                return null;
            }
    
        } catch (Exception $e) {
                echo $e->getMessage();
        } finally {
                $conexion->close();
        }
    }
        
      
    
    

    public static function comprobarNombreDeUsuario($nombreUsuario) {
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

    public static function comprobarEmail($email) {
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

    public static function leerUsuario($usuarioId) {
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


    public static function registrarUsuario($nombreUsuario, $email, $contraseñaHash, $fechaNacimiento, $rolId = 3) {
        $usuario = null;
        try {
            // Validar y formatear la fecha
            $fechaNacimientoObject = DateTime::createFromFormat('Y-m-d', $fechaNacimiento);
            if (!$fechaNacimientoObject || $fechaNacimientoObject->format('Y-m-d') !== $fechaNacimiento) {
                throw new Exception("Fecha de nacimiento no válida. El formato debe ser YYYY-MM-DD.");
            }

            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $consulta = $conexion->prepare("INSERT INTO usuarios (usuario, email, contraseña, fecha_nacimiento, rol_id) VALUES (?, ?, ?, ?, ?)");
            $consulta->bind_param("ssssi", $nombreUsuario, $email, $contraseñaHash, $fechaNacimiento, $rolId);
            $consulta->execute();

            // Obtener el ID del usuario recién insertado
            $usuarioId = $conexion->insert_id;  // `insert_id` devuelve el ID generado por la última consulta de inserción

            // Crear un objeto Usuario con el ID y los otros datos
            if ($usuarioId) {
                $usuario = new Usuario($usuarioId, $nombreUsuario, $email, $fechaNacimiento, $rolId);
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $conexion->close();
        }
        return $usuario;
    }


    public static function actualizarUsuario($usuarioId, $nombreUsuario, $email, $contraseñaHash, $fechaNacimiento) {
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

    public static function borrarUsuario($usuarioId) {
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
}
?>
