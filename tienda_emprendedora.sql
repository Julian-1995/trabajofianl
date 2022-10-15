-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2021 a las 03:43:36
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_emprendedora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `direccion`, `telefono`, `id_usuario`) VALUES
(3, '9 de julio 886', 927005, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emprendedor`
--

CREATE TABLE `emprendedor` (
  `id_emprendedor` int(11) NOT NULL,
  `emprendimiento` text NOT NULL,
  `credito` text NOT NULL,
  `debito` text NOT NULL,
  `efectivo` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_emprendimiento` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `emprendedor`
--

INSERT INTO `emprendedor` (`id_emprendedor`, `emprendimiento`, `credito`, `debito`, `efectivo`, `id_usuario`, `fecha_emprendimiento`) VALUES
(95, 'mercadito', '', 'credito', '', 1, '2021-12-04 21:19:31'),
(96, 'floreria', '', '', 'debito', 4, '2021-12-04 21:19:31'),
(97, 'costurera', 'credito', 'debito', 'efectivo', 5, '2021-12-04 21:19:31'),
(99, 'code', 'credito', 'debito', 'efectivo', 1, '2021-12-04 21:34:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombreProducto` text NOT NULL,
  `marca` text NOT NULL,
  `codigo` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `presio` int(11) NOT NULL,
  `id_emprendedor_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombreProducto`, `marca`, `codigo`, `stok`, `presio`, `id_emprendedor_producto`) VALUES
(33, 'pelota', 'nike', 1, 15, 1500, 95),
(34, 'mate', 'nilo', 55, 55, 55, 95),
(38, 'nombre', 'marca', 988, 88, 155, 95),
(53, 'maceta', 'pitifiti', 123, 15, 150, 96),
(54, 'malbon', 'asiatico', 322, 5, 95, 96),
(55, 'remera', 'olguita', 852, 40, 1400, 97);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `estado` int(11) NOT NULL,
  `acceso` text NOT NULL,
  `contrasenia` int(11) NOT NULL,
  `perfil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `estado`, `acceso`, `contrasenia`, `perfil`) VALUES
(1, 'julian', 'vidal', 0, 'julian', 1234, 'emprendedor'),
(2, 'maira', 'zuñga', 0, 'maira', 1234, 'cliente'),
(3, 'pablo', 'vidal', 0, 'pablo', 1234, 'empleado'),
(4, 'eva', 'vidal', 0, 'eva', 1234, 'emprendedor'),
(5, 'olga', 'pastor', 0, 'olga', 1234, 'emprendedor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `emprendedor`
--
ALTER TABLE `emprendedor`
  ADD PRIMARY KEY (`id_emprendedor`),
  ADD KEY `usuario-emprendedor` (`id_usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `emprendedor_producto` (`id_emprendedor_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `emprendedor`
--
ALTER TABLE `emprendedor`
  MODIFY `id_emprendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `usuario-cliente` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `emprendedor`
--
ALTER TABLE `emprendedor`
  ADD CONSTRAINT `usuario-emprendedor` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `emprendedor_producto` FOREIGN KEY (`id_emprendedor_producto`) REFERENCES `emprendedor` (`id_emprendedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
