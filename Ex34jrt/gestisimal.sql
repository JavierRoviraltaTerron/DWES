-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-12-2015 a las 11:38:47
-- Versión del servidor: 5.5.46-0ubuntu0.14.04.2
-- Versión de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gestisimal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `prodcod` varchar(10) NOT NULL,
  `proddes` varchar(500) DEFAULT NULL,
  `prodbuypri` int(11) DEFAULT NULL,
  `prodselpri` int(11) DEFAULT NULL,
  `prodsto` int(11) DEFAULT NULL,
  PRIMARY KEY (`prodcod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`prodcod`, `proddes`, `prodbuypri`, `prodselpri`, `prodsto`) VALUES
('6', 'bolito', 5, 7, 5),
('7', 'abdas', 3, 4, 15),
('8', '', 0, 0, 92),
('cod1', 'Producto1', 11, 15, 90),
('cod2', 'Producto2', 12, 22, 222),
('cod3', 'Producto3', 13, 33, 333),
('cod4', 'Producto4', 14, 44, 444),
('cod5', 'Producto5', 15, 55, 555),
('cod6', 'Producto6', 16, 66, 666),
('cod7', 'Producto7', 17, 77, 777),
('cod8', 'Producto8', 18, 88, 888),
('cod9', 'Producto9', 19, 99, 999);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
