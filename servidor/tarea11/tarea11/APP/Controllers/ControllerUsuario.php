<?php

session_start();
echo "Directorio actual controller usuario: " . getcwd() . "<br>";

if (isset($_SESSION['nombreUsuario'])) {
    $usuario = $_SESSION['nombreUsuario'];
    echo "sesioniniciada";
     include_once("Views/Usuario/BotonUsusario.php");
} else {
    echo "sesion no iniciada";
    include_once("Views/Usuario/botonInicioSesion.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $accion = isset($_POST['accion']) ? $_POST['accion'] : '';

    switch ($accion) {
        case 'login':
            header("Location: ../../Views/Usuario/formInicioSesion.php");
            break;

        case 'iniciarSesion':
            include_once("../SA/SAUsuario/SAUsuarioValidaciones.php");
            include_once("../../Models/Usuario.php");
            
            $nombre = $_POST['nombreUsuario'];
            $contrasena = $_POST['contrasena'];
            $contraseñaHash = password_hash($contraseña, PASSWORD_DEFAULT);
            $nuevoUsuario=new Usuario;
            $nuevoUsuario= comprobarCredenciales($nombreUsuario,$contraseñaHash);
           
            break;
            case 'infoUsuario':
                header("Location: ../../Views/Usuario/infoUsuario.php"); 
                break;

        case 'registrarUsuario':
            
            header("Location: ../../Views/Usuario/formregistrarNuevoUsuario.php");
            break;

            
        case 'infoRegistro':
            //usuario jesusPrueba contraseña  secursAr1
            include_once("../../Models/Usuario.php");
            include_once("../DAO/DAOUsuario.php");
            include_once("../../APP/SA/SAUsuario/SAUsuarioValidaciones.php");
            $nombreUsuario = $_POST['nombreUsuario'];
            $email = $_POST['email'];
            $contraseña1 = $_POST['contraseña1']; 
            $contraseña2 = $_POST['contraseña2']; 
            $fechaNacimiento = $_POST['fechaNacimiento'];
                
            $_SESSION['errores'] = Validaciones::validarTodo($nombreUsuario, $email, $contraseña1, $contraseña2, $fechaNacimiento);
                      
            if (DAOUsuario::comprobarNombreDeUsuario($nombreUsuario)) {
                $_SESSION['errores']['usuarioexistente'] = 'Nombre de usuario no disponible';
            }
                
            if (DAOUsuario::comprobarEmail($email)) {
                $_SESSION['errores']['emailexistente'] = 'Correo electrónico no disponible';
            }
            $_SESSION['datos'] = [
                'nombreUsuario' => $nombreUsuario,
                'email' => $email,
                'fechaNacimiento' => $fechaNacimiento,
            ];
               
            if (empty($_SESSION['errores'])) {
                $contraseñaHash = password_hash($contraseña1, PASSWORD_DEFAULT);
                $nuevoUsuario = DAOUsuario::registrarUsuario($nombreUsuario, $email, $contraseñaHash, $fechaNacimiento);
                
                if ($nuevoUsuario) {
                        
                    $_SESSION['id'] = $nuevoUsuario->getId();
                    $_SESSION['nombreUsuario'] = $nuevoUsuario->getUsuario();
                    $_SESSION['email'] = $nuevoUsuario->getEmail();
                    $_SESSION['fechaNacimiento'] = $nuevoUsuario->getFechaNacimiento();
                    $_SESSION['rol_id'] = $nuevoUsuario->getRolId();
                
                        
                    header("Location: ../../index.php");
                     exit();
                } else {
                    $_SESSION['errores']['registro'] = 'Error al registrar el usuario. Inténtelo de nuevo más tarde.';
                    header("Location: ../../Views/Usuario/formregistrarNuevoUsuario.php");
                    exit();
                }
    
            } else {
                          
                header("Location: ../../Views/Usuario/formregistrarNuevoUsuario.php");
                exit();
            }
            break;
                
                
          
            
        default:
            echo "error";
            break;
    }
}
?>



   



