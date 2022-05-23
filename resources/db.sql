-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2021 a las 13:58:42
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

DROP DATABASE IF EXISTS employee_v2;
CREATE DATABASE IF NOT EXISTS employee_v2;
USE employee_v2;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `employee_v2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `address`
--

DROP TABLE IF EXISTS employee,
                     users;

--
-- Volcado de datos para la tabla `address`
--

/* INSERT INTO `address` (`id`, `streetAddress`, `city`, `state`, `postalCode`) VALUES
(33, 'San Jone', '126', 'CA', '394221'),
(34, 'New York', '89', 'WA', '09889'),
(35, 'San Diego', '55', 'CA', '098765'),
(36, 'Salt lake city', '90', 'UT', '457320'),
(37, 'Louisville', '43', 'KNT', '445321'),
(38, '128', 'Atlanta', 'GEO', '394221'),
(39, 'Nashville', '1', 'TN', '90143'),
(40, 'New Orleans', '126', 'LU', '63281'); */

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee`
--

CREATE TABLE `employee` (
  `id` INT AUTO_INCREMENT  NOT NULL,
  `name` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `age` int(2) NOT NULL,
  `phoneNumber` varchar(40) NOT NULL,
  `streetAddress` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `postalCode` varchar(7) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/* ALTER TABLE `employee`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27; */

/* CREATE TABLE `address` (
  `id` int(255) NOT NULL,
  `streetAddress` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `postalCode` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; */

CREATE TABLE users (
    userId          INT AUTO_INCREMENT  NOT NULL,
    name    VARCHAR(16)         NOT NULL,
    password    VARCHAR(255)        NOT NULL,
    email       VARCHAR(255)        NOT NULL,
    PRIMARY KEY (userId)
);

--
-- Volcado de datos para la tabla `employee`
--

INSERT INTO `employee` (`name`, `lastName`, `email`, `gender`, `age`, `phoneNumber`, `city`, `streetAddress`, `state`, `postalCode`) VALUES
('Rack', 'Lei', 'jackon@network.com', 'Male', 24, '2147483647', 'New York', '89', 'WA', '09889'),
('John', 'Doe', 'jhondoe@foo.com', 'Male', 34, '1283645645', 'San Diego', '55', 'CA', '098765'),
('Leila', 'Mills', 'mills@leila.com', 'Female', 29, '2147483647', 'Salt lake city', '90', 'UT', '457320'),
('Richard', 'Desmond', 'dismond@foo.com', 'Male', 30, '2147483647', 'Louisville', '43', 'KNT', '445321'),
('Susan', 'Smith', 'susanmith@baz.com', 'Female', 28, '2147483647', 'Atlanta', '128', 'GEO', '394221'),
('Brad', 'Simpson', 'brad@foo.com', 'Male', 40, '2147483647', 'Nashville', '1', 'TN', '90143'),
('Neil', 'Walker', 'walkerneil@baz.com', 'Male', 42, '2147483647', 'New Orleans', '126', 'LU', '63281'),
('Robert', 'Thomson', 'jackon@network.com', 'Male', 24, '2147483647', 'San Jone', '126', 'CA', '394221');

/* INSERT INTO `address` (`id`, `streetAddress`, `city`, `state`, `postalCode`) VALUES
(33, 'San Jone', '126', 'CA', '394221'),
(34, 'New York', '89', 'WA', '09889'),
(35, 'San Diego', '55', 'CA', '098765'),
(36, 'Salt lake city', '90', 'UT', '457320'),
(37, 'Louisville', '43', 'KNT', '445321'),
(38, '128', 'Atlanta', 'GEO', '394221'),
(39, 'Nashville', '1', 'TN', '90143'),
(40, 'New Orleans', '126', 'LU', '63281'); */


INSERT INTO users (name, password, email) VALUES
('admin', '$2y$10$nuh1LEwFt7Q2/wz9/CmTJO91stTBS4cRjiJYBY3sVCARnllI.wzBC', 'admin@assemblerschool.com');
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `address`
--
/* ALTER TABLE `address`
  ADD PRIMARY KEY (`id`); */

--
-- Indices de la tabla `employee`
--
/* ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adressId` (`addressId`); */

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `address`
--
/* ALTER TABLE `address`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41; */

--
-- AUTO_INCREMENT de la tabla `employee`
--
/* ALTER TABLE `employee`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27; */

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `employee`
--
/* ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`addressId`) REFERENCES `address` (`id`);
COMMIT; */

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
