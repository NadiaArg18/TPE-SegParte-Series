-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2022 a las 03:29:47
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_serie`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `episodios`
--

CREATE TABLE `episodios` (
  `id` int(11) NOT NULL,
  `nameEpisode` varchar(200) NOT NULL,
  `Director` varchar(200) NOT NULL,
  `fk_id_Season` int(11) NOT NULL,
  `premiereYear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `episodios`
--

INSERT INTO `episodios` (`id`, `nameEpisode`, `Director`, `fk_id_Season`, `premiereYear`) VALUES
(1, 'Payback', 'Jean de Segonzac', 1, 1999),
(4, 'Hysteria', 'Richard Dobbs', 1, 1999),
(5, 'Russian Love Poem', 'Rick Rosenthal', 1, 2000),
(7, 'Chat Room', 'Richard Dobbs', 1, 2000),
(8, 'Wrong is Right', 'Ted Kotcheff', 2, 2000),
(9, 'Honor', 'Alan Metzger', 2, 2000),
(10, 'Baby killer', 'Juan J. Campanella', 2, 2000),
(12, 'Countdown', 'Steve Shill', 2, 2001),
(13, 'Repression', 'Henry J. Bronchtein', 3, 2001),
(15, 'Care', 'Gloria Muzio', 3, 2001),
(16, 'Monogamy', 'Constantine Makris	', 3, 2002),
(17, 'Prodigy', 'Steve Shill	', 3, 2002),
(18, 'Deception', 'Constantine Makris', 4, 2002),
(19, 'Vulnerable', 'Juan J. Campanella	', 4, 2002),
(20, 'Dolls', 'Darnell Martin', 4, 2002),
(22, 'Pandora', 'Alex Zakrzewski', 4, 2003),
(28, 'ffdds', 'SSSS', 2, 254);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporadas`
--

CREATE TABLE `temporadas` (
  `id_Season` int(11) NOT NULL,
  `numberSeason` varchar(200) NOT NULL,
  `seasonDescrip` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `temporadas`
--

INSERT INTO `temporadas` (`id_Season`, `numberSeason`, `seasonDescrip`) VALUES
(1, 'Season 1', 'La 1ª temporada se estrenó en Estados Unidos el 20 de septiembre de 1999.\r\nCuenta con un total de 22 episodios.'),
(2, 'Season 2', 'A partir de esta temporada la serie se centra más en la relación entre el detective Elliot Stabler y su compañera la detective Olivia Benson.\r\nTiene un total de 21 episodios.'),
(3, 'Season 3', 'Esta temporada cuenta con 6 protagonista y mas de 10 guionistas y directores.'),
(4, 'Season 4', ''),
(7, 'SEAEEES', 'FKKSKKSKV');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_Users` int(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_Users`, `Email`, `Password`) VALUES
(7, 'nadia@gmail.com', '$2y$10$ttSndE1LaJFva99xGNiIVO790Ghw74dAup0z3hGLPhOszL2.zrMjG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `episodios`
--
ALTER TABLE `episodios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_Season` (`fk_id_Season`);

--
-- Indices de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  ADD PRIMARY KEY (`id_Season`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_Users`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `episodios`
--
ALTER TABLE `episodios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `temporadas`
--
ALTER TABLE `temporadas`
  MODIFY `id_Season` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_Users` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `episodios`
--
ALTER TABLE `episodios`
  ADD CONSTRAINT `episodios_ibfk_1` FOREIGN KEY (`fk_id_Season`) REFERENCES `temporadas` (`id_Season`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
