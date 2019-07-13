-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2019 a las 22:47:54
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `iddestino` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`iddestino`, `nombre`) VALUES
(2, 'ARENALES'),
(3, 'ATOCHA'),
(4, 'CBBA'),
(5, 'COTAGAITA'),
(6, 'LA PAZ'),
(7, 'MOJINETE'),
(8, 'MORAYA'),
(9, 'ORURO'),
(10, 'POTOSI'),
(11, 'SANTA CRUZ'),
(12, 'SUCRE'),
(13, 'TARIJA'),
(14, 'TUPIZA'),
(15, 'UYUNI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomercaderia`
--

CREATE TABLE `tipomercaderia` (
  `idtipomercaderia` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipomercaderia`
--

INSERT INTO `tipomercaderia` (`idtipomercaderia`, `nombre`) VALUES
(1, 'EQUIPAJES Y MERCADERIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `idtransporte` int(11) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `tipotransporte` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transporte`
--

INSERT INTO `transporte` (`idtransporte`, `placa`, `tipotransporte`) VALUES
(1, '1010AAA', 'MINIBUS 7 DE NOVIEMBRE'),
(2, '2862NEA', 'MINIBUS SEGOVIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ucoi`
--

CREATE TABLE `ucoi` (
  `iducoi` int(11) NOT NULL,
  `iddestino` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pia` varchar(50) NOT NULL,
  `acta` varchar(50) NOT NULL,
  `idtipomercaderia` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `tipotransporte` varchar(50) NOT NULL,
  `idtransporte` int(11) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `comiso` varchar(100) NOT NULL,
  `nrotransito` varchar(100) NOT NULL,
  `importador` varchar(100) NOT NULL,
  `nrodui` varchar(100) NOT NULL,
  `nit` varchar(100) NOT NULL,
  `nrofactura` varchar(100) NOT NULL,
  `iduser` int(11) NOT NULL,
  `unidad` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ucoi`
--

INSERT INTO `ucoi` (`iducoi`, `iddestino`, `fecha`, `pia`, `acta`, `idtipomercaderia`, `cantidad`, `tipotransporte`, `idtransporte`, `placa`, `comiso`, `nrotransito`, `importador`, `nrodui`, `nit`, `nrofactura`, `iduser`, `unidad`) VALUES
(1, 3, '2019-07-13 11:42:56', 'CUARTOS', '', 1, 100, 'MINIBUS 7 DE NOVIEMBRE', 1, '1010AAA', '', '', '', '', '', '', 1, ''),
(2, 8, '2019-07-13 11:43:20', 'CUARTOS', '', 1, 100, 'MINIBUS 7 DE NOVIEMBRE', 1, '1010AAA', '', '', '', '', '', '', 1, ''),
(4, 15, '2019-07-13 15:35:03', 'CUARTOS', '', 1, 12, 'MINIBUS 7 DE NOVIEMBRE', 1, '1010AAA', '', '', '', '', '', '', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`iduser`, `user`, `password`, `tipo`) VALUES
(1, 'control', 'control', 'control'),
(2, 'admin', 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`iddestino`);

--
-- Indices de la tabla `tipomercaderia`
--
ALTER TABLE `tipomercaderia`
  ADD PRIMARY KEY (`idtipomercaderia`);

--
-- Indices de la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`idtransporte`);

--
-- Indices de la tabla `ucoi`
--
ALTER TABLE `ucoi`
  ADD PRIMARY KEY (`iducoi`),
  ADD KEY `iddestino` (`iddestino`),
  ADD KEY `idtipomercaderia` (`idtipomercaderia`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idtransporte` (`idtransporte`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `iddestino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tipomercaderia`
--
ALTER TABLE `tipomercaderia`
  MODIFY `idtipomercaderia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `transporte`
--
ALTER TABLE `transporte`
  MODIFY `idtransporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ucoi`
--
ALTER TABLE `ucoi`
  MODIFY `iducoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ucoi`
--
ALTER TABLE `ucoi`
  ADD CONSTRAINT `ucoi_ibfk_1` FOREIGN KEY (`iddestino`) REFERENCES `destino` (`iddestino`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ucoi_ibfk_2` FOREIGN KEY (`idtipomercaderia`) REFERENCES `tipomercaderia` (`idtipomercaderia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ucoi_ibfk_3` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ucoi_ibfk_4` FOREIGN KEY (`idtransporte`) REFERENCES `transporte` (`idtransporte`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
