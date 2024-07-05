-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2024 a las 20:04:21
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
-- Base de datos: `andiamo`
--
CREATE DATABASE IF NOT EXISTS `andiamo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `andiamo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id_almacen` int(11) NOT NULL,
  `nombre_almacen` varchar(50) NOT NULL,
  `ubicacion_almacen` varchar(50) NOT NULL,
  `fecha_alta_almacen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_almacen`, `nombre_almacen`, `ubicacion_almacen`, `fecha_alta_almacen`) VALUES
(1, 'Almacén Principal', 'El Centro pa', '2024-06-12 06:21:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `almacen_id` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `stock_producto` int(11) NOT NULL,
  `precio_producto` float NOT NULL,
  `descripcion_producto` varchar(350) NOT NULL,
  `codigo_producto` varchar(100) NOT NULL,
  `fecha_alta_producto` datetime NOT NULL,
  `fecha_edite` datetime NOT NULL,
  `status_producto` int(1) NOT NULL,
  `fecha_eliminado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `almacen_id`, `nombre_producto`, `stock_producto`, `precio_producto`, `descripcion_producto`, `codigo_producto`, `fecha_alta_producto`, `fecha_edite`, `status_producto`, `fecha_eliminado`) VALUES
(1, 1, 'Coca cola de 1,5lt ', 100, 1750, 'Rica rica la cocucha', '1231231123', '2024-06-12 06:22:36', '2024-06-12 06:22:36', 1, NULL),
(2, 1, 'PEPSI 1,5L', 50, 1700, 'Rikiriki', '43232223', '2024-06-12 06:40:16', '2024-06-12 06:53:44', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `nombre_user` varchar(50) NOT NULL,
  `apellido_user` varchar(50) NOT NULL,
  `correo_user` varchar(80) NOT NULL,
  `contrasena_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tel_user` bigint(50) NOT NULL,
  `direccion_user` varchar(150) NOT NULL,
  `nivel_user` tinyint(2) NOT NULL DEFAULT 0,
  `fechaUp_user` datetime NOT NULL,
  `fechaDeath_user` datetime DEFAULT NULL,
  `status_user` tinyint(5) NOT NULL,
  `fechaEdit_user` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nombre_usuario`, `nombre_user`, `apellido_user`, `correo_user`, `contrasena_user`, `tel_user`, `direccion_user`, `nivel_user`, `fechaUp_user`, `fechaDeath_user`, `status_user`, `fechaEdit_user`) VALUES
(4, 'testt', 'test test', 'test test', 'test@gmail.com', '$2y$10$CC./U5GtFKAMh7o4vGyrYOTG8Is21aFFY8IIAvU9O9aGAYTZ43wGK', 4215256333, 'Quintana', 0, '2024-06-26 02:28:20', NULL, 1, '2024-06-26 02:28:20'),
(5, 'juan_puchito', 'Juan', 'Juan', 'Juan.Carboza@gmail.com', '$2y$10$dkg/TeCFrgUhpCpo/pdY5OQU0tyvNciCTnEYWzh8L4EGSYJUfhg4K', 634215425, 'Quintana', 0, '2024-06-26 04:52:23', NULL, 1, '2024-06-26 04:52:23'),
(6, 'test_test', 'Administrador', 'test test 2', 'test_test@gmail.com', '$2y$10$el18ryl.SdiQ0DRq5oR0buJ/AjmM3MCERdV2OrKOHC7W.h2LysSgy', 412421521, 'Quintana', 1, '2024-06-26 05:53:11', NULL, 1, '2024-06-26 05:53:11'),
(7, 'test_test_2', 'test test 2', 'test test 2', 'test_test2@gmail.com', '$2y$10$WXpYPZSLt091pKCpAEcRruAtZ2DK2PVm3ZWWUA0yPTA1Btm6e1Xl2', 454512121245, 'Quintana', 0, '2024-06-26 05:55:00', NULL, 1, '2024-06-26 05:55:00'),
(8, 'esculapio12', 'Esculapio', 'Esculapio', 'Esculapio_Espatula@gmail.com', '$2y$10$QSOwkGrfG2FOYrYgzpr24ecTHKz.fZ87QuccX5xczMbkm56Cc2m3e', 454512121245, 'Quintana', 0, '2024-06-26 05:56:30', NULL, 1, '2024-06-26 05:56:30'),
(9, 'Hjjhh.r3@gmail.com', 'Abdul', 'Abdul', 'test_test3@gmail.com', '$2y$10$8QEC9q9DbmP29LSdMsXgJ.dCmMtczmWq505hdO913Rt2SxQSuacLe', 455412124545, 'Quintana', 0, '2024-06-26 06:40:24', NULL, 1, '2024-06-26 06:40:24'),
(10, 'Esteban__', 'Esteban', 'Esteban', 'Esteban_Esteban@Esteban.com', '$2y$10$DvuzY07zujj9E/lT/0yIsOhkmdHoWyG4pMUGvS4nyQCKS1wx5y/fS', 34545125411254, 'Quintana', 0, '2024-06-26 22:40:49', NULL, 1, '2024-06-26 22:40:49'),
(11, 'test_test_4', 'test test 2', 'test test 2', 'jorgito123@gmail.com', '$2y$10$0onbPo/cS2w6mlc6L9bgK.iORZdQQNE94twqXWnajlI6RJYsvcWiK', 454512451245, 'Quintana', 0, '2024-06-26 22:47:12', NULL, 1, '2024-06-26 22:47:12'),
(12, 'holobordo', 'Holor', 'Holor', 'holo_bordo@gmail.com', '$2y$10$wxHu2U0ghPDfoET2myg4c.pohufl8CWa.MOWXtpwAiFYCqZLF/6Qq', 349412544, 'Quintana', 0, '2024-06-26 23:04:05', NULL, 1, '2024-06-26 23:04:05'),
(13, 'tttt_ttttt', 'Holor', 'Holor', 'holo_bordo1@gmail.com', '$2y$10$dNqgHob1lWR6/vSPSXyc3.n7M1rS5Z8xqe553X5uBUfgmjUuB/qa6', 12121245454512, 'Quintana', 0, '2024-06-26 23:09:16', NULL, 1, '2024-06-26 23:09:16'),
(14, '12345_', 'Holor', 'Holor', 'holo_bordo2@gmail.com', '$2y$10$oG3Fwmta1xOrsrPdgUvK4u1eMx2cMdopZGCywgvj3RvLIRhrSTXYW', 12121245454512, 'Quintana', 0, '2024-06-26 23:12:39', NULL, 1, '2024-06-26 23:12:39'),
(15, 'Akdul-47', 'Abdul', 'Abdul', 'abdul.trc@gmial.com', '$2y$10$m7XUqqMenXoc72Uo4nNFUuTeIilXoxvscas1YUL348P4rqWAj.7Am', 3794000000, 'Quintana', 0, '2024-07-02 20:39:31', NULL, 1, '2024-07-02 20:39:31'),
(16, 'akdul', 'Abdul', 'Abdul', 'abdul.trc@gmail.com', '$2y$10$1hNltw423yyTVZktPAkTsex.YERA1hNo7z4OjwT.u66u3FbYRRBQW', 3220000, 'Quintana', 0, '2024-07-02 20:41:24', NULL, 1, '2024-07-02 20:41:24'),
(17, 'trtgr', 'Abdul', 'Abdul', 'asd@adfrw.com', '$2y$10$rPjVOROxzOl5Sl5r4VxUQOjQO4/ucoiGYgaYvsGRQ2BRrxi1WTpRK', 3798410, 'Quintana', 0, '2024-07-02 20:48:48', NULL, 1, '2024-07-02 20:48:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id_almacen`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_productos_almacen_id` (`almacen_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id_almacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_almacen_id` FOREIGN KEY (`almacen_id`) REFERENCES `almacen` (`id_almacen`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
