-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2019 a las 23:10:15
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinicadental3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cclinico`
--

CREATE TABLE `tbl_cclinico` (
  `id_cclinico` int(11) NOT NULL,
  `nombre_cc` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_cc` varchar(75) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_cclinico`
--

INSERT INTO `tbl_cclinico` (`id_cclinico`, `nombre_cc`, `descripcion_cc`) VALUES
(1, 'Â¿Es esta su primera visita?', 'Verificar si es la primera vez que llega a la clÃ­nica'),
(2, 'Le dieron instrucciones de higiene oral', 'asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ccxpaciente`
--

CREATE TABLE `tbl_ccxpaciente` (
  `id_ccxpaciente` int(11) NOT NULL,
  `id_cclinico` int(11) NOT NULL,
  `id_Pacientes` int(11) NOT NULL,
  `apunte` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_ccxpaciente`
--

INSERT INTO `tbl_ccxpaciente` (`id_ccxpaciente`, `id_cclinico`, `id_Pacientes`, `apunte`) VALUES
(1, 2, 2, ''),
(2, 1, 2, ''),
(3, 1, 2, ''),
(4, 2, 3, ''),
(5, 1, 3, ''),
(6, 2, 4, ''),
(7, 1, 4, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_citas`
--

CREATE TABLE `tbl_citas` (
  `id_Citas` int(11) NOT NULL,
  `id_Pacientes` int(11) NOT NULL,
  `fechaProgramada` date NOT NULL,
  `hora` time(6) NOT NULL,
  `descripcionCita` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_citas`
--

INSERT INTO `tbl_citas` (`id_Citas`, `id_Pacientes`, `fechaProgramada`, `hora`, `descripcionCita`) VALUES
(1, 1, '2019-10-16', '18:00:00.000000', 'Vamo a quitar muela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cobranza`
--

CREATE TABLE `tbl_cobranza` (
  `id_cobranza` int(11) NOT NULL,
  `tratamiento` int(11) DEFAULT NULL,
  `idpaciente` int(11) DEFAULT NULL,
  `abonos` float DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_cobranza`
--

INSERT INTO `tbl_cobranza` (`id_cobranza`, `tratamiento`, `idpaciente`, `abonos`, `fecha`) VALUES
(12, 7, 5, 50, '2019-10-30'),
(13, 6, 5, 50, '2019-10-30'),
(14, 7, 5, 10, '2019-10-30'),
(18, 6, 5, 60, '2019-01-10'),
(19, 2, 1, 2000, '2019-01-10'),
(20, 6, 5, 330, '2019-11-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pacientes`
--

CREATE TABLE `tbl_pacientes` (
  `id_Pacientes` int(11) NOT NULL,
  `nombre_Pacientes` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_Pacientes` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `telefonoCasa` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefonoCel` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaRegistro` date NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `estadoCivil` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ocupacion` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `recomendadoPor` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `personaResponsable` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numeroRecomendaciones` int(11) DEFAULT NULL,
  `direccionResponsable` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `medicoPersonal` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefonoMedico` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fotografias` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estadoPaciente` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_pacientes`
--

INSERT INTO `tbl_pacientes` (`id_Pacientes`, `nombre_Pacientes`, `direccion_Pacientes`, `telefonoCasa`, `telefonoCel`, `fechaRegistro`, `fechaNacimiento`, `estadoCivil`, `ocupacion`, `recomendadoPor`, `personaResponsable`, `numeroRecomendaciones`, `direccionResponsable`, `medicoPersonal`, `telefonoMedico`, `fotografias`, `estadoPaciente`) VALUES
(1, 'Esteban Quito', 'Xela', '77777777', '22222222', '2019-10-01', '2019-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '52467.png', 'activo'),
(2, 'David Estuardo', 'San Marcos', '32145879', '45359588', '2019-10-09', '1995-10-27', '', '', '', '', NULL, '', '', '', NULL, 'activo'),
(3, 'VÃ­ctor YacÃ³n', 'QuichÃ©', '1231525', '1231314', '2019-10-17', '1999-02-20', 'Soltero', 'Estudiante', 'Antonio Estacuy', 'Oscar MÃ©ndez', NULL, 'La Esperanza, Quetzaltenango', 'HÃ©ctor Cifuentes', '912992434', 'img/fotos/', 'activo'),
(4, 'Jefry Maldonado', 'San Marcos', '45359588', '45359588', '2019-01-15', '1999-02-20', 'Soltero', 'Ingeniero', 'CÃ©sar Aguilar', 'Elmer Orozco', NULL, 'San Marcos', 'Antonio Ayala', '(502) 419-1523', 'img/fotos/', 'activo'),
(5, 'Jesse', '2 avenida zona 1 la esperanza quetzaltenango,', '35246199', '', '2019-01-10', '1999-02-20', 'Quetzaltenango', 'Lic', 'Esteban Quito', 'Tu Pac', NULL, '2 avenida zona 1 la esperanza quetzaltenango,', 'four pack', '', '395700.png', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_piezas`
--

CREATE TABLE `tbl_piezas` (
  `id_Piezas` int(11) NOT NULL,
  `nombrePieza` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_piezas`
--

INSERT INTO `tbl_piezas` (`id_Piezas`, `nombrePieza`) VALUES
(1, 'Co2'),
(2, '1.6'),
(3, 'Co3'),
(4, 'Co2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_presupuestos`
--

CREATE TABLE `tbl_presupuestos` (
  `id_Presupuesto` int(11) NOT NULL,
  `id_Piezas` int(11) NOT NULL,
  `id_Pacientes` int(11) NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_presupuestos`
--

INSERT INTO `tbl_presupuestos` (`id_Presupuesto`, `id_Piezas`, `id_Pacientes`, `descripcion`) VALUES
(3, 1, 1, 'Ortodoncia'),
(4, 1, 1, 'quitar muelas'),
(6, 1, 5, 'Blanqueamiento Dental'),
(7, 2, 5, 'Blanqueamiento Dental Premium');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol`
--

CREATE TABLE `tbl_rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_rol`
--

INSERT INTO `tbl_rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Secretaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(254) COLLATE utf8_spanish_ci NOT NULL,
  `id_rol` int(11) NOT NULL,
  `estado_usuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `nombre_usuario`, `username`, `password`, `id_rol`, `estado_usuario`) VALUES
(2, 'esteban quito', 'equito', 'a67063986e67b7ddd107229ba9d480ee3a02f9d59732d', 1, 'activo'),
(3, 'esteban quito', 'equito', 'a67063986e67b7ddd107229ba9d480ee3a02f9d59732d4bc03b2d97d27a1310d', 1, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientorealizar`
--

CREATE TABLE `tratamientorealizar` (
  `id_Seguimientos` int(11) NOT NULL,
  `id_Citas` int(11) NOT NULL,
  `id_Presupuesto` int(11) NOT NULL,
  `tratamientoRealizar` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `status` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tratamientorealizar`
--

INSERT INTO `tratamientorealizar` (`id_Seguimientos`, `id_Citas`, `id_Presupuesto`, `tratamientoRealizar`, `precio`, `status`) VALUES
(1, 1, 3, 'Aflojar muela', 2000, 'NP'),
(2, 1, 3, 'cambio de hules de brackets', 1000, NULL),
(6, 1, 6, 'Aplicacion de Fluor', 100, 'NP'),
(7, 1, 7, 'Fluor premium', 400, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_cclinico`
--
ALTER TABLE `tbl_cclinico`
  ADD PRIMARY KEY (`id_cclinico`);

--
-- Indices de la tabla `tbl_ccxpaciente`
--
ALTER TABLE `tbl_ccxpaciente`
  ADD PRIMARY KEY (`id_ccxpaciente`),
  ADD KEY `id_Pacientes` (`id_Pacientes`);

--
-- Indices de la tabla `tbl_citas`
--
ALTER TABLE `tbl_citas`
  ADD PRIMARY KEY (`id_Citas`),
  ADD KEY `fk_tbl_Citas_tbl_Pacientes_idx` (`id_Pacientes`);

--
-- Indices de la tabla `tbl_cobranza`
--
ALTER TABLE `tbl_cobranza`
  ADD PRIMARY KEY (`id_cobranza`),
  ADD KEY `tratamiento` (`tratamiento`) USING BTREE,
  ADD KEY `idpaciente` (`idpaciente`);

--
-- Indices de la tabla `tbl_pacientes`
--
ALTER TABLE `tbl_pacientes`
  ADD PRIMARY KEY (`id_Pacientes`);

--
-- Indices de la tabla `tbl_piezas`
--
ALTER TABLE `tbl_piezas`
  ADD PRIMARY KEY (`id_Piezas`);

--
-- Indices de la tabla `tbl_presupuestos`
--
ALTER TABLE `tbl_presupuestos`
  ADD PRIMARY KEY (`id_Presupuesto`),
  ADD KEY `fk_tbl_Presupuestos_tbl_Piezas1_idx` (`id_Piezas`),
  ADD KEY `fk_tbl_Presupuestos_tbl_Pacientes1_idx` (`id_Pacientes`);

--
-- Indices de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `tratamientorealizar`
--
ALTER TABLE `tratamientorealizar`
  ADD PRIMARY KEY (`id_Seguimientos`),
  ADD KEY `fk_tbl_Seguimientos_tbl_Citas1_idx` (`id_Citas`),
  ADD KEY `fk_tbl_Seguimientos_tbl_Presupuestos1_idx` (`id_Presupuesto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_cclinico`
--
ALTER TABLE `tbl_cclinico`
  MODIFY `id_cclinico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_ccxpaciente`
--
ALTER TABLE `tbl_ccxpaciente`
  MODIFY `id_ccxpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_citas`
--
ALTER TABLE `tbl_citas`
  MODIFY `id_Citas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_cobranza`
--
ALTER TABLE `tbl_cobranza`
  MODIFY `id_cobranza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tbl_pacientes`
--
ALTER TABLE `tbl_pacientes`
  MODIFY `id_Pacientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_piezas`
--
ALTER TABLE `tbl_piezas`
  MODIFY `id_Piezas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_presupuestos`
--
ALTER TABLE `tbl_presupuestos`
  MODIFY `id_Presupuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tratamientorealizar`
--
ALTER TABLE `tratamientorealizar`
  MODIFY `id_Seguimientos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_ccxpaciente`
--
ALTER TABLE `tbl_ccxpaciente`
  ADD CONSTRAINT `tbl_ccxpaciente_ibfk_1` FOREIGN KEY (`id_Pacientes`) REFERENCES `tbl_pacientes` (`id_Pacientes`);

--
-- Filtros para la tabla `tbl_citas`
--
ALTER TABLE `tbl_citas`
  ADD CONSTRAINT `fk_tbl_Citas_tbl_Pacientes` FOREIGN KEY (`id_Pacientes`) REFERENCES `tbl_pacientes` (`id_Pacientes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_cobranza`
--
ALTER TABLE `tbl_cobranza`
  ADD CONSTRAINT `tbl_cobranza_ibfk_1` FOREIGN KEY (`tratamiento`) REFERENCES `tratamientorealizar` (`id_Seguimientos`),
  ADD CONSTRAINT `tbl_cobranza_ibfk_2` FOREIGN KEY (`idpaciente`) REFERENCES `tbl_pacientes` (`id_Pacientes`);

--
-- Filtros para la tabla `tbl_presupuestos`
--
ALTER TABLE `tbl_presupuestos`
  ADD CONSTRAINT `fk_tbl_Presupuestos_tbl_Pacientes1` FOREIGN KEY (`id_Pacientes`) REFERENCES `tbl_pacientes` (`id_Pacientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_Presupuestos_tbl_Piezas1` FOREIGN KEY (`id_Piezas`) REFERENCES `tbl_piezas` (`id_Piezas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tratamientorealizar`
--
ALTER TABLE `tratamientorealizar`
  ADD CONSTRAINT `fk_tbl_Seguimientos_tbl_Citas1` FOREIGN KEY (`id_Citas`) REFERENCES `tbl_citas` (`id_Citas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_Seguimientos_tbl_Presupuestos1` FOREIGN KEY (`id_Presupuesto`) REFERENCES `tbl_presupuestos` (`id_Presupuesto`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
