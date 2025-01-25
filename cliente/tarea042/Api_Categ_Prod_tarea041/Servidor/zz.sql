
db.query('SELECT * FROM productos')
  .then(([rows]) => {
    console.log('Productos obtenidos:', rows);
  })
  .catch(error => {
    console.error('Error al obtener productos:', error);
  });
