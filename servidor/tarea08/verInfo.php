<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Información del Formulario</title>
    
</head>
<body>
    <h1>Información del Formulario</h1>
    <div class="info-group">
        <label>Nombre: </label>
        <span><?php echo $_SESSION['nombre'] ?? 'No proporcionado'; ?></span>
    </div>

    <div class="info-group">
        <label>Apellido: </label>
        <span><?php echo $_SESSION['apellido'] ?? 'No proporcionado'; ?></span>
    </div>

    <div class="info-group">
        <label>Campo Alfanumérico: </label>
        <span><?php echo $_SESSION['alfanumerico'] ?? 'No proporcionado'; ?></span>
    </div>

    <div class="info-group">
        <label>Campo Alfanumérico 2: </label>
        <span><?php echo $_SESSION['alfanumerico2'] ?? 'No proporcionado'; ?></span>
    </div>

    <div class="info-group">
        <label>Fecha de Nacimiento: </label>
        <span><?php echo $_SESSION['fecha_nacimiento'] ?? 'No proporcionado'; ?></span>
    </div>

    <div class="info-group">
        <label>Radio Seleccionado: </label>
        <span><?php echo $_SESSION['radio'] ?? 'No proporcionado'; ?></span>
    </div>

    <div class="info-group">
        <label>Valor del Combobox: </label>
        <span><?php echo $_SESSION['combobox'] ?? 'No proporcionado'; ?></span>
    </div>

    <div class="info-group">
        <label>Checkboxes Seleccionados: </label>
        <span>
            <?php
            if (isset($_SESSION['checks'])) {
                echo implode(', ', $_SESSION['checks']);
            } else {
                echo 'No proporcionado';
            }
            ?>
        </span>
    </div>

    <div class="info-group">
        <label>Número de Teléfono: </label>
        <span><?php echo $_SESSION['telefono'] ?? 'No proporcionado'; ?></span>
    </div>

    <div class="info-group">
        <label>Email: </label>
        <span><?php echo $_SESSION['email'] ?? 'No proporcionado'; ?></span>
    </div>

    <div class="info-group">
        <label>Contraseña: </label>
        <span><?php echo isset($_SESSION['contrasena']) ? '********' : 'No proporcionado'; ?></span>
    </div>

    <div class="info-group">
        <label>Documento Subido: </label>
        <span><?php echo $_FILES['documento']['name'] ?? 'No proporcionado'; ?></span>
    </div>
</body>
</html>
