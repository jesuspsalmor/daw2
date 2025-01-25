-- Crear la base de datos 
CREATE DATABASE almacen; -- Usar la base de datos 
USE almacen; -- Crear la tabla categorias 
CREATE TABLE categorias ( 
id INT AUTO_INCREMENT PRIMARY KEY, -- Clave primaria, identificador único 
nombre VARCHAR(255) NOT NULL       -- Nombre de la categoría 
); -- Crear la tabla productos 
CREATE TABLE productos ( 
id INT AUTO_INCREMENT PRIMARY KEY, -- Clave primaria, identificador único 
    nombre VARCHAR(255) NOT NULL,      -- Nombre del producto 
    precio DECIMAL(10, 2) NOT NULL,    -- Precio del producto (hasta 10 dígitos, 2 decimales) 
    id_cat INT NOT NULL,               -- Clave foránea que referencia a categorias.id 
    FOREIGN KEY (id_cat) REFERENCES categorias(id)  
    ON DELETE RESTRICT                -- Evitar eliminar categorías con productos asociados 
    ON UPDATE CASCADE                 -- Actualizar automáticamente las claves si cambia categorias.id 
); 
 

 -- Insertar 5 categorías 
INSERT INTO categorias (nombre) VALUES  
('Electrónica'),  
('Hogar'),  
('Deportes'),  
('Juguetes'),  
('Moda'); 
 -- Insertar 20 productos 
INSERT INTO productos (nombre, precio, id_cat) VALUES  -- Productos de Electrónica 
('Teléfono', 299.99, 1), 
('Televisor', 599.99, 1), 
('Laptop', 999.99, 1), 
('Auriculares', 49.99, 1), 
('Smartwatch', 199.99, 1), 
 -- Productos de Hogar 
('Silla', 89.99, 2), 
('Mesa', 149.99, 2), 
('Lámpara', 29.99, 2), 
('Cama', 499.99, 2), 
('Sofá', 799.99, 2), 
 -- Productos de Deportes 
('Balón de fútbol', 25.50, 3), 
('Raqueta de tenis', 120.00, 3), 
('Bicicleta', 350.00, 3), 
('Pesas', 45.00, 3), 
('Cuerda para saltar', 15.00, 3), 
 -- Productos de Juguetes 
('Peluche', 19.99, 4), 
('Lego', 59.99, 4), 
('Puzzle', 14.99, 4), 
('Carrito de juguete', 9.99, 4), 
('Muñeca', 24.99, 4);