
 
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
        res.status(500).json({error: 'Error al obtener datos'});
    }
}
module.exports={
    getProductos,
}
