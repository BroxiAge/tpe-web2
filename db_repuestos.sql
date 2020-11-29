-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-11-2020 a las 16:33:29
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
(1, 'Muy buen producto', 2, 1, 3),
(2, 'Todo correcto', 4, 1, 3),
(3, 'Soy el primer comentario', 3, 3, 3),
(4, 'Soy el segundo comentario', 3, 3, 3),
(5, 'Ahora estoy haciendo un comentario un poco mas largo para poder ver como se visualiza en la pagina wen. Excelente producto.', 5, 3, 3),
(6, 'Yo tambien comento.', 3, 1, 1);

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
(1, 'paragolpe', 'ford falcon', 1, 55, 'el paragolpes ma\' potente del condado'),
(3, 'cilindro', 'fiat duna', 2, 122.5, NULL),
(4, 'parabrisa', 'ford focus', 1, 432, NULL),
(5, 'extremo derecho', 'toyota hilux', 4, 1233, NULL),
(7, 'puerta derecha', 'fiat 147 ', 1, 3333, NULL),
(40, 'pinito', 'todos', 30, 123123, 'ingrese la descripcion del producto');

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
(1, 'Jonatan', '$2y$10$qIn7HNtajjAwe5KgRgI3KOwZeQOkFBnxAcfxaHlZewbaIUY2A2vMW', 0),
(2, 'Invitado', '$2y$10$RPYMTfkR2Pya.qIFqT50Ne3L5E3DwhGL/Oq8/dDW.Luint84VVyJy\r\n', 0),
(3, 'Nahuel', '$2y$10$Zu7bUX6duUHlerw/w559WO7qQai279gz/gaxx2SWfJl0CjXTFq8YS', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
