-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2016 a las 19:46:32
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
('fa@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'a', 'a', 0, 'Pami', 'a', 'a', 'a', 'fagmailcom.jpg'),
('fe@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'ab', 'a', 0, 'Particular', 'a', 'a', 'a', 'fegmailcom.jpg'),
('ff@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'ba', 'b', 1, 'Particular', 'a', 'a', 'a', 'ffgmailcom.jpg'),
('fg@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'a', 'a', 1, 'Particular', 'a', 'a', 'a', 'fggmailcom.jpg'),
('fr@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'a', 'a', 1, 'Medical', 'a', 'a', 'a', 'frgmailcom.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`correo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
