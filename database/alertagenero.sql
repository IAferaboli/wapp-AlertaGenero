-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2023 a las 02:31:03
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alertagenero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agresores`
--

CREATE TABLE `agresores` (
  `id_agresor` int(11) NOT NULL,
  `nombre` text NOT NULL DEFAULT '\'N/N\'',
  `apellido` text NOT NULL DEFAULT '\'N/N\'',
  `id_altura` int(11) NOT NULL DEFAULT 4,
  `id_color` int(11) NOT NULL DEFAULT 1,
  `tatuaje` text NOT NULL DEFAULT 'N/N',
  `cicatriz` text NOT NULL DEFAULT 'N/N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alturas`
--

CREATE TABLE `alturas` (
  `id_altura` int(11) NOT NULL,
  `altura` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `alturas`
--

INSERT INTO `alturas` (`id_altura`, `altura`) VALUES
(1, 'N/N'),
(2, 'Alto'),
(3, 'Mediano'),
(4, 'Bajo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descargos`
--

CREATE TABLE `descargos` (
  `id_descargo` int(11) NOT NULL,
  `id_usuarie` int(11) NOT NULL,
  `id_modalidad` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_agresor` int(11) NOT NULL,
  `descargo` text NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

CREATE TABLE `instituciones` (
  `id_institucion` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `celContacto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `instituciones`
--

INSERT INTO `instituciones` (`id_institucion`, `nombre`, `email`, `celContacto`) VALUES
(1, 'San Esteban SRL', 'estebanledesma650@gmail.com', '3400510046'),
(2, 'Querandí Projects Solutions', 'gerf_08@hotmail.com', '3400657116'),
(3, 'Visum Digital', 'revistadigitalvisum@gmail.com', '3412287363'),
(4, 'Concejo', 'gferaboli@villaconstitucion.gov.ar', '3400657116');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidades`
--

CREATE TABLE `modalidades` (
  `id_modalidad` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `modalidades`
--

INSERT INTO `modalidades` (`id_modalidad`, `nombre`) VALUES
(1, 'N/N'),
(2, 'En espacio público'),
(3, 'Mediática'),
(4, 'Contra la libertad reproductiva'),
(5, 'Doméstica'),
(6, 'Laboral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelos`
--

CREATE TABLE `pelos` (
  `id_color` int(11) NOT NULL,
  `color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pelos`
--

INSERT INTO `pelos` (`id_color`, `color`) VALUES
(1, 'N/N'),
(2, 'Colorado'),
(3, 'Morocho'),
(4, 'Rubio'),
(5, 'Castaño'),
(6, 'Canoso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_violencias`
--

CREATE TABLE `tipos_violencias` (
  `id_tipo` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipos_violencias`
--

INSERT INTO `tipos_violencias` (`id_tipo`, `nombre`) VALUES
(1, 'N/N'),
(2, 'Física'),
(3, 'Psicológica'),
(4, 'Sexual'),
(5, 'Simbólica'),
(6, 'Pública/Política'),
(7, 'Económica/Patrimonial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaries`
--

CREATE TABLE `usuaries` (
  `id_usuarie` int(11) NOT NULL,
  `hashedni` text NOT NULL,
  `fecnac` date NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `atencionMed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuaries`
--

INSERT INTO `usuaries` (`id_usuarie`, `hashedni`, `fecnac`, `id_institucion`, `atencionMed`) VALUES
(4, 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '1990-12-21', 3, 1),
(5, '50edfd688ab49936bbe48f10aaa5fc546782ea9961f9a2c88044725d39a5de22', '1992-07-11', 1, 1),
(6, '1db26350a1f2dd4d94f50df4bd97bb087f4903df33e600bf0061e523eda0fe65', '1990-01-12', 1, 0),
(7, 'e723c6d9df1036fc101c3e02a9fb4c46d30c64406290911f9e96f174ebea60e9', '2023-10-05', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agresores`
--
ALTER TABLE `agresores`
  ADD PRIMARY KEY (`id_agresor`),
  ADD KEY `altura` (`id_altura`),
  ADD KEY `colorpelo` (`id_color`);

--
-- Indices de la tabla `alturas`
--
ALTER TABLE `alturas`
  ADD PRIMARY KEY (`id_altura`);

--
-- Indices de la tabla `descargos`
--
ALTER TABLE `descargos`
  ADD PRIMARY KEY (`id_descargo`),
  ADD UNIQUE KEY `id_usuarie` (`id_usuarie`),
  ADD KEY `agresor` (`id_agresor`),
  ADD KEY `modalidad` (`id_modalidad`),
  ADD KEY `tipo` (`id_tipo`);

--
-- Indices de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  ADD PRIMARY KEY (`id_institucion`);

--
-- Indices de la tabla `modalidades`
--
ALTER TABLE `modalidades`
  ADD PRIMARY KEY (`id_modalidad`);

--
-- Indices de la tabla `pelos`
--
ALTER TABLE `pelos`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `tipos_violencias`
--
ALTER TABLE `tipos_violencias`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuaries`
--
ALTER TABLE `usuaries`
  ADD PRIMARY KEY (`id_usuarie`),
  ADD KEY `institucion` (`id_institucion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agresores`
--
ALTER TABLE `agresores`
  MODIFY `id_agresor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alturas`
--
ALTER TABLE `alturas`
  MODIFY `id_altura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `descargos`
--
ALTER TABLE `descargos`
  MODIFY `id_descargo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  MODIFY `id_institucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `modalidades`
--
ALTER TABLE `modalidades`
  MODIFY `id_modalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pelos`
--
ALTER TABLE `pelos`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipos_violencias`
--
ALTER TABLE `tipos_violencias`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuaries`
--
ALTER TABLE `usuaries`
  MODIFY `id_usuarie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agresores`
--
ALTER TABLE `agresores`
  ADD CONSTRAINT `altura` FOREIGN KEY (`id_altura`) REFERENCES `alturas` (`id_altura`),
  ADD CONSTRAINT `colorpelo` FOREIGN KEY (`id_color`) REFERENCES `pelos` (`id_color`);

--
-- Filtros para la tabla `descargos`
--
ALTER TABLE `descargos`
  ADD CONSTRAINT `agresor` FOREIGN KEY (`id_agresor`) REFERENCES `agresores` (`id_agresor`),
  ADD CONSTRAINT `modalidad` FOREIGN KEY (`id_modalidad`) REFERENCES `modalidades` (`id_modalidad`),
  ADD CONSTRAINT `tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipos_violencias` (`id_tipo`),
  ADD CONSTRAINT `usuarie` FOREIGN KEY (`id_usuarie`) REFERENCES `usuaries` (`id_usuarie`);

--
-- Filtros para la tabla `usuaries`
--
ALTER TABLE `usuaries`
  ADD CONSTRAINT `institucion` FOREIGN KEY (`id_institucion`) REFERENCES `instituciones` (`id_institucion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
