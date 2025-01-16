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
    
   
   ?>