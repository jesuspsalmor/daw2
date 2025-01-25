const express = require('express');
const rutasProductos = express.Router();
const productosController = require('../controllers/productosController');

// Rutas
 rutasProductos.get('/', productosController.getProductos);
module.exports = rutasProductos;