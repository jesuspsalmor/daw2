// controllers/categoriaController.js
const Categoria = require('../models/Categoria');

const crearCategoria = async (req, res) => {
    try {
        const { nombre } = req.body;
        Categoria.validarNombre(nombre);
        
        const categoria = new Categoria(nombre);
        const id = await categoria.guardar();
        
        res.status(201).json({ id, nombre });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

const obtenerCategorias = async (req, res) => {
    try {
        const categorias = await Categoria.obtenerCategorias();
        res.json(categorias);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

const actualizarCategoria = async (req, res) => {
    try {
        const { id } = req.params;
        const { nombre } = req.body;
        
        const rows = await Categoria.actualizarCategoria(id, nombre);
        
        if (rows === 0) {
            return res.status(404).json({ error: 'Categoría no encontrada' });
        }
        
        res.json({ message: 'Categoría actualizada correctamente' });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

const eliminarCategoria = async (req, res) => {
    try {
        const { id } = req.params;
        const rows = await Categoria.eliminarCategoria(id);
        
        if (rows === 0) {
            return res.status(404).json({ error: 'Categoría no encontrada' });
        }
        
        res.json({ message: 'Categoría eliminada correctamente' });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

module.exports = { crearCategoria, obtenerCategorias, actualizarCategoria, eliminarCategoria };
