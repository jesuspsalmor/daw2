// models/Producto.js
const db = require('../config/db');

class Producto {
    constructor(nombre, precio, id_categoria) {
        this.nombre = nombre;
        this.precio = precio;
        this.id_categoria = id_categoria;
    }

    // Validar los datos antes de guardar
    static validarDatos(nombre, precio, id_categoria) {
        if (!nombre || typeof nombre !== 'string' || nombre.trim().length === 0) {
            throw new Error('El nombre debe ser una cadena no vacía.');
        }
        if (!precio || !Number.isInteger(precio) || precio < 0) {
            throw new Error('El precio debe ser un número válido.');
        }
        if (!id_categoria || !Number.isInteger(id_categoria)) {
            throw new Error('La categoría debe ser un ID válido.');
        }
        return true;
    }

    // Obtener todos los productos
    static async obtenerProductos() {
        try {
            const [rows] = await db.execute('SELECT * FROM productos');
            return rows;
        } catch (error) {
            throw new Error('Error al obtener productos: ' + error.message);
        }
    }

    // Crear un nuevo producto
    static async guardar(datos) {
        try {
            const [result] = await db.query(
                'INSERT INTO productos (nombre, precio, id_cat) VALUES (?, ?, ?)',
                [datos.nombre, datos.precio, datos.id_categoria]
            );
            return result.insertId;
        } catch (error) {
            throw new Error('Error al crear el producto: ' + error.message);
        }
    }

    // Actualizar un producto por ID
    static async actualizarProducto(id, datos) {
        const { nombre, precio, id_categoria } = datos;
        try {
            const [result] = await db.query(
                'UPDATE productos SET nombre = ?, precio = ?, id_cat = ? WHERE id = ?',
                [nombre, precio, id_categoria, id]
            );
            return result.affectedRows;
        } catch (error) {
            throw new Error('Error al actualizar el producto: ' + error.message);
        }
    }

    // Eliminar un producto por ID
    static async eliminarProducto(id) {
        try {
            const [result] = await db.query('DELETE FROM productos WHERE id = ?', [id]);
            return result.affectedRows;
        } catch (error) {
            throw new Error('Error al eliminar el producto: ' + error.message);
        }
    }
    
    // Obtener un producto por ID
    static async obtenerPorId(id) {
        try {
            const [rows] = await db.query('SELECT * FROM productos WHERE id = ?', [id]);
            if (rows.length === 0) {
                throw new Error(`No se encontró un producto con ID ${id}`);
            }
            return rows[0]; // Devuelve el primer resultado
        } catch (error) {
            throw new Error('Error al obtener el producto: ' + error.message);
        }
    }
    
}

module.exports = Producto;
