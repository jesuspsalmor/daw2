<?php
require_once('./Config/config.php');
require_once(MODELS.'Equipo.php');
require_once(MODELS.'DAOEquipo.php');

class ControllerEquipo {
    public function redirect($action) {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                switch ($action) {
                    case 'form-verObjetos':
                        $objetos = DAOEquipo::readAll();
                        $error_message = '';
    
                        if (is_array($objetos) && isset($objetos['error'])) {
                            $error_message = $objetos['error'];
                            $objetos = null;
                        } elseif (empty($objetos)) {
                            $error_message = 'No se encontraron objetos en la base de datos.';
                        }
                        require_once(VIEWS.'Equipos/form-verObjetos.php');
                        break;
                       

                    case 'form-crearObjetos':
                        require_once(VIEWS.'Equipos/form-crearObjetos.php');
                        break;

                    case 'form-buscarObjetos':
                        require_once(VIEWS.'Equipos/form-buscarObjetos.php');
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
                            $results = DAOEquipo::readbyPk($id);
                    
                            if (is_array($results) && isset($results['error'])) {
                                $error_message = $results['error'];
                            } elseif ($results instanceof Equipo) {
                                $objetos = $results;
                            } else {
                                $error_message = 'Respuesta inesperada de la API';
                            }
                        } else {
                            $error_message = 'No se proporcionó un ID válido.';
                            require_once(VIEWS.'respuesta.php');
                        }
                    
                        require_once(VIEWS.'Equipos/form-verObjetos.php');
                        break;
                    
                    case 'form-crearObjeto':
                        $localidad = $_POST['localidad'] ?? null;
                        $nombre = $_POST['nombreEquipo'] ?? null;

                        if ($localidad && $nombre) {
                            $resultado = DAOEquipo::create($localidad, $nombre);

                            if ($resultado['success']) {
                                $mensaje = "Equipo creado correctamente.";
                            } else {
                                $mensaje = "Error al crear el equipo: " . $resultado['message'];
                            }
                        } else {
                            $mensaje = "Todos los campos son obligatorios.";
                        }

                       
                        require_once(VIEWS.'respuesta.php');
                        exit();
                        break;

                  
                        case 'form-actualizarObjeto':
                            $codEquipo = $_POST['codEquipo']??null;
                            $localidad = $_POST['localidad']??null;
                            $nombre = $_POST['nombreEquipo']??null;
    
                            if ($codEquipo && $localidad && $nombre) {
                                $resultado = DAOEquipo::update($codEquipo, $localidad, $nombre);
    
                                if ($resultado['success']) {
                                    $mensaje = "Equipo actualizado correctamente.";
                                } else {
                                    $mensaje = "Error al actualizar el equipo: " . $resultado['message'];
                                }
                            } else {
                                $mensaje = "Todos los campos son obligatorios.";
                            }
    
                            
                            require_once(VIEWS.'respuesta.php');
                           
                            break;
                            case 'form-borrarObjeto':
                                if (isset($_POST['codEquipoBorrar']) && !empty($_POST['codEquipoBorrar'])) {
                                    $codEquipo = $_POST['codEquipoBorrar'];
                                    $resultado = DAOEquipo::delete($codEquipo);
                                    $mensaje = '';
                            
                                    if (is_array($resultado) && isset($resultado['error'])) {
                                        $mensaje = $resultado['error'];
                                    } elseif (isset($resultado['success']) && $resultado['success']) {
                                        $mensaje = "Equipo borrado con éxito.";
                                    } else {
                                        $mensaje = "Error inesperado al borrar el equipo.";
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
                echo "Método no soportado: " . $_SERVER['REQUEST_METHOD'];
                break;
        }
    }
}
?>
