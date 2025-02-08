<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Validación</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="POST" action="validaciones.php" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nombre*: </label>
            <input type="text" name="nombre" value="<?php echo $_SESSION['nombre'] ?? ''; ?>">
            <span class="error"><?php echo $_SESSION['errores']['nombre'] ?? ''; ?></span>
        </div>

        <div class="form-group">
            <label>Apellido: </label>
            <input type="text" name="apellido" value="<?php echo $_SESSION['apellido'] ?? ''; ?>">
            <span class="error"><?php echo $_SESSION['errores']['apellido'] ?? ''; ?></span>
        </div>

        <div class="form-group">
            <label>Campo Alfanumérico*: </label>
            <input type="text" name="alfanumerico" value="<?php echo $_SESSION['alfanumerico'] ?? ''; ?>">
            <span class="error"><?php echo $_SESSION['errores']['alfanumerico'] ?? ''; ?></span>
        </div>

        <div class="form-group">
            <label>Campo Alfanumérico 2: </label>
            <input type="text" name="alfanumerico2" value="<?php echo $_SESSION['alfanumerico2'] ?? ''; ?>">
            <span class="error"><?php echo $_SESSION['errores']['alfanumerico2'] ?? ''; ?></span>
        </div>

        <div class="form-group">
            <label>Fecha de Nacimiento*: </label>
            <input type="date" name="fecha_nacimiento" value="<?php echo $_SESSION['fecha_nacimiento'] ?? ''; ?>">
            <span class="error"><?php echo $_SESSION['errores']['fecha_nacimiento'] ?? ''; ?></span>
        </div>

        <div class="form-group">
            <label>Fecha de Segundo Nacimiento: </label>
            <input type="date" name="fecha_segundo_nacimiento" value="<?php echo $_SESSION['fecha_segundo_nacimiento'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label>Opciones Radio*: </label>
            <input type="radio" name="radio" value="opcion1" <?php echo (isset($_SESSION['radio']) && $_SESSION['radio'] == 'opcion1') ? 'checked' : ''; ?>> Opción 1
            <input type="radio" name="radio" value="opcion2" <?php echo (isset($_SESSION['radio']) && $_SESSION['radio'] == 'opcion2') ? 'checked' : ''; ?>> Opción 2
            <input type="radio" name="radio" value="opcion3" <?php echo (isset($_SESSION['radio']) && $_SESSION['radio'] == 'opcion3') ? 'checked' : ''; ?>> Opción 3
            <span class="error"><?php echo $_SESSION['errores']['radio'] ?? ''; ?></span>
        </div>

        <div class="form-group">
            <label>Combobox*:</label>
            <select name="combobox">
                <option value="Seleccione">Seleccione un valor</option>
                <option value="opcion1" <?php echo (isset($_SESSION['combobox']) && $_SESSION['combobox'] == 'opcion1') ? 'selected' : ''; ?>>Opción 1</option>
                <option value="opcion2" <?php echo (isset($_SESSION['combobox']) && $_SESSION['combobox'] == 'opcion2') ? 'selected' : ''; ?>>Opción 2</option>
                <option value="opcion3" <?php echo (isset($_SESSION['combobox']) && $_SESSION['combobox'] == 'opcion3') ? 'selected' : ''; ?>>Opción 3</option>
            </select>
            <span class="error"><?php echo $_SESSION['errores']['combobox'] ?? ''; ?></span>
        </div>

        <div class="form-group">
            <label>Checkboxes*:</label>
            <input type="checkbox" name="checks[]" value="check1" <?php echo (isset($_SESSION['checks']) && in_array('check1', $_SESSION['checks'] ?? [])) ? 'checked' : ''; ?>> Check 1
            <input type="checkbox" name="checks[]" value="check2" <?php echo (isset($_SESSION['checks']) && in_array('check2', $_SESSION['checks'] ?? [])) ? 'checked' : ''; ?>> Check 2
            <input type="checkbox" name="checks[]" value="check3" <?php echo (isset($_SESSION['checks']) && in_array('check3', $_SESSION['checks'] ?? [])) ? 'checked' : ''; ?>> Check 3
            <input type="checkbox" name="checks[]" value="check4" <?php echo (isset($_SESSION['checks']) && in_array('check4', $_SESSION['checks'] ?? [])) ? 'checked' : ''; ?>> Check 4
            <input type="checkbox" name="checks[]" value="check5" <?php echo (isset($_SESSION['checks']) && in_array('check5', $_SESSION['checks'] ?? [])) ? 'checked' : ''; ?>> Check 5
            <input type="checkbox" name="checks[]" value="check6" <?php echo (isset($_SESSION['checks']) && in_array('check6', $_SESSION['checks'] ?? [])) ? 'checked' : ''; ?>> Check 6
            <span class="error"><?php echo $_SESSION['errores']['checks'] ?? ''; ?></span>
        </div>

        <div class="form-group">
            <label>Número de Teléfono*: </label>
            <input type="tel" name="telefono" value="<?php echo $_SESSION['telefono'] ?? ''; ?>">
            <span class="error"><?php echo $_SESSION['errores']['telefono'] ?? ''; ?></span>
        </div>

        <div class="form-group">
            <label>Email*: </label>
            <input type="email" name="email" value="<?php echo $_SESSION['email'] ?? ''; ?>">
            <span class="error"><?php echo $_SESSION['errores']['email'] ?? ''; ?></span>
        </div>

        <div class="form-group">
            <label>Contraseña*: </label>
            <input type="password" name="contrasena">
            <span class="error"><?php echo $_SESSION['errores']['contrasena'] ?? ''; ?></span>
        </div>

        <div class="form-group">
            <label>Subir Documento*: </label>
            <input type="file" name="documento">
            <span class="error"><?php echo $_SESSION['errores']['documento'] ?? ''; ?></span>
        </div>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
