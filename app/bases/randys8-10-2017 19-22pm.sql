-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2017 a las 02:22:27
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `randys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_aliados`
--

CREATE TABLE IF NOT EXISTS `tbl_aliados` (
  `ID_ALIADOS` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_ALIADOS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_aliados`
--

INSERT INTO `tbl_aliados` (`ID_ALIADOS`, `NOMBRE`) VALUES
(1, 'Servicios a domicilio s.a'),
(2, 'no tiene aliados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_envio`
--

CREATE TABLE IF NOT EXISTS `tbl_envio` (
  `ID_ENVIO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_RESTAURANTE` int(11) NOT NULL,
  `FECHA_HORA_LLEGADA` date DEFAULT NULL,
  `FECHA_HORA_SALIDA` datetime NOT NULL,
  PRIMARY KEY (`ID_ENVIO`),
  KEY `FK_USUARIOS_ENVIO_idx` (`ID_USUARIO`),
  KEY `ID_RESTAURANTE_idx` (`ID_RESTAURANTE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tbl_envio`
--

INSERT INTO `tbl_envio` (`ID_ENVIO`, `ID_USUARIO`, `ID_RESTAURANTE`, `FECHA_HORA_LLEGADA`, `FECHA_HORA_SALIDA`) VALUES
(1, 1, 1, '2017-09-30', '2017-09-30 00:00:00'),
(2, 2, 1, '2017-09-30', '2017-09-30 00:00:00'),
(3, 3, 1, '2017-09-30', '2017-09-30 00:00:00'),
(4, 1, 1, '2017-09-30', '2017-09-30 00:00:00'),
(5, 3, 1, '2017-09-30', '2017-09-30 00:00:00'),
(6, 17, 1, '2017-10-08', '2017-10-08 23:08:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_envios_factura`
--

CREATE TABLE IF NOT EXISTS `tbl_envios_factura` (
  `ID_ENVIOS_FACTURA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ENVIO` int(11) NOT NULL,
  `ID_FACTURA` int(11) NOT NULL,
  PRIMARY KEY (`ID_ENVIOS_FACTURA`),
  KEY `FK_FACTURAS_ENVIOS_idx` (`ID_FACTURA`),
  KEY `FK_ENVIOS_idx` (`ID_ENVIO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2265 ;

--
-- Volcado de datos para la tabla `tbl_envios_factura`
--

INSERT INTO `tbl_envios_factura` (`ID_ENVIOS_FACTURA`, `ID_ENVIO`, `ID_FACTURA`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_domiciliarios`
--

CREATE TABLE IF NOT EXISTS `tbl_estado_domiciliarios` (
  `ID_ESTADO_DOMICILIARIOS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `DESCRIPCION_ESTADO` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_ESTADO_DOMICILIARIOS`),
  KEY `FK_USUARIO_DOMICILIARIO_idx` (`ID_USUARIO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_estado_domiciliarios`
--

INSERT INTO `tbl_estado_domiciliarios` (`ID_ESTADO_DOMICILIARIOS`, `ID_USUARIO`, `DESCRIPCION_ESTADO`) VALUES
(1, 1, 'Ocupado'),
(2, 2, 'Ocupado'),
(3, 3, 'Ocupado'),
(4, 7, 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_factura`
--

CREATE TABLE IF NOT EXISTS `tbl_factura` (
  `ID_FACTURA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_RESTAURANTE` int(11) NOT NULL,
  `NUMERO_FACTURA` varchar(20) NOT NULL,
  `ZONA` varchar(20) NOT NULL,
  `FECHA_FACTUA` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_FACTURA`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2266 ;

--
-- Volcado de datos para la tabla `tbl_factura`
--

INSERT INTO `tbl_factura` (`ID_FACTURA`, `ID_RESTAURANTE`, `NUMERO_FACTURA`, `ZONA`, `FECHA_FACTUA`) VALUES
(1, 1, '2485175', '1', '2017-09-30 00:00:00'),
(2, 1, '2485176', '2', '2017-09-30 00:00:00'),
(3, 1, '2485177', '3', '2017-09-30 00:00:00'),
(4, 1, '2485178', '4', '2017-09-30 00:00:00'),
(5, 1, '2485179', '1', '2017-09-30 00:00:00'),
(6, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(7, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(8, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(9, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(10, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(11, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(12, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(13, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(14, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(15, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(16, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(17, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(18, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(19, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(20, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(21, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(22, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(23, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(24, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(25, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(26, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(27, 1, '0001234121', '0001234121', '2017-10-08 00:00:00'),
(28, 1, '0001234121', '0001234121', '2017-10-08 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_registro_laboral`
--

CREATE TABLE IF NOT EXISTS `tbl_registro_laboral` (
  `ID_REGISTRO_LABORAL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `FECHA_HORA_LLEGADA` date NOT NULL,
  `FECHA_HORA_SALIDA` date NOT NULL,
  PRIMARY KEY (`ID_REGISTRO_LABORAL`),
  KEY `FK_USUARIO_LABORAL_idx` (`ID_USUARIO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_registro_laboral`
--

INSERT INTO `tbl_registro_laboral` (`ID_REGISTRO_LABORAL`, `ID_USUARIO`, `FECHA_HORA_LLEGADA`, `FECHA_HORA_SALIDA`) VALUES
(1, 1, '2017-09-30', '2017-09-30'),
(2, 2, '2017-09-30', '2017-09-30'),
(3, 3, '2017-09-30', '2017-09-30'),
(4, 7, '2017-09-30', '2017-09-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_restaurante`
--

CREATE TABLE IF NOT EXISTS `tbl_restaurante` (
  `ID_RESTAURANTE` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_SEDE` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_RESTAURANTE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_restaurante`
--

INSERT INTO `tbl_restaurante` (`ID_RESTAURANTE`, `NOMBRE_SEDE`) VALUES
(1, 'cl98'),
(2, 'cl71'),
(3, 'ANDES'),
(4, 'SALITRE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol`
--

CREATE TABLE IF NOT EXISTS `tbl_rol` (
  `ID_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ROL` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100 ;

--
-- Volcado de datos para la tabla `tbl_rol`
--

INSERT INTO `tbl_rol` (`ID_ROL`, `NOMBRE_ROL`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'ADMINISTRADOR_OPERATIVO'),
(3, 'DESPACHADOR'),
(4, 'DOMICILIARIO'),
(99, 'BORRADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(20) NOT NULL,
  `APELLIDO` varchar(20) NOT NULL,
  `IDENTIFICACION` int(11) NOT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `CELULAR` int(11) DEFAULT NULL,
  `CORREO_ELECTRONICO` varchar(33) DEFAULT NULL,
  `CODIGO_DE_BARRAS` varchar(45) DEFAULT NULL,
  `ID_ROL` int(11) NOT NULL,
  `ID_ALIADOS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  KEY `FK_ROL_USUARIO_idx` (`ID_ROL`),
  KEY `FK_ALIADOS_USUARIO_idx` (`ID_ALIADOS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`ID_USUARIO`, `NOMBRE`, `APELLIDO`, `IDENTIFICACION`, `PASSWORD`, `CELULAR`, `CORREO_ELECTRONICO`, `CODIGO_DE_BARRAS`, `ID_ROL`, `ID_ALIADOS`) VALUES
(1, 'xander Andres sin ni', 'Martinez cosa', 1111111, '45821477', 3216574, 'javier.lopez@gmail.com', '21111160000', 4, 1),
(2, 'Pedro Alejandro', 'Perez', 74588414, '7842156', 7412574, 'Pedro.Perez@gmail.com', '21111160001', 4, 1),
(3, 'Juan Carlos sin ning', 'Martinez', 243434343, '78888547', 32167421, 'Juan.Martinez@gmail.com', '21111160002', 4, 1),
(4, 'Carlos Mario', 'Cadavid', 74125845, '21264', 3217874, 'Carlos.Cadavid@gmail.com', '21111160003', 3, 2),
(5, 'Juan Manuel', 'Lopez', 21458588, '7811558', 7126574, 'Juan.lopez@gmail.com', '21111160004', 2, 2),
(6, 'Jose Luis', 'Lopez', 27304801, '78559945', 7226574, 'Jose.lopez@gmail.com', '21111160005', 1, 2),
(7, 'Diego', 'Sanchez', 755585414, '7822247', 7025888, 'Juan.Martinez@gmail.com', '21111160006', 4, 1),
(8, 'prueba', 'prueba', 1223111, '11111111', 4324324, 'prueba@prueba.com', '21111160007', 1, 2),
(16, 'MARIa', 'GONZALES', 243434343, '', 43424323, '', '21111160008', 4, 1),
(17, 'MARIA', 'TORRES', 43232, '', 343423, '', '21111160009', 4, 2),
(18, 'MARIA', 'TORRES', 43232, '', 343423, '', '21111160010', 99, 2),
(19, 'manuel', 'vergara', 434, '', 995959, '', '21111160011', 99, 1),
(20, 'manuel', 'vergara', 434, '', 995959, '', '21111160012', 99, 1),
(21, 'manuel', 'vergara', 434, '', 995959, '', '21111160013', 99, 1),
(22, 'manuel', 'vergara', 434, '', 995959, '', '21111160014', 99, 1),
(23, 'manuel', 'vergara', 434, '', 995959, '', '21111160015', 99, 1),
(24, 'manuel', 'vergara', 434, '', 995959, '', '21111160016', 99, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_envio`
--
ALTER TABLE `tbl_envio`
  ADD CONSTRAINT `FK_USUARIOS_ENVIO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ID_RESTAURANTE` FOREIGN KEY (`ID_RESTAURANTE`) REFERENCES `tbl_restaurante` (`ID_RESTAURANTE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_envios_factura`
--
ALTER TABLE `tbl_envios_factura`
  ADD CONSTRAINT `FK_ENVIOS` FOREIGN KEY (`ID_ENVIO`) REFERENCES `tbl_envio` (`ID_ENVIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_FACTURAS_ENVIOS` FOREIGN KEY (`ID_FACTURA`) REFERENCES `tbl_factura` (`ID_FACTURA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_estado_domiciliarios`
--
ALTER TABLE `tbl_estado_domiciliarios`
  ADD CONSTRAINT `FK_USUARIO_DOMICILIARIO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_registro_laboral`
--
ALTER TABLE `tbl_registro_laboral`
  ADD CONSTRAINT `FK_USUARIO_LABORAL` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `FK_ROL_USUARIO` FOREIGN KEY (`ID_ROL`) REFERENCES `tbl_rol` (`ID_ROL`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
