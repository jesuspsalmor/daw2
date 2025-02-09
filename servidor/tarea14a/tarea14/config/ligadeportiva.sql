-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generacion: 31-01-2025 a las 12:59:28
-- Version del servidor: 10.4.32-MariaDB
-- Version de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE DATABASE ligadeportiva;
USE ligadeportiva;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ligadeportiva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `CodEquipo` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Localidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`CodEquipo`, `Nombre`, `Localidad`) VALUES
(1, 'Equipo Avila', 'Avila'),
(2, 'Equipo Burgos', 'Burgos'),
(3, 'Equipo Leon', 'Leon'),
(4, 'Equipo Palencia', 'Palencia'),
(5, 'Equipo Salamanca', 'Salamanca'),
(6, 'Equipo Segovia', 'Segovia'),
(7, 'Equipo Soria', 'Soria'),
(8, 'Equipo Valladolid', 'Valladolid'),
(9, 'Equipo Zamora', 'Zamora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `CodJugador` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Posicion` enum('Portero','Defensa','Centrocampista','Delantero') NOT NULL,
  `Sueldo` decimal(10,2) NOT NULL,
  `CodEquipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`CodJugador`, `Nombre`, `Posicion`, `Sueldo`, `CodEquipo`) VALUES
(1, 'JuanPerez', 'Delantero', 50000, 1),
(2, 'CarlosGomez', 'Centrocampista', 60000, 1),
(3, 'LuisFernandez', 'Defensa', 55000, 1),
(4, 'MiguelSanchez', 'Portero', 52000, 1),
(5, 'JoseLopez', 'Delantero', 53000, 1),

(6, 'AntonioMartinez', 'Delantero', 61000, 2),
(7, 'FranciscoGarcia', 'Centrocampista', 62000, 2),
(8, 'DavidRodriguez', 'Defensa', 63000, 2),
(9, 'JavierDiaz', 'Portero', 64000, 2),
(10, 'PedroJimenez', 'Delantero', 65000, 2),

(11, 'RaulHernandez', 'Delantero', 70000, 3),
(12, 'ManuelRuiz', 'Centrocampista', 71000, 3),
(13, 'AlbertoMorales', 'Defensa', 72000, 3),
(14, 'RamonGonzalez', 'Portero', 73000, 3),
(15, 'SergioOrtega', 'Delantero', 74000, 3),

(16, 'IgnacioVargas', 'Delantero', 76000, 4),
(17, 'VictorRamirez', 'Centrocampista', 77000, 4),
(18, 'EduardoReyes', 'Defensa', 78000, 4),
(19, 'RicardoFlores', 'Portero', 79000, 4),
(20, 'AlejandroSilva', 'Delantero', 80000, 4),

(21, 'MarioCastro', 'Delantero', 81000, 5),
(22, 'HugoMendoza', 'Centrocampista', 82000, 5),
(23, 'FelipeSantos', 'Defensa', 83000, 5),
(24, 'PabloNavarro', 'Portero', 84000, 5),
(25, 'FernandoPerez', 'Delantero', 85000, 5),

(26, 'DiegoMarin', 'Delantero', 86000, 6),
(27, 'RafaelMartinez', 'Centrocampista', 87000, 6),
(28, 'OscarTorres', 'Defensa', 88000, 6),
(29, 'AdrianLopez', 'Portero', 89000, 6),
(30, 'EnriqueRuiz', 'Delantero', 90000, 6),

(31, 'GonzaloPerez', 'Delantero', 91000, 7),
(32, 'ChristianHernandez', 'Centrocampista', 92000, 7),
(33, 'EmilioGarcia', 'Defensa', 93000, 7),
(34, 'AlejandroMartinez', 'Portero', 94000, 7),
(35, 'IsmaelFernandez', 'Delantero', 95000, 7),

(36, 'JoaquinSanchez', 'Delantero', 96000, 8),
(37, 'MatiasDiaz', 'Centrocampista', 97000, 8),
(38, 'NicolasGomez', 'Defensa', 98000, 8),
(39, 'CesarLopez', 'Portero', 99000, 8),
(40, 'FranciscoMartinez', 'Delantero', 100000, 8),

(41, 'SebastianRodriguez', 'Delantero', 101000, 9),
(42, 'RodrigoVargas', 'Centrocampista', 102000, 9),
(43, 'AlonsoOrtega', 'Defensa', 103000, 9),
(44, 'EstebanSantos', 'Portero', 104000, 9),
(45, 'EduardoGonzalez', 'Delantero', 105000, 9);



--
-- Indices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`CodEquipo`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`CodJugador`),
  ADD KEY `CodEquipo` (`CodEquipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `CodEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `CodJugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`CodEquipo`) REFERENCES `equipos` (`CodEquipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
