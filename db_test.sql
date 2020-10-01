-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2020 a las 22:16:46
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugus`
--

CREATE TABLE `sugus` (
  `Color` int(11) NOT NULL,
  `sabor` text NOT NULL,
  `aroma` text NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sugus`
--

INSERT INTO `sugus` (`Color`, `sabor`, `aroma`, `precio`) VALUES
(1, 'el amarillo apesta', 'limon', 2),
(2, '', '', 0),
(3, 'amarillo apesta', 'limon', 0),
(4, 'amarillo apesta', 'limon', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugus_max`
--

CREATE TABLE `sugus_max` (
  `id_` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `tubiega` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `completed` tinyint(1) NOT NULL,
  `priority` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `task`
--

INSERT INTO `task` (`id`, `title`, `description`, `completed`, `priority`) VALUES
(1, 'Comprar el pan lactalas', 'Traer milongasasd', 0, 0),
(4, 'Desde el form crear tarea', 'asd', 1, 0),
(5, 'Tarea 2', 'asdadsasd', 0, 3434),
(7, 'asd', 'asd', 0, 0),
(8, 'asd', 'asdasd', 0, 0),
(9, 'asd', 'asdasd', 0, 0),
(10, 'Esta deberia estar marcada como completa', 'asdasd', 1, 0),
(11, 'asdasd', 'asd', 1, 0),
(12, 'desde SQL', 'lalalala', 1, 0),
(13, 'ERRRORRRR', 'asdasdasd', 0, 0),
(14, 'asdasdddddddddddddd', 'asdasdasdasd', 0, 12);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sugus`
--
ALTER TABLE `sugus`
  ADD PRIMARY KEY (`Color`);

--
-- Indices de la tabla `sugus_max`
--
ALTER TABLE `sugus_max`
  ADD PRIMARY KEY (`id_`);

--
-- Indices de la tabla `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sugus`
--
ALTER TABLE `sugus`
  MODIFY `Color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sugus_max`
--
ALTER TABLE `sugus_max`
  MODIFY `id_` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
