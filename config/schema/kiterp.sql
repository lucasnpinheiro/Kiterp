-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: kiterp
-- ------------------------------------------------------
-- Server version	5.6.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `atividades`
--

DROP TABLE IF EXISTS `atividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividades`
--

LOCK TABLES `atividades` WRITE;
/*!40000 ALTER TABLE `atividades` DISABLE KEYS */;
INSERT  IGNORE INTO `atividades` (`id`, `nome`, `created`, `modified`) VALUES (1,'Supermercado','2016-01-13 10:23:21','2016-01-13 10:23:21'),(2,'Farmacia','2016-01-13 10:23:38','2016-01-13 10:23:38'),(3,'Loja Conveniencia','2016-01-13 17:26:11','2016-01-13 17:26:11'),(4,'Conveniencia Loja','2016-01-13 17:28:05','2016-01-13 17:28:05');
/*!40000 ALTER TABLE `atividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bancos`
--

DROP TABLE IF EXISTS `bancos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bancos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_banco` int(4) DEFAULT NULL,
  `nome` varchar(65) DEFAULT NULL,
  `agencia` varchar(45) DEFAULT NULL,
  `conta_corrente` varchar(45) DEFAULT NULL,
  `sequencial_arquivo` int(11) DEFAULT '1',
  `caminho_arquivo` varchar(65) DEFAULT NULL,
  `sacador_avalista` varchar(65) DEFAULT NULL,
  `cnpj_sacador` varchar(18) DEFAULT NULL,
  `contrato` varchar(45) DEFAULT NULL,
  `carteira` varchar(45) DEFAULT NULL,
  `convenio` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bancos`
--

LOCK TABLES `bancos` WRITE;
/*!40000 ALTER TABLE `bancos` DISABLE KEYS */;
INSERT  IGNORE INTO `bancos` (`id`, `codigo_banco`, `nome`, `agencia`, `conta_corrente`, `sequencial_arquivo`, `caminho_arquivo`, `sacador_avalista`, `cnpj_sacador`, `contrato`, `carteira`, `convenio`, `created`, `modified`) VALUES (1,1,'Banco do Brasil','1234-0','43686880-x',100,'/var/www/html/Kiterp/webroot/Banco/{id}/','Meu no na conta do Banco','12782342394723','8797767','8768769','6865','2016-01-13 10:40:41','2016-01-13 10:40:41'),(2,3453,'dsfadf','345345','3445325',35234,'/var/www/html/Kiterp/webroot/Banco/{id}/','23453vgdffgs','32554655786583','sdgsdg','ewrtdf','bcbfdg','2016-01-13 10:51:34','2016-01-13 10:52:07'),(3,237,'Banco Bradesco ','','',1,'C:\\xampp\\htdocs\\Kiterp\\webroot\\Banco\\{id}-{nome}\\','','','','','','2016-01-13 17:19:10','2016-01-13 17:19:10'),(4,237,'Banco Bradesco ','','',1,'C:\\xampp\\htdocs\\Kiterp\\webroot\\Banco\\{id}-{nome}\\','','','','','','2016-01-13 17:19:48','2016-01-13 17:19:48');
/*!40000 ALTER TABLE `bancos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caixas_diarios`
--

DROP TABLE IF EXISTS `caixas_diarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caixas_diarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_caixa` int(11) DEFAULT NULL,
  `operador` varchar(45) DEFAULT NULL,
  `data_abertura` datetime DEFAULT NULL,
  `data_encerramento` datetime DEFAULT NULL,
  `valor_inicial` float(10,2) DEFAULT NULL,
  `total_entradas` float(10,2) DEFAULT NULL,
  `total_saidas` float(10,2) DEFAULT NULL,
  `total_saldo` float(10,2) DEFAULT NULL,
  `encerrado` int(1) DEFAULT NULL COMMENT '0 - Não | 1 - Sim',
  `total_real` float(10,2) DEFAULT NULL,
  `total_sobras` float(10,2) DEFAULT NULL,
  `total_faltas` float(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caixas_diarios`
--

LOCK TABLES `caixas_diarios` WRITE;
/*!40000 ALTER TABLE `caixas_diarios` DISABLE KEYS */;
INSERT  IGNORE INTO `caixas_diarios` (`id`, `numero_caixa`, `operador`, `data_abertura`, `data_encerramento`, `valor_inicial`, `total_entradas`, `total_saidas`, `total_saldo`, `encerrado`, `total_real`, `total_sobras`, `total_faltas`, `created`, `modified`) VALUES (1,NULL,'26','2016-01-12 00:00:00','2016-01-12 21:16:00',37.99,NULL,NULL,NULL,1,NULL,NULL,NULL,'2016-01-12 21:01:32','2016-01-12 21:01:32'),(5,5,'26','2016-01-12 00:00:00','2016-01-12 21:16:00',986.78,1.23,999.00,9.00,1,89.00,6.00,76.00,'2016-01-12 21:06:51','2016-01-12 21:16:00'),(6,6,'26','2016-01-12 21:18:53','2016-01-12 21:16:00',NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2016-01-12 21:18:53','2016-01-12 21:18:53'),(7,7,'26','2016-01-12 22:15:05','2016-01-12 22:16:08',0.65,NULL,NULL,NULL,1,NULL,NULL,NULL,'2016-01-12 22:15:04','2016-01-12 22:16:08'),(8,8,'26','2016-01-13 18:54:56',NULL,5464.65,NULL,NULL,NULL,0,NULL,NULL,NULL,'2016-01-13 18:54:56','2016-01-13 18:54:56');
/*!40000 ALTER TABLE `caixas_diarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caixas_movimentos`
--

DROP TABLE IF EXISTS `caixas_movimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caixas_movimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caixa_diario_id` int(11) DEFAULT NULL,
  `data_movimento` datetime DEFAULT NULL,
  `numero documento` varchar(12) DEFAULT NULL,
  `tipo_lancamento` int(1) DEFAULT NULL COMMENT '1 - Crédito | 2 - Debito',
  `valor` float(10,2) DEFAULT NULL,
  `modalidade` int(1) DEFAULT NULL COMMENT '1 - Dinheiro | 2 - Cheques | 3 - Cartão Credito | 4 - Cartão Credito | 9 - Outros',
  `historico` varchar(65) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caixas_movimentos`
--

LOCK TABLES `caixas_movimentos` WRITE;
/*!40000 ALTER TABLE `caixas_movimentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `caixas_movimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `condicoes_pagamentos`
--

DROP TABLE IF EXISTS `condicoes_pagamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `condicoes_pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(65) DEFAULT NULL,
  `qtde_parcelas` int(4) DEFAULT NULL,
  `qtde_dias` int(4) DEFAULT NULL,
  `avista` int(1) DEFAULT NULL COMMENT '0 - Não | 1 - Sim',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condicoes_pagamentos`
--

LOCK TABLES `condicoes_pagamentos` WRITE;
/*!40000 ALTER TABLE `condicoes_pagamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `condicoes_pagamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contas`
--

DROP TABLE IF EXISTS `contas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) DEFAULT NULL,
  `nome` varchar(65) DEFAULT NULL,
  `tipo` int(1) DEFAULT NULL COMMENT '1 - Credora | 2 - Devedora',
  `id_pai` int(11) DEFAULT NULL,
  `tradutora` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contas`
--

LOCK TABLES `contas` WRITE;
/*!40000 ALTER TABLE `contas` DISABLE KEYS */;
/*!40000 ALTER TABLE `contas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contas_pagar`
--

DROP TABLE IF EXISTS `contas_pagar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contas_pagar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `numero_documento` varchar(45) DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `valor_documento` float(10,2) DEFAULT NULL,
  `pessoa_id` int(11) DEFAULT NULL,
  `banco_id` int(11) DEFAULT NULL,
  `tradutora_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1 - Aberto | 2 - baixado | 3 - Cancelado',
  `data_pagamento` date DEFAULT NULL,
  `valor_pagamento` float(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contas_pagar`
--

LOCK TABLES `contas_pagar` WRITE;
/*!40000 ALTER TABLE `contas_pagar` DISABLE KEYS */;
/*!40000 ALTER TABLE `contas_pagar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contas_receber`
--

DROP TABLE IF EXISTS `contas_receber`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contas_receber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `numero_documento` varchar(45) DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `valor_documento` float(10,2) DEFAULT NULL,
  `pessoa_id` int(11) DEFAULT NULL,
  `banco_id` int(11) DEFAULT NULL,
  `tradutora_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1 - Aberto | 2 - baixado | 3 - Cancelado',
  `data_recebimento` date DEFAULT NULL,
  `valor recebimento` float(10,2) DEFAULT NULL,
  `numero_pedido` int(11) DEFAULT NULL,
  `nota_fiscal` int(11) DEFAULT NULL,
  `serie` varchar(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contas_receber`
--

LOCK TABLES `contas_receber` WRITE;
/*!40000 ALTER TABLE `contas_receber` DISABLE KEYS */;
/*!40000 ALTER TABLE `contas_receber` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) DEFAULT NULL,
  `codigo_cidade` int(11) DEFAULT NULL,
  `regime_tributario` int(1) DEFAULT NULL COMMENT '1 - Simples Nacional | 2 - Simples Nacional com Excesso | 3 - Regime Normal',
  `versao_sefaz` varchar(10) DEFAULT NULL,
  `perentual_tributo` float(4,2) DEFAULT NULL,
  `hora_tzd` varchar(6) DEFAULT NULL COMMENT '-03:00 - Horario Normal | -02:00 - Horario Verao',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT  IGNORE INTO `empresas` (`id`, `pessoa_id`, `codigo_cidade`, `regime_tributario`, `versao_sefaz`, `perentual_tributo`, `hora_tzd`) VALUES (1,28,123456,1,'1235',18.00,'-03:00'),(2,25,123,0,'123',18.00,'-03:00');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formas_pagamentos`
--

DROP TABLE IF EXISTS `formas_pagamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formas_pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `abreviado` varchar(12) DEFAULT NULL,
  `qtde_dias` int(4) DEFAULT NULL,
  `qtde_taxas` int(4) DEFAULT NULL,
  `valor_taxas` text,
  `grupo` int(1) DEFAULT NULL COMMENT '1 - Cartao | 2 - A Vista | 3 - A Prazo | ',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formas_pagamentos`
--

LOCK TABLES `formas_pagamentos` WRITE;
/*!40000 ALTER TABLE `formas_pagamentos` DISABLE KEYS */;
INSERT  IGNORE INTO `formas_pagamentos` (`id`, `nome`, `abreviado`, `qtde_dias`, `qtde_taxas`, `valor_taxas`, `grupo`, `created`, `modified`) VALUES (1,'Avista','Avista',0,0,NULL,NULL,NULL,NULL),(2,'Cartão Visa Credito','Visa',30,3,'{0:\"2.90\",1:\"3.90\",2:\"4.90\"}',NULL,NULL,NULL);
/*!40000 ALTER TABLE `formas_pagamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `created` varchar(45) DEFAULT NULL,
  `modified` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT  IGNORE INTO `grupos` (`id`, `nome`, `status`, `created`, `modified`) VALUES (1,'Administrador',1,'2016-01-06 16:06:18','2016-01-06 16:06:18'),(2,'Caixa',1,'2016-01-06 16:06:18','2016-01-06 16:06:18'),(3,'Fiscal',1,'2016-01-06 16:06:18','2016-01-06 16:06:18'),(4,'Financeiro',1,'2016-01-06 16:06:18','2016-01-06 16:06:18');
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos_estoques`
--

DROP TABLE IF EXISTS `grupos_estoques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos_estoques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos_estoques`
--

LOCK TABLES `grupos_estoques` WRITE;
/*!40000 ALTER TABLE `grupos_estoques` DISABLE KEYS */;
INSERT  IGNORE INTO `grupos_estoques` (`id`, `nome`, `created`, `modified`) VALUES (1,'Laticinios',NULL,NULL),(2,'hortifruti','2016-01-13 18:26:48','2016-01-13 18:26:48'),(3,'Padaria','2016-01-13 18:28:09','2016-01-13 18:28:09');
/*!40000 ALTER TABLE `grupos_estoques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `icms_estaduais`
--

DROP TABLE IF EXISTS `icms_estaduais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `icms_estaduais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(2) DEFAULT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `icms_interno` float(4,2) DEFAULT NULL,
  `icms_externo` float(4,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `icms_estaduais`
--

LOCK TABLES `icms_estaduais` WRITE;
/*!40000 ALTER TABLE `icms_estaduais` DISABLE KEYS */;
INSERT  IGNORE INTO `icms_estaduais` (`id`, `estado`, `nome`, `icms_interno`, `icms_externo`, `created`, `modified`) VALUES (1,'AC','Acre',17.00,18.00,NULL,NULL),(2,'AL','Alagoas',17.00,18.00,NULL,NULL),(3,'AM','Amazonas',17.00,18.00,NULL,NULL),(4,'AP','Amapá',17.00,18.00,NULL,NULL),(5,'BA','Bahia',17.00,18.00,NULL,NULL),(6,'CE','Ceará',17.00,18.00,NULL,NULL),(7,'DF','Distrito Federal',17.00,18.00,NULL,NULL),(8,'ES','Espírito Santo',17.00,18.00,NULL,NULL),(9,'GO','Goiás',17.00,18.00,NULL,NULL),(10,'MA','Maranhão',17.00,18.00,NULL,NULL),(11,'MG','Minas Gerais',18.00,18.00,NULL,NULL),(12,'MS','Mato Grosso do Sul',17.00,18.00,NULL,NULL),(13,'MT','Mato Grosso',17.00,18.00,NULL,NULL),(14,'PA','Pará',17.00,18.00,NULL,NULL),(15,'PB','Paraíba',17.00,18.00,NULL,NULL),(16,'PE','Pernambuco',17.00,18.00,NULL,NULL),(17,'PI','Piauí',17.00,18.00,NULL,NULL),(18,'PR','Paraná',18.00,18.00,NULL,NULL),(19,'RJ','Rio de Janeiro',19.00,18.00,NULL,NULL),(20,'RN','Rio Grande do Norte',17.00,18.00,NULL,NULL),(21,'RO','Rondônia',17.00,18.00,NULL,NULL),(22,'RR','Roraima',17.00,18.00,NULL,NULL),(23,'RS','Rio Grande do Sul',17.00,18.00,NULL,NULL),(24,'SC','Santa Catarina',17.00,18.00,NULL,NULL),(25,'SE','Sergipe',17.00,18.00,NULL,NULL),(26,'SP','São Paulo',18.00,18.00,NULL,NULL),(27,'TO','Tocantins',17.00,18.00,NULL,NULL);
/*!40000 ALTER TABLE `icms_estaduais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `impostos`
--

DROP TABLE IF EXISTS `impostos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `impostos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_imposto` int(2) DEFAULT NULL COMMENT '1 - Icms Simples Nacional | 2 - Icms Regime Normal | 3- Ipi | 4 - Cst Pis | 5 - Cst Cofins | 6 - Icms Origem | 7 - Tabela Cfop',
  `codigo` varchar(5) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `impostos`
--

LOCK TABLES `impostos` WRITE;
/*!40000 ALTER TABLE `impostos` DISABLE KEYS */;
/*!40000 ALTER TABLE `impostos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `plugin` varchar(100) DEFAULT NULL,
  `controller` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `root` int(1) NOT NULL DEFAULT '0',
  `item_menu` int(1) NOT NULL DEFAULT '1',
  `grupos` varchar(100) DEFAULT NULL,
  `icone` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modifield` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT  IGNORE INTO `menus` (`id`, `titulo`, `plugin`, `controller`, `action`, `status`, `root`, `item_menu`, `grupos`, `icone`, `created`, `modifield`) VALUES (1,'Atividades',NULL,'Atividades','index',1,0,1,'Cadastros',NULL,'2016-01-06 15:44:17','2016-01-06 15:44:17'),(2,'Cadastrar',NULL,'Atividades','add',1,0,0,'Cadastros',NULL,'2016-01-06 15:44:17','2016-01-06 15:44:17'),(3,'Alrerar',NULL,'Atividades','edit',1,0,0,'Cadastros',NULL,'2016-01-06 15:44:17','2016-01-06 15:44:17'),(4,'Excluir',NULL,'Atividades','delete',1,0,0,'Cadastros',NULL,'2016-01-06 15:44:18','2016-01-06 15:44:18'),(5,'Bancos',NULL,'Bancos','index',1,0,1,'Cadastros',NULL,'2016-01-06 15:45:17','2016-01-06 15:45:17'),(6,'Cadastrar',NULL,'Bancos','add',1,0,0,'Cadastros',NULL,'2016-01-06 15:45:17','2016-01-06 15:45:17'),(7,'Alrerar',NULL,'Bancos','edit',1,0,0,'Cadastros',NULL,'2016-01-06 15:45:17','2016-01-06 15:45:17'),(8,'Excluir',NULL,'Bancos','delete',1,0,0,'Cadastros',NULL,'2016-01-06 15:45:17','2016-01-06 15:45:17'),(9,'Abertura',NULL,'CaixasDiarios','index',1,0,1,'Caixa Diário',NULL,'2016-01-06 15:45:49','2016-01-06 15:45:49'),(10,'Cadastrar',NULL,'CaixasDiarios','add',1,0,0,'Caixa Diário',NULL,'2016-01-06 15:45:49','2016-01-06 15:45:49'),(11,'Alrerar',NULL,'CaixasDiarios','edit',1,0,0,'Caixa Diário',NULL,'2016-01-06 15:45:49','2016-01-06 15:45:49'),(12,'Excluir',NULL,'CaixasDiarios','delete',1,0,0,'Caixa Diário',NULL,'2016-01-06 15:45:49','2016-01-06 15:45:49'),(13,'Movimentação',NULL,'CaixasMovimentos','index',1,0,1,'Caixa Diário',NULL,'2016-01-06 15:46:17','2016-01-06 15:46:17'),(14,'Cadastrar',NULL,'CaixasMovimentos','add',1,0,0,'Caixa Diário',NULL,'2016-01-06 15:46:17','2016-01-06 15:46:17'),(15,'Alrerar',NULL,'CaixasMovimentos','edit',1,0,0,'Caixa Diário',NULL,'2016-01-06 15:46:17','2016-01-06 15:46:17'),(16,'Excluir',NULL,'CaixasMovimentos','delete',1,0,0,'Caixa Diário',NULL,'2016-01-06 15:46:17','2016-01-06 15:46:17'),(17,'Condições de pagamentos',NULL,'CondicoesPagamentos','index',1,0,1,'Cadastros',NULL,'2016-01-06 15:46:58','2016-01-06 15:46:58'),(18,'Cadastrar',NULL,'CondicoesPagamentos','add',1,0,0,'Cadastros',NULL,'2016-01-06 15:46:59','2016-01-06 15:46:59'),(19,'Alrerar',NULL,'CondicoesPagamentos','edit',1,0,0,'Cadastros',NULL,'2016-01-06 15:46:59','2016-01-06 15:46:59'),(20,'Excluir',NULL,'CondicoesPagamentos','delete',1,0,0,'Cadastros',NULL,'2016-01-06 15:46:59','2016-01-06 15:46:59'),(21,'Contas',NULL,'Contas','index',1,0,1,'Financeiro',NULL,'2016-01-06 15:47:22','2016-01-06 15:47:22'),(22,'Cadastrar',NULL,'Contas','add',1,0,0,'Financeiro',NULL,'2016-01-06 15:47:22','2016-01-06 15:47:22'),(23,'Alrerar',NULL,'Contas','edit',1,0,0,'Financeiro',NULL,'2016-01-06 15:47:22','2016-01-06 15:47:22'),(24,'Excluir',NULL,'Contas','delete',1,0,0,'Financeiro',NULL,'2016-01-06 15:47:22','2016-01-06 15:47:22'),(25,'Pagar',NULL,'ContasPagar','index',1,0,1,'Financeiro',NULL,'2016-01-06 15:47:45','2016-01-06 15:47:45'),(26,'Cadastrar',NULL,'ContasPagar','add',1,0,0,'Financeiro',NULL,'2016-01-06 15:47:45','2016-01-06 15:47:45'),(27,'Alrerar',NULL,'ContasPagar','edit',1,0,0,'Financeiro',NULL,'2016-01-06 15:47:45','2016-01-06 15:47:45'),(28,'Excluir',NULL,'ContasPagar','delete',1,0,0,'Financeiro',NULL,'2016-01-06 15:47:45','2016-01-06 15:47:45'),(29,'Receber',NULL,'ContasReceber','index',1,0,1,'Financeiro',NULL,'2016-01-06 15:48:05','2016-01-06 15:48:05'),(30,'Cadastrar',NULL,'ContasReceber','add',1,0,0,'Financeiro',NULL,'2016-01-06 15:48:05','2016-01-06 15:48:05'),(31,'Alrerar',NULL,'ContasReceber','edit',1,0,0,'Financeiro',NULL,'2016-01-06 15:48:05','2016-01-06 15:48:05'),(32,'Excluir',NULL,'ContasReceber','delete',1,0,0,'Financeiro',NULL,'2016-01-06 15:48:05','2016-01-06 15:48:05'),(33,'Empresas',NULL,'Empresas','index',1,0,1,'Parâmetros',NULL,'2016-01-06 15:48:30','2016-01-06 15:48:30'),(34,'Cadastrar',NULL,'Empresas','add',1,0,0,'Parâmetros',NULL,'2016-01-06 15:48:30','2016-01-06 15:48:30'),(35,'Alrerar',NULL,'Empresas','edit',1,0,0,'Parâmetros',NULL,'2016-01-06 15:48:30','2016-01-06 15:48:30'),(36,'Excluir',NULL,'Empresas','delete',1,0,0,'Parâmetros',NULL,'2016-01-06 15:48:31','2016-01-06 15:48:31'),(37,'Formas de pagamentos',NULL,'FormasPagamentos','index',1,0,1,'Cadastros',NULL,'2016-01-06 15:48:53','2016-01-06 15:48:53'),(38,'Cadastrar',NULL,'FormasPagamentos','add',1,0,0,'Cadastros',NULL,'2016-01-06 15:48:53','2016-01-06 15:48:53'),(39,'Alrerar',NULL,'FormasPagamentos','edit',1,0,0,'Cadastros',NULL,'2016-01-06 15:48:53','2016-01-06 15:48:53'),(40,'Excluir',NULL,'FormasPagamentos','delete',1,0,0,'Cadastros',NULL,'2016-01-06 15:48:54','2016-01-06 15:48:54'),(41,'Grupos de estoques',NULL,'GruposEstoques','index',1,0,1,'Cadastros',NULL,'2016-01-06 15:49:22','2016-01-06 15:49:22'),(42,'Cadastrar',NULL,'GruposEstoques','add',1,0,0,'Cadastros',NULL,'2016-01-06 15:49:22','2016-01-06 15:49:22'),(43,'Alrerar',NULL,'GruposEstoques','edit',1,0,0,'Cadastros',NULL,'2016-01-06 15:49:22','2016-01-06 15:49:22'),(44,'Excluir',NULL,'GruposEstoques','delete',1,0,0,'Cadastros',NULL,'2016-01-06 15:49:22','2016-01-06 15:49:22'),(45,'Icms Estaduais',NULL,'IcmsEstaduais','index',1,0,1,'Cadastros',NULL,'2016-01-06 15:49:54','2016-01-06 15:49:54'),(46,'Cadastrar',NULL,'IcmsEstaduais','add',1,0,0,'Cadastros',NULL,'2016-01-06 15:49:54','2016-01-06 15:49:54'),(47,'Alrerar',NULL,'IcmsEstaduais','edit',1,0,0,'Cadastros',NULL,'2016-01-06 15:49:55','2016-01-06 15:49:55'),(48,'Excluir',NULL,'IcmsEstaduais','delete',1,0,0,'Cadastros',NULL,'2016-01-06 15:49:55','2016-01-06 15:49:55'),(49,'Impostos',NULL,'Impostos','index',1,0,1,'Cadastros',NULL,'2016-01-06 15:50:14','2016-01-06 15:50:14'),(50,'Cadastrar',NULL,'Impostos','add',1,0,0,'Cadastros',NULL,'2016-01-06 15:50:14','2016-01-06 15:50:14'),(51,'Alrerar',NULL,'Impostos','edit',1,0,0,'Cadastros',NULL,'2016-01-06 15:50:14','2016-01-06 15:50:14'),(52,'Excluir',NULL,'Impostos','delete',1,0,0,'Cadastros',NULL,'2016-01-06 15:50:14','2016-01-06 15:50:14'),(53,'NCM',NULL,'Ncm','index',1,0,1,'Cadastros',NULL,'2016-01-06 15:50:29','2016-01-06 15:50:29'),(54,'Cadastrar',NULL,'Ncm','add',1,0,0,'Cadastros',NULL,'2016-01-06 15:50:29','2016-01-06 15:50:29'),(55,'Alrerar',NULL,'Ncm','edit',1,0,0,'Cadastros',NULL,'2016-01-06 15:50:30','2016-01-06 15:50:30'),(56,'Excluir',NULL,'Ncm','delete',1,0,0,'Cadastros',NULL,'2016-01-06 15:50:30','2016-01-06 15:50:30'),(57,'NCM IVA',NULL,'NcmIva','index',1,0,1,'Cadastros',NULL,'2016-01-06 15:51:29','2016-01-06 15:51:29'),(58,'Cadastrar',NULL,'NcmIva','add',1,0,0,'Cadastros',NULL,'2016-01-06 15:51:29','2016-01-06 15:51:29'),(59,'Alrerar',NULL,'NcmIva','edit',1,0,0,'Cadastros',NULL,'2016-01-06 15:51:29','2016-01-06 15:51:29'),(60,'Excluir',NULL,'NcmIva','delete',1,0,0,'Cadastros',NULL,'2016-01-06 15:51:29','2016-01-06 15:51:29'),(61,'Nfe Entradas',NULL,'NotasFiscaisEntadas','index',1,0,1,'Compras',NULL,'2016-01-06 15:52:03','2016-01-06 15:52:03'),(62,'Cadastrar',NULL,'NotasFiscaisEntadas','add',1,0,0,'Compras',NULL,'2016-01-06 15:52:03','2016-01-06 15:52:03'),(63,'Alrerar',NULL,'NotasFiscaisEntadas','edit',1,0,0,'Compras',NULL,'2016-01-06 15:52:03','2016-01-06 15:52:03'),(64,'Excluir',NULL,'NotasFiscaisEntadas','delete',1,0,0,'Compras',NULL,'2016-01-06 15:52:03','2016-01-06 15:52:03'),(65,'Digitar Nfe',NULL,'NotasFiscaisSaidas','index',1,0,1,'Fiscal',NULL,'2016-01-06 15:52:25','2016-01-06 15:52:25'),(66,'Cadastrar',NULL,'NotasFiscaisSaidas','add',1,0,0,'Fiscal',NULL,'2016-01-06 15:52:25','2016-01-06 15:52:25'),(67,'Alrerar',NULL,'NotasFiscaisSaidas','edit',1,0,0,'Fiscal',NULL,'2016-01-06 15:52:25','2016-01-06 15:52:25'),(68,'Excluir',NULL,'NotasFiscaisSaidas','delete',1,0,0,'Fiscal',NULL,'2016-01-06 15:52:25','2016-01-06 15:52:25'),(69,'Listar pedidos',NULL,'Pedidos','index',1,0,1,'Vendas',NULL,'2016-01-06 15:53:33','2016-01-06 15:53:33'),(70,'Novo pedido',NULL,'Pedidos','add',1,0,1,'Vendas',NULL,'2016-01-06 15:53:33','2016-01-06 15:53:33'),(71,'Alrerar',NULL,'Pedidos','edit',1,0,0,'Vendas',NULL,'2016-01-06 15:53:33','2016-01-06 15:53:33'),(72,'Excluir',NULL,'Pedidos','delete',1,0,0,'Vendas',NULL,'2016-01-06 15:53:33','2016-01-06 15:53:33'),(73,'Pessoas',NULL,'Pessoas','index',1,0,1,'Cadastros',NULL,'2016-01-06 15:53:49','2016-01-06 15:53:49'),(74,'Cadastrar',NULL,'Pessoas','add',1,0,0,'Cadastros',NULL,'2016-01-06 15:53:49','2016-01-06 15:53:49'),(75,'Alrerar',NULL,'Pessoas','edit',1,0,0,'Cadastros',NULL,'2016-01-06 15:53:49','2016-01-06 15:53:49'),(76,'Excluir',NULL,'Pessoas','delete',1,0,0,'Cadastros',NULL,'2016-01-06 15:53:49','2016-01-06 15:53:49'),(77,'Produtos',NULL,'Produtos','index',1,0,1,'Cadastros',NULL,'2016-01-06 15:54:04','2016-01-06 15:54:04'),(78,'Cadastrar',NULL,'Produtos','add',1,0,0,'Cadastros',NULL,'2016-01-06 15:54:04','2016-01-06 15:54:04'),(79,'Alrerar',NULL,'Produtos','edit',1,0,0,'Cadastros',NULL,'2016-01-06 15:54:04','2016-01-06 15:54:04'),(80,'Excluir',NULL,'Produtos','delete',1,0,0,'Cadastros',NULL,'2016-01-06 15:54:04','2016-01-06 15:54:04'),(81,'Kits',NULL,'ProdutosKits','index',1,0,1,'Cadastros',NULL,'2016-01-06 15:54:32','2016-01-06 15:54:32'),(82,'Cadastrar',NULL,'ProdutosKits','add',1,0,0,'Cadastros',NULL,'2016-01-06 15:54:32','2016-01-06 15:54:32'),(83,'Alrerar',NULL,'ProdutosKits','edit',1,0,0,'Cadastros',NULL,'2016-01-06 15:54:32','2016-01-06 15:54:32'),(84,'Excluir',NULL,'ProdutosKits','delete',1,0,0,'Cadastros',NULL,'2016-01-06 15:54:32','2016-01-06 15:54:32'),(85,'Tipos de contatos',NULL,'TiposContatos','index',1,0,1,'Cadastros',NULL,'2016-01-06 15:55:12','2016-01-06 15:55:12'),(86,'Cadastrar',NULL,'TiposContatos','add',1,0,0,'Cadastros',NULL,'2016-01-06 15:55:12','2016-01-06 15:55:12'),(87,'Alrerar',NULL,'TiposContatos','edit',1,0,0,'Cadastros',NULL,'2016-01-06 15:55:12','2016-01-06 15:55:12'),(88,'Excluir',NULL,'TiposContatos','delete',1,0,0,'Cadastros',NULL,'2016-01-06 15:55:12','2016-01-06 15:55:12'),(89,'Transportadoras',NULL,'Transportadoras','index',1,0,1,'Cadastros',NULL,'2016-01-06 15:55:34','2016-01-06 15:55:34'),(90,'Cadastrar',NULL,'Transportadoras','add',1,0,0,'Cadastros',NULL,'2016-01-06 15:55:34','2016-01-06 15:55:34'),(91,'Alrerar',NULL,'Transportadoras','edit',1,0,0,'Cadastros',NULL,'2016-01-06 15:55:34','2016-01-06 15:55:34'),(92,'Excluir',NULL,'Transportadoras','delete',1,0,0,'Cadastros',NULL,'2016-01-06 15:55:34','2016-01-06 15:55:34'),(93,'Usuários',NULL,'Usuarios','index',1,0,1,'Parâmetros',NULL,'2016-01-06 15:56:02','2016-01-06 15:56:02'),(94,'Cadastrar',NULL,'Usuarios','add',0,0,0,'Parâmetros',NULL,'2016-01-06 15:56:02','2016-01-06 15:56:02'),(95,'Alrerar',NULL,'Usuarios','edit',1,0,0,'Parâmetros',NULL,'2016-01-06 15:56:02','2016-01-06 15:56:02'),(96,'Excluir',NULL,'Usuarios','delete',1,0,0,'Parâmetros',NULL,'2016-01-06 15:56:02','2016-01-06 15:56:02');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus_grupos`
--

DROP TABLE IF EXISTS `menus_grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus_grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus_grupos`
--

LOCK TABLES `menus_grupos` WRITE;
/*!40000 ALTER TABLE `menus_grupos` DISABLE KEYS */;
INSERT  IGNORE INTO `menus_grupos` (`id`, `menu_id`, `grupo_id`) VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,1),(7,7,1),(8,8,1),(9,9,1),(10,10,1),(11,11,1),(12,12,1),(13,13,1),(14,14,1),(15,15,1),(16,16,1),(17,17,1),(18,18,1),(19,19,1),(20,20,1),(21,21,1),(22,22,1),(23,23,1),(24,24,1),(25,25,1),(26,26,1),(27,27,1),(28,28,1),(29,29,1),(30,30,1),(31,31,1),(32,32,1),(33,33,1),(34,34,1),(35,35,1),(36,36,1),(37,37,1),(38,38,1),(39,39,1),(40,40,1),(41,41,1),(42,42,1),(43,43,1),(44,44,1),(45,45,1),(46,46,1),(47,47,1),(48,48,1),(49,49,1),(50,50,1),(51,51,1),(52,52,1),(53,53,1),(54,54,1),(55,55,1),(56,56,1),(57,57,1),(58,58,1),(59,59,1),(60,60,1),(61,61,1),(62,62,1),(63,63,1),(64,64,1),(65,65,1),(66,66,1),(67,67,1),(68,68,1),(69,69,1),(70,70,1),(71,71,1),(72,72,1),(73,73,1),(74,74,1),(75,75,1),(76,76,1),(77,77,1),(78,78,1),(79,79,1),(80,80,1),(81,81,1),(82,82,1),(83,83,1),(84,84,1),(85,85,1),(86,86,1),(87,87,1),(88,88,1),(89,89,1),(90,90,1),(91,91,1),(92,92,1),(93,93,1),(94,94,1),(95,95,1),(96,96,1);
/*!40000 ALTER TABLE `menus_grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ncm`
--

DROP TABLE IF EXISTS `ncm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ncm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ncm` varchar(12) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ncm`
--

LOCK TABLES `ncm` WRITE;
/*!40000 ALTER TABLE `ncm` DISABLE KEYS */;
INSERT  IGNORE INTO `ncm` (`id`, `ncm`, `nome`, `created`, `modified`) VALUES (1,'20122599','bla bla bal','2016-01-04 23:29:49','2016-01-04 23:29:49'),(2,'123456','teste de cadastro e alteração','2016-01-13 08:31:13','2016-01-13 08:37:50');
/*!40000 ALTER TABLE `ncm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ncm_iva`
--

DROP TABLE IF EXISTS `ncm_iva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ncm_iva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ncm_id` int(11) DEFAULT NULL,
  `icms_estadual_id` int(11) DEFAULT NULL,
  `iva` float(4,2) DEFAULT NULL,
  `perc_tributo` float(4,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ncm_iva`
--

LOCK TABLES `ncm_iva` WRITE;
/*!40000 ALTER TABLE `ncm_iva` DISABLE KEYS */;
INSERT  IGNORE INTO `ncm_iva` (`id`, `ncm_id`, `icms_estadual_id`, `iva`, `perc_tributo`, `created`, `modified`) VALUES (1,1,26,12.01,NULL,NULL,'2016-01-13 09:25:13'),(2,2,26,34.06,NULL,'2016-01-13 09:25:13','2016-01-13 09:25:13'),(3,1,1,2.30,NULL,'2016-01-13 09:40:38','2016-01-13 09:40:38'),(4,2,1,49.79,NULL,'2016-01-13 09:40:38','2016-01-13 09:40:38'),(5,1,11,58.68,27.14,'2016-01-13 16:57:20','2016-01-13 16:57:20'),(6,2,11,64.12,38.17,'2016-01-13 16:57:20','2016-01-13 16:57:20');
/*!40000 ALTER TABLE `ncm_iva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota_fiscal_entradas`
--

DROP TABLE IF EXISTS `nota_fiscal_entradas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_fiscal_entradas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `numero_nota_fiscal` int(11) DEFAULT NULL,
  `serie` varchar(4) DEFAULT NULL,
  `pessoa_id` int(11) DEFAULT NULL,
  `cfop_id` int(11) DEFAULT NULL,
  `data_emissao` date DEFAULT NULL,
  `data_entrada` date DEFAULT NULL,
  `total_produtos` float(10,2) DEFAULT NULL,
  `total_nota` float(10,2) DEFAULT NULL,
  `base_icms` float(10,2) DEFAULT NULL,
  `valor_icms` float(10,2) DEFAULT NULL,
  `base_st` float(10,2) DEFAULT NULL,
  `valor_st` float(10,2) DEFAULT NULL,
  `valor_ipi` float(10,2) DEFAULT NULL,
  `valor_frete` float(10,2) DEFAULT NULL,
  `valor_seguro` float(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_fiscal_entradas`
--

LOCK TABLES `nota_fiscal_entradas` WRITE;
/*!40000 ALTER TABLE `nota_fiscal_entradas` DISABLE KEYS */;
/*!40000 ALTER TABLE `nota_fiscal_entradas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota_fiscal_entradas_itens`
--

DROP TABLE IF EXISTS `nota_fiscal_entradas_itens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_fiscal_entradas_itens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nota_fiscal_entrada_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `qtde` float(6,4) DEFAULT NULL,
  `compra` float(10,2) DEFAULT NULL,
  `total` float(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_fiscal_entradas_itens`
--

LOCK TABLES `nota_fiscal_entradas_itens` WRITE;
/*!40000 ALTER TABLE `nota_fiscal_entradas_itens` DISABLE KEYS */;
/*!40000 ALTER TABLE `nota_fiscal_entradas_itens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota_fiscal_saidas`
--

DROP TABLE IF EXISTS `nota_fiscal_saidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_fiscal_saidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `numero_nota_fiscal` int(11) DEFAULT NULL,
  `serie` varchar(4) DEFAULT NULL,
  `cfop_id` int(11) DEFAULT NULL,
  `pessoa_id` int(11) DEFAULT NULL,
  `data_emissao` date DEFAULT NULL,
  `data_saida` date DEFAULT NULL,
  `hora_saida` varchar(12) DEFAULT NULL,
  `forma_pagamento_id` int(11) DEFAULT NULL,
  `total_produtos` float(10,2) DEFAULT NULL,
  `total_nota` float(10,2) DEFAULT NULL,
  `base_icms` float(10,2) DEFAULT NULL,
  `valor_icms` float(10,2) DEFAULT NULL,
  `transportadora_id` int(11) DEFAULT NULL,
  `vendedor_id` int(11) DEFAULT NULL,
  `cancelada` int(1) DEFAULT NULL COMMENT '0 - Não | 1 - Sim',
  `data_cancelada` date DEFAULT NULL,
  `numero_pedido` int(11) DEFAULT NULL,
  `frete` int(1) DEFAULT NULL COMMENT '0 - Cif Emitente | 1 - Fob Destinatario',
  `qtde_volumes` int(11) DEFAULT NULL,
  `especie` varchar(45) DEFAULT NULL,
  `base_st` float(10,2) DEFAULT NULL,
  `valor_st` float(10,2) DEFAULT NULL,
  `base_credito` float(10,2) DEFAULT NULL,
  `valor_credito` float(10,2) DEFAULT NULL,
  `percentual_tributo` float(4,2) DEFAULT NULL,
  `valor_tributo` float(10,2) DEFAULT NULL,
  `operacao` int(1) DEFAULT NULL,
  `atendimento` int(1) DEFAULT NULL,
  `data_hora` varchar(60) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_fiscal_saidas`
--

LOCK TABLES `nota_fiscal_saidas` WRITE;
/*!40000 ALTER TABLE `nota_fiscal_saidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `nota_fiscal_saidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota_fiscal_saidas_itens`
--

DROP TABLE IF EXISTS `nota_fiscal_saidas_itens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_fiscal_saidas_itens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nota_fiscal_saida_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `qtde` float(6,4) DEFAULT NULL,
  `venda` float(10,2) DEFAULT NULL,
  `total` float(10,2) DEFAULT NULL,
  `base_icms` float(10,2) DEFAULT NULL,
  `valor_icms` float(10,2) DEFAULT NULL,
  `ncms_id` int(11) DEFAULT NULL,
  `cfop` varchar(6) DEFAULT NULL,
  `origem` varchar(6) DEFAULT NULL,
  `base_credito` float(10,2) DEFAULT NULL,
  `valor_credito` float(10,2) DEFAULT NULL,
  `base_st` float(10,2) DEFAULT NULL,
  `valor_st` float(10,2) DEFAULT NULL,
  `valor_tributo` float(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_fiscal_saidas_itens`
--

LOCK TABLES `nota_fiscal_saidas_itens` WRITE;
/*!40000 ALTER TABLE `nota_fiscal_saidas_itens` DISABLE KEYS */;
/*!40000 ALTER TABLE `nota_fiscal_saidas_itens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parametros`
--

DROP TABLE IF EXISTS `parametros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parametros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `chave` varchar(100) DEFAULT NULL,
  `valor` text,
  `tipo` int(1) DEFAULT NULL COMMENT '1 - Inteiro | 2 - String | 3 - Texto | 4 - Lista | 5 - Float',
  `opcoes` text,
  `grupo` varchar(100) DEFAULT NULL,
  `root` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parametros`
--

LOCK TABLES `parametros` WRITE;
/*!40000 ALTER TABLE `parametros` DISABLE KEYS */;
INSERT  IGNORE INTO `parametros` (`id`, `nome`, `chave`, `valor`, `tipo`, `opcoes`, `grupo`, `root`) VALUES (1,'Liberar Desconto em','D_Pedido_Local','A',2,'{\"A\":\"Ambos\", \"I\":\"Item, \"P\":\"Pedido\"}','Pedido',0),(2,'Desconto no Item','D_Pedido_Item','10',1,NULL,'Pedido',0),(3,'Desconto no Total do Pedido','D_Pedido','5',1,NULL,'Pedido',0),(4,'Casas Decimais','N_Casas_Decimais','4',4,'[0,1,2,3,4]','Produtos',1),(5,'Codigo de Acesso','C_Acesso',NULL,2,NULL,'Sistema',1),(6,'Data do Ultimo Acesso','C_Acesso_Data',NULL,2,NULL,'Sistema',1),(7,'Codigo de Acesso da Empresa','C_Acesso_Empresa',NULL,1,NULL,'Sistema',1);
/*!40000 ALTER TABLE `parametros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `data_pedido` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1 - Aberto | 2 - Emitido | 3 - Recebido | 4 - Orcamento | 5 - Nota Fiscal',
  `pessoa_id` int(11) DEFAULT NULL,
  `condicao_pagamento_id` int(11) DEFAULT NULL,
  `vendedor_id` int(11) DEFAULT NULL,
  `transportadora_id` int(11) DEFAULT NULL,
  `valor_total` float(10,2) DEFAULT NULL,
  `numero_cupom` int(11) DEFAULT NULL,
  `nota_fiscal` int(11) DEFAULT NULL,
  `serie` varchar(4) DEFAULT NULL,
  `numero_caixa` int(11) DEFAULT NULL,
  `cpf` varchar(18) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos_formas_pagamentos`
--

DROP TABLE IF EXISTS `pedidos_formas_pagamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos_formas_pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) DEFAULT NULL,
  `forma_pagamento_id` int(11) DEFAULT NULL,
  `valor` float(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos_formas_pagamentos`
--

LOCK TABLES `pedidos_formas_pagamentos` WRITE;
/*!40000 ALTER TABLE `pedidos_formas_pagamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos_formas_pagamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos_itens`
--

DROP TABLE IF EXISTS `pedidos_itens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos_itens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `qtde` float(8,4) DEFAULT NULL,
  `venda` float(10,2) DEFAULT NULL,
  `total` float(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos_itens`
--

LOCK TABLES `pedidos_itens` WRITE;
/*!40000 ALTER TABLE `pedidos_itens` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos_itens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `tipo_pessoa` int(1) DEFAULT NULL COMMENT '1 - Fisica | 2 - Juridica',
  `status` int(1) DEFAULT NULL COMMENT '0 - Ativo | 1 - Inativo | 9 - Excluido',
  `consumidor_final` int(1) DEFAULT NULL COMMENT '0 - Não | 1 - Sim',
  `tipo_contribuinte` int(1) DEFAULT NULL COMMENT '1 - Contribuinte Icms | 2 - Contribuinte Isento | 3 - Não Contribuinte',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `observacoes` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas`
--

LOCK TABLES `pessoas` WRITE;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT  IGNORE INTO `pessoas` (`id`, `nome`, `tipo_pessoa`, `status`, `consumidor_final`, `tipo_contribuinte`, `created`, `modified`, `observacoes`) VALUES (1,'Administrador Geral do Sistema',1,1,0,1,NULL,'2016-01-10 09:50:35',NULL),(24,'Lucas',1,1,0,1,'2016-01-07 16:16:47','2016-01-10 09:51:31',NULL),(25,'Lucas',1,1,0,1,'2016-01-07 16:16:54','2016-01-10 10:08:11',NULL),(26,'Lucas novo teste',1,1,0,1,'2016-01-07 16:25:28','2016-01-10 09:52:09',NULL),(27,'Lucas Nunes Pinto Pinheiro',1,1,1,1,'2016-01-08 07:43:31','2016-01-08 07:43:31',NULL),(28,'Teste de cadastro de empresa',2,1,1,1,'2016-01-08 10:37:25','2016-01-08 10:37:25',NULL),(29,'Vitor',1,1,0,1,'2016-01-08 17:53:34','2016-01-08 17:53:34',NULL),(30,'teste lucas',1,1,1,1,'2016-01-11 17:37:33','2016-01-11 17:37:33',NULL),(31,'novo teste de cadastro realizado com sucesso',2,1,0,1,'2016-01-11 19:55:33','2016-01-11 19:58:20','Novo teste');
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoas_associacoes`
--

DROP TABLE IF EXISTS `pessoas_associacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas_associacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) DEFAULT NULL,
  `tipo_associacao` int(1) DEFAULT NULL COMMENT '1 - Empresa | 2 - Cliente | 3 - Fornecedor | 4 - Vendedor | 5 - Representante | 6 - Funcionario | 7 - Usuários',
  `status` int(1) DEFAULT NULL COMMENT '0 - Ativo | 1 - Inativo | 9 - Excluido',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas_associacoes`
--

LOCK TABLES `pessoas_associacoes` WRITE;
/*!40000 ALTER TABLE `pessoas_associacoes` DISABLE KEYS */;
INSERT  IGNORE INTO `pessoas_associacoes` (`id`, `pessoa_id`, `tipo_associacao`, `status`, `created`, `modified`) VALUES (2,26,2,1,'2016-01-10 09:38:57','2016-01-10 09:52:09'),(3,26,3,1,'2016-01-10 09:38:57','2016-01-10 09:52:09'),(4,26,6,1,'2016-01-10 09:38:57','2016-01-10 09:52:09'),(5,26,4,1,'2016-01-10 09:38:57','2016-01-10 09:52:09'),(6,26,5,1,'2016-01-10 09:38:57','2016-01-10 09:52:09'),(8,24,2,1,NULL,'2016-01-10 09:51:31'),(9,25,2,1,NULL,NULL),(10,27,2,1,NULL,NULL),(11,28,2,1,NULL,NULL),(12,29,2,1,NULL,NULL),(19,1,7,1,'2016-01-10 09:42:11','2016-01-10 09:50:35'),(24,1,5,1,'2016-01-10 09:42:11','2016-01-10 09:50:35'),(25,26,7,1,'2016-01-10 09:52:09','2016-01-10 09:52:09'),(26,25,1,1,'2016-01-10 10:08:11','2016-01-10 10:08:11'),(27,30,2,1,'2016-01-11 17:37:34','2016-01-11 17:37:34'),(28,31,2,1,'2016-01-11 19:55:34','2016-01-11 19:55:34'),(29,31,6,1,'2016-01-11 19:55:34','2016-01-11 19:55:34'),(30,31,2,1,'2016-01-11 19:58:20','2016-01-11 19:58:20'),(31,31,6,1,'2016-01-11 19:58:20','2016-01-11 19:58:20'),(32,28,1,1,'0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `pessoas_associacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoas_contatos`
--

DROP TABLE IF EXISTS `pessoas_contatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas_contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) DEFAULT NULL,
  `tipos_contato_id` int(11) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '0 - Ativo | 1 - Inativo | 9 - Excluido',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas_contatos`
--

LOCK TABLES `pessoas_contatos` WRITE;
/*!40000 ALTER TABLE `pessoas_contatos` DISABLE KEYS */;
INSERT  IGNORE INTO `pessoas_contatos` (`id`, `pessoa_id`, `tipos_contato_id`, `valor`, `status`, `created`, `modified`) VALUES (13,24,1,'123',1,'2016-01-07 16:16:47','2016-01-10 09:51:31'),(14,24,1,'1234',1,'2016-01-07 16:16:47','2016-01-10 09:51:31'),(15,25,1,'123',1,'2016-01-07 16:16:55','2016-01-10 10:08:11'),(16,25,1,'1234',1,'2016-01-07 16:16:55','2016-01-10 10:08:11'),(17,26,2,'16992660128',1,'2016-01-07 16:25:28','2016-01-10 09:52:09'),(18,26,4,'pinheirolouco@hotmail.com',1,'2016-01-07 16:25:28','2016-01-10 09:52:09'),(19,27,1,'',1,'2016-01-08 07:43:32','2016-01-08 07:43:32'),(23,1,1,'1639191956',1,'2016-01-08 08:09:08','2016-01-10 09:50:35'),(24,1,1,'pinheirolouco@hotmail.com',1,'2016-01-08 08:09:08','2016-01-10 09:50:35'),(25,1,1,'lucasnpinheiro@gmail.com',1,'2016-01-08 08:09:08','2016-01-10 09:50:35'),(26,28,1,'empresa@empresa.com.br',1,'2016-01-08 10:37:26','2016-01-08 10:37:26'),(27,29,1,'1639197391',1,'2016-01-08 17:53:34','2016-01-08 17:53:34'),(28,29,1,'vitorppinheiro@gmail.com',1,'2016-01-08 17:53:34','2016-01-08 17:53:34'),(29,29,1,'1630190418',1,'2016-01-08 17:53:34','2016-01-08 17:53:34'),(30,30,1,'12345678899',1,'2016-01-11 17:37:34','2016-01-11 17:37:34'),(31,31,1,'123',1,'2016-01-11 19:55:33','2016-01-11 19:58:20'),(32,31,2,'321',1,'2016-01-11 19:55:33','2016-01-11 19:58:20'),(33,31,3,'345',1,'2016-01-11 19:55:33','2016-01-11 19:58:20');
/*!40000 ALTER TABLE `pessoas_contatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoas_enderecos`
--

DROP TABLE IF EXISTS `pessoas_enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas_enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) DEFAULT NULL,
  `tipo_endereco` int(1) DEFAULT NULL COMMENT '1 - Comercial | 2 - Residencial | 3 - Entrega | 4 - Cobranca | 9 - Outros',
  `cep` varchar(10) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(65) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `principal` int(1) DEFAULT NULL COMMENT '0 - Não | 1 - Sim',
  `status` int(1) DEFAULT NULL COMMENT '0 - Ativo | 1 - Inativo | 9 - Excluido',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas_enderecos`
--

LOCK TABLES `pessoas_enderecos` WRITE;
/*!40000 ALTER TABLE `pessoas_enderecos` DISABLE KEYS */;
INSERT  IGNORE INTO `pessoas_enderecos` (`id`, `pessoa_id`, `tipo_endereco`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `principal`, `status`, `created`, `modified`) VALUES (6,24,1,'14031-010','Rua: Joaquim Franscisco Galeano','109','','Vila Guiomar','Ribeirão Preto','SP',1,1,'2016-01-07 16:16:47','2016-01-10 09:51:31'),(7,25,1,'14031-010','Rua: Joaquim Franscisco Galeano','109','','Vila Guiomar','Ribeirão Preto','SP',1,1,'2016-01-07 16:16:55','2016-01-10 10:08:11'),(8,26,1,'14031-010','Rua Joaquim Francisco Galiano','109','Casa Unica teste','Vila Guiomar','Ribeirão Preto','SP',1,1,'2016-01-07 16:25:28','2016-01-10 09:52:09'),(9,27,1,'14031-010','Rua: Joaquim Franscisco Galeano','109','','Vila Guiomar','Ribeirão Preto','SP',1,1,'2016-01-08 07:43:32','2016-01-08 07:43:32'),(11,1,1,'14031-010','Rua: Joaquim Franscisco Galeano','109','','Vila Guiomar','Ribeirão Preto','SP',1,1,'2016-01-08 08:09:08','2016-01-10 09:50:35'),(12,28,2,'14031-010','Rua: Joaquim Franscisco Galeano','109','','Vila Guiomar','Ribeirão Preto','SP',1,1,'2016-01-08 10:37:26','2016-01-08 10:37:26'),(13,29,1,'14031-300','Rua: Alfredo Condeixa','1331','','Jardim Marchesi','Ribeirão Preto','SP',1,1,'2016-01-08 17:53:34','2016-01-08 17:53:34'),(14,30,1,'14031-010','Rua Joaquim Francisco Galiano','109','','Vila Guiomar','Ribeirão Preto','SP',1,1,'2016-01-11 17:37:34','2016-01-11 17:37:34'),(15,31,2,'14031-010','Rua Joaquim Francisco Galiano','109','','Vila Guiomar','Ribeirão Preto','SP',1,1,'2016-01-11 19:55:34','2016-01-11 19:58:20');
/*!40000 ALTER TABLE `pessoas_enderecos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoas_fisicas`
--

DROP TABLE IF EXISTS `pessoas_fisicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas_fisicas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `rg` varchar(14) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas_fisicas`
--

LOCK TABLES `pessoas_fisicas` WRITE;
/*!40000 ALTER TABLE `pessoas_fisicas` DISABLE KEYS */;
INSERT  IGNORE INTO `pessoas_fisicas` (`id`, `pessoa_id`, `cpf`, `rg`, `data_nascimento`, `created`, `modified`) VALUES (19,24,'31723287830','28909780-0','2016-01-31','2016-01-07 16:16:47','2016-01-10 09:51:31'),(20,25,'11111111111','111111111111','2016-01-31','2016-01-07 16:16:55','2016-01-10 10:08:11'),(21,26,'11111111111','1234567890','2016-01-20','2016-01-07 16:25:28','2016-01-10 09:52:09'),(22,27,'55555555555','99999999999999','2016-01-31','2016-01-08 07:43:32','2016-01-08 07:43:32'),(24,1,'31723287830','28.909.780-0','1984-07-03','2016-01-08 08:09:08','2016-01-10 09:50:35'),(25,29,'83339027820','6572549-9','1957-01-07','2016-01-08 17:53:34','2016-01-08 17:53:34'),(26,30,'09090909090','00000000000000','0000-00-00','2016-01-11 17:37:33','2016-01-11 17:37:33');
/*!40000 ALTER TABLE `pessoas_fisicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoas_juridicas`
--

DROP TABLE IF EXISTS `pessoas_juridicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas_juridicas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `inscricao_estadual` varchar(18) DEFAULT NULL,
  `inscricao_municipal` varchar(18) DEFAULT NULL,
  `data_abertura` date DEFAULT NULL,
  `cnai` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas_juridicas`
--

LOCK TABLES `pessoas_juridicas` WRITE;
/*!40000 ALTER TABLE `pessoas_juridicas` DISABLE KEYS */;
INSERT  IGNORE INTO `pessoas_juridicas` (`id`, `pessoa_id`, `cnpj`, `inscricao_estadual`, `inscricao_municipal`, `data_abertura`, `cnai`, `created`, `modified`) VALUES (1,28,'99999999999999','666666666666666','1234567890','2016-01-31','666666666','2016-01-08 10:37:26','2016-01-08 10:37:26'),(2,31,'01928363634957','123648746238746287','238476827364623','2016-01-31','666666666','2016-01-11 19:55:33','2016-01-11 19:58:20');
/*!40000 ALTER TABLE `pessoas_juridicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barra` varchar(14) DEFAULT NULL,
  `codigo_interno` varchar(14) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `unidade` varchar(4) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `produto_kit` int(1) DEFAULT NULL COMMENT '0 - Não | 1 - Sim',
  `foto` varchar(65) DEFAULT NULL,
  `descricao` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT  IGNORE INTO `produtos` (`id`, `barra`, `codigo_interno`, `nome`, `unidade`, `grupo_id`, `produto_kit`, `foto`, `descricao`, `created`, `modified`) VALUES (1,'7891000112946','2946','Leite Ninho fases 1+ 800g','UN',1,0,NULL,'Leite Ninho fases 1+ 800g',NULL,NULL),(2,'7891000053508','3508','Achocolatado Nescau 2.0 400g','UN',1,0,NULL,'Achocolatado Nescau 2.0 400g',NULL,NULL),(3,'7891991010023','0023','Cerveja Pilsen Antarctica SubZero','UN',1,0,NULL,'Cerveja Pilsen Antarctica SubZero',NULL,NULL),(4,'7896714202884','2884','Nistatina uso oral','UN',1,0,NULL,'Nistatina uso oral',NULL,NULL);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos_kits`
--

DROP TABLE IF EXISTS `produtos_kits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos_kits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `kit_id` int(11) DEFAULT NULL,
  `qtde` float(8,4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos_kits`
--

LOCK TABLES `produtos_kits` WRITE;
/*!40000 ALTER TABLE `produtos_kits` DISABLE KEYS */;
/*!40000 ALTER TABLE `produtos_kits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos_valores`
--

DROP TABLE IF EXISTS `produtos_valores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos_valores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `ncm_id` int(11) DEFAULT NULL,
  `estoque_minimo` float(8,4) DEFAULT NULL,
  `estoque_atual` float(8,4) DEFAULT NULL,
  `valor_compras` float(10,2) DEFAULT NULL,
  `margem` float(6,4) DEFAULT NULL,
  `valor_vendas` float(10,2) DEFAULT NULL,
  `cst_pis` int(11) DEFAULT NULL,
  `cst_cofins` int(11) DEFAULT NULL,
  `cst_icms` int(11) DEFAULT NULL,
  `cst_origem` int(11) DEFAULT NULL,
  `percentual_icms` float(4,2) DEFAULT NULL,
  `percentual_pis` float(4,2) DEFAULT NULL,
  `percentual_cofins` float(4,2) DEFAULT NULL,
  `percentual_ipi` float(4,2) DEFAULT NULL,
  `percentuall_tributacao` float(4,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos_valores`
--

LOCK TABLES `produtos_valores` WRITE;
/*!40000 ALTER TABLE `produtos_valores` DISABLE KEYS */;
INSERT  IGNORE INTO `produtos_valores` (`id`, `empresa_id`, `produto_id`, `ncm_id`, `estoque_minimo`, `estoque_atual`, `valor_compras`, `margem`, `valor_vendas`, `cst_pis`, `cst_cofins`, `cst_icms`, `cst_origem`, `percentual_icms`, `percentual_pis`, `percentual_cofins`, `percentual_ipi`, `percentuall_tributacao`, `created`, `modified`) VALUES (1,1,1,NULL,10.0000,100.0000,20.00,0.9999,25.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,1,2,NULL,10.0000,100.0000,6.47,0.9999,8.90,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,1,3,NULL,50.0000,250.0000,1.09,2.9999,2.19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,1,4,NULL,2.0000,37.0000,25.09,0.9000,38.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `produtos_valores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_contatos`
--

DROP TABLE IF EXISTS `tipos_contatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos_contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_contatos`
--

LOCK TABLES `tipos_contatos` WRITE;
/*!40000 ALTER TABLE `tipos_contatos` DISABLE KEYS */;
INSERT  IGNORE INTO `tipos_contatos` (`id`, `nome`, `created`, `modified`) VALUES (1,'Telefone Residencial',NULL,NULL),(2,'Telefone Comercial',NULL,NULL),(3,'Telefone de Recado',NULL,NULL),(4,'Skype',NULL,NULL),(5,'Whatsapp',NULL,NULL),(6,'Email Pessoal',NULL,NULL),(7,'Email Comercial',NULL,NULL);
/*!40000 ALTER TABLE `tipos_contatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transportadoras`
--

DROP TABLE IF EXISTS `transportadoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transportadoras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `contado` varchar(65) DEFAULT NULL,
  `telefone1` varchar(45) DEFAULT NULL,
  `telefone2` varchar(45) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transportadoras`
--

LOCK TABLES `transportadoras` WRITE;
/*!40000 ALTER TABLE `transportadoras` DISABLE KEYS */;
INSERT  IGNORE INTO `transportadoras` (`id`, `nome`, `contado`, `telefone1`, `telefone2`, `cnpj`, `created`, `modified`) VALUES (1,'O proprio','','','','','2016-01-13 18:33:40','2016-01-13 18:33:40'),(2,'Rodonaves Transportes','','','','','2016-01-13 18:34:08','2016-01-13 18:34:08'),(3,'correios','','','','','2016-01-13 18:34:22','2016-01-13 18:34:22');
/*!40000 ALTER TABLE `transportadoras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `root` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT  IGNORE INTO `usuarios` (`id`, `pessoa_id`, `nome`, `username`, `senha`, `created`, `modified`, `root`) VALUES (1,1,'Administrador Geral do Sistema','super','$2y$10$fp.eNnd3Gw3GVk6sjp/qZeJloW2UPPcbk1bpzNoVSA1G/7oNMWvja','2016-01-05 16:47:05','2016-01-11 20:54:41',1),(8,26,'Lucas novo teste','teste1','$2y$10$VgKsZh5H5o0VKcSH6gBdHeTwYtmYh6kd36y/kCaNA9.HRTuRcAjeW','2016-01-10 08:58:42','2016-01-11 20:54:58',0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_grupos`
--

DROP TABLE IF EXISTS `usuarios_grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_grupos`
--

LOCK TABLES `usuarios_grupos` WRITE;
/*!40000 ALTER TABLE `usuarios_grupos` DISABLE KEYS */;
INSERT  IGNORE INTO `usuarios_grupos` (`id`, `grupo_id`, `usuario_id`, `created`, `modified`) VALUES (6,1,1,'2016-01-11 20:54:41','2016-01-11 20:54:41'),(7,2,1,'2016-01-11 20:54:41','2016-01-11 20:54:41'),(8,1,8,'2016-01-11 20:54:58','2016-01-11 20:54:58'),(9,3,8,'2016-01-11 20:54:58','2016-01-11 20:54:58'),(10,4,8,'2016-01-11 20:54:58','2016-01-11 20:54:58');
/*!40000 ALTER TABLE `usuarios_grupos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-13 19:09:20
