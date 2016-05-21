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


-- Inicio das estrutura da tabela `atividades` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `atividades`;
CREATE TABLE IF NOT EXISTS `atividades` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(60) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `atividades` --


-- Inicio das estrutura da tabela `bancos` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `bancos`;
CREATE TABLE IF NOT EXISTS `bancos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`codigo_banco` INTEGER(4) DEFAULT NULL,
`nome` VARCHAR(65) DEFAULT NULL,
`agencia` VARCHAR(45) DEFAULT NULL,
`conta_corrente` VARCHAR(45) DEFAULT NULL,
`sequencial_arquivo` INTEGER(11) DEFAULT NULL,
`caminho_arquivo` VARCHAR(65) DEFAULT NULL,
`sacador_avalista` VARCHAR(65) DEFAULT NULL,
`cnpj_sacador` VARCHAR(18) DEFAULT NULL,
`contrato` VARCHAR(45) DEFAULT NULL,
`carteira` VARCHAR(45) DEFAULT NULL,
`convenio` VARCHAR(45) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
`principal` INTEGER(1) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `bancos` --


-- Inicio das estrutura da tabela `caixas_diarios` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `caixas_diarios`;
CREATE TABLE IF NOT EXISTS `caixas_diarios` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`data` DATE DEFAULT NULL,
`pessoa_id` INTEGER(11) DEFAULT NULL,
`terminal_id` INTEGER(11) DEFAULT NULL,
`status` INTEGER(1) DEFAULT NULL COMMENT '0 - Fechado | 1 - Aberto',
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `caixas_diarios` --


-- Inicio das estrutura da tabela `caixas_movimentos` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `caixas_movimentos`;
CREATE TABLE IF NOT EXISTS `caixas_movimentos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`caixas_diario_id` INTEGER(11) DEFAULT NULL,
`status` INTEGER(1) DEFAULT NULL COMMENT '1 - Abertura | 2 - Entrada | 3 - Saída | 9 - Excluido',
`valor` FLOAT(10,2) DEFAULT NULL,
`descricao` TEXT DEFAULT NULL,
`grupo_id` INTEGER(11) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `caixas_movimentos` --


-- Inicio das estrutura da tabela `condicoes_pagamentos` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `condicoes_pagamentos`;
CREATE TABLE IF NOT EXISTS `condicoes_pagamentos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(65) DEFAULT NULL,
`qtde_parcelas` INTEGER(4) DEFAULT NULL,
`qtde_dias` INTEGER(4) DEFAULT NULL,
`avista` INTEGER(1) DEFAULT NULL COMMENT '0 - Não | 1 - Sim',
`parcelas` TEXT DEFAULT NULL,
`principal` INTEGER(1) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `condicoes_pagamentos` --


-- Inicio das estrutura da tabela `contas` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `contas`;
CREATE TABLE IF NOT EXISTS `contas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`codigo` VARCHAR(10) DEFAULT NULL,
`nome` VARCHAR(65) DEFAULT NULL,
`tipo` INTEGER(1) DEFAULT NULL COMMENT '1 - Credora | 2 - Devedora',
`id_pai` INTEGER(11) DEFAULT NULL,
`tradutora` INTEGER(11) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `contas` --


-- Inicio das estrutura da tabela `contas_pagar` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `contas_pagar`;
CREATE TABLE IF NOT EXISTS `contas_pagar` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11) DEFAULT NULL,
`numero_documento` VARCHAR(45) DEFAULT NULL,
`data_vencimento` DATE DEFAULT NULL,
`valor_documento` FLOAT(10,2) DEFAULT NULL,
`pessoa_id` INTEGER(11) DEFAULT NULL,
`banco_id` INTEGER(11) DEFAULT NULL,
`tradutora_id` INTEGER(11) DEFAULT NULL,
`status` INTEGER(1) DEFAULT NULL COMMENT '1 - Aberto | 2 - baixado | 3 - Cancelado',
`data_pagamento` DATE DEFAULT NULL,
`valor_pagamento` FLOAT(10,2) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
`contas_receber_id` INTEGER(11) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `contas_pagar` --


-- Inicio das estrutura da tabela `contas_receber` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `contas_receber`;
CREATE TABLE IF NOT EXISTS `contas_receber` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11) DEFAULT NULL,
`numero_documento` VARCHAR(45) DEFAULT NULL,
`data_vencimento` DATE DEFAULT NULL,
`valor_documento` FLOAT(10,2) DEFAULT NULL,
`pessoa_id` INTEGER(11) DEFAULT NULL,
`banco_id` INTEGER(11) DEFAULT NULL,
`tradutora_id` INTEGER(11) DEFAULT NULL,
`status` INTEGER(1) DEFAULT NULL COMMENT '1 - Aberto | 2 - baixado | 3 - Cancelado',
`data_recebimento` DATE DEFAULT NULL,
`valor_recebimento` FLOAT(10,2) DEFAULT NULL,
`numero_pedido` INTEGER(11) DEFAULT NULL,
`nota_fiscal` INTEGER(11) DEFAULT NULL,
`serie` VARCHAR(4) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
`valor_desconto` FLOAT(10,2) DEFAULT NULL,
`valor_liquido` FLOAT(10,2) DEFAULT NULL,
`formas_pagamento_id` INTEGER(11) DEFAULT NULL,
`parcelas` INTEGER(4) DEFAULT NULL,
`dias` INTEGER(4) DEFAULT NULL,
`cheque_numero` VARCHAR(255) DEFAULT NULL,
`cheque_banco` VARCHAR(40) DEFAULT NULL,
`cheque_emitente` VARCHAR(255) DEFAULT NULL,
`cheque_destino` VARCHAR(255) DEFAULT NULL,
`taxa` FLOAT(10,4) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `contas_receber` --


-- Inicio das estrutura da tabela `empresas` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pessoa_id` INTEGER(11) DEFAULT NULL,
`codigo_cidade` INTEGER(11) DEFAULT NULL,
`regime_tributario` INTEGER(1) DEFAULT NULL COMMENT '1 - Simples Nacional | 2 - Simples Nacional com Excesso | 3 - Regime Normal',
`produto` INTEGER(1) DEFAULT NULL COMMENT '0 - Não | 1 - Sim',
`versao_sefaz` VARCHAR(10) DEFAULT NULL,
`perentual_tributo` FLOAT(4,2) DEFAULT NULL,
`hora_tzd` VARCHAR(6) DEFAULT NULL COMMENT '-03:00 - Horario Normal | -02:00 - Horario Verao',
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `empresas` --


-- Inicio das estrutura da tabela `formas_pagamentos` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `formas_pagamentos`;
CREATE TABLE IF NOT EXISTS `formas_pagamentos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(255) DEFAULT NULL,
`abreviado` VARCHAR(12) DEFAULT NULL,
`qtde_dias` INTEGER(4) DEFAULT NULL,
`qtde_taxas` INTEGER(4) DEFAULT NULL,
`valor_taxas` TEXT DEFAULT NULL,
`grupo` INTEGER(1) DEFAULT NULL COMMENT '1 - Dinheiro | 2 - Cheque | 3 - Cartão | 4 - Prazo',
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `formas_pagamentos` --


-- Inicio das estrutura da tabela `grupos` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(100) DEFAULT NULL,
`status` INTEGER(1) DEFAULT NULL,
`created` VARCHAR(45) DEFAULT NULL,
`modified` VARCHAR(45) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `grupos` --


-- Inicio das estrutura da tabela `grupos_estoques` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `grupos_estoques`;
CREATE TABLE IF NOT EXISTS `grupos_estoques` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(60) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `grupos_estoques` --


-- Inicio das estrutura da tabela `icms_estaduais` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `icms_estaduais`;
CREATE TABLE IF NOT EXISTS `icms_estaduais` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`estado` VARCHAR(2) DEFAULT NULL,
`nome` VARCHAR(60) DEFAULT NULL,
`icms_interno` FLOAT(10,2) DEFAULT NULL,
`icms_externo` FLOAT(10,2) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `icms_estaduais` --


-- Inicio das estrutura da tabela `impostos` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `impostos`;
CREATE TABLE IF NOT EXISTS `impostos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`tipo_imposto` INTEGER(2) DEFAULT NULL COMMENT '1 - Icms Simples Nacional | 2 - Icms Regime Normal | 3- Ipi | 4 - Cst Pis | 5 - Cst Cofins | 6 - Icms Origem | 7 - Tabela Cfop',
`codigo` VARCHAR(5) DEFAULT NULL,
`nome` VARCHAR(255) DEFAULT NULL,
`extra` VARCHAR(255) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `impostos` --


-- Inicio das estrutura da tabela `inventarios` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `inventarios`;
CREATE TABLE IF NOT EXISTS `inventarios` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`produto_id` INTEGER(11) DEFAULT NULL,
`nome` VARCHAR(255) DEFAULT NULL,
`unidade` VARCHAR(255) DEFAULT NULL,
`grupo` VARCHAR(255) DEFAULT NULL,
`estoque` FLOAT(10,4) DEFAULT NULL,
`compra` FLOAT(10,2) DEFAULT NULL,
`valor` FLOAT(10,2) DEFAULT NULL,
`total` FLOAT(10,2) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `inventarios` --


-- Inicio das estrutura da tabela `kit_importacao` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `kit_importacao`;
CREATE TABLE IF NOT EXISTS `kit_importacao` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`produto_barra` VARCHAR(100) NOT NULL,
`kit_barra` VARCHAR(100) NOT NULL,
`quantidade` FLOAT(11,4) NOT NULL,
`created` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `kit_importacao` --


-- Inicio das estrutura da tabela `menus` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`titulo` VARCHAR(255) NOT NULL,
`plugin` VARCHAR(100) DEFAULT NULL,
`controller` VARCHAR(100) NOT NULL,
`action` VARCHAR(100) NOT NULL,
`status` INTEGER(1) NOT NULL DEFAULT 1,
`root` INTEGER(1) NOT NULL DEFAULT 0,
`item_menu` INTEGER(1) NOT NULL DEFAULT 1,
`grupos` VARCHAR(100) DEFAULT NULL,
`icone` VARCHAR(100) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modifield` DATETIME DEFAULT NULL,
`sub_grupos` VARCHAR(100) DEFAULT NULL,
`ordem` INTEGER(2) DEFAULT NULL,
`parametros` VARCHAR(500) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `menus` --


-- Inicio das estrutura da tabela `menus_grupos` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `menus_grupos`;
CREATE TABLE IF NOT EXISTS `menus_grupos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`menu_id` INTEGER(11) DEFAULT NULL,
`grupo_id` INTEGER(11) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `menus_grupos` --


-- Inicio das estrutura da tabela `ncm` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `ncm`;
CREATE TABLE IF NOT EXISTS `ncm` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`ncm` VARCHAR(12) DEFAULT NULL,
`nome` VARCHAR(255) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `ncm` --


-- Inicio das estrutura da tabela `ncm_iva` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `ncm_iva`;
CREATE TABLE IF NOT EXISTS `ncm_iva` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`ncm_id` INTEGER(11) DEFAULT NULL,
`icms_estadual_id` INTEGER(11) DEFAULT NULL,
`iva` FLOAT(4,2) DEFAULT NULL,
`perc_tributo` FLOAT(4,2) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `ncm_iva` --


-- Inicio das estrutura da tabela `nota_fiscal_entradas` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `nota_fiscal_entradas`;
CREATE TABLE IF NOT EXISTS `nota_fiscal_entradas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11) DEFAULT NULL,
`numero_nota_fiscal` INTEGER(11) DEFAULT NULL,
`serie` VARCHAR(4) DEFAULT NULL,
`pessoa_id` INTEGER(11) DEFAULT NULL,
`cfop_id` INTEGER(11) DEFAULT NULL,
`data_emissao` DATE DEFAULT NULL,
`data_entrada` DATE DEFAULT NULL,
`total_produtos` FLOAT(10,2) DEFAULT NULL,
`total_nota` FLOAT(10,2) DEFAULT NULL,
`base_icms` FLOAT(10,2) DEFAULT NULL,
`valor_icms` FLOAT(10,2) DEFAULT NULL,
`base_st` FLOAT(10,2) DEFAULT NULL,
`valor_st` FLOAT(10,2) DEFAULT NULL,
`valor_ipi` FLOAT(10,2) DEFAULT NULL,
`valor_frete` FLOAT(10,2) DEFAULT NULL,
`valor_seguro` FLOAT(10,2) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `nota_fiscal_entradas` --


-- Inicio das estrutura da tabela `nota_fiscal_entradas_itens` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `nota_fiscal_entradas_itens`;
CREATE TABLE IF NOT EXISTS `nota_fiscal_entradas_itens` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nota_fiscal_entrada_id` INTEGER(11) DEFAULT NULL,
`produto_id` INTEGER(11) DEFAULT NULL,
`qtde` FLOAT(6,4) DEFAULT NULL,
`compra` FLOAT(10,2) DEFAULT NULL,
`total` FLOAT(10,2) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `nota_fiscal_entradas_itens` --


-- Inicio das estrutura da tabela `nota_fiscal_saidas` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `nota_fiscal_saidas`;
CREATE TABLE IF NOT EXISTS `nota_fiscal_saidas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11) DEFAULT NULL,
`numero_nota_fiscal` INTEGER(11) DEFAULT NULL,
`serie` VARCHAR(4) DEFAULT NULL,
`cfop_id` INTEGER(11) DEFAULT NULL,
`pessoa_id` INTEGER(11) DEFAULT NULL,
`data_emissao` DATE DEFAULT NULL,
`data_saida` DATE DEFAULT NULL,
`hora_saida` VARCHAR(12) DEFAULT NULL,
`forma_pagamento_id` INTEGER(11) DEFAULT NULL,
`total_produtos` FLOAT(10,2) DEFAULT NULL,
`total_nota` FLOAT(10,2) DEFAULT NULL,
`base_icms` FLOAT(10,2) DEFAULT NULL,
`valor_icms` FLOAT(10,2) DEFAULT NULL,
`transportadora_id` INTEGER(11) DEFAULT NULL,
`vendedor_id` INTEGER(11) DEFAULT NULL,
`cancelada` INTEGER(1) DEFAULT NULL COMMENT '0 - Não | 1 - Sim',
`data_cancelada` DATE DEFAULT NULL,
`numero_pedido` INTEGER(11) DEFAULT NULL,
`frete` INTEGER(1) DEFAULT NULL COMMENT '0 - Cif Emitente | 1 - Fob Destinatario',
`qtde_volumes` INTEGER(11) DEFAULT NULL,
`especie` VARCHAR(45) DEFAULT NULL,
`base_st` FLOAT(10,2) DEFAULT NULL,
`valor_st` FLOAT(10,2) DEFAULT NULL,
`base_credito` FLOAT(10,2) DEFAULT NULL,
`valor_credito` FLOAT(10,2) DEFAULT NULL,
`percentual_tributo` FLOAT(4,2) DEFAULT NULL,
`valor_tributo` FLOAT(10,2) DEFAULT NULL,
`operacao` INTEGER(1) DEFAULT NULL,
`atendimento` INTEGER(1) DEFAULT NULL,
`data_hora` VARCHAR(60) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `nota_fiscal_saidas` --


-- Inicio das estrutura da tabela `nota_fiscal_saidas_itens` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `nota_fiscal_saidas_itens`;
CREATE TABLE IF NOT EXISTS `nota_fiscal_saidas_itens` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nota_fiscal_saida_id` INTEGER(11) DEFAULT NULL,
`produto_id` INTEGER(11) DEFAULT NULL,
`qtde` FLOAT(6,4) DEFAULT NULL,
`venda` FLOAT(10,2) DEFAULT NULL,
`total` FLOAT(10,2) DEFAULT NULL,
`base_icms` FLOAT(10,2) DEFAULT NULL,
`valor_icms` FLOAT(10,2) DEFAULT NULL,
`ncms_id` INTEGER(11) DEFAULT NULL,
`cfop` VARCHAR(6) DEFAULT NULL,
`origem` VARCHAR(6) DEFAULT NULL,
`base_credito` FLOAT(10,2) DEFAULT NULL,
`valor_credito` FLOAT(10,2) DEFAULT NULL,
`base_st` FLOAT(10,2) DEFAULT NULL,
`valor_st` FLOAT(10,2) DEFAULT NULL,
`valor_tributo` FLOAT(10,2) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `nota_fiscal_saidas_itens` --


-- Inicio das estrutura da tabela `notas_fiscais_entradas` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `notas_fiscais_entradas`;
CREATE TABLE IF NOT EXISTS `notas_fiscais_entradas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11) DEFAULT NULL,
`numero_nota_fiscal` INTEGER(11) DEFAULT NULL,
`serie` VARCHAR(4) DEFAULT NULL,
`pessoa_id` INTEGER(11) DEFAULT NULL,
`cfop_id` INTEGER(11) DEFAULT NULL,
`data_emissao` DATE DEFAULT NULL,
`data_entrada` DATE DEFAULT NULL,
`total_produtos` FLOAT(10,2) DEFAULT NULL,
`total_nota` FLOAT(10,2) DEFAULT NULL,
`base_icms` FLOAT(10,2) DEFAULT NULL,
`valor_icms` FLOAT(10,2) DEFAULT NULL,
`base_st` FLOAT(10,2) DEFAULT NULL,
`valor_st` FLOAT(10,2) DEFAULT NULL,
`valor_ipi` FLOAT(10,2) DEFAULT NULL,
`valor_frete` FLOAT(10,2) DEFAULT NULL,
`valor_seguro` FLOAT(10,2) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `notas_fiscais_entradas` --


-- Inicio das estrutura da tabela `notas_fiscais_entradas_itens` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `notas_fiscais_entradas_itens`;
CREATE TABLE IF NOT EXISTS `notas_fiscais_entradas_itens` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`notas_fiscais_entrada_id` INTEGER(11) DEFAULT NULL,
`produto_id` INTEGER(11) DEFAULT NULL,
`qtde` FLOAT(6,4) DEFAULT NULL,
`compra` FLOAT(10,2) DEFAULT NULL,
`total` FLOAT(10,2) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `notas_fiscais_entradas_itens` --


-- Inicio das estrutura da tabela `notas_fiscais_saidas` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `notas_fiscais_saidas`;
CREATE TABLE IF NOT EXISTS `notas_fiscais_saidas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11) DEFAULT NULL,
`numero_nota_fiscal` INTEGER(11) DEFAULT NULL,
`serie` VARCHAR(4) DEFAULT NULL,
`cfop_id` INTEGER(11) DEFAULT NULL,
`pessoa_id` INTEGER(11) DEFAULT NULL,
`data_emissao` DATE DEFAULT NULL,
`data_saida` DATE DEFAULT NULL,
`hora_saida` VARCHAR(12) DEFAULT NULL,
`forma_pagamento_id` INTEGER(11) DEFAULT NULL,
`total_produtos` FLOAT(10,2) DEFAULT NULL,
`total_nota` FLOAT(10,2) DEFAULT NULL,
`base_icms` FLOAT(10,2) DEFAULT NULL,
`valor_icms` FLOAT(10,2) DEFAULT NULL,
`transportadora_id` INTEGER(11) DEFAULT NULL,
`vendedor_id` INTEGER(11) DEFAULT NULL,
`cancelada` INTEGER(1) DEFAULT NULL COMMENT '0 - Não | 1 - Sim',
`data_cancelada` DATE DEFAULT NULL,
`numero_pedido` INTEGER(11) DEFAULT NULL,
`frete` INTEGER(1) DEFAULT NULL COMMENT '0 - Cif Emitente | 1 - Fob Destinatario',
`qtde_volumes` INTEGER(11) DEFAULT NULL,
`especie` VARCHAR(45) DEFAULT NULL,
`base_st` FLOAT(10,2) DEFAULT NULL,
`valor_st` FLOAT(10,2) DEFAULT NULL,
`base_credito` FLOAT(10,2) DEFAULT NULL,
`valor_credito` FLOAT(10,2) DEFAULT NULL,
`percentual_tributo` FLOAT(4,2) DEFAULT NULL,
`valor_tributo` FLOAT(10,2) DEFAULT NULL,
`operacao` INTEGER(1) DEFAULT NULL,
`atendimento` INTEGER(1) DEFAULT NULL,
`data_hora` VARCHAR(60) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `notas_fiscais_saidas` --


-- Inicio das estrutura da tabela `notas_fiscais_saidas_itens` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `notas_fiscais_saidas_itens`;
CREATE TABLE IF NOT EXISTS `notas_fiscais_saidas_itens` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`notas_fiscais_saida_id` INTEGER(11) DEFAULT NULL,
`produto_id` INTEGER(11) DEFAULT NULL,
`qtde` FLOAT(6,4) DEFAULT NULL,
`venda` FLOAT(10,2) DEFAULT NULL,
`total` FLOAT(10,2) DEFAULT NULL,
`base_icms` FLOAT(10,2) DEFAULT NULL,
`valor_icms` FLOAT(10,2) DEFAULT NULL,
`ncms_id` INTEGER(11) DEFAULT NULL,
`cfop` VARCHAR(6) DEFAULT NULL,
`origem` VARCHAR(6) DEFAULT NULL,
`base_credito` FLOAT(10,2) DEFAULT NULL,
`valor_credito` FLOAT(10,2) DEFAULT NULL,
`base_st` FLOAT(10,2) DEFAULT NULL,
`valor_st` FLOAT(10,2) DEFAULT NULL,
`valor_tributo` FLOAT(10,2) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `notas_fiscais_saidas_itens` --


-- Inicio das estrutura da tabela `parametros` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `parametros`;
CREATE TABLE IF NOT EXISTS `parametros` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(255) DEFAULT NULL,
`chave` VARCHAR(100) DEFAULT NULL,
`valor` TEXT DEFAULT NULL,
`tipo` INTEGER(1) DEFAULT NULL COMMENT '1 - Inteiro | 2 - String | 3 - Texto | 4 - Lista | 5 - Float',
`opcoes` TEXT DEFAULT NULL,
`grupo` VARCHAR(100) DEFAULT NULL,
`root` INTEGER(1) DEFAULT NULL,
`required` INTEGER(1) NOT NULL DEFAULT 0,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `parametros` --


-- Inicio das estrutura da tabela `pedidos` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11) DEFAULT NULL,
`data_pedido` DATETIME DEFAULT NULL,
`status` INTEGER(1) DEFAULT NULL COMMENT '1 - Aberto | 2 - Emitido | 3 - Recebido | 4 - Orcamento | 5 - Nota Fiscal | 6 - Cancelado',
`pessoa_id` INTEGER(11) DEFAULT NULL,
`condicao_pagamento_id` INTEGER(11) DEFAULT NULL,
`vendedor_id` INTEGER(11) DEFAULT NULL,
`transportadora_id` INTEGER(11) DEFAULT NULL,
`valor_total` FLOAT(10,2) DEFAULT NULL,
`numero_cupom` INTEGER(11) DEFAULT NULL,
`nota_fiscal` INTEGER(11) DEFAULT NULL,
`serie` VARCHAR(4) DEFAULT NULL,
`caixas_diario_id` INTEGER(11) DEFAULT NULL,
`cpf` VARCHAR(18) DEFAULT NULL,
`data_fechamento` DATETIME DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
`parcelas` TEXT DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pedidos` --


-- Inicio das estrutura da tabela `pedidos_formas_pagamentos` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `pedidos_formas_pagamentos`;
CREATE TABLE IF NOT EXISTS `pedidos_formas_pagamentos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pedido_id` INTEGER(11) DEFAULT NULL,
`formas_pagamento_id` INTEGER(11) DEFAULT NULL,
`valor` FLOAT(10,2) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pedidos_formas_pagamentos` --


-- Inicio das estrutura da tabela `pedidos_itens` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `pedidos_itens`;
CREATE TABLE IF NOT EXISTS `pedidos_itens` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pedido_id` INTEGER(11) DEFAULT NULL,
`produto_id` INTEGER(11) DEFAULT NULL,
`qtde` FLOAT(8,4) DEFAULT NULL,
`venda` FLOAT(10,2) DEFAULT NULL,
`total` FLOAT(10,2) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pedidos_itens` --


-- Inicio das estrutura da tabela `pessoas` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `pessoas`;
CREATE TABLE IF NOT EXISTS `pessoas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(255) DEFAULT NULL,
`tipo_pessoa` INTEGER(1) DEFAULT NULL COMMENT '1 - Fisica | 2 - Juridica',
`status` INTEGER(1) DEFAULT NULL COMMENT '0 - Ativo | 1 - Inativo | 9 - Excluido',
`consumidor_final` INTEGER(1) DEFAULT NULL COMMENT '0 - Não | 1 - Sim',
`tipo_contribuinte` INTEGER(1) DEFAULT NULL COMMENT '1 - Contribuinte Icms | 2 - Contribuinte Isento | 3 - Não Contribuinte',
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
`observacoes` TEXT DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pessoas` --


-- Inicio das estrutura da tabela `pessoas_associacoes` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `pessoas_associacoes`;
CREATE TABLE IF NOT EXISTS `pessoas_associacoes` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pessoa_id` INTEGER(11) DEFAULT NULL,
`tipo_associacao` INTEGER(1) DEFAULT NULL COMMENT '1 - Empresas | 2 - Clientes | 3 - Fornecedores | 4 - Vendedores | 5 - Representantes | 6 - Operadores | 7 - Usuários',
`status` INTEGER(1) DEFAULT NULL COMMENT '0 - Ativo | 1 - Inativo | 9 - Excluido',
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pessoas_associacoes` --


-- Inicio das estrutura da tabela `pessoas_contatos` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `pessoas_contatos`;
CREATE TABLE IF NOT EXISTS `pessoas_contatos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pessoa_id` INTEGER(11) DEFAULT NULL,
`tipos_contato_id` INTEGER(11) DEFAULT NULL,
`valor` VARCHAR(45) DEFAULT NULL,
`status` INTEGER(1) DEFAULT NULL COMMENT '0 - Ativo | 1 - Inativo | 9 - Excluido',
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pessoas_contatos` --


-- Inicio das estrutura da tabela `pessoas_enderecos` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `pessoas_enderecos`;
CREATE TABLE IF NOT EXISTS `pessoas_enderecos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pessoa_id` INTEGER(11) DEFAULT NULL,
`tipo_endereco` INTEGER(1) DEFAULT NULL COMMENT '1 - Comercial | 2 - Residencial | 3 - Entrega | 4 - Cobranca | 9 - Outros',
`cep` VARCHAR(10) DEFAULT NULL,
`endereco` VARCHAR(255) DEFAULT NULL,
`numero` VARCHAR(15) DEFAULT NULL,
`complemento` VARCHAR(45) DEFAULT NULL,
`bairro` VARCHAR(45) DEFAULT NULL,
`cidade` VARCHAR(65) DEFAULT NULL,
`estado` VARCHAR(2) DEFAULT NULL,
`principal` INTEGER(1) DEFAULT NULL COMMENT '0 - Não | 1 - Sim',
`status` INTEGER(1) DEFAULT NULL COMMENT '0 - Ativo | 1 - Inativo | 9 - Excluido',
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pessoas_enderecos` --


-- Inicio das estrutura da tabela `pessoas_fisicas` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `pessoas_fisicas`;
CREATE TABLE IF NOT EXISTS `pessoas_fisicas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pessoa_id` INTEGER(11) DEFAULT NULL,
`cpf` VARCHAR(14) DEFAULT NULL,
`rg` VARCHAR(14) DEFAULT NULL,
`data_nascimento` DATE DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pessoas_fisicas` --


-- Inicio das estrutura da tabela `pessoas_juridicas` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `pessoas_juridicas`;
CREATE TABLE IF NOT EXISTS `pessoas_juridicas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pessoa_id` INTEGER(11) DEFAULT NULL,
`cnpj` VARCHAR(18) DEFAULT NULL,
`inscricao_estadual` VARCHAR(18) DEFAULT NULL,
`inscricao_municipal` VARCHAR(18) DEFAULT NULL,
`data_abertura` DATE DEFAULT NULL,
`cnai` VARCHAR(45) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pessoas_juridicas` --


-- Inicio das estrutura da tabela `produtos` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`barra` VARCHAR(14) DEFAULT NULL,
`codigo_interno` VARCHAR(14) DEFAULT NULL,
`nome` VARCHAR(255) DEFAULT NULL,
`unidade` VARCHAR(4) DEFAULT NULL,
`grupo_id` INTEGER(11) DEFAULT NULL,
`produto_kit` INTEGER(1) DEFAULT NULL COMMENT '0 - Não | 1 - Sim',
`foto` VARCHAR(65) DEFAULT NULL,
`descricao` TEXT DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
`status` INTEGER(1) DEFAULT NULL COMMENT '0 - Inativa | 1 - Ativo | 9 - Excluido',
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `produtos` --


-- Inicio das estrutura da tabela `produtos_kits` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `produtos_kits`;
CREATE TABLE IF NOT EXISTS `produtos_kits` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11) DEFAULT NULL,
`produto_id` INTEGER(11) DEFAULT NULL,
`kit_id` INTEGER(11) DEFAULT NULL,
`qtde` FLOAT(8,4) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `produtos_kits` --


-- Inicio das estrutura da tabela `produtos_valores` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `produtos_valores`;
CREATE TABLE IF NOT EXISTS `produtos_valores` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11) DEFAULT NULL,
`produto_id` INTEGER(11) DEFAULT NULL,
`ncm_id` INTEGER(11) DEFAULT NULL,
`estoque_minimo` FLOAT(8,4) DEFAULT NULL,
`estoque_atual` FLOAT(8,4) DEFAULT NULL,
`valor_compras` FLOAT(10,2) DEFAULT NULL,
`margem` FLOAT(6,4) DEFAULT NULL,
`valor_vendas` FLOAT(10,2) DEFAULT NULL,
`cst_pis` INTEGER(11) DEFAULT NULL,
`cst_cofins` INTEGER(11) DEFAULT NULL,
`cst_icms` INTEGER(11) DEFAULT NULL,
`cst_origem` INTEGER(11) DEFAULT NULL,
`percentual_icms` FLOAT(4,2) DEFAULT NULL,
`percentual_pis` FLOAT(4,2) DEFAULT NULL,
`percentual_cofins` FLOAT(4,2) DEFAULT NULL,
`percentual_ipi` FLOAT(4,2) DEFAULT NULL,
`percentual_tributacao` FLOAT(4,2) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
`origem` VARCHAR(5) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `produtos_valores` --


-- Inicio das estrutura da tabela `terminais` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `terminais`;
CREATE TABLE IF NOT EXISTS `terminais` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(500) DEFAULT NULL,
`ip` VARCHAR(255) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `terminais` --


-- Inicio das estrutura da tabela `tipos_contatos` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `tipos_contatos`;
CREATE TABLE IF NOT EXISTS `tipos_contatos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(60) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `tipos_contatos` --


-- Inicio das estrutura da tabela `transportadoras` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `transportadoras`;
CREATE TABLE IF NOT EXISTS `transportadoras` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(255) DEFAULT NULL,
`contado` VARCHAR(65) DEFAULT NULL,
`telefone1` VARCHAR(45) DEFAULT NULL,
`telefone2` VARCHAR(45) DEFAULT NULL,
`cnpj` VARCHAR(18) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `transportadoras` --


-- Inicio das estrutura da tabela `usuarios` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pessoa_id` INTEGER(11) DEFAULT NULL,
`nome` VARCHAR(255) DEFAULT NULL,
`username` VARCHAR(45) DEFAULT NULL,
`senha` VARCHAR(255) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
`root` INTEGER(1) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `usuarios` --


-- Inicio das estrutura da tabela `usuarios_grupos` --
/* !40101 SET character_set_client = utf8 */;
DROP TABLE IF EXISTS `usuarios_grupos`;
CREATE TABLE IF NOT EXISTS `usuarios_grupos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`grupo_id` INTEGER(11) DEFAULT NULL,
`usuario_id` INTEGER(11) DEFAULT NULL,
`created` DATETIME DEFAULT NULL,
`modified` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `usuarios_grupos` --


/* !40101 SET SQL_MODE=@OLD_SQL_MODE */;
/* !40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/* !40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/* !40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/* !40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/* !40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/* !40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

