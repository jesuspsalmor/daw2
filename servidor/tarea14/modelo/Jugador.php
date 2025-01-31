<?php
class Jugador{
    private $codEquipo;
    private $codJugador;
    private $nombre;
    private $posicion;
    private $sueldo;

    protected  function __construct($codEquipo,$codJugador,$nombre,$posicion,$sueldo) {
        $this->codEquipo=$codEquipo;
        $this->codJugador=$codJugador;
        $this->nombre=$nombre;
        $this->posicion=$posicion;
        $this->sueldo=$sueldo;
    }
    protected function getcodEquipo(){
        return $this->codEquipo;
    }
    protected function getCodJugador(){
        return $this->codJugador;
    }
    protected function getNombe(){
        return $this->nombre;
    }
    protected function getPosicion(){
        return $this->Posicion;
    }
    protected function getcod(){
        return $this->sueldo;
    }
    protected function setCodEquipo($codEquipo){
        $this->codEquipo=$codEquipo
    }
    protected function setCodJuagdor($codJugador){
        $this->
    }
}

?>