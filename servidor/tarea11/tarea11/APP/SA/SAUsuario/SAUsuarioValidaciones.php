<?php
class Validaciones {
    public static function validarNombreUsuario($nombre) {
        if (empty($nombre)) {
            return "El nombre de usuario no puede estar en blanco.";
        }
        return "";
    }

    public static function validarEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "";
        }
        return "El correo electrónico no es válido.";
    }

    public static function validarParContrasena($contraseña1, $contraseña2) {
        if ($contraseña1 === $contraseña2) {
            return "";
        }
        return "Las contraseñas no coinciden.";
    }

    public static function validarContrasena($contraseña) {
        if (preg_match('/^.{8,}[a-z][A-Z]\d$/', $contraseña)) {
            return "";
        }
        return "Contraseña mínimo 8 caracteres y al final una mayúscula, una minúscula y un numero";
    }

    public static function validarFechaNacimiento($fecha) {
        $fechaActual = date("Y-m-d");
        if (empty($fecha)) {
            return "La fecha de nacimiento no puede estar en blanco.";
        } elseif ($fecha >= $fechaActual) {
            return "La fecha de nacimiento no puede ser en el futuro.";
        }
        return "";
    }

    public static function validarTodo($nombre, $email, $contraseña1, $contraseña2, $fecha) {
        $errores = [];
        if ($error = self::validarNombreUsuario($nombre)) {
            $errores['nombreUsuario'] = $error;
        }
        if ($error = self::validarEmail($email)) {
            $errores['email'] = $error;
        }
        if ($error = self::validarParContrasena($contraseña1, $contraseña2)) {
            $errores['contraseñaPar'] = $error;
        }
        if ($error = self::validarContrasena($contraseña1)) {
            $errores['contraseña'] = $error;
        }
        if ($error = self::validarFechaNacimiento($fecha)) {
            $errores['fechaNacimiento'] = $error;
        }
        return $errores;
    }
}
?>
