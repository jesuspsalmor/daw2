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
                    case 'form-buscarObjetos':
                        require_once(VIEWS . 'Jugadores/form-buscarObjetos.php');
                        break;

                    case 'form-verObjetos':
                        $objetos = DAOJugador::readAll();
                        $error_message = '';

                        if (is_array($objetos) && isset($objetos['error'])) {
                            $error_message = $objetos['error'];
                            $objetos = null;
                        } elseif (empty($objetos)) {
                            $error_message = 'No se encontraron objetos en la base de datos.';
                        }

                        require_once(VIEWS . 'Jugadores/form-verObjetos.php');
                        break;

                    case 'form-crearObjetos':
                        require_once(VIEWS . 'Jugadores/form-crearObjeto.php');
                        break;

                    default:
                        echo "GET";
                        break;
                }
                break;

            case 'POST':
                switch ($action) {
                    case 'form-verObjetos':
                        $objetos = null;
                        $error_message = '';

                        if (isset($_POST['id'])) {
                            $id = $_POST['id'];
                            $results = DAOJugador::readbyPk($id);

                            if (is_array($results) && isset($results['error'])) {
                                $error_message = $results['error'];
                            } elseif ($results instanceof Jugador) {
                                $objetos = $results;
                            } else {
                                $error_message = 'Respuesta inesperada de la API';
                            }
                        } else {
                            $params = [
                                'Nombre' => $_POST['Nombre'] ?? '',
                                'sueldomax' => $_POST['sueldomax'] ?? '',
                                'Posicion' => $_POST['Posicion'] ?? ''
                            ];
                            $objetos = DAOJugador::readWithParams($params);

                            if (is_array($objetos) && isset($objetos['error'])) {
                                $error_message = $objetos['error'];
                                $objetos = null;
                            } elseif (empty($objetos)) {
                                $error_message = 'No se encontraron objetos con los criterios de búsqueda proporcionados.';
                            }
                        }

                        require_once(VIEWS . 'Jugadores/form-verObjetos.php');
                        break;

                    case 'form-crearObjeto':
                        $codEquipo = $_POST['codEquipo'] ?? null;
                        $nombre = $_POST['nombre'] ?? null;
                        $posicion = $_POST['posicion'] ?? null;
                        $sueldo = $_POST['sueldo'] ?? null;
                        $mensaje = '';

                        if ($codEquipo && $nombre && $posicion && $sueldo) {
                            $resultado = DAOJugador::create($codEquipo, $nombre, $posicion, $sueldo);

                            if (is_array($resultado) && isset($resultado['error'])) {
                                $mensaje = $resultado['error'];
                            } elseif ($resultado && isset($resultado['success']) && $resultado['success'] == true) {
                                $mensaje = "jugador creado correctamente.";
                            } else {
                                $mensaje = "Error inesperado al crear el objeto.";
                            }
                        } else {
                            $mensaje = "Todos los campos son obligatorios.";
                        }

                        require_once(VIEWS . 'respuesta.php');
                        break;

                        case 'form-actualizarObjeto':
                            $mensaje = '';
                            $codObjeto = $_POST['codObjeto'] ?? null;
                            $codEquipo = $_POST['codEquipo'] ?? null;
                            $nombre = $_POST['nombre'] ?? null;
                            $posicion = $_POST['posicion'] ?? null;
                            $sueldo = $_POST['sueldo'] ?? null;
                        
                            if ($codObjeto && $codEquipo && $nombre && $posicion && $sueldo) {
                                $resultado = DAOJugador::update($codObjeto, $codEquipo, $nombre, $posicion, $sueldo);
                        
                                if (is_array($resultado) && isset($resultado['error'])) {
                                    $mensaje = $resultado['error'];
                                } elseif (isset($resultado['success']) && $resultado['success']) {
                                    $mensaje = "Jugador actualizado con éxito.";
                                } else {
                                    $mensaje = "Error inesperado al actualizar el jugador.";
                                }
                            } else {
                                $mensaje = "Todos los campos son obligatorios.";
                            }
                        
                            require_once(VIEWS . 'respuesta.php');
                            break;
                        
                        

                            case 'form-borrarObjeto':
                                if (isset($_POST['codObjetoBorrar']) && !empty($_POST['codObjetoBorrar'])) {
                                    $codObjeto = $_POST['codObjetoBorrar'];
                                    $resultado = DAOJugador::delete($codObjeto);
                                    $mensaje = '';
                            
                                    if (is_array($resultado) && isset($resultado['error'])) {
                                        $mensaje = $resultado['error'];
                                    } elseif (isset($resultado['success']) && $resultado['success']) {
                                        $mensaje = "Jugador borrado con éxito.";
                                    } else {
                                        $mensaje = "Error inesperado al borrar el objeto.";
                                    }
                                } else {
                                    $mensaje = "No se proporcionó un ID válido para borrar.";
                                }
                            
                                require_once(VIEWS . 'respuesta.php');
                                break;
                            

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
