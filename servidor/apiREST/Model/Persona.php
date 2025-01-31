<?php
class Persona{
    public $id;
    public $nombre;
    public $apellido;
    public $dni;

    public function __construct($id, $nombre, $apellido, $dni) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
    }
}