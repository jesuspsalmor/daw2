<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar/Modificar Cliente</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <h2><?php echo isset($_POST['id']) ? 'Modificar Cliente' : 'Insertar Cliente'; ?></h2>
        <form action="insertarModificarCliente.php" method="post" class="formulario">
            <legend>Datos Personales</legend>
            
            <input type="hidden" name="id" value="<?php echo isset($_POST['id']) ? $_POST['id'] : ''; ?>">

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?>" required>

            <label for="apellido1">Apellido 1:</label>
            <input type="text" id="apellido1" name="apellido1" value="<?php echo isset($_POST['apellido1']) ? $_POST['apellido1'] : ''; ?>" required>

            <label for="apellido2">Apellido 2:</label>
            <input type="text" id="apellido2" name="apellido2" value="<?php echo isset($_POST['apellido2']) ? $_POST['apellido2'] : ''; ?>" required>

            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" value="<?php echo isset($_POST['dni']) ? $_POST['dni'] : ''; ?>" required>

            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : ''; ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>

            <input type="submit" value="<?php echo isset($_POST['id']) ? 'Modificar' : 'Insertar'; ?>">
        </form>
        <button onclick="location.href='index.php'">Volver</button>
    </main>    
</body>
</html>
