-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2024 a las 17:35:51
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
-- Base de datos: `unieventos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_asistencias`
--

CREATE TABLE `t_asistencias` (
  `id_asistencia` int(11) NOT NULL,
  `id_invitado` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `nombre_invitado` varchar(255) DEFAULT NULL,
  `asistio` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_asistencias`
--

INSERT INTO `t_asistencias` (`id_asistencia`, `id_invitado`, `fecha`, `hora`, `nombre_invitado`, `asistio`) VALUES
(1, 10, '2024-10-15', '22:57:59', NULL, 0),
(2, 10, '2024-10-15', '23:03:19', NULL, 0),
(3, 10, '2024-10-15', '23:04:41', 'David', 1),
(4, 10, '2024-10-15', '23:48:07', 'David', 0),
(7, 10, '2024-10-16', '16:19:55', 'David', 0),
(8, 10, '2024-10-16', '16:34:18', 'David', 0),
(9, 10, '2024-10-16', '17:11:20', 'David', 0),
(10, 10, '2024-10-17', '16:09:27', 'David', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_eventos`
--

CREATE TABLE `t_eventos` (
  `id_evento` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `evento` varchar(245) DEFAULT NULL,
  `hora_inicio` datetime DEFAULT NULL,
  `hora_fin` datetime DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `lugar` varchar(255) NOT NULL,
  `descripcion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_eventos`
--

INSERT INTO `t_eventos` (`id_evento`, `id_usuario`, `evento`, `hora_inicio`, `hora_fin`, `fecha`, `lugar`, `descripcion`) VALUES
(29, 1, 'Evento 1', '2024-10-10 06:21:00', '2024-10-10 07:21:00', '2024-10-10', 'Plazoleta', 'a'),
(30, 2, 'evento 1', '2024-10-10 15:23:00', '2024-10-10 16:23:00', '2024-10-10', 'uts', 'a'),
(31, 2, 'Evento 2', '2024-10-11 16:08:00', '2024-10-11 17:08:00', '2024-10-11', 'Plazoleta', 'kalsdfiluasdfasdf'),
(32, 1, 'Evento Josué', '2024-10-10 16:39:00', '2024-10-10 21:39:00', '2024-10-10', 'asdfa', 'asdfasf'),
(33, 2, 'Evento Danna', '2024-10-10 19:38:00', '2024-10-10 21:38:00', '2024-10-10', 'oasdh', 'oasidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_invitados`
--

CREATE TABLE `t_invitados` (
  `id_invitado` int(11) NOT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `nombre_invitado` varchar(245) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_invitados`
--

INSERT INTO `t_invitados` (`id_invitado`, `id_evento`, `nombre_invitado`, `email`, `documento`) VALUES
(10, 29, 'David', 'josuehernandezorro147@gmail.com', 1095786621),
(15, 30, 'David', 'josuehernandezorro147@gmail.com', 1005372863),
(16, 33, 'adsfasdf', 'josuedhernandez049@gmail.com', 12341234),
(17, 32, 'David', 'kat@gmail.com', 2147483647),
(18, 33, 'Danna', 'josuehernandezorro147@gmail.com', 6457689),
(19, 33, 'Josué', 'josuehernandezorro147@gmail.com', 1095786221),
(21, 33, 'Josué', 'josuehernandezorro147@gmail.com', 1123123),
(22, 32, 'Josué', 'josuehernandezorro147@gmail.com', 1123123213),
(23, 30, 'David', 'kat@gmail.com', 109578621),
(24, 30, 'David', 'admin@racun.club', 1095786321),
(25, 31, 'Danna', 'josuehernandezorro147@gmail.com', 123451234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(245) NOT NULL,
  `password` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id_usuario`, `usuario`, `password`) VALUES
(1, 'josue', '$2y$10$x.WhpWkN4H7pDJ01AloMTezDvQvUiTQ5n.NtZisKB5DqWq4KX8XSG'),
(2, 'danna', '$2y$10$0svoKfVOQ7gGPZqZZ66zh.i.j62xIgDCkihhRUlw2.EbeSSAS7G5W');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_invitados`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_invitados` (
`idInvitado` int(11)
,`id_usuario` int(11)
,`nombreEvento` varchar(245)
,`email` varchar(245)
,`idEvento` int(11)
,`nombre` varchar(245)
,`documento` int(11)
,`fechaEvento` varchar(10)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_invitados`
--
DROP TABLE IF EXISTS `v_invitados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_invitados`  AS SELECT `invitado`.`id_invitado` AS `idInvitado`, `eventos`.`id_usuario` AS `id_usuario`, `eventos`.`evento` AS `nombreEvento`, `invitado`.`email` AS `email`, `invitado`.`id_evento` AS `idEvento`, `invitado`.`nombre_invitado` AS `nombre`, `invitado`.`documento` AS `documento`, date_format(`eventos`.`fecha`,'%d-%m-%Y') AS `fechaEvento` FROM (`t_invitados` `invitado` join `t_eventos` `eventos` on(`invitado`.`id_evento` = `eventos`.`id_evento`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_asistencias`
--
ALTER TABLE `t_asistencias`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `id_invitado` (`id_invitado`);

--
-- Indices de la tabla `t_eventos`
--
ALTER TABLE `t_eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `fkusuarios_idx` (`id_usuario`);

--
-- Indices de la tabla `t_invitados`
--
ALTER TABLE `t_invitados`
  ADD PRIMARY KEY (`id_invitado`),
  ADD UNIQUE KEY `documento_unico` (`documento`),
  ADD KEY `fkeventos_idx` (`id_evento`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_asistencias`
--
ALTER TABLE `t_asistencias`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `t_eventos`
--
ALTER TABLE `t_eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `t_invitados`
--
ALTER TABLE `t_invitados`
  MODIFY `id_invitado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_asistencias`
--
ALTER TABLE `t_asistencias`
  ADD CONSTRAINT `t_asistencias_ibfk_1` FOREIGN KEY (`id_invitado`) REFERENCES `t_invitados` (`id_invitado`);

--
-- Filtros para la tabla `t_eventos`
--
ALTER TABLE `t_eventos`
  ADD CONSTRAINT `fkusuarios` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `t_invitados`
--
ALTER TABLE `t_invitados`
  ADD CONSTRAINT `fkeventos` FOREIGN KEY (`id_evento`) REFERENCES `t_eventos` (`id_evento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
