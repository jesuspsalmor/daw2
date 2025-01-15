const Producto= require('../models/Producto');
const db = require('../config/db');

// función controladora de todos los productos
const getProductos = async (req, res)=>{
    try {
        const [productos,campos] = await db.query(
            'SELECT * FROM productos',
        );
        console.log(campos);
        res.json(productos);
    } catch (error) {
        res.status(500).json({error: 'Error al obtener jes'});
    }
}
// función para agregar un producto
const crearProducto = async (req, res)=>{
    const {nombre, precio} = req.body;
    if(!nombre || !precio){
        return res.status(400).json({error: "El nombre y el precio son obligados"});
    }
    try {
        const [result]= await db.query(
            'INSERT INTO productos (nombre, precio) VALUES (?, ?)',
             [nombre, precio]);
             console.log(result);
             res.status(200).json({id: result.insertId, nombre, precio});
        } catch (error) {
        res.status(500).json({error: "Error al crear el producto"})        
    }
};

const eliminarProducto= async (req, res)=>{
    const {id}=req.params;
    try {
        const filasAfectadas = await db.query(
           'DELETE FROM productos WHERE id = ?',
           [id]
        );
        if(filasAfectadas===0){
            return res.status(400).json({error: "No encuentro el producto"});
        }
        res.json(filasAfectadas);
    } catch (error) {
        console.log('error al eliminar producto', error);
        res.status(500).json({error: 'Error al obtener datos'});
    }
};

const getPById= async(req, res)=>{ //http://localhost:4000/productos/?id=2
    try {
        console.log('KK');
        
        const id = req.query.id; // Leer el ID de la query string POR query
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

}

module.exports={
    getProductos,
    crearProducto,
    eliminarProducto,
    getPById
}