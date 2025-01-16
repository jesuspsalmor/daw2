<?php

include("Config/conexionBD.php");
include("Config/conexionBDDefecto.php");

$conexion = new mysqli(IP, USER, CLAVE, BD);

if ($conexion->connect_error) {
    try {
        $conexion = new mysqli(IPD, USERD, CLAVED);
        $commands = file_get_contents("Config/tienda.sql");
        $conexion->multi_query($commands);
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        $conexion?->close();
    }
} else {
    $conexion->close();
}
?>

