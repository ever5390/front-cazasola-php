-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.17 - MySQL Community Server (GPL)
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
  `titulo` varchar(80) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `tipo_archivo` int(11) NOT NULL,
  `id_detallecp` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detallecp_archivo` (`id_detallecp`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.archivo: 15 rows
/*!40000 ALTER TABLE `archivo` DISABLE KEYS */;
INSERT INTO `archivo` (`id`, `titulo`, `descripcion`, `tipo_archivo`, `id_detallecp`) VALUES
	(65, 'soldimix.jpg', 'descripcion del archivo subido', 1, 4),
	(64, 'pelota.jpg', 'descripcion del archivo subido', 1, 2),
	(58, 'anillo.png', 'descripcion del archivo subido', 1, 3),
	(78, 'Scrum Certiffication Pre +Scrum Master+ Agile Scrum Training.png', 'descripcion del archivo subido', 2, 1),
	(79, 'Scrum Certiffication Pre +Scrum Master+ Agile Scrum Training.png', 'descripcion del archivo subido', 2, 3),
	(74, 'maquinaria.jpg', 'descripcion del archivo subido', 2, 1),
	(66, 'anillo.png', 'descripcion del archivo subido', 2, 4),
	(67, 'zapatilla.jpg', 'descripcion del archivo subido', 1, 5),
	(68, 'moto.jpg', 'descripcion del archivo subido', 1, 8),
	(69, 'reloj.png', 'descripcion del archivo subido', 2, 8),
	(76, 'Scrum Certiffication Pre +Scrum Master+ ', 'descripcion del archivo subido', 2, 1),
	(72, 'soldimix.jpg', 'descripcion del archivo subido', 2, 8),
	(73, 'Scrum Certiffication Pre +Scrum Master+ ', 'descripcion del archivo subido', 1, 1),
	(80, 'Scrum Certiffication Pre +Scrum Master+ Agile Scrum Training.png', 'descripcion del archivo subido', 2, 3),
	(81, 'KrugerCV_Update_forBCP.docx', 'descripcion del archivo subido', 2, 3);
/*!40000 ALTER TABLE `archivo` ENABLE KEYS */;

-- Volcando estructura para tabla drive_unac.curso
CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(50) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.curso: 7 rows
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` (`id_curso`, `nombre_curso`) VALUES
	(1, 'QUIMICA'),
	(2, 'FISICA'),
	(3, 'ARQUITECTURA DEL COMPUTADOR'),
	(4, 'ANALISIS DE SISTEMAS'),
	(5, 'BASE DE DATOS'),
	(6, 'TALLER DE BASE DE DATOS'),
	(7, 'PROGRAMACION AVANZADA');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;

-- Volcando estructura para tabla drive_unac.detalle_curso_prof
CREATE TABLE IF NOT EXISTS `detalle_curso_prof` (
  `id_detallecp` int(11) NOT NULL AUTO_INCREMENT,
  `id_curso` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `habilitado` int(1) NOT NULL,
  PRIMARY KEY (`id_detallecp`),
  KEY `fk_curso_prof` (`id_curso`),
  KEY `fk_user_prof` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.detalle_curso_prof: 9 rows
/*!40000 ALTER TABLE `detalle_curso_prof` DISABLE KEYS */;
INSERT INTO `detalle_curso_prof` (`id_detallecp`, `id_curso`, `id_user`, `habilitado`) VALUES
	(1, 1, 1, 0),
	(2, 2, 1, 0),
	(3, 3, 1, 1),
	(4, 4, 2, 1),
	(5, 5, 2, 1),
	(6, 6, 4, 0),
	(7, 7, 4, 0),
	(8, 1, 4, 1),
	(9, 2, 4, 0);
/*!40000 ALTER TABLE `detalle_curso_prof` ENABLE KEYS */;

-- Volcando estructura para tabla drive_unac.horario
CREATE TABLE IF NOT EXISTS `horario` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `id_detallecp` int(11) NOT NULL,
  `dia_asignado` varchar(20) DEFAULT NULL,
  `horainicio` varchar(10) DEFAULT NULL,
  `horafin` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_horario`),
  KEY `fk_detallecp` (`id_detallecp`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.horario: 18 rows
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
INSERT INTO `horario` (`id_horario`, `id_detallecp`, `dia_asignado`, `horainicio`, `horafin`) VALUES
	(1, 1, 'Lunes', '10:00', '13:30'),
	(2, 1, 'Jueves', '08:00', '12:30'),
	(3, 2, 'Martes', '10:00', '13:30'),
	(4, 2, 'Miercoles', '08:00', '12:30'),
	(5, 3, 'Lunes', '10:00', '13:30'),
	(6, 3, 'Viernes', '08:00', '12:30'),
	(7, 4, 'Lunes', '10:00', '13:30'),
	(8, 4, 'Jueves', '08:00', '12:30'),
	(9, 5, 'Miercoles', '08:00', '12:30'),
	(10, 5, 'Jueves', '10:00', '13:30'),
	(11, 6, 'Viernes', '08:00', '12:30'),
	(12, 6, 'Sabado', '10:00', '13:30'),
	(13, 7, 'Martes', '08:00', '12:30'),
	(14, 7, 'Viernes', '10:00', '13:30'),
	(15, 8, 'Lunes', '08:00', '12:30'),
	(16, 8, 'Miercoles', '10:00', '13:30'),
	(17, 9, 'Martes', '08:00', '12:30'),
	(18, 9, 'Viernes', '10:00', '13:30');
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;

-- Volcando estructura para tabla drive_unac.matricula_alumno
CREATE TABLE IF NOT EXISTS `matricula_alumno` (
  `id_matricula` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_detallecp` int(11) NOT NULL,
  PRIMARY KEY (`id_matricula`),
  KEY `fk_id_detalle` (`id_detallecp`),
  KEY `fk_id_user` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.matricula_alumno: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `matricula_alumno` DISABLE KEYS */;
INSERT INTO `matricula_alumno` (`id_matricula`, `id_usuario`, `id_detallecp`) VALUES
	(1, 3, 1),
	(2, 3, 2),
	(3, 3, 3),
	(4, 3, 4),
	(5, 5, 5),
	(6, 5, 6),
	(7, 5, 2);
/*!40000 ALTER TABLE `matricula_alumno` ENABLE KEYS */;

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

-- Volcando estructura para tabla drive_unac.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `nivel` int(11) NOT NULL,
  `nombres` varchar(40) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `correo` varchar(40) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.usuario: 5 rows
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `usuario`, `contrasena`, `nivel`, `nombres`, `dni`, `correo`, `telefono`, `imagen`) VALUES
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
	`id_detallecp` INT(11) NOT NULL,
	`id_user` INT(11) NOT NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista drive_unac.view_curso_detalle
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `view_curso_detalle`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_curso_detalle` AS select c.nombre_curso, dt.id_detallecp, dt.id_user
	from curso as c
	inner join detalle_curso_prof as dt
	on c.id_curso = dt.id_curso ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
