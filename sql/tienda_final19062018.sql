-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2018 a las 10:33:46
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
  `nombreEdicion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `edicion`
--

INSERT INTO `edicion` (`idEdicion`, `nombreEdicion`, `descripcion`) VALUES
(1, 'Ed. Normal', 'Incluye caratula y juego físico'),
(2, 'Ed. Coleccionista', ''),
(3, 'Ed. Completa', ''),
(4, 'Ed. Goty', ''),
(5, 'Ed. Especial', ''),
(6, 'Sin confirmar', ''),
(7, 'Ed. Definitiva', ''),
(8, 'Ed. Explorador', ''),
(9, 'Ed. Master Royale', ''),
(10, 'COLLECTOR EDITION', 'Una copia del juego\nFigura de colección de Sophithia de 35 centimetros\nContenido digital\nPase de temporada\nBanda sonora original\n'),
(11, 'Pikachu', 'El nuevo juego de pokemon'),
(12, 'Evee', 'el nuevo juego de pokemon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(3) NOT NULL,
  `estado` varchar(11) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `estado`) VALUES
(1, 'pendiente'),
(2, 'pagado'),
(3, 'completado'),
(4, 'cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `idMesaje` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `mensaje` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`idMesaje`, `idUser`, `nombre`, `correo`, `mensaje`, `fecha`) VALUES
(1, 1, 'davod', 'da@da.es', 'holauqe tal', '2018-06-15'),
(2, 1, 'davod', 'da@da.es', 'holauqe tal', '2018-06-15'),
(3, 1, 'David', 'davidmartinperez1@gmail.com', 'Querido soporte mi duda es: CUANDO VAIS A TRAER EL KINGDOM HEARTS!!!!', '2018-06-15'),
(4, 1, 'Hola', 'Hola@gola', 'Querido soporte mi duda es: asd\n', '2018-06-16'),
(5, 1, 'David', 'davidmartinperez1@gmail.com', 'Querido soporte mi duda es: asd', '2018-06-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(255) NOT NULL,
  `idLocalizador` varchar(255) NOT NULL,
  `idUsuario` int(16) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `dni` varchar(9) NOT NULL,
  `calle` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `numeroCalle` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ciudad` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `provincia` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `codigoPostal` int(5) NOT NULL,
  `telefono` int(15) NOT NULL,
  `metodoCorreo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `numeroTarjeta` int(30) DEFAULT NULL,
  `mesTarjeta` int(11) DEFAULT NULL,
  `anoCumplido` int(4) DEFAULT NULL,
  `nombreTitular` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ccTarjeta` int(3) DEFAULT NULL,
  `fechaPedido` date NOT NULL,
  `fechaFinPedido` date DEFAULT NULL,
  `idEstado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idLocalizador`, `idUsuario`, `nombre`, `apellidos`, `dni`, `calle`, `numeroCalle`, `ciudad`, `provincia`, `codigoPostal`, `telefono`, `metodoCorreo`, `numeroTarjeta`, `mesTarjeta`, `anoCumplido`, `nombreTitular`, `ccTarjeta`, `fechaPedido`, `fechaFinPedido`, `idEstado`) VALUES
(1, '120180610121447', 1, 'david', 'david', '77659384E', 'c/ Calle', '659', 'Malaga', 'Anfdalucia', 39555, 615780505, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-10', '2018-06-27', 4),
(9, '120180611185543', 1, 'David', 'David', '77659384E', 'ronda del poniente', '39', 'Malaga', 'España', 29591, 615545545, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-11', '2018-06-15', 3),
(10, '120180611185614', 1, 'David', 'David', '77659384E', 'ronda del poniente', '39', 'Malaga', 'España', 29591, 615545545, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-11', '2018-06-19', 4),
(11, '120180611185654', 1, 'David', 'David', '77659384E', 'ronda del poniente', '39', 'Malaga', 'España', 29591, 615545545, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-11', '2018-06-15', 4),
(12, '120180611185724', 1, 'David', 'David', '77659384E', 'ronda del poniente', '39', 'Malaga', 'España', 29591, 615545545, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-11', NULL, 1),
(13, '120180611185744', 1, 'David', 'David', '77659384E', 'ronda del poniente', '39', 'Malaga', 'España', 29591, 615545545, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-11', NULL, 1),
(14, '120180611204635', 1, 'david', 'david', 'perez', 'ronda del poniente', '115', 'malaga', 'españa', 2954, 65686868, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-11', NULL, 1),
(15, '120180611204656', 1, 'david', 'david', 'perez', 'ronda del poniente', '115', 'malaga', 'españa', 2954, 65686868, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-11', NULL, 1),
(16, '120180611205519', 1, 'david', 'david', 'perez', 'ronda del poniente', '115', 'malaga', 'españa', 2954, 65686868, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-11', NULL, 1),
(17, '120180613113805', 1, 'David', 'David', '77659384E', 'Ronda del poniente', '19', 'Malaga', 'España', 29591, 615780174, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-13', NULL, 1),
(18, '120180613114106', 1, 'David', 'David', '77659384E', 'Ronda del poniente', '19', 'Malaga', 'España', 29591, 615780174, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-13', NULL, 1),
(19, '120180613114345', 1, 'David', 'David', '77659384E', 'Ronda del poniente', '19', 'Malaga', 'España', 29591, 615780174, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-13', NULL, 1),
(20, '120180613114415', 1, 'David', 'David', '77659384E', 'Ronda del poniente', '19', 'Malaga', 'España', 29591, 615780174, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-13', NULL, 1),
(21, '120180614122701', 1, 'David', 'Martin', '77659384E', 'c/ Ronda del poniente ', '19', 'Malaga', 'Malaga', 39596, 615780174, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-14', NULL, 1),
(22, '120180615181556', 1, 'David', 'MArtin', '77659384E', 'ronda del poniente', '19', 'Malaga', 'España', 29591, 666666666, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-15', '2018-06-12', 4),
(23, '120180615181948', 1, 'David', 'Martin', '77659384E', 'avendiade', '19', 'madrid', 'malaga', 398, 66666666, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-15', NULL, 1),
(24, '120180615182244', 1, 'David', 'Martin', '77659384E', 'avendiade', '19', 'madrid', 'malaga', 398, 66666666, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-15', NULL, 1),
(25, '120180615182308', 1, 'David', 'Martin', '77659384E', 'avendiade', '19', 'madrid', 'malaga', 398, 66666666, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-15', NULL, 1),
(26, '120180617101043', 1, 'David', 'Martin', '66598745', 'c/ Ronda del poniente', '19', 'Malaga', 'Malaga', 29591, 615780174, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-17', '2018-06-17', 4),
(27, '120180617101052', 1, 'David', 'Martin', '66598745', 'c/ Ronda del poniente', '19', 'Malaga', 'Malaga', 29591, 615780174, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-17', '2018-06-17', 4),
(28, '120180617101421', 1, 'David', 'Martin', '66598745', 'c/ Ronda del poniente', '19', 'Malaga', 'Malaga', 29591, 615780174, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-17', '2018-06-17', 4),
(29, '120180617101744', 1, 'david', 'david', '4545465', 'david', '57485', 'david', 'david', 545, 548578, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-17', '2018-06-18', 3),
(30, '120180617154502', 1, 'David', 'Martin', '77659385R', 'Ronda del mejillon', '19', 'Málaga', 'Cataluña', 29598, 615780475, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-17', NULL, 2),
(31, '1820180619102944', 18, 'Prueba', 'Prueba', '77659884E', 'Calle pepinillo', '19', 'Madrid', 'Spaña', 29591, 615780174, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-19', '2018-06-19', 3),
(32, '1820180619103055', 18, 'Prueba2', 'Prueba2', '77659284E', 'calle vendedor', '19', 'madrid', 'comunidad', 29591, 614780174, 'correos', NULL, NULL, NULL, NULL, NULL, '2018-06-19', '2018-06-19', 4);

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
(5, 'n3DS'),
(7, 'XONE'),
(8, 'Accesorios'),
(9, 'WIIU'),
(10, 'Reservar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoscomprados`
--

CREATE TABLE `productoscomprados` (
  `idPedido` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL COMMENT 'Precio en el que estaba el producto el dia que lo compro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productoscomprados`
--

INSERT INTO `productoscomprados` (`idPedido`, `idProducto`, `cantidad`, `precio`) VALUES
(1, 33, 1, 30),
(1, 33, 1, 30),
(1, 31, 1, 22),
(1, 52, 2, 60),
(14, 33, 1, 30),
(14, 31, 1, 22),
(14, 52, 2, 60),
(15, 33, 1, 30),
(15, 31, 1, 22),
(15, 52, 2, 60),
(16, 33, 1, 30),
(16, 31, 1, 22),
(16, 52, 2, 60),
(17, 57, 1, 30),
(17, 51, 1, 33),
(17, 33, 1, 30),
(18, 57, 1, 30),
(18, 51, 1, 33),
(18, 33, 1, 30),
(19, 57, 1, 30),
(19, 51, 1, 33),
(19, 33, 1, 30),
(20, 57, 1, 30),
(20, 51, 1, 33),
(20, 33, 1, 30),
(21, 51, 1, 33),
(21, 57, 1, 30),
(22, 32, 1, 30),
(23, 32, 1, 30),
(24, 32, 1, 30),
(25, 32, 1, 30),
(26, 32, 2, 30),
(26, 31, 1, 22),
(26, 50, 1, 22),
(27, 32, 2, 30),
(27, 31, 1, 22),
(27, 50, 1, 22),
(28, 32, 2, 30),
(28, 31, 1, 22),
(28, 50, 1, 22),
(29, 32, 2, 30),
(29, 31, 1, 22),
(29, 50, 1, 22),
(30, 62, 1, 55),
(31, 62, 1, 55),
(32, 72, 1, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(20) NOT NULL,
  `nombreUsuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `contrasena` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
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
(1, 'david', '172522ec1028ab781d9dfd17eaca4427', 'David', 'Martin Perez', NULL, 'c/Pepito Grillo', 670707070, '823674872164', 0, '0000-00-00', '2018-06-19'),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrador', NULL, NULL, NULL, NULL, NULL, 1, '0000-00-00', '2018-06-19'),
(6, 'pepe', '926e27eecdbc7a18858b3798ba99bddd', '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(14, 'mama', 'eeafbf4d9b3957b139da7b7f2e7f2d4a', '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(15, 'asdasdasd', 'a3dcb4d229de6fde0db5686dee47145d', '', NULL, NULL, NULL, NULL, NULL, 0, '2018-06-15', NULL),
(16, 'hola123', '9450476b384b32d8ad8b758e76c98a69', '', NULL, NULL, NULL, NULL, NULL, 0, '2018-06-15', '2018-06-15'),
(17, 'david12', 'b45e56ac3a1afe3e1e52292702a04dd9', '', NULL, NULL, NULL, NULL, NULL, 0, '2018-06-17', '2018-06-17'),
(18, 'prueba', 'c893bad68927b457dbed39460e6afd62', '', NULL, NULL, NULL, NULL, NULL, 0, '2018-06-19', '2018-06-19');

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
  `ventas` int(11) NOT NULL DEFAULT '0',
  `fechaSalida` date NOT NULL,
  `activo` tinyint(1) NOT NULL COMMENT 'Bolean de activo o deshabilitado',
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `versionjuego`
--

INSERT INTO `versionjuego` (`idVersion`, `idJuego`, `idPlataforma`, `idEdicion`, `idDistribuidora`, `precio`, `stock`, `ventas`, `fechaSalida`, `activo`, `img`) VALUES
(25, 3, 4, 4, 6, 55, 30, 1, '2018-02-28', 1, 'kh1.png'),
(31, 13, 2, 5, 3, 22, 26, 15, '2018-02-08', 0, 'bayo1+2nsw.png'),
(32, 13, 3, 5, 3, 30, 22, 35, '2018-02-16', 1, 'bayo1+2nsw.png'),
(33, 14, 3, 5, 3, 30, 30, 1, '2018-02-16', 1, 'bayo1+2nsw.png'),
(50, 3, 4, 1, 4, 22, 26, 54, '2018-02-28', 0, 'kh1.png'),
(51, 15, 3, 1, 2, 33, 30, 1, '2018-12-20', 1, 'cbnsw.png'),
(52, 15, 2, 1, 2, 60, 30, 2, '2018-02-15', 1, 'cbps4.png'),
(53, 12, 5, 3, 3, 20, 30, 1, '2018-02-28', 1, 'acrosi3ds.png'),
(54, 3, 2, 7, 6, 50, 30, 1, '2018-02-28', 1, 'kh1.png'),
(55, 8, 2, 3, 3, 60, 30, 1, '2018-02-28', 1, 'kh2.8.png'),
(56, 10, 2, 2, 6, 50, 30, 1, '2018-02-28', 1, 'ffxvps4.png'),
(57, 12, 3, 6, 3, 30, 30, 1, '2019-07-25', 0, NULL),
(58, 8, 3, 4, 4, 22, 30, 1, '2018-03-21', 1, 'kh2.png'),
(59, 1, 7, 3, 5, 65, 0, 1, '2018-05-16', 1, 'FIFA18xbox.png'),
(62, 51, 3, 1, 3, 55, 94, 152, '2018-06-16', 1, 'splatoon2.png'),
(63, 46, 3, 1, 3, 60, 100, 0, '2018-06-16', 1, 'xenoblade2dlc.png'),
(64, 52, 2, 10, 1, 145, 40, 0, '2018-10-19', 1, 'sc6edColletionps4.png'),
(65, 52, 7, 10, 1, 145, 0, 300, '2018-06-23', 1, 'sc6edColletionxbox.png'),
(66, 52, 2, 1, 1, 64, 50, 0, '2018-06-21', 1, 'sc6ps4.png'),
(67, 52, 7, 1, 1, 55, 50, 0, '2018-06-22', 1, 'sc6xbox.png'),
(68, 33, 2, 1, 1, 55, 55, 0, '2018-06-22', 1, 're2ps4.png'),
(69, 33, 7, 1, 1, 54, 65, 0, '2018-06-20', 1, 're2xo.png'),
(70, 47, 3, 1, 3, 45, 50, 0, '2018-07-01', 1, 'mariopartynsw.png'),
(71, 53, 1, 1, 1, 55, 55, 0, '2018-06-17', 1, 'wolfesteinnsw.png'),
(72, 53, 4, 1, 1, 30, 32, 36, '2018-06-23', 1, 'wolfesteinpc.png'),
(73, 53, 2, 1, 1, 44, 44, 0, '2018-06-28', 1, 'wolfesteinps4.png'),
(74, 53, 7, 1, 1, 40, 20, 0, '2018-06-27', 1, 'wolfesteinxo.png'),
(75, 54, 3, 1, 3, 55, 30, 0, '2018-12-28', 1, 'ssbnsw.png'),
(76, 55, 3, 12, 3, 55, 30, 0, '2018-06-23', 1, 'pokelesteevee.png'),
(77, 55, 3, 11, 3, 55, 55, 0, '2018-08-17', 1, 'pokelestpika.png'),
(78, 56, 2, 5, 2, 55, 55, 0, '2018-11-21', 1, 'spidyEspecial.png'),
(79, 57, 4, 1, 5, 55, 25, 0, '2018-06-30', 1, 'anthempc.png'),
(80, 58, 4, 1, 1, 15, 55, 0, '2018-06-29', 1, 'fallout76pc.png'),
(81, 58, 2, 1, 1, 75, 75, 0, '2018-06-30', 1, 'fallout76ps4.png'),
(82, 58, 7, 1, 1, 50, 25, 0, '2018-06-23', 1, 'fallout76xo.png'),
(83, 60, 2, 1, 1, 55, 55, 0, '2018-05-09', 1, 'sekirops4.png'),
(84, 60, 4, 1, 1, 55, 55, 0, '2018-06-30', 1, 'sekiropc.png'),
(85, 60, 7, 1, 1, 45, 45, 0, '2018-09-14', 1, 'sekiroxo.png'),
(86, 59, 7, 1, 1, 55, 35, 0, '2018-06-30', 1, 'dkxo.png'),
(87, 59, 2, 1, 1, 45, 45, 0, '2018-07-19', 1, 'dkps4.png'),
(88, 59, 3, 1, 1, 55, 55, 0, '2018-07-12', 1, 'dknsw.png');

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
(3, 'Kingdom Hearts I.5', 'Sora y sus amigos'),
(8, 'Kingdom Hearts II.5', 'Sora y sus amigos 2'),
(10, 'Final Fantasy XV', 'La última entrega de final fanatsy'),
(11, 'Final Fantasy XII', 'La era del cambio para Final Fantasy.'),
(12, 'Animal Crossing', 'Cuida de tu pueblo'),
(13, 'Bayonetta 1+2', 'La bruja que conmovió a Shakespeare'),
(14, 'Bayonetta 2', 'La bruja viene con ganas de más...'),
(15, 'Crash Bandicoot INSANE TRIALOGY', 'Crash bandicoot vuelve la nueva generación con ganas de saltar más y correr menos.'),
(16, 'Pokemon Star', 'Mas falso que tu'),
(17, 'Kingdom Hearts III', 'Nuevo juego de Sora y sus amigos... tras 6 años de espera...'),
(19, 'League of legends', '¡El MOBA con más jugadores, entretenido y con 150+ campeones para elegir!'),
(21, 'Pokemon Rojo', 'Capturas tu pokemon favoriotos!!'),
(23, 'Final Fantasy 15', 'asdasdasdasdasdasd'),
(31, 'Final Fantasy VII', 'El nuevo y esperado remake del mejor juego de la saga para muchos!'),
(32, 'Death Stranding', 'El nuevo juego de \"Hideo Kojima\" del cual nos fascina y a la vez nos intriga saber de que tratará'),
(33, 'Resident Evil 2', 'El nuevo remake que cautivo a todo el mundo en el E32018.'),
(34, 'Resident evil 7', '¡Vuelta a sus inicios de juego terrorífico en una casa maldita!'),
(36, 'Assassins Creed Odyssey', 'Escribe tu propia Odisea legendaria y vive asombrosas aventuras en un mundo en que cada decisión cuenta con Assassin´s Creed Odyssey para PlayStation 4 y Xbox One. Sentenciado a muerte por tu propia familia, embárcate en un viaje épico en el que dejarás d'),
(37, 'FORZA HORIZON 4', 'Por primera vez en el género de carreras y conducción, disfruta de estaciones dinámicas en un mundo abierto compartido. Explora escenas hermosas, colecciona más de 450 coches y conviértete en superestrella Horizon en la Gran Bretaña histórica.'),
(38, 'RED DEAD REDEMPTION II', 'Caballo de Guerra: siempre podrás confiar en este magnífico ardenner gris hierro. Con más coraje y resistencia que los ejemplares normales, este es un caballo que sabe comportarse en el fragor de la batalla.'),
(39, 'DEAD RISING 4', '¡Oh! ¡La navidad! Tiempo de paz, amor y desmembramientos masivos. Dieciséis años después de vivir el primer estallido zombi en Willamette, el fotoperiodista Frank West regresa a Colorado para desenmascarar una conspiración gubernamental responsable de un '),
(40, 'THE LAST OF US REMASTERED', 'El juego que ha cautivado tanto a crítica como a millones de jugadores llega a PlayStation 4. Si jugaste a la versión anterior, disfruta con sus novedades y su lavado de cara gráfico mientras vives de nuevo la intensa aventura de Joel y Ellie. Si no pudis'),
(41, 'THE ORDER 1886', 'Esta no es la historia que conoces.\n\nDurante siglos, una orden de caballeros ha resistido contra un enemigo inhumano que había tratado de extinguir la humanidad. Ahora, en el año 1886, armados y con tecnología avanzada, estos agentes deben hacer frente a '),
(42, 'GEARS OF WAR 5', 'Los Locust cayeron. La guerra acabó. El planeta Sera quedó en paz… pero los engranajes de la guerra continuaron en movimiento. The Coalition, el nuevo estudio de Microsoft, traslada a la nueva generación una de las sagas más importantes de Xbox en Gears o'),
(43, 'HALO INFINITE', 'Reserva ya Halo Infinite en exclusiva para Xbox One. Fecha de lanzamiento y contenido por confirmar'),
(44, 'HALO WARS 2', 'La UNSC Spirit of Fire vuelve a estar en peligro. La adaptación del universo Halo a la estrategia en tiempo real regresa con Halo Wars 2 para Xbox One enfrentando al Capitán Cutter y su tripulación a un nuevo y terrorífico enemigo: The Banished. Toma el c'),
(45, 'HALO: THE MASTER', '*Halo 2: Anniversary - Voces y subtítulos en inglés.\n\nPor primera vez, toda la saga del Jefe Maestro en una única consola. Incluye una versión completamente remasterizada de Halo 2: Anniversary, Halo: Combat Evolved Anniversary, Halo 3, Halo 4, la nueva s'),
(46, 'XENOBLADE CHRONICLES 2: TORNA THE GOLDEN COUNTRY', 'En este nuevo modo, descubrirás la historia de Jin y la caída en desgracia de su tierra 500 años antes de los acontecimientos de Xenoblade Chronicles 2. El nuevo y refinado sistema de combate permite controlar a Pilotos y Blades mientras exploras un nuevo'),
(47, 'SUPER MARIO PARTY', 'El juego de mesa original sube el listón con elementos de estrategia más profunda, como dados específicos para cada personaje. También cuenta con nuevas formas de jugar, incluidos minijuegos manejados con los Joy-Con y nuevos modos para disfrutar con la f'),
(48, 'TALES OF VESPERIA', 'Tales Of Vesperia Definitive Edition para PlayStation 4, Xbox One y Nintendo Switch, incluirá el contenido de Tales Of Vesperia de PlayStation 3 que en exclusiva para Japón añadía nuevos personajes, eventos y muchas sorpresas más. Gráficos mejorados, text'),
(49, 'METROID PRIME 4', 'a saga Prime suma un nuevo capítulo con Metroid Prime 4 para Nintendo Switch. Equípate para la ocasión, prepara tus armas y habilidades y acompaña a Samus en esta nueva entrega de una de las sagas más celebradas y queridas por público y crítica. Una nueva'),
(50, 'THE LEGEND OF ZELDA: BREATH OF THE WILD', 'Cinco años después de la última entrega original para sobremesa, el futuro de la serie The Legend of Zelda llega a Nintendo Switch y Wii U replanteando por completo las bases de la saga. Producido por Eiji Aonuma, The Legend of Zelda: Breath of the Wild t'),
(51, 'SPLATOON 2', '¡El exitoso Splatoon estrena una segunda entrega! Los combates territoriales de cuatro contra cuatro vuelven cargados de novedades, con escenarios, prendas y armas inéditos, como el Lanzatintas doble. Se puede jugar tanto en el televisor como fuera de cas'),
(52, 'Soul Calibur VI', 'Afila las espadas, ponte la armadura y prepárate para luchar con SoulCalibur VI para PlayStation 4 y Xbox One, el título que definió los juegos de lucha con armas en 3D, ha vuelto. Dos décadas después de la primera entrega, SoulCalibur VI vuelve a sus raí'),
(53, 'Wolfestein II - The new Colossus', 'Wolfenstein II de MachineGames para Nintendo Switch te encomienda una misión para liberar América de los nazis. Solo tú tienes las agallas y las armas necesarias para desencadenar la 2.ª revolución am'),
(54, 'SUPER SMASH BROS ULTIMATE', '¿Puede Link derrotar a Mario? ¿Puede Yoshi tumbar a Donkey Kong?'),
(55, 'POKÉMON LETS GO', 'Para los amantes de pokemon go '),
(56, 'MARVELS SPIDER-MAN', 'Marvel e Insomniac Games se han unido para crear una historia de Spider-Man completamente nueva y auténtica. Este no es el Spider-Man que conocías ni el que has visto en las pelis, es un Peter Parker experimentado que domina mucho más la lucha contra la d'),
(57, 'ANTHEM', 'Héroes unidos para vencer unidos\n\nEl corazón de Anthem es una experiencia social conectada. Forma equipo con hasta tres jugadores en aventuras cooperativas que recompensan el trabajo en equipo y la habilidad individual. La elección de la Alabarda de cada '),
(58, 'FALLOUT 76', 'Bethesda Game Studios, galardonado creador de The Elder Scrolls V: Skyrim y Fallout 4, presenta Fallout 76 para PlayStation 4, Xbox One y PC.'),
(59, 'Dark Souls Remasters', 'Re-experimenta el juego definidor del género aclamado por la crítica que comenzó todo. Vuelve Dark Souls bellamente remasterizado para PlayStation 4, Xbox One y Nintendo Switch. Regresa a un Lordran increíblemente detallado. Dark Souls: Remastered marca e'),
(60, 'SEKIRO - SHADOWS DIE TWICE', 'Tu muerte no será sencilla. Prepárate para Sekiro: Shadows Die Twice para PlayStation 4, Xbox One y PC. Adéntrate en el mundo de finales de 1500, la era Sengoku en Japón; un periodo brutal y sangriento en constante conflicto entre la vida y la muerte. A m');

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
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`idMesaje`),
  ADD KEY `iduser` (`idUser`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `pedido-estado` (`idEstado`);

--
-- Indices de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`idPlataforma`);

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
  MODIFY `idEdicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `idMesaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  MODIFY `idPlataforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `versionjuego`
--
ALTER TABLE `versionjuego`
  MODIFY `idVersion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `videojuego`
--
ALTER TABLE `videojuego`
  MODIFY `idJuego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `iduser` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido-estado` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`),
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

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
