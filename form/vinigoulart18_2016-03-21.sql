# ************************************************************
# Sequel Pro SQL dump
# Versão 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: mysql08.vinigoulart.com.br (MySQL 5.6.21-69.0-log)
# Base de Dados: vinigoulart18
# Tempo de Geração: 2016-03-21 19:07:18 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela fotos_mobile
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fotos_mobile`;

CREATE TABLE `fotos_mobile` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `arquivo` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `data_foto` int(11) DEFAULT NULL,
  `id_elenco_foto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;



# Dump da tabela nova_agenda
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_agenda`;

CREATE TABLE `nova_agenda` (
  `id_elenco_agenda` int(11) DEFAULT NULL,
  `nome_completo` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `tipo_cadastro_agendado` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `tipo_cadastro_efetivado` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `n_tentativas` int(2) DEFAULT NULL,
  `data_agendamento` date DEFAULT NULL,
  `hora_agendamento` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `start` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `end` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `comparecimento` varchar(12) COLLATE latin1_general_ci DEFAULT NULL,
  `nova_data_agendamento` date DEFAULT NULL,
  `nova_hora_agendamento` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `hora_chegada` varchar(5) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

LOCK TABLES `nova_agenda` WRITE;
/*!40000 ALTER TABLE `nova_agenda` DISABLE KEYS */;

INSERT INTO `nova_agenda` (`id_elenco_agenda`, `nome_completo`, `tipo_cadastro_agendado`, `tipo_cadastro_efetivado`, `n_tentativas`, `data_agendamento`, `hora_agendamento`, `start`, `end`, `comparecimento`, `nova_data_agendamento`, `nova_hora_agendamento`, `hora_chegada`)
VALUES
	(20000,'Vinicius Goulart','Gratuito',NULL,1,'2016-03-21','14:00','2016-03-21T14:30:00','2016-03-21T15:00:00',NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `nova_agenda` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
