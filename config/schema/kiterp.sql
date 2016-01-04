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
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '\n\n',
  `nome` varchar(60) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atividades`
--

LOCK TABLES `atividades` WRITE;
/*!40000 ALTER TABLE `atividades` DISABLE KEYS */;
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
  `sequencial_arquivo` int(11) DEFAULT NULL,
  `caminho_arquivo` varchar(65) DEFAULT NULL,
  `sacador_avalista` varchar(65) DEFAULT NULL,
  `cnpj_sacador` varchar(18) DEFAULT NULL,
  `contrato` varchar(45) DEFAULT NULL,
  `carteira` varchar(45) DEFAULT NULL,
  `convenio` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bancos`
--

LOCK TABLES `bancos` WRITE;
/*!40000 ALTER TABLE `bancos` DISABLE KEYS */;
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
  `encerrado` int(1) DEFAULT NULL,
  `total_real` float(10,2) DEFAULT NULL,
  `total_sobras` float(10,2) DEFAULT NULL,
  `total_faltas` float(10,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caixas_diarios`
--

LOCK TABLES `caixas_diarios` WRITE;
/*!40000 ALTER TABLE `caixas_diarios` DISABLE KEYS */;
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
  `tipo_lancamento` int(1) DEFAULT NULL,
  `valor` float(10,2) DEFAULT NULL,
  `modalidade` int(1) DEFAULT NULL,
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
  `creatde` datetime DEFAULT NULL,
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
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '\n',
  `empresa_id` int(11) DEFAULT NULL,
  `numero_documento` varchar(45) DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `valor_documento` float(10,2) DEFAULT NULL,
  `pessoa_id` int(11) DEFAULT NULL,
  `banco_id` int(11) DEFAULT NULL,
  `tradutora_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
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
  `status` int(1) DEFAULT NULL,
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
  `regime_tributario` int(1) DEFAULT NULL,
  `versao_sefaz` varchar(10) DEFAULT NULL,
  `perentual_tributo` float(4,2) DEFAULT NULL,
  `hora_tzd` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
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
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formas_pagamentos`
--

LOCK TABLES `formas_pagamentos` WRITE;
/*!40000 ALTER TABLE `formas_pagamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `formas_pagamentos` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos_estoques`
--

LOCK TABLES `grupos_estoques` WRITE;
/*!40000 ALTER TABLE `grupos_estoques` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `icms_estaduais`
--

LOCK TABLES `icms_estaduais` WRITE;
/*!40000 ALTER TABLE `icms_estaduais` DISABLE KEYS */;
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
  `tipo_imposto` int(2) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ncm`
--

LOCK TABLES `ncm` WRITE;
/*!40000 ALTER TABLE `ncm` DISABLE KEYS */;
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
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ncm_iva`
--

LOCK TABLES `ncm_iva` WRITE;
/*!40000 ALTER TABLE `ncm_iva` DISABLE KEYS */;
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
  `cancelada` int(1) DEFAULT NULL,
  `data_cancelada` date DEFAULT NULL,
  `numero_pedido` int(11) DEFAULT NULL,
  `frete` int(1) DEFAULT NULL,
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
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa_id` int(11) DEFAULT NULL,
  `data_pedido` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
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
  `tipo_pessoa` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `consumidor_final` int(1) DEFAULT NULL,
  `tipo_contribuinte` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas`
--

LOCK TABLES `pessoas` WRITE;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
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
  `tipo_associacao` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas_associacoes`
--

LOCK TABLES `pessoas_associacoes` WRITE;
/*!40000 ALTER TABLE `pessoas_associacoes` DISABLE KEYS */;
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
  `tipo_contato_id` int(11) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas_contatos`
--

LOCK TABLES `pessoas_contatos` WRITE;
/*!40000 ALTER TABLE `pessoas_contatos` DISABLE KEYS */;
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
  `tipo_endereco` int(1) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(65) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `principal` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas_enderecos`
--

LOCK TABLES `pessoas_enderecos` WRITE;
/*!40000 ALTER TABLE `pessoas_enderecos` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas_fisicas`
--

LOCK TABLES `pessoas_fisicas` WRITE;
/*!40000 ALTER TABLE `pessoas_fisicas` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas_juridicas`
--

LOCK TABLES `pessoas_juridicas` WRITE;
/*!40000 ALTER TABLE `pessoas_juridicas` DISABLE KEYS */;
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
  `nome` varchar(255) DEFAULT NULL,
  `unidade` varchar(4) DEFAULT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `produto_kit` int(1) DEFAULT NULL,
  `foto` varchar(65) DEFAULT NULL,
  `descricao` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
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
  `margem` float(4,4) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos_valores`
--

LOCK TABLES `produtos_valores` WRITE;
/*!40000 ALTER TABLE `produtos_valores` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_contatos`
--

LOCK TABLES `tipos_contatos` WRITE;
/*!40000 ALTER TABLE `tipos_contatos` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transportadoras`
--

LOCK TABLES `transportadoras` WRITE;
/*!40000 ALTER TABLE `transportadoras` DISABLE KEYS */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-04 18:31:39
