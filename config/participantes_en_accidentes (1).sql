-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-06-2024 a las 06:14:06
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agencia_seguros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes_en_accidentes`
--

CREATE TABLE `participantes_en_accidentes` (
  `idPA` int(11) NOT NULL,
  `idAccidente` int(11) DEFAULT NULL,
  `idVehiculo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `participantes_en_accidentes`
  ADD PRIMARY KEY (`idPA`),
  ADD KEY `idAccidente` (`idAccidente`),
  ADD KEY `idVehiculo` (`idVehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `participantes_en_accidentes`
--
ALTER TABLE `participantes_en_accidentes`
  MODIFY `idPA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `participantes_en_accidentes`
--
ALTER TABLE `participantes_en_accidentes`
  ADD CONSTRAINT `participantes_en_accidentes_ibfk_1` FOREIGN KEY (`idAccidente`) REFERENCES `accidentes` (`Numero_de_Referencia`),
  ADD CONSTRAINT `participantes_en_accidentes_ibfk_2` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculos` (`idVehiculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
