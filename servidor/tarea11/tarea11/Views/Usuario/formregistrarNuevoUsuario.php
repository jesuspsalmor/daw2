<?php
session_start();

// Obtener los errores y datos de la sesión
$errores = isset($_SESSION['errores']) ? $_SESSION['errores'] : [];
$datos = isset($_SESSION['datos']) ? $_SESSION['datos'] : [];
?>

<form method="POST" action="../../APP/Controllers/ControllerUsuario.php">
    <label for="nombreUsuario" id="labelnombreUsuario">Nombre de usuario:</label>
    <input type="text" name="nombreUsuario" id="nombreUsuario" value="<?= isset($datos['nombreUsuario']) ? htmlspecialchars($datos['nombreUsuario']) : '' ?>">
    <?php if (!empty($errores['nombreUsuario'])): ?>
        <span class="error"><?= htmlspecialchars($errores['nombreUsuario']) ?></span>
    <?php endif; ?>
    <?php if (!empty($errores['usuarioexistente'])): ?>
        <span class="error">Nombre de usuario no disponible</span>
    <?php endif; ?>


    <label for="email" id="labelEmail">Email:</label>
    <input type="email" name="email" id="email" value="<?= isset($datos['email']) ? htmlspecialchars($datos['email']) : '' ?>">
    <?php if (!empty($errores['email'])): ?>
        <span class="error"><?= htmlspecialchars($errores['email']) ?></span>
    <?php endif; ?>
    <?php if (!empty($errores['emailexistente'])): ?>
        <span class="error">Correo electrónico no disponible</span>
    <?php endif; ?>


    <label for="fechaNacimiento" id="labelFechaNacimiento">Fecha de nacimiento (YYYY-MM-DD):</label>
    <input type="text" name="fechaNacimiento" id="fechaNacimiento" value="<?= isset($datos['fechaNacimiento']) ? htmlspecialchars($datos['fechaNacimiento']) : '' ?>">
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
    <?php if (!empty($errores['contraseñaPar'])): ?>
        <span class="error"><?= htmlspecialchars($errores['contraseñaPar']) ?></span>
    <?php endif; ?>


    <button type="submit" name="accion" value="infoRegistro">Crear nuevo usuario</button>
</form>

<?php
// Limpiar los errores de la sesión después de mostrarlos
unset($_SESSION['errores']);
?>
<script>
document.querySelector("form").addEventListener("submit", function(event) {
    console.log("Contraseña 1:", document.getElementById("contraseña1").value);
    console.log("Contraseña 2:", document.getElementById("contraseña2").value);
});
</script>
