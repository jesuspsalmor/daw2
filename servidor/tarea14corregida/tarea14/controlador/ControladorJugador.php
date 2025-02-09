<?php
include_once("controlador/Controlador.php");

class ControladorJugador extends Controlador {
    public function jugadores() {
        $string = $this->getQueryStringParams();
        $uri = $this->getUriSegments();
        switch ($_SERVER["REQUEST_METHOD"]) {
            case "GET":
                
                if (isset($uri[2]) && is_numeric($uri[2])) {
                    try {
                        $codJugador = intval($uri[2]);
                        $jugador = DAOJugador::readbyPk($codJugador);
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
                            $this->sendOutput(json_encode(['message' => 'Jugador no encontrado']), array("Content-Type: application/json", "HTTP/1.1 204 No content"));
                        }
                    } catch (Exception $e) {
                        $this->sendOutput(json_encode(['error' => 'Error al obtener el jugador: ' . $e->getMessage()]), array("Content-Type: application/json", "HTTP/1.1 500 Internal Server Error"));
                    }
                    
                } else {
                    try {
                        parse_str($_SERVER['QUERY_STRING'], $parametros);
                        if (!empty($parametros) && $this->validarParametros($parametros)) {
                            $jugadores = DAOJugador::readWithParams($parametros);
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
                                $this->sendOutput(json_encode(['message' => 'Jugadores no encontrados']), array("Content-Type: application/json", "HTTP/1.1 204 No content"));

                            }
                        } else {
                            // Intentar leer todos los jugadores si no hay parámetros
                            $jugadores = DAOJugador::readAll();
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
                                $this->sendOutput(json_encode(['message' => 'No hay jugadores que mostrar']), array("Content-Type: application/json", "HTTP/1.1 204 No content"));
                            }
                        }
                    } catch (Exception $e) {
                        $this->sendOutput(json_encode(['error' => 'Error al obtener los jugadores: ' . $e->getMessage()]), array("Content-Type: application/json", "HTTP/1.1 500 Internal Server Error"));
                    }
                }
                break;
               

            case "POST":
                $input = (array) json_decode(file_get_contents('php://input'), TRUE);
                if (!empty($input['codEquipo']) && !empty($input['nombre']) && !empty($input['posicion']) && !empty($input['sueldo'])) {
                    try {
                        DAOJugador::create($input['codEquipo'], $input['nombre'], $input['posicion'], $input['sueldo']);
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
                        DAOJugador::update($input['CodJugador'], $input['CodEquipo'], $input['Nombre'], $input['Posicion'], $input['Sueldo']);
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
                            $deleted = DAOJugador::delete($codJugador);
                            if ($deleted) {
                                $this->sendOutput(json_encode(array(
                                    "message" => "Jugador eliminado exitosamente",
                                    "codJugador" => $codJugador
                                )), array("Content-Type: application/json", "HTTP/1.1 200 OK"));
                            } else {
                                $this->sendOutput(json_encode(array(
                                    "message" => "Jugador no encontrado",
                                    "codJugador" => $codJugador
                                )), array("Content-Type: application/json", "HTTP/1.1 404 Not Found"));
                            }
                        } catch (Exception $e) {
                            $this->sendOutput(json_encode(array('error' => $e->getMessage())), array("Content-Type: application/json", "HTTP/1.1 500 Internal Server Error"));
                        }
                    } else {
                        $this->sendOutput(json_encode(array('error' => 'ID del jugador no proporcionado')), array("Content-Type: application/json", "HTTP/1.1 400 Bad Request"));
                    }
                    break;
                

            default:
                header("HTTP/1.1 400 BAD REQUEST");
                break;
        }
    }

    function validarParametros($parametros) {
        foreach ($parametros as $key => $value) {
            if (!in_array($key, ['sueldomin', 'sueldomax', 'Nombre', 'CodEquipo', 'CodJugador', 'Posicion'])) {
                return false;
            }
        }
        return true;
    }
}
?>
