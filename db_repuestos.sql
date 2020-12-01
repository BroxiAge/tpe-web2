-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2020 a las 13:00:04
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_repuestos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categorie` int(11) NOT NULL,
  `name` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categorie`, `name`) VALUES
(1, 'chasis'),
(2, 'motor'),
(4, 'tren delantero'),
(30, 'accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `commentary` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `id_repuesto` int(11) NOT NULL,
  `id_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `commentary`, `score`, `id_repuesto`, `id_usuarios`) VALUES
(30, 'el cilindro esta buenazo', 5, 3, 3),
(31, 'el cilindro esta buenazo', 5, 3, 3),
(32, 'me arrepenti, es malisimo', 1, 3, 3),
(33, 'yo lo probe, pero es mala calidad y te lo venden como bueno!! ', 1, 3, 9),
(34, 'genial', 4, 4, 9),
(35, 'genial', 4, 4, 9),
(36, 'QUE ES ESTO!?', 1, 41, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuesto`
--

CREATE TABLE `repuesto` (
  `id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `vehicle` varchar(99) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `repuesto`
--

INSERT INTO `repuesto` (`id`, `name`, `vehicle`, `id_categorie`, `price`, `description`) VALUES
(3, 'cilindro', 'fiat duna', 2, 1, 'ingrese la descripcion del producto'),
(4, 'parabrisa', 'ford focus', 1, 432, NULL),
(41, 'nuevo', 'fiat palio', 1, 1, 'ingrese la descripcion del producto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `name`, `password`, `rol`) VALUES
(2, 'Invitado', '$2y$10$RPYMTfkR2Pya.qIFqT50Ne3L5E3DwhGL/Oq8/dDW.Luint84VVyJy\r\n', 2),
(3, 'Nahuel', '$2y$10$Zu7bUX6duUHlerw/w559WO7qQai279gz/gaxx2SWfJl0CjXTFq8YS', 1),
(9, 'Jonatan', '$2y$10$Uf3fWdkxlrxwCfj3W0q0tuD9NEELfNi57Sp0OCNGUuXTvy0U7xOXS', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
