
-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 29-03-2020 a las 20:35:32
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `aguase`
--
CREATE DATABASE IF NOT EXISTS `aguase` ;
USE `aguase`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casa`
--
-- Creación: 29-03-2020 a las 20:23:13
--

DROP TABLE IF EXISTS `casa`;
CREATE TABLE IF NOT EXISTS `casa` (
  `id_casa` int(4) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_casa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deuda`
--
-- Creación: 29-03-2020 a las 20:23:19
--

DROP TABLE IF EXISTS `deuda`;
CREATE TABLE IF NOT EXISTS `deuda` (
  `id_deuda` int(8) NOT NULL,
  `monto` float NOT NULL,
  `id_tarjeta` int(4) NOT NULL,
  PRIMARY KEY (`id_deuda`),
  KEY `FK_id_tarjeta` (`id_tarjeta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_agua`
--
-- Creación: 29-03-2020 a las 20:23:20
--

DROP TABLE IF EXISTS `pago_agua`;
CREATE TABLE IF NOT EXISTS `pago_agua` (
  `id_pago` int(8) NOT NULL,
  `id_tarjeta` int(4) NOT NULL,
  `id_usuario` varchar(8) NOT NULL,
  `monto_cancelar` float NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_pago`),
  KEY `FK_id_tarjeta` (`id_tarjeta`),
  KEY `FK_id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--
-- Creación: 29-03-2020 a las 20:23:22
--

DROP TABLE IF EXISTS `socio`;
CREATE TABLE IF NOT EXISTS `socio` (
  `id_tarjeta` int(4) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `telefono` int(8) NOT NULL,
  `id_casa` int(4) NOT NULL,
  PRIMARY KEY (`id_tarjeta`),
  KEY `FK_id_casa` (`id_casa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--
-- Creación: 29-03-2020 a las 20:27:38
--

DROP TABLE IF EXISTS `transaccion`;
CREATE TABLE IF NOT EXISTS `transaccion` (
  `id_transaccion` int(10) NOT NULL,
  `id_deuda` int(8) NOT NULL,
  `id_tarjeta` int(4) NOT NULL,
  `pago` float NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` varchar(8) NOT NULL,
  PRIMARY KEY (`id_transaccion`),
  KEY `FK_id_deuda` (`id_deuda`),
  KEY `FK_id_tarjeta` (`id_tarjeta`),
  KEY `FK_id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--
-- Creación: 29-03-2020 a las 20:26:39
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` varchar(8) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `contrasena` varchar(10) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `deuda`
--
ALTER TABLE `deuda`
  ADD CONSTRAINT `deuda_ibfk_1` FOREIGN KEY (`id_tarjeta`) REFERENCES `socio` (`id_tarjeta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago_agua`
--
ALTER TABLE `pago_agua`
  ADD CONSTRAINT `pago_agua_ibfk_1` FOREIGN KEY (`id_tarjeta`) REFERENCES `socio` (`id_tarjeta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_agua_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `socio`
--
ALTER TABLE `socio`
  ADD CONSTRAINT `socio_ibfk_1` FOREIGN KEY (`id_casa`) REFERENCES `casa` (`id_casa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD CONSTRAINT `transaccion_ibfk_1` FOREIGN KEY (`id_tarjeta`) REFERENCES `socio` (`id_tarjeta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaccion_ibfk_2` FOREIGN KEY (`id_deuda`) REFERENCES `deuda` (`id_deuda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaccion_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `transaccion` (`id_usuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
