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
   
    if (!isset($_SESSION['user_id'])) {
        echo '<a href="login.php">Login</a>';
        echo '<h2>Clientes</h2>';
        leerClientes();
    } else {
        echo '<form method="post" action="logout.php">
                <input type="submit" name="logout" value="Logout">
              </form>';
        echo '<p>Usuario: ' . $_SESSION['user_rol'] . '</p>';

        if (isset($_POST['insertar_cliente']) && esAdmin()) {
            insertarCliente($_POST['nombre'], $_POST['apellido1'], $_POST['apellido2'], $_POST['dni'], $_POST['fecha_nacimiento'], $_POST['email']);
        }

        if (isset($_POST['actualizar_cliente']) && estaLogueado()) {
            actualizarCliente($_POST['id'], $_POST['nombre'], $_POST['apellido1'], $_POST['apellido2'], $_POST['dni'], $_POST['fecha_nacimiento'], $_POST['email']);
        }

        if (isset($_POST['borrar_cliente']) && esAdmin()) {
            borrarCliente($_POST['id']);
        }

        if (esAdmin()) {
            include('insertar_cliente.html');
        }

        if (estaLogueado()) {
            include('actualizar_cliente.html');
        }

        echo '<h2>Clientes</h2>';
        leerClientes();

        if (esAdmin()) {
            include('borrar_cliente.html');
        }
    }
}
?>

</body>
</html>
