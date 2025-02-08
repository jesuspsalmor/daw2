<?php
require_once('conexionBD.php');

// Función para comprobar la conexión a la base de datos
function comprobarBD() {
    try {
        $conexion = new mysqli(IP, USER, CLAVE, BD);

        if ($conexion->connect_error) {
            throw new Exception("Error de conexión: " . $conexion->connect_error);
        }

        $conexion->close();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Función para crear la base de datos utilizando un archivo SQL
function crearBD() {
    $conexion = new mysqli(IP, USER, CLAVE);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $query = file_get_contents('clientes.sql');

    if ($conexion->multi_query($query)) {
        do {
            if ($result = $conexion->store_result()) {
                $result->free();
            }
        } while ($conexion->next_result());
        echo "Base de datos y tabla creadas correctamente.";
    } else {
        echo "Error al crear la base de datos o tabla: " . $conexion->error;
    }

    $conexion->close();
}

// Función para insertar un registro en la tabla
function insertarCliente($nombre, $apellido1, $apellido2, $dni, $fecha_nacimiento, $email) {
    $conexion = new mysqli(IP, USER, CLAVE, BD);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $stmt = $conexion->prepare("INSERT INTO `clientes` (`nombre`, `apellido1`, `apellido2`, `dni`, `fecha_nacimiento`, `email`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nombre, $apellido1, $apellido2, $dni, $fecha_nacimiento, $email);

    if ($stmt->execute() === TRUE) {
        echo "Nuevo cliente insertado correctamente.";
    } else {
        echo "Error al insertar el cliente: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}

// Función para leer todos los registros de la tabla
function leerClientes() {
    $conexion = new mysqli(IP, USER, CLAVE, BD);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $sql = "SELECT * FROM `clientes`";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . " - Nombre: " . $row["nombre"] . " - Apellido1: " . $row["apellido1"] . " - Apellido2: " . $row["apellido2"] . " - DNI: " . $row["dni"] . " - Fecha de Nacimiento: " . $row["fecha_nacimiento"] . " - Email: " . $row["email"] . "<br>";
        }
    } else {
        echo "0 resultados";
    }

    $conexion->close();
}

// Función para actualizar un registro en la tabla
function actualizarCliente($id, $nombre, $apellido1, $apellido2, $dni, $fecha_nacimiento, $email) {
    $conexion = new mysqli(IP, USER, CLAVE, BD);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $stmt = $conexion->prepare("UPDATE `clientes` SET `nombre` = ?, `apellido1` = ?, `apellido2` = ?, `dni` = ?, `fecha_nacimiento` = ?, `email` = ? WHERE `id` = ?");
    $stmt->bind_param("ssssssi", $nombre, $apellido1, $apellido2, $dni, $fecha_nacimiento, $email, $id);

    if ($stmt->execute() === TRUE) {
        echo "Cliente actualizado correctamente.";
    } else {
        echo "Error al actualizar el cliente: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}

// Función para borrar un registro de la tabla
function borrarCliente($id) {
    $conexion = new mysqli(IP, USER, CLAVE, BD);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $stmt = $conexion->prepare("DELETE FROM `clientes` WHERE `id` = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute() === TRUE) {
        echo "Cliente borrado correctamente.";
    } else {
        echo "Error al borrar el cliente: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>
