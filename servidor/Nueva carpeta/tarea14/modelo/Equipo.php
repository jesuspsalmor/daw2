<?php
class Equipo {
    private $codEquipo;
    private $localidad;
    private $nombre;

    public function __construct($codEquipo, $localidad, $nombre) {
        $this->codEquipo = $codEquipo;
        $this->localidad = $localidad;
        $this->nombre = $nombre;
    }

    public function getCodEquipo() {
        return $this->codEquipo;
    }

    public function getLocalidad() {
        return $this->localidad;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setCodEquipo($codEquipo) {
        $this->codEquipo = $codEquipo;
    }

    public function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
}
?>
