-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2023 a las 01:41:46
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

--
-- Volcado de datos para la tabla `agresores`
--

INSERT INTO `agresores` (`id_agresor`, `nombre`, `apellido`, `id_altura`, `id_color`, `tatuaje`, `cicatriz`) VALUES
(1, 'Juan', 'Perez', 2, 3, 'No', 'No'),
(2, 'Maria', 'Gonzalez', 3, 4, 'Si', 'Si'),
(3, 'Pedro', 'Sanchez', 4, 2, 'No', 'Si'),
(4, 'Ana', 'Lopez', 1, 1, 'Si', 'No'),
(5, 'Luis', 'Martinez', 3, 6, 'No', 'No'),
(6, 'Susana', 'Rodriguez', 2, 5, 'Si', 'Si'),
(7, 'Carlos', 'Gomez', 4, 3, 'No', 'No'),
(8, 'Mariana', 'Flores', 1, 1, 'Si', 'No'),
(9, 'Daniel', 'Torres', 3, 6, 'No', 'No'),
(10, 'Laura', 'Martin', 2, 5, 'Si', 'Si'),
(11, 'Pablo', 'Martinez', 2, 4, 'No', 'No'),
(12, 'Lucia', 'Lopez', 3, 2, 'Si', 'Si'),
(13, 'Ricardo', 'Sanchez', 4, 5, 'No', 'No'),
(14, 'Mariana', 'Gonzalez', 1, 3, 'Si', 'No'),
(15, 'Alejandro', 'Perez', 3, 1, 'No', 'No'),
(16, 'Sofia', 'Rodriguez', 2, 6, 'Si', 'Si'),
(17, 'Diego', 'Gomez', 4, 4, 'No', 'No'),
(18, 'Fernanda', 'Flores', 1, 2, 'Si', 'No'),
(19, 'Martin', 'Torres', 3, 5, 'No', 'No'),
(20, 'Valentina', 'Martin', 2, 3, 'Si', 'Si');

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

--
-- Volcado de datos para la tabla `descargos`
--

INSERT INTO `descargos` (`id_descargo`, `id_usuarie`, `id_modalidad`, `id_tipo`, `id_agresor`, `descargo`, `fecha`) VALUES
(1, 1, 1, 2, 1, 'El agresor me siguió y me dijo cosas obscenas.', '2023-10-01'),
(2, 2, 2, 3, 2, 'Mi pareja me golpeó y me amenazó con matarme.', '2023-09-25'),
(3, 3, 3, 4, 3, 'Mi jefe me acosó sexualmente en el trabajo.', '2023-09-15'),
(4, 4, 4, 5, 4, 'Me llamaron por teléfono y me amenazaron con publicar fotos íntimas mías.', '2023-09-05'),
(5, 8, 5, 6, 5, 'Me discriminaron por mi orientación sexual en un bar.', '2023-08-25'),
(6, 9, 6, 7, 6, 'Me negaron un préstamo por ser mujer.', '2023-08-15'),
(7, 17, 1, 4, 7, 'Me despidieron de mi trabajo por estar embarazada.', '2023-08-05'),
(8, 11, 2, 3, 8, 'Me agredieron físicamente en una manifestación.', '2023-07-25'),
(9, 13, 4, 7, 9, 'Me robaron mi celular y mis pertenencias.', '2023-07-15'),
(10, 10, 1, 2, 11, 'El agresor me tocó sin mi consentimiento en el colectivo.', '2023-10-10'),
(11, 11, 2, 3, 12, 'Mi pareja me insultó y me tiró cosas por no cocinarle la cena.', '2023-09-29'),
(12, 12, 3, 4, 13, 'Mi jefe me hizo insinuaciones sexuales en la oficina.', '2023-09-19'),
(13, 13, 4, 5, 14, 'Me hackearon el celular y publicaron fotos íntimas mías en las redes sociales.', '2023-09-10'),
(14, 14, 5, 6, 15, 'Me discriminaron por mi religión en un restaurante.', '2023-08-29'),
(15, 15, 6, 3, 16, 'Me negaron un crédito por ser madre soltera.', '2023-08-19'),
(16, 16, 5, 3, 17, 'Me echaron de mi casa por ser lesbiana.', '2023-08-10'),
(17, 17, 4, 1, 18, 'Me agredieron verbalmente en una manifestación por el aborto legal.', '2023-07-29'),
(18, 18, 1, 7, 19, 'Me robaron mi bicicleta y mi celular en la calle.', '2023-07-19');

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
(1, 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '1950-01-01', 1, 0),
(2, '50edfd688ab49936bbe48f10aaa5fc546782ea9961f9a2c88044725d39a5de22', '1965-01-01', 1, 1),
(3, '1db26350a1f2dd4d94f50df4bd97bb087f4903df33e600bf0061e523eda0fe65', '1980-01-01', 1, 0),
(4, 'e723c6d9df1036fc101c3e02a9fb4c46d30c64406290911f9e96f174ebea60e9', '2000-01-01', 1, 0),
(8, 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '1990-12-21', 3, 1),
(9, '50edfd688ab49936bbe48f10aaa5fc546782ea9961f9a2c88044725d39a5de22', '1992-07-11', 1, 1),
(10, '1db26350a1f2dd4d94f50df4bd97bb087f4903df33e600bf0061e523eda0fe65', '1990-01-12', 1, 0),
(11, 'e723c6d9df1036fc101c3e02a9fb4c46d30c64406290911f9e96f174ebea60e9', '2023-10-05', 1, 0),
(12, '50edfd688ab49936bbe48f10aaa5fc546782ea9961f9a2c88044725d39a5de22', '1992-07-11', 2, 1),
(13, '1db26350a1f2dd4d94f50df4bd97bb087f4903df33e600bf0061e523eda0fe65', '1990-01-12', 3, 0),
(14, 'e723c6d9df1036fc101c3e02a9fb4c46d30c64406290911f9e96f174ebea60e9', '2023-10-05', 4, 0),
(15, '50edfd688ab49936bbe48f10aaa5fc546782ea9961f9a2c88044725d39a5de22', '1992-07-11', 1, 1),
(16, '1db26350a1f2dd4d94f50df4bd97bb087f4903df33e600bf0061e523eda0fe65', '1990-01-12', 2, 0),
(17, 'e723c6d9df1036fc101c3e02a9fb4c46d30c64406290911f9e96f174ebea60e9', '2023-10-05', 3, 0),
(18, 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '1990-12-21', 3, 1),
(19, '50edfd688ab49936bbe48f10aaa5fc546782ea9961f9a2c88044725d39a5de22', '1992-07-11', 1, 1),
(20, '1db26350a1f2dd4d94f50df4bd97bb087f4903df33e600bf0061e523eda0fe65', '1990-01-12', 1, 0),
(21, 'e723c6d9df1036fc101c3e02a9fb4c46d30c64406290911f9e96f174ebea60e9', '2023-10-05', 1, 0),
(22, '937991636470c01b675168858098b9645b131035176300a1609697512196974', '2000-03-10', 2, 1),
(23, '17651629215533030538808305640427887865907042666686340060936529', '1995-08-25', 3, 0),
(24, '4956325050221268979744060607582930834264196385071192201282266', '1987-06-02', 4, 1),
(25, '3910290731347450850964176221945988071689802273766297819899364', '1998-09-27', 1, 0),
(26, '4811827072088243848901410744700996963179686413788032166138495', '2003-02-14', 2, 1),
(27, 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '1990-12-21', 3, 1),
(28, '50edfd688ab49936bbe48f10aaa5fc546782ea9961f9a2c88044725d39a5de22', '1992-07-11', 1, 1),
(29, '1db26350a1f2dd4d94f50df4bd97bb087f4903df33e600bf0061e523eda0fe65', '1990-01-12', 1, 0),
(30, 'e723c6d9df1036fc101c3e02a9fb4c46d30c64406290911f9e96f174ebea60e9', '2023-10-05', 1, 0),
(31, '937991636470c01b675168858098b9645b131035176300a1609697512196974', '2000-03-10', 2, 1),
(32, '17651629215533030538808305640427887865907042666686340060936529', '1995-08-25', 3, 0),
(33, '4956325050221268979744060607582930834264196385071192201282266', '1987-06-02', 4, 1),
(34, '3910290731347450850964176221945988071689802273766297819899364', '1998-09-27', 1, 0),
(35, '4811827072088243848901410744700996963179686413788032166138495', '2003-02-14', 2, 1);

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
  ADD KEY `agresor` (`id_agresor`),
  ADD KEY `modalidad` (`id_modalidad`),
  ADD KEY `tipo` (`id_tipo`),
  ADD KEY `id_usuarie` (`id_usuarie`) USING BTREE;

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
  MODIFY `id_agresor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `alturas`
--
ALTER TABLE `alturas`
  MODIFY `id_altura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `descargos`
--
ALTER TABLE `descargos`
  MODIFY `id_descargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
  MODIFY `id_usuarie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
