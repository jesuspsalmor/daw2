<?php
class Equipo{

    private $codEquipo;
    private $localidad ;
    private  $nombre;

    protected function __construct($codEquipo,$localidad,$nombre) {
        $this->codEquipo=$codEquipo;
        $this->localidad=$localidad;
        $this->nombre;
    }
     
    protected function getcodEquipo(){
        return $this->codEquipo;
    }
    protected function getLocalidad(){
        return $this->Localidad;
    }
    protected function getNombre(){
        return $this->nombre;
    }
    protected function setLocalidad($localidad){
        $this->localidad=$localidad;
    }
    protected function setNombre($nombre){
        $this->nombre=$nombre;
    }
    protected function setcodEquipo($codEquipo){
        $this->codEquipo=$codEquipo;
    }

}