<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Public/styles.css">
</head>
<header>
    <div class="latienda">
        <h1>La Tienda</h1>
    </div>
    <div class="usuario">
    <?php
include_once("../botonesNavegacion/botonVolverIndex.php");
?>
    </div>
    </header>
<body>
<div class="login">


<form action="../../APP/Controllers/ControllerUsuario.php" method="POST">
    <label for="nombreUsuario" name="labelnombreUsuario" id="labelnombreUsuario">Nombre de usuario:</label>
    <input type="text" name="nombreUsuario" id="nombreUsuario">

    <label for="contrasena" name="contrasena" id="labelContrasena">Introduca contraseña</label>
    <input type="password" name="contrasena" id="contrasena">

    <button type="submit" name="accion" value="iniciarSesion">Iniciar Sesion</button>
</form>

</div>
<div class="login">
<form action="../../APP/Controllers/ControllerUsuario.php" method="POST">
    <button type="submit" name="accion" value="registrarUsuario">Crear nuevo usuario</button>
</form>
</div>

</body>
</html>
