-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2023 a las 23:22:20
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
-- Base de datos: `tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Edad` int(45) NOT NULL,
  `Cantidad de peliculas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`Id`, `Nombre`, `Edad`, `Cantidad de peliculas`) VALUES
(1, 'David Fincher', 51, 7),
(2, 'James Cameron', 63, 9),
(3, 'Martin Scorsese', 82, 17),
(4, 'Christopher Nolan', 53, 12),
(5, 'Peter Jackson', 61, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `Id` int(100) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Anio` int(100) NOT NULL,
  `Genero` varchar(100) NOT NULL,
  `Id_Director` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`Id`, `Titulo`, `Anio`, `Genero`, `Id_Director`) VALUES
(1, 'Avatar', 2009, 'Accion', 1),
(2, 'Fight Club', 1999, 'Drama', 2),
(3, 'La isla siniestra', 2010, 'Drama', 3),
(4, 'Terminator 2', 1991, 'Ciencia ficcion', 2),
(5, 'Interstellar', 2014, 'Ciencia ficcion', 4),
(6, 'Seven', 1997, 'thriller ', 1),
(7, 'El señor de los anillos', 2001, 'Fantasia', 5),
(8, 'Oppenheimer', 2023, 'Drama', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Director` (`Id_Director`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`Id_Director`) REFERENCES `director` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
