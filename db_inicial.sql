-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-04-2013 a las 16:53:53
-- Versión del servidor: 5.1.66
-- Versión de PHP: 5.3.3-7+squeeze14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `jaup`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jaup_centros`
--

CREATE TABLE IF NOT EXISTS `jaup_centros` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `city` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `resp_user` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `image` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `jaup_centros`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jaup_entregas`
--

CREATE TABLE IF NOT EXISTS `jaup_entregas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `prof` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ini` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `centro_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `jaup_entregas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jaup_users`
--

CREATE TABLE IF NOT EXISTS `jaup_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `curso` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `image` tinyint(1) NOT NULL,
  `registry_date` datetime NOT NULL,
  `type` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `jaup_users`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jaup_works`
--

CREATE TABLE IF NOT EXISTS `jaup_works` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `trabajoID` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `user` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `jaup_works`
--

