<?php
function validarNombreUsuario($nombre) {
    if (empty($nombre)) {
        return "El nombre de usuario no puede estar en blanco.";
    } else {
        return "";
    }
}

function validarEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "";
    } else {
        return "El correo electrónico no es válido.";
    }
}

function validarParContrasena($contraseña1, $contraseña2) {
    if ($contraseña1 === $contraseña2) {
        return "";
    } else {
        return "Las contraseñas no coinciden.";
    }
}

function validarContrasena($contraseña) {
    if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).*[A-Z][a-z][\d]$/', $contraseña)) {
        return "";
    } else {
        return "La contraseña debe tener al menos 8 caracteres, terminar con una mayúscula, una minúscula y un número.";
    }
}


function validarFechaNacimiento($fecha) {
    $fechaActual = date("Y-m-d");
    if (empty($fecha)) {
        return "La fecha de nacimiento no puede estar en blanco.";
    } elseif ($fecha >= $fechaActual) {
        return "La fecha de nacimiento no puede ser en el futuro.";
    } else {
        return "";
    }
}
?>
