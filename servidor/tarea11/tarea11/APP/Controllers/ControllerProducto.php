
<?php

    include_once("./APP/DAO/DAOProducto.php");
    include_once("./Models/Producto.php");

if (isset($_SESSION['nombreUsuario'])) {
    
    
    
    $productos=DAOProducto::obtenerTodosLosProductos();
    include_once("Views/Producto/formComprarProducto.php");

} else {
     $productos=DAOProducto::obtenerTodosLosProductos();
     include_once("Views/Producto/verProductos.php");
   
}
?>