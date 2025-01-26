<?php
include_once("Config/conexionBDDefecto.php");

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class DAOProducto {

    public static function crearProducto($nombreProducto, $descripcion, $precio, $stock, $categoriaId) {
        $producto = null;
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $consulta = $conexion->prepare("INSERT INTO productos (nombre, descripcion, precio, stock, categoria_id) VALUES (?, ?, ?, ?, ?)");
            $consulta->bind_param("ssdii", $nombreProducto, $descripcion, $precio, $stock, $categoriaId);
            $consulta->execute();

            // Obtener el ID del producto recién insertado
            $productoId = $conexion->insert_id;

            // Crear un objeto Producto con el ID y los otros datos
            if ($productoId) {
                $producto = new Producto($productoId, $nombreProducto, $descripcion, $precio, $stock, $categoriaId);
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $conexion->close();
        }
        return $producto;
    }

    public static function leerProducto($productoId) {
        $producto = null;
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $consulta = $conexion->prepare("SELECT * FROM productos WHERE id = ?");
            $consulta->bind_param("i", $productoId);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $productoArray = $resultado->fetch_assoc();
    
            if ($productoArray) {
                $producto = new Producto($productoArray['id'], $productoArray['nombre'], $productoArray['descripcion'], $productoArray['precio'], $productoArray['stock']);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $conexion->close();
        }
        return $producto;
    }
    

    public static function actualizarProducto($productoId, $nombreProducto, $descripcion, $precio, $stock, $categoriaId) {
        $resultado = false;
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $consulta = $conexion->prepare("UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, stock = ?, categoria_id = ? WHERE id = ?");
            $consulta->bind_param("ssdiii", $nombreProducto, $descripcion, $precio, $stock, $categoriaId, $productoId);
            $resultado = $consulta->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $conexion->close();
        }
        return $resultado;
    }
    public static function actualizarStock($productoId, $cantidadVendida) {
        $resultado = false;
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $consulta = $conexion->prepare("UPDATE productos SET stock = stock - ? WHERE id = ?");
            $consulta->bind_param("ii", $cantidadVendida, $productoId);
            $resultado = $consulta->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $conexion->close();
        }
        return $resultado;
    }
    

    public static function borrarProducto($productoId) {
        $resultado = false;
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $consulta = $conexion->prepare("DELETE FROM productos WHERE id = ?");
            $consulta->bind_param("i", $productoId);
            $resultado = $consulta->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $conexion->close();
        }
        return $resultado;
    }

    // Método para obtener todos los productos
    public static function obtenerTodosLosProductos() {
        $productos = [];
        try {
            $conexion = new mysqli(IPD, USERD, CLAVED, BDD);
            $resultado = $conexion->query("SELECT * FROM productos");
            while ($producto = $resultado->fetch_assoc()) {
                $productos[] = new Producto($producto['id'], $producto['nombre'], $producto['descripcion'], $producto['precio'], $producto['stock']);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $conexion->close();
        }
        return $productos;
    }
}
?>
