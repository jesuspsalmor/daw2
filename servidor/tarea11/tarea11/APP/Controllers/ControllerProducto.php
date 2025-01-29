<?php





if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once("../DAO/DAOProducto.php");
    include_once("../../Models/Producto.php");
    $accion = isset($_POST['accion']) ? $_POST['accion'] : '';

    switch ($accion) {
        case 'CrearProducto':
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];

            $nuevoProducto = DAOProducto::crearProducto($nombre, $descripcion, $precio);

            if ($nuevoProducto) {
         header("Location:../../index.php");
            } else {
                echo "Hubo un error al crear el producto.";
                header("Location:../../index.php");
            }
            break;

        case 'ModificarProducto':
            $productoId = $_POST['producto_id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];

            $productoModificado = DAOProducto::actualizarProducto($productoId, $nombre, $descripcion, $precio);

            if ($productoModificado) {
                header("Location:../../index.php");
            } else {
                echo "Hubo un error al modificar el producto.";
               
            }
            break;

        default:
            echo "Acción no reconocida.";
    }
} else{
    include_once("./APP/DAO/DAOProducto.php");
    include_once("./Models/Producto.php");
    
    $productos = DAOProducto::obtenerTodosLosProductos();
    
    if (isset($_SESSION['nombreUsuario'])) {
        switch ($_SESSION['rol_id']) {
            case "2":
                include_once("Views/Producto/formAñadirStock.php");
                break;
            case "1":
                include_once("Views/Producto/formAñadirStockyModificarCampos.php");
                break;
            case "3":
                include_once("Views/Producto/formComprarProducto.php");
                break;
        }
       
    } else {
        include_once("Views/Producto/verProductos.php");
    }
}
?>






