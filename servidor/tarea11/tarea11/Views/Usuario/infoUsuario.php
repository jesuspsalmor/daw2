<?php
session_start(); // Asegúrate de iniciar la sesión
include_once("../botonesNavegacion/botonVolverIndex.php");

if(isset($_SESSION['nombreUsuario'])) {
    $nombreUsuario = $_SESSION['nombreUsuario'];
    $emailUsuario = $_SESSION['email'];
    $fechaNacimiento=$_SESSION['fechaNacimiento'];
    echo "<h1>Información del usuario</h1>";
    echo "<p>Nombre: $nombreUsuario</p>";
    echo "<p>Email: $emailUsuario</p>";
    echo "<p>Email: $fechaNacimiento</p>";
} else {
    echo "<p>No hay información de usuario disponible. Por favor, inicia sesión.</p>";
}

?>
<form action="../../APP/Controllers/ControllerUsuario.php" name="botonInfoUsuario" method="post">
    <button type="submit" id="botonInfoUsuario" name="accion" value="cambiarDatos" >Modificar infomacion de usuario</button>
    </form>
<form action="../../APP/Controllers/ControllerUsuario.php" name="botonInfoUsuario" method="post">
    <button type="submit" id="botonInfoUsuario" name="accion" value="cerrarSesion" >Cerrar Sesion</button>
    </form>