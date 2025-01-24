<?php
class Usuario {
    private $id;
    private $usuario;
    private $password;
    private $email;
    private $fecha_nacimiento;
    private $rol_id;

    public function __construct($id, $usuario, $email, $fecha_nacimiento, $rol_id) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->email = $email;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->rol_id = $rol_id;
    }

    // Métodos para obtener y establecer propiedades
    public function getId() {
        return $this->id;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFechaNacimiento() {
        return $this->fecha_nacimiento;
    }

    public function getRolId() {
        return $this->rol_id;
    }
}
?>
