-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2019 a las 06:40:05
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
-- Base de datos: `dbdental`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cita`
--

CREATE TABLE `tbl_cita` (
  `id_cita` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha_cita` date NOT NULL,
  `hora_cita` time NOT NULL,
  `descripcion_cita` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `estado_cita` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_cita`
--

INSERT INTO `tbl_cita` (`id_cita`, `id_paciente`, `fecha_cita`, `hora_cita`, `descripcion_cita`, `estado_cita`) VALUES
(1, 1, '2019-01-11', '00:00:00', 'ExtracciÃ³n de diente', 'activo'),
(2, 3, '2019-10-01', '00:00:00', 'Blanqueamiento dental.', 'activo'),
(3, 2, '2019-09-23', '14:45:00', 'ExtracciÃ³n de muela.', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_paciente`
--

CREATE TABLE `tbl_paciente` (
  `id_paciente` int(11) NOT NULL,
  `nombre_paciente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_paciente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telcasa_paciente` int(10) NOT NULL,
  `telmovil_paciente` int(10) NOT NULL,
  `fecha_examen` date NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `estado_civil` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ocupacion_paciente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `recomendado_por` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable_paciente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `medico_personal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tel_medico` int(10) NOT NULL,
  `estado_paciente` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_paciente`
--

INSERT INTO `tbl_paciente` (`id_paciente`, `nombre_paciente`, `direccion_paciente`, `telcasa_paciente`, `telmovil_paciente`, `fecha_examen`, `fecha_nacimiento`, `estado_civil`, `ocupacion_paciente`, `recomendado_por`, `responsable_paciente`, `direccion_responsable`, `medico_personal`, `tel_medico`, `estado_paciente`) VALUES
(1, 'Dariel Ayala', '2 Calle 18-79 Zona 15, Colonia Vista Hermosa I, Gu', 77225896, 42558712, '2019-01-10', '1989-01-01', 'Casado', 'Doctor', 'Hector CotÃ­', 'CÃ©sar Aguilar', 'TotonicapÃ¡n', 'David Bautista', 45359588, 'activo'),
(2, 'Pedro Carlos Estacuy', '1-37 zona 2 Quetzaltenango', 938777234, 65479521, '2019-01-08', '1994-02-14', 'Casado', 'Ingeniero en Sistemas', 'VÃ­ctor YacÃ³n', 'Pedro GÃ³mez', '3-81 zona 5, SalcajÃ¡, Quetzaltenango', 'JosÃ© de LeÃ³n', 74589436, 'activo'),
(3, 'IsaÃ­as VÃ¡squez', '2-17 zona 3, SalcajÃ¡, Quetzaltenango', 77601415, 54546235, '2019-01-03', '1997-06-17', 'Soltero', 'Estudiante', 'Dariel Ayala', 'Oscar Ajanel', 'zona 8, La Esperanza, Quetzaltenango', 'JosÃ© de LeÃ³n', 54469596, 'activo'),
(4, 'Eddie Fuentes', 'TotonicapÃ¡n', 93489231, 32534658, '2019-01-10', '2000-02-20', 'Soltero', 'Ingeniero', 'Dariel Ayala', 'Eddie Fuentes', 'TotonicapÃ¡n', 'VÃ­ctor Baquiax', 35235264, 'activo');

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
  `nombre_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_rol` int(11) NOT NULL,
  `estado_usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `nombre_usuario`, `username`, `password`, `id_rol`, `estado_usuario`) VALUES
(1, 'David LÃ³pez', 'dlopez', 'a67063986e67b7ddd107229ba9d480ee3a02f9d59732d4bc03b2d97d27a1310d', 1, 'activo'),
(2, 'Dariel Ayala', 'dayala', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 2, 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_cita`
--
ALTER TABLE `tbl_cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `tbl_paciente`
--
ALTER TABLE `tbl_paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_cita`
--
ALTER TABLE `tbl_cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_paciente`
--
ALTER TABLE `tbl_paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_cita`
--
ALTER TABLE `tbl_cita`
  ADD CONSTRAINT `tbl_cita_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `tbl_paciente` (`id_paciente`);

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tbl_rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
