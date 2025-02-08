-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS `amazon`;
USE `amazon`;

-- Crear la tabla `clientes`
CREATE TABLE `clientes` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `nombre` varchar(20) default NULL,
  `apellido1` varchar(20) default NULL,
  `apellido2` varchar(20) default NULL,
  `dni` varchar(9),
  `fecha_nacimiento` Date,
  `email` varchar(255) default NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

-- Insertar datos en la tabla `clientes`
INSERT INTO `clientes` (`nombre`, `apellido1`, `apellido2`, `fecha_nacimiento`, `email`)
VALUES
  ("Wylie","Black","Rojas","2024/11/01","at.velit@outlook.edu"),
  ("Magee","Lee","Norris","2024/11/01","risus.donec@icloud.org"),
  ("Zena","Johnston","Orr","2024/11/01","et.ipsum@hotmail.net"),
  ("Abel","Carroll","Hayes","2024/11/01","aliquet@hotmail.ca"),
  ("Jade","Good","Herman","2024/11/01","ullamcorper.velit@icloud.ca");

-- Crear la tabla `usuarios`
CREATE TABLE `usuarios` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `nombre` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

-- Insertar datos en la tabla `usuarios`
INSERT INTO `usuarios` (`nombre`, `contrasena`, `rol`)
VALUES
  ("admin", "admin_password", 'administrador'),
  ("user", "user_password", 'user');
