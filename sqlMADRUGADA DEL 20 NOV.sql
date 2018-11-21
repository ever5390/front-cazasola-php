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
  `name_archivo` varchar(200) DEFAULT NULL,
  `descripcion` varchar(400) DEFAULT NULL,
  `tipo_archivo` int(11) NOT NULL,
  `id_detallecp` int(11) NOT NULL,
  `fecha_subida` datetime DEFAULT NULL,
  `fecha_entrega` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detallecp_archivo` (`id_detallecp`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.archivo: 28 rows
/*!40000 ALTER TABLE `archivo` DISABLE KEYS */;
INSERT INTO `archivo` (`id`, `titulo`, `name_archivo`, `descripcion`, `tipo_archivo`, `id_detallecp`, `fecha_subida`, `fecha_entrega`) VALUES
	(65, 'soldimix.jpg', 'soldimix.jpg', 'descripcion del archivo subido', 1, 4, '2018-11-19 18:12:09', '2018-10-12 00:00:00'),
	(64, 'pelota.jpg', 'pelota.jpg', 'descripcion del archivo subido', 1, 2, '2018-11-19 18:12:11', '2018-10-12 00:00:00'),
	(79, 'Scrum Certiffication Pre +Scrum Master+ Agile Scrum Training.png', 'Scrum Certiffication Pre +Scrum Master+ Agile Scrum Training.png', 'You learned from our CSS Colors Chapter, that you ', 2, 3, '2018-11-19 18:12:17', '2018-10-12 00:00:00'),
	(66, 'anillo.png', 'anillo.png', 'You learned from our CSS Colors Chapter, that you ', 2, 4, '2018-11-19 18:12:17', '2018-10-12 00:00:00'),
	(67, 'zapatilla.jpg', 'zapatilla.jpg', 'descripcion del archivo subido', 1, 5, '2018-11-19 18:12:12', '2018-10-12 00:00:00'),
	(68, 'moto.jpg', 'moto.jpg', 'descripcion del archivo subido', 1, 8, '2018-11-19 18:12:13', '2018-10-12 00:00:00'),
	(69, 'reloj.png', 'reloj.png', 'You learned from our CSS Colors Chapter, that you ', 2, 8, '2018-11-19 18:12:18', '2018-10-12 00:00:00'),
	(76, 'Scrum Certiffication Pre +Scrum Master+ ', 'Scrum Certiffication Pre +Scrum Master+ ', 'You learned from our CSS Colors Chapter, that you ', 2, 1, '2018-11-19 18:12:19', '2018-10-12 00:00:00'),
	(72, 'soldimix.jpg', 'soldimix.jpg', 'You learned from our CSS Colors Chapter, that you ', 2, 8, '2018-11-19 18:12:19', '2018-10-12 00:00:00'),
	(80, 'Scrum Certiffication Pre +Scrum Master+ Agile Scrum Training.png', 'Scrum Certiffication Pre +Scrum Master+ Agile Scrum Training.png', 'You learned from our CSS Colors Chapter, that you ', 2, 3, '2018-11-19 18:12:20', '2018-10-12 00:00:00'),
	(81, 'KrugerCV_Update_forBCP.docx', 'KrugerCV_Update_forBCP.docx', 'You learned from our CSS Colors Chapter, that you ', 2, 3, '2018-11-19 18:12:21', '2018-10-12 00:00:00'),
	(111, 'photo-1524327952560-2ae9581d0493.jpg', 'photo-1524327952560-2ae9581d0493.jpg', 'werwerwr', 2, 3, '2018-11-20 17:23:05', '2018-11-17 00:00:00'),
	(110, 'photo-1524327952560-2ae9581d0493.jpg', 'photo-1524327952560-2ae9581d0493.jpg', 'werwerw', 1, 3, '2018-11-20 17:21:36', '2018-11-17 00:00:00'),
	(115, 'Subida de Prueba para Actividades', 'carrito-compras.html', 'llamar a PDOStatement::bindParam() y/o PDOStatement::bindValue() para vincular variables o valores (respectivamente) a los marcadores de parÃ¡metros. Las variables vinculadas pasan su valor como ', 2, 6, '2018-11-20 17:52:37', '2018-12-20 00:00:00'),
	(106, 'Confirmar reenvÃ­o del formulario', 'Confirmar reenvÃ­o del formulario', 'Esta pÃ¡gina web necesita los datos ingresados anteriormente para mostrarse correctamente. Puedes volver a enviar los datos, pero ten en cuenta que se repetirÃ¡n las acciones que la pÃ¡gina haya realizado anteriormente.', 2, 1, '2018-11-20 01:55:50', '2018-11-17 00:00:00'),
	(104, 'Type your audience targeting rule here.', 'Type your audience targeting rule here.', 'Why doesn\'t this work? The label is inside the .item parent. I don\'t wanna put it outside of block elements as it wouldn\'t be valid.\r\nSo I\'m trying to simulate a label click:', 2, 2, '2018-11-20 00:13:09', '2018-11-28 00:00:00'),
	(105, 'DO_SIS_Requisitos_Hardware_Big_Data_V9 (1).pdf', 'DO_SIS_Requisitos_Hardware_Big_Data_V9 (1).pdf', 'DO_SIS_Requisitos_Hardware_Big_Data_V9 (1).pdf', 2, 2, '2018-11-20 00:19:28', '2018-11-30 00:00:00'),
	(109, 'Proyecto de Sistemas Formulacion de Casos', 'KrugerCV_Update_forBCP.docx', 'Controla cÃ³mo tus datos permiten que Google funcione mejor para ti\r\n\r\n', 2, 4, '2018-11-20 05:36:38', '2018-11-25 00:00:00'),
	(114, 'Sillabus Archivo de Prueba subida ', 'style_insertar.css', 'llamar a PDOStatement::bindParam() y/o PDOStatement::bindValue() para vincular variables o valores (respectivamente) a los marcadores de parÃ¡metros. Las variables vinculadas pasan su valor como ', 1, 6, '2018-11-20 17:52:04', '2018-12-14 00:00:00'),
	(116, 'taller de base de datos sally', 'callao_sally.docx', 'asfs fa fs s ', 2, 4, '2018-11-20 19:36:11', '2018-11-25 00:00:00'),
	(119, 'DO_SIS_Requisitos_Hardware_Big_Data_V9 (1).pdf', 'DO_SIS_Requisitos_Hardware_Big_Data_V9 (1).pdf', 'rturtrt rtu rtu r', 1, 1, '2018-11-20 21:28:48', '2018-11-30 00:00:00'),
	(120, 'callao_sally.docx', 'callao_sally.docx', 'kkkkkkkkkkkkkkkkkkkkk', 2, 6, '2018-11-20 21:31:28', '2018-11-23 00:00:00'),
	(121, 'queryTienda.sql', 'queryTienda.sql', 'kllllllllllllllllllllllllllllll', 2, 6, '2018-11-20 21:31:50', '2018-11-24 00:00:00'),
	(124, 'typeFileMultiplenameArray.PNG', 'typeFileMultiplenameArray.PNG', 'uuuuuuuuuuuuuuuuuuuuuuu', 2, 8, '2018-11-20 21:33:03', '2018-12-04 00:00:00'),
	(125, 'Captura.PNG', 'Captura.PNG', 'ffffffffffffffffffffffff', 1, 8, '2018-11-20 21:33:22', '2018-11-23 00:00:00'),
	(126, 'Anillo de Compromiso', 'placa madre.jpg', 'asd asfasfasas asf asf asfas fas fas fas fa ', 1, 9, '2018-11-20 21:34:31', '2018-11-23 00:00:00');
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

-- Volcando estructura para tabla drive_unac.descargas_archivos_alumnos
CREATE TABLE IF NOT EXISTS `descargas_archivos_alumnos` (
  `id_descarga` int(11) NOT NULL AUTO_INCREMENT,
  `id_archivo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_detallecp` int(11) NOT NULL,
  `fecha_descarga` datetime DEFAULT NULL,
  PRIMARY KEY (`id_descarga`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_archivo` (`id_archivo`),
  KEY `id_detallecp` (`id_detallecp`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.descargas_archivos_alumnos: 27 rows
/*!40000 ALTER TABLE `descargas_archivos_alumnos` DISABLE KEYS */;
INSERT INTO `descargas_archivos_alumnos` (`id_descarga`, `id_archivo`, `id_usuario`, `id_detallecp`, `fecha_descarga`) VALUES
	(1, 69, 5, 8, NULL),
	(2, 68, 5, 8, '2018-11-20 16:15:19'),
	(3, 72, 5, 8, '2018-11-20 16:15:21'),
	(4, 103, 3, 1, '2018-11-20 16:15:07'),
	(5, 76, 3, 1, '2018-11-20 16:15:05'),
	(6, 106, 3, 1, '2018-11-20 16:15:08'),
	(7, 64, 3, 2, '2018-11-20 16:15:09'),
	(8, 104, 3, 2, '2018-11-20 16:15:10'),
	(9, 105, 3, 2, '2018-11-20 16:15:12'),
	(10, 64, 5, 2, '2018-11-20 16:15:09'),
	(11, 104, 5, 2, '2018-11-20 16:15:10'),
	(12, 105, 5, 2, '2018-11-20 16:15:11'),
	(13, 110, 3, 3, '2018-11-20 16:15:15'),
	(14, 79, 3, 3, '2018-11-20 16:15:13'),
	(15, 80, 3, 3, '2018-11-20 16:15:13'),
	(16, 81, 3, 3, '2018-11-20 16:15:14'),
	(17, 111, 3, 3, '2018-11-20 16:15:15'),
	(18, 114, 9, 6, '2018-11-20 16:15:16'),
	(19, 114, 5, 6, '2018-11-20 16:15:17'),
	(20, 103, 9, 1, '2018-11-20 16:15:06'),
	(21, 106, 9, 1, '2018-11-20 16:15:07'),
	(22, 68, 7, 8, '2018-11-20 16:15:18'),
	(23, 69, 7, 8, '2018-11-20 16:15:20'),
	(24, 72, 7, 8, '2018-11-20 16:15:22'),
	(25, 115, 8, 6, '2018-11-20 16:15:18'),
	(26, 114, 8, 6, '2018-11-20 16:15:16'),
	(27, 126, 8, 9, '2018-11-20 21:35:00');
/*!40000 ALTER TABLE `descargas_archivos_alumnos` ENABLE KEYS */;

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
	(1, 1, 1, 1),
	(2, 2, 1, 1),
	(3, 3, 1, 1),
	(4, 4, 2, 1),
	(5, 5, 2, 1),
	(6, 6, 4, 1),
	(7, 7, 4, 0),
	(8, 1, 4, 1),
	(9, 2, 4, 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.matricula_alumno: ~25 rows (aproximadamente)
/*!40000 ALTER TABLE `matricula_alumno` DISABLE KEYS */;
INSERT INTO `matricula_alumno` (`id_matricula`, `id_usuario`, `id_detallecp`) VALUES
	(1, 3, 1),
	(2, 3, 2),
	(3, 3, 3),
	(4, 3, 4),
	(5, 5, 5),
	(6, 5, 6),
	(7, 5, 2),
	(8, 5, 8),
	(9, 6, 1),
	(10, 6, 2),
	(11, 6, 3),
	(12, 6, 4),
	(13, 7, 4),
	(14, 7, 6),
	(15, 7, 8),
	(16, 7, 5),
	(17, 7, 3),
	(18, 8, 9),
	(19, 8, 7),
	(20, 8, 6),
	(21, 9, 1),
	(22, 9, 2),
	(23, 9, 5),
	(24, 9, 6),
	(25, 9, 3);
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.usuario: 9 rows
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `usuario`, `contrasena`, `nivel`, `nombres`, `dni`, `correo`, `telefono`, `imagen`) VALUES
	(1, 'casazola', '12345', 1, 'Oswaldo Daniel Cazasola Salas', 12345678, 'cazasolad@gmail.com', 258963147, 'moto.jpg'),
	(2, 'ever', '12345', 1, 'Ever Rosales Peña', 12345678, 'everjrosalesp@gmail.com', 258963147, 'zapatilla.jpg'),
	(3, 'cinthia', '12345', 2, 'Cinthia Maria Eduardo Ortiz', 12345678, 'cinthia_154_aries@gmail.com', 258963147, 'moldimix.jpg'),
	(4, 'fiorela', '12345', 1, 'Fiorella Armuto Quispe', 14785236, 'fiorella.armutoq@gmail.com', 951357486, 'carita.jpg'),
	(5, 'luis', '12345', 2, 'Luis Alberto Chavarria Chavez', 4568712, 'luis.a.chavarria@gmail.com', 258932147, 'fotoluis.jpg'),
	(6, 'carlos', '12345', 2, 'Carlos Alcantara Solis', 25874136, 'carlos.alcantara@gmail.com', 741258963, 'imagencarlos.jpg'),
	(7, 'juan', '12345', 2, 'Juan Albinagorta Perez', 98748563, 'juan.albinagorta@gmail.com', 591738426, 'juan.jpg'),
	(8, 'Ana', '12345', 2, 'Ana Ramos Breña', 456987123, 'ana.ramos@gmail.com', 897541236, 'ana.jpg'),
	(9, 'virna', '12345', 2, 'Virna Solis Huayanay', 12698745, 'virna.solis@gmail.com', 154879632, 'virna.jpg');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Volcando estructura para vista drive_unac.view_curso_detalle
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `view_curso_detalle` (
	`nombre_curso` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_curso` INT(11) NOT NULL,
	`id_detallecp` INT(11) NOT NULL,
	`id_user` INT(11) NOT NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista drive_unac.view_detalle_matricula
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `view_detalle_matricula` (
	`id_matricula` INT(11) NOT NULL,
	`id_usuario` INT(11) NOT NULL,
	`id_curso` INT(11) NOT NULL,
	`id_detallecp` INT(11) NOT NULL,
	`id_user` INT(11) NOT NULL,
	`habilitado` INT(1) NOT NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista drive_unac.view_curso_detalle
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `view_curso_detalle`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_curso_detalle` AS select `c`.`nombre_curso` AS `nombre_curso`, `c`.`id_curso` AS `id_curso` ,`dt`.`id_detallecp` AS `id_detallecp`,`dt`.`id_user` AS `id_user` 
from (`curso` `c` join `detalle_curso_prof` `dt` on((`c`.`id_curso` = `dt`.`id_curso`))) ;

-- Volcando estructura para vista drive_unac.view_detalle_matricula
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `view_detalle_matricula`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detalle_matricula` AS select `m`.`id_matricula` AS `id_matricula`,`m`.`id_usuario` AS `id_usuario`,`dt`.`id_curso` AS `id_curso`,`dt`.`id_detallecp` AS `id_detallecp`,`dt`.`id_user` AS `id_user`,`dt`.`habilitado` AS `habilitado` from (`matricula_alumno` `m` join `detalle_curso_prof` `dt` on((`m`.`id_detallecp` = `dt`.`id_detallecp`))) ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
