<?php
require_once('./Config/config.php');
require_once(MODELS.'Jugador.php');
require_once(MODELS.'DAOJugador.php');

class ControllerJugador {

    public function redirect($action) {
        switch ($action) {
            case 'buscarJugadores':
                require_once(VIEWS.'Jugadores/buscarJugadores.php');
                break;

            case 'vertodosJugadores':
                $this->vertodosJugadores();
                break;

            case 'crearJugador':
                $this->crearJugador();
                break;

            case 'verEquipos':
                $this->verEquipos();
                break;

            case 'crearEquipo':
                $this->crearEquipo();
                break;

            default:
                $this->error404();
                break;
        }
    }

}  