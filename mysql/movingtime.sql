-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2019 a las 13:24:04
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `movingtime`
--
CREATE DATABASE IF NOT EXISTS `movingtime` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `movingtime`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `userName` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comment`
--

INSERT INTO `comment` (`userName`, `title`, `content`) VALUES
('Daniel Piña', 'A test, again', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.'),
('Daniel Piña', 'This is a test comment', 'TEST Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500'),
('Laura Izquierdo', 'Creation test', 'TEST Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`name`, `phone`, `location`, `price`, `image`) VALUES
('Minimal moving', 91546895, 'Madrid', 400, 'minimal.jpg'),
('Moving Company Paco', 654874154, 'Madrid', 550, 'paco.jpg'),
('Moving europe', 654812496, 'Barcelona', 900, 'europe.jpg'),
('PaLante Movers', 665544887, 'Barcelona', 600, 'movers.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contract`
--

CREATE TABLE `contract` (
  `companyName` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `userName` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contract`
--

INSERT INTO `contract` (`companyName`, `userName`, `date`, `price`) VALUES
('Minimal moving', 'Daniel Piña', '2019-04-20', 400),
('Minimal moving', 'Laura Izquierdo', '2019-04-12', 400),
('Moving Company Paco', 'Daniel Piña', '2019-04-11', 550),
('Moving Company Paco', 'Daniel Piña', '2019-04-20', 550),
('Moving Company Paco', 'Laura Izquierdo', '2019-04-10', 550),
('Moving Company Paco', 'Laura Izquierdo', '2019-06-13', 550);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `follow`
--

CREATE TABLE `follow` (
  `companyName` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `userName` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `follow`
--

INSERT INTO `follow` (`companyName`, `userName`) VALUES
('Minimal moving', 'Daniel Piña'),
('Moving Company Paco', 'Daniel Piña'),
('Moving Company Paco', 'Laura Izquierdo'),
('Moving europe', 'Laura Izquierdo'),
('PaLante Movers', 'Laura Izquierdo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`name`, `password`, `phone`, `location`, `image`) VALUES
('Angel Zamora', '3b357dd7821d6d0aee8dff24b67bc1862a897208', 689457135, 'Valencia', 'angel.jpg'),
('Daniel Piña', '2aba25e1a02df7c65a4d4ec071deb23866368ba6', 687154565, 'Madrid', 'dani.jpg'),
('Laura Izquierdo', '10eb570786fdce4150905bd6b9a16dd4bb932f09', 695238745, 'Valencia', 'laura.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`userName`,`title`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`companyName`,`userName`,`date`);

--
-- Indices de la tabla `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`companyName`,`userName`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
