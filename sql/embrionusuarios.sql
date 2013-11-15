-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Servidor: 10.246.16.188:3306
-- Tiempo de generación: 15-11-2013 a las 09:21:09
-- Versión del servidor: 5.1.66-0+squeeze1
-- Versión de PHP: 5.3.3-7+squeeze15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `embrion_es`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `embrionusuarios`
--

CREATE TABLE IF NOT EXISTS `embrionusuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `mail` varchar(500) NOT NULL,
  `ip` varchar(500) NOT NULL,
  `fecha` varchar(500) NOT NULL,
  `validar` varchar(500) NOT NULL,
  `validado` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `fechanacimiento` varchar(250) NOT NULL,
  `biografia` text NOT NULL,
  `status` varchar(250) NOT NULL,
  `dni` varchar(250) NOT NULL,
  `ciudad` varchar(250) NOT NULL,
  `pais` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `web` varchar(250) NOT NULL,
  `youtube` varchar(250) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
