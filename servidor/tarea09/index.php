<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes</title>
</head>
<body>

<h1>Gestión de Clientes</h1>

<?php
require_once('funcionesBD.php');

if (isset($_POST['crear_bd'])) {
    crearBD();
}

if (!comprobarBD()) {
    echo "<p>No hay conexión a la base de datos. Haz clic en el botón para crearla.</p>";
    echo '<form method="post" action="">
            <input type="submit" name="crear_bd" value="Crear Base de Datos y Tabla">
          </form>';
} else {
    if (isset($_POST['insertar_cliente'])) {
        insertarCliente($_POST['nombre'], $_POST['apellido1'], $_POST['apellido2'], $_POST['dni'], $_POST['fecha_nacimiento'], $_POST['email']);
    }

    if (isset($_POST['actualizar_cliente'])) {
        actualizarCliente($_POST['id'], $_POST['nombre'], $_POST['apellido1'], $_POST['apellido2'], $_POST['dni'], $_POST['fecha_nacimiento'], $_POST['email']);
    }

    if (isset($_POST['borrar_cliente'])) {
        borrarCliente($_POST['id']);
    }
?>

    <h2>Insertar Nuevo Cliente</h2>
    <form method="post" action="">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido1" placeholder="Primer Apellido" required>
        <input type="text" name="apellido2" placeholder="Segundo Apellido" required>
        <input type="text" name="dni" placeholder="DNI" required>
        <input type="date" name="fecha_nacimiento" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="submit" name="insertar_cliente" value="Insertar Cliente">
    </form>

    <h2>Clientes</h2>
    <?php leerClientes(); ?>

    <h2>Actualizar Cliente</h2>
    <form method="post" action="">
        <input type="number" name="id" placeholder="ID del Cliente" required>
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido1" placeholder="Primer Apellido" required>
        <input type="text" name="apellido2" placeholder="Segundo Apellido" required>
        <input type="text" name="dni" placeholder="DNI" required>
        <input type="date" name="fecha_nacimiento" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="submit" name="actualizar_cliente" value="Actualizar Cliente">
    </form>

    <h2>Borrar Cliente</h2>
    <form method="post" action="">
        <input type="number" name="id" placeholder="ID del Cliente" required>
        <input type="submit" name="borrar_cliente" value="Borrar Cliente">
    </form>

<?php
}
?>

</body>
</html>
