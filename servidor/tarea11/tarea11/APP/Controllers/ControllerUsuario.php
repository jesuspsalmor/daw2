<?php

session_start();



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $accion = isset($_POST['accion']) ? $_POST['accion'] : '';

    switch ($accion) {
        case 'login':
            header("Location: ../../Views/Usuario/formInicioSesion.php");
            break;

        case 'iniciarSesion':
            include_once("../SA/SAUsuario/SAUsuarioValidaciones.php");
            include_once("../../Models/Usuario.php");
            include_once("../DAO/DAOUsuario.php");
            
            $nombreUsuario = $_POST['nombreUsuario'];
            $contraseña = $_POST['contrasena'];
           
            
            $nuevoUsuario= DAOUsuario::comprobarCredenciales($nombreUsuario,$contraseña);
            if ($nuevoUsuario) {
                        
                $_SESSION['id'] = $nuevoUsuario->getId();
                $_SESSION['nombreUsuario'] = $nuevoUsuario->getUsuario();
                $_SESSION['email'] = $nuevoUsuario->getEmail();
                $_SESSION['fechaNacimiento'] = $nuevoUsuario->getFechaNacimiento();
                $_SESSION['rol_id'] = $nuevoUsuario->getRolId();
            
                    
                header("Location: ../../index.php");
                 exit();
                
            } else {
                echo "Nombre de usuario o contraseña incorrectos.";
                header("Location: ../../Views/Usuario/formInicioSesion.php"); 
                break;
            }
            break;
            case 'infoUsuario':
                header("Location: ../../Views/Usuario/infoUsuario.php"); 
                break;

        case 'registrarUsuario':
            
            header("Location: ../../Views/Usuario/formregistrarNuevoUsuario.php");
            break;

            
        case 'infoRegistro':
            //usuario jesusPrueba3 contraseña  secursAr1 
            //admin1    amdiniSt2
            //moderador1  moderadOr1
            include_once("../../Models/Usuario.php");
            include_once("../DAO/DAOUsuario.php");
            include_once("../../APP/SA/SAUsuario/SAUsuarioValidaciones.php");
            $nombreUsuario = $_POST['nombreUsuario'];
            $email = $_POST['email'];
            $contraseña1 = $_POST['contrasena1']; 
            $contraseña2 = $_POST['contrasena2']; 
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
        
        case 'cambiarDatos':
            header("Location:../../Views/Usuario/formCambioDatos.php");
            break;
            case 'guardarCambiosEmailFecha':
                include_once("../SA/SAUsuario/SAUsuarioValidaciones.php");
                include_once("../DAO/DAOUsuario.php");
                $email = $_POST['email'];
                $fechaNacimiento = $_POST['fechaNacimiento'];
            
                $errores = [
                    'email' => Validaciones::validarEmail($email),
                    'fechaNacimiento' => Validaciones::validarFechaNacimiento($fechaNacimiento)
                ];
            
                $usuarioId = $_SESSION['id'];
            
                if (empty(array_filter($errores))) {
                    $resultadoEmail = DAOUsuario::actualizarEmail($usuarioId, $email);
                    $resultadoFechaNacimiento = DAOUsuario::actualizarFechaNacimiento($usuarioId, $fechaNacimiento);
            
                    if ($resultadoEmail && $resultadoFechaNacimiento) {
                        $_SESSION['email'] = $email;
                        $_SESSION['fechaNacimiento'] = $fechaNacimiento;
                        $_SESSION['mensaje'] = "Datos actualizados correctamente.";
                        header("Location: ../../Views/Usuario/infoUsuario.php");
                        exit(); // Añadido exit después de redirigir
                    } else {
                        $_SESSION['mensaje'] = "Hubo un problema al actualizar los datos.";
                    }
                } else {
                    $_SESSION['errores'] = $errores;
                    $_SESSION['mensaje'] = "Hay errores en los datos ingresados.";
                    header('Location:../../Views/Usuario/formCambioDatos.php.');
                }
            
                
                exit();
            break;
            
                     
                  
        case 'volverIndex':
            header("Location:../../index.php");
            break; 

        case 'cerrarSesion':
            session_unset();     
            session_destroy();   
            header("Location: ../../index.php");  
            exit(); 
        
        case 'CambioContraseña':
            header("Location:../../Views/Usuario/formCambioContraseña.php");
            break;
            case 'guardarCambiosContraseña':
                include_once("../DAO/DAOUsuario.php");
                include_once("../../APP/SA/SAUsuario/SAUsuarioValidaciones.php");
                $antiguaContraseña = $_POST['antigua_contraseña'];
                $nuevaContraseña = $_POST['nueva_contraseña'];
                $confirmarNuevaContraseña = $_POST['confirmar_nueva_contraseña'];
                $nombreUsuario = $_SESSION['nombreUsuario']; // Suponer que el nombre de usuario está guardado en la sesión
                $errores = [];
            
                // Verificar que se han llenado todos los campos
                if (empty($antiguaContraseña) || empty($nuevaContraseña) || empty($confirmarNuevaContraseña)) {
                    $errores['campos_vacios'] = 'Todos los campos son obligatorios.';
                }
                
                // Verificar que la antigua contraseña sea correcta sin hashearla nuevamente
                $credencialesValidas = DAOUsuario::comprobarCredenciales($nombreUsuario, $antiguaContraseña);
                if (!$credencialesValidas) {
                    $errores['antigua_contraseña'] = 'La antigua contraseña no es correcta.';
                }
            
                // Validar que las nuevas contraseñas coincidan
                $validacionParContraseña = Validaciones::validarParContrasena($nuevaContraseña, $confirmarNuevaContraseña);
                if ($validacionParContraseña !== "") {
                    $errores['par_contraseña'] = $validacionParContraseña;
                }
            
                // Validar la nueva contraseña
                $validacionNuevaContraseña = Validaciones::validarContrasena($nuevaContraseña);
                if ($validacionNuevaContraseña !== "") {
                    $errores['nueva_contraseña'] = $validacionNuevaContraseña;
                }
            
                if (empty($errores)) {
                    // Hashear la nueva contraseña
                    $hashedContrasena = password_hash($nuevaContraseña, PASSWORD_DEFAULT);
            
                    // Actualizar la contraseña en la base de datos
                    if (DAOUsuario::actualizarContraseña($nombreUsuario, $hashedContrasena)) {
                        // Redirigir con mensaje de éxito
                        $_SESSION['mensaje'] = 'Contraseña actualizada exitosamente.';
                        header("Location: ../../index.php");
                        exit;
                    } else {
                        $errores['update_failed'] = 'Hubo un problema al actualizar la contraseña. Inténtelo de nuevo.';
                    }
                }
            
                // Si hay errores, guardarlos en la sesión y redirigir de nuevo al formulario con mensajes de error
                $_SESSION['errores'] = $errores;
                header("Location:../../Views/Usuario/formCambioContraseña.php");
                exit;
                break;
            
        
         
            
              
        default:
            echo "error";
            break;
    }
}else{
    
if (isset($_SESSION['nombreUsuario'])) {
    $usuario = $_SESSION['nombreUsuario'];
    $rol_id=$_SESSION['rol_id'];
    

     include_once("Views/Usuario/BotonUsusario.php");

} else {
   
    include_once("Views/Usuario/BotonInicioSesion.php");
   
}
}
?>



   



