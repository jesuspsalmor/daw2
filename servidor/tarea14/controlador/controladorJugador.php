<?php
include_once("controlador/Controlador.php");



class ControladorJugador extends Controlador{
    public function jugadores(){
        $string = $this->getQueryStringParams();
        $uri = $this->getUriSegments();
        switch($_SERVER["REQUEST_METHOD"]){
            case "GET":
              
                 $jugadores = DAOJugador::leerTodosJugadores();
                  $jugadoresArray = []; 
                  foreach ($jugadores as $jugador) { 
                    $jugadoresArray[] =
                     [ 'CodEquipo' => $jugador->getCodEquipo(), 
                     'CodJugador' => $jugador->getCodJugador(),
                      'Nombre' => $jugador->getNombre(), 
                      'Posicion' => $jugador->getPosicion(), 
                      'Sueldo' => $jugador->getSueldo() ]; }
                $this->sendOutput(json_encode(array($jugadoresArray)), array("Content-Type: application/json", "HTTP/1.1 200 OK"));
               
            case "POST":
                $this->sendOutput(json_encode(array("POST" => $_POST)), array("Content-Type: application/json", "HTTP/1.1 200 OK"));
                break;
            case "PUT":
                $this->sendOutput(json_encode(array("PUT" => "PUT")), array("Content-Type: application/json", "HTTP/1.1 200 OK"));
                break;
            case "DELETE":
                $this->sendOutput(json_encode(array("DELETE" => "DELETE")), array("Content-Type: application/json", "HTTP/1.1 200 OK"));
                break;
            default:
                header("HTTP/1.1 400 BAD REQUEST");
        }
    }
}
?>