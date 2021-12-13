-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.17-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para test_updateprod
CREATE DATABASE IF NOT EXISTS `test_updateprod` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `test_updateprod`;

-- Volcando estructura para tabla test_updateprod.cporte_tvehiculos
CREATE TABLE IF NOT EXISTS `cporte_tvehiculos` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_sucursal` smallint(6) DEFAULT NULL,
  `handel` tinyint(4) DEFAULT NULL,
  `no_economico` varchar(15) DEFAULT NULL,
  `tipo` varchar(25) DEFAULT NULL,
  `marca` varchar(30) DEFAULT NULL,
  `numeropolizaresponsabilidadcivil` varchar(35) DEFAULT NULL,
  `subMarca` varchar(35) DEFAULT NULL,
  `id_Color` int(11) DEFAULT -1,
  `placa` varchar(20) DEFAULT NULL,
  `id_combustible` int(11) DEFAULT -1,
  `fecha_registro` datetime DEFAULT NULL,
  `lectura_odometro` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `ban_disponible` int(1) DEFAULT 1,
  `id_pais_ubica` int(11) DEFAULT NULL,
  `id_estado_ubica` int(11) DEFAULT NULL,
  `id_ciudad_ubica` int(11) DEFAULT NULL,
  `cancel` int(2) NOT NULL DEFAULT 0,
  `id_socio` int(11) NOT NULL DEFAULT -1,
  `id_status_bitacora` int(11) NOT NULL DEFAULT -1,
  `motor` varchar(80) DEFAULT NULL,
  `id_clasificacion_registro` int(11) NOT NULL DEFAULT -1,
  `permisosct` varchar(25) DEFAULT NULL,
  `nombreaseguradoraresponsabilidadcivil` varchar(80) DEFAULT NULL,
  `nombreaseguradoramedioambiente` varchar(80) DEFAULT NULL,
  `numeropermisosct` varchar(25) DEFAULT NULL,
  `numeropolizamedioambiente` varchar(35) DEFAULT NULL,
  `nombreaseguradoracarga` varchar(80) DEFAULT NULL,
  `primaseguro` varchar(35) DEFAULT NULL,
  `numeropolizacarga` varchar(35) DEFAULT NULL,
  `TipoAutoTransporte` varchar(25) DEFAULT NULL,
  `anio` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sucursal` (`id_sucursal`),
  KEY `handel` (`handel`),
  KEY `id_combustible` (`id_combustible`),
  KEY `fk_id_status_bitacora` (`id_status_bitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla test_updateprod.cporte_tvehiculos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `cporte_tvehiculos` DISABLE KEYS */;
INSERT INTO `cporte_tvehiculos` (`id`, `id_sucursal`, `handel`, `no_economico`, `tipo`, `marca`, `numeropolizaresponsabilidadcivil`, `subMarca`, `id_Color`, `placa`, `id_combustible`, `fecha_registro`, `lectura_odometro`, `status`, `ban_disponible`, `id_pais_ubica`, `id_estado_ubica`, `id_ciudad_ubica`, `cancel`, `id_socio`, `id_status_bitacora`, `motor`, `id_clasificacion_registro`, `permisosct`, `nombreaseguradoraresponsabilidadcivil`, `nombreaseguradoramedioambiente`, `numeropermisosct`, `numeropolizamedioambiente`, `nombreaseguradoracarga`, `primaseguro`, `numeropolizacarga`, `TipoAutoTransporte`, `anio`) VALUES
	(1, NULL, NULL, NULL, 'OTROEVGP', NULL, 'Distinctio Ducimus', NULL, -1, 'jhk2452', -1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, -1, -1, '', -1, 'TPAF06', 'Prueba', 'Non ullam quia sint ', 'Cupiditate incidunt', 'Perspiciatis minus ', 'Hola', '524', 'Excepteur optio mod', NULL, 2021),
	(4, NULL, NULL, NULL, 'C2', NULL, '525', NULL, -1, 'sdfs454', -1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, -1, -1, '', -1, 'TPAF20', 'iouou', 'jkljkl', '5245', '52', 'jkljkl', '1250', '454', NULL, 2020),
	(5, NULL, NULL, NULL, 'Alias saepe ut adipi', NULL, '120', NULL, -1, 'cdsfc2524', -1, NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, -1, -1, NULL, -1, 'Commodi dolore nostr', 'Ipsum impedit animi', 'Quod recusandae Ali', '2012', '120', 'Quibusdam ut nisi au', '1450', '1202', NULL, 2023);
/*!40000 ALTER TABLE `cporte_tvehiculos` ENABLE KEYS */;

-- Volcando estructura para tabla test_updateprod.facturacion
CREATE TABLE IF NOT EXISTS `facturacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `handel` tinyint(4) NOT NULL DEFAULT 0,
  `rfc` varchar(100) NOT NULL,
  `nombre_razon` varchar(100) NOT NULL,
  `curp` varchar(100) NOT NULL,
  `tax_id` varchar(100) NOT NULL,
  `no_licencia` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `no_exterior` int(11) NOT NULL DEFAULT 0,
  `no_interior` int(11) NOT NULL DEFAULT 0,
  `pais` varchar(100) NOT NULL,
  `cp` int(11) NOT NULL DEFAULT 0,
  `estado` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla test_updateprod.facturacion: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `facturacion` DISABLE KEYS */;
INSERT INTO `facturacion` (`id`, `handel`, `rfc`, `nombre_razon`, `curp`, `tax_id`, `no_licencia`, `email`, `calle`, `no_exterior`, `no_interior`, `pais`, `cp`, `estado`, `municipio`, `localidad`, `colonia`, `referencia`) VALUES
	(3, 0, 'gdfgdfg', 'Laudantium quo rati', 'dfgdfg16512', '52', '4515', '', '', 0, 0, '', 0, '', '', '', '', '');
/*!40000 ALTER TABLE `facturacion` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
