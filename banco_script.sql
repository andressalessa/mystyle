-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.15-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for estilos
CREATE DATABASE IF NOT EXISTS `estilos` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `estilos`;

-- Dumping structure for table estilos.agrupamento
CREATE TABLE IF NOT EXISTS `agrupamento` (
  `idAgrup` int(11) NOT NULL AUTO_INCREMENT,
  `idElemento` int(11) NOT NULL DEFAULT '0',
  `idEstrutura` int(11) NOT NULL DEFAULT '0',
  `idEstilo` int(11) NOT NULL DEFAULT '0',
  `codificacao` longtext NOT NULL,
  PRIMARY KEY (`idAgrup`,`idElemento`,`idEstrutura`,`idEstilo`),
  KEY `fk_estrutura_agr` (`idEstrutura`),
  KEY `fk_elemento_agr` (`idElemento`),
  KEY `fk_estilo_agr` (`idEstilo`),
  CONSTRAINT `fk_elemento_agr` FOREIGN KEY (`idElemento`) REFERENCES `elemento` (`idElemento`),
  CONSTRAINT `fk_estilo_agr` FOREIGN KEY (`idEstilo`) REFERENCES `estilo` (`idEstilo`),
  CONSTRAINT `fk_estrutura_agr` FOREIGN KEY (`idEstrutura`) REFERENCES `estrutura` (`idEstrutura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table estilos.agrupamento: ~0 rows (approximately)
/*!40000 ALTER TABLE `agrupamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `agrupamento` ENABLE KEYS */;

-- Dumping structure for table estilos.elemento
CREATE TABLE IF NOT EXISTS `elemento` (
  `idElemento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` int(11) DEFAULT '0',
  PRIMARY KEY (`idElemento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table estilos.elemento: ~0 rows (approximately)
/*!40000 ALTER TABLE `elemento` DISABLE KEYS */;
/*!40000 ALTER TABLE `elemento` ENABLE KEYS */;

-- Dumping structure for table estilos.estilo
CREATE TABLE IF NOT EXISTS `estilo` (
  `idEstilo` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL DEFAULT '0',
  `descricao` varchar(30) NOT NULL DEFAULT '0',
  `tipoEstilo` varchar(8) NOT NULL DEFAULT '0',
  `dtCriacao` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idEstilo`),
  KEY `fk_usuario` (`idUsuario`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table estilos.estilo: ~0 rows (approximately)
/*!40000 ALTER TABLE `estilo` DISABLE KEYS */;
/*!40000 ALTER TABLE `estilo` ENABLE KEYS */;

-- Dumping structure for table estilos.estrutura
CREATE TABLE IF NOT EXISTS `estrutura` (
  `idEstrutura` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(15) DEFAULT '0',
  PRIMARY KEY (`idEstrutura`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table estilos.estrutura: ~3 rows (approximately)
/*!40000 ALTER TABLE `estrutura` DISABLE KEYS */;
INSERT INTO `estrutura` (`idEstrutura`, `descricao`) VALUES
	(1, 'HTML'),
	(2, 'CSS'),
	(3, 'JavaScript');
/*!40000 ALTER TABLE `estrutura` ENABLE KEYS */;

-- Dumping structure for table estilos.historicocurtidas
CREATE TABLE IF NOT EXISTS `historicocurtidas` (
  `idAgrup` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idAgrup`,`idUsuario`),
  KEY `fk_usu_hist` (`idUsuario`),
  CONSTRAINT `fk_agrup_hist` FOREIGN KEY (`idAgrup`) REFERENCES `agrupamento` (`idAgrup`),
  CONSTRAINT `fk_usu_hist` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table estilos.historicocurtidas: ~0 rows (approximately)
/*!40000 ALTER TABLE `historicocurtidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `historicocurtidas` ENABLE KEYS */;

-- Dumping structure for table estilos.perfilusuario
CREATE TABLE IF NOT EXISTS `perfilusuario` (
  `idPerfilUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idPerfilUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table estilos.perfilusuario: ~4 rows (approximately)
/*!40000 ALTER TABLE `perfilusuario` DISABLE KEYS */;
INSERT INTO `perfilusuario` (`idPerfilUsuario`, `descricao`) VALUES
	(1, 'INATIVO'),
	(2, 'BASIC'),
	(3, 'PLUS'),
	(4, 'PREMIUM');
/*!40000 ALTER TABLE `perfilusuario` ENABLE KEYS */;

-- Dumping structure for table estilos.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idPerfilUsuario` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(80) NOT NULL DEFAULT '0',
  `senha` varchar(8) NOT NULL DEFAULT '0',
  `dtCadastro` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`idUsuario`),
  KEY `fk_perfil_usu` (`idPerfilUsuario`),
  CONSTRAINT `fk_perfil_usu` FOREIGN KEY (`idPerfilUsuario`) REFERENCES `perfilusuario` (`idPerfilUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table estilos.usuario: ~1 rows (approximately)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idUsuario`, `idPerfilUsuario`, `nome`, `email`, `senha`, `dtCadastro`) VALUES
	(1, 2, 'Andressa Reis', 'andressacolino@gmail.com', '123', '0000-00-00');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
