
<form action="../../APP/Controllers/ControllerUsuario.php" method="post" name="formRegistro">
  <legend> <p>datos Personales</p>
  
    <label for="nombreUsuario" name="labelnombreUsuario" id="labelnombreUsuario">Nombre de usuario</label>
    <input type="text" name="nombreUsuario" id="nombreUsuario">

    <label for="email" name="labelemail" id="labelemail" >Correo eelectronico</label>
    <input type="text" name="email" id="email">  

    <label for="fechaNacimiento" name=""></label>
    <input type="date" name="fechaNacimiento" id="">
  </legend>

  <legend><p>Contraseña mínimo 8 caracteres y al final una mayúscula, una minúscula y un numero </p>
  <label for="contrasena1" name="contrasena1" id="labelContrasena">Introduca contraseña</label>
  <input type="password" name="contrasena1" id="contrasena1">
  <label for="contrasena2" name="contrasena2" id="contrasena2"> Repita Contraseña</label>
  <input type="password" name="contrasena2" id="contrasena2"> 
  </legend> 

  <button type="submit" name="accion" value="infoRegistro">Crear Cuenta</button>

</form>
