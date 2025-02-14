<?php
require_once('./Config/config.php');
require_once(CONTROLLERS.'ControllerJugador.php');
require_once(CONTROLLERS.'ControllerEquipo.php');

$uri = explode("/", $_SERVER['REQUEST_URI']);


if (!isset($uri[2]) || $uri[2] == '') {
    require_once(VIEWS.'index.php');
    exit;
}

switch ($uri[2]) {
    
    case 'jugadores':
        $c = new ControllerJugador();
        $c->redirect($uri[3]);
        break;
    
    case'equipos':
        $c = new ControllerEquipo();
        $c->redirect($uri[3]);
        break;
                   
    
    default:
    echo 'URI en default: ' . htmlspecialchars($uri[2]);
        require_once VIEWS.'/404.php';
        break;
}

