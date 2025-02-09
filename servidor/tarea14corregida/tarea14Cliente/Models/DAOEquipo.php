<?php

include_once("Models/Equipo.php");

class DAOEquipo {
    private static $apiBaseUrl = 'http://localhost/tarea14/api';
    public static function readAll() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$apiBaseUrl . "/equipos");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        // Ejecutar la petición
        $res = curl_exec($ch);
    
        // Manejo de errores de cURL
        if (curl_errno($ch)) {
            return ['error' => "Error en la petición cURL: " . curl_error($ch)];
        }
    
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    
        // Decodificar la respuesta JSON
        $response = json_decode($res, true);
    
        // Manejo de códigos HTTP específicos (200, 204, otros)
        if ($http_code == 204) {
            return ['error' => "No se encontraron equipos (Código 204)"];
        } elseif ($http_code != 200) {
            return ['error' => "Error en la respuesta del servidor. Código HTTP: $http_code"];
        }
    
        // Verificar las claves del array 'response' y retornar un array de objetos Equipo
        $objetos = [];
        if (is_array($response)) {
            foreach ($response as $row) {
                if (isset($row['CodEquipo'], $row['Localidad'], $row['Nombre'])) {
                    $objetos[] = new Equipo($row['CodEquipo'], $row['Localidad'], $row['Nombre']);
                } else {
                    return ['error' => 'Advertencia: Claves faltantes en un elemento de la respuesta JSON.'];
                }
            }
        } else {
            return ['error' => 'Advertencia: La respuesta no es un array.'];
        }
    
        return $objetos;
    }
    

    public static function readbyPk($codEquipo) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$apiBaseUrl . "/equipos/" . $codEquipo);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        // Ejecutar la petición
        $res = curl_exec($ch);
    
        // Manejo de errores de cURL
        if (curl_errno($ch)) {
            return ['error' => "Error en la petición cURL: " . curl_error($ch)];
        }
    
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    
        // Decodificar la respuesta JSON
        $response = json_decode($res, true);
    
        // Manejo de códigos HTTP específicos (200, 204, otros)
        if ($http_code == 204) {
            return ['error' => "No se encontraron equipos (Código 204)"];
        } elseif ($http_code != 200) {
            return ['error' => "Error en la respuesta del servidor. Código HTTP: $http_code"];
        }
    
        // Verificar las claves del array 'response' y retornar un objeto Equipo
        if (isset($response['CodEquipo'], $response['Localidad'], $response['Nombre'])) {
            return new Equipo($response['CodEquipo'], $response['Localidad'], $response['Nombre']);
        } else {
            return ['error' => 'Advertencia: Claves faltantes en la respuesta JSON.'];
        }
    }
    
    

    public static function create($localidad, $nombre) {
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
    
        // Manejo de errores de cURL
        if ($res === false) {
            return array('error' => curl_error($ch));
        }
    
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    
        $decoded_res = json_decode($res, true);
    
        // Manejo de errores según el código HTTP
        if ($httpCode == 201 && isset($decoded_res['message']) && $decoded_res['message'] === 'Equipo creado exitosamente') {
            return array('success' => true, 'message' => 'Equipo creado exitosamente.', 'data' => $decoded_res['data']);
        } else {
            $error_message = $decoded_res['message'] ?? 'Error desconocido.';
            return array('error' => 'Error al crear el equipo: ' . $error_message);
        }
    }
    
    
    public static function update($codEquipo, $localidad, $nombre) {
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
    
        // Manejo de errores de cURL
        if ($res === false) {
            return array('error' => curl_error($ch));
        }
    
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    
        $decoded_res = json_decode($res, true);
    
        // Definir la respuesta según el código HTTP
        if ($httpCode == 200 && isset($decoded_res['message']) && $decoded_res['message'] === 'Equipo actualizado exitosamente') {
            return array('success' => true, 'message' => 'Equipo actualizado exitosamente.', 'data' => $decoded_res['data']);
        } else {
            $error_message = $decoded_res['message'] ?? 'Error desconocido.';
            return array('error' => 'Error al actualizar el equipo: ' . $error_message);
        }
    }
    

    public static function delete($codEquipo) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$apiBaseUrl . "/equipos/" . $codEquipo);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $res = curl_exec($ch);
    
        // Manejo de errores de cURL
        if ($res === false) {
            return array('error' => curl_error($ch));
        }
    
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    
        // Definir la respuesta según el código HTTP
        if ($httpCode == 200) {
            return array('success' => true, 'message' => 'Equipo borrado exitosamente.');
        } else {
            $decoded_res = json_decode($res, true);
            $error_message = $decoded_res['message'] ?? 'Error desconocido.';
            return array('error' => 'Error al borrar el equipo: ' . $error_message);
        }
    }
    
}
?>
