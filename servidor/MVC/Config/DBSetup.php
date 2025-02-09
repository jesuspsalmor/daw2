<?php
function probarConexion(){
    $correcto = true;
    try {
        $conexion = new mysqli(IP, USER, PASS, DB);
        if ($conexion->connect_error) {
            throw new Exception("Error");
        }

    } catch (Exception $e) {
        $correcto = false;
    } finally {
        if(isset($conn)){
            $conexion->close();
        }
    }
    return $correcto;
}

function cargarBBDD(){
    try {
        $conexion = new mysqli(IP, USER, PASS);
        $comands = file_get_contents("./mvc.sql");
        $conexion->multi_query($comands);

    } catch (Exception $e) {
        echo "ha habido un problema al cargar la BBDD de ejemplo";
    } finally {
        if(isset($conn)){
            $conexion->close();
        }
    }
}