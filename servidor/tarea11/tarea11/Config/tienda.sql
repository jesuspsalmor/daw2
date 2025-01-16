-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS tienda;

-- Crear el usuario adminBD con contraseña adminBD y darle todos los privilegios sobre la base de datos
CREATE USER 'adminBD'@'localhost' IDENTIFIED BY 'adminBD';
GRANT ALL PRIVILEGES ON tienda.* TO 'adminBD'@'localhost';
FLUSH PRIVILEGES;

USE tienda;

-- Crear la tabla de roles
CREATE TABLE IF NOT EXISTS roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

-- Crear la tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(100) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    fecha_nacimiento DATE NOT NULL,
    rol_id INT NOT NULL,
    FOREIGN KEY (rol_id) REFERENCES roles(id)
);

-- Crear la tabla de productos
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL
);

-- Crear la tabla de ventas
CREATE TABLE IF NOT EXISTS ventas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    fecha_compra DATETIME DEFAULT CURRENT_TIMESTAMP,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    precio_total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

-- Crear la tabla de albaranes
CREATE TABLE IF NOT EXISTS albaranes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha_albaran DATETIME DEFAULT CURRENT_TIMESTAMP,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    usuario_id INT NOT NULL,
    FOREIGN KEY (producto_id) REFERENCES productos(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Insertar roles preestablecidos
INSERT INTO roles (nombre) VALUES ('Administrador'), ('Moderador'), ('Usuario normal');

-- Insertar usuarios preestablecidos (contraseñas deben estar encriptadas)
INSERT INTO usuarios (usuario, contraseña, email, fecha_nacimiento, rol_id) VALUES
('admin', 'admin123A', 'admin@example.com', '1980-01-01', 1),
('moderador', 'mod123M', 'moderador@example.com', '1985-01-01', 2),
('usuario', 'user123U', 'usuario@example.com', '1990-01-01', 3);

-- Insertar productos preestablecidos
INSERT INTO productos (nombre, descripcion, precio, stock) VALUES
('Producto 1', 'Descripción del producto 1', 10.00, 100),
('Producto 2', 'Descripción del producto 2', 20.00, 50),
('Producto 3', 'Descripción del producto 3', 30.00, 25);

