<form action="APP/Controllers/ControllerUsuario" method="post">
    <label for="nombreUsuario" name="labelnombreUsuario" id="labelnombreUsuario">Nombre de usuario:</label>
    <input type="text" name="nombreUsuario" id="nombreUsuario">

    <label for="contrasena1" name="contrasena1" id="labelContrasena">Introduca contraseña</label>
    <input type="password" name="contrasena1" id="contrasena1">

    <button type="submit" name="accion" value="iniciarSesion">Iniciar Sesion</button>
</form>

<form action="APP/Controllers/ControllerUsuario" method="post">
<button type="submit" name="accion" value="regitrarUsuario">crear nuevo usuario</button>
</form>