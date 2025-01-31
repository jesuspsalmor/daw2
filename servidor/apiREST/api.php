<?php
include_once("Config/config.php");
include_once("Model/Persona.php");
include_once("Model/DAOPersona.php");
include_once("Controller/ControllerPersonas.php");

if(substr($_SERVER['PATH_INFO'], 0, 9) === "/personas"){
    $personas = new ControllerPersona();
    $personas->personas();
}else{
    header("HTTP/1.1 400 BAD REQUEST");
}