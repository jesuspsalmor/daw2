<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Public/styles.css">
</head>
<body>
    <div class="contenedor">

    
<?php
session_start();

include_once("../botonesNavegacion/botonVolverIndex.php");

$errores = isset($_SESSION['errores']) ? $_SESSION['errores'] : [];
?>

<form method="POST" action="../../APP/Controllers/ControllerUsuario.php">
    <label for="email" id="labelEmail">Email:</label>
    <input type="email" name="email" id="email" value="<?= isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : '' ?>">
    <?php if (!empty($errores['email'])): ?>
        <span class="error"><?= htmlspecialchars($errores['email']) ?></span>
    <?php endif; ?>
    <?php if (!empty($errores['emailexistente'])): ?>
        <span class="error">Correo electrónico no disponible</span>
    <?php endif; ?>

    <label for="fechaNacimiento" id="labelFechaNacimiento">Fecha de nacimiento (YYYY-MM-DD):</label>
    <input type="text" name="fechaNacimiento" id="fechaNacimiento" value="<?= isset($_SESSION['fechaNacimiento']) ? htmlspecialchars($_SESSION['fechaNacimiento']) : '' ?>">
    <?php if (!empty($errores['fechaNacimiento'])): ?>
        <span class="error"><?= htmlspecialchars($errores['fechaNacimiento']) ?></span>
    <?php endif; ?>

    <button type="submit" name="accion" value="guardarCambiosEmailFecha">Guardar Cambios</button>
</form>

<!-- Formulario de cambio de contraseña -->
<form method="POST" action="../../APP/Controllers/ControllerUsuario.php">
    <button type="submit" name="accion" value="CambioContraseña">Cambiar Contraseña</button>
</form>

<?php
unset($_SESSION['errores']);
?>


</div>
</body>
</html>
