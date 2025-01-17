
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
                //iniciar sesion con datos 
                //validar datos
                //si error devolver a 
            header("Location: ../../Views/Usuario/formrRegistrarUsuario.php");
                //si no error
                
            header("Location:../../../../index.php");

                break;
        default:
                echo "error";
            break;
    }
}
?>





   

