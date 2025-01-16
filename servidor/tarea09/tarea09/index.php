<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Clientes</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <?php
        require("./php/conexionBD.php");

        // Verificar la conexión a la base de datos
        $conexion = new mysqli(IP, USER, CLAVE, BD);

        if ($conexion->connect_error) {
            // Si no se puede conectar, mostrar el formulario para cargar la base de datos
            echo '<h2>No se pudo conectar a la base de datos. Por favor, cargue la base de datos.</h2>';
            echo '<form action="cargarBD.php" method="post">
                    <button type="submit">Cargar Base de Datos</button>
                  </form>';
        } else {
            // Si la conexión es exitosa, mostrar los botones para mostrar la tabla y acceder al formulario de inserción
            echo '<h2>Base de datos conectada exitosamente</h2>';
            echo '<form method="post">';
            echo '<button name="mostrarTabla">Mostrar Tabla</button>';
            echo '</form>';
            echo '<button onclick="location.href=\'form.php\'">Insertar Campo</button>';
        }

        $conexion->close();

        if (isset($_POST['mostrarTabla'])) {
            require('./php/mostrarTabla.php');
        }
        ?>
    </main>
</body>
</html>

