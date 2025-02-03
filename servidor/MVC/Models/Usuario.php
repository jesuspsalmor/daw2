<?php

class Usuario{
    public $id;
    public $nombre;
    public $apellidos;
    public $email;

    public function __construct($id, $nombre, $apellidos, $email){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
    }
}