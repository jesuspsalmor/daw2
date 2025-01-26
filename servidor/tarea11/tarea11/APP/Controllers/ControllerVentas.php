
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
            $usuarioId = $_SESSION['id']; 
            $productoId = $_POST['producto_id'];
            $cantidad = $_POST['cantidad'];
        
           
            $producto = DAOProducto::leerProducto($productoId);
        
            if ($producto) {
                $precioTotal = $producto->getPrecio() * $cantidad;
        
                
                $venta = DAOVenta::crearVenta($usuarioId, $productoId, $cantidad, $precioTotal);
        
                if ($venta) {
                    echo "Venta creada exitosamente.";
                } else {
                    echo "Error al crear la venta.";
                }
            } else {
                echo "Producto no encontrado.";
            }
        
            break;
        
        
        default:
            # code...
            break;
    }
}

    
?>