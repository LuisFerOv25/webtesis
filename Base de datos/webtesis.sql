-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2022 a las 05:38:01
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `webtesis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajogrado`
--

CREATE TABLE `trabajogrado` (
  `idTrabajoGrado` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fechacar` varchar(45) NOT NULL,
  `rutaArchivo` varchar(200) NOT NULL,
  `codigoestudiante` int(11) NOT NULL,
  `docasig` int(11) DEFAULT NULL,
  `numedit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajogrado`
--

INSERT INTO `trabajogrado` (`idTrabajoGrado`, `nombre`, `fechacar`, `rutaArchivo`, `codigoestudiante`, `docasig`, `numedit`) VALUES
(1, 'Sistema de información para gestion de la tie', '2022-04-11', '../archivoTesis/sprint1.pdf', 21876543, 2, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `trabajogrado`
--
ALTER TABLE `trabajogrado`
  ADD PRIMARY KEY (`idTrabajoGrado`),
  ADD KEY `codigoestudiante` (`codigoestudiante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `trabajogrado`
--
ALTER TABLE `trabajogrado`
  MODIFY `idTrabajoGrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `trabajogrado`
--
ALTER TABLE `trabajogrado`
  ADD CONSTRAINT `trabajogrado_ibfk_1` FOREIGN KEY (`codigoestudiante`) REFERENCES `estudiante` (`codigoestudiante`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
