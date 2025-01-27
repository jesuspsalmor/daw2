
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = isset($_POST['accion']) ? $_POST['accion'] : '';
    switch ($accion) {
        case 'nuevaVenta':
            include_once("../DAO/DAOVentas.php");
            include_once("../DAO/DAOProducto.php");
            include_once("../../Models/Producto.php");
            include_once("../../Models/Ventas.php");
            include_once("../../Models/Usuario.php");
            session_start(); // Asegúrate de iniciar la sesión
            $usuarioId = $_SESSION['id']; 
            $productoId = $_POST['producto_id'];
            $cantidad = $_POST['cantidad'];
        
            $producto = DAOProducto::leerProducto($productoId);
        
            if ($producto) {
                if ($producto->getStock() >= $cantidad) {
                    $precioTotal = $producto->getPrecio() * $cantidad;
        
                    $venta = DAOVenta::crearVenta($usuarioId, $productoId, $cantidad, $precioTotal);
        
                    if ($venta) {
                        // Reducir el stock del producto
                        $resultadoActualizacion = DAOProducto::actualizarStock($productoId, $cantidad);
        
                        if ($resultadoActualizacion) {
                            echo "Venta creada exitosamente y stock actualizado.";
                        } else {
                            $_SESSION['error_mensaje'] = "Venta creada exitosamente, pero error al actualizar el stock.";
                        }
                    } else {
                        $_SESSION['error_mensaje'] = "Error al crear la venta.";
                    }
                } else {
                    $_SESSION['error_mensaje'] = "Stock insuficiente para realizar la venta.";
                }
            } else {
                $_SESSION['error_mensaje'] = "Producto no encontrado.";
            }
            header("Location: ../../index.php"); // Redirecciona a tu lista de productos
            exit();
            break;
        
        
        
        default:
            # code...
            break;
    }
}

    
?>