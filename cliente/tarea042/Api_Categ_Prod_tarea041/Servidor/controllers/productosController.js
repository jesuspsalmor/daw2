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
        res.status(500).json({error: 'Error al obtener datos'});
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

const eliminarProducto= async (req, res)=>{ //http://localhost:4000/productos/6
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
    const {id}=req.params
    try {
        console.log('KK');
        
        //const id = req.query.id; // Leer el ID de la query string POR query
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

const putProducto = async (req, res) =>{   //http://localhost:4000/productos/3
    const idProducto=req.params.id;
    console.log(req.body);
    
    const {nombre, precio}= req.body; // Extrae los datos a actualizar desde el cuerpo de la solicitud
    const sql='UPDATE productos SET nombre=?, precio=? WHERE id= ?';
    try {
        // ejecutamos db.query(sql, values); // donde:
        // sql es la consulta a MySql
        // values es un array que contiene los valores que reeemplazarán los marcadores ? en 
        // cada posición en la consulta

        // await db.query devuelve una promesa si usamos mysql2
        // al resolver la promesa se obtiene un objeto que contiene la info del resultado
        //  de la consulta: filas afectadas, ID insertado (en post), etc
        const arrayInfo=await db.query(sql, [nombre, precio, idProducto]);
        console.log(arrayInfo);
        res.json([arrayInfo[0].affectedRows, arrayInfo[0].changedRows]);
    } catch (error) {
        console.log(error);
        res.status(500).json({error: "Error al actualizar producto"})
        
    }
}

const putProductoB = async (req, res) =>{   //http://localhost:4000/productos/
    //const idProducto=req.params.id;
    console.log(req.body);
    
    const {id, nombre, precio}= req.body; // Extrae los datos a actualizar desde el cuerpo de la solicitud
    const sql='UPDATE productos SET nombre=?, precio=? WHERE id= ?';
    try {
        // ejecutamos db.query(sql, values); // donde:
        // sql es la consulta a MySql
        // values es un array que contiene los valores que reeemplazarán los marcadores ? en 
        // cada posición en la consulta

        // await db.query devuelve una promesa si usamos mysql2
        // al resolver la promesa se obtiene un objeto que contiene la info del resultado
        //  de la consulta: filas afectadas, ID insertado (en post), etc
        const filasAfectadas=await db.query(sql, [nombre, precio, id]);
        console.log(filasAfectadas);
        res.json(filasAfectadas);
    } catch (error) {
        console.log(error);
        res.status(500).json({error: "Error al actualizar producto"})
        
    }
}

// función para actualizar un producto (permite pasar solonombre o solo precio)
const actualizarProducto = async (req, res) => {
    const { id } = req.params; // Extraer ID del producto desde la URL
    const { nombre, precio } = req.body; // Extraer datos a actualizar desde el cuerpo de la solicitud

    // Validar que el ID sea proporcionado y que al menos un campo sea enviado para actualizar
    if (!id || (!nombre && !precio)) {
        return res.status(400).json({ error: "El ID del producto y al menos un campo (nombre o precio) son obligatorios" });
    }

    try {
        // Construir la consulta dinámicamente según los campos enviados
        const campos = [];
        const valores = [];
        
        if (nombre) {
            campos.push("nombre = ?");
            valores.push(nombre);
        }
        if (precio) {
            campos.push("precio = ?");
            valores.push(precio);
        }

        valores.push(id); // Agregar el ID al final para la condición WHERE

        // Ejecutar la consulta
        const [result] = await db.query(
            `UPDATE productos SET ${campos.join(", ")} WHERE id = ?`,
            valores
        );

        if (result.affectedRows === 0) {
            return res.status(404).json({ error: "Producto no encontrado" });
        }

        res.status(200).json({ message: "Producto actualizado correctamente", id, nombre, precio });
    } catch (error) {
        console.error(error);
        res.status(500).json({ error: "Error al actualizar el producto" });
    }
};


module.exports={
    getProductos,
    crearProducto,
    eliminarProducto,
    getPById,
    putProducto,
    putProductoB,
    actualizarProducto
}