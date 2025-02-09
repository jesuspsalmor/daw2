<?php

include_once("Models/Equipo.php");

class DAOEquipo {
    private static $apiBaseUrl = 'http://localhost/tarea14/api';

    public static function getAllEquipos() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$apiBaseUrl . "/equipos");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($res, true);
        $equipos = [];
        foreach ($data as $row) {
            $equipos[] = new Equipo($row['CodEquipo'], $row['Localidad'], $row['Nombre']);
        }
        return $equipos;
    }

    public static function getEquipoById($codEquipo) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$apiBaseUrl . "/equipos/" . $codEquipo);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);
    
        $row = json_decode($res, true);
    
        if ($row && isset($row['CodEquipo'], $row['Localidad'], $row['Nombre'])) {
            return new Equipo($row['CodEquipo'], $row['Localidad'], $row['Nombre']);
        } else {
            // Manejo de errores si alguna clave no está definida
            error_log("Error al obtener el equipo: " . json_encode($row));
            return null;
        }
    }
    

    public static function createEquipo($localidad, $nombre) {
        $ch = curl_init();
        $fields = array('localidad' => $localidad, 'nombre' => $nombre);
        $data_string = json_encode($fields);
    
        curl_setopt($ch, CURLOPT_URL, self::$apiBaseUrl . "/equipos");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));
    
        $res = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    
        // Manejo de errores según el código HTTP
        if ($httpCode == 201) {
            return array('success' => true, 'message' => 'Equipo creado exitosamente.');
        } else {
            $error_message = json_decode($res, true)['message'] ?? 'Error desconocido.';
            return array('success' => false, 'message' => 'Error al crear el equipo: ' . $error_message);
        }
    }
    

    public static function updateEquipo($codEquipo, $localidad, $nombre) {
        $ch = curl_init();
        $fields = array('CodEquipo' => $codEquipo, 'Localidad' => $localidad, 'Nombre' => $nombre);
        $data_string = json_encode($fields);

        curl_setopt($ch, CURLOPT_URL, self::$apiBaseUrl . "/equipos/" . $codEquipo);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));

        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }

    public static function deleteEquipo($codEquipo) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$apiBaseUrl . "/equipos/" . $codEquipo);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }
}
?>
