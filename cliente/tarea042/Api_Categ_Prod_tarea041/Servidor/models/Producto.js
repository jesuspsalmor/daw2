const db = require('../config/db');
// los métodos que interactúan con la base de datos son estáticos, lo que
//  significa que se pueden invocar sin necesidad de crear una instancia 
// de la clase Producto. 

class Producto {
    constructor(nombre, precio){
        this.nombre=nombre;
        this.precio=precio;
    }

    // Validar los datos antes de guardar
    static validarDatos(nombre, precio) { 
        if (!nombre || typeof nombre !== 'string' || nombre.trim().length === 0) {
            throw new Error('El nombre debe ser una cadena no vacía.');
        }
        if (!precio || !Number.isInteger(precio) || precio < 0 ) {
            throw new Error('El precio debe ser un número válido.');
        }
        return true;
    }

    // comprueba que no está duplicado el nombre del producto
    static async existeProducto(nombre) {
        try {
            const [rows] = await db.query('SELECT * FROM productos WHERE nombre = ?', [nombre]);
            return rows.length > 0; // Retorna true si existe
        } catch (error) {
            throw new Error('Error al verificar la existencia del producto: ' + error.message);
        }
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
    static async guardar() {
        try {
            const [result] = await db.query(
                'INSERT INTO productos (nombre, precio) VALUES (?, ?)',
                [this.nombre, this.precio]
            );
            return result.insertId; // Retorna el ID del nuevo registro
        } catch (error) {
            throw new Error('Error al crear el producto: ' + error.message);
        }
    }

    // Actualizar un producto por ID
    static async actualizarProducto(id, datos) {
        const { nombre, precio } = datos;
        try {
            const [result] = await db.query(
                'UPDATE productos SET nombre = ?, precio = ? WHERE id = ?',
                [nombre, precio, id]
            );
            return result.affectedRows; // Retorna cuántas filas fueron afectadas
        } catch (error) {
            throw new Error('Error al actualizar el producto: ' + error.message);
        }
    }

    // Eliminar un producto por ID
    static async eliminarProducto(id) {
        try {
            const [result] = await db.query('DELETE FROM productos WHERE id = ?', [id]);
            return result.affectedRows; // Retorna cuántas filas fueron eliminadas
        } catch (error) {
            throw new Error('Error al eliminar el producto: ' + error.message);
        }
    }
}

module.exports = Producto;
