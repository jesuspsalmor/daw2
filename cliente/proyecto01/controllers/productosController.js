const Producto = require('../models/Producto');
const db = require('../config/db');

// función controladora de todos los productos
const getProductos = async (req, res) => {
    try {
        const [productos, campos] = await db.query(
            'SELECT * FROM productos',
        );
        console.log(campos);
        res.json(productos);
    } catch (error) {
        res.status(500).json({ error: 'Error al obtener datos' });
    }
};

// función para agregar un producto
const crearProducto = async (req, res) => {
    const { nombre, precio } = req.body;
    if (!nombre || !precio) {
        return res.status(400).json({ error: "El nombre y el precio son obligados" });
    }
    try {
        const [result] = await db.query(
            'INSERT INTO productos (nombre, precio) VALUES (?, ?)',
            [nombre, precio]
        );
        console.log(result);
        res.status(200).json({ id: result.insertId, nombre, precio });
    } catch (error) {
        res.status(500).json({ error: "Error al crear el producto" });
    }
};

// función para eliminar un producto
const eliminarProducto = async (req, res) => {
    const { id } = req.params;
    try {
        const filasAfectadas = await db.query(
            'DELETE FROM productos WHERE id = ?',
            [id]
        );
        if (filasAfectadas === 0) {
            return res.status(400).json({ error: "No encuentro el producto" });
        }
        res.json(filasAfectadas);
    } catch (error) {
        console.log('error al eliminar producto', error);
        res.status(500).json({ error: 'Error al obtener datos' });
    }
};


const getPById = async (req, res) => {
    try {
        const id = req.query.id; 
        if (!id) {
            return res.status(400).json({ error: 'ID no proporcionado' });
        }
        const [productos] = await db.query('SELECT * FROM productos WHERE id = ?', [id]);

        if (productos.length === 0) {
            return res.status(404).json({ error: 'Producto no encontrado' });
        }

        res.json(productos[0]);
    } catch (error) {
        res.status(500).json({ error: 'Error al obtener el producto' });
    }
};


const putDatos = async (req, res) => {
    const id = req.params.id;
    const { nombre, precio } = req.body;
    console.log(id)
    try {
        const [result] = await db.query(
            'UPDATE productos SET nombre = ?, precio = ? WHERE id = ?',
            [nombre, precio, id]
        );
        res.status(200).json({
            id: result,
            nombre: nombre,
            precio: precio
        });
    } catch {
        res.status(500).json({ error: 'error' });
    }
};


const patchDatos = async (req, res) => {
    const id = req.params.id;
    const { campo, valor } = req.body; 
    if (!campo || !valor) {
        return res.status(400).json({ error: "Campo y valor son obligatorios" });
    }
    try {
        const [result] = await db.query(
            `UPDATE productos SET ${campo} = ? WHERE id = ?`,
            [valor, id]
        );   
        res.status(200).json({
            id: result,
            [campo]: valor
        });
    } catch (error) {
        console.error('Error al actualizar producto:', error);
        res.status(500).json({ error: 'Error al actualizar el producto' });
    }
};


module.exports = {
    getProductos,
    crearProducto,
    eliminarProducto,
    getPById,
    putDatos,
    patchDatos
};
