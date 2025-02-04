<?php
require_once('./Config/config.php');
require_once(CONTROLLERS.'ControllerJugador.php');

$uri = explode("/", $_SERVER['REQUEST_URI']);


if (!isset($uri[2]) || $uri[2] == '') {
    require_once(VIEWS.'index.php');
    exit;
}

switch ($uri[2]) {
    
    case 'buscarJugadores':
        $c = new ControllerJugador();
        $c->redirect($uri[2]);
        break;
    
    case 'vertodosJugadores':
        $c = new ControllerJugador();
        $c->redirect($uri[2]);
        break;
    case 'crearJugador':
        $c = new ControllerJugador();
        $c->redirect($uri[2]);
        break;
    case 'verEquipos':
        $c = new ControllerEquipo();
        $c->redirect($uri[2]);
        break;
    case 'crearEquipo':
        $c = new ControllerEquipo();
        $c->redirect($uri[2]);
        break;
                   
    
    default:
    echo 'URI en default: ' . htmlspecialchars($uri[3]);
        require_once VIEWS.'/404.php';
        break;
}

