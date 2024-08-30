-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2024 a las 07:57:47
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clientes`
--
CREATE DATABASE IF NOT EXISTS `clientes` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `clientes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(11) NOT NULL,
  `AVATAR` varchar(100) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `TELEFONO` varchar(15) NOT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `ACTIVO` int(11) NOT NULL DEFAULT 0,
  `CREDITO` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `AVATAR`, `NOMBRE`, `TELEFONO`, `EMAIL`, `ACTIVO`, `CREDITO`) VALUES
(1, './img/1.jpg', 'HUGO', '411', 'HUGO@EMPRESA.COM', 1, 1000000),
(2, './img/2.jpg', 'PACO', '412', 'PACO@EMPRESA.COM', 0, 2000000),
(3, './img/3.jpg', 'LUIS', '413', 'LUIS@EMPRESA.COM', 1, 3000000),
(4, './img/4.jpg', 'ANA', '414', 'ANA@EMPRESA.COM', 0, 4000000),
(5, './img/5.jpg', 'LINA', '415', 'LINA@EMPRESA.COM', 1, 5000000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
