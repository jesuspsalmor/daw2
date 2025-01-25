<?php
include_once("../botonesNavegacion/botonVolverIndex.php");
?>
<form action="../../APP/Controllers/ControllerUsuario.php" method="POST">
    <label for="nombreUsuario" name="labelnombreUsuario" id="labelnombreUsuario">Nombre de usuario:</label>
    <input type="text" name="nombreUsuario" id="nombreUsuario">

    <label for="contrasena" name="contrasena" id="labelContrasena">Introduca contraseña</label>
    <input type="password" name="contrasena" id="contrasena">

    <button type="submit" name="accion" value="iniciarSesion">Iniciar Sesion</button>
</form>


<form action="../../APP/Controllers/ControllerUsuario.php" method="POST">
    <button type="submit" name="accion" value="registrarUsuario">Crear nuevo usuario</button>
</form>

