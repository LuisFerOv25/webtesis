-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-08-2022 a las 03:04:19
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
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `tipoide` varchar(45) NOT NULL,
  `numdoc` char(10) NOT NULL,
  `celular` char(12) NOT NULL,
  `correo` varchar(90) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `sexo` char(2) NOT NULL,
  `idrol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombre`, `apellido`, `tipoide`, `numdoc`, `celular`, `correo`, `pass`, `sexo`, `idrol`) VALUES
(1, 'mauro', 'lopez', 'CE', '4564657', '343435', 'dgdg@g.com', '1111', 'M', 1),
(2, 'julian', 'monteros', 'CC', '12123244', '1323244', 'julian34@gmail.com', '1111', 'M', 3),
(3, 'mauro', 'gomez', 'CC', '35465656', '3214555677', 'mauro345@gmail.com', '1111', 'M', 2),
(4, 'lucia', 'andrade', 'CC', '5345465', '3454546', 'lucia355@hotmail.com', '1234', 'F', 2),
(5, 'Fausto', 'Cornelio', 'CC', '3245166765', '3215444322', 'fausto43@g.com', '1111', 'M', 2),
(6, 'Mario', 'pineda', 'CE', '35546465', '3214566666', 'marioprew3@g.com', '1111', 'M', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `idrol` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
