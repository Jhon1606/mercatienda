-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2024 a las 19:17:56
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mercatienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Técnologia'),
(2, 'Computadores'),
(3, 'Prueba de cat'),
(4, 'prueba de'),
(6, 'prueba 5'),
(7, 'otra categoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_cambios`
--

CREATE TABLE `log_cambios` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `campo_modificado` varchar(50) DEFAULT NULL,
  `valor_anterior` varchar(255) DEFAULT NULL,
  `valor_nuevo` varchar(255) DEFAULT NULL,
  `fecha_cambio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `log_cambios`
--

INSERT INTO `log_cambios` (`id`, `producto_id`, `campo_modificado`, `valor_anterior`, `valor_nuevo`, `fecha_cambio`) VALUES
(1, 8, 'precio', '53478.00', '55450', '2024-10-04 06:44:40'),
(2, 8, 'cantidad', '16', '23', '2024-10-04 06:44:40'),
(3, 18, 'precio', '45676.00', '4567600', '2024-10-04 17:14:39'),
(4, 8, 'precio', '55450.00', '5545000', '2024-10-04 17:15:11'),
(5, 8, 'precio', '5545000.00', '55478.22', '2024-10-04 17:15:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `precio`, `cantidad`, `imagen`) VALUES
(8, 464, 'prueba de img', '55478.22', 23, 'General/img/watchdogs.jpg'),
(9, 45784, 'Televisor LG', '456781.00', 5, 'General/img/god-of-war-ragnarok-46.jpg'),
(10, 45794, 'Computador Intel', '784510.00', 30, 'General/img/Spiderman.jpg'),
(11, 457814, 'Otra prueba', '458746.00', 7, 'General/img/Spiderman.jpg'),
(12, 57854, 'Tablet Apple', '45751.00', 9, 'General/img/tanjiro-kamado-red-blue-flame-desktop-wallpaper-preview.jpg'),
(13, 87845, 'Samsung Smart Tv', '457814.00', 25, 'General/img/Spiderman.jpg'),
(14, 78458, 'producto 6', '488745.00', 12, 'General/img/watchdogs.jpg'),
(15, 478457, 'producto 7', '57814.00', 45, 'General/img/watchdogs.jpg'),
(16, 45784, 'producto 8', '485787.00', 12, 'General/img/god-of-war-ragnarok-46.jpg'),
(17, 45647, 'producto 9', '45645.00', 45, 'General/img/god-of-war-ragnarok-46.jpg'),
(18, 78784, 'producto 10', '4567600.00', 16, 'General/img/watchdogs.jpg'),
(22, 5787, 'Producto 11', '25358.20', 45, 'General/img/goku1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_categoria`
--

CREATE TABLE `producto_categoria` (
  `producto_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_categoria`
--

INSERT INTO `producto_categoria` (`producto_id`, `categoria_id`) VALUES
(5, 1),
(5, 2),
(6, 2),
(6, 3),
(7, 2),
(7, 4),
(9, 2),
(9, 4),
(10, 1),
(10, 2),
(10, 4),
(11, 2),
(11, 4),
(12, 1),
(14, 2),
(15, 2),
(16, 3),
(17, 3),
(13, 1),
(13, 6),
(19, 2),
(19, 3),
(20, 2),
(20, 3),
(21, 2),
(22, 2),
(18, 2),
(18, 6),
(8, 2),
(8, 3),
(8, 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `log_cambios`
--
ALTER TABLE `log_cambios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `log_cambios`
--
ALTER TABLE `log_cambios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `log_cambios`
--
ALTER TABLE `log_cambios`
  ADD CONSTRAINT `log_cambios_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
