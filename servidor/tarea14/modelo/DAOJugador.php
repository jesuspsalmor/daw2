<?php
include_once("config/configdb.php");
include_once("modelo/Jugador.php");

class DAOJugador extends Jugador {
    
    public static function crearJugador($codEquipo, $nombre, $posicion, $sueldo) {
        
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Jugadores (CodEquipo, Nombre, Posicion, Sueldo) VALUES (:codEquipo, :nombre, :posicion, :sueldo)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['codEquipo' => $codEquipo, 'nombre' => $nombre, 'posicion' => $posicion, 'sueldo' => $sueldo]);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }

    public static function leerJugador($codJugador) {
        include 'configuracion_bd.php';
        try {
            $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM Jugadores WHERE CodJugador = :codJugador";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['codJugador' => $codJugador]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }

   
    
        public static function leerTodosJugadores() {
            try {
                $pdo = new PDO("mysql:host=" .IP. ";dbname=" . DB, USER, PASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM Jugadores";
                $stmt = $pdo->query($sql);
    
                $jugadores = [];
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $jugador = new Jugador(
                        $row['CodEquipo'],
                        $row['CodJugador'],
                        $row['Nombre'],
                        $row['Posicion'],
                        $row['Sueldo']
                      
                    );
                    $jugadores[] = $jugador;
                }
                return $jugadores;
            } catch (PDOException $e) {
                die("Conexión fallida: " . $e->getMessage());
            }
        }
   

    public static function leerJugadores($params) {
        include 'configuracion_bd.php';
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM Jugadores WHERE " . implode(" AND ", array_map(function($key) { return "$key = :$key"; }, array_keys($params)));
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }

    public static function actualizarJugador($codJugador, $codEquipo, $nombre, $posicion, $sueldo) {
        include 'configuracion_bd.php';
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Jugadores SET CodEquipo = :codEquipo, Nombre = :nombre, Posicion = :posicion, Sueldo = :sueldo WHERE CodJugador = :codJugador";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['codEquipo' => $codEquipo, 'nombre' => $nombre, 'posicion' => $posicion, 'sueldo' => $sueldo, 'codJugador' => $codJugador]);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }

    public static function borrarJugador($codJugador) {
        include 'configuracion_bd.php';
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM Jugadores WHERE CodJugador = :codJugador";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['codJugador' => $codJugador]);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }
}

?>
