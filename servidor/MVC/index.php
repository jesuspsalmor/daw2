<?php
require_once('./Config/config.php');
require_once('./Config/DBSetup.php');
require_once(CONTROLLERS.'ControllerUsuario.php');

$uri = explode("/", $_SERVER['REQUEST_URI']);

if(!probarConexion()){
    cargarBBDD();
}

if (!isset($uri[2]) || $uri[2] == '') {
    require_once(VIEWS.'index.php');
    exit;
}

switch ($uri[2]) {
    case 'verUsuarios':
    case 'registrar':
        $c = new ControllerUsuario();
        $c->redirect($uri[2]);
        break;
    
    default:
    echo 'URI en default: ' . htmlspecialchars($uri[3]);
        require_once VIEWS.'/404.php';
        break;
}

