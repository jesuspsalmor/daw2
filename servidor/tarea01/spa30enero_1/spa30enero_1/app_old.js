// app.js
const express = require('express');
const dotenv = require('dotenv'); 
const app = express();
const productoRoutes = require('./routes/productoRoutes');
const categoriaRoutes = require('./routes/categoriaRoutes');

// Configuración de middleware
app.use(express.json());

// Rutas
app.use('/api/productos', productoRoutes);
app.use('/api/categorias', categoriaRoutes);

// Iniciar servidor
app.listen(3000, () => {
    console.log('Servidor corriendo en http://localhost:3000');
});
