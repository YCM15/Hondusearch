-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2021 a las 03:09:22
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hondusearch`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aspirantes`
--

CREATE TABLE `aspirantes` (
  `idaspirantes` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idempleo` int(11) NOT NULL,
  `urlpdf` varchar(300) NOT NULL,
  `pregunta1` varchar(1000) NOT NULL,
  `pregunta2` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aspirantes`
--

INSERT INTO `aspirantes` (`idaspirantes`, `idusuario`, `idempleo`, `urlpdf`, `pregunta1`, `pregunta2`) VALUES
(1, 27231, 62146, 'Curriculum/CurriculumBilly.pdf', 'es una empresa muy reconocida', 'puedo gritar siuuuuuuuuuu mas fuerte y soy motaguense ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correo`
--

CREATE TABLE `correo` (
  `idCorreo` int(11) NOT NULL,
  `correo` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `correo`
--

INSERT INTO `correo` (`idCorreo`, `correo`) VALUES
(36856, 'billyjoellopez083@gmail.com'),
(55734, 'billyjoellopez083@gmail.com'),
(77344, 'billyjoellopez083@gmail.com'),
(38666, 'billyjoellopez083@gmail.com'),
(68787, 'billyjoellopez083@gmail.com'),
(27231, 'billyjoellopez083@gmail.com'),
(82996, 'billyjoellopez083@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleo`
--

CREATE TABLE `empleo` (
  `idempleo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `sueldo` float NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `datos` varchar(120) NOT NULL,
  `correo` varchar(120) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleo`
--

INSERT INTO `empleo` (`idempleo`, `nombre`, `descripcion`, `sueldo`, `titulo`, `datos`, `correo`, `idusuario`, `estado`) VALUES
(29452, 'Rubigol', 'Programar y gestionar las actividades de Mantenimiento asÃ­ como asegurar la disponibilidad de refacciones , recurso humano y presupuesto asegurando la disponibilidad de los equipos y recursos para cumplimiento de programa de producciÃ³n.', 12000, 'Programador De Mantenimiento', 'Programador De Mantenimiento', 'Rubigol@gmail.com', 68787, 0),
(46024, 'Rubigol', 'Programar y gestionar las actividades de Mantenimiento asÃ­ como asegurar la disponibilidad de refacciones , recurso humano y presupuesto asegurando la disponibilidad de los equipos y recursos para cumplimiento de programa de producciÃ³n.', 12000, 'Programador De FrontEnd', 'Programador De FrontEnd', 'Rubigol@gmail.com', 68787, 0),
(39020, 'Rubigol', 'Programar y gestionar las actividades de Mantenimiento asÃ­ como asegurar la disponibilidad de refacciones , recurso humano y presupuesto asegurando la disponibilidad de los equipos y recursos para cumplimiento de programa de producciÃ³n.', 12000, 'Programador De Backend', 'Node js', 'Rubigol@gmail.com', 68787, 0),
(52679, 'Rubigol', 'Programar y gestionar las actividades de Mantenimiento asÃ­ como asegurar la disponibilidad de refacciones , recurso humano y presupuesto asegurando la disponibilidad de los equipos y recursos para cumplimiento de programa de producciÃ³n.', 15000, 'Programador De Backend', 'php', 'Rubigol@gmail.com', 68787, 0),
(62146, 'Alimentos de Cortes', 'Experiencia avanzada en administraciÃ³n de Bases de datos SQL Habilidades de programaciÃ³n en lenguaje Visual RPG, C#, net, Visual Basic entre otros. Graduado de IngenierÃ­a en Sistemas ', 20000, 'Ingeniero en Sitemas - Con Experiencia', 'Java', 'alimentoscortes@gmail.com', 27231, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL,
  `primerNombre` varchar(45) NOT NULL,
  `segundoNombre` varchar(45) DEFAULT NULL,
  `primerApellido` varchar(45) DEFAULT NULL,
  `segundoApellido` varchar(45) DEFAULT NULL,
  `numId` varchar(45) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `curriculum` varchar(50) DEFAULT NULL,
  `idcorreo` int(11) NOT NULL,
  `idtelefono` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `numId`, `imagen`, `fechaNacimiento`, `pais`, `curriculum`, `idcorreo`, `idtelefono`) VALUES
(38666, 'Billy', 'Joel', 'Lopez', 'Martinez', NULL, NULL, NULL, NULL, NULL, 38666, 38666),
(77344, 'Billy', 'Joel', 'Lopez', 'Martinez', NULL, NULL, NULL, NULL, NULL, 77344, 77344),
(68787, 'Rubilio', 'nose', 'Castillo', 'nose', NULL, NULL, NULL, NULL, NULL, 68787, 68787),
(27231, 'billy', 'joel', 'LÃ³pez', 'MartÃ­nez', NULL, NULL, NULL, NULL, NULL, 27231, 27231),
(82996, 'Billy', 'Joel', 'LÃ³pez', 'MartÃ­nez', NULL, NULL, NULL, NULL, NULL, 82996, 82996);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `idTelefono` int(11) NOT NULL,
  `numeroTelefono` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`idTelefono`, `numeroTelefono`) VALUES
(68787, '33411650'),
(9503, '33411650'),
(11706, '33411650'),
(55734, '33411650'),
(36856, '33411650'),
(77344, '33411650'),
(38666, '33411650'),
(27231, '33411650'),
(82996, '33411650');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodeusuario`
--

CREATE TABLE `tipodeusuario` (
  `idTipoDeUsuario` int(11) NOT NULL,
  `tipoUsuario` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipodeusuario`
--

INSERT INTO `tipodeusuario` (`idTipoDeUsuario`, `tipoUsuario`) VALUES
(1, 'Desarrollador'),
(2, 'Cliente Individual'),
(3, 'Cliente Empresa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `idTipoDeUsuario` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `contrasenia`, `idTipoDeUsuario`, `idPersona`) VALUES
(38666, 'bijo2', '$2y$10$YOyfWoOPtiFwAtQ8WB19j.mAdpk9dN5kwYAcncwR3cg0qv9MatA12', 1, 38666),
(77344, 'bijo', '$2y$10$DnpuGTdyTTrmQIviGDq77OJQDSacJUBKfk/fGdrJRHSOD62/VfMty', 1, 77344),
(68787, 'rubigol', '$2y$10$gBf9AqDs2AQDvp42UaOSGOr.JebaGGpwmqdSvYFrOfpQ0MYteEN6.', 2, 68787),
(27231, 'bijo7', '$2y$10$o805g4wPXrx.VR.lTHrNqeGuYjIhMzR56MhGgyQAdKd9jSMhC0u3y', 2, 27231),
(82996, 'bijo77', '$2y$10$.OvITohc33nj2iaEu25r5u6RjCCLpypktdhhrveNu09y54xYTdPdK', 1, 82996);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `correo`
--
ALTER TABLE `correo`
  ADD PRIMARY KEY (`idCorreo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`idTelefono`);

--
-- Indices de la tabla `tipodeusuario`
--
ALTER TABLE `tipodeusuario`
  ADD PRIMARY KEY (`idTipoDeUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Usuario_TipoDeUsuario` (`idTipoDeUsuario`),
  ADD KEY `fk_Usuario_Persona` (`idPersona`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
