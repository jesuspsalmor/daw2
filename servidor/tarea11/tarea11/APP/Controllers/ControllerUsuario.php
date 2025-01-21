
   <?php
  
   session_start();
   echo "Directorio actual controller usuario: " . getcwd() . "<br>";
    if(isset($_SESSION['usuario'])){
        $usuario=$_SESSION['usuario'];
        echo"sesioniniciada";
        // include_once("./../../Views/BotonUsusario.php");
    }else{
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
            $contrasena=$_POST['contrasena'];
            
            //comprobar credenciales

        break;
        
        case 'registrarUsuario':
            header("Location: ../../Views/Usuario/formrRegistrarUsuario.php");
           
        break;
        case 'infoRegistro':
            
                
            // Validar datos
            include( "../DAO/DAOUsuario.php");
            include("../SA/SAUsuario/SAUsuarioValidaciones.php");
            $errores = [];
        
            $nombreUsuario = $_POST['nombreUsuario'];
            $email = $_POST['email'];
            $contraseña1 = $_POST['contrasena1'];
            $contraseña2 = $_POST['contrasena2'];
        
            $errores['nombreUsuario'] = validarNombreUsuario($nombreUsuario);
            $errores['email'] = validarEmail($email);
            $errores['contraseña'] = validarParContrasena($contraseña1, $contraseña2);
            $errores['contraseñaCompleta'] = validarContrasena($contraseña1);
            $errores['usuarioexistente']=ComprobarNombreDeUsuario($nombreUsuario);
                ///jesuspabLo8
        
            if (empty($errores)) {
                // Iniciar sesión con datos

                //$contraseñaHash = password_hash($contraseña1, PASSWORD_DEFAULT);

                header("Location:../../index.php");
                  
                    
            } else {
                // Devolver los errores al formulario
                header("Location:../../index.php");
                    
            }
            break;
                
        default:
                echo "error";
            break;
    }
}
?>





   



