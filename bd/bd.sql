-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2016 a las 10:36:46
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
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id_noticia` int(50) NOT NULL,
  `autor` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `titulo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `categoria` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `noticia` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `autor`, `titulo`, `categoria`, `fecha`, `noticia`) VALUES
(1, 'autor', 'titulo', 'policial', '2016-02-08', 'paso algo');

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
('o@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'ramriez', 'Roberto', 1, 'Galeno', 'ab', 'a', 'a', 'ogmailcom.jpg'),
('r@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'ramriez', 'Roberto', 1, 'Galeno', 'ab', 'a', 'a', 'ogmailcom.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
