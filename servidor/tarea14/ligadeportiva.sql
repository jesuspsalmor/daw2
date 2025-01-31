-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2025 a las 12:59:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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
(1, 'Equipo Ávila', 'Ávila'),
(2, 'Equipo Burgos', 'Burgos'),
(3, 'Equipo León', 'León'),
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
(1, 'Jugador1 Ávila', 'Portero', 50000.00, 1),
(2, 'Jugador2 Ávila', 'Defensa', 60000.00, 1),
(3, 'Jugador3 Ávila', 'Defensa', 60000.00, 1),
(4, 'Jugador4 Ávila', 'Defensa', 60000.00, 1),
(5, 'Jugador5 Ávila', 'Centrocampista', 70000.00, 1),
(6, 'Jugador6 Ávila', 'Centrocampista', 70000.00, 1),
(7, 'Jugador7 Ávila', 'Centrocampista', 70000.00, 1),
(8, 'Jugador8 Ávila', 'Centrocampista', 70000.00, 1),
(9, 'Jugador9 Ávila', 'Delantero', 80000.00, 1),
(10, 'Jugador10 Ávila', 'Delantero', 80000.00, 1),
(11, 'Jugador11 Ávila', 'Delantero', 80000.00, 1),
(12, 'Jugador12 Ávila', 'Delantero', 80000.00, 1),
(13, 'Jugador13 Ávila', 'Delantero', 80000.00, 1),
(14, 'Jugador14 Ávila', 'Defensa', 60000.00, 1),
(15, 'Jugador15 Ávila', 'Centrocampista', 70000.00, 1),
(16, 'Jugador1 León', 'Portero', 50000.00, 3),
(17, 'Jugador2 León', 'Defensa', 60000.00, 3),
(18, 'Jugador3 León', 'Defensa', 60000.00, 3),
(19, 'Jugador4 León', 'Defensa', 60000.00, 3),
(20, 'Jugador5 León', 'Centrocampista', 70000.00, 3),
(21, 'Jugador6 León', 'Centrocampista', 70000.00, 3),
(22, 'Jugador7 León', 'Centrocampista', 70000.00, 3),
(23, 'Jugador8 León', 'Centrocampista', 70000.00, 3),
(24, 'Jugador9 León', 'Delantero', 80000.00, 3),
(25, 'Jugador10 León', 'Delantero', 80000.00, 3),
(26, 'Jugador11 León', 'Delantero', 80000.00, 3),
(27, 'Jugador12 León', 'Delantero', 80000.00, 3),
(28, 'Jugador13 León', 'Delantero', 80000.00, 3),
(29, 'Jugador14 León', 'Defensa', 60000.00, 3),
(30, 'Jugador15 León', 'Centrocampista', 70000.00, 3),
(31, 'Jugador1 Burgos', 'Portero', 50000.00, 2),
(32, 'Jugador2 Burgos', 'Defensa', 60000.00, 2),
(33, 'Jugador3 Burgos', 'Defensa', 60000.00, 2),
(34, 'Jugador4 Burgos', 'Defensa', 60000.00, 2),
(35, 'Jugador5 Burgos', 'Centrocampista', 70000.00, 2),
(36, 'Jugador6 Burgos', 'Centrocampista', 70000.00, 2),
(37, 'Jugador7 Burgos', 'Centrocampista', 70000.00, 2),
(38, 'Jugador8 Burgos', 'Centrocampista', 70000.00, 2),
(39, 'Jugador9 Burgos', 'Delantero', 80000.00, 2),
(40, 'Jugador10 Burgos', 'Delantero', 80000.00, 2),
(41, 'Jugador11 Burgos', 'Delantero', 80000.00, 2),
(42, 'Jugador12 Burgos', 'Delantero', 80000.00, 2),
(43, 'Jugador13 Burgos', 'Delantero', 80000.00, 2),
(44, 'Jugador14 Burgos', 'Defensa', 60000.00, 2),
(45, 'Jugador15 Burgos', 'Centrocampista', 70000.00, 2),
(46, 'Jugador1 Palencia', 'Portero', 50000.00, 9),
(47, 'Jugador2 Palencia', 'Defensa', 60000.00, 9),
(48, 'Jugador3 Palencia', 'Defensa', 60000.00, 9),
(49, 'Jugador4 Palencia', 'Defensa', 60000.00, 9),
(50, 'Jugador5 Palencia', 'Centrocampista', 70000.00, 9),
(51, 'Jugador6 Palencia', 'Centrocampista', 70000.00, 9),
(52, 'Jugador7 Palencia', 'Centrocampista', 70000.00, 9),
(53, 'Jugador8 Palencia', 'Centrocampista', 70000.00, 9),
(54, 'Jugador9 Palencia', 'Delantero', 80000.00, 9),
(55, 'Jugador10 Palencia', 'Delantero', 80000.00, 9),
(56, 'Jugador11 Palencia', 'Delantero', 80000.00, 9),
(57, 'Jugador12 Palencia', 'Delantero', 80000.00, 9),
(58, 'Jugador13 Palencia', 'Delantero', 80000.00, 9),
(59, 'Jugador14 Palencia', 'Defensa', 60000.00, 9),
(60, 'Jugador15 Palencia', 'Centrocampista', 70000.00, 9),
(61, 'Jugador1 Salamanca', 'Portero', 50000.00, 5),
(62, 'Jugador2 Salamanca', 'Defensa', 60000.00, 5),
(63, 'Jugador3 Salamanca', 'Defensa', 60000.00, 5),
(64, 'Jugador4 Salamanca', 'Defensa', 60000.00, 5),
(65, 'Jugador5 Salamanca', 'Centrocampista', 70000.00, 5),
(66, 'Jugador6 Salamanca', 'Centrocampista', 70000.00, 5),
(67, 'Jugador7 Salamanca', 'Centrocampista', 70000.00, 5),
(68, 'Jugador8 Salamanca', 'Centrocampista', 70000.00, 5),
(69, 'Jugador9 Salamanca', 'Delantero', 80000.00, 5),
(70, 'Jugador10 Salamanca', 'Delantero', 80000.00, 5),
(71, 'Jugador11 Salamanca', 'Delantero', 80000.00, 5),
(72, 'Jugador12 Salamanca', 'Delantero', 80000.00, 5),
(73, 'Jugador13 Salamanca', 'Delantero', 80000.00, 5),
(74, 'Jugador14 Salamanca', 'Defensa', 60000.00, 5),
(75, 'Jugador15 Salamanca', 'Centrocampista', 70000.00, 5),
(76, 'Jugador1 Segovia', 'Portero', 50000.00, 6),
(77, 'Jugador2 Segovia', 'Defensa', 60000.00, 6),
(78, 'Jugador3 Segovia', 'Defensa', 60000.00, 6),
(79, 'Jugador4 Segovia', 'Defensa', 60000.00, 6),
(80, 'Jugador5 Segovia', 'Centrocampista', 70000.00, 6),
(81, 'Jugador6 Segovia', 'Centrocampista', 70000.00, 6),
(82, 'Jugador7 Segovia', 'Centrocampista', 70000.00, 6),
(83, 'Jugador8 Segovia', 'Centrocampista', 70000.00, 6),
(84, 'Jugador9 Segovia', 'Delantero', 80000.00, 6),
(85, 'Jugador10 Segovia', 'Delantero', 80000.00, 6),
(86, 'Jugador11 Segovia', 'Delantero', 80000.00, 6),
(87, 'Jugador12 Segovia', 'Delantero', 80000.00, 6),
(88, 'Jugador13 Segovia', 'Delantero', 80000.00, 6),
(89, 'Jugador14 Segovia', 'Defensa', 60000.00, 6),
(90, 'Jugador15 Segovia', 'Centrocampista', 70000.00, 6),
(91, 'Jugador1 Soria', 'Portero', 50000.00, 7),
(92, 'Jugador2 Soria', 'Defensa', 60000.00, 7),
(93, 'Jugador3 Soria', 'Defensa', 60000.00, 7),
(94, 'Jugador4 Soria', 'Defensa', 60000.00, 7),
(95, 'Jugador5 Soria', 'Centrocampista', 70000.00, 7),
(96, 'Jugador6 Soria', 'Centrocampista', 70000.00, 7),
(97, 'Jugador7 Soria', 'Centrocampista', 70000.00, 7),
(98, 'Jugador8 Soria', 'Centrocampista', 70000.00, 7),
(99, 'Jugador9 Soria', 'Delantero', 80000.00, 7),
(100, 'Jugador10 Soria', 'Delantero', 80000.00, 7),
(101, 'Jugador11 Soria', 'Delantero', 80000.00, 7),
(102, 'Jugador12 Soria', 'Delantero', 80000.00, 7),
(103, 'Jugador13 Soria', 'Delantero', 80000.00, 7),
(104, 'Jugador14 Soria', 'Defensa', 60000.00, 7),
(105, 'Jugador15 Soria', 'Centrocampista', 70000.00, 7),
(106, 'Jugador1 Valladolid', 'Portero', 50000.00, 8),
(107, 'Jugador2 Valladolid', 'Defensa', 60000.00, 8),
(108, 'Jugador3 Valladolid', 'Defensa', 60000.00, 8),
(109, 'Jugador4 Valladolid', 'Defensa', 60000.00, 8),
(110, 'Jugador5 Valladolid', 'Centrocampista', 70000.00, 8),
(111, 'Jugador6 Valladolid', 'Centrocampista', 70000.00, 8),
(112, 'Jugador7 Valladolid', 'Centrocampista', 70000.00, 8),
(113, 'Jugador8 Valladolid', 'Centrocampista', 70000.00, 8),
(114, 'Jugador9 Valladolid', 'Delantero', 80000.00, 8),
(115, 'Jugador10 Valladolid', 'Delantero', 80000.00, 8),
(116, 'Jugador11 Valladolid', 'Delantero', 80000.00, 8),
(117, 'Jugador12 Valladolid', 'Delantero', 80000.00, 8),
(118, 'Jugador13 Valladolid', 'Delantero', 80000.00, 8),
(119, 'Jugador14 Valladolid', 'Defensa', 60000.00, 8),
(120, 'Jugador15 Valladolid', 'Centrocampista', 70000.00, 8),
(121, 'Jugador1 Zamora', 'Portero', 50000.00, 9),
(122, 'Jugador2 Zamora', 'Defensa', 60000.00, 9),
(123, 'Jugador3 Zamora', 'Defensa', 60000.00, 9),
(124, 'Jugador4 Zamora', 'Defensa', 60000.00, 9),
(125, 'Jugador5 Zamora', 'Centrocampista', 70000.00, 9),
(126, 'Jugador6 Zamora', 'Centrocampista', 70000.00, 9),
(127, 'Jugador7 Zamora', 'Centrocampista', 70000.00, 9),
(128, 'Jugador8 Zamora', 'Centrocampista', 70000.00, 9),
(129, 'Jugador9 Zamora', 'Delantero', 80000.00, 9),
(130, 'Jugador10 Zamora', 'Delantero', 80000.00, 9),
(131, 'Jugador11 Zamora', 'Delantero', 80000.00, 9),
(132, 'Jugador12 Zamora', 'Delantero', 80000.00, 9),
(133, 'Jugador13 Zamora', 'Delantero', 80000.00, 9),
(134, 'Jugador14 Zamora', 'Defensa', 60000.00, 9),
(135, 'Jugador15 Zamora', 'Centrocampista', 70000.00, 9),

--
-- Índices para tablas volcadas
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
