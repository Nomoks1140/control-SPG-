-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2021 a las 02:57:07
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control_sp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `cargo` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `cargo`) VALUES
(1, 'vigilante '),
(2, 'escolta '),
(3, 'medios tecnologicos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `ciudad` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `ciudad`) VALUES
(1, 'bogota '),
(2, 'medellin '),
(3, 'cali'),
(4, 'barranquilla '),
(5, 'cartagena de indias '),
(6, 'soacha'),
(7, 'cucuta'),
(8, 'soledad'),
(9, 'bucaramanga'),
(10, 'antioquia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `usuario` varchar(300) DEFAULT NULL,
  `nit` int(11) DEFAULT NULL,
  `nombre_entidad` varchar(300) DEFAULT NULL,
  `correo` varchar(300) DEFAULT NULL,
  `contraseña` varchar(300) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `id_ciudad` int(11) DEFAULT NULL,
  `id_vacante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia`
--

CREATE TABLE `experiencia` (
  `id_experiencia` int(11) NOT NULL,
  `nombre_entidad` varchar(300) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `fecha_inicio_empresa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion`
--

CREATE TABLE `formacion` (
  `id_formacion` int(11) NOT NULL,
  `nombre_institucion` varchar(300) DEFAULT NULL,
  `id_nivel_educativo` int(11) DEFAULT NULL,
  `id_grado_escolaridad` int(11) DEFAULT NULL,
  `diploma` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formacion`
--

INSERT INTO `formacion` (`id_formacion`, `nombre_institucion`, `id_nivel_educativo`, `id_grado_escolaridad`, `diploma`) VALUES
(1, 'colegio', 2, 3, '368546454_48622839.pdf'),
(2, 'colegio', 2, 3, '368546454_48622839.pdf'),
(3, 'colegio', 2, 3, '368546454_48622839.pdf'),
(4, 'colegio', 2, 3, '368546454_48622839.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_escolaridad`
--

CREATE TABLE `grado_escolaridad` (
  `id_grado_escolaridad` int(11) NOT NULL,
  `grado_escolaridad` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grado_escolaridad`
--

INSERT INTO `grado_escolaridad` (`id_grado_escolaridad`, `grado_escolaridad`) VALUES
(1, '9°'),
(2, '10°'),
(3, '11°');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_educativo`
--

CREATE TABLE `nivel_educativo` (
  `id_nivel_educativo` int(11) NOT NULL,
  `nivel_educativo` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nivel_educativo`
--

INSERT INTO `nivel_educativo` (`id_nivel_educativo`, `nivel_educativo`) VALUES
(1, 'educacion basica'),
(2, 'educacion media');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulante`
--

CREATE TABLE `postulante` (
  `id_postulante` int(11) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `usuario` varchar(300) DEFAULT NULL,
  `nombre` varchar(300) DEFAULT NULL,
  `apellido` varchar(300) DEFAULT NULL,
  `correo` varchar(300) DEFAULT NULL,
  `contraseña` varchar(300) DEFAULT NULL,
  `contraseña2` varchar(300) DEFAULT NULL,
  `id_tipo_doc` int(11) DEFAULT NULL,
  `n_documento` int(11) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `id_ciudad` int(11) DEFAULT NULL,
  `id_formacion` int(11) DEFAULT NULL,
  `id_experiencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_postulante`
--

CREATE TABLE `registro_postulante` (
  `id_registro_postulante` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_postulante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'administrador '),
(2, 'postulante '),
(3, 'empresa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripcion`) VALUES
(1, 'admin'),
(2, 'data entry'),
(3, 'Empresa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `roleid` tinyint(4) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `username`, `email`, `password`, `mobile`, `roleid`, `isActive`, `created_at`, `updated_at`) VALUES
(23, 'achref', 'achref', 'achref.nefzazoui@gmail.com', '3ea543d29ad3c1c09fcfbdda3f2f0617c50ab138', '54852852', 1, 0, '2020-12-19 14:35:56', '2020-12-19 14:35:56'),
(24, 'ahmed', 'benahmed', 'achme@gmail.com', '7f0c9d56d40c3cc1e23e0113d5377779a4de86ff', '54277528', 3, 0, '2020-12-19 15:13:39', '2020-12-19 15:13:39'),
(25, 'Fathi', 'fathiA', 'fathianh@gmail.com', '0a859b9a4ebbde4f63383bca7e34890985782348', '54672828', 3, 0, '2020-12-19 15:15:52', '2020-12-19 15:15:52'),
(26, 'Makrem', 'makrem', 'makrem@gmail.com', 'adef7009a84a71c226ddf68671e929d68a707762', '42551771', 3, 0, '2020-12-19 15:16:59', '2020-12-19 15:16:59'),
(27, 'Sirin', 'Sirin', 'Sirin@gmail.com', '03ee5fda2eae80be34c0142fe28ac6401e63324c', '23451671', 3, 0, '2020-12-19 15:17:34', '2020-12-19 15:17:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc`
--

CREATE TABLE `tipo_doc` (
  `id_tipo_doc` int(11) NOT NULL,
  `tipo_doc` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_doc`
--

INSERT INTO `tipo_doc` (`id_tipo_doc`, `tipo_doc`) VALUES
(1, 'cedula de ciudadania '),
(2, 'documento de extranjeria ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `idRol`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 2),
(3, 'demo2', '1066726e7160bd9c987c9968e0cc275a', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacante`
--

CREATE TABLE `vacante` (
  `id_vacante` int(11) NOT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `id_registro_postulante` int(11) DEFAULT NULL,
  `descripcion` varchar(3000) DEFAULT NULL,
  `salario` int(11) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_cierre` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vacante`
--

INSERT INTO `vacante` (`id_vacante`, `id_cargo`, `id_registro_postulante`, `descripcion`, `salario`, `fecha_creacion`, `fecha_cierre`) VALUES
(19, 2, NULL, 'apoyar el areas', 45346456, '2021-09-16', '2021-09-15'),
(21, 1, NULL, '', 0, '0000-00-00', '0000-00-00'),
(22, 2, NULL, 'apoyar el area de sistemas', 1000591739, '2021-10-06', '2021-10-06'),
(23, 1, NULL, 'apoayr el area', 12000000, '2021-10-06', '2021-10-06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `fk_id_rol_cargo` (`id_rol`),
  ADD KEY `fk_ciudad_empresa` (`id_ciudad`),
  ADD KEY `fk_vacante_empresa` (`id_vacante`);

--
-- Indices de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`id_experiencia`),
  ADD KEY `fk_id_cargo_experiencia` (`id_cargo`);

--
-- Indices de la tabla `formacion`
--
ALTER TABLE `formacion`
  ADD PRIMARY KEY (`id_formacion`),
  ADD KEY `fk_id_nivel_educativo` (`id_nivel_educativo`),
  ADD KEY `fk_id_grado_escolaridad_formacion` (`id_grado_escolaridad`);

--
-- Indices de la tabla `grado_escolaridad`
--
ALTER TABLE `grado_escolaridad`
  ADD PRIMARY KEY (`id_grado_escolaridad`);

--
-- Indices de la tabla `nivel_educativo`
--
ALTER TABLE `nivel_educativo`
  ADD PRIMARY KEY (`id_nivel_educativo`);

--
-- Indices de la tabla `postulante`
--
ALTER TABLE `postulante`
  ADD PRIMARY KEY (`id_postulante`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `fk_rol_postulante` (`id_rol`),
  ADD KEY `fk_id_tipo_doc_postulante` (`id_tipo_doc`),
  ADD KEY `fk_id_ciudad_postulante` (`id_ciudad`),
  ADD KEY `fk_id_formacion_postulante` (`id_formacion`),
  ADD KEY `fk_id_experiencia_postulante` (`id_experiencia`);

--
-- Indices de la tabla `registro_postulante`
--
ALTER TABLE `registro_postulante`
  ADD PRIMARY KEY (`id_registro_postulante`),
  ADD KEY `fk_postulante_registo` (`id_postulante`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  ADD PRIMARY KEY (`id_tipo_doc`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `vacante`
--
ALTER TABLE `vacante`
  ADD PRIMARY KEY (`id_vacante`),
  ADD KEY `fk_cargo_vacante` (`id_cargo`),
  ADD KEY `fk_registro_postulante_vacante` (`id_registro_postulante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  MODIFY `id_experiencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formacion`
--
ALTER TABLE `formacion`
  MODIFY `id_formacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `grado_escolaridad`
--
ALTER TABLE `grado_escolaridad`
  MODIFY `id_grado_escolaridad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nivel_educativo`
--
ALTER TABLE `nivel_educativo`
  MODIFY `id_nivel_educativo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `postulante`
--
ALTER TABLE `postulante`
  MODIFY `id_postulante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `registro_postulante`
--
ALTER TABLE `registro_postulante`
  MODIFY `id_registro_postulante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  MODIFY `id_tipo_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vacante`
--
ALTER TABLE `vacante`
  MODIFY `id_vacante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_ciudad_empresa` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`),
  ADD CONSTRAINT `fk_id_rol_cargo` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `fk_vacante_empresa` FOREIGN KEY (`id_vacante`) REFERENCES `vacante` (`id_vacante`);

--
-- Filtros para la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD CONSTRAINT `fk_id_cargo_experiencia` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`);

--
-- Filtros para la tabla `formacion`
--
ALTER TABLE `formacion`
  ADD CONSTRAINT `fk_id_grado_escolaridad_formacion` FOREIGN KEY (`id_grado_escolaridad`) REFERENCES `grado_escolaridad` (`id_grado_escolaridad`),
  ADD CONSTRAINT `fk_id_nivel_educativo` FOREIGN KEY (`id_nivel_educativo`) REFERENCES `nivel_educativo` (`id_nivel_educativo`);

--
-- Filtros para la tabla `postulante`
--
ALTER TABLE `postulante`
  ADD CONSTRAINT `fk_id_ciudad_postulante` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`),
  ADD CONSTRAINT `fk_id_experiencia_postulante` FOREIGN KEY (`id_experiencia`) REFERENCES `experiencia` (`id_experiencia`),
  ADD CONSTRAINT `fk_id_formacion_postulante` FOREIGN KEY (`id_formacion`) REFERENCES `formacion` (`id_formacion`),
  ADD CONSTRAINT `fk_id_tipo_doc_postulante` FOREIGN KEY (`id_tipo_doc`) REFERENCES `tipo_doc` (`id_tipo_doc`),
  ADD CONSTRAINT `fk_rol_postulante` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `registro_postulante`
--
ALTER TABLE `registro_postulante`
  ADD CONSTRAINT `fk_postulante_registo` FOREIGN KEY (`id_postulante`) REFERENCES `postulante` (`id_postulante`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `vacante`
--
ALTER TABLE `vacante`
  ADD CONSTRAINT `fk_cargo_vacante` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`),
  ADD CONSTRAINT `fk_registro_postulante_vacante` FOREIGN KEY (`id_registro_postulante`) REFERENCES `registro_postulante` (`id_registro_postulante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
