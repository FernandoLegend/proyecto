-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2024 a las 15:54:56
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliados`
--

CREATE TABLE `afiliados` (
  `id` int(11) NOT NULL,
  `cedula` varchar(8) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `trabajo` varchar(255) NOT NULL,
  `nomina` varchar(255) NOT NULL,
  `cuota` int(11) NOT NULL,
  `ingreso` date NOT NULL,
  `retiro` date NOT NULL,
  `descuento` varchar(255) NOT NULL,
  `Saldo` float(255,2) NOT NULL,
  `sueldo` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `afiliados`
--

INSERT INTO `afiliados` (`id`, `cedula`, `apellidos`, `nombres`, `trabajo`, `nomina`, `cuota`, `ingreso`, `retiro`, `descuento`, `Saldo`, `sueldo`) VALUES
(14, '28721615', 'Marin Velasquez', 'Fernando Andres', 'Informatica', 'Ordinariotcom', 10, '2023-03-17', '2023-11-11', 'No', 0.00, 0.00),
(15, '2876522', 'Fernandez', 'Alejandro', 'Recursos humanos', 'Jubiliado', 22, '2023-03-28', '2023-03-30', 'Si', 0.00, 0.01),
(16, '123', 'Rivas Velasquez', 'Fernanado Andres', 'Recursos humanos', 'Contratado Tiempo Completo', 7, '2023-04-02', '2023-04-27', 'si', 0.00, 0.01);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

CREATE TABLE `cuotas` (
  `id` int(11) NOT NULL,
  `clave` int(11) NOT NULL,
  `cedula` int(255) NOT NULL,
  `estado` varchar(11) NOT NULL,
  `pago` float(12,2) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuotas`
--

INSERT INTO `cuotas` (`id`, `clave`, `cedula`, `estado`, `pago`, `fecha`) VALUES
(1, 94, 30977599, 'Cancelada', 0.00, '2023-03-13'),
(2, 94, 30977599, 'Cancelada', 0.00, '2023-03-13'),
(3, 94, 30977599, 'Cancelada', 0.00, '2023-03-13'),
(4, 94, 30977599, 'Cancelada', 0.00, '2023-03-13'),
(5, 94, 30977599, 'Cancelada', 0.00, '2023-03-13'),
(6, 94, 30977599, 'Cancelada', 0.00, '2023-03-13'),
(7, 94, 30977599, 'Cancelada', 0.00, '2023-03-13'),
(8, 94, 30977599, 'Cancelada', 0.00, '2023-03-13'),
(9, 94, 30977599, 'Cancelada', 0.00, '2023-03-13'),
(10, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(11, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(12, 94, 30977599, 'Cancelada', 0.00, '2023-03-13'),
(13, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(14, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(15, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(16, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(17, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(18, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(19, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(20, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(21, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(22, 94, 30977599, 'Cancelada', 0.00, '2023-03-13'),
(23, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(24, 94, 30977599, 'Cancelada', 0.00, '2023-03-13'),
(25, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(26, 94, 30977599, 'Cancelada', 0.00, '2023-03-26'),
(27, 94, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(28, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(29, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(30, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(31, 94, 30977599, 'Cancelada', 0.00, '2023-03-22'),
(32, 94, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(33, 94, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(34, 94, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(35, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(36, 94, 30977599, 'Cancelada', 0.00, '2023-03-23'),
(37, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(38, 94, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(39, 94, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(40, 94, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(41, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(42, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(43, 94, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(44, 94, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(45, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(46, 94, 30977599, 'Cancelada', 0.00, '2023-03-13'),
(47, 94, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(48, 94, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(49, 95, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(50, 95, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(51, 95, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(52, 95, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(53, 95, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(54, 95, 30977599, 'Cancelada', 0.00, '2023-03-14'),
(55, 95, 30977599, 'Cancelada', 0.00, '2023-12-12'),
(56, 96, 28721624, 'Cancelada', 0.00, '2023-03-18'),
(57, 96, 28721624, 'Cancelada', 0.00, '2023-03-21'),
(58, 96, 28721624, 'Cancelada', 0.00, '2023-03-21'),
(59, 96, 28721624, 'Cancelada', 0.00, '2023-03-21'),
(60, 96, 28721624, 'Por pagar', 0.00, '0000-00-00'),
(61, 96, 28721624, 'Por pagar', 0.00, '0000-00-00'),
(62, 96, 28721624, 'Por pagar', 0.00, '0000-00-00'),
(63, 96, 28721624, 'Por pagar', 0.00, '0000-00-00'),
(64, 96, 28721624, 'Por pagar', 0.00, '0000-00-00'),
(65, 96, 28721624, 'Por pagar', 0.00, '0000-00-00'),
(66, 96, 28721624, 'Por pagar', 0.00, '0000-00-00'),
(67, 96, 28721624, 'Por pagar', 0.00, '0000-00-00'),
(68, 97, 30977599, 'Cancelada', 0.00, '2023-03-22'),
(69, 97, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(70, 97, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(71, 97, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(72, 97, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(73, 97, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(74, 97, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(75, 97, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(76, 97, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(77, 97, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(78, 97, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(79, 97, 30977599, 'Por pagar', 0.00, '0000-00-00'),
(80, 98, 28721624, 'Cancelada', -1.19, '2023-12-10'),
(81, 98, 28721624, 'Cancelada', -1.19, '2023-12-10'),
(82, 98, 28721624, 'Cancelada', -1.19, '2023-12-10'),
(83, 98, 28721624, 'Por pagar', -1.19, '0000-00-00'),
(84, 98, 28721624, 'Por pagar', -1.19, '0000-00-00'),
(85, 98, 28721624, 'Por pagar', -1.19, '0000-00-00'),
(86, 98, 28721624, 'Por pagar', -1.19, '0000-00-00'),
(87, 98, 28721624, 'Por pagar', -1.19, '0000-00-00'),
(88, 98, 28721624, 'Por pagar', -1.19, '0000-00-00'),
(89, 98, 28721624, 'Por pagar', -1.19, '0000-00-00'),
(90, 98, 28721624, 'Por pagar', -1.19, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id` int(11) NOT NULL,
  `cedula` varchar(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `monto` float(12,2) NOT NULL,
  `cuotas` int(11) NOT NULL,
  `interes` int(11) NOT NULL,
  `total` float(12,2) NOT NULL,
  `montoxcuota` float(12,2) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id`, `cedula`, `tipo`, `monto`, `cuotas`, `interes`, `total`, `montoxcuota`, `fecha`) VALUES
(95, '30977599', 'Corto', 0.00, 7, 10, 0.00, 0.00, '2023-03-14'),
(96, '28721624', 'Mediano', 0.00, 12, 12, 0.00, 0.00, '2023-03-18'),
(97, '30977599', 'Corto', 0.00, 12, 10, 0.00, 0.00, '2023-03-22'),
(98, '28721624', 'Corto', -12.00, 11, 10, -13.20, -1.20, '2023-12-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traspaso`
--

CREATE TABLE `traspaso` (
  `conta` int(255) NOT NULL,
  `primero` float(255,4) NOT NULL,
  `prueba` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliados`
--
ALTER TABLE `afiliados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `traspaso`
--
ALTER TABLE `traspaso`
  ADD PRIMARY KEY (`conta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afiliados`
--
ALTER TABLE `afiliados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `traspaso`
--
ALTER TABLE `traspaso`
  MODIFY `conta` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
