<!-- saber si hay SESION iniciada. si no aparece el boton Login -->

<!-- si hay una usuario registrad debe a aparecer
 un boton con el nombre que abrira una modal? para cambiar datos y cerrar sesion -->
 <!-- el boton login debe abrir una modal con las el nombre y contraseña para inicar sesion y ofrecer registrase-->
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
//     <?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Verificar si el botón con id 'botonIniciarSesion' ha sido pulsado
//     if (isset($_POST['botonIniciarSesion'])) {
//         // Aquí puedes realizar la acción que desees al pulsar el botón submit
//         echo "¡El botón de iniciar sesión ha sido pulsado!";
//     }
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $accion = isset($_POST['accion']) ? $_POST['accion'] : '';
    echo"boton pulsado";
   
    switch ($accion) {
        case 'login':
            
            header("Location: Views/usuario/formInicioSesion.php"); 
            exit;

        case 'infoRegistro':
            
            echo "¡El formulario de registro ha sido enviado!";
            break;
            case 'registro':
            
            echo "¡El formulario de registro ha sido enviado!";
            break;
        
        default:
                echo "error";
            break;
    }
}
?>





   

