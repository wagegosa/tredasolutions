-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.11-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para tredasolutions
CREATE DATABASE IF NOT EXISTS `tredasolutions` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci */;
USE `tredasolutions`;

-- Volcando estructura para tabla tredasolutions.estudiante
CREATE TABLE IF NOT EXISTS `estudiante` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(120) COLLATE latin1_spanish_ci NOT NULL,
  `APELLIDO` varchar(120) COLLATE latin1_spanish_ci NOT NULL,
  `EMAIL` varchar(120) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla tredasolutions.estudiante: 0 rows
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` (`ID`, `NOMBRE`, `APELLIDO`, `EMAIL`) VALUES
	(1, 'Gabriela', 'Reyes', 'GaRe@gmail.com'),
	(2, 'LAURA', 'GONZALEZ', 'LAPLAGOZA@HOTMAIL.COM');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;

-- Volcando estructura para tabla tredasolutions.estudios
CREATE TABLE IF NOT EXISTS `estudios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBREESTUDIO` varchar(120) COLLATE latin1_spanish_ci NOT NULL,
  `UNIVERSIDAD` varchar(120) COLLATE latin1_spanish_ci NOT NULL,
  `ANIO` year(4) NOT NULL,
  `Estudiante` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla tredasolutions.estudios: 0 rows
/*!40000 ALTER TABLE `estudios` DISABLE KEYS */;
INSERT INTO `estudios` (`ID`, `NOMBREESTUDIO`, `UNIVERSIDAD`, `ANIO`, `Estudiante`) VALUES
	(1, 'ADMINISTRACIÓN DE RECURSOS PUBLICOS', 'UNIVERSIDAD DEL TOLIMA', '2018', 1),
	(2, 'Prueba', 'Prueba', '2000', 2);
/*!40000 ALTER TABLE `estudios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
