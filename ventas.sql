-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-01-2015 a las 15:20:00
-- Versión del servidor: 5.5.40-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierre`
--

CREATE TABLE IF NOT EXISTS `cierre` (
  `idcierre` int(11) NOT NULL AUTO_INCREMENT,
  `descri` varchar(45) NOT NULL,
  `saldoanterior` int(11) NOT NULL,
  `entradas` int(11) NOT NULL,
  `salidas` int(11) NOT NULL,
  `caja` int(11) NOT NULL,
  `saldoactual` int(11) NOT NULL,
  `importeretirar` int(11) NOT NULL,
  `cambio` int(11) NOT NULL,
  `fechain` date NOT NULL,
  `fechafin` date NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcierre`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `cierre`
--

INSERT INTO `cierre` (`idcierre`, `descri`, `saldoanterior`, `entradas`, `salidas`, `caja`, `saldoactual`, `importeretirar`, `cambio`, `fechain`, `fechafin`, `estado`) VALUES
(1, 'alexdeveloper', 0, 0, 0, 0, 0, 0, 0, '2014-09-02', '2014-09-02', 1),
(2, 'alexdeveloper', 0, 0, 0, 0, 0, 0, 2, '2014-09-02', '2014-09-02', 1),
(3, 'ALEXDEVELOPER', 2, 0, 0, 339500, 339502, 200000, 139502, '2014-09-02', '2014-09-04', 1),
(4, 'ALEXDEVELOPER', 139502, 0, 0, 82000, 221502, 200000, 21502, '2014-09-04', '2014-09-04', 1),
(5, 'ALEXDEVELOPER', 21502, 0, 0, 82000, 103502, 12000, 91502, '2014-09-04', '2014-09-04', 1),
(6, 'ALEXDEVELOPER', 91502, 0, 0, 82000, 173502, 12000, 161502, '2014-09-04', '2014-09-04', 1),
(7, 'ALEXDEVELOPER', 161502, 0, 0, 82000, 243502, 120, 243382, '2014-09-04', '2014-09-04', 1),
(8, 'ALEXDEVELOPER', 243382, 0, 0, 82000, 325382, 12000, 313382, '2014-09-04', '2014-09-04', 1),
(9, 'ALEXDEVELOPER', 313382, 0, 0, 82000, 395382, 12000, 383382, '2014-09-04', '2014-09-04', 1),
(10, 'ALEXDEVELOPER', 383382, 0, 0, 82000, 465382, 12000, 453382, '2014-09-04', '2014-09-04', 1),
(11, 'ALEXDEVELOPER', 453382, 0, 0, 82000, 535382, 12000, 523382, '2014-09-04', '2014-09-04', 1),
(12, 'ALEXDEVELOPER', 523382, 0, 0, 82000, 605382, 12000, 593382, '2014-09-04', '2014-09-04', 1),
(13, 'ALEXDEVELOPER', 593382, 0, 0, 82000, 675382, 23000, 652382, '2014-09-04', '2014-09-04', 1),
(14, 'ALEXDEVELOPER', 652382, 0, 0, 82000, 734382, 10000, 724382, '2014-09-04', '2014-09-04', 1),
(15, 'ALEXDEVELOPER', 724382, 0, 0, 82000, 806382, 200000, 606382, '2014-09-04', '2014-09-04', 1),
(16, 'ALEXDEVELOPER', 606382, 0, 0, 82000, 688382, 300000, 388382, '2014-09-04', '2014-09-04', 1),
(17, 'ALEXDEVELOPER', 388382, 0, 0, 82000, 470382, 25000, 445382, '2014-09-04', '2014-09-04', 1),
(18, 'ALEXDEVELOPER', 445382, 0, 0, 82000, 527382, 400000, 127382, '2014-09-04', '2014-09-04', 1),
(19, 'ALEXDEVELOPER', 127382, 0, 0, 0, 127382, 100000, 27382, '2014-09-04', '2014-09-04', 1),
(20, 'ALEXDEVELOPER', 27382, 0, 25000, 135000, 137382, 125000, 12382, '2014-09-04', '2014-09-05', 1),
(21, 'ALEXDEVELOPER', 12382, 0, 0, 45000, 57382, 20000, 37382, '2014-09-05', '2014-09-10', 1),
(22, 'ALEXDEVELOPER', 37382, 357000, 207000, 219000, 406382, 300000, 106382, '2014-09-10', '2014-09-10', 1),
(23, 'ALEXDEVELOPER', 106382, 0, 0, 362500, 468882, 200000, 268882, '2014-09-10', '2014-09-23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `codcli` int(9) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `ruc` varchar(15) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`codcli`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codcli`, `nombre`, `direccion`, `ruc`, `telefono`) VALUES
(6, 'OCASIONAL', 'DIRECCION 1', '1234567', '0970000000'),
(14, 'CLIENTE 1', 'DIRECCION 2', '11111111', '0980000000'),
(12, 'CLIENTE 2', 'DIRECCION 3', '22222222', '0990000000'),
(16, 'CLIENTE 3', 'DIRECCION 4', '33333333', '0960000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `idcom` int(9) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `concepto` varchar(45) NOT NULL,
  `nro` varchar(20) NOT NULL,
  `monto` int(9) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idcom`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idcom`, `fecha`, `descripcion`, `concepto`, `nro`, `monto`, `estado`) VALUES
(1, '2014-07-02', 'EGRESOS 1', 'CONCEPTO 1', '001-002-0000000', 20000, 1),
(3, '2014-07-30', 'EGRESOS 2', 'CONCEPTO 2', '001-002-0000300', 30000, 1),
(4, '2014-08-01', 'EGRESOS 3', 'CONCEPTO 3', '001-002-0000000', 70000, 1),
(6, '2014-09-03', 'EGRESOS 4', 'CONCEPTO 4', '001-001-000023', 50000, 1),
(7, '2014-09-05', 'EGRESOS 5', 'CONCEPTO 5', '001-001-0000021', 25000, 1),
(9, '2014-09-10', 'EGRESOS 6', 'CONCEPTO 6', '001-001-000000', 12000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE IF NOT EXISTS `ingresos` (
  `idcom` int(9) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `concepto` varchar(45) NOT NULL,
  `nro` varchar(20) NOT NULL,
  `monto` int(9) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idcom`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`idcom`, `fecha`, `descripcion`, `concepto`, `nro`, `monto`, `estado`) VALUES
(1, '2014-07-02', 'INGRESO 1', 'CONCEPTO 1', '001-002-0000000', 20000, 1),
(3, '2014-07-30', 'INGRESO 2', 'CONCEPTO 2', '001-002-0000300', 30000, 1),
(4, '2014-08-01', 'INGRESO 3', 'CONCEPTO 3', '001-002-0000000', 70000, 1),
(5, '2014-09-03', 'INGRESO 4', 'CONCEPTO 4', '001-001-0000023', 150000, 1),
(6, '2014-09-03', 'INGRESO 5', 'CONCEPTO 5', '001-001-000023', 50000, 1),
(7, '2014-09-05', 'INGRESO 6', 'CONCEPTO 6', '001-001-0000021', 25000, 1),
(9, '2014-09-10', 'INGRESO 7', 'CONCEPTO 7', '001-001-000000', 12000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itemventa`
--

CREATE TABLE IF NOT EXISTS `itemventa` (
  `codven` int(9) NOT NULL AUTO_INCREMENT,
  `item` varchar(15) NOT NULL,
  `codprod` int(9) NOT NULL,
  `cantidad` int(2) NOT NULL,
  `precio` int(9) NOT NULL,
  `id` int(8) NOT NULL,
  PRIMARY KEY (`codven`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=149 ;

--
-- Volcado de datos para la tabla `itemventa`
--

INSERT INTO `itemventa` (`codven`, `item`, `codprod`, `cantidad`, `precio`, `id`) VALUES
(1, 'empanada', 1, 2, 2500, 0),
(2, 'lomito', 4, 1, 15000, 0),
(3, 'tarta', 2, 1, 45000, 0),
(4, 'empanada', 1, 1, 2500, 0),
(5, 'lomito', 4, 1, 15000, 0),
(6, 'tarta', 2, 1, 45000, 0),
(7, 'empanada', 1, 1, 2500, 0),
(8, 'lomito', 4, 1, 15000, 0),
(9, 'tarta', 2, 1, 45000, 0),
(10, 'empanada', 1, 1, 2500, 0),
(11, 'lomito', 4, 1, 15000, 0),
(12, 'tarta', 2, 1, 45000, 0),
(13, 'empanada', 1, 1, 2500, 0),
(14, 'postre', 6, 1, 2500, 0),
(15, 'lomito', 4, 1, 15000, 0),
(16, 'tarta', 2, 1, 45000, 0),
(17, 'empanada', 1, 1, 2500, 0),
(18, 'postre', 6, 1, 2500, 0),
(59, 'lomito', 4, 1, 15000, 0),
(60, 'empanada', 1, 1, 2500, 0),
(61, 'empanada', 1, 1, 2500, 0),
(62, 'empanada', 1, 1, 2500, 62),
(63, 'tarta', 2, 1, 45000, 62),
(64, 'lomito', 4, 1, 15000, 63),
(65, 'postre', 6, 2, 2500, 64),
(66, 'pizza mediana', 5, 1, 30000, 65),
(67, 'lomito', 4, 1, 15000, 66),
(68, 'tarta', 2, 1, 45000, 67),
(69, 'lomito', 4, 1, 15000, 68),
(70, 'pizza mediana', 5, 1, 30000, 69),
(71, 'postre', 6, 1, 2500, 70),
(72, 'lomito', 4, 1, 15000, 71),
(73, 'empanada', 1, 1, 2500, 72),
(74, 'lomito', 4, 1, 15000, 73),
(75, 'lomito', 4, 1, 15000, 74),
(76, 'tarta', 2, 1, 45000, 75),
(77, 'tarta', 2, 1, 45000, 76),
(78, 'lomito', 4, 1, 15000, 77),
(79, 'empanada', 1, 1, 2500, 78),
(80, 'empanada', 1, 1, 2500, 79),
(81, 'empanada', 1, 1, 2500, 80),
(82, 'lomito', 4, 1, 15000, 81),
(83, 'postre', 6, 1, 2500, 82),
(84, 'empanada napoli', 9, 1, 2500, 83),
(85, 'empanada', 1, 1, 2500, 84),
(86, 'lomito', 4, 1, 15000, 85),
(87, 'empanada', 1, 1, 2500, 86),
(88, 'empanada', 1, 1, 2500, 87),
(89, 'postre', 6, 2, 2500, 87),
(90, 'empanada', 1, 1, 2500, 88),
(91, 'postre', 6, 2, 2500, 88),
(92, 'empanada', 1, 1, 2500, 89),
(93, 'postre', 6, 2, 2500, 89),
(94, 'empanada', 1, 1, 2500, 90),
(95, 'postre', 6, 2, 2500, 90),
(96, 'lomito', 4, 1, 15000, 91),
(97, 'tarta', 2, 1, 45000, 92),
(98, 'lomito', 4, 1, 15000, 92),
(99, 'empanada queso', 8, 1, 2500, 92),
(100, 'lomito', 4, 0, 15000, 93),
(101, 'tarta', 2, 1, 45000, 94),
(102, 'tarta', 2, 1, 45000, 96),
(103, 'pizza mediana', 5, 11, 30000, 98),
(104, 'lomito', 4, 3, 15000, 99),
(105, 'empanada jamon', 7, 3, 2500, 99),
(106, 'empanada napoli', 9, 4, 2500, 99),
(107, 'demo', 10, 3, 5000, 99),
(108, 'pizza mediana', 5, 3, 30000, 100),
(109, 'postre', 6, 9, 2500, 100),
(110, 'lomito', 4, 7, 15000, 100),
(111, 'tarta', 2, 10, 45000, 100),
(112, 'lomito', 4, 1, 15000, 101),
(113, 'lomito', 4, 3, 15000, 102),
(114, 'tarta', 2, 1, 45000, 103),
(115, 'lomito', 4, 1, 15000, 104),
(116, 'tarta', 2, 1, 45000, 104),
(117, 'pizza mediana', 5, 1, 30000, 105),
(118, 'Pizza mediana', 5, 3, 30000, 106),
(119, 'EMPANADA NAPOLI', 9, 1, 2500, 107),
(120, 'TARTA', 2, 3, 45000, 108),
(121, 'PIZZA MEDIANA', 5, 1, 30000, 109),
(122, 'HELADO FRUTILLA', 11, 1, 3000, 109),
(123, 'COBERTURA', 12, 1, 1500, 109),
(124, 'TARTA', 2, 1, 45000, 110),
(125, 'POSTRE', 6, 1, 2500, 111),
(126, 'PIZZA MEDIANA', 5, 3, 30000, 112),
(127, 'TARTA', 2, 1, 45000, 113),
(128, 'TARTA', 2, 1, 45000, 114),
(129, 'LOMITO', 4, 1, 15000, 115),
(130, 'TARTA', 2, 3, 45000, 116),
(131, 'HELADO FRUTILLA', 11, 3, 3000, 117),
(132, 'LOMITO', 4, 1, 15000, 118),
(133, 'LOMITO', 4, 1, 15000, 119),
(134, 'PIZZA MEDIANA', 5, 1, 30000, 120),
(135, 'EMPANADA', 1, 1, 2500, 121),
(136, 'TARTA', 2, 1, 45000, 121),
(137, 'EMPANADA NAPOLI', 9, 1, 2500, 122),
(138, 'EMPANADA QUESO', 8, 1, 2500, 122),
(139, 'TARTA', 2, 6, 45000, 123),
(140, 'PIZZA MEDIANA', 5, 1, 30000, 124),
(141, 'EMPANADA NAPOLI', 9, 1, 2500, 124),
(142, 'EMPANADA', 1, 1, 2500, 125),
(143, 'EMPANADA', 1, 1, 2500, 125),
(144, 'EMPANADA JAMON', 7, 1, 2500, 125),
(145, 'HAMBURGUER', 1, 1, 2500, 126),
(146, 'ESPECIAL POLLO', 6, 1, 2500, 126),
(147, 'CHEESEBURGUER', 2, 2, 45000, 127),
(148, 'HAMBURGUER', 1, 1, 2500, 128);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedars`
--

CREATE TABLE IF NOT EXISTS `monedars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `cambio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `monedars`
--

INSERT INTO `monedars` (`id`, `fecha`, `cambio`) VALUES
(1, '2014-10-08', 1850);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedaus`
--

CREATE TABLE IF NOT EXISTS `monedaus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `cambio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `monedaus`
--

INSERT INTO `monedaus` (`id`, `fecha`, `cambio`) VALUES
(1, '2014-10-08', 4550);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `codnivel` int(2) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(8) NOT NULL,
  PRIMARY KEY (`codnivel`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`codnivel`, `descripcion`) VALUES
(1, 'admin'),
(2, 'otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nrovent`
--

CREATE TABLE IF NOT EXISTS `nrovent` (
  `idnro` int(2) NOT NULL AUTO_INCREMENT,
  `descri` varchar(8) NOT NULL,
  `nro` int(8) NOT NULL,
  PRIMARY KEY (`idnro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `nrovent`
--

INSERT INTO `nrovent` (`idnro`, `descri`, `nro`) VALUES
(1, 'numero', 129);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `codpro` int(9) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `precio` int(9) NOT NULL,
  `cbarras` varchar(30) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codpro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codpro`, `descripcion`, `cantidad`, `precio`, `cbarras`) VALUES
(1, 'HAMBURGUER', 1, 2500, '1'),
(2, 'CHEESEBURGUER', 1, 45000, '012'),
(4, 'SENCILLA DE CARNE', 1, 15000, '2'),
(5, 'ESPECIAL DE CARNE', 1, 30000, '3'),
(6, 'ESPECIAL POLLO', 1, 2500, '4'),
(7, 'VEGETARIANA', 1, 2500, '5'),
(8, 'CARNE JR', 1, 2500, '1'),
(9, 'JAMON EXTRA', 1, 2500, '1'),
(11, 'QUESO EXTRA', 1, 3000, '1'),
(12, 'PAPAS FRANCESA', 1, 1500, '1'),
(13, 'ARTICULO 12', 1, 26000, '7791290009325 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE IF NOT EXISTS `tienda` (
  `idti` int(2) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`idti`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`idti`, `descripcion`, `direccion`, `telefono`) VALUES
(1, 'MercoTech S.R.L', 'Ciudad Del Este', '000-000-000');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `totalmes`
--
CREATE TABLE IF NOT EXISTS `totalmes` (
`suma` bigint(21)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codusu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  `correo` varchar(15) NOT NULL,
  `user` varchar(8) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `tipo` int(1) NOT NULL,
  PRIMARY KEY (`codusu`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codusu`, `nombre`, `correo`, `user`, `pass`, `tipo`) VALUES
(1, 'ADMIN', 'nad@a.com', 'adm', 'adm123', 1),
(3, 'DEMO', 'da@d.com', 'demo', '1234', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `codven` int(9) NOT NULL,
  `fecha` date NOT NULL,
  `cliente` int(9) NOT NULL,
  `total` int(9) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codven`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`codven`, `fecha`, `cliente`, `total`, `estado`) VALUES
(1, '2014-06-09', 16, 20000, 1),
(42, '2014-07-09', 6, 0, 1),
(43, '2014-07-09', 6, 60000, 1),
(45, '2014-07-09', 6, 60000, 1),
(46, '2014-07-09', 14, 60000, 1),
(47, '2014-07-09', 6, 60000, 1),
(48, '2014-07-09', 12, 60000, 1),
(49, '2014-07-09', 6, 60000, 1),
(50, '2014-07-09', 16, 60000, 1),
(51, '2014-07-09', 6, 60000, 1),
(52, '2014-07-09', 6, 60000, 1),
(53, '2014-07-10', 6, 5000, 1),
(54, '2014-07-11', 6, 62500, 1),
(55, '2014-07-11', 6, 62500, 1),
(56, '2014-07-11', 6, 62500, 1),
(57, '2014-07-11', 16, 65000, 1),
(58, '2014-07-11', 14, 65000, 1),
(59, '2014-07-11', 6, 65000, 1),
(60, '2014-07-11', 14, 47500, 1),
(61, '2014-07-11', 14, 47500, 1),
(62, '2014-07-11', 6, 47500, 1),
(63, '2014-07-14', 6, 15000, 1),
(64, '2014-07-14', 16, 5000, 1),
(65, '2014-07-14', 6, 30000, 1),
(66, '2014-07-14', 16, 15000, 1),
(67, '2014-07-15', 6, 45000, 1),
(68, '2014-08-01', 12, 15000, 1),
(69, '2014-08-01', 16, 30000, 1),
(70, '2014-08-06', 6, 2500, 1),
(71, '2014-08-06', 12, 15000, 1),
(72, '2014-08-06', 12, 2500, 1),
(73, '2014-08-06', 6, 15000, 1),
(74, '2014-08-06', 12, 15000, 1),
(75, '2014-08-06', 16, 45000, 1),
(76, '2014-08-06', 6, 45000, 1),
(77, '2014-08-06', 6, 15000, 1),
(78, '2014-08-06', 12, 2500, 1),
(79, '2014-08-06', 6, 2500, 1),
(80, '2014-08-06', 14, 2500, 1),
(81, '2014-08-06', 16, 15000, 1),
(82, '2014-08-06', 12, 2500, 1),
(83, '2014-08-06', 16, 2500, 1),
(84, '2014-08-06', 16, 2500, 1),
(85, '2014-08-11', 14, 15000, 1),
(86, '2014-08-11', 16, 2500, 1),
(87, '2014-08-11', 6, 7500, 1),
(88, '2014-08-11', 6, 7500, 1),
(89, '2014-08-11', 6, 7500, 1),
(90, '2014-08-11', 6, 7500, 1),
(91, '2014-08-11', 12, 15000, 1),
(92, '2014-08-11', 6, 62500, 1),
(93, '2014-08-12', 6, 0, 1),
(94, '2014-08-13', 6, 45000, 1),
(95, '2014-08-20', 6, 0, 1),
(96, '2014-08-20', 6, 45000, 1),
(97, '2014-08-20', 6, 0, 1),
(98, '2014-08-28', 16, 330000, 1),
(99, '2014-08-28', 12, 77500, 1),
(100, '2014-08-28', 6, 667500, 1),
(101, '2014-08-28', 14, 15000, 1),
(102, '2014-09-01', 6, 45000, 1),
(103, '2014-09-01', 6, 45000, 1),
(104, '2014-09-02', 6, 60000, 1),
(105, '2014-09-03', 12, 30000, 1),
(106, '2014-09-03', 16, 90000, 1),
(107, '2014-09-03', 16, 2500, 1),
(108, '2014-09-03', 16, 135000, 1),
(109, '2014-09-04', 14, 34500, 1),
(110, '2014-09-04', 6, 45000, 1),
(111, '2014-09-04', 12, 2500, 1),
(112, '2014-09-05', 12, 90000, 1),
(113, '2014-09-05', 16, 45000, 1),
(114, '2014-09-08', 6, 45000, 1),
(115, '2014-09-10', 14, 15000, 1),
(116, '2014-09-10', 12, 135000, 1),
(117, '2014-09-10', 6, 9000, 1),
(118, '2014-09-10', 6, 15000, 1),
(119, '2014-09-10', 6, 15000, 1),
(120, '2014-09-10', 6, 30000, 1),
(121, '2014-09-11', 6, 47500, 1),
(122, '2014-09-11', 6, 5000, 1),
(123, '2014-09-11', 12, 270000, 1),
(124, '2014-09-11', 16, 32500, 1),
(125, '2014-09-23', 6, 7500, 1),
(126, '2014-11-07', 6, 5000, 0),
(127, '2014-11-07', 6, 90000, 0),
(128, '2014-12-04', 6, 2500, 0);

-- --------------------------------------------------------

--
-- Estructura para la vista `totalmes`
--
DROP TABLE IF EXISTS `totalmes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalmes` AS select count(`venta`.`codven`) AS `suma` from `venta` where (date_format(`venta`.`fecha`,'%Y-%m') = date_format(now(),'%Y-%m'));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
