-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2022 a las 00:48:23
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
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `idcalificacion` int(11) NOT NULL,
  `estado` varchar(12) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `idTrabajoGrado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `iddocente` int(11) NOT NULL,
  `especialidad` varchar(90) NOT NULL,
  `idroldoc` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`iddocente`, `especialidad`, `idroldoc`, `idpersona`) VALUES
(345353, 'analizador de sistemas', 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `codigoestudiante` int(11) NOT NULL,
  `semestre` char(2) NOT NULL,
  `idpersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`codigoestudiante`, `semestre`, `idpersona`) VALUES
(11, '9', 2),
(223, '8', 6);

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
(6, 'Mario', 'pineda', 'CE', '35546465', '3214566666', 'marioprew3@g.com', '1111', 'M', 2),
(7, 'Julio', 'Carmelino', 'CC', '46465656', '3214455555', 'julioc@g.com', '1111', 'M', 2),
(8, 'Julio', 'Orbes', 'CC', '3546575', '321244555', 'julioor@gmail.com', '1111', 'M', 2),
(9, 'Julio', 'Cornelio', 'CC', '454657', '3214565778', 'juliocor2@gmail.com', '1111', 'M', 2),
(10, 'mariano', 'gospel', 'CC', '54545632', '312345656', 'gospel355@g.com', '1111', 'M', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol`) VALUES
(1, 'Admin'),
(2, 'Docente'),
(3, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roldocente`
--

CREATE TABLE `roldocente` (
  `idroldoc` int(11) NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roldocente`
--

INSERT INTO `roldocente` (`idroldoc`, `rol`) VALUES
(1, 'Jurado'),
(2, 'Asesor');

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
  `docasig` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajogrado`
--

INSERT INTO `trabajogrado` (`idTrabajoGrado`, `nombre`, `fechacar`, `rutaArchivo`, `codigoestudiante`, `docasig`) VALUES
(1, 'prueba', '1999-12-11', '../archivoTesis/sprint1.pdf', 11, 4),
(2, 'Sistema de informacion', '1999-11-09', 'C:/Users/Windows 10/Documents/sprint1.pdf', 11, 10),
(4, 'sistema de mario', '1999-10-11', '../archivoTesis/reporte2021prueba.php.pdf', 223, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`idcalificacion`),
  ADD KEY `idTrabajoGrado` (`idTrabajoGrado`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`iddocente`),
  ADD KEY `idpersona` (`idpersona`),
  ADD KEY `idroldoc` (`idroldoc`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`codigoestudiante`),
  ADD KEY `idpersona` (`idpersona`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `idrol` (`idrol`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `roldocente`
--
ALTER TABLE `roldocente`
  ADD PRIMARY KEY (`idroldoc`);

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
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `idcalificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `trabajogrado`
--
ALTER TABLE `trabajogrado`
  MODIFY `idTrabajoGrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`idTrabajoGrado`) REFERENCES `trabajogrado` (`idTrabajoGrado`);

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`),
  ADD CONSTRAINT `docente_ibfk_2` FOREIGN KEY (`idroldoc`) REFERENCES `roldocente` (`idroldoc`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`);

--
-- Filtros para la tabla `trabajogrado`
--
ALTER TABLE `trabajogrado`
  ADD CONSTRAINT `trabajogrado_ibfk_2` FOREIGN KEY (`codigoestudiante`) REFERENCES `estudiante` (`codigoestudiante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
