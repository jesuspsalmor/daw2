<?php
class Jugador {
    private $codEquipo;
    private $codJugador;
    private $nombre;
    private $posicion;
    private $sueldo;

    public function __construct($codEquipo, $codJugador, $nombre, $posicion, $sueldo) {
        $this->codEquipo = $codEquipo;
        $this->codJugador = $codJugador;
        $this->nombre = $nombre;
        $this->posicion = $posicion;
        $this->sueldo = $sueldo;
    }

    public function getCodEquipo() {
        return $this->codEquipo;
    }

    public function getCodJugador() {
        return $this->codJugador;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPosicion() {
        return $this->posicion;
    }

    public function getSueldo() {
        return $this->sueldo;
    }

    public function setCodEquipo($codEquipo) {
        $this->codEquipo = $codEquipo;
    }

    public function setCodJugador($codJugador) {
        $this->codJugador = $codJugador;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPosicion($posicion) {
        $this->posicion = $posicion;
    }

    public function setSueldo($sueldo) {
        $this->sueldo = $sueldo;
    }
}
?>
