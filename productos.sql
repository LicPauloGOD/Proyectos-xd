-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-07-2025 a las 10:17:06
-- Versión del servidor: 8.0.42
-- Versión de PHP: 8.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `conlineweb_vendingbox`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_categoria` int NOT NULL,
  `id_subcategoria` int DEFAULT NULL,
  `nombre_producto` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` decimal(5,2) DEFAULT '0.00',
  `stock` int DEFAULT '0',
  `sku` varchar(50) DEFAULT NULL,
  `imagen_principal` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `imagen_secundaria_1` varchar(255) DEFAULT NULL,
  `imagen_secundaria_2` varchar(255) DEFAULT NULL,
  `imagen_secundaria_3` varchar(255) DEFAULT NULL,
  `destacado` tinyint(1) DEFAULT '0',
  `activo` tinyint(1) DEFAULT '1',
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizacion` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_usuario`, `id_categoria`, `id_subcategoria`, `nombre_producto`, `descripcion`, `precio`, `descuento`, `stock`, `sku`, `imagen_principal`, `imagen_secundaria_1`, `imagen_secundaria_2`, `imagen_secundaria_3`, `destacado`, `activo`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(25, 1, 19, NULL, 'Sed est aut omnis q', 'Voluptas laboriosam', 75.00, 48.00, 69, 'Lorem labore aut qui', 'data:image/png;base64,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', NULL, NULL, NULL, 1, 1, '2025-07-03 10:12:28', '2025-07-03 10:12:28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_subcategoria` (`id_subcategoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`),
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategorias` (`id_subcategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
