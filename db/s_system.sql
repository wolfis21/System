-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2022 a las 02:24:56
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `s_system`
--
-- --------------------------------------------------------
-- Estructura de tabla para la tabla `cliente`
--
CREATE DATABASE s_system;
USE s_system;

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `idCedula` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `idCedula`, `Nombre`, `Apellido`, `Direccion`, `Telefono`, `Correo`, `Empleado_idEmpleado`) VALUES
(3, '277651', 'prueba', 'sifue', 'curagua', '12123', 'isaa@hot.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `Cedula` varchar(45) NOT NULL,
  `pNombre` varchar(45) NOT NULL,
  `sNombre` varchar(45) DEFAULT NULL,
  `pApellido` varchar(45) NOT NULL,
  `sApellido` varchar(45) DEFAULT NULL,
  `Fecha_nacimiento` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Genero` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) NOT NULL,
  `Cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `Cedula`, `pNombre`, `sNombre`, `pApellido`, `sApellido`, `Fecha_nacimiento`, `Direccion`, `Genero`, `telefono`, `Cargo`) VALUES
(1, '27765209', 'isaac', 'Alejandr0', 'saado', 'mathison', '2000-08-04', 'curagua', '1', '04249662043', 'Gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `idEquipo` int(11) NOT NULL,
  `idCodigo` varchar(45) NOT NULL,
  `nombre_e` varchar(45) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `prev_diag` varchar(80) NOT NULL,
  `fecha_ingre` date NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE `lista` (
  `idProducto` int(11) NOT NULL,
  `nombre_pieza` varchar(45) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idProveedores` int(11) NOT NULL,
  `nombre_empre` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idProveedores`, `nombre_empre`, `categoria`, `direccion`, `telefono`, `Empleado_idEmpleado`) VALUES
(1, 'ferrominera', 'torwerefsfef', 'castilito', '213123', 1),
(2, 'ferreotal', 'cavillasd', 'castilito', '213123', 1),
(4, 'aaaaa', 'sssss', 'fggggg', '2222333', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores_has_lista`
--

CREATE TABLE `proveedores_has_lista` (
  `Proveedores_idProveedores` int(11) NOT NULL,
  `Lista_idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rev_equipo`
--

CREATE TABLE `rev_equipo` (
  `idRev_equipo` int(11) NOT NULL,
  `fecha_rev` date NOT NULL,
  `descrip_rev` varchar(80) NOT NULL,
  `descrip_reemp` varchar(100) NOT NULL,
  `presupuesto` float NOT NULL,
  `Equipo_idEquipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `contraseña`, `Empleado_idEmpleado`) VALUES
(1, 'isaac', '27765209', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `cliente_ibfk_1` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`idEquipo`),
  ADD KEY `equipo_ibfk_1` (`Cliente_idCliente`);

--
-- Indices de la tabla `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idProveedores`),
  ADD KEY `proveedores_ibfk_1` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `proveedores_has_lista`
--
ALTER TABLE `proveedores_has_lista`
  ADD PRIMARY KEY (`Proveedores_idProveedores`,`Lista_idProducto`),
  ADD KEY `proveedores_has_lista_ibfk_2` (`Lista_idProducto`);

--
-- Indices de la tabla `rev_equipo`
--
ALTER TABLE `rev_equipo`
  ADD PRIMARY KEY (`idRev_equipo`),
  ADD KEY `rev_equipo_ibfk_1` (`Equipo_idEquipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `usuario_ibfk_1` (`Empleado_idEmpleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `idEquipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idProveedores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rev_equipo`
--
ALTER TABLE `rev_equipo`
  MODIFY `idRev_equipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedores_has_lista`
--
ALTER TABLE `proveedores_has_lista`
  ADD CONSTRAINT `proveedores_has_lista_ibfk_1` FOREIGN KEY (`Proveedores_idProveedores`) REFERENCES `proveedores` (`idProveedores`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proveedores_has_lista_ibfk_2` FOREIGN KEY (`Lista_idProducto`) REFERENCES `lista` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rev_equipo`
--
ALTER TABLE `rev_equipo`
  ADD CONSTRAINT `rev_equipo_ibfk_1` FOREIGN KEY (`Equipo_idEquipo`) REFERENCES `equipo` (`idEquipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
