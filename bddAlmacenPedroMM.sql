-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para almacen_cajas_pmm
DROP DATABASE IF EXISTS `almacen_cajas_pmm`;
CREATE DATABASE IF NOT EXISTS `almacen_cajas_pmm` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `almacen_cajas_pmm`;

-- Volcando estructura para tabla almacen_cajas_pmm.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(9) NOT NULL DEFAULT '0',
  `password` varchar(150) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `usuario` (`usuario`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla almacen_cajas_pmm.admin: ~0 rows (aproximadamente)

-- Volcando estructura para tabla almacen_cajas_pmm.almacen
DROP TABLE IF EXISTS `almacen`;
CREATE TABLE IF NOT EXISTS `almacen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `localizacion` varchar(50) NOT NULL DEFAULT '0',
  `telefono` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla almacen_cajas_pmm.almacen: ~1 rows (aproximadamente)
INSERT INTO `almacen` (`id`, `nombre`, `localizacion`, `telefono`) VALUES
	(1, 'Almacén Rasmus', 'Calle Castaña Nº100, Albacete', '696578469');

-- Volcando estructura para tabla almacen_cajas_pmm.caja
DROP TABLE IF EXISTS `caja`;
CREATE TABLE IF NOT EXISTS `caja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `localizador` varchar(50) NOT NULL,
  `altura` double NOT NULL,
  `anchura` double NOT NULL,
  `color` varchar(50) NOT NULL,
  `material` varchar(100) NOT NULL,
  `contenido` varchar(150) NOT NULL,
  `fechaEntrada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `Localizador` (`localizador`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla almacen_cajas_pmm.caja: ~3 rows (aproximadamente)
INSERT INTO `caja` (`id`, `localizador`, `altura`, `anchura`, `color`, `material`, `contenido`, `fechaEntrada`) VALUES
	(61, 'CA956', 200, 100, '#68615a', 'Metal', 'Piezas de metal', '2021-03-16 08:50:46'),
	(64, 'CA013', 50, 50, '#b06b21', 'Madera', 'Juguetes', '2021-03-16 08:01:44'),
	(65, 'CA447', 20, 30, '#6f6962', 'Metal', 'Agua', '2022-09-22 22:03:44');

-- Volcando estructura para tabla almacen_cajas_pmm.caja_backup
DROP TABLE IF EXISTS `caja_backup`;
CREATE TABLE IF NOT EXISTS `caja_backup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `localizador` varchar(50) NOT NULL DEFAULT '0',
  `altura` double NOT NULL DEFAULT 0,
  `anchura` double NOT NULL DEFAULT 0,
  `color` varchar(50) NOT NULL DEFAULT '0',
  `material` varchar(100) NOT NULL,
  `contenido` varchar(150) NOT NULL,
  `fechaSalida` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fechaEntrada` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `Localizador` (`localizador`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla almacen_cajas_pmm.caja_backup: ~1 rows (aproximadamente)
INSERT INTO `caja_backup` (`id`, `localizador`, `altura`, `anchura`, `color`, `material`, `contenido`, `fechaSalida`, `fechaEntrada`) VALUES
	(34, 'CA623', 81, 75, '#d0914e', 'Cartón', 'Libros de Física', '2021-03-16 09:31:57', '2021-03-16 09:31:11');

-- Volcando estructura para tabla almacen_cajas_pmm.estanteria
DROP TABLE IF EXISTS `estanteria`;
CREATE TABLE IF NOT EXISTS `estanteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `localizador` varchar(50) NOT NULL DEFAULT '0',
  `material` varchar(50) NOT NULL,
  `numLejas` int(11) NOT NULL DEFAULT 0,
  `lejasLibres` int(11) NOT NULL,
  `fechaAlta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `Localizador` (`localizador`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla almacen_cajas_pmm.estanteria: ~3 rows (aproximadamente)
INSERT INTO `estanteria` (`id`, `localizador`, `material`, `numLejas`, `lejasLibres`, `fechaAlta`) VALUES
	(27, 'ES123', 'Madera', 5, 4, '2021-03-16 09:28:49'),
	(28, 'ES967', 'Metal', 8, 7, '2021-03-16 09:32:11'),
	(29, 'ES128', 'Metal', 2, 1, '2022-09-22 22:03:44');

-- Volcando estructura para tabla almacen_cajas_pmm.estanteria_caja
DROP TABLE IF EXISTS `estanteria_caja`;
CREATE TABLE IF NOT EXISTS `estanteria_caja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caja` int(11) NOT NULL DEFAULT 0,
  `estanteria` int(11) NOT NULL DEFAULT 0,
  `numLeja` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `caja` (`caja`),
  UNIQUE KEY `uniqueCajaEstanteria` (`estanteria`,`numLeja`) USING BTREE,
  CONSTRAINT `FK_estanteria_caja_caja` FOREIGN KEY (`caja`) REFERENCES `caja` (`id`),
  CONSTRAINT `FK_estanteria_caja_estanteria` FOREIGN KEY (`estanteria`) REFERENCES `estanteria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla almacen_cajas_pmm.estanteria_caja: ~3 rows (aproximadamente)
INSERT INTO `estanteria_caja` (`id`, `caja`, `estanteria`, `numLeja`) VALUES
	(53, 61, 27, 4),
	(56, 64, 28, 6),
	(57, 65, 29, 2);

-- Volcando estructura para tabla almacen_cajas_pmm.estanteria_caja_backup
DROP TABLE IF EXISTS `estanteria_caja_backup`;
CREATE TABLE IF NOT EXISTS `estanteria_caja_backup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_caja_backup` int(11) NOT NULL DEFAULT 0,
  `id_estanteria` int(11) NOT NULL DEFAULT 0,
  `numLeja` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_caja_backup` (`id_caja_backup`),
  UNIQUE KEY `Índice 4` (`id_estanteria`,`numLeja`) USING BTREE,
  CONSTRAINT `FK_estanteria_caja_backup_caja_backup` FOREIGN KEY (`id_caja_backup`) REFERENCES `caja_backup` (`id`),
  CONSTRAINT `FK_estanteria_caja_backup_estanteria` FOREIGN KEY (`id_estanteria`) REFERENCES `estanteria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla almacen_cajas_pmm.estanteria_caja_backup: ~1 rows (aproximadamente)
INSERT INTO `estanteria_caja_backup` (`id`, `id_caja_backup`, `id_estanteria`, `numLeja`) VALUES
	(14, 34, 28, 6);

-- Volcando estructura para tabla almacen_cajas_pmm.pasillo
DROP TABLE IF EXISTS `pasillo`;
CREATE TABLE IF NOT EXISTS `pasillo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `letra` char(5) NOT NULL,
  `numHuecos` int(11) NOT NULL,
  `huecosLibres` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla almacen_cajas_pmm.pasillo: ~2 rows (aproximadamente)
INSERT INTO `pasillo` (`id`, `letra`, `numHuecos`, `huecosLibres`) VALUES
	(5, 'A', 10, 8),
	(6, 'B', 5, 4);

-- Volcando estructura para tabla almacen_cajas_pmm.pasillo_estanteria
DROP TABLE IF EXISTS `pasillo_estanteria`;
CREATE TABLE IF NOT EXISTS `pasillo_estanteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pasillo` int(11) NOT NULL,
  `estanteria` int(11) NOT NULL,
  `hueco` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Índice 2` (`pasillo`,`hueco`),
  UNIQUE KEY `estanteria` (`estanteria`),
  CONSTRAINT `FK_pasillo_estanteria_estanteria` FOREIGN KEY (`estanteria`) REFERENCES `estanteria` (`id`),
  CONSTRAINT `FK_pasillo_estanteria_pasillo` FOREIGN KEY (`pasillo`) REFERENCES `pasillo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla almacen_cajas_pmm.pasillo_estanteria: ~3 rows (aproximadamente)
INSERT INTO `pasillo_estanteria` (`id`, `pasillo`, `estanteria`, `hueco`) VALUES
	(16, 5, 27, 1),
	(17, 6, 28, 4),
	(18, 5, 29, 3);

-- Volcando estructura para disparador almacen_cajas_pmm.Hacer caja_backup
DROP TRIGGER IF EXISTS `Hacer caja_backup`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `Hacer caja_backup` BEFORE DELETE ON `caja` FOR EACH ROW BEGIN

INSERT INTO caja_backup VALUES (NULL,OLD.localizador, OLD.altura, OLD.anchura,
OLD.color, OLD.material, OLD.contenido, current_timestamp(), OLD.fechaEntrada
);

INSERT INTO estanteria_caja_backup VALUES (NULL, LAST_INSERT_ID(),
(SELECT id FROM estanteria WHERE id=(SELECT estanteria FROM estanteria_caja WHERE caja=OLD.id)),
(SELECT numLeja FROM estanteria_caja WHERE caja=OLD.id));

UPDATE estanteria SET lejasLibres=lejasLibres+1 WHERE id=(SELECT estanteria FROM 
estanteria_caja WHERE caja=OLD.id);

DELETE FROM estanteria_caja WHERE caja=OLD.id;

END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador almacen_cajas_pmm.TRIGGER_DEVOLVER_CAJA
DROP TRIGGER IF EXISTS `TRIGGER_DEVOLVER_CAJA`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER TRIGGER_DEVOLVER_CAJA
    BEFORE DELETE
    ON caja_backup 
    FOR EACH ROW
BEGIN
    INSERT INTO caja (localizador,altura,anchura,color,material,contenido,fechaEntrada)
        VALUES ("CA013", "50", "50", "#b06b21", "Madera", "Juguetes", "2021-03-16 09:01:44");
        
    INSERT INTO estanteria_caja (caja,estanteria,numLeja) VALUES ((SELECT id FROM caja WHERE localizador="CA013"),(SELECT id FROM estanteria WHERE localizador="ES967"),"6");
  
    UPDATE estanteria SET lejasLibres = lejasLibres-1 WHERE id=(SELECT id FROM estanteria WHERE localizador="ES967");
        
    DELETE FROM estanteria_caja_backup WHERE id_caja_backup=OLD.id;

END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
