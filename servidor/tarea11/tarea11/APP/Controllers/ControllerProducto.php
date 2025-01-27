<?php

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
?>

