-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.15-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para estilos
CREATE DATABASE IF NOT EXISTS `estilos` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `estilos`;


-- Copiando estrutura para tabela estilos.agrupamento
CREATE TABLE IF NOT EXISTS `agrupamento` (
  `idAgrup` int(11) NOT NULL AUTO_INCREMENT,
  `idGrupo` int(11) NOT NULL DEFAULT '0',
  `idEstrutura` int(11) NOT NULL DEFAULT '0',
  `idEstilo` int(11) NOT NULL DEFAULT '0',
  `codificacao` longtext NOT NULL,
  PRIMARY KEY (`idAgrup`,`idGrupo`,`idEstrutura`),
  KEY `fk_grupo` (`idGrupo`),
  KEY `fk_estrut` (`idEstrutura`),
  KEY `fk_est` (`idEstilo`),
  CONSTRAINT `fk_est` FOREIGN KEY (`idEstilo`) REFERENCES `estilo` (`idEstilo`),
  CONSTRAINT `fk_estrut` FOREIGN KEY (`idEstrutura`) REFERENCES `estrutura` (`idEstrutura`),
  CONSTRAINT `fk_grupo` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela estilos.agrupamento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `agrupamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `agrupamento` ENABLE KEYS */;


-- Copiando estrutura para tabela estilos.estilo
CREATE TABLE IF NOT EXISTS `estilo` (
  `idEstilo` int(11) NOT NULL AUTO_INCREMENT,
  `idAgrup` int(11) NOT NULL DEFAULT '0',
  `idUsuario` int(11) NOT NULL DEFAULT '0',
  `descricao` varchar(50) NOT NULL DEFAULT '0',
  `tipoEstilo` varchar(8) NOT NULL DEFAULT '0',
  `dtCriacao` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`idEstilo`),
  KEY `fk_agrup` (`idAgrup`),
  KEY `fk_usu` (`idUsuario`),
  CONSTRAINT `fk_agrup` FOREIGN KEY (`idAgrup`) REFERENCES `agrupamento` (`idAgrup`),
  CONSTRAINT `fk_usu` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela estilos.estilo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `estilo` DISABLE KEYS */;
/*!40000 ALTER TABLE `estilo` ENABLE KEYS */;


-- Copiando estrutura para tabela estilos.estrutura
CREATE TABLE IF NOT EXISTS `estrutura` (
  `idEstrutura` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(15) DEFAULT '0',
  PRIMARY KEY (`idEstrutura`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela estilos.estrutura: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `estrutura` DISABLE KEYS */;
INSERT INTO `estrutura` (`idEstrutura`, `descricao`) VALUES
	(1, 'HTML'),
	(2, 'CSS'),
	(3, 'JavaScript');
/*!40000 ALTER TABLE `estrutura` ENABLE KEYS */;


-- Copiando estrutura para tabela estilos.grupo
CREATE TABLE IF NOT EXISTS `grupo` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela estilos.grupo: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` (`idGrupo`, `descricao`) VALUES
	(1, 'MENU'),
	(2, 'BUTTON'),
	(3, 'INPUTTEXT'),
	(4, 'LIGHTBOX');
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;


-- Copiando estrutura para tabela estilos.historicocurtidas
CREATE TABLE IF NOT EXISTS `historicocurtidas` (
  `idEstilo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idEstilo`,`idUsuario`),
  KEY `fk_estilo` (`idEstilo`),
  KEY `fk_usuario` (`idUsuario`),
  CONSTRAINT `fk_estilo` FOREIGN KEY (`idEstilo`) REFERENCES `estilo` (`idEstilo`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela estilos.historicocurtidas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `historicocurtidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `historicocurtidas` ENABLE KEYS */;


-- Copiando estrutura para tabela estilos.perfilusuario
CREATE TABLE IF NOT EXISTS `perfilusuario` (
  `idPerfilUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idPerfilUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela estilos.perfilusuario: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `perfilusuario` DISABLE KEYS */;
INSERT INTO `perfilusuario` (`idPerfilUsuario`, `descricao`) VALUES
	(1, 'INATIVO'),
	(2, 'BASIC'),
	(3, 'PLUS'),
	(4, 'PREMIUM');
/*!40000 ALTER TABLE `perfilusuario` ENABLE KEYS */;


-- Copiando estrutura para tabela estilos.usuario
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

-- Copiando dados para a tabela estilos.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idUsuario`, `idPerfilUsuario`, `nome`, `email`, `senha`, `dtCadastro`) VALUES
	(1, 2, 'Andressa Reis', 'andressacolino@gmail.com', '123', '0000-00-00');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
