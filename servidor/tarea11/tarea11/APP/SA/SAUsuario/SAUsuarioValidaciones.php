<?php
function validarNombreUsuario($nombre) {
    if (empty($nombre)) {
        return "El nombre de usuario no puede estar en blanco.";
    } else {
        return "OK";
    }
}

function validarEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "OK";
    } else {
        return "El correo electrónico no es válido.";
    }
}

function validarParContrasena($contraseña1, $contraseña2) {
    if ($contraseña1 === $contraseña2) {
        return "OK";
    } else {
        return "Las contraseñas no coinciden.";
    }
}

function validarContrasena($contraseña) {
    if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $contraseña)) {
        return "OK";
    } else {
        return "La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula y un número.";
    }
}


?>