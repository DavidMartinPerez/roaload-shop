-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2018 a las 09:43:36
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
-- Base de datos: `tienda`
--
CREATE DATABASE IF NOT EXISTS `tienda` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `tienda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidora`
--

CREATE TABLE `distribuidora` (
  `idDistribuidora` int(11) NOT NULL,
  `nombreDistribuidora` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `distribuidora`
--

INSERT INTO `distribuidora` (`idDistribuidora`, `nombreDistribuidora`) VALUES
(1, 'Sin confirmar'),
(2, 'Sony'),
(3, 'Nintendo'),
(4, 'Epic Games'),
(5, 'EA'),
(6, 'Square Enix');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edicion`
--

CREATE TABLE `edicion` (
  `idEdicion` int(11) NOT NULL,
  `nombreEdicion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `edicion`
--

INSERT INTO `edicion` (`idEdicion`, `nombreEdicion`) VALUES
(1, 'Ed. Normal'),
(2, 'Ed. Coleccionista'),
(3, 'Ed. Completa'),
(4, 'Ed. Goty'),
(5, 'Ed. Especial'),
(6, 'Sin confirmar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(20) NOT NULL,
  `idUsuario` int(16) NOT NULL,
  `fechaPedido` date NOT NULL,
  `fechaEntregado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idUsuario`, `fechaPedido`, `fechaEntregado`) VALUES
(1, 1, '2017-11-22', '0000-00-00'),
(2, 1, '2017-11-22', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

CREATE TABLE `plataforma` (
  `idPlataforma` int(11) NOT NULL,
  `nombrePlataforma` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `plataforma`
--

INSERT INTO `plataforma` (`idPlataforma`, `nombrePlataforma`) VALUES
(1, 'Sin confirmar'),
(2, 'PS4'),
(3, 'NSW'),
(4, 'PC'),
(5, '3DS'),
(7, 'XONE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacionpedido`
--

CREATE TABLE `relacionpedido` (
  `idPedido` int(20) NOT NULL,
  `idProducto` int(20) NOT NULL,
  `unidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(20) NOT NULL,
  `nombreUsuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `contrasena` varchar(16) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(16) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `direccion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` int(15) DEFAULT NULL,
  `codigoTarjeta` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `ultimoLog` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUsuario`, `contrasena`, `nombre`, `apellido`, `nacimiento`, `direccion`, `telefono`, `codigoTarjeta`, `admin`, `fechaRegistro`, `ultimoLog`) VALUES
(1, 'david', 'david', 'David', 'Martin Perez', NULL, 'c/Pepito Grillo', 670707070, '823674872164', 0, '0000-00-00', '0000-00-00'),
(3, 'admin', 'admin', 'administrador', NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', '0000-00-00'),
(6, 'Patricia', 'patrici', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `versionjuego`
--

CREATE TABLE `versionjuego` (
  `idVersion` int(11) NOT NULL,
  `idJuego` int(11) NOT NULL,
  `idPlataforma` int(11) NOT NULL,
  `idEdicion` int(11) NOT NULL,
  `idDistribuidora` int(11) DEFAULT NULL,
  `precio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `fechaSalida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `versionjuego`
--

INSERT INTO `versionjuego` (`idVersion`, `idJuego`, `idPlataforma`, `idEdicion`, `idDistribuidora`, `precio`, `stock`, `fechaSalida`) VALUES
(3, 3, 4, 1, 2, 33, 33, '2018-02-07'),
(4, 11, 4, 1, 3, 33, 33, '2018-02-07'),
(10, 3, 2, 4, 3, 3, 35, '2018-02-16'),
(21, 10, 7, 6, 5, 22, 22, '2018-02-27'),
(22, 8, 4, 4, 4, 55, 33, '2018-02-27'),
(23, 10, 4, 5, 6, 55, 55, '2018-02-28'),
(24, 8, 5, 4, 6, 332, 22, '2018-02-28'),
(25, 3, 4, 4, 6, 55, 22, '2018-02-28'),
(28, 3, 2, 3, 2, 22, 22, '2018-02-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuego`
--

CREATE TABLE `videojuego` (
  `idJuego` int(11) NOT NULL,
  `nombreJuego` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `descripJuego` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `videojuego`
--

INSERT INTO `videojuego` (`idJuego`, `nombreJuego`, `descripJuego`) VALUES
(1, 'FIFA 18', 'Futbol'),
(3, 'Kingdom Hearts I', 'Sora y sus amigos'),
(8, 'Kingdom Hearts II', 'Sora y sus amigos 2'),
(10, 'Final Fantasy XV', 'La última entrega de final fanatsy'),
(11, 'Final Fantasy XII', 'La era del cambio para Final Fantasy.'),
(12, 'Animal Crossing', 'Cuida de tu pueblo'),
(13, 'Bayonetta', 'La bruja que conmovió a Shakespeare'),
(14, 'Bayonetta 2', 'La bruja viene con ganas de más...'),
(15, 'Crash Bandicoot INSANE TRIALOGY', 'Crash bandicoot vuelve la nueva generación con ganas de saltar más y correr menos.'),
(16, 'Pokemon Star', 'Mas falso que tu');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `distribuidora`
--
ALTER TABLE `distribuidora`
  ADD PRIMARY KEY (`idDistribuidora`);

--
-- Indices de la tabla `edicion`
--
ALTER TABLE `edicion`
  ADD PRIMARY KEY (`idEdicion`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`idPlataforma`);

--
-- Indices de la tabla `relacionpedido`
--
ALTER TABLE `relacionpedido`
  ADD KEY `idPedido` (`idPedido`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `versionjuego`
--
ALTER TABLE `versionjuego`
  ADD PRIMARY KEY (`idVersion`),
  ADD KEY `idJuego` (`idJuego`),
  ADD KEY `edicion` (`idEdicion`),
  ADD KEY `plataforma` (`idPlataforma`),
  ADD KEY `distri` (`idDistribuidora`);

--
-- Indices de la tabla `videojuego`
--
ALTER TABLE `videojuego`
  ADD PRIMARY KEY (`idJuego`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `distribuidora`
--
ALTER TABLE `distribuidora`
  MODIFY `idDistribuidora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `edicion`
--
ALTER TABLE `edicion`
  MODIFY `idEdicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  MODIFY `idPlataforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `versionjuego`
--
ALTER TABLE `versionjuego`
  MODIFY `idVersion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `videojuego`
--
ALTER TABLE `videojuego`
  MODIFY `idJuego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `relacionpedido`
--
ALTER TABLE `relacionpedido`
  ADD CONSTRAINT `relacionpedido_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`);

--
-- Filtros para la tabla `versionjuego`
--
ALTER TABLE `versionjuego`
  ADD CONSTRAINT `distri` FOREIGN KEY (`idDistribuidora`) REFERENCES `distribuidora` (`idDistribuidora`),
  ADD CONSTRAINT `edicion` FOREIGN KEY (`idEdicion`) REFERENCES `edicion` (`idEdicion`),
  ADD CONSTRAINT `idJuego` FOREIGN KEY (`idJuego`) REFERENCES `videojuego` (`idJuego`),
  ADD CONSTRAINT `plataforma` FOREIGN KEY (`idPlataforma`) REFERENCES `plataforma` (`idPlataforma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
