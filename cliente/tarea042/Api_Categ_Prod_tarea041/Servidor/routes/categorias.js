const express= require('express');
const rutasCategorias = express.Router();
const categoriasController = require('../controllers/categoriasController');
// Ruta para obtener todas los categorias
//rutasCategorias.get('/', categoriasController.getCategorias);

// Ruta para crear nueva categoria
//rutasCategorias.post('/', categoriasController.crearCategoria);

// Ruta para actualizar una categoria por ID
//rutasCategorias.put('/:id', categoriasController.actualizarCategoria);
// ejemplo: PUT http://localhost:4001/categorias/4   -> En Body van los datos nuevos


// Ruta para eliminar una categoria por ID
//rutasCategorias.delete('/:id', categoriasController.eliminarCategoria);
// ejemplo: DELETE http://localhost:4001/categorias/4

module.exports = rutasCategorias;