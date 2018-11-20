-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2018 a las 10:34:04
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `retodos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `raw_data` varchar(255) NOT NULL,
  `dateA` varchar(20) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `answer`
--

INSERT INTO `answer` (`id`, `raw_data`, `dateA`, `id_profile`, `id_question`) VALUES
(11, 'ni idea', '11-13-2018 18:35:39', 2, 13),
(12, 'jaja', '11-13-2018 18:35:42', 2, 13),
(13, 'xd', '11-13-2018 18:35:44', 2, 13),
(14, 'lol', '11-13-2018 18:36:00', 2, 13),
(15, 'jo, que pena', '11-13-2018 18:48:16', 2, 14),
(16, 'xd', '11-13-2018 18:49:06', 2, 14),
(17, 'pene', '11-14-2018 08:21:33', 2, 14),
(18, 'yey', '11-14-2018 09:22:17', 2, 14),
(19, 'xd', '11-14-2018 09:33:52', 2, 15),
(20, 'lol', '11-14-2018 09:33:58', 2, 15),
(21, 'mentira', '11-14-2018 09:34:11', 2, 15),
(22, 'jiju', '11-14-2018 09:34:29', 2, 15),
(23, 'lol', '11-14-2018 09:34:38', 2, 15),
(24, 'daÃ§', '11-14-2018 09:51:05', 2, 14),
(25, 'se', '11-14-2018 09:51:12', 2, 14),
(26, 'yeyasda', '11-14-2018 09:51:48', 2, 14),
(27, 'yeyasda', '11-14-2018 09:52:28', 2, 14),
(28, 'dajsd', '11-14-2018 09:52:41', 2, 15),
(29, 'kfjd', '11-14-2018 09:53:09', 2, 15),
(30, 'eyye', '11-14-2018 09:53:36', 2, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archive`
--

CREATE TABLE `archive` (
  `id` int(11) NOT NULL,
  `url` varchar(20) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'java'),
(2, 'eskere'),
(3, 'youh'),
(4, 'llorar'),
(5, 'ghchg'),
(6, 'JFDN'),
(7, 'me muero'),
(8, 'yeu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favourite`
--

CREATE TABLE `favourite` (
  `id_profile` int(11) NOT NULL,
  `id_question` int(11) DEFAULT NULL,
  `type` varchar(1) NOT NULL,
  `id_answer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`id`, `photo`, `name`, `surname`, `email`, `user`, `pass`) VALUES
(2, 'img/userImgs/admin.png', 'admin', 'admin', 'admin@gmail.com', 'admin', 'admin'),
(3, '', 'user', 'user', 'user@gmail.com', 'user', 'user'),
(4, '', 'admino', 'admino', 'admino@gmail.com', 'admino', 'admino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `header` varchar(20) NOT NULL,
  `raw_data` varchar(255) NOT NULL,
  `dateQ` varchar(20) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `question`
--

INSERT INTO `question` (`id`, `header`, `raw_data`, `dateQ`, `id_profile`, `id_category`) VALUES
(2, 'juju', 'jiji', '11-12-2018 13:59:22', 2, 1),
(3, 'juju', 'jiji', '11-12-2018 14:01:04', 2, 1),
(4, 'yey', 'yuy', '11-12-2018 14:01:09', 2, 1),
(5, 'userrr', 'userr', '11-12-2018 14:01:54', 3, 1),
(6, 'prueba', 'prueba', '11-13-2018 09:22:45', 2, 1),
(7, 'eskere', 'eskere', '11-13-2018 09:27:02', 2, 2),
(8, 'yey', 'eyye', '11-13-2018 10:23:17', 2, 3),
(9, 'suspenso', 'waaaaa', '11-13-2018 10:28:58', 2, 4),
(10, 'suspenso', 'waaaaa', '11-13-2018 10:29:05', 2, 4),
(11, 'hfgf', 'hfgf', '11-13-2018 10:30:53', 2, 5),
(12, 'hfgf', 'hfgf', '11-13-2018 10:30:59', 2, 5),
(13, 'trolleo', 'FDJ', '11-13-2018 10:32:46', 2, 6),
(14, 'tengo una pregunta', 'AYUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUDA', '11-13-2018 18:47:48', 4, 7),
(15, 'preguntita', 'ju', '11-14-2018 09:18:04', 2, 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_answer_profile` (`id_profile`),
  ADD KEY `fk_answer_question` (`id_question`);

--
-- Indices de la tabla `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_archive_question` (`id_question`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `favourite`
--
ALTER TABLE `favourite`
  ADD KEY `fk_profile_favourite` (`id_profile`),
  ADD KEY `fk_question_favourite` (`id_question`),
  ADD KEY `fk_answer_favourite` (`id_answer`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_profile_question` (`id_profile`),
  ADD KEY `fk_category_question` (`id_category`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `fk_answer_profile` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_answer_question` FOREIGN KEY (`id_question`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `archive`
--
ALTER TABLE `archive`
  ADD CONSTRAINT `fk_archive_question` FOREIGN KEY (`id_question`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `fk_answer_favourite` FOREIGN KEY (`id_answer`) REFERENCES `answer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_profile_favourite` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_question_favourite` FOREIGN KEY (`id_question`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_category_question` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_profile_question` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
