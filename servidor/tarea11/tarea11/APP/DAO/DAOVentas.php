<?php
include_once("Config/conexionBDDefecto.php");

require_once ("Models/Ventas.php");


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class DAOVentas {

    public static function crearVenta($usuarioId, $productoId, $cantidad, $precioTotal) {
        $venta = null;
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $consulta = $conexion->prepare("INSERT INTO ventas (usuario_id, producto_id, cantidad, precio_total) VALUES (?, ?, ?, ?)");
            $consulta->bind_param("iidi", $usuarioId, $productoId, $cantidad, $precioTotal);
            $consulta->execute();
    
            // Obtener el ID de la venta recién insertada
            $ventaId = $conexion->insert_id;
    
            // Crear un objeto Venta con el ID y los otros datos
            if ($ventaId) {
                $venta = new Venta($ventaId, $usuarioId, date("Y-m-d H:i:s"), $productoId, $cantidad, $precioTotal);
            }
    
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $conexion->close();
        }
        return $venta;
    }
    

    public static function leerVenta($ventaId) {
        $venta = null;
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $consulta = $conexion->prepare("SELECT * FROM ventas WHERE id = ?");
            $consulta->bind_param("i", $ventaId);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $venta = $resultado->fetch_assoc();
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $conexion->close();
        }
        return $venta;
    }

    
    

    public static function borrarVenta($ventaId) {
        $resultado = false;
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            if ($conexion->connect_error) {
                throw new Exception('Error de conexión: ' . $conexion->connect_error);
            }
            $consulta = $conexion->prepare("DELETE FROM ventas WHERE id = ?");
            if (!$consulta) {
                throw new Exception('Error en la preparación: ' . $conexion->error);
            }
            $consulta->bind_param("i", $ventaId);
            $resultado = $consulta->execute();
            if (!$resultado) {
                throw new Exception('Error en la ejecución: ' . $consulta->error);
            }
        } catch (Exception $e) {
            echo 'Excepción: ', $e->getMessage(), "\n";
        } finally {
            $consulta->close();
            $conexion->close();
        }
        return $resultado;
    }
    
    // Método para obtener todas las ventas
    public static function obtenerTodasLasVentas() {
        $ventas = [];
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $resultado = $conexion->query("SELECT * FROM ventas");
            while ($venta = $resultado->fetch_assoc()) {
                $ventas[] = new Venta($venta['id'], $venta['usuario_id'], $venta['fecha_compra'], $venta['producto_id'], $venta['cantidad'], $venta['precio_total']);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $conexion->close();
        }
        return $ventas;
    }
}
?>
