-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2020 a las 18:47:24
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `series_vistas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anime`
--

CREATE TABLE `anime` (
  `anime_id` int(11) NOT NULL,
  `anime_nombre` varchar(100) NOT NULL,
  `anime_sinopsis` text NOT NULL,
  `anime_actualidad` varchar(30) NOT NULL COMMENT 'terminado, en emision, etc',
  `anime_estado_vista` varchar(50) NOT NULL COMMENT 'estado de la serie: pendiente, terminado o pendiente',
  `anime_estado` int(1) NOT NULL DEFAULT 1,
  `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp(),
  `anime_imagen` varchar(50) DEFAULT NULL COMMENT '101x150 pixeles',
  `anime_banner` varchar(50) DEFAULT NULL,
  `anime_cantidad_capitulos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anime`
--

INSERT INTO `anime` (`anime_id`, `anime_nombre`, `anime_sinopsis`, `anime_actualidad`, `anime_estado_vista`, `anime_estado`, `FechaRegistro`, `anime_imagen`, `anime_banner`, `anime_cantidad_capitulos`) VALUES
(1, 'naruto', 'Naruto, un aprendiz de ninja de la Aldea Oculta de Konoha es un chico travieso que desea llegar a ser el Hokage de la aldea para demostrar a todos lo que vale. Lo que descubre al inicio de la historia es que la gente le mira con desconfianza porque en su interior está encerrado el demonio Kyubi que una vez destruyó la aldea, y que el anterior líder de la misma tuvo que encerrar en su cuerpo siendo aún muy pequeño, a coste de su vida. Aunque sus compañeros no saben esto, tampoco le aprecian porque es mal estudiante y siempre está haciendo bromas. Sin embargo, la forma de actuar y la determinación de Naruto demuestran a los demás que puede llegar muy lejos, y el recelo de los otros chicos se va disipando. Naruto y sus compañeros Sakura y Sasuke, junto a su maestro Kakashi tendrán que enfrentarse a una serie de combates y misiones a lo largo de la historia que les permitirán mejorar y crecer. Naruto se vera enfrentado a sus principales enemigos Akatsuki, Itachi y Kisame.', 'terminado', 'terminado', 1, '2020-11-08 21:30:23', 'naruto.jpg', 'naruto.jpg', NULL),
(2, 'naruto shippuden', 'Pasados dos años y medio de entrenamiento con Jiraiya, Naruto Uzumaki regresa a la aldea oculta de la hoja, donde se reúne con sus viejos amigos y conforma de nuevo el Equipo 7. Debido a la ausencia de Sasuke, aparece un nuevo personaje llamado Sai el cual retoma su lugar. En esta secuela podremos notar como los compañeros de Naruto han madurado con respecto a su desempeño previo, mejorando la mayoría de estos en su nivel. Durante su entrenamiento con Jiraiya, Naruto aprendió a controlar un poco de la chacra del Kyubi. Lo contrario a la serie original, dónde sólo desempeñó un papel secundario, la organización Akatsuki asume el papel antagónico principal en Naruto Shippuden, buscando como objetivo principal el capturar a todos los poderosos monstruos Biju.', 'terminado', 'terminado', 1, '2020-11-08 21:31:03', 'naruto_shippuden.jpg', 'naruto_shippuden.jpg', 478),
(3, 'akame ga kill', 'La historia nos lleva a través de las aventuras de Tatsumi, un joven boxeador que viajó a la capital imperial para unirse al ejército. Sin embargo, descubre que la ciudad está dañada por el ansia de poder de los funcionarios, que se aprovechan de la falta', 'terminado', 'terminado', 1, '2020-12-08 21:18:23', 'akame_ga_kill.jpg', NULL, NULL),
(4, 'zero no tsukaima', 'Una historia cómica de 2 personajes principales, Louis y Saito. La aventura recomienza cuando Saito, quien habia luchado contra el ejercito de los 1000 hombres, regreso a la vida luego de una ardua batalla. Tras desconocer los detalles de su milagrosa res', 'terminado', 'terminado', 1, '2020-12-08 21:22:57', 'zero_no_tsukaima.jpg', NULL, NULL),
(5, 'gakusen toshi asterisk', 'En el siglo pasado, la humanidad fue atacada por un desastre sin precedentes... el impacto “Invertia”. El mundo fue completamente destruido. Sin embargo, los humanos adquirieron un nuevo poder: el “Genestella”.', 'terminado', 'terminado', 1, '2020-12-08 21:35:53', 'gakusen_toshi_asterisk.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anime_genero`
--

CREATE TABLE `anime_genero` (
  `anime_genero_id` int(11) NOT NULL,
  `anime_id` int(11) NOT NULL,
  `genero_id` int(11) NOT NULL,
  `anime_genero_estado` int(11) NOT NULL DEFAULT 1,
  `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anime_genero`
--

INSERT INTO `anime_genero` (`anime_genero_id`, `anime_id`, `genero_id`, `anime_genero_estado`, `FechaRegistro`) VALUES
(7, 1, 2, 1, '2020-12-08 19:11:04'),
(8, 1, 11, 1, '2020-12-08 19:11:24'),
(9, 1, 12, 1, '2020-12-08 19:11:43'),
(10, 1, 9, 1, '2020-12-08 19:11:56'),
(12, 1, 29, 1, '2020-12-08 19:12:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

CREATE TABLE `etiqueta` (
  `etiqueta_id` int(11) NOT NULL,
  `etiqueta_nombre` varchar(100) NOT NULL,
  `etiqueta_estado` int(1) NOT NULL,
  `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp(),
  `anime_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `genero_id` int(11) NOT NULL,
  `genero_nombre` varchar(50) NOT NULL,
  `genero_estado` int(1) NOT NULL DEFAULT 1,
  `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`genero_id`, `genero_nombre`, `genero_estado`, `FechaRegistro`) VALUES
(1, 'Ciencia ficción', 1, '2020-11-08 21:36:50'),
(2, 'Acción', 1, '2020-11-08 21:36:50'),
(3, 'Deportes', 1, '2020-12-08 18:57:52'),
(4, 'Espacial', 1, '2020-12-08 18:58:12'),
(5, 'Infantil', 1, '2020-12-08 18:59:11'),
(6, 'Mecha', 1, '2020-12-08 19:00:03'),
(7, 'Parodia', 1, '2020-12-08 19:00:10'),
(8, 'Romance', 1, '2020-12-08 19:00:21'),
(9, 'Shounen', 1, '2020-12-08 19:00:27'),
(10, 'Terror', 1, '2020-12-08 19:00:33'),
(11, 'Artes Marciales', 1, '2020-12-08 19:00:52'),
(12, 'Comedia', 1, '2020-12-08 19:01:01'),
(13, 'Drama', 1, '2020-12-08 19:01:10'),
(14, 'Fantasía', 1, '2020-12-08 19:01:21'),
(15, 'Josei', 1, '2020-12-08 19:01:34'),
(16, 'Militar', 1, '2020-12-08 19:01:38'),
(17, 'Policía', 1, '2020-12-08 19:01:47'),
(18, 'Samurai', 1, '2020-12-08 19:02:02'),
(19, 'Sobrenatural', 1, '2020-12-08 19:02:12'),
(20, 'Vampiros', 1, '2020-12-08 19:02:18'),
(21, 'Aventuras', 1, '2020-12-08 19:02:39'),
(22, 'Demencia', 1, '2020-12-08 19:02:45'),
(23, 'Ecchi', 1, '2020-12-08 19:02:52'),
(24, 'Harem', 1, '2020-12-08 19:03:02'),
(25, 'Juegos', 1, '2020-12-08 19:03:06'),
(26, 'Misterio', 1, '2020-12-08 19:03:19'),
(27, 'Psicológico', 1, '2020-12-08 19:03:29'),
(28, 'Seinen', 1, '2020-12-08 19:03:38'),
(29, 'Superpoderes', 1, '2020-12-08 19:03:45'),
(30, 'Yaoi', 1, '2020-12-08 19:04:04'),
(31, 'Carreras', 1, '2020-12-08 19:04:10'),
(32, 'Demonios', 1, '2020-12-08 19:04:14'),
(33, 'Escolares', 1, '2020-12-08 19:04:21'),
(34, 'Historico', 1, '2020-12-08 19:04:31'),
(35, 'Magia', 1, '2020-12-08 19:04:36'),
(36, 'Música', 1, '2020-12-08 19:05:10'),
(37, 'Recuentos de la vida', 1, '2020-12-08 19:05:26'),
(38, 'Shoujo', 1, '2020-12-08 19:05:34'),
(39, 'Suspenso', 1, '2020-12-08 19:05:38'),
(40, 'Yuri', 1, '2020-12-08 19:05:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `proceso_id` int(11) NOT NULL,
  `anime_id` int(11) NOT NULL,
  `proceso_capitulos_vistos` int(11) NOT NULL COMMENT 'capitulo en el que dejaste de ver la serie',
  `proceso_estado` int(1) NOT NULL,
  `FechaRegistro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseña`
--

CREATE TABLE `reseña` (
  `reseña_id` int(11) NOT NULL,
  `reseña_titulo` varchar(50) NOT NULL,
  `reseña_comentarios` varchar(255) NOT NULL,
  `reseña_estado` int(1) NOT NULL,
  `Fecha_Registro` datetime NOT NULL DEFAULT current_timestamp(),
  `anime_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`anime_id`);

--
-- Indices de la tabla `anime_genero`
--
ALTER TABLE `anime_genero`
  ADD PRIMARY KEY (`anime_genero_id`),
  ADD KEY `fk_anime_genero1` (`anime_id`),
  ADD KEY `fk_anime_genero2` (`genero_id`);

--
-- Indices de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD PRIMARY KEY (`etiqueta_id`),
  ADD KEY `fk_etiqueta1` (`anime_id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`genero_id`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`proceso_id`),
  ADD KEY `fk_proceso1` (`anime_id`);

--
-- Indices de la tabla `reseña`
--
ALTER TABLE `reseña`
  ADD PRIMARY KEY (`reseña_id`),
  ADD KEY `fk_reseña1` (`anime_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anime`
--
ALTER TABLE `anime`
  MODIFY `anime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `anime_genero`
--
ALTER TABLE `anime_genero`
  MODIFY `anime_genero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  MODIFY `etiqueta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `genero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `proceso_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reseña`
--
ALTER TABLE `reseña`
  MODIFY `reseña_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anime_genero`
--
ALTER TABLE `anime_genero`
  ADD CONSTRAINT `fk_anime_genero1` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`anime_id`),
  ADD CONSTRAINT `fk_anime_genero2` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`genero_id`);

--
-- Filtros para la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD CONSTRAINT `fk_etiqueta1` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`anime_id`);

--
-- Filtros para la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD CONSTRAINT `fk_proceso1` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`anime_id`);

--
-- Filtros para la tabla `reseña`
--
ALTER TABLE `reseña`
  ADD CONSTRAINT `fk_reseña1` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`anime_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
