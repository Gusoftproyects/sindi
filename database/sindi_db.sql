-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2024 a las 07:15:09
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
-- Base de datos: `sindi_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `fecha_registro`) VALUES
(1, 'Nestor', 'n19@gmail.com', '123', '2024-07-10 04:17:32'),
(2, 'Marco', 'm19@gmail.com', '1234', '2024-07-10 04:19:12'),
(3, 'Chapo', 'guzman@mx.com', '123456', '2024-07-10 04:23:23'),
(4, 'TONY', 'tony@gusoft.com', '$2y$10$CwHNl7kTg3NCeopLbV', '2024-07-10 04:30:51'),
(5, 'Alvaro', 'alvaro@gusoft.com', '$2y$10$8ElYdlpCIQCmZpwU2D', '2024-07-12 03:50:01'),
(6, 'Piyi', 'p@g.com', '$2y$10$w2Mkn8tWzKDsKpYI.g', '2024-07-12 03:57:58'),
(7, 'Ernesto', 'ernesto@gmail.com', '123', '2024-07-12 04:12:34'),
(8, 'Ismael', 'isma@gmail.com', '$2y$10$bgBi0EY7TYjjM.Aqek', '2024-07-12 04:13:38'),
(9, 'Nini', 'nini@gmail.com', '$2y$10$BjGAr1mtZIdKB00oCo', '2024-07-12 04:27:33'),
(10, '123', '123@123.com', '$2y$10$IjhWAib1FqyXCksECa', '2024-07-12 04:33:33'),
(11, '1010', '1010@1010.com', '$argon2i$v=19$m=65536,t=4', '2024-07-12 04:36:28'),
(12, 'Antonio', 'antony@gmail.com', '81dc9bdb52d04dc20036dbd83', '2024-07-12 04:40:47'),
(13, '1', '1@gmail.com', '$2y$10$iSr3EePIXZ42kSfLGs', '2024-07-12 05:30:03'),
(14, 'MT', 'mt@gusoft.com', '$2y$10$a9jFzPGejcJoAs9Zn3', '2024-07-12 05:33:46'),
(15, 'Archivaldo', 'archivaldo@gmail.com', '$2y$10$rAgM551bzIrL0PtPTueo8OeEHohamlG9r1TfCTHUZFUapNTztpBpe', '2024-07-12 05:38:13'),
(16, 'Archi', 'archivalo@19.com', '$2y$10$4nZPFBvCrlu2d6jblb2onuCvVuPDz80tBYOvXY/jAWzn75Q/Jf6T.', '2024-07-17 04:19:18'),
(17, '', '', '$2y$10$6ZQVn5aeyC5aUX2PHFCCP.iISIzPkhUKJ5ILqOBnDMNxu35lFWd8q', '2024-07-17 04:27:42'),
(20, 'Alvaro2', 'trincaogonzalez2@gmail.com', '$2y$10$Lk9Ev1AZLx27dsCpQlX31uqKoWIKWSfyuVtX/6xQ0O2Htxg24UveW', '2024-07-17 04:31:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
