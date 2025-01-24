// hay que añadir rutas y demás
app.patch('/productos/:id', async (req, res) => {
    const { id } = req.params; // Obtener el ID del producto desde los parámetros de la URL
    const { nombre, precio, categoria } = req.body; // Obtener los campos enviados en el cuerpo de la solicitud
  
    // Verificar que se ha enviado al menos un campo para actualizar
    if (!nombre && !precio && !categoria) {
      return res.status(400).json({ error: 'Debe enviar al menos un campo para actualizar (nombre, precio o categoría).' });
    }
  
    try {
      // Crear dinámicamente la consulta SQL con los campos proporcionados
      const campos = [];
      const valores = [];
  
      if (nombre) {
        campos.push('nombre = ?');
        valores.push(nombre);
      }
      if (precio) {
        campos.push('precio = ?');
        valores.push(precio);
      }
      if (categoria) {
        campos.push('categoria = ?');
        valores.push(categoria);
      }
  
      // Unir los campos para construir la consulta
      const query = `UPDATE productos SET ${campos.join(', ')} WHERE id = ?`;
      valores.push(id); // Agregar el ID al final de los valores
  
      // Ejecutar la consulta
      const [result] = await db.query(query, valores);
  
      if (result.affectedRows === 0) {
        return res.status(404).json({ error: 'Producto no encontrado.' });
      }
  
      // Responder con un mensaje de éxito
      res.status(200).json({ message: 'Producto actualizado correctamente.' });
    } catch (error) {
      console.error('Error al actualizar el producto:', error);
      res.status(500).json({ error: 'Error interno del servidor.' });
    }
  });
  