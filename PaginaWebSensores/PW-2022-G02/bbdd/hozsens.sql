-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2022 a las 22:09:04
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `hozsens`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `ID` int(11) NOT NULL,
  `correo` tinytext NOT NULL,
  `Nombre` text NOT NULL,
  `Asunto` smallint(6) NOT NULL,
  `Mensaje` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `ID` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Apellidos` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`ID`, `Nombre`, `Apellidos`, `telefono`, `email`) VALUES
(1, 'Juan', 'Martinez Jimenez', 123123123, 'jmj@gmail.com'),
(2, 'Marcos', 'Gimeno Gracia', 234234234, 'mgg@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuarios`
--

CREATE TABLE `datos_usuarios` (
  `IDusuarios` int(11) NOT NULL,
  `IDDatos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_usuarios`
--

INSERT INTO `datos_usuarios` (`IDusuarios`, `IDDatos`) VALUES
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `ID` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas_parcelas`
--

CREATE TABLE `etiquetas_parcelas` (
  `ID_et` int(11) NOT NULL,
  `ID_par` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mediciones`
--

CREATE TABLE `mediciones` (
  `ID` int(11) NOT NULL,
  `Temp` int(11) NOT NULL,
  `Hum` int(11) NOT NULL,
  `Salinidad` int(11) NOT NULL,
  `Luminosidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mediciones`
--

INSERT INTO `mediciones` (`ID`, `Temp`, `Hum`, `Salinidad`, `Luminosidad`) VALUES
(1, 24, 35, 24, 45),
(2, 26, 22, 34, 55),
(3, 18, 57, 39, 85),
(4, 32, 49, 24, 23),
(5, 21, 44, 21, 64),
(6, 35, 13, 32, 57),
(7, 28, 32, 28, 40),
(8, 23, 34, 22, 41),
(9, 28, 36, 25, 32),
(10, 30, 40, 28, 32),
(11, 32, 28, 30, 41),
(12, 22, 35, 28, 30),
(13, 32, 40, 25, 35),
(14, 22, 35, 25, 40),
(15, 22, 50, 30, 80),
(16, 65, 32, 45, 86),
(17, 26, 63, 26, 75),
(18, 72, 57, 39, 63),
(19, 39, 49, 24, 41),
(20, 21, 44, 43, 57),
(21, 35, 13, 19, 71),
(22, 24, 35, 24, 45),
(23, 26, 22, 34, 55),
(24, 18, 57, 39, 85),
(25, 32, 49, 24, 23),
(26, 21, 44, 21, 64),
(27, 35, 13, 32, 57),
(28, 28, 32, 28, 40),
(29, 23, 34, 22, 41),
(30, 28, 36, 25, 32),
(31, 30, 40, 28, 32),
(32, 32, 28, 30, 41),
(33, 22, 35, 28, 30),
(34, 32, 40, 25, 35),
(35, 22, 35, 25, 40),
(36, 22, 50, 30, 80),
(37, 65, 32, 45, 86),
(38, 26, 63, 26, 75),
(39, 72, 57, 39, 63),
(40, 39, 49, 24, 41),
(41, 21, 44, 43, 57),
(42, 35, 13, 19, 71),
(43, 24, 35, 24, 45),
(44, 26, 22, 34, 55),
(45, 18, 57, 39, 85),
(46, 32, 49, 24, 23),
(47, 21, 44, 21, 64),
(48, 35, 13, 32, 57),
(49, 28, 32, 28, 40),
(50, 23, 34, 22, 41),
(51, 28, 36, 25, 32),
(52, 30, 40, 28, 32),
(53, 32, 28, 30, 41),
(54, 22, 35, 28, 30),
(55, 32, 40, 25, 35),
(56, 22, 35, 25, 40),
(57, 22, 50, 30, 80),
(58, 65, 32, 45, 86),
(59, 26, 63, 26, 75),
(60, 72, 57, 39, 63),
(61, 39, 49, 24, 41),
(62, 21, 44, 43, 57),
(63, 35, 13, 19, 71);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mediciones_sondas`
--

CREATE TABLE `mediciones_sondas` (
  `IDsonda` int(11) NOT NULL,
  `IDmediciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mediciones_sondas`
--

INSERT INTO `mediciones_sondas` (`IDsonda`, `IDmediciones`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(3, 15),
(3, 16),
(9, 17),
(9, 18),
(9, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
(3, 24),
(4, 25),
(4, 26),
(4, 27),
(4, 28),
(4, 29),
(4, 30),
(4, 31),
(5, 32),
(5, 33),
(5, 34),
(5, 35),
(5, 36),
(5, 37),
(5, 38),
(6, 39),
(6, 40),
(6, 41),
(6, 42),
(6, 43),
(6, 44),
(6, 45),
(7, 46),
(7, 47),
(7, 48),
(7, 49),
(7, 50),
(7, 51),
(7, 52),
(8, 53),
(8, 54),
(8, 55),
(8, 56),
(8, 57),
(8, 58),
(8, 59),
(9, 60),
(9, 61),
(9, 62),
(9, 63);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcelas`
--

CREATE TABLE `parcelas` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `parcelas`
--

INSERT INTO `parcelas` (`ID`, `nombre`, `color`) VALUES
(1, 'Parcela nº1', '#FF8000'),
(2, 'Parcela nº2', '#F44336'),
(3, 'Parcela nº3', '#2196F3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sondas`
--

CREATE TABLE `sondas` (
  `ID` int(11) NOT NULL,
  `CoorX` decimal(10,7) NOT NULL,
  `CoorY` decimal(10,7) NOT NULL,
  `encendido` enum('true','false') NOT NULL,
  `funcional` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sondas`
--

INSERT INTO `sondas` (`ID`, `CoorX`, `CoorY`, `encendido`, `funcional`) VALUES
(1, '38.9970520', '-0.1724340', 'false', 'true'),
(2, '38.9978640', '-0.1720490', 'true', 'true'),
(3, '38.9969380', '-0.1723490', 'true', 'false'),
(4, '38.9977520', '-0.1783130', 'true', 'true'),
(5, '38.9973880', '-0.1782560', 'false', 'false'),
(6, '38.9980070', '-0.1785270', 'true', 'true'),
(7, '38.9916430', '-0.1693100', 'false', 'true'),
(8, '38.9923710', '-0.1705170', 'true', 'true'),
(9, '38.9917370', '-0.1694020', 'true', 'true');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sondas_parcelas`
--

CREATE TABLE `sondas_parcelas` (
  `IDparcela` int(11) NOT NULL,
  `IDsonda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sondas_parcelas`
--

INSERT INTO `sondas_parcelas` (`IDparcela`, `IDsonda`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(3, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `password` varchar(20) NOT NULL,
  `rol` enum('admin','normal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `rol`) VALUES
(1, 'admin', '1234', 'admin'),
(2, 'user1', '1234', 'normal'),
(3, 'user2', '1234', 'normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_parcelas`
--

CREATE TABLE `usuarios_parcelas` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `parcela` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_parcelas`
--

INSERT INTO `usuarios_parcelas` (`id`, `usuario`, `parcela`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 1, 1),
(4, 1, 3),
(6, 3, 2),
(7, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vertices`
--

CREATE TABLE `vertices` (
  `id` int(11) NOT NULL,
  `lat` decimal(10,7) NOT NULL,
  `lng` decimal(10,7) NOT NULL,
  `parcela` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vertices`
--

INSERT INTO `vertices` (`id`, `lat`, `lng`, `parcela`) VALUES
(1, '38.9981639', '-0.1720151', 1),
(2, '38.9979802', '-0.1715208', 1),
(3, '38.9965934', '-0.1721850', 1),
(4, '38.9969109', '-0.1729598', 1),
(5, '38.9983908', '-0.1785001', 2),
(6, '38.9979107', '-0.1774030', 2),
(7, '38.9969825', '-0.1779657', 2),
(8, '38.9969494', '-0.1783175', 2),
(9, '38.9975874', '-0.1795887', 2),
(10, '38.9924270', '-0.1713474', 3),
(11, '38.9927512', '-0.1694416', 3),
(12, '38.9915003', '-0.1684759', 3),
(13, '38.9910870', '-0.1709218', 3);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_datos_usuario`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_datos_usuario` (
`nombre` text
,`apellidos` text
,`telefono` int(11)
,`email` varchar(50)
,`usuario` text
,`password` varchar(20)
,`ID` int(11)
,`IDDatos` int(11)
,`rol` enum('admin','normal')
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_mediciones_sondas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_mediciones_sondas` (
`temp` int(11)
,`hum` int(11)
,`salin` int(11)
,`lumin` int(11)
,`IDsonda` int(11)
,`IDmediciones` int(11)
,`IDparcela` int(11)
,`CoorX` decimal(10,7)
,`CoorY` decimal(10,7)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_parcelas_con_vertices`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_parcelas_con_vertices` (
`id` int(11)
,`nombre` varchar(60)
,`color` varchar(7)
,`lat` decimal(10,7)
,`lng` decimal(10,7)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_propiedad_parcelas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_propiedad_parcelas` (
`usuario` int(11)
,`parcela` int(11)
,`nombre_parcela` varchar(60)
,`color` varchar(7)
,`nombre_usuario` text
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_datos_usuario`
--
DROP TABLE IF EXISTS `vista_datos_usuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_datos_usuario`  AS SELECT `datos`.`Nombre` AS `nombre`, `datos`.`Apellidos` AS `apellidos`, `datos`.`telefono` AS `telefono`, `datos`.`email` AS `email`, `usuarios`.`nombre` AS `usuario`, `usuarios`.`password` AS `password`, `usuarios`.`id` AS `ID`, `datos_usuarios`.`IDDatos` AS `IDDatos`, `usuarios`.`rol` AS `rol` FROM ((`datos_usuarios` join `datos` on(`datos`.`ID` = `datos_usuarios`.`IDDatos`)) join `usuarios` on(`usuarios`.`id` = `datos_usuarios`.`IDusuarios`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_mediciones_sondas`
--
DROP TABLE IF EXISTS `vista_mediciones_sondas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_mediciones_sondas`  AS SELECT `mediciones`.`Temp` AS `temp`, `mediciones`.`Hum` AS `hum`, `mediciones`.`Salinidad` AS `salin`, `mediciones`.`Luminosidad` AS `lumin`, `mediciones_sondas`.`IDsonda` AS `IDsonda`, `mediciones_sondas`.`IDmediciones` AS `IDmediciones`, `sondas`.`ID` AS `IDparcela`, `sondas`.`CoorX` AS `CoorX`, `sondas`.`CoorY` AS `CoorY` FROM ((`mediciones_sondas` join `mediciones` on(`mediciones`.`ID` = `mediciones_sondas`.`IDmediciones`)) join `sondas` on(`sondas`.`ID` = `mediciones_sondas`.`IDsonda`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_parcelas_con_vertices`
--
DROP TABLE IF EXISTS `vista_parcelas_con_vertices`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_parcelas_con_vertices`  AS SELECT `parcelas`.`ID` AS `id`, `parcelas`.`nombre` AS `nombre`, `parcelas`.`color` AS `color`, `vertices`.`lat` AS `lat`, `vertices`.`lng` AS `lng` FROM (`parcelas` join `vertices` on(`parcelas`.`ID` = `vertices`.`parcela`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_propiedad_parcelas`
--
DROP TABLE IF EXISTS `vista_propiedad_parcelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_propiedad_parcelas`  AS SELECT `usuarios_parcelas`.`usuario` AS `usuario`, `usuarios_parcelas`.`parcela` AS `parcela`, `parcelas`.`nombre` AS `nombre_parcela`, `parcelas`.`color` AS `color`, `usuarios`.`nombre` AS `nombre_usuario` FROM ((`usuarios_parcelas` join `parcelas` on(`parcelas`.`ID` = `usuarios_parcelas`.`parcela`)) join `usuarios` on(`usuarios`.`id` = `usuarios_parcelas`.`usuario`))  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  ADD KEY `IDDatos` (`IDDatos`),
  ADD KEY `IDusuarios` (`IDusuarios`) USING BTREE;

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `un_nombre_et` (`nombre`) USING HASH;

--
-- Indices de la tabla `etiquetas_parcelas`
--
ALTER TABLE `etiquetas_parcelas`
  ADD KEY `ID_et` (`ID_et`),
  ADD KEY `ID_par` (`ID_par`);

--
-- Indices de la tabla `mediciones`
--
ALTER TABLE `mediciones`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `mediciones_sondas`
--
ALTER TABLE `mediciones_sondas`
  ADD KEY `IDsonda` (`IDsonda`),
  ADD KEY `IDmediciones` (`IDmediciones`);

--
-- Indices de la tabla `parcelas`
--
ALTER TABLE `parcelas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `sondas`
--
ALTER TABLE `sondas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `sondas_parcelas`
--
ALTER TABLE `sondas_parcelas`
  ADD KEY `IDcampo` (`IDparcela`),
  ADD KEY `IDsonda` (`IDsonda`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_parcelas`
--
ALTER TABLE `usuarios_parcelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDcampo` (`parcela`),
  ADD KEY `IDusuario` (`usuario`);

--
-- Indices de la tabla `vertices`
--
ALTER TABLE `vertices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vertice_parcela` (`parcela`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mediciones`
--
ALTER TABLE `mediciones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `parcelas`
--
ALTER TABLE `parcelas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sondas`
--
ALTER TABLE `sondas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios_parcelas`
--
ALTER TABLE `usuarios_parcelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `vertices`
--
ALTER TABLE `vertices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  ADD CONSTRAINT `datos_usuarios_ibfk_1` FOREIGN KEY (`IDDatos`) REFERENCES `datos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `datos_usuarios_ibfk_2` FOREIGN KEY (`IDusuarios`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `etiquetas_parcelas`
--
ALTER TABLE `etiquetas_parcelas`
  ADD CONSTRAINT `ID_etiquetas` FOREIGN KEY (`ID_et`) REFERENCES `etiquetas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ID_parcelas` FOREIGN KEY (`ID_par`) REFERENCES `parcelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mediciones_sondas`
--
ALTER TABLE `mediciones_sondas`
  ADD CONSTRAINT `mediciones_sondas_ibfk_1` FOREIGN KEY (`IDmediciones`) REFERENCES `mediciones` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mediciones_sondas_ibfk_2` FOREIGN KEY (`IDsonda`) REFERENCES `sondas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sondas_parcelas`
--
ALTER TABLE `sondas_parcelas`
  ADD CONSTRAINT `sondas_parcelas_ibfk_1` FOREIGN KEY (`IDparcela`) REFERENCES `parcelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sondas_parcelas_ibfk_2` FOREIGN KEY (`IDsonda`) REFERENCES `sondas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_parcelas`
--
ALTER TABLE `usuarios_parcelas`
  ADD CONSTRAINT `campos-usuarios_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `campos-usuarios_ibfk_2` FOREIGN KEY (`parcela`) REFERENCES `parcelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vertices`
--
ALTER TABLE `vertices`
  ADD CONSTRAINT `Campos` FOREIGN KEY (`parcela`) REFERENCES `parcelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
