// del lado servidor
// Obtener un producto por su ID
const getProductoById = async (req, res) => {
    try {
        const { id } = req.params; // Extraer el ID de los parámetros de la URL (PARAMS)
        const [producto] = await db.query('SELECT * FROM productos WHERE id = ?', [id]);

        if (producto.length === 0) {
            return res.status(404).json({ error: 'Producto no encontrado' });
        }

        res.json(producto[0]); // Enviar el primer elemento, ya que el ID es único
    } catch (error) {
        res.status(500).json({ error: 'Error al obtener el producto' });
    }
};


const db = require('../config/db');

// Obtener productos con filtros opcionales
const getProductosConFiltros = async (req, res) => {
    const { categoria, marca, precio_min, precio_max } = req.query;

    // Construir consulta dinámica
    let query = 'SELECT * FROM productos WHERE 1=1';
    const params = [];

    if (categoria) {
        query += ' AND categoria = ?';
        params.push(categoria);
    }

    if (marca) {
        query += ' AND marca = ?';
        params.push(marca);
    }

    if (precio_min) {
        query += ' AND precio >= ?';
        params.push(precio_min);
    }

    if (precio_max) {
        query += ' AND precio <= ?';
        params.push(precio_max);
    }

    try {
        const [productos] = await db.query(query, params);
        res.json(productos);
    } catch (error) {
        console.error(error);
        res.status(500).json({ error: 'Error al obtener los productos con filtros' });
    }
};

module.exports = { getProductosConFiltros };


{
    categoria: 'electronica',
    marca: 'sony'
}
  

const precio_min = Number(req.query.precio_min);

{
    categoria: 'electronica',
    marca: 'sony',
    precio_min: '100',
    precio_max: '500'
}

{
    categoria: 'electronica'
}
  