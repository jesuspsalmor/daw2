<?php
class Venta {
    private $id;
    private $usuarioId;
    private $fechaCompra;
    private $productoId;
    private $cantidad;
    private $precioTotal;

    public function __construct($id, $usuarioId, $fechaCompra, $productoId, $cantidad, $precioTotal) {
        $this->id = $id;
        $this->usuarioId = $usuarioId;
        $this->fechaCompra = $fechaCompra;
        $this->productoId = $productoId;
        $this->cantidad = $cantidad;
        $this->precioTotal = $precioTotal;
    }

    // Métodos para obtener propiedades
    public function getId() {
        return $this->id;
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function getFechaCompra() {
        return $this->fechaCompra;
    }

    public function getProductoId() {
        return $this->productoId;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getPrecioTotal() {
        return $this->precioTotal;
    }

    // Métodos para establecer propiedades
    public function setId($id) {
        $this->id = $id;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }

    public function setFechaCompra($fechaCompra) {
        $this->fechaCompra = $fechaCompra;
    }

    public function setProductoId($productoId) {
        $this->productoId = $productoId;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setPrecioTotal($precioTotal) {
        $this->precioTotal = $precioTotal;
    }
}


?>
