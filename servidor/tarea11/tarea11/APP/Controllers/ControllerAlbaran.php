<?php

include_once("Models/Ventas.php");
include_once("APP/DAO/DAOVentas.php");
include_once("APP/DAO/DAOAlbaran.php");
include_once("APP/DAO/DAOProducto.php");
include_once("Models/Producto.php");
$ventas = DAOVentas::obtenerTodasLasVentas();
$albaranes = DAOAlbaran::leerTodosLosAlbaranes();

if (isset($_SESSION['nombreUsuario'])) {
    switch ($_SESSION['rol_id']) {
        case "2":
            include_once("Views/Ventas/VerVentas.php");
            include_once("Views/Albaran/VerAlbaranes.php");
            break;
        case "1":
            include_once("Views/Ventas/formAñadirStockyModificarCampos.php");
            break;
        case "3":
            // Add any specific actions or views for role 3
            break;
        default:
            echo "Rol no identificado.";
            break;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'AñadirStock') {
    $codProducto = htmlspecialchars($_POST['producto_id']);
    $cantidad = htmlspecialchars($_POST['cantidad']);
    session_start();
    $usuarioId = $_SESSION['id'];  
    DAOAlbaran::crearAlbaran($codProducto, $cantidad, $usuarioId);
    DAOProducto::aumentarStock($codProducto, $cantidad);
    
   
    header("Location:../../index.php");
    exit;
}
?>

