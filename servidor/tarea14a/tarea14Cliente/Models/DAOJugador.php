<?php
include_once("config/config.php");
include_once("Models/Jugador.php");

class DAOJugador {
    private static $apiBaseUrl = 'http://localhost/tarea14/api';

    public static function getAllJugadores() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$apiBaseUrl . "/jugadores");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($res, true);
        $jugadores = [];
        foreach ($data as $row) {
            $jugadores[] = new Jugador($row['CodEquipo'], $row['CodJugador'], $row['Nombre'], $row['Posicion'], $row['Sueldo']);
        }
        return $jugadores;
    }

    public static function getJugadorById($codJugador) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$apiBaseUrl . "/jugadores/" . $codJugador);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);

        $row = json_decode($res, true);
        if ($row) {
            return new Jugador($row['CodEquipo'], $row['CodJugador'], $row['Nombre'], $row['Posicion'], $row['Sueldo']);
        }
        return null;
    }
    public static function createJugador($codEquipo, $nombre, $posicion, $sueldo) {
        $ch = curl_init();
        $fields = array(
            'codEquipo' => $codEquipo,
            'nombre' => $nombre,
            'posicion' => $posicion,
            'sueldo' => $sueldo
        );
        $data_string = json_encode($fields);
    
        curl_setopt($ch, CURLOPT_URL, "http://localhost/tarea14/api/jugadores");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Obtener la respuesta como string
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));
    
        $res = curl_exec($ch);
        if ($res === false) {
            return array('error' => curl_error($ch));
        }
    
        curl_close($ch);
        
        $decoded_res = json_decode($res, true);
    
        if (isset($decoded_res['message']) && $decoded_res['message'] === 'Jugador creado exitosamente') {
            return array('success' => true, 'data' => $decoded_res['data']);
        } else {
            return array('error' => 'Error al crear el jugador');
        }
    }
    
    

    public static function updateJugador($codJugador, $codEquipo, $nombre, $posicion, $sueldo) {
        $ch = curl_init();
        $fields = array('CodJugador' => $codJugador, 'CodEquipo' => $codEquipo, 'Nombre' => $nombre, 'Posicion' => $posicion, 'Sueldo' => $sueldo);
        $data_string = json_encode($fields);
    
        curl_setopt($ch, CURLOPT_URL, self::$apiBaseUrl . "/jugadores/" . $codJugador);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));
    
        $res = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    
        // Definir la respuesta según el código HTTP
        if ($httpCode == 200) {
            return array('success' => true, 'message' => 'Jugador actualizado exitosamente.');
        } else {
            return array('success' => false, 'message' => 'Error al actualizar el jugador.');
        }
    }
    

    public static function deleteJugador($codJugador) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$apiBaseUrl . "/jugadores/" . $codJugador);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $res = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    
        if ($httpCode == 200) {
            return array('success' => true, 'message' => 'Jugador borrado exitosamente.');
        } else {
            return array('success' => false, 'message' => 'Error al borrar el jugador.');
        }
    }
    

    public static function searchJugadores($params) {
        $filteredParams = http_build_query(array_filter($params));
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$apiBaseUrl . "/jugadores/?" . $filteredParams);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);
    
        $data = json_decode($res, true);
        $jugadores = [];
        foreach ($data as $row) {
            $jugadores[] = new Jugador($row['CodEquipo'], $row['CodJugador'], $row['Nombre'], $row['Posicion'], $row['Sueldo']);
        }
        return $jugadores;
    }
    
}
?>

