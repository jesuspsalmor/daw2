const express = require('express');
const router = express.Router();
const productosController = require('../controllers/productosController');

// Rutas
 router.get('/all', productosController.getProductos);
router.post('/', productosController.crearProducto);
router.delete('/:id', productosController.eliminarProducto);
router.get('/:id', productosController.getPById);
router.put('/:id', productosController.putDatos);
router.patch('/:id', productosController.patchDatos);

module.exports = router;