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
  `titulo` varchar(80) DEFAULT NULL,
  `name_archivo` varchar(80) DEFAULT NULL,
  `descripcion` varchar(900) DEFAULT NULL,
  `tipo_archivo` int(11) NOT NULL,
  `id_detallecp` int(11) NOT NULL,
  `fecha_subida` datetime DEFAULT NULL,
  `fecha_entrega` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detallecp_archivo` (`id_detallecp`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.archivo: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `archivo` DISABLE KEYS */;
INSERT INTO `archivo` (`id`, `titulo`, `name_archivo`, `descripcion`, `tipo_archivo`, `id_detallecp`, `fecha_subida`, `fecha_entrega`) VALUES
	(2, 'Big-Data-Data-Science(casos uso).pdf', 'Big-Data-Data-Science(casos uso).pdf', 'application/x-www-form-urlencoded: los espacios son reemplazados con signos mÃ¡s ("+") y los caracteres especiales son convertidos a valores HEX. Este es el valor por defecto.\r\nmultipart/form-data: no se aplica ninguna codificaciÃ³n. Este valor es necesario para la subida de archivos.\r\ntext/plain: solo los espacios son reemplazados por signos mÃ¡s ("+").application/x-www-form-urlencoded: los espacios son reemplazados con signos mÃ¡s ("+") y los caracteres especiales son convertidos a valores HEX. Este es el valor por defecto.\r\nmultipart/form-data: no se aplica ninguna codificaciÃ³n. Este valor es necesario para la subida de archivos.\r\ntext/plain: solo los espacios son reemplazados por signos mÃ¡s ("+").', 2, 1, '2018-11-27 15:13:24', '2018-11-30 00:00:00'),
	(3, 'Esta caracterÃ­stica permite la subida de ficheros de texto y binarios. Con la a', 'Big-Data-Data-Science(casos uso).pdf', 'Esta caracterÃ­stica permite la subida de ficheros de texto y binarios. Con la autenticaciÃ³n de PHP y las funciones de manipulaciÃ³n de ficheros se tiene control completo sobre quiÃ©n estÃ¡ autorizado a realizar una subida y quÃ© hay que hacer con el fichero una vez subido.\r\n\r\nPHP es capaz de recibir subidas de ficheros de cualquier navegador compatible con el RFC-1867.Esta caracterÃ­stica permite la subida de ficheros de texto y binarios. Con la autenticaciÃ³n de PHP y las funciones de manipulaciÃ³n de ficheros se tiene control completo sobre quiÃ©n estÃ¡ autorizado a realizar una subida y quÃ© hay que hacer con el fichero una vez subido.\r\n\r\nPHP es capaz de recibir subidas de ficheros de cualquier navegador compatible con el RFC-1867.Esta caracterÃ­stica permite la subida de ficheros de texto y binarios.', 2, 1, '2018-11-27 15:13:50', '2018-11-30 00:00:00'),
	(4, 'Big-Data-Data-Science(casos uso).pdf', 'Big-Data-Data-Science(casos uso).pdf', 'Usar URL amigables en nuestro sitio mejora el sitio, ademÃ¡s que es mÃ¡s fÃ¡cil para los usuarios recordar tu direcciÃ³n. Una de las cosas que debemos tener en cuenta para tener URLs amigables es ocultar la extensiÃ³n al final...Usar URL amigables en nuestro sitio mejora el sitio, ademÃ¡s que es mÃ¡s fÃ¡cil para los usuarios recordar tu direcciÃ³n. Una de las cosas que debemos tener en cuenta para tener URLs amigables es ocultar la extensiÃ³n al final...Usar URL amigables en nuestro sitio mejora el sitio, ademÃ¡s que es mÃ¡s fÃ¡cil para los usuarios recordar tu direcciÃ³n. Una de las cosas que debemos tener en cuenta para tener URLs amigables es ocultar la extensiÃ³n al final...Usar URL amigables en nuestro sitio mejora el sitio, ademÃ¡s que es mÃ¡s fÃ¡cil para los usuarios recordar tu direcciÃ³n. Una de las', 2, 1, '2018-11-27 15:14:51', '2018-11-29 00:00:00'),
	(5, 'CONVOCATORIA ETAPAS FECHAS.PNG', 'CONVOCATORIA ETAPAS FECHAS.PNG', 'Usar URL amigables en nuestro sitio mejora el sitio, ademÃ¡s que es mÃ¡s fÃ¡cil para los usuarios recordar tu direcciÃ³n. Una de las cosas que debemos tener en cuenta para tener URLs amigables es ocultar la extensiÃ³n al final...Usar URL amigables en nuestro sitio mejora el sitio, ademÃ¡s que es mÃ¡s fÃ¡cil para los usuarios recordar tu direcciÃ³n. Una de las cosas que debemos tener en cuenta para tener URLs amigables es ocultar la extensiÃ³n al final...Usar URL amigables en nuestro sitio mejora el sitio, ademÃ¡s que es mÃ¡s fÃ¡cil para los usuarios recordar tu direcciÃ³n. Una de las cosas que debemos tener en cuenta para tener URLs amigables es ocultar la extensiÃ³n al final...Usar URL amigables en nuestro sitio mejora el sitio, ademÃ¡s que es mÃ¡s fÃ¡cil para los usuarios recordar tu direcciÃ³n. Una de las', 2, 1, '2018-11-27 15:15:27', '2018-11-29 00:00:00'),
	(6, 'DISTRIBUCION DEL HORARIO EN LA SEMANA.docx', 'DISTRIBUCION DEL HORARIO EN LA SEMANA.docx', 'Usar URL amigables en nuestro sitio mejora el sitio, ademÃ¡s que es mÃ¡s fÃ¡cil para los usuarios recordar tu direcciÃ³n. Una de las cosas que debemos tener en cuenta para tener URLs amigables es ocultar la extensiÃ³n al final...Usar URL amigables en nuestro sitio mejora el sitio, ademÃ¡s que es mÃ¡s fÃ¡cil para los usuarios recordar tu direcciÃ³n. Una de las cosas que debemos tener en cuenta para tener URLs amigables es ocultar la extensiÃ³n al final...Usar URL amigables en nuestro sitio mejora el sitio, ademÃ¡s que es mÃ¡s fÃ¡cil para los usuarios recordar tu direcciÃ³n. Una de las cosas que debemos tener en cuenta para tener URLs amigables es ocultar la extensiÃ³n al final...Usar URL amigables en nuestro sitio mejora el sitio, ademÃ¡s que es mÃ¡s fÃ¡cil para los usuarios recordar tu direcciÃ³n. Una de las', 2, 1, '2018-11-27 15:16:53', '2018-12-13 00:00:00'),
	(7, 'PerfilesCIX (2).xlsx', 'PerfilesCIX (2).xlsx', 'Usar URL amigables en nuestro sitio mejora el sitio, ademÃ¡s que es mÃ¡s fÃ¡cil para los usuarios recordar tu direcciÃ³n. Una de las cosas que debemos tener en cuenta para tener URLs amigables es ocultar la extensiÃ³n al final...Usar URL amigables en nuestro sitio mejora el sitio, ademÃ¡s que es mÃ¡s fÃ¡cil para los usuarios recordar tu direcciÃ³n. Una de las cosas que debemos tener en cuenta para tener URLs amigables es ocultar la extensiÃ³n al final...Usar URL amigables en nuestro sitio mejora el sitio, ademÃ¡s que es mÃ¡s fÃ¡cil para los usuarios recordar tu direcciÃ³n. Una de las cosas que debemos tener en cuenta para tener URLs amigables es ocultar la extensiÃ³n al final...Usar URL amigables en nuestro sitio mejora el sitio, ademÃ¡s que es mÃ¡s fÃ¡cil para los usuarios recordar tu direcciÃ³n. Una de las', 2, 1, '2018-11-27 15:17:19', '2018-11-29 00:00:00'),
	(9, 'DISTRIBUCIONDEL HORARIÃ³ EN LA SEMANA.docx', 'DISTRIBUCIONDEL HORARIÃ³ EN LA SEMANA.docx', 'wrwer', 2, 1, '2018-11-27 15:54:46', '2018-11-25 00:00:00'),
	(10, 'CJDBC-A-Leccion-CapaDatosJDBC.pdf', 'CJDBC-A-Leccion-CapaDatosJDBC.pdf', 'I Heart Logs Event Data, Stream Processing, and Data Integration.pdfI Heart Logs Event Data, Stream Processing, and Data Integration.pdfI Heart Logs Event Data, Stream Processing, and Data Integration.pdfI Heart Logs Event Data, Stream Processing, and Data Integration.pdfI Heart Logs Event Data, Stream Processing, and Data Integration.pdfI Heart Logs Event Data, Stream Processing, and Data Integration.pdfI Heart Logs Event Data, Stream Processing, and Data Integration.pdfI Heart Logs Event Data, Stream Processing, and Data Integration.pdfI Heart Logs Event Data, Stream Processing, and Data Integration.pdfI Heart Logs Event Data, Stream Processing, and Data Integration.pdfI Heart Logs Event Data, Stream Processing, and Data Integration.pdfI Heart Logs Event Data, Stream Processing, and Data', 1, 1, '2018-11-27 16:35:22', '2018-11-30 00:00:00'),
	(11, 'DO_SIS_Requisitos_Hardware_Big_Data_V9 (1).pdf', 'DO_SIS_Requisitos_Hardware_Big_Data_V9 (1).pdf', 'ertertert', 2, 1, '2018-11-27 16:41:28', '2018-12-21 00:00:00'),
	(13, 'CJDBC-C-LaboratorioCapaDatosJDBC.pdf', 'CJDBC-C-LaboratorioCapaDatosJDBC.pdf', 'https://norfipc.com/codigos/como-usar-htaccess-apache-trucos-ejemplos-practicos.php\r\nComo usar HTACCESS en Apache, trucos y ejemplos prÃ¡cticos ... Htaccess se puede usar en la raÃ­z del sitio o en cualquier directorio especifico, siempre que la directiva .... Como instalar y configurar PHP en el servidor Apache en Windows https://norfipc.com/codigos/como-usar-htaccess-apache-trucos-ejemplos-practicos.php\r\nComo usar HTACCESS en Apache, trucos y ejemplos prÃ¡cticos ... Htaccess se puede usar en la raÃ­z del sitio o en cualquier directorio especifico, siempre que la directiva .... Como instalar y configurar PHP en el servidor Apache en Windows https://norfipc.com/codigos/como-usar-htaccess-apache-trucos-ejemplos-practicos.php\r\nComo usar HTACCESS en Apache, trucos y ejemplos prÃ¡cticos ... Htaccess s', 2, 1, '2018-11-27 17:09:06', '2018-12-13 00:00:00'),
	(14, 'Getting_Started_With_Apache_Spark.pdf', 'Getting_Started_With_Apache_Spark.pdf', 'asdasdasdasdasdasdasdasdasdads', 1, 3, '2018-11-27 18:08:27', '2018-11-30 00:00:00');
/*!40000 ALTER TABLE `archivo` ENABLE KEYS */;

-- Volcando estructura para tabla drive_unac.curso
CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(50) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.curso: ~7 rows (aproximadamente)
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.descargas_archivos_alumnos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `descargas_archivos_alumnos` DISABLE KEYS */;
INSERT INTO `descargas_archivos_alumnos` (`id_descarga`, `id_archivo`, `id_usuario`, `id_detallecp`, `fecha_descarga`) VALUES
	(2, 2, 3, 1, '2018-11-27 21:08:31'),
	(3, 4, 3, 1, '2018-11-27 21:08:52'),
	(5, 9, 9, 1, '2018-11-27 21:10:16'),
	(6, 2, 9, 1, '2018-11-27 21:10:27'),
	(7, 10, 3, 1, '2018-11-27 21:43:30');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.detalle_curso_prof: ~9 rows (aproximadamente)
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.horario: ~18 rows (aproximadamente)
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.nivel: ~2 rows (aproximadamente)
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla drive_unac.usuario: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `usuario`, `contrasena`, `nivel`, `nombres`, `dni`, `correo`, `telefono`, `imagen`) VALUES
	(1, 'pedro', '12345', 1, 'Oswaldo Daniel Cazasola Salas', 12345678, 'cazasolad@gmail.com', 258963147, 'pedro.jpg'),
	(2, 'oliver', '12345', 1, 'Oliver Atom Tsubasa', 12345678, 'oliver.tsubasa@gmail.com', 258963147, 'oliver.jpg'),
	(3, 'ericka', '12345', 2, 'Ericka Jimenez Camones', 12345678, 'ericka.camones@gmail.com', 258963147, 'ericka.jpg'),
	(4, 'fiorela', '12345', 1, 'Fiorella Armuto Quispe', 14785236, 'fiorella.armutoq@gmail.com', 951357486, 'fiorela.jpg'),
	(5, 'luis', '12345', 2, 'Luis Alberto Chavarria Chavez', 4568712, 'luis.a.chavarria@gmail.com', 258932147, 'luis.jpg'),
	(6, 'carlos', '12345', 2, 'Carlos Alcantara Solis', 25874136, 'carlos.alcantara@gmail.com', 741258963, 'carlos.jpg'),
	(7, 'juan', '12345', 2, 'Juan Albinagorta Perez', 98748563, 'juan.albinagorta@gmail.com', 591738426, 'juan.jpg'),
	(8, 'ana', '12345', 2, 'Ana Ramos Breña', 456987123, 'ana.ramos@gmail.com', 897541236, 'ana.jpg'),
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
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_curso_detalle` AS select `c`.`nombre_curso` AS `nombre_curso`,`c`.`id_curso` AS `id_curso`,`dt`.`id_detallecp` AS `id_detallecp`,`dt`.`id_user` AS `id_user` from (`curso` `c` join `detalle_curso_prof` `dt` on((`c`.`id_curso` = `dt`.`id_curso`)));

-- Volcando estructura para vista drive_unac.view_detalle_matricula
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `view_detalle_matricula`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detalle_matricula` AS select `m`.`id_matricula` AS `id_matricula`,`m`.`id_usuario` AS `id_usuario`,`dt`.`id_curso` AS `id_curso`,`dt`.`id_detallecp` AS `id_detallecp`,`dt`.`id_user` AS `id_user`,`dt`.`habilitado` AS `habilitado` from (`matricula_alumno` `m` join `detalle_curso_prof` `dt` on((`m`.`id_detallecp` = `dt`.`id_detallecp`)));

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
