<?php

session_start();
echo "Directorio actual controller usuario: " . getcwd() . "<br>";

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    echo "sesioniniciada";
    // include_once("./../../Views/BotonUsusario.php");
} else {
    echo "sesion no iniciada";
    include_once("Views/usuario/botonInicioSesion.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $accion = isset($_POST['accion']) ? $_POST['accion'] : '';

    switch ($accion) {
        case 'login':
            header("Location: ../../Views/Usuario/formInicioSesion.php");
            break;

        case 'iniciarSesion':
            include("../SA/SAUsuario/SAUsuarioValidaciones.php");
            $nombre = $_POST['nombreUsuario'];
            $contrasena = $_POST['contrasena'];
            
            // comprobar credenciales

            break;

        case 'registrarUsuario':
            
            header("Location: ../../Views/Usuario/formregistrarNuevoUsuario.php");
            break;

        case 'infoRegistro':

            // Validar datos
            include("../DAO/DAOUsuario.php");
            include("../SA/SAUsuario/SAUsuarioValidaciones.php");
            $errores = [];

            $nombreUsuario = $_POST['nombreUsuario'];
            $email = $_POST['email'];
            $contraseña1 = $_POST['contrasena1'];
            $contraseña2 = $_POST['contrasena2'];
            $fechaNacimiento = $_POST['fechaNacimiento'];

            $errores['nombreUsuario'] = validarNombreUsuario($nombreUsuario);
            $errores['email'] = validarEmail($email);
            $errores['contraseña'] = validarParContrasena($contraseña1, $contraseña2);
            $errores['contraseñaCompleta'] = validarContrasena($contraseña1);
            $errores['usuarioexistente'] = ComprobarNombreDeUsuario($nombreUsuario);
            $errores['fechaNacimiento'] = validarFechaNacimiento($fechaNacimiento);

            // Filtro los errores que no tengan mensajes (es decir, que sean válidos)
            $errores = array_filter($errores);

            if (empty($errores)) {
                //strongPassMu8
                $contraseñaHash = password_hash($contraseña1, PASSWORD_DEFAULT);

                // Registrar el usuario en la base de datos
                $resultadoRegistro = registrarUsuario($nombreUsuario, $email, $contraseñaHash, $fechaNacimiento);

                if ($resultadoRegistro) {
                    // Guardar valores de usuario en la sesión
                    $_SESSION['nombreUsuario'] = $nombreUsuario;
                    $_SESSION['email'] = $email;
                    $_SESSION['fechaNacimiento'] = $fechaNacimiento;

                    // Redireccionar a la página principal
                    header("Location:../../index.php");
                } else {
                    // Manejar el error en el registro
                    $errores['registro'] = 'Error al registrar el usuario. Inténtelo de nuevo más tarde.';
                    // Devolver los errores al formulario
                    header("Location:../../index.php?errores=" . urlencode(json_encode($errores)));
                }
            } else {
                // Devolver los errores al formulario
                 header("Location: ../../Views/Usuario/formregistrarNuevoUsuario.php?errores=" . urlencode(json_encode($errores)));
                // header("Location:../../index.php?errores=" . urlencode(json_encode($errores)));
            }
            break;

        default:
            echo "error";
            break;
    }
}
?>



   



