-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-03-2021 a las 21:07:44
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Hondusearch`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correo`
--

CREATE TABLE `correo` (
  `idCorreo` int(11) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `correo`
--

INSERT INTO `correo` (`idCorreo`, `correo`, `idPersona`) VALUES
(1, 'yuniorcerrato26@gmail.com', 1),
(33349, 'billyjoellopez083@gmail.com', 33349),
(88878, 'yuniorcerrato@gmail.com', 88878);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `idEspecialidad` int(10) NOT NULL,
  `especialidad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`idEspecialidad`, `especialidad`) VALUES
(1, 'FrontEnd'),
(2, 'BackEnd'),
(3, 'FullStack');

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
  `imagen` varchar(45) DEFAULT NULL,
  `curriculum` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `imagen`, `curriculum`) VALUES
(1, 'Yunior', NULL, 'Cerrato', NULL, NULL, NULL),
(33349, 'Billy', 'Joel', 'Lopez', 'Martinez', NULL, NULL),
(88878, 'yunior', 'marel', 'cerrato', 'dominguez', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `idTelefono` int(11) NOT NULL,
  `numeroTelefono` varchar(45) NOT NULL,
  `idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`idTelefono`, `numeroTelefono`, `idPersona`) VALUES
(1, '12345678', 1),
(33349, '33411650', 33349),
(88878, '12345678', 88878);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodesarrollador`
--

CREATE TABLE `tipodesarrollador` (
  `idTipoDesarrollador` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipodesarrollador`
--

INSERT INTO `tipodesarrollador` (`idTipoDesarrollador`, `descripcion`) VALUES
(1, 'Desktop'),
(2, 'Movil'),
(3, 'Web');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodeusuario`
--

CREATE TABLE `tipodeusuario` (
  `idTipoDeUsuario` int(11) NOT NULL,
  `tipoUsuario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `idPersona` int(11) NOT NULL,
  `idEspecialidad` int(10) DEFAULT NULL,
  `idTipoDesarrollador` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `contrasenia`, `idTipoDeUsuario`, `idPersona`, `idEspecialidad`, `idTipoDesarrollador`) VALUES
(1, 'yuniorcd', '$2y$10$csQF1LkCfxO0qoJLSRyhxeuvR1/Ei1Vvx0G6l6KIk2lPnPPql43Pi', 1, 1, 3, 3),
(33349, 'bijo', '$2y$10$bE4Rp9MqkLwmKluGbixHteS2iB0/CeqORIlu9h6.iUtDg21rW5u2e', 1, 33349, NULL, NULL),
(88878, 'yuniormcd', '$2y$10$FumiIjJr8V99CU2HhOGWuO7X79xhzlcCeiBipndHKBbQ2OhjCVI8a', 1, 88878, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `correo`
--
ALTER TABLE `correo`
  ADD PRIMARY KEY (`idCorreo`),
  ADD KEY `fk_correo_persona` (`idPersona`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`idEspecialidad`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`idTelefono`),
  ADD KEY `fk_telefono_persona` (`idPersona`);

--
-- Indices de la tabla `tipodesarrollador`
--
ALTER TABLE `tipodesarrollador`
  ADD PRIMARY KEY (`idTipoDesarrollador`);

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
  ADD KEY `fk_Usuario_Persona` (`idPersona`),
  ADD KEY `fk_usuario_desarrollador` (`idTipoDesarrollador`),
  ADD KEY `fk_usuario_especialidad` (`idEspecialidad`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `correo`
--
ALTER TABLE `correo`
  ADD CONSTRAINT `fk_correo_persona` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`);

--
-- Filtros para la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `fk_telefono_persona` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Persona` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`),
  ADD CONSTRAINT `fk_Usuario_TipoDeUsuario` FOREIGN KEY (`idTipoDeUsuario`) REFERENCES `tipodeusuario` (`idTipoDeUsuario`),
  ADD CONSTRAINT `fk_usuario_desarrollador` FOREIGN KEY (`idTipoDesarrollador`) REFERENCES `tipodesarrollador` (`idTipoDesarrollador`),
  ADD CONSTRAINT `fk_usuario_especialidad` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidades` (`idEspecialidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
