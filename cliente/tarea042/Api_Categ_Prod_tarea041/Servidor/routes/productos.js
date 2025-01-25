const express = require('express');
const rutasProductos = express.Router();
const productosController = require('../controllers/productosController');

// Rutas
rutasProductos.get('/all', productosController.getProductos);
rutasProductos.post('/', productosController.crearProducto);
rutasProductos.delete('/:id', productosController.eliminarProducto);
rutasProductos.get('/:id', productosController.getPById);
rutasProductos.put('/:id', productosController.putProducto );
//router.put('/', productosController.putProductoB );

module.exports = rutasProductos;