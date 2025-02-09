<?php
// Función para obtener todos los jugadores
function getTodosLosJugadores() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/jugadores/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    print_r($res);
    curl_close($ch);
}

// Función para obtener un jugador por ID
function getJugadorPorId($id) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/jugadores/$id");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Ejecutar la petición
    $res = curl_exec($ch);

    // Manejo de errores de cURL
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        echo 'Error: ' . $error_msg;
    } else {
        print_r($res);
    }

    // Cerrar cURL
    curl_close($ch);
}


// Función para obtener jugadores con parámetros
function getJugadoresConParams($params) {
    $url = "http://localhost/tarea14/api/jugadores/?" . http_build_query($params);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    print_r($res);
    curl_close($ch);
}

// Función para crear un nuevo jugador
function postJugador($data) {
    $ch = curl_init();
    $data_string = json_encode($data);
    curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/jugadores");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string)
    ));
    $res = curl_exec($ch);
    if ($res === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        echo 'Respuesta: ' . $res;
    }
    curl_close($ch);
}

// Función para actualizar un jugador existente
function putJugador($id, $data) {
    $ch = curl_init();
    $data_string = json_encode($data);
    curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/jugadores/$id");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string)
    ));
    $res = curl_exec($ch);
    if ($res === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        echo 'Respuesta: ' . $res;
    }
    curl_close($ch);
}

// Función para eliminar un jugador
function deleteJugador() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/jugadores/1");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    if ($res === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        echo 'Respuesta: ' . $res;
    }
    curl_close($ch);
}

// Función para obtener todos los equipos
function getTodosLosEquipos() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/equipos");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    print_r($res);
    curl_close($ch);
}

// Función para obtener un equipo por ID
function getEquipoPorId($id) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/equipos/$id");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    print_r($res);
    curl_close($ch);
}

// Función para crear un nuevo equipo
function postEquipo($data) {
    $ch = curl_init();
    $data_string = json_encode($data);
    curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/equipos");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string)
    ));
    $res = curl_exec($ch);
    if ($res === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        echo 'Respuesta: ' . $res;
    }
    curl_close($ch);
}

// Función para actualizar un equipo existente
function putEquipo($id, $data) {
    $ch = curl_init();
    $data_string = json_encode($data);
    curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/equipos/$id");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string)
    ));
    $res = curl_exec($ch);
    if ($res === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        echo 'Respuesta: ' . $res;
    }
    curl_close($ch);
}

// Función para eliminar un equipo
function deleteEquipo($id) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/equipos/$id");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    if ($res === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        echo 'Respuesta: ' . $res;
    }
    curl_close($ch);
}


//getTodosLosJugadores();
 getJugadorPorId(13);
 //getJugadoresConParams(['Nombre' => 'Jesugolea']);
 //postJugador(['codEquipo' => '1', 'nombre' => 'Jesugolea', 'posicion' => 'Defensa', 'sueldo' => '522252']);
// putJugador(1, ['CodJugador' => '1', 'CodEquipo' => '1', 'Nombre' => 'Juanjopoooo Actualizado', 'Posicion' => 'Mediocampista', 'Sueldo' => '55000']);
 //deleteJugador();
//getTodosLosEquipos();
//getEquipoPorId(10);
 //postEquipo(['localidad' => 'Palma', 'nombre' => 'Equipo Ejemplo']);
 //putEquipo(1, ['CodEquipo' => '10', 'Localidad' => 'Palma Actualizado', 'Nombre' => 'Equipo Ejemplo Actualizado']);
//deleteEquipo(13);
?>
