<?php
include_once("config/configdb.php");
include_once("modelo/Equipo.php");

class DAOEquipo extends Equipo {
    
    public static function create($localidad, $nombre) {
        $pdo = null;
        try {
            $pdo = new PDO("mysql:host=" . IP . ";dbname=" . DB, USER, PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Equipos (Localidad, Nombre) VALUES (:localidad, :nombre)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['localidad' => $localidad, 'nombre' => $nombre]);
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
            $sql = "SELECT * FROM Equipos";
            $stmt = $pdo->query($sql);
    
            $equipos = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $equipo = new Equipo(
                    $row['CodEquipo'],
                    $row['Localidad'],
                    $row['Nombre']
                );
                $equipos[] = $equipo;
            }
            return $equipos;
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
    

    public static function readbyPk($codEquipo) {
        $pdo = null;
        try {
            $pdo = new PDO("mysql:host=" . IP . ";dbname=" . DB, USER, PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM Equipos WHERE CodEquipo = :codEquipo";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['codEquipo' => $codEquipo]);
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return new Equipo(
                    $row['CodEquipo'],
                    $row['Localidad'],
                    $row['Nombre']
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
    

    public static function update($codEquipo, $localidad, $nombre) {
        $pdo = null;
        try {
            $pdo = new PDO("mysql:host=" . IP . ";dbname=" . DB, USER, PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Equipos SET Localidad = :localidad, Nombre = :nombre WHERE CodEquipo = :codEquipo";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['localidad' => $localidad, 'nombre' => $nombre, 'codEquipo' => $codEquipo]);
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
    

    public static function borrarEquipo($codEquipo) {
        $pdo = null;
        try {
            $pdo = new PDO("mysql:host=" . IP . ";dbname=" . DB, USER, PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM Equipos WHERE CodEquipo = :codEquipo";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['codEquipo' => $codEquipo]);
    
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
