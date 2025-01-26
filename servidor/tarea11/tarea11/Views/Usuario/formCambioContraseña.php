<?php
session_start();

include_once("../botonesNavegacion/botonVolverIndex.php");

$errores = isset($_SESSION['errores']) ? $_SESSION['errores'] : [];
?>

<form method="POST" action="../../APP/Controllers/ControllerUsuario.php">
    <label for="antigua_contraseña" id="labelAntiguaContraseña">Antigua Contraseña:</label>
    <input type="password" name="antigua_contraseña" id="antigua_contraseña" value="">
    <?php if (!empty($errores['antigua_contraseña'])): ?>
        <span class="error"><?= htmlspecialchars($errores['antigua_contraseña']) ?></span>
    <?php endif; ?>

    <label for="nueva_contraseña" id="labelNuevaContraseña">Nueva Contraseña:</label>
    <input type="password" name="nueva_contraseña" id="nueva_contraseña" value="">
    <?php if (!empty($errores['nueva_contraseña'])): ?>
        <span class="error"><?= htmlspecialchars($errores['nueva_contraseña']) ?></span>
    <?php endif; ?>

    <label for="confirmar_nueva_contraseña" id="labelConfirmarNuevaContraseña">Confirmar Nueva Contraseña:</label>
    <input type="password" name="confirmar_nueva_contraseña" id="confirmar_nueva_contraseña" value="">
    <?php if (!empty($errores['confirmar_nueva_contraseña'])): ?>
        <span class="error"><?= htmlspecialchars($errores['confirmar_nueva_contraseña']) ?></span>
    <?php endif; ?>
    <?php if (!empty($errores['par_contraseña'])): ?>
        <span class="error"><?= htmlspecialchars($errores['par_contraseña']) ?></span>
    <?php endif; ?>

    <button type="submit" name="accion" value="guardarCambiosContraseña">Guardar Cambios</button>
</form>

<?php
unset($_SESSION['errores']);
?>

