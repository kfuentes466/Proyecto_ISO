-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 29-03-2020 a las 05:11:59
-- Versión del servidor: 8.0.18
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
CREATE DATABASE IF NOT EXISTS `aguase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `aguase`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casa`
--

DROP TABLE IF EXISTS `casa`;
CREATE TABLE IF NOT EXISTS `casa` (
  `id_casa` int(4) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_casa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deuda`
--

DROP TABLE IF EXISTS `deuda`;
CREATE TABLE IF NOT EXISTS `deuda` (
  `id_deuda` int(8) NOT NULL,
  `monto` float NOT NULL,
  `id_tarjeta` int(4) NOT NULL,
  PRIMARY KEY (`id_deuda`),
  KEY `FK_id_tarjeta` (`id_tarjeta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_agua`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` varchar(8) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `contraseña` varchar(10) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
