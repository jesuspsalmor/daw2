const express= require('express');
const cors =require('cors');
const app = express();
//const mysql= require('mysql2');
const productosRouter= require('./routes/productos');
app.use(cors());
app.use(express.json());
// aquí las rutas

app.get('/', (req, res)=>{
    res.json("Estás en el servidor express del jesus")
});

app.use('/productos', productosRouter); //

const puerto=4000;

const server= app.listen(puerto, ()=>{
    console.log(`servidor a la escucha en ${puerto}`);
    
});

