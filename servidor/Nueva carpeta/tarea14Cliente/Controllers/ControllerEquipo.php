<?php
require_once('./Config/config.php');
require_once(MODELS.'Equipo.php');
require_once(MODELS.'DAOEquipo.php');

class ControllerEquipo {
    public function redirect($action) {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                switch ($action) {
                    case 'form-verEquipos':
                        $equipos = DAOEquipo::getAllEquipos();
                        require_once(VIEWS.'Equipos/form-verEquipos.php');
                        break;

                    case 'form-crearEquipo':
                        require_once(VIEWS.'Equipos/form-crearEquipo.php');
                        break;

                    case 'form-buscarEquipo':
                        require_once(VIEWS.'Equipos/form-buscarEquipos.php');
                        break;

                    default:
                        echo "GET";
                        break;
                }
                break;

            case 'POST':
                switch ($action) {
                    case 'form-crearEquipo':
                        $localidad = $_POST['localidad'] ?? null;
                        $nombre = $_POST['nombreEquipo'] ?? null;

                        if ($localidad && $nombre) {
                            $resultado = DAOEquipo::createEquipo($localidad, $nombre);

                            if ($resultado['success']) {
                                $mensaje = "Equipo creado correctamente.";
                            } else {
                                $mensaje = "Error al crear el equipo: " . $resultado['message'];
                            }
                        } else {
                            $mensaje = "Todos los campos son obligatorios.";
                        }

                       
                        header("Location: /tarea14Cliente/equipos/form-verEquipos");
                        exit();
                        break;

                  
                        case 'form-actualizarEquipo':
                            $codEquipo = $_POST['codEquipo'];
                            $localidad = $_POST['localidad'];
                            $nombre = $_POST['nombreEquipo'];
    
                            if ($codEquipo && $localidad && $nombre) {
                                $resultado = DAOEquipo::updateEquipo($codEquipo, $localidad, $nombre);
    
                                if ($resultado['success']) {
                                    $mensaje = "Equipo actualizado correctamente.";
                                } else {
                                    $mensaje = "Error al actualizar el equipo: " . $resultado['message'];
                                }
                            } else {
                                $mensaje = "Todos los campos son obligatorios.";
                            }
    
                            
                             header("Location: /tarea14Cliente/equipos/form-verEquipos");
                            exit();
                            break;
                    case'form-borrarEquipo';
                    $codEquipo = $_POST['codEquipoBorrar'];
                    $resultado =  DAOEquipo::deleteEquipo($codEquipo);
                           
                                header("Location: /tarea14Cliente/equipos/form-verEquipos");
                            
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
