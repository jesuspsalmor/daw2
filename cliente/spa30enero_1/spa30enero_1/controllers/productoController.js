// controllers/productoController.js
const Producto = require('../models/Producto');

const crearProducto = async (req, res) => {
    try {
        const { nombre, precio, id_categoria } = req.body;
        Producto.validarDatos(nombre, precio, id_categoria);
        
        const producto = new Producto(nombre, precio, id_categoria);
        const id = await Producto.guardar(producto);
        
        res.status(201).json({ id, nombre, precio, id_categoria });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

const obtenerProductos = async (req, res) => {
    try {
        const productos = await Producto.obtenerProductos();
        res.json(productos);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

const actualizarProducto = async (req, res) => {
    try {
        const { id } = req.params;
        const { nombre, precio, id_categoria } = req.body;
        
        const rows = await Producto.actualizarProducto(id, { nombre, precio, id_categoria });
        
        if (rows === 0) {
            return res.status(404).json({ error: 'Producto no encontrado' });
        }
        
        res.json({ message: 'Producto actualizado correctamente' });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

const eliminarProducto = async (req, res) => {
    try {
        const { id } = req.params;
        const rows = await Producto.eliminarProducto(id);
        
        if (rows === 0) {
            return res.status(404).json({ error: 'Producto no encontrado' });
        }
        
        res.json({ message: 'Producto eliminado correctamente' });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};


const getProdById = async (req, res) => {
    try {
        const { id } = req.params; // Obtener ID de los parámetros de la URL
        const producto = await Producto.obtenerPorId(id);
        res.json(producto);
    } catch (error) {
        res.status(404).json({ error: error.message });
    }
};


module.exports = { crearProducto, obtenerProductos, actualizarProducto, eliminarProducto, getProdById };
