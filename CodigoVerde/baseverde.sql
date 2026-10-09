-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2026 a las 20:43:03
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
-- Base de datos: `letras_verdes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mascota_clave` varchar(50) DEFAULT NULL,
  `xp` int(11) DEFAULT 0,
  `cuentos_leidos` text DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `hambre` int(11) DEFAULT 100,
  `felicidad` int(11) DEFAULT 100,
  `energia` int(11) DEFAULT 100,
  `higiene` int(11) DEFAULT 100,
  `monedas` int(11) DEFAULT 50,
  `nivel` int(11) DEFAULT 1,
  `ropa_color` varchar(30) DEFAULT '#f59e0b',
  `sombrero_id` varchar(30) DEFAULT 'ninguno',
  `inventario` text DEFAULT '{"comida":{"apple":3,"pizza":2,"cake":1},"pociones":{"health":1,"energy":1}}'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `mascota_clave`, `xp`, `cuentos_leidos`, `fecha_registro`, `hambre`, `felicidad`, `energia`, `higiene`, `monedas`, `nivel`, `ropa_color`, `sombrero_id`, `inventario`) VALUES
(8, 'sebastianpernav@gmail.com', 'letrin', 245, '[\"e1-1\",\"e1-2\",\"e1-3\",\"e1-4\",\"e1-8\",\"e1-7\",\"e1-6\"]', '2026-10-06 20:20:43', 100, 100, 100, 100, 118, 1, NULL, NULL, '{\"comida\":{\"apple\":3,\"pizza\":2,\"cake\":1,\"comida_rapida\":{\"burger\":1}},\"pociones\":{\"health\":1,\"energy\":1}}'),
(10, 'peraltanavarretesebastiang25@cbtis116.edu.mx', 'letrabee', 1000, '[\"e1-8\",\"e1-7\",\"e1-4\",\"e1-3\",\"e1-6\",\"e1-2\",\"e1-1\",\"e1-5\",\"e1-9\",\"e1-10\",\"e1-11\",\"e1-12\",\"e1-16\",\"e1-15\",\"e1-14\",\"e1-13\",\"e1-17\",\"e1-18\",\"e1-19\",\"e1-20\",\"m1-3\",\"m1-2\",\"m1-1\",\"m1-5\",\"m1-6\",\"m1-7\",\"m1-4\",\"m1-8\",\"m1-12\",\"m1-10\",\"m1-9\",\"m1-11\",\"m1-13\",\"m1-14\",\"m1-15\",\"m1-16\",\"m1-20\",\"m1-19\",\"m1-18\",\"m1-17\",\"e2-1\",\"e2-2\",\"e2-3\",\"e2-4\",\"e2-8\",\"e2-7\",\"e2-6\",\"e2-5\",\"e2-9\",\"e2-10\",\"e2-11\",\"e2-12\",\"e2-16\",\"e2-15\",\"e2-14\",\"e2-13\",\"e2-17\",\"e2-18\",\"e2-19\",\"e2-20\",\"m2-4\",\"m2-3\",\"m2-2\",\"m2-1\",\"m2-6\",\"m2-5\",\"m2-7\",\"m2-8\",\"m2-11\",\"m2-10\",\"m2-9\",\"m2-13\",\"m2-14\",\"m2-15\",\"m2-16\",\"m2-12\",\"m2-20\",\"m2-19\",\"m2-18\",\"m2-17\"]', '2026-10-07 02:21:55', 100, 100, 100, 100, 50, 1, NULL, NULL, '{\"comida\":{\"apple\":3,\"pizza\":2,\"cake\":1},\"pociones\":{\"health\":1,\"energy\":1}}');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
