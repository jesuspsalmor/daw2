<?php
include_once("config/configdb.php");
include_once("modelo/Jugador.php");

class DAOJugador extends Jugador {
    
    public static function create($codEquipo, $nombre, $posicion, $sueldo) {
        $pdo = null;
        try {
            $pdo = new PDO("mysql:host=" . IP . ";dbname=" . DB, USER, PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Jugadores (CodEquipo, Nombre, Posicion, Sueldo) VALUES (:codEquipo, :nombre, :posicion, :sueldo)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['codEquipo' => $codEquipo, 'nombre' => $nombre, 'posicion' => $posicion, 'sueldo' => $sueldo]);
        } catch (PDOException $e) {
            throw new Exception("Conexión fallida: " . $e->getMessage());
        } finally {
           
            if ($stmt !== null) {
                unset($stmt);
            }
       
            if ($pdo !== null) {
                unset($pdo);
            }
        }
    }
    
    
    
    public static function readAll() {
        $pdo = null;
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
        } finally {
           
            if ($stmt !== null) {
                unset($stmt);
            }
            if ($pdo !== null) {
                unset($pdo);
            }
        }
    }
    
    
    
    public static function readbyPk($codJugador) {
        $pdo = null;
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
        } finally {
           
            if ($stmt !== null) {
                unset($stmt);
            }
            if ($pdo !== null) {
                unset($pdo);
            }
        }
    }
    
    
   



    public static function readWithParams($parametros) {
        $jugadores = [];
    
        try {
            $pdo = new PDO("mysql:host=" . IP . ";dbname=" . DB, USER, PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
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
    
            $stmt = $pdo->prepare($sql);
    
            foreach ($parametros as $key => $value) {
                if ($key == "Nombre") {
                    $value = "%$value%";
                }
                $stmt->bindValue(":$key", $value);
            }
    
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
            while ($row = $stmt->fetch()) {
                $jugadores[] = new Jugador(
                    $row['CodEquipo'],
                    $row['CodJugador'],
                    $row['Nombre'],
                    $row['Posicion'],
                    $row['Sueldo']
                );
            }
        } catch (PDOException $e) {
            throw new Exception("Error al obtener los jugadores: " . $e->getMessage());
        } finally {
            if ($stmt !== null) {
                unset($stmt);
            }
            if ($pdo !== null) {
                unset($pdo);
            }
        }
    
        return $jugadores;
    }
    
    
    


    public static function update($codJugador, $codEquipo, $nombre, $posicion, $sueldo) {
        $pdo = null;
        try {
            $pdo = new PDO("mysql:host=" . IP . ";dbname=" . DB, USER, PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Jugadores SET CodEquipo = :codEquipo, Nombre = :nombre, Posicion = :posicion, Sueldo = :sueldo WHERE CodJugador = :codJugador";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['codEquipo' => $codEquipo, 'nombre' => $nombre, 'posicion' => $posicion, 'sueldo' => $sueldo, 'codJugador' => $codJugador]);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        } finally {
            
            if ($stmt !== null) {
                unset($stmt);
            }
            if ($pdo !== null) {
                unset($pdo);
            }
        }
    }
    

    public static function delete($codJugador) {
        $pdo = null;
        try {
            $pdo = new PDO("mysql:host=" . IP . ";dbname=" . DB, USER, PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM Jugadores WHERE CodJugador = :codJugador";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['codJugador' => $codJugador]);
    
            // Devuelve el número de filas afectadas
            $rowsAffected = $stmt->rowCount();
            return $rowsAffected > 0;
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        } finally {
            if ($stmt !== null) {
                unset($stmt);
            }
            if ($pdo !== null) {
                unset($pdo);
            }
        }
    }
    
    
}

?>
