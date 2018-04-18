-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-04-2018 a las 16:58:25
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `imbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelis`
--

CREATE TABLE IF NOT EXISTS `pelis` (
  `images` text COLLATE utf8_spanish_ci NOT NULL,
  `link` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `movie_title` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `place` int(11) NOT NULL,
  `rating` float NOT NULL,
  `star_cast` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `vote` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'None',
  `year` int(11) NOT NULL,
  PRIMARY KEY (`place`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pelis`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
