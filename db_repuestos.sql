-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2020 a las 19:02:52
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
(70, 'Aliméntense balanceado. Muy buen producto.', 3, 101, 3),
(71, 'Inviertan en dolares.', 4, 101, 3),
(76, 'Flaco no se que te quejas, si me debes la mitad del producto!', 1, 99, 3),
(78, 'Gracias, a su servicio', 5, 100, 3),
(79, 'ASI ESTAS', 1, 101, 3);

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
  `description` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `repuesto`
--

INSERT INTO `repuesto` (`id`, `name`, `vehicle`, `id_categorie`, `price`, `description`, `imagen`) VALUES
(99, 'Rotula', 'Toyota Hilux', 1, 8000, 'Es muy buen material', 'images/spare/5fc7d0258ab0a.jpg'),
(100, 'Bieleta', 'Peugeot 206', 4, 888, '', 'images/spare/5fc7d03dcc4b1.jpg'),
(101, 'Puerta Derecha', 'Vw Bora', 1, 18000, 'Tiene ese valor debido a que son exportadas yatusabe', 'images/spare/5fc7d0a2ee731.jpg');

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
(19, 'Jonatan', '$2y$10$1RnQdLm9Zj0L4WKmIoOKruoMGCIpH.Dbeb83vj80fdvLpmveIx75S', 1),
(20, 'UsuarioLoco', '$2y$10$B00sAf5Z3x8M9JbEkvBk3.Uv/6LfaM6QTh28TRxxGOTjpNDGUPtuO', 0),
(21, 'UsuarioTranca', '$2y$10$o9/fTm6PGKUN3t5yq3Ia8O9AGGSBehFwG53pSG4LqaY1BiiJrz/PG', 0),
(22, 'UnUsuarioCulaquiera', '$2y$10$oQTgtIAorJGx9VRlgnqetOKl.W8FZgX5UObu90M97fbaHlQBCuaIK', 0),
(23, 'NoSoyUsuario', '$2y$10$a9iISQeHPA/EPOXTuL6KRe3fwbhop0eOWDd6Jb.FZXpztMiUuLSkS', 0),
(24, 'mefunaron_666', '$2y$10$Kyw/VSKmzWtHrdOL3ADTiOzjQNhZY5KT78ny1rJj39PQMq2xsAh7S', 0),
(25, 'aguanteellol', '$2y$10$lV.O1nfKfWgsh3lzWhX8nurHXaVlEyAU25ZFpHtELccLuCTa18A4S', 0);

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
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
