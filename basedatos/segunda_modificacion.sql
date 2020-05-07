-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-05-2020 a las 08:43:27
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aguase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casa`
--

DROP TABLE IF EXISTS `casa`;
CREATE TABLE IF NOT EXISTS `casa` (
  `id_casa` int(4) NOT NULL AUTO_INCREMENT,
  `num_casa` int(3) NOT NULL,
  `pasaje` int(3) NOT NULL,
  `poligono` int(3) NOT NULL,
  PRIMARY KEY (`id_casa`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `casa`
--

INSERT INTO `casa` (`id_casa`, `num_casa`, `pasaje`, `poligono`) VALUES
(8, 5, 5, 5),
(7, 12, 40, 11),
(6, 1, 1, 1),
(9, 5, 6, 5),
(10, 3, 4, 5),
(11, 7, 8, 12),
(12, 5, 9, 5),
(13, 12, 5, 3),
(14, 10, 8, 3),
(15, 7, 7, 7),
(16, 3, 9, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deuda`
--

DROP TABLE IF EXISTS `deuda`;
CREATE TABLE IF NOT EXISTS `deuda` (
  `id_deuda` int(8) NOT NULL AUTO_INCREMENT,
  `monto` float NOT NULL,
  `estado` int(1) NOT NULL,
  `id_socio` int(11) NOT NULL,
  PRIMARY KEY (`id_deuda`),
  KEY `fk_deuda_socio` (`id_socio`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `deuda`
--

INSERT INTO `deuda` (`id_deuda`, `monto`, `estado`, `id_socio`) VALUES
(1, 240, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

DROP TABLE IF EXISTS `socio`;
CREATE TABLE IF NOT EXISTS `socio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_tarjeta` int(4) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `id_casa` int(4) NOT NULL,
  `activo` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_id_casa` (`id_casa`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`id`, `num_tarjeta`, `nombre`, `apellido`, `telefono`, `id_casa`, `activo`) VALUES
(1, 1234, 'plis', 'hweqwe', '1234-1234', 6, 1),
(2, 1236, 'victor', 'Flores', '33446677', 7, 1),
(3, 2233, 'Vero', 'Flores', '4455-6677', 8, 1),
(4, 2235, 'Vero', 'Flores', '4455-6689', 9, 1),
(5, 1234, 'Ejemplo', 'Flores', '12345678', 10, 1),
(6, 4567, 'Carlos', 'Mendoza', '4477-8833', 11, 1),
(7, 1256, 'Victor', 'Flores', '7890-3456', 12, 1),
(8, 0, ' ', ' ', ' ', 13, 0),
(10, 0, ' ', ' ', ' ', 15, 0),
(11, 5913, 'Teresa', 'Calcuta', '7788-2589', 16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

DROP TABLE IF EXISTS `transaccion`;
CREATE TABLE IF NOT EXISTS `transaccion` (
  `id_transaccion` varchar(120) NOT NULL,
  `id_socio` int(11) NOT NULL,
  `id_deuda` int(8) DEFAULT NULL,
  `pago` float NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` varchar(8) NOT NULL,
  PRIMARY KEY (`id_transaccion`),
  KEY `FK_id_deuda` (`id_deuda`),
  KEY `FK_id_usuario` (`id_usuario`),
  KEY `fk_transaccion_socio` (`id_socio`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `transaccion`
--

INSERT INTO `transaccion` (`id_transaccion`, `id_socio`, `id_deuda`, `pago`, `fecha`, `id_usuario`) VALUES
('b703f2edd4452b3bba36c26202b709ad', 3, NULL, 7, '2020-04-04', 'admi'),
('d9bdafad6fcf27f47b3a7968bfdc9539', 9, 1, 7, '2020-04-04', 'admi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` varchar(8) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `contrasena` varchar(10) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `contrasena`, `tipo`) VALUES
('admi', 'Administrador', 'admin', '1234', '1'),
('emp01', 'Ejemplo', 'Funcional', 'emp01', '2'),
('emp02', 'Oscar', 'Fernando', 'emp02', '2'),
('emp03', 'Alejandra', 'Merino', 'emp03', '2'),
('emp04', 'Alejandra', 'Merino', 'emp04', '2'),
('emp11', 'angel', 'Vasquez', 'emp11', '2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
