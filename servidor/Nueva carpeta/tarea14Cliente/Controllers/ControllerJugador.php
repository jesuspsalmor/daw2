<?php
require_once('./Config/config.php');
require_once(MODELS . 'Jugador.php');
require_once(MODELS . 'DAOJugador.php');

class ControllerJugador {
    public function redirect($action) {
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                switch ($action) {
                    case 'form-buscarJugadores':
                        require_once(VIEWS . 'Jugadores/form-buscarJugadores.php');
                        break;

                    case 'form-verJugadores':
                        $jugadores = DAOJugador::getAllJugadores();
                        require_once(VIEWS . 'Jugadores/form-verJugadores.php');
                        break;

                    case 'form-crearJugadores':
                        require_once(VIEWS . 'Jugadores/form-crearJugador.php');
                        break;

                    default:
                    echo "get";
                        break;
                }
                break;

            case 'POST':
                switch ($action) {
                    case 'form-verJugadores':
                        $jugadores = [];
                        if (isset($_POST['id'])) {
                            $id = $_POST['id'];
                            $jugadores = DAOJugador::getJugadorById($id);
                        } else {
                            $params = [
                                'Nombre' => $_POST['Nombre'] ?? '',
                                'sueldomax' => $_POST['sueldomax'] ?? '',
                                'Posicion' => $_POST['Posicion'] ?? ''
                            ];
                            $jugadores = DAOJugador::searchJugadores($params);
                        }
                        require_once(VIEWS . 'Jugadores/form-verJugadores.php');
                        break;

                    case 'form-crearJugador':
                        $codEquipo = $_POST['codEquipo'] ?? null;
                        $nombre = $_POST['nombre'] ?? null;
                        $posicion = $_POST['posicion'] ?? null;
                        $sueldo = $_POST['sueldo'] ?? null;

                        if ($codEquipo && $nombre && $posicion && $sueldo) {
                            $resultado = DAOJugador::createJugador($codEquipo, $nombre, $posicion, $sueldo);

                            if ($resultado && isset($resultado['success']) && $resultado['success'] == true) {
                                $mensaje = "Jugador creado correctamente.";
                            } else {
                                $mensaje = "Error al crear el jugador.";
                            }
                        } else {
                            $mensaje = "Todos los campos son obligatorios.";
                        }

                        require_once(VIEWS . 'Jugadores/form-crearJugador.php');
                        break;
                    
                        case 'form-actualizarJugador':
                            $codJugador = $_POST['codJugador'];
                            $codEquipo = $_POST['codEquipo'];
                            $nombre = $_POST['nombre'];
                            $posicion = $_POST['posicion'];
                            $sueldo = $_POST['sueldo'];
                            
                            $resultado = DAOJugador::updateJugador($codJugador, $codEquipo, $nombre, $posicion, $sueldo);
                            
                           
                            if (isset($resultado['success']) && $resultado['success']) {
                                header("Location: /tarea14Cliente/jugadores/form-verJugadores");
                            } else {
                                echo "Error al actualizar el jugador: " . ($resultado['message'] ?? 'Ocurrió un error desconocido.');
                            }
                            break;
                        
                        case 'form-borrarJugador': 
                            $codJugador = $_POST['codJugadorBorrar']; 
                            $resultado = DAOJugador::deleteJugador($codJugador);
                            if (isset($resultado['success']) && $resultado['success']) {
                                header("Location: /tarea14Cliente/jugadores/form-verJugadores");
                            } else {
                                echo "Error al borrar el jugador: " . ($resultado['message'] ?? 'Ocurrió un error desconocido.');
                            }
                       
                    default:
                        echo "POST";
                        break;
                }
                break;

          

            default:
                echo "Método no soportado: $method";
                break;
        }
    }
}
?>

