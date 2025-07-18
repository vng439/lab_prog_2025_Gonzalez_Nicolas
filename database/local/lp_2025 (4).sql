-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2025 a las 20:36:26
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lp_2025`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(3, 'CD'),
(4, 'Equipamiento'),
(5, 'Instrumento'),
(9, 'SegundaPrueba'),
(6, 'Vinilos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `codigo` varchar(25) NOT NULL,
  `descripcion` text NOT NULL,
  `categoriaId` int(10) UNSIGNED NOT NULL,
  `precio` float(12,2) NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `codigo`, `descripcion`, `categoriaId`, `precio`, `stock`) VALUES
(1, 'Guitarra', 'ICGuitarra', 'Instrumento de cuerdas', 5, 40000.00, 10),
(2, 'Charli xcx - BRAT', '000000002', 'Disco de Musica', 6, 49999.99, 10),
(5, 'JBL Flip 6', 'JBLF6', 'Parlante JBL Flip 6 Portátil Con Bluetooth Waterproof Gris', 4, 200000.00, 2),
(11, 'deadmau5 - For Lack of a Better Name', 'DM5LP', 'deadmau5 - For Lack of a Better Name', 3, 39999.00, 5),
(12, 'Skrillex - Quest for Fire', 'SQFF', 'Skrillex - Quest for Fire', 3, 69999.00, 15),
(13, 'Auriculares JBL Tune 110', 'JBLT110', 'Auriculares In-Ear JBL Tune 110 Negro', 4, 15000.00, 20),
(14, 'Auriculares Pioneer HDJ-X5', 'PHDJ-X5', 'Auriculares Profesionales Pioneer DJ HDJ-X5 Over Ear', 4, 215000.00, 5),
(16, 'Guitarra Yamaha C40', 'GYC40', 'Guitarra criolla clásica Yamaha C40 palo de rosa brillante', 5, 70000.00, 20),
(21, 'Prueb', '1010', 'Prueba', 6, 21.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `cuenta` varchar(20) NOT NULL,
  `perfil` enum('Administrador','Operador') NOT NULL,
  `clave` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fechaAlta` date NOT NULL,
  `resetPass` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `apellido`, `nombres`, `cuenta`, `perfil`, `clave`, `correo`, `estado`, `fechaAlta`, `resetPass`) VALUES
(2, 'Rasjido', 'JoseeEEEE', 'jrasjido2025', 'Administrador', 'jrasjido2025', 'jrasjido2025@gmail.com', 0, '2025-06-28', 0),
(14, 'Prodigy', 'FireStarter', 'firestarter1', 'Operador', '$2y$10$qP2fnvUc0ax4z/xXtk820OxqS49y5VVaS776BuG/zaXrxUj6wdf0S', 'theprodigy@gmail.com', 0, '2025-07-06', 0),
(16, 'Mob', 'Shigeo', 'shigeomob', 'Administrador', '$2y$10$aNOHSDZXaUQ.D9xF5S.JaOeMsPksWpxSa5ILy7l9cNCxQTMja6DG.', 'mobpsycho@gmail.com', 1, '2025-07-06', 0),
(18, 'Aitchison', 'Charlotte Emma', '365partygirl', 'Operador', '$2y$10$PYICob5DWLy5m/P/LGv1WuaZW1imFR/uSMx4JCrdIMEaKfPULhfja', 'itscharlibb@gmail.com', 1, '2025-07-06', 0),
(19, 'Gonzalez', 'Nicolás', 'vnicolasg97', 'Administrador', '$2y$10$3M1fAZ7t0.Z3GIqYlLF43Ov1xg5d7.a/8kO3xRA9/1L8PhuzqfBZm', 'vnicolasg97@gmail.com', 1, '2025-07-07', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorias_unique` (`nombre`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productos_unique` (`codigo`),
  ADD UNIQUE KEY `productos_nombre_IDX` (`nombre`,`categoriaId`) USING BTREE,
  ADD KEY `productos_categorias_FK` (`categoriaId`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_unique` (`cuenta`),
  ADD UNIQUE KEY `usuarios_unique_1` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categorias_FK` FOREIGN KEY (`categoriaId`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
