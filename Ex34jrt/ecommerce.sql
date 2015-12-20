-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-12-2015 a las 11:38:11
-- Versión del servidor: 5.5.46-0ubuntu0.14.04.2
-- Versión de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `prodcod` varchar(10) NOT NULL,
  `prodimg` int(11) DEFAULT NULL,
  `prodtit` varchar(50) DEFAULT NULL,
  `prodpri` int(11) DEFAULT NULL,
  `prodcua` int(11) DEFAULT NULL,
  `proddes` varchar(500) DEFAULT NULL,
  `categoria` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`prodcod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`prodcod`, `prodimg`, `prodtit`, `prodpri`, `prodcua`, `proddes`, `categoria`) VALUES
('ff01', 1, 'Final Fantasy', 20, 1, '¡El primer titulo de la saga remasterizado!', 'psx'),
('ff05', 5, 'Final Fantasy V', 20, 1, '¡El quinto título de la saga remasterizado!', 'psx'),
('ff07', 7, 'Final Fantasy VII', 40, 1, '¡El título de mayor éxito de la saga!', 'psx'),
('ff08', 8, 'Final Fantasy VIII', 40, 1, '¡Uno de los títulos de mayor éxito de la saga!', 'psx'),
('ff10', 10, 'Final Fantasy X', 40, 1, '¡Uno de los grandes títulos de la saga!', 'ps2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
