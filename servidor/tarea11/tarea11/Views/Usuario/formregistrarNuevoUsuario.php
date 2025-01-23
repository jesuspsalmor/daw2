<?php
// Decodificar los errores de la URL
$errores = isset($_GET['errores']) ? json_decode(urldecode($_GET['errores']), true) : [];
?>

<form method="POST" action="../../APP/Controllers/ControllerUsuario.php">
    <label for="nombreUsuario" id="labelnombreUsuario">Nombre de usuario:</label>
    <input type="text" name="nombreUsuario" id="nombreUsuario" value="<?= isset($nombreUsuario) ? htmlspecialchars($nombreUsuario) : '' ?>">
    <?php if (!empty($errores['nombreUsuario'])): ?>
        <span class="error"><?= htmlspecialchars($errores['nombreUsuario']) ?></span>
    <?php endif; ?>
    <?php if (!empty($errores['usuarioexistente'])): ?>
        <span class="error">Nombre de usuario no disponible</span>
    <?php endif; ?>

    
    <label for="email" id="labelEmail">Email:</label>
    <input type="email" name="email" id="email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">

    <?php if (!empty($errores['email'])): ?>
        <span class="error"><?= htmlspecialchars($errores['emailexistente']) ?></span>
    <?php endif; ?>
    <?php if (!empty($errores['emailexistente'])): ?>
        <span class="error">Correo electronico no disponible</span>
    <?php endif; ?>


    <label for="fechaNacimiento" id="labelFechaNacimiento">Fecha de nacimiento (YYYY-MM-DD):</label>
    <input type="text" name="fechaNacimiento" id="fechaNacimiento" value="<?= isset($fechaNacimiento) ? htmlspecialchars($fechaNacimiento) : '' ?>">
    <?php if (!empty($errores['fechaNacimiento'])): ?>
        <span class="error"><?= htmlspecialchars($errores['fechaNacimiento']) ?></span>
    <?php endif; ?>


    <label for="contraseña1" id="labelContrasena1">Introduzca contraseña:</label>
    <input type="password" name="contraseña1" id="contraseña1">
    <label for="contraseña2" id="labelContrasena2">Repita la contraseña:</label>
    <input type="password" name="contraseña2" id="contraseña2">
    <?php if (!empty($errores['contraseña'])): ?>
        <span class="error"><?= htmlspecialchars($errores['contraseña']) ?></span>
    <?php endif; ?>
    <?php if (!empty($errores['contraseñaCompleta'])): ?>
        <span class="error"><?= htmlspecialchars($errores['contraseñaCompleta']) ?></span>
    <?php endif; ?>

    
    <button type="submit" name="accion" value="infoRegistro">Crear nuevo usuario</button>
</form>


