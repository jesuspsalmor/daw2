<?php
include_once("controlador/Controlador.php");



class ControladorJugador extends Controlador{
    public function jugadores(){
        $string = $this->getQueryStringParams();
        $uri = $this->getUriSegments();
        switch($_SERVER["REQUEST_METHOD"]){
            case "GET":
                // Si uri[2] contiene un número, se busca jugador por id. Si no, se buscan jugadores con parámetros o se muestran todos los jugadores
                if (isset($uri[2]) && is_numeric($uri[2])) {
                    $codJugador = intval($uri[2]);
                    $jugador = DAOJugador::leerJugador($codJugador);
                    if ($jugador) {
                        $jugadorArray = [
                            'CodEquipo' => $jugador->getCodEquipo(),
                            'CodJugador' => $jugador->getCodJugador(),
                            'Nombre' => $jugador->getNombre(),
                            'Posicion' => $jugador->getPosicion(),
                            'Sueldo' => $jugador->getSueldo()
                        ];
                        $this->sendOutput(json_encode($jugadorArray), array("Content-Type: application/json", "HTTP/1.1 200 OK"));
                    } else {
                        $this->sendOutput(json_encode(['error' => 'Jugador no encontrado']), array("Content-Type: application/json", "HTTP/1.1 404 Not Found"));
                    }
                } else {
                    parse_str($_SERVER['QUERY_STRING'], $parametros);
                    if (!empty($parametros)) {
                        // Llama al DAO para obtener jugadores que cumplan con los parámetros
                        $jugadores = DAOJugador::getJugadoresConParametros($parametros);
                        if (!empty($jugadores)) {
                            $jugadoresArray = [];
                            foreach ($jugadores as $jugador) {
                                $jugadoresArray[] = [
                                    'CodEquipo' => $jugador->getCodEquipo(),
                                    'CodJugador' => $jugador->getCodJugador(),
                                    'Nombre' => $jugador->getNombre(),
                                    'Posicion' => $jugador->getPosicion(),
                                    'Sueldo' => $jugador->getSueldo()
                                ];
                            }
                            $this->sendOutput(json_encode($jugadoresArray), array("Content-Type: application/json", "HTTP/1.1 200 OK"));
                        } else {
                            $this->sendOutput(json_encode(['error' => 'Jugadores no encontrados']), array("Content-Type: application/json", "HTTP/1.1 404 Not Found"));
                        }
                    } else {
                        $jugadores = DAOJugador::leerTodosJugadores();
                        $jugadoresArray = [];
                        foreach ($jugadores as $jugador) {
                            $jugadoresArray[] = [
                                'CodEquipo' => $jugador->getCodEquipo(),
                                'CodJugador' => $jugador->getCodJugador(),
                                'Nombre' => $jugador->getNombre(),
                                'Posicion' => $jugador->getPosicion(),
                                'Sueldo' => $jugador->getSueldo()
                            ];
                        }
                        $this->sendOutput(json_encode($jugadoresArray), array("Content-Type: application/json", "HTTP/1.1 200 OK"));
                    }
                }
                break;
            
            
            
            
            case "POST":
                $input = (array) json_decode(file_get_contents('php://input'), TRUE);
            
                if (!empty($input['codEquipo']) && !empty($input['nombre']) && !empty($input['posicion']) && !empty($input['sueldo'])) {
                    try {
                           
                        DaoJugador::crearJugador($input['codEquipo'], $input['nombre'], $input['posicion'], $input['sueldo']);
                        $this->sendOutput(json_encode(array(
                            "message" => "Jugador creado exitosamente",
                            "data" => $input
                        )), array("Content-Type: application/json", "HTTP/1.1 201 Created"));
                    } catch (Exception $e) {
                        $this->sendOutput(json_encode(array('error' => $e->getMessage())), array("Content-Type: application/json", "HTTP/1.1 500 Internal Server Error"));
                    }
                } else {
                    $this->sendOutput(json_encode(array('error' => 'Datos incompletos')), array("Content-Type: application/json", "HTTP/1.1 400 Bad Request"));
                }
                break;
                
            
                
            case "PUT":
                $input = (array) json_decode(file_get_contents('php://input'), TRUE);
                
                if (!empty($input['CodJugador']) && !empty($input['CodEquipo']) && !empty($input['Nombre']) && !empty($input['Posicion']) && !empty($input['Sueldo'])) {
                    try {
                               
                        DaoJugador::actualizarJugador($input['CodJugador'], $input['CodEquipo'], $input['Nombre'], $input['Posicion'], $input['Sueldo']);
                         $this->sendOutput(json_encode(array(
                        "message" => "Jugador actualizado exitosamente",
                        "data" => $input
                        )), array("Content-Type: application/json", "HTTP/1.1 200 OK"));
                    } catch (Exception $e) {
                        $this->sendOutput(json_encode(array('error' => $e->getMessage())), array("Content-Type: application/json", "HTTP/1.1 500 Internal Server Error"));
                    }
                } else {
                    $this->sendOutput(json_encode(array('error' => 'Datos incompletos')), array("Content-Type: application/json", "HTTP/1.1 400 Bad Request"));
                }
                break;
                    
       
            case "DELETE":
                $urlComponents = explode('/', $_SERVER['REQUEST_URI']);
                $codJugador = end($urlComponents);
            
                if (!empty($codJugador)) {
                    try {
                        
                        DaoJugador::borrarJugador($codJugador);
                        $this->sendOutput(json_encode(array(
                            "message" => "Jugador eliminado exitosamente",
                            "codJugador" => $codJugador
                        )), array("Content-Type: application/json", "HTTP/1.1 200 OK"));
                    } catch (Exception $e) {
                        $this->sendOutput(json_encode(array('error' => $e->getMessage())), array("Content-Type: application/json", "HTTP/1.1 500 Internal Server Error"));
                    }
                } else {
                    $this->sendOutput(json_encode(array('error' => 'ID del jugador no proporcionado')), array("Content-Type: application/json", "HTTP/1.1 400 Bad Request"));
                }
                break;
            default:
                header("HTTP/1.1 400 BAD REQUEST");
        }
    }
}
?>