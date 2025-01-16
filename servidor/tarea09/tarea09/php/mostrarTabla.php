<?php
function mostrarTabla() {
    require("./php/conexionBD.php");
    $conexion = new mysqli(IP, USER, CLAVE, BD);

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    $sql = "SELECT * FROM clientes";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido 1</th>
                <th>Apellido 2</th>
                <th>DNI</th>
                <th>Fecha de Nacimiento</th>
                <th>Email</th>
                <th>Acciones</th>
              </tr>";
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . $fila['nombre'] . "</td>";
            echo "<td>" . $fila['apellido1'] . "</td>";
            echo "<td>" . $fila['apellido2'] . "</td>";
            echo "<td>" . $fila['dni'] . "</td>";
            echo "<td>" . $fila['fecha_nacimiento'] . "</td>";
            echo "<td>" . $fila['email'] . "</td>";
            echo "<td><form method='post' action='form.php'>
                    <input type='hidden' name='id' value='" . $fila['id'] . "'>
                    <input type='hidden' name='nombre' value='" . $fila['nombre'] . "'>
                    <input type='hidden' name='apellido1' value='" . $fila['apellido1'] . "'>
                    <input type='hidden' name='apellido2' value='" . $fila['apellido2'] . "'>
                    <input type='hidden' name='dni' value='" . $fila['dni'] . "'>
                    <input type='hidden' name='fecha_nacimiento' value='" . $fila['fecha_nacimiento'] . "'>
                    <input type='hidden' name='email' value='" . $fila['email'] . "'>
                    <button type='submit'>Modificar</button>
                  </form></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No hay clientes registrados.";
    }
    $conexion->close();
}

mostrarTabla();
?>
