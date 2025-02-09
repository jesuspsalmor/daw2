<?php
include_once("controlador/Controlador.php");

class ControladorEquipo extends Controlador{
    public function equipos(){
        $uri = $this->getUriSegments();
        switch($_SERVER["REQUEST_METHOD"]){
            case "GET":
                if (isset($uri[2]) && is_numeric($uri[2])) {
                    try {
                        $codEquipo = intval($uri[2]);
                        $equipo = DAOEquipo::readbyPk($codEquipo);
                        if ($equipo) {
                            $equipoArray = [
                                'CodEquipo' => $equipo->getCodEquipo(),
                                'Localidad' => $equipo->getLocalidad(),
                                'Nombre' => $equipo->getNombre()
                            ];
                            $this->sendOutput(json_encode($equipoArray), array("Content-Type: application/json", "HTTP/1.1 200 OK"));
                        } else {
                            $this->sendOutput(json_encode(['message' => 'Equipo no encontrado']), array("Content-Type: application/json", "HTTP/1.1 204 No content"));
                        }
                    } catch (Exception $e) {
                        $this->sendOutput(json_encode(['error' => 'Error al obtener el equipo: ' . $e->getMessage()]), array("Content-Type: application/json", "HTTP/1.1 500 Internal Server Error"));
                    }
                } else {
                    try {
                        $equipos = DAOEquipo::readAll();
                        if (!empty($equipos)) {
                            $equiposArray = [];
                            foreach ($equipos as $equipo) {
                                $equiposArray[] = [
                                    'CodEquipo' => $equipo->getCodEquipo(),
                                    'Localidad' => $equipo->getLocalidad(),
                                    'Nombre' => $equipo->getNombre()
                                ];
                            }
                            $this->sendOutput(json_encode($equiposArray), array("Content-Type: application/json", "HTTP/1.1 200 OK"));
                        } else {
                            $this->sendOutput(json_encode(['message' => 'No hay equipos que mostrar']), array("Content-Type: application/json", "HTTP/1.1 204 No content"));
                        }
                    } catch (Exception $e) {
                        $this->sendOutput(json_encode(['error' => 'Error al obtener los equipos: ' . $e->getMessage()]), array("Content-Type: application/json", "HTTP/1.1 500 Internal Server Error"));
                    }
                }
                break;

            case "POST":
                $input = (array) json_decode(file_get_contents('php://input'), TRUE);

                if (!empty($input['localidad']) && !empty($input['nombre'])) {
                    try {
                        DAOEquipo::create($input['localidad'], $input['nombre']);
                        $this->sendOutput(json_encode(array(
                            "message" => "Equipo creado exitosamente",
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

                if (!empty($input['CodEquipo']) && !empty($input['Localidad']) && !empty($input['Nombre'])) {
                    try {
                        DAOEquipo::update($input['CodEquipo'], $input['Localidad'], $input['Nombre']);
                        $this->sendOutput(json_encode(array(
                            "message" => "Equipo actualizado exitosamente",
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
                    $codEquipo = end($urlComponents);
                    if (!empty($codEquipo)) {
                        try {
                            $deleted = DAOEquipo::borrarEquipo($codEquipo);
                            if ($deleted) {
                                $this->sendOutput(json_encode(array(
                                    "message" => "Equipo eliminado exitosamente",
                                    "codEquipo" => $codEquipo
                                )), array("Content-Type: application/json", "HTTP/1.1 200 OK"));
                            } else {
                                $this->sendOutput(json_encode(array(
                                    "error" => "Equipo no encontrado",
                                    "codEquipo" => $codEquipo
                                )), array("Content-Type: application/json", "HTTP/1.1 404 Not Found"));
                            }
                        } catch (Exception $e) {
                            $this->sendOutput(json_encode(array('error' => $e->getMessage())), array("Content-Type: application/json", "HTTP/1.1 500 Internal Server Error"));
                        }
                    } else {
                        $this->sendOutput(json_encode(array('error' => 'ID del equipo no proporcionado')), array("Content-Type: application/json", "HTTP/1.1 400 Bad Request"));
                    }
                    break;
                

            default:
                header("HTTP/1.1 400 BAD REQUEST");
        }
    }
}
?>
