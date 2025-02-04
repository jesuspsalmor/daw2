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
        if ($row) {
            return new Equipo($row['CodEquipo'], $row['Localidad'], $row['Nombre']);
        }
        return null;
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
        curl_close($ch);

        return json_decode($res, true);
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
