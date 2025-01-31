const express= require('express');
const cors =require('cors');
const dotenv = require('dotenv'); 
const path = require('path'); // necesario para servir archivos estáticos
const app = express(); // esta es la aplicación que iniciamos 
//const mysql= require('mysql2');
const categoriaRoutes=require('./routes/categoriaRoutes');
const productoRoutes= require('./routes/productoRoutes');
dotenv.config()
app.use(cors());
app.use(express.json()); //middleware para JSON

// aquí las rutas
/*
app.get('/', (req, res)=>{
    res.json("Estás en el servidor express del profesor")
});
*/
// Middleware para servir archivos estáticos desde la carpeta 'public'
//app.use(express.static(path.join(__dirname, 'public')));
app.use(express.static(path.join(__dirname, 'public2')));
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'public2', 'index.html'));
  })
app.use('/productos', productoRoutes); //
app.use('/categorias',categoriaRoutes);

const PORT = process.env.PORT || 3000; 
const IP = process.env.IP || '127.0.0.1';
console.log(IP);

app.listen(PORT, IP, () => {
    console.log(`Servidor corriendo en http://${IP}:${PORT}`);
});

