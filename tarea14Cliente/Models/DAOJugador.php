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
        $fields = array('codEquipo' => $codEquipo, 'nombre' => $nombre, 'posicion' => $posicion, 'sueldo' => $sueldo);
        $data_string = json_encode($fields);

        curl_setopt($ch, CURLOPT_URL, self::$apiBaseUrl . "/jugadores");
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
        curl_close($ch);

        return json_decode($res, true);
    }

    public static function deleteJugador($codJugador) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$apiBaseUrl . "/jugadores/" . $codJugador);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }

    public static function searchJugadores($nombre = '', $sueldomax = '', $posicion = '') {
        $params = http_build_query(array_filter([
            'Nombre' => $nombre,
            'sueldomax' => $sueldomax,
            'Posicion' => $posicion
        ]));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$apiBaseUrl . "/jugadores/?" . $params);
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

