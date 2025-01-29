<?php
include_once("Models/Albaran.php");

class DAOAlbaran {

    
    public static function crearAlbaran( $codProducto, $cantidad, $usuarioId) {
        $resultado = false;
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $consulta = $conexion->prepare("INSERT INTO albaranes ( producto_id, cantidad, usuario_id) VALUES ( ?, ?, ?)");
            $consulta->bind_param("iii",  $codProducto, $cantidad, $usuarioId);
            $resultado = $consulta->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $conexion->close();
        }
        return $resultado;
    }
    
    
    

    public static function leerAlbaran($id) {
        $albaran = null;
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $consulta = $conexion->prepare("SELECT * FROM albaranes WHERE id = ?");
            $consulta->bind_param("i", $id);
            $consulta->execute();
            $resultado = $consulta->get_result();
            if ($fila = $resultado->fetch_assoc()) {
                $albaran = new Albaran($fila['id'], $fila['fechaAlbaran'], $fila['codProducto'], $fila['cantidad'], $fila['usuarioId']);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $conexion->close();
        }
        return $albaran;
    }


    public static function leerTodosLosAlbaranes() {
        $albaranes = array();
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $consulta = "SELECT * FROM albaranes";
            $resultado = $conexion->query($consulta);
            while ($fila = $resultado->fetch_assoc()) {
               
                $albaran = new Albaran($fila['id'], $fila['fecha_albaran'], $fila['producto_id'], $fila['cantidad'], $fila['usuario_id']);
                $albaranes[] = $albaran;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $conexion->close();
        }
        return $albaranes;
    }


    public static function actualizarAlbaran($id, $fechaAlbaran, $codProducto, $cantidad, $usuarioId) {
        $resultado = false;
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $consulta = $conexion->prepare("UPDATE albaranes SET fechaAlbaran = ?, codProducto = ?, cantidad = ?, usuarioId = ? WHERE id = ?");
            $consulta->bind_param("siiii", $fechaAlbaran, $codProducto, $cantidad, $usuarioId, $id);
            $resultado = $consulta->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $conexion->close();
        }
        return $resultado;
    }

  
    public static function eliminarAlbaran($id) {
        $resultado = false;
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $consulta = $conexion->prepare("DELETE FROM albaranes WHERE id = ?");
            $consulta->bind_param("i", $id);
            $resultado = $consulta->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $conexion->close();
        }
        return $resultado;
    }
}
?>
