<?php
require_once('./Config/config.php');
require_once(MODELS.'Usuario.php');
require_once(DAO.'DAOUsuario.php');

class ControllerUsuario {
    function redirect($action){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            switch ($action) {
                case 'registrar':
                    require_once(VIEWS.'Usuario/registro.php');
                    break;
                case 'verUsuarios':
                    $usuarios = DAOUsuario::leerUsuarios();
                    require_once(VIEWS.'Usuario/verUsuarios.php');
                    break;
                default:
                    require_once VIEWS.'/404.php';
                    break;
            }
        }
        else if($_SERVER['REQUEST_METHOD'] == 'POST'){
            switch ($action) {
                case 'registrar':
                    $correcto = $this->registrarUsuario();
                    if($correcto){
                        require_once VIEWS.'correcto.php';
                    }
                    else{
                        require_once VIEWS.'incorrecto.php';
                    }
                    break;
                default:
                    require_once VIEWS.'/404.php';
                    break;
            }
        
        }
    }

    function registrarUsuario(){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $usuario = new Usuario(null, $nombre, $apellidos, $email);
        $correcto = DAOUsuario::insertarUsuario($usuario);
        return $correcto;
    }
}