<?php
include_once("config/configdb.php");
include_once("modelo/Jugador.php");

class DAOJugador extends Jugador {
    
    public static function crearJugador($codEquipo, $nombre, $posicion, $sueldo) {
        try {
           
            
            $pdo = new PDO("mysql:host=" . IP . ";dbname=" . DB, USER, PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Jugadores (CodEquipo, Nombre, Posicion, Sueldo) VALUES (:codEquipo, :nombre, :posicion, :sueldo)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['codEquipo' => $codEquipo, 'nombre' => $nombre, 'posicion' => $posicion, 'sueldo' => $sueldo]);
        } catch (PDOException $e) {
            throw new Exception("Conexión fallida: " . $e->getMessage());
        }
    }
    
    public static function leerTodosJugadores() {
        try {
            $pdo = new PDO("mysql:host=" . IP . ";dbname=" . DB, USER, PASS);
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
    
    public static function leerJugador($codJugador) {
        
        try {
            $pdo = new PDO("mysql:host=" . IP . ";dbname=" . DB, USER, PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM Jugadores WHERE CodJugador = :codJugador";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['codJugador' => $codJugador]);
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return new Jugador(
                    $row['CodEquipo'],
                    $row['CodJugador'],
                    $row['Nombre'],
                    $row['Posicion'],
                    $row['Sueldo']
                );
            } else {
                return null;
            }
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }
    
   



    public static function getJugadoresConParametros($parametros) {
        $jugadores = array();
        
        try {
            $conexion = new PDO("mysql:host=" . IP . ";dbname=" . DB, USER, PASS);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM jugadores";
            
            if (!empty($parametros)) {
                $sql .= " WHERE";
                $filtros = [];
    
                foreach ($parametros as $key => $value) {
                    if ($key == "sueldomin") {
                        $filtros[] = "sueldo >= :$key";
                    } elseif ($key == "sueldomax") {
                        $filtros[] = "sueldo <= :$key";
                    } elseif ($key == "Nombre") {
                        $filtros[] = "$key LIKE :$key";
                    } else {
                        $filtros[] = "$key = :$key";
                    }
                }
    
                $sql .= " " . implode(" AND ", $filtros);
            }
    
            $consulta = $conexion->prepare($sql);
    
            foreach ($parametros as $key => $value) {
               
                if ($key == "Nombre") {
                    $value = "%$value%";
                }
                $consulta->bindValue(":$key", $value);
            }
    
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
    
            while ($fila = $consulta->fetch()) {
                $jugadores[] = new Jugador(
                    $fila['CodEquipo'],
                    $fila['CodJugador'],
                    $fila['Nombre'],
                    $fila['Posicion'],
                    $fila['Sueldo']
                );
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            unset($conexion);
            unset($consulta);
        }
    
        return $jugadores;
    }
    


    public static function actualizarJugador($codJugador, $codEquipo, $nombre, $posicion, $sueldo) {
      
        try {
            $pdo = new PDO("mysql:host=" . IP . ";dbname=" . DB, USER, PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Jugadores SET CodEquipo = :codEquipo, Nombre = :nombre, Posicion = :posicion, Sueldo = :sueldo WHERE CodJugador = :codJugador";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['codEquipo' => $codEquipo, 'nombre' => $nombre, 'posicion' => $posicion, 'sueldo' => $sueldo, 'codJugador' => $codJugador]);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }

    public static function borrarJugador($codJugador) {
       
        try {
            $pdo = new PDO("mysql:host=" . IP . ";dbname=" . DB, USER, PASS);
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
