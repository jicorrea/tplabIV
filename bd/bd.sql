-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2016 a las 18:23:24
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarUsuario`(IN `correo` VARCHAR(50))
    NO SQL
DELETE from usuarios where correo=correo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarUsuario`(IN `cor` VARCHAR(50), IN `cont` VARCHAR(50), IN `ape` VARCHAR(50), IN `nom` VARCHAR(50), IN `tel` INT(50), IN `obr` VARCHAR(50), IN `prov` VARCHAR(50), IN `loc` VARCHAR(50), IN `dir` VARCHAR(50), IN `fot` VARCHAR(50))
    NO SQL
INSERT INTO usuarios (correo,contrasena,apellido,nombre,telefono,obra_soc,provincia,localidad,direccion,foto)values(cor,cont,ape,nom,tel,obr,prov,loc,dir,fot)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarUsuario`(IN `cor` VARCHAR(50), IN `cont` VARCHAR(50), IN `ape` VARCHAR(50), IN `nom` VARCHAR(50), IN `tel` INT(50), IN `obr` VARCHAR(50), IN `prov` VARCHAR(50), IN `loc` VARCHAR(50), IN `dir` VARCHAR(50), IN `fot` VARCHAR(50))
    NO SQL
UPDATE usuarios set contrasena= cont, telefono = tel, obra_soc = obr, apellido= ape, nombre= nom,provincia= prov, localidad= loc, direccion= dir, foto= fot WHERE correo= cor$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerUnUsuario`(IN `co` VARCHAR(50))
    NO SQL
SELECT * FROM usuarios WHERE correo = co$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerUsuarios`()
    NO SQL
SELECT * FROM usuarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `validarUsuario`(IN `cor` VARCHAR(50), IN `cont` VARCHAR(50))
    NO SQL
SELECT * from usuarios where correo= cor && contrasena =cont$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(10) NOT NULL,
  `titulo` text COLLATE latin1_spanish_ci NOT NULL,
  `descr` text COLLATE latin1_spanish_ci NOT NULL,
  `imagen` text COLLATE latin1_spanish_ci NOT NULL,
  `dia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `titulo`, `descr`, `imagen`, `dia`) VALUES
(1, 'ab', 'ab', '1.jpg', '0000-00-00 00:00:00'),
(2, 'doctora', 'ahorro', '2.jpg', '0000-00-00 00:00:00'),
(3, 'Facebook Style Scroll Bar', 'How to create Facebook style scroll bar with jQuery and CSS.', '3.jpg', '2014-01-23 09:54:40'),
(4, 'acf', 'abc', '4.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE IF NOT EXISTS `medicos` (
  `correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nomDoctor` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `especialidad` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `dia` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `estado` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`correo`, `nomDoctor`, `especialidad`, `telefono`, `dia`, `estado`) VALUES
('a@hotmail.com', 'hugo', 'Clinico', '1234', 'lunes', 'guardar'),
('ab@hotmail.com', 'hugo', 'Clinico', '1234', 'lunes', 'guardar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id_noticia` int(4) NOT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `fecha` date NOT NULL,
  `noticia` text
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `autor`, `titulo`, `categoria`, `fecha`, `noticia`) VALUES
(1, 'juan', 'algo', 'lala', '0000-00-00', 'bingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE IF NOT EXISTS `turnos` (
  `id_Turno` int(11) NOT NULL,
  `uCorreo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `nomDoctor` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `especialidad` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `horario` int(11) NOT NULL,
  `estado` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `correo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `contrasena` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` int(50) NOT NULL,
  `obra_soc` varchar(50) COLLATE latin1_spanish_ci NOT NULL DEFAULT 'Particular',
  `provincia` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `localidad` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `foto` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`correo`, `contrasena`, `apellido`, `nombre`, `telefono`, `obra_soc`, `provincia`, `localidad`, `direccion`, `foto`) VALUES
('adm@correajuan.tuars.com', 'e10adc3949ba59abbe56e057f20f883e', 'adm', 'adm', 12345, 'Particular', 'bsas', 'a', 'a', 'porDefecto.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`correo`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD KEY `id_noticia` (`id_noticia`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_Turno`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_Turno` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
