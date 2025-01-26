<?php
include_once("Config/conexionBDDefecto.php");
include_once("../../Models/Ventas.php");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class DAOVenta {

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

    public static function actualizarVenta($ventaId, $usuarioId, $fechaCompra, $productoId, $cantidad, $precioTotal) {
        $resultado = false;
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $consulta = $conexion->prepare("UPDATE ventas SET usuario_id = ?, fecha_compra = ?, producto_id = ?, cantidad = ?, precio_total = ? WHERE id = ?");
            $consulta->bind_param("isiidi", $usuarioId, $fechaCompra, $productoId, $cantidad, $precioTotal, $ventaId);
            $resultado = $consulta->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $conexion->close();
        }
        return $resultado;
    }

    public static function borrarVenta($ventaId) {
        $resultado = false;
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $consulta = $conexion->prepare("DELETE FROM ventas WHERE id = ?");
            $consulta->bind_param("i", $ventaId);
            $resultado = $consulta->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
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
