<?php
class Albaran {
    private $id;
    private $fechaAlbaran;
    private $codProducto;
    private $cantidad;
    private $usuarioId;

    public function __construct($id, $fechaAlbaran, $codProducto, $cantidad, $usuarioId) {
        $this->id = $id;
        $this->fechaAlbaran = $fechaAlbaran;
        $this->codProducto = $codProducto;
        $this->cantidad = $cantidad;
        $this->usuarioId = $usuarioId;
    }

    public function getId() {
        return $this->id;
    }

    public function getFechaAlbaran() {
        return $this->fechaAlbaran;
    }

    public function getCodProducto() {
        return $this->codProducto;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }
}
?>