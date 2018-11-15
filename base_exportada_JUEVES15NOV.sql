-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.23 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para drive_unac
CREATE DATABASE IF NOT EXISTS `drive_unac` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `drive_unac`;

-- Volcando estructura para tabla drive_unac.archivo
CREATE TABLE IF NOT EXISTS `archivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(40) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `tipo_archivo` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_usser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_curso_archivo` (`id_curso`),
  KEY `fk_id_user_archivo` (`id_usser`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.archivo: 17 rows
/*!40000 ALTER TABLE `archivo` DISABLE KEYS */;
INSERT INTO `archivo` (`id`, `titulo`, `descripcion`, `tipo_archivo`, `id_curso`, `id_usser`) VALUES
	(1, 'Syllabus blandos', 'loremipsum dolor detsmani logiigion ..', 1, 6, 1),
	(2, 'sistemas blandos', 'loremipsum dolor detsmani logiigion ..', 2, 6, 1),
	(3, 'sistemas blandos', 'loremipsum dolor detsmani logiigion ..', 2, 6, 1),
	(4, 'sistemas blandos', 'loremipsum dolor detsmani logiigion ..', 2, 7, 1),
	(5, 'sistemas blandos', 'loremipsum dolor detsmani logiigion ..', 2, 7, 1),
	(6, 'sistemas blandos', 'loremipsum dolor detsmani logiigion ..', 1, 8, 1),
	(9, 'fisica_sylabus', 'fisica fisica fisica', 1, 2, 1),
	(10, 'fisica_sylabus', 'fisica fisica fisica', 2, 2, 1),
	(11, 'arquitectura de sylabus', 'fisica fisica fisica', 1, 3, 1),
	(12, 'arquitectura de sistemas', 'quimica quimica qimicaa', 2, 3, 1),
	(13, 'arquitectura de sistemas', 'quimica quimica quimca', 2, 3, 1),
	(14, 'fisica_sylabus', 'fisica fisica fisica', 2, 2, 1),
	(15, 'fisica_sylabus', 'fisica fisica fisica', 2, 2, 1),
	(19, 'titulo archivo subido', 'descripcion del archivo subido', 2, 3, 1),
	(17, 'arquitectura de sistemas', 'quimica quimica qimicaa', 2, 3, 1),
	(18, 'arquitectura de sistemas', 'quimica quimica quimca', 2, 3, 1),
	(21, 'titulo archivo subido', 'descripcion del archivo subido', 2, 3, 1);
/*!40000 ALTER TABLE `archivo` ENABLE KEYS */;

-- Volcando estructura para tabla drive_unac.curso
CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(50) NOT NULL,
  `activado` int(11) DEFAULT '0',
  PRIMARY KEY (`id_curso`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.curso: 7 rows
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` (`id_curso`, `nombre_curso`, `activado`) VALUES
	(1, 'QUIMICA', 1),
	(2, 'FISICA', 0),
	(3, 'ARQUITECTURA DEL COMPUTADOR', 1),
	(4, 'ANALISIS DE SISTEMAS', 1),
	(5, 'BASE DE DATOS', 1),
	(6, 'TALLER DE BASE DE DATOS', 1),
	(7, 'PROGRAMACION AVANZADA', 1);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;

-- Volcando estructura para tabla drive_unac.detalle_curso_prof
CREATE TABLE IF NOT EXISTS `detalle_curso_prof` (
  `id_detallecp` int(11) NOT NULL AUTO_INCREMENT,
  `id_curso` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_detallecp`),
  KEY `fk_curso_prof` (`id_curso`),
  KEY `fk_user_prof` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.detalle_curso_prof: 14 rows
/*!40000 ALTER TABLE `detalle_curso_prof` DISABLE KEYS */;
INSERT INTO `detalle_curso_prof` (`id_detallecp`, `id_curso`, `id_user`) VALUES
	(1, 1, 1),
	(2, 2, 1),
	(3, 3, 1),
	(4, 4, 2),
	(5, 5, 2),
	(6, 6, 4),
	(7, 7, 4),
	(8, 1, 3),
	(9, 2, 3),
	(10, 3, 3),
	(11, 4, 3),
	(12, 5, 5),
	(13, 6, 5),
	(14, 7, 5);
/*!40000 ALTER TABLE `detalle_curso_prof` ENABLE KEYS */;

-- Volcando estructura para tabla drive_unac.horario
CREATE TABLE IF NOT EXISTS `horario` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `id_curso` int(11) NOT NULL,
  `dia_asignado` varchar(20) DEFAULT NULL,
  `horainicio` varchar(10) DEFAULT NULL,
  `horafin` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_horario`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.horario: 14 rows
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
INSERT INTO `horario` (`id_horario`, `id_curso`, `dia_asignado`, `horainicio`, `horafin`) VALUES
	(1, 1, 'Lunes', '10:00', '13:30'),
	(2, 1, 'Jueves', '08:00', '12:30'),
	(3, 2, 'Lunes', '10:00', '13:30'),
	(4, 2, 'Jueves', '08:00', '12:30'),
	(5, 3, 'Lunes', '10:00', '13:30'),
	(6, 3, 'Jueves', '08:00', '12:30'),
	(7, 4, 'Lunes', '10:00', '13:30'),
	(8, 5, 'Jueves', '08:00', '12:30'),
	(9, 5, 'Lunes', '10:00', '13:30'),
	(10, 5, 'Jueves', '08:00', '12:30'),
	(11, 6, 'Lunes', '10:00', '13:30'),
	(12, 6, 'Jueves', '08:00', '12:30'),
	(13, 7, 'Lunes', '10:00', '13:30'),
	(17, 7, 'Lunes', '10:00', '13:30');
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;

-- Volcando estructura para tabla drive_unac.nivel
CREATE TABLE IF NOT EXISTS `nivel` (
  `id_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(20) NOT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.nivel: 2 rows
/*!40000 ALTER TABLE `nivel` DISABLE KEYS */;
INSERT INTO `nivel` (`id_nivel`, `nivel`) VALUES
	(1, 'profesor'),
	(2, 'alumno');
/*!40000 ALTER TABLE `nivel` ENABLE KEYS */;

-- Volcando estructura para tabla drive_unac.prueba
CREATE TABLE IF NOT EXISTS `prueba` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.prueba: 3 rows
/*!40000 ALTER TABLE `prueba` DISABLE KEYS */;
INSERT INTO `prueba` (`codigo`, `descripcion`) VALUES
	(1, 'dsfsdfsdf'),
	(2, 'sdfdsgg'),
	(3, 'jjjjjfjfgf');
/*!40000 ALTER TABLE `prueba` ENABLE KEYS */;

-- Volcando estructura para tabla drive_unac.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `nivel` int(11) NOT NULL,
  `nombres` varchar(40) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `correo` varchar(40) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.usuario: 5 rows
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`codigo`, `usuario`, `contrasena`, `nivel`, `nombres`, `dni`, `correo`, `telefono`, `imagen`) VALUES
	(1, 'casazola', '12345', 1, 'Oswaldo Daniel Cazasola Salas', 12345678, 'cazasolad@gmail.com', 258963147, 'moto.jpg'),
	(2, 'ever', '12345', 1, 'Ever Rosales Peña', 12345678, 'everjrosalesp@gmail.com', 258963147, 'zapatilla.jpg'),
	(3, 'cinthia', '12345', 2, 'Cinthia Maria Eduardo Ortiz', 12345678, 'cinthia_154_aries@gmail.com', 258963147, 'moldimix.jpg'),
	(4, 'fiorela', '12345', 1, 'Fiorella Armuto Quispe', 14785236, 'fiorella.armutoq@gmail.com', 951357486, 'carita.jpg'),
	(5, 'luis', '12345', 2, 'Luis Alberto Chavarria Chavez', 4568712, 'luis.a.chavarria@gmail.com', 258932147, 'fotoluis.jpg');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Volcando estructura para vista drive_unac.view_curso_detalle
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `view_curso_detalle` (
	`nombre_curso` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_curso` INT(11) NOT NULL,
	`activado` INT(11) NULL,
	`id_user` INT(11) NOT NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista drive_unac.view_horario_curso
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `view_horario_curso` (
	`id_curso` INT(11) NOT NULL,
	`dia_asignado` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`horainicio` VARCHAR(10) NULL COLLATE 'latin1_swedish_ci',
	`horafin` VARCHAR(10) NULL COLLATE 'latin1_swedish_ci',
	`nombre_curso` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Volcando estructura para vista drive_unac.view_mapa_usuario
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `view_mapa_usuario` (
	`id_curso` INT(11) NOT NULL,
	`dia_asignado` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`horainicio` VARCHAR(10) NULL COLLATE 'latin1_swedish_ci',
	`horafin` VARCHAR(10) NULL COLLATE 'latin1_swedish_ci',
	`nombre_curso` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_user` INT(11) NOT NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista drive_unac.view_curso_detalle
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `view_curso_detalle`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_curso_detalle` AS select `c`.`nombre_curso` AS `nombre_curso`,`c`.`id_curso` AS `id_curso`,`c`.`activado` AS `activado`,`dt`.`id_user` AS `id_user` from (`curso` `c` join `detalle_curso_prof` `dt` on((`c`.`id_curso` = `dt`.`id_curso`)));

-- Volcando estructura para vista drive_unac.view_horario_curso
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `view_horario_curso`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_horario_curso` AS select `h`.`id_curso` AS `id_curso`,`h`.`dia_asignado` AS `dia_asignado`,`h`.`horainicio` AS `horainicio`,`h`.`horafin` AS `horafin`,`c`.`nombre_curso` AS `nombre_curso` from (`horario` `h` join `curso` `c` on((`h`.`id_curso` = `c`.`id_curso`)));

-- Volcando estructura para vista drive_unac.view_mapa_usuario
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `view_mapa_usuario`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_mapa_usuario` AS select `h`.`id_curso` AS `id_curso`,`h`.`dia_asignado` AS `dia_asignado`,`h`.`horainicio` AS `horainicio`,`h`.`horafin` AS `horafin`,`dt`.`nombre_curso` AS `nombre_curso`,`dt`.`id_user` AS `id_user` from (`horario` `h` join `view_curso_detalle` `dt` on((`h`.`id_curso` = `dt`.`id_curso`)));

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
