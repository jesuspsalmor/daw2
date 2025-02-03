<?php
include_once("./modelo/Equipo.php");
include_once("./modelo/DAOEquipo.php");
include_once("./controlador/ControladorEquipo.php");
include_once("./modelo/Jugador.php");
include_once("./modelo/DAOJugador.php");
include_once("./controlador/ControladorJugador.php");
include_once("./controlador/Controlador.php");

// Obtener segmentos de la URI
$uri = $_SERVER["PATH_INFO"];
$uri = explode("/", $uri);

// Verificar que haya al menos 2 segmentos
if (isset($uri[1]) && $uri[1] == "jugadores") {
    $jugadores = new ControladorJugador();
    $jugadores->jugadores();
} else if (isset($uri[1]) && $uri[1] == "equipos") {
    // Lógica específica para equipos
} else {
    header("HTTP/1.1 400 BAD REQUEST");
    echo json_encode(array($uri));
}
?>
