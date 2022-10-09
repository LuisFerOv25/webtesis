-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2022 a las 06:23:51
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
(1234569, 'Analista de software experto', 2, 6),
(2167567, 'Analista de redes', 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idestado` int(11) NOT NULL,
  `estadoTrabajo` varchar(12) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `idTrabajoGrado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idestado`, `estadoTrabajo`, `comentario`, `idTrabajoGrado`) VALUES
(1, 'Aprobado', 'Felicitaciones', 1),
(2, 'Aprobado', 'Corregir', 3),
(3, 'No aprobado', 'Corregir ', 2),
(4, 'No aprobado', 'no paso', 1),
(5, 'No aprobado', 'noo', 1);

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
(123456, '9', 7),
(123649, '9', 4),
(12364896, '9', 5);

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
(1, 'Luz', 'Sanchez', 'cc', '1234567890', '3116457912', 'luzidalia123@hotmail.com', '4321', 'F', 1),
(4, 'Gustavo Adol', 'Teran Muñoz', 'CC', '1197894863', '3117897777', 'gusteran@udenar.edu.co', '1234', 'M', 3),
(5, 'Anyi Camila', 'Revelo Goyes', 'CC', '1236974620', '3159301111', 'camilarevelo69@udenar.edu.co', '4321', 'F', 3),
(6, 'Arnoldo Dionicio ', 'Moreno Valbuena', 'CC', '1234567890', '3145650457', 'arnoldo19@gmail.com', '1234', 'M', 2),
(7, 'Luis Fernando ', 'Oviedo Dominguez', 'CC', '119327863', '3159307970', 'luisfer78@udenar.edu.co', '1234', 'M', 3),
(8, 'Carlos', 'Pizarro', 'CC', '1098678000', '3215678976', 'CarlosPizarro56@gmail.com', '1234', 'M', 2);

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
  `docasig` int(11) DEFAULT NULL,
  `numedit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajogrado`
--

INSERT INTO `trabajogrado` (`idTrabajoGrado`, `nombre`, `fechacar`, `rutaArchivo`, `codigoestudiante`, `docasig`, `numedit`) VALUES
(1, 'computacion', '2022-09-06', '../Estudiante/archivoTesis/Aplicativo Cliente-Server.pdf', 123649, 2, 2),
(2, 'Sistema distribuido', '2022-08-30', '../archivoTesis/Cronogram.pdf', 12364896, 3, 1),
(3, 'Java y análisis de datos', '2022-08-31', '../archivoTesis/Cronogram.pdf', 123456, 8, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`iddocente`),
  ADD KEY `idroldoc` (`idroldoc`),
  ADD KEY `idpersona` (`idpersona`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idestado`),
  ADD KEY `idTrabajoGrado` (`idTrabajoGrado`);

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
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `trabajogrado`
--
ALTER TABLE `trabajogrado`
  MODIFY `idTrabajoGrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `docente_ibfk_2` FOREIGN KEY (`idroldoc`) REFERENCES `roldocente` (`idroldoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`idTrabajoGrado`) REFERENCES `trabajogrado` (`idTrabajoGrado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajogrado`
--
ALTER TABLE `trabajogrado`
  ADD CONSTRAINT `trabajogrado_ibfk_1` FOREIGN KEY (`codigoestudiante`) REFERENCES `estudiante` (`codigoestudiante`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
