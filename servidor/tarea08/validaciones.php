<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpiar errores anteriores
    $_SESSION['errores'] = [];

    // Validaciones y establecimiento de errores en la sesión
    if (empty($_POST['nombre']) || !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $_POST['nombre'])) {
        $_SESSION['errores']['nombre'] = "Nombre es obligatorio y solo puede contener letras";
    } else {
        $_SESSION['nombre'] = $_POST['nombre'];
    }

    if (!empty($_POST['apellido']) && !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $_POST['apellido'])) {
        $_SESSION['errores']['apellido'] = "Apellido solo puede contener letras";
    } else {
        $_SESSION['apellido'] = $_POST['apellido'];

    if (empty($_POST['alfanumerico']) || !ctype_alnum($_POST['alfanumerico'])) {
        $_SESSION['errores']['alfanumerico'] = "Campo alfanumérico es obligatorio y debe ser alfanumérico";
    } else {
        $_SESSION['alfanumerico'] = $_POST['alfanumerico'];
    }

    if (!empty($_POST['alfanumerico2']) && !ctype_alnum($_POST['alfanumerico2'])) {
        $_SESSION['errores']['alfanumerico2'] = "Campo alfanumérico 2 debe ser alfanumérico";
    } else {
        $_SESSION['alfanumerico2'] = $_POST['alfanumerico2'];
    }
    

    if (empty($_POST['fecha_nacimiento'])) {
        $_SESSION['errores']['fecha_nacimiento'] = "Fecha de nacimiento es obligatoria";
    } else {
        $_SESSION['fecha_nacimiento'] = $_POST['fecha_nacimiento'];
    }

    if (!isset($_POST['radio'])) {
        $_SESSION['errores']['radio'] = "Debes seleccionar una opción";
    } else {
        $_SESSION['radio'] = $_POST['radio'];
    }

    if ($_POST['combobox'] == "Seleccione") {
        $_SESSION['errores']['combobox'] = "Debes seleccionar un valor";
    } else {
        $_SESSION['combobox'] = $_POST['combobox'];
    }

    if (!isset($_POST['checks']) || count($_POST['checks']) < 1 || count($_POST['checks']) > 3) {
        $_SESSION['errores']['checks'] = "Debes seleccionar al menos una opción y máximo tres";
    } else {
        $_SESSION['checks'] = $_POST['checks'];
    }

    if (empty($_POST['telefono']) || !preg_match('/^[0-9]{9}$/', $_POST['telefono'])) {
        $_SESSION['errores']['telefono'] = "Número de teléfono es obligatorio y debe ser válido";
    } else {
        $_SESSION['telefono'] = $_POST['telefono'];
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errores']['email'] = "Email es obligatorio y debe ser válido";
    } else {
        $_SESSION['email'] = $_POST['email'];
    }

    if (empty($_POST['contrasena'])) {
        $_SESSION['errores']['contrasena'] = "Contraseña es obligatoria";
    } else {
        $_SESSION['contrasena'] = $_POST['contrasena'];
    }

    if ($_FILES['documento']['error'] == UPLOAD_ERR_NO_FILE) {
        $_SESSION['errores']['documento'] = "Debes subir un documento";
    } else {
        $_SESSION['documento'] = $_FILES['documento']['name'];
    }

    if (!empty($_SESSION['errores'])) {
        header("Location: index.php");
        exit;
    }else{
        header("Location: verInfo.php");
    }
    
    
}
}
?>
