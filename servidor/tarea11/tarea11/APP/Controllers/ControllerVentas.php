
<?php


if (isset($_SESSION['nombreUsuario'])) {
    include_once("./Models/Ventas.php");

    include_once("./APP/DAO/DAOVentas.php");

    $ventas = DAOVentas::obtenerTodasLasVentas();

    switch ($_SESSION['rol_id']) {
        case "2":
            include_once("Views/Ventas/VerVentas.php");
            break;
        case "1":
            
            include_once("Views/Ventas/modificarVentas.php");
            break;
        
        case '3':
            
            break;
        default:
            echo "Rol no identificado.";
            break;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once("../DAO/DAOVentas.php");
    include_once("../DAO/DAOProducto.php");
    include_once("../../Models/Producto.php");
    include_once("../../Models/Ventas.php");
            include_once("../../Models/Usuario.php");
    $accion = isset($_POST['accion']) ? $_POST['accion'] : '';
    switch ($accion) {
        case 'nuevaVenta':
            
            session_start(); // Asegúrate de iniciar la sesión
            $usuarioId = $_SESSION['id']; 
            $productoId = $_POST['producto_id'];
            $cantidad = $_POST['cantidad'];
        
            $producto = DAOProducto::leerProducto($productoId);
        
            if ($producto) {
                if ($producto->getStock() >= $cantidad) {
                    $precioTotal = $producto->getPrecio() * $cantidad;
        
                    $venta = DAOVentas::crearVenta($usuarioId, $productoId, $cantidad, $precioTotal);
        
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
        
            case "modificarVenta":
                $ventaId = $_POST['id'];
                $cantidad = $_POST['cantidad'];
                $precioTotal = $_POST['precio_total'];
            
               
            
                $cambios = DAOVentas::actualizarVenta($ventaId, $cantidad, $precioTotal);
                if ($cambios) {
                    $_SESSION['mensaje'] = "Venta actualizada exitosamente.";
                } else {
                    $_SESSION['error_mensaje'] = "Error al actualizar la venta.";
                }
                 header("Location: ../../index.php"); 
                exit();
                break;
            
            case 'borrarVenta':
                $ventaId = $_POST['id'];
                $venta = DAOVentas::borrarVenta($ventaId);
                
               
                 header("Location: ../../index.php"); 
                exit();
            
               
                
                break;
      
        default:
            # code...
            break;
    }
}

    
?>