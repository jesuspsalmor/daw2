// models/Categoria.js
const db = require('../config/db');

class Categoria {
    constructor(nombre) {
        this.nombre = nombre;
    }

    // Validar el nombre de la categoría
    static validarNombre(nombre) {
        if (!nombre || typeof nombre !== 'string' || nombre.trim().length === 0) {
            throw new Error('El nombre de la categoría debe ser una cadena no vacía.');
        }
        return true;
    }

    // Obtener todas las categorías
    static async obtenerCategorias() {
        try {
            const [rows] = await db.execute('SELECT * FROM categorias');
            return rows;
        } catch (error) {
            throw new Error('Error al obtener categorías: ' + error.message);
        }
    }

    // Crear una nueva categoría
    static async guardar() {
        try {
            const [result] = await db.query(
                'INSERT INTO categorias (nombre) VALUES (?)',
                [this.nombre]
            );
            return result.insertId;
        } catch (error) {
            throw new Error('Error al crear la categoría: ' + error.message);
        }
    }

    // Actualizar una categoría por ID
    static async actualizarCategoria(id, nombre) {
        try {
            const [result] = await db.query(
                'UPDATE categorias SET nombre = ? WHERE id = ?',
                [nombre, id]
            );
            return result.affectedRows;
        } catch (error) {
            throw new Error('Error al actualizar la categoría: ' + error.message);
        }
    }

    // Eliminar una categoría por ID
    static async eliminarCategoria(id) {
        try {
            const [result] = await db.query('DELETE FROM categorias WHERE id = ?', [id]);
            return result.affectedRows;
        } catch (error) {
            throw new Error('Error al eliminar la categoría: ' + error.message);
        }
    }
}

module.exports = Categoria;
