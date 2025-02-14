const express = require('express');
const router = express.Router();
const productosController = require('../controllers/productosController');

// Rutas
// router.get('/', productosController.getProductos);
router.post('/', productosController.crearProducto);
router.delete('/:id', productosController.eliminarProducto);
router.get('/', productosController.getPById);

module.exports = router;