-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2023 a las 05:18:48
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
-- Base de datos: `videogame_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria_pk` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria_pk`, `nombre`) VALUES
(1, 'Acción'),
(2, 'Aventura'),
(3, 'Estrategia'),
(4, 'Deportes'),
(5, 'RPG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

CREATE TABLE `plataformas` (
  `id_plataforma_pk` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plataformas`
--

INSERT INTO `plataformas` (`id_plataforma_pk`, `nombre`) VALUES
(2, 'PlayStation'),
(3, 'Nintendo Switch'),
(5, 'Mobile');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario_pk` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `edad` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `cargo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario_pk`, `nombre`, `edad`, `email`, `clave`, `cargo`) VALUES
(1, 'Edier Dario Bravo Bravo', 25, 'edierbra@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(2, 'Juan Pablo Cuervo', 30, 'juanpablo@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(3, 'Alice Smith', 28, 'alicesmith@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(4, 'Bob Johnson', 35, 'bobjohnson@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(5, 'Emily Davis', 22, 'emilydavis@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(6, 'Michael Wilson', 29, 'michaelwilson@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(7, 'Jessica Anderson', 31, 'jessicaanderson@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(8, 'David Thompson', 26, 'davidthompson@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(9, 'Sarah Brown', 33, 'sarahbrown@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(10, 'Christopher Martinez', 27, 'christophermartinez@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(11, 'Olivia Taylor', 24, 'oliviataylor@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(12, 'Daniel Davis', 32, 'danieldavis@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(13, 'Sophia Harris', 29, 'sophiaharris@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(14, 'Matthew Clark', 26, 'matthewclark@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(15, 'Ava Young', 31, 'avayoung@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(16, 'James Lee', 28, 'jameslee@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(17, 'Emma Lewis', 25, 'emmalewis@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(18, 'Alexander Turner', 34, 'alexanderturner@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(19, 'Mia Walker', 27, 'miawalker@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(20, 'William Baker', 30, 'williambaker@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(21, 'dario bravo', 23, 'dario@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(22, 'daniela alvarado', 34, 'daniela@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(23, 'Juan Pablo', 45, 'juan@gmail.com', '202cb962ac59075b964b07152d234b70', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_videojuego`
--

CREATE TABLE `usuario_videojuego` (
  `id_usuario_fk` int(11) NOT NULL,
  `id_videojuego_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_videojuego`
--

INSERT INTO `usuario_videojuego` (`id_usuario_fk`, `id_videojuego_fk`) VALUES
(1, 4),
(1, 12),
(1, 14),
(2, 2),
(3, 3),
(3, 4),
(4, 5),
(5, 6),
(5, 7),
(6, 8),
(7, 9),
(7, 10),
(8, 11),
(8, 12),
(9, 13),
(10, 14),
(10, 15),
(11, 16),
(11, 17),
(12, 18),
(13, 19),
(13, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuegos`
--

CREATE TABLE `videojuegos` (
  `id_videojuego_pk` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `tamano` decimal(10,2) NOT NULL,
  `id_plataforma_fk` int(11) DEFAULT NULL,
  `id_categoria_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `videojuegos`
--

INSERT INTO `videojuegos` (`id_videojuego_pk`, `titulo`, `precio`, `tamano`, `id_plataforma_fk`, `id_categoria_fk`) VALUES
(2, 'God of War', 49.99, 70.00, 2, 2),
(3, 'Super Mario Odyssey', 49.99, 55.00, 3, 2),
(4, 'The Witcher 3: Wild Hunt', 39.99, 80.00, NULL, 5),
(5, 'FIFA 22', 59.99, 45.00, 5, 4),
(6, 'Red Dead Redemption 2', 59.99, 100.00, 2, 1),
(7, 'Minecraft', 29.99, 200.00, 3, 3),
(8, 'Call of Duty: Warzone', 0.00, 120.00, NULL, 1),
(9, 'Animal Crossing: New Horizons', 59.99, 60.00, 3, 2),
(10, 'Assassin\'s Creed Valhalla', 59.99, 90.00, NULL, 5),
(11, 'Fortnite', 0.00, 30.00, 5, 1),
(12, 'Resident Evil Village', 59.99, 45.00, 2, 1),
(13, 'League of Legends', 0.00, 25.00, NULL, 3),
(14, 'Grand Theft Auto V', 29.99, 80.00, NULL, 1),
(15, 'The Legend of Zelda: Breath of the Wild', 59.99, 70.00, 3, 2),
(16, 'Overwatch', 39.99, 50.00, NULL, 1),
(17, 'NBA 2K22', 59.99, 95.00, 5, 4),
(18, 'Cyberpunk 2077', 49.99, 80.00, 2, 5),
(19, 'Pokémon Sword', 59.99, 55.00, 3, 2),
(20, 'Among Us', 4.99, 0.30, NULL, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria_pk`);

--
-- Indices de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`id_plataforma_pk`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario_pk`);

--
-- Indices de la tabla `usuario_videojuego`
--
ALTER TABLE `usuario_videojuego`
  ADD PRIMARY KEY (`id_usuario_fk`,`id_videojuego_fk`),
  ADD KEY `id_videojuego_fk` (`id_videojuego_fk`);

--
-- Indices de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD PRIMARY KEY (`id_videojuego_pk`),
  ADD KEY `id_plataforma_fk` (`id_plataforma_fk`),
  ADD KEY `id_categoria_fk` (`id_categoria_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `id_plataforma_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  MODIFY `id_videojuego_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario_videojuego`
--
ALTER TABLE `usuario_videojuego`
  ADD CONSTRAINT `usuario_videojuego_ibfk_1` FOREIGN KEY (`id_usuario_fk`) REFERENCES `usuarios` (`id_usuario_pk`),
  ADD CONSTRAINT `usuario_videojuego_ibfk_2` FOREIGN KEY (`id_videojuego_fk`) REFERENCES `videojuegos` (`id_videojuego_pk`) ON DELETE CASCADE;

--
-- Filtros para la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD CONSTRAINT `videojuegos_ibfk_1` FOREIGN KEY (`id_plataforma_fk`) REFERENCES `plataformas` (`id_plataforma_pk`) ON DELETE SET NULL,
  ADD CONSTRAINT `videojuegos_ibfk_2` FOREIGN KEY (`id_categoria_fk`) REFERENCES `categorias` (`id_categoria_pk`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
