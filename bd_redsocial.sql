-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2023 a las 05:01:06
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_redsocial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `idUsu1` int(11) DEFAULT NULL,
  `idUsu2` int(11) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL,
  `chat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `idUsu1`, `idUsu2`, `fecha_registro`, `chat`) VALUES
(1, 1, 2, '2023-07-16 00:55:24', '[{\"id\":\"1\",\"mensaje\":\".\",\"fecha\":\"2023-07-21 03:48:48\"},{\"id\":\"2\",\"mensaje\":\"Hola jefe\",\"fecha\":\"2023-07-21 03:49:07\"},{\"id\":\"1\",\"mensaje\":\"Hola subordinada\",\"fecha\":\"2023-07-21 03:49:16\"},{\"id\":\"1\",\"mensaje\":\"Subdita\",\"fecha\":\"2023-07-21 03:49:18\"},{\"id\":\"1\",\"mensaje\":\"zxc\",\"fecha\":\"2023-07-22 02:30:46\"},{\"id\":\"1\",\"mensaje\":\"sd\",\"fecha\":\"2023-07-22 22:14:25\"},{\"id\":\"1\",\"mensaje\":\"sd\",\"fecha\":\"2023-07-22 22:14:25\"},{\"id\":\"1\",\"mensaje\":\"d\",\"fecha\":\"2023-07-22 22:14:26\"},{\"id\":\"1\",\"mensaje\":\"d\",\"fecha\":\"2023-07-22 22:14:26\"},{\"id\":\"1\",\"mensaje\":\"d\",\"fecha\":\"2023-07-22 22:14:27\"},{\"id\":\"1\",\"mensaje\":\"d\",\"fecha\":\"2023-07-22 22:14:27\"}]'),
(2, 1, 4, '0000-00-00 00:00:00', '[{\"id\":\"1\",\"mensaje\":\"Hola\",\"fecha\":\"2023-07-22 22:12:57\"},{\"id\":\"1\",\"mensaje\":\"Hola bebe\",\"fecha\":\"2023-07-22 22:14:04\"},{\"id\":\"1\",\"mensaje\":\"Hola bebe\",\"fecha\":\"2023-07-22 22:14:09\"}]'),
(3, 1, 3, '0000-00-00 00:00:00', '[{\"id\":\"1\",\"mensaje\":\"Hi\",\"fecha\":\"2023-07-22 22:13:22\"},{\"id\":\"1\",\"mensaje\":\"Hola bebe\",\"fecha\":\"2023-07-22 22:14:15\"}]'),
(4, 1, 6, '0000-00-00 00:00:00', '[{\"id\":\"6\",\"mensaje\":\"Hola\",\"fecha\":\"2023-07-22 22:22:49\"}]'),
(5, 2, 6, '0000-00-00 00:00:00', '[{\"id\":\"6\",\"mensaje\":\"Hola bebe\",\"fecha\":\"2023-07-22 22:22:55\"}]'),
(6, 3, 6, '0000-00-00 00:00:00', '[{\"id\":\"6\",\"mensaje\":\"Jajaja que mas parcero\",\"fecha\":\"2023-07-22 22:23:02\"}]'),
(7, 4, 6, '0000-00-00 00:00:00', '[{\"id\":\"6\",\"mensaje\":\"Oe\",\"fecha\":\"2023-07-22 22:23:12\"}]'),
(8, 5, 6, '0000-00-00 00:00:00', '[{\"id\":\"6\",\"mensaje\":\"Que tal marciano\",\"fecha\":\"2023-07-22 22:23:21\"}]'),
(9, 2, 7, '0000-00-00 00:00:00', '[{\"id\":\"7\",\"mensaje\":\"Hola baby\",\"fecha\":\"2023-07-22 22:34:33\"}]'),
(14, 8, 8, '0000-00-00 00:00:00', '[{\"id\":8,\"mensaje\":\"fhfh\",\"fecha\":\"2023-07-23 00:59:48\"}]'),
(16, 1, 8, '0000-00-00 00:00:00', '[{\"id\":8,\"mensaje\":\"f\",\"fecha\":\"2023-07-23 01:06:42\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombres` varchar(120) NOT NULL,
  `apellidos` varchar(120) NOT NULL,
  `email` varchar(255) NOT NULL,
  `clave` varchar(120) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombres`, `apellidos`, `email`, `clave`, `imagen`, `fecha_registro`) VALUES
(1, 'Lired', 'sdsd', 'lired@gmail.com', 'wewe', 'uploads/logo.png', '2023-07-04 17:15:48'),
(2, 'Emma', 'Watson', 'david@gmail.com', '123', 'uploads/germaioni.jpeg', '2023-07-15 23:45:37'),
(3, 'Jeff', 'Hu', 'jorge@gmail.com', '123', 'uploads/Jorge_WhatsAppImage2023-02-01at9.20.22AM(1).jpeg', '2023-07-15 23:59:13'),
(4, 'Brad', 'Pitt', 'brad@gmail.com', '123', 'uploads/16745781696271.jpg', '2023-07-16 21:44:39'),
(5, 'Mark', 'Zuckuberg', 'mark@gmail.com', '123', 'uploads/descarga.jpeg', '2023-07-04 17:15:48'),
(6, 'Elon', 'Musk', 'elon@gmail.com', '123', 'uploads/elon.webp', '2023-07-04 17:15:48'),
(7, 'Shakira', 'Colombia', 'shakira@gmail.com', '123', 'uploads/Shakira_shakira-cambios-look-pelo-kzqD-U190238490989BCD-624x624@MujerHoy.jpg', '2023-07-22 15:25:59'),
(8, 'Cesar', 'Santana', 'cesar@gmail.com', '123', 'uploads/Cesar_PostdeFacebookclasesdematematicasilustradorojoyamarillo.png', '2023-07-22 17:24:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsu1`),
  ADD KEY `idAmigo` (`idUsu2`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `idAmigo` FOREIGN KEY (`idUsu2`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`idUsu1`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
