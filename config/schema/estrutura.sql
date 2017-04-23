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
CREATE TABLE IF NOT EXISTS `atividades` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(60) COLLATE utf8_general_ci,
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `atividades` --


-- Inicio das estrutura da tabela `bancos` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `bancos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`codigo_banco` INTEGER(4),
`nome` VARCHAR(65) COLLATE utf8_general_ci,
`agencia` VARCHAR(45) COLLATE utf8_general_ci,
`conta_corrente` VARCHAR(45) COLLATE utf8_general_ci,
`sequencial_arquivo` INTEGER(11),
`caminho_arquivo` VARCHAR(65) COLLATE utf8_general_ci,
`sacador_avalista` VARCHAR(65) COLLATE utf8_general_ci,
`cnpj_sacador` VARCHAR(18) COLLATE utf8_general_ci,
`contrato` VARCHAR(45) COLLATE utf8_general_ci,
`carteira` VARCHAR(45) COLLATE utf8_general_ci,
`convenio` VARCHAR(45) COLLATE utf8_general_ci,
`created` DATETIME,
`modified` DATETIME,
`principal` INTEGER(1),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `bancos` --


-- Inicio das estrutura da tabela `caixas_diarios` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `caixas_diarios` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`data` DATE,
`pessoa_id` INTEGER(11),
`terminal_id` INTEGER(11),
`status` INTEGER(1) COMMENT '0 - Fechado | 1 - Aberto',
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `caixas_diarios` --


-- Inicio das estrutura da tabela `caixas_movimentos` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `caixas_movimentos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`caixas_diario_id` INTEGER(11),
`status` INTEGER(1) COMMENT '1 - Abertura | 2 - Entrada | 3 - Saída | 9 - Excluido',
`valor` FLOAT(10,2),
`descricao` TEXT COLLATE utf8_general_ci,
`grupo_id` INTEGER(11),
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `caixas_movimentos` --


-- Inicio das estrutura da tabela `condicoes_pagamentos` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `condicoes_pagamentos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(65) COLLATE utf8_general_ci,
`qtde_parcelas` INTEGER(4),
`qtde_dias` INTEGER(4),
`avista` INTEGER(1) COMMENT '0 - Não | 1 - Sim',
`parcelas` TEXT COLLATE utf8_general_ci,
`principal` INTEGER(1),
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `condicoes_pagamentos` --


-- Inicio das estrutura da tabela `contas` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `contas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`codigo` VARCHAR(10) COLLATE utf8_general_ci,
`nome` VARCHAR(65) COLLATE utf8_general_ci,
`tipo` INTEGER(1) COMMENT '1 - Credora | 2 - Devedora',
`id_pai` INTEGER(11),
`tradutora` INTEGER(11),
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `contas` --


-- Inicio das estrutura da tabela `contas_pagar` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `contas_pagar` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11),
`numero_documento` VARCHAR(45) COLLATE utf8_general_ci,
`data_vencimento` DATE,
`valor_documento` FLOAT(10,2),
`pessoa_id` INTEGER(11),
`banco_id` INTEGER(11),
`tradutora_id` INTEGER(11),
`status` INTEGER(1) COMMENT '1 - Aberto | 2 - baixado | 3 - Cancelado',
`data_pagamento` DATE,
`valor_pagamento` FLOAT(10,2),
`created` DATETIME,
`modified` DATETIME,
`contas_receber_id` INTEGER(11),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `contas_pagar` --


-- Inicio das estrutura da tabela `contas_receber` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `contas_receber` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11),
`numero_documento` VARCHAR(45) COLLATE utf8_general_ci,
`data_vencimento` DATE,
`valor_documento` FLOAT(10,2),
`pessoa_id` INTEGER(11),
`banco_id` INTEGER(11),
`tradutora_id` INTEGER(11),
`status` INTEGER(1) COMMENT '1 - Aberto | 2 - baixado | 3 - Cancelado',
`data_recebimento` DATE,
`valor_recebimento` FLOAT(10,2),
`numero_pedido` INTEGER(11),
`nota_fiscal` INTEGER(11),
`serie` VARCHAR(4) COLLATE utf8_general_ci,
`created` DATETIME,
`modified` DATETIME,
`valor_desconto` FLOAT(10,2),
`valor_liquido` FLOAT(10,2),
`formas_pagamento_id` INTEGER(11),
`parcelas` INTEGER(4),
`dias` INTEGER(4),
`cheque_numero` VARCHAR(255) COLLATE utf8_general_ci,
`cheque_banco` VARCHAR(40) COLLATE utf8_general_ci,
`cheque_emitente` VARCHAR(255) COLLATE utf8_general_ci,
`cheque_destino` VARCHAR(255) COLLATE utf8_general_ci,
`taxa` FLOAT(10,4),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `contas_receber` --


-- Inicio das estrutura da tabela `empresas` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `empresas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pessoa_id` INTEGER(11),
`codigo_cidade` INTEGER(11),
`regime_tributario` INTEGER(1) COMMENT '1 - Simples Nacional | 2 - Simples Nacional com Excesso | 3 - Regime Normal',
`produto` INTEGER(1) COMMENT '0 - Não | 1 - Sim',
`versao_sefaz` VARCHAR(10) COLLATE utf8_general_ci,
`perentual_tributo` FLOAT(4,2),
`hora_tzd` VARCHAR(6) COLLATE utf8_general_ci COMMENT '-03:00 - Horario Normal | -02:00 - Horario Verao',
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `empresas` --


-- Inicio das estrutura da tabela `formas_pagamentos` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `formas_pagamentos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(255) COLLATE utf8_general_ci,
`abreviado` VARCHAR(12) COLLATE utf8_general_ci,
`qtde_dias` INTEGER(4),
`qtde_taxas` INTEGER(4),
`valor_taxas` TEXT COLLATE utf8_general_ci,
`grupo` INTEGER(1) COMMENT '1 - Dinheiro | 2 - Cheque | 3 - Cartão | 4 - Prazo',
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `formas_pagamentos` --


-- Inicio das estrutura da tabela `grupos` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `grupos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(100) COLLATE utf8_general_ci,
`status` INTEGER(1),
`created` VARCHAR(45) COLLATE utf8_general_ci,
`modified` VARCHAR(45) COLLATE utf8_general_ci,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `grupos` --


-- Inicio das estrutura da tabela `grupos_estoques` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `grupos_estoques` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(60) COLLATE utf8_general_ci,
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `grupos_estoques` --


-- Inicio das estrutura da tabela `icms_estaduais` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `icms_estaduais` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`estado` VARCHAR(2) COLLATE utf8_general_ci,
`nome` VARCHAR(60) COLLATE utf8_general_ci,
`icms_interno` FLOAT(10,2),
`icms_externo` FLOAT(10,2),
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `icms_estaduais` --


-- Inicio das estrutura da tabela `impostos` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `impostos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`tipo_imposto` INTEGER(2) COMMENT '1 - Icms Simples Nacional | 2 - Icms Regime Normal | 3- Ipi | 4 - Cst Pis | 5 - Cst Cofins | 6 - Icms Origem | 7 - Tabela Cfop',
`codigo` VARCHAR(5) COLLATE utf8_general_ci,
`nome` VARCHAR(255) COLLATE utf8_general_ci,
`extra` VARCHAR(255) COLLATE utf8_general_ci,
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `impostos` --


-- Inicio das estrutura da tabela `inventarios` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `inventarios` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`produto_id` INTEGER(11),
`nome` VARCHAR(255) COLLATE utf8_general_ci,
`unidade` VARCHAR(255) COLLATE utf8_general_ci,
`grupo` VARCHAR(255) COLLATE utf8_general_ci,
`estoque` FLOAT(10,4),
`compra` FLOAT(10,2),
`valor` FLOAT(10,2),
`total` FLOAT(10,2),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `inventarios` --


-- Inicio das estrutura da tabela `kit_importacao` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `kit_importacao` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`produto_barra` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
`kit_barra` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
`quantidade` FLOAT(11,4) NOT NULL,
`created` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `kit_importacao` --


-- Inicio das estrutura da tabela `menus` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `menus` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`titulo` VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
`plugin` VARCHAR(100) COLLATE utf8_general_ci,
`controller` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
`action` VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
`status` INTEGER(1) NOT NULL DEFAULT 1,
`root` INTEGER(1) NOT NULL DEFAULT 0,
`item_menu` INTEGER(1) NOT NULL DEFAULT 1,
`grupos` VARCHAR(100) COLLATE utf8_general_ci,
`icone` VARCHAR(100) COLLATE utf8_general_ci,
`created` DATETIME,
`modifield` DATETIME,
`sub_grupos` VARCHAR(100) COLLATE utf8_general_ci,
`ordem` INTEGER(2),
`parametros` VARCHAR(500) COLLATE utf8_general_ci,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `menus` --


-- Inicio das estrutura da tabela `menus_grupos` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `menus_grupos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`menu_id` INTEGER(11),
`grupo_id` INTEGER(11),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `menus_grupos` --


-- Inicio das estrutura da tabela `ncm` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `ncm` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`ncm` VARCHAR(12) COLLATE utf8_general_ci,
`nome` VARCHAR(255) COLLATE utf8_general_ci,
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `ncm` --


-- Inicio das estrutura da tabela `ncm_iva` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `ncm_iva` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`ncm_id` INTEGER(11),
`icms_estadual_id` INTEGER(11),
`iva` FLOAT(4,2),
`perc_tributo` FLOAT(4,2),
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `ncm_iva` --


-- Inicio das estrutura da tabela `nota_fiscal_entradas` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `nota_fiscal_entradas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11),
`numero_nota_fiscal` INTEGER(11),
`serie` VARCHAR(4) COLLATE utf8_general_ci,
`pessoa_id` INTEGER(11),
`cfop_id` INTEGER(11),
`data_emissao` DATE,
`data_entrada` DATE,
`total_produtos` FLOAT(10,2),
`total_nota` FLOAT(10,2),
`base_icms` FLOAT(10,2),
`valor_icms` FLOAT(10,2),
`base_st` FLOAT(10,2),
`valor_st` FLOAT(10,2),
`valor_ipi` FLOAT(10,2),
`valor_frete` FLOAT(10,2),
`valor_seguro` FLOAT(10,2),
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `nota_fiscal_entradas` --


-- Inicio das estrutura da tabela `nota_fiscal_entradas_itens` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `nota_fiscal_entradas_itens` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nota_fiscal_entrada_id` INTEGER(11),
`produto_id` INTEGER(11),
`qtde` FLOAT(6,4),
`compra` FLOAT(10,2),
`total` FLOAT(10,2),
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `nota_fiscal_entradas_itens` --


-- Inicio das estrutura da tabela `nota_fiscal_saidas` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `nota_fiscal_saidas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11),
`numero_nota_fiscal` INTEGER(11),
`serie` VARCHAR(4) COLLATE utf8_general_ci,
`cfop_id` INTEGER(11),
`pessoa_id` INTEGER(11),
`data_emissao` DATE,
`data_saida` DATE,
`hora_saida` VARCHAR(12) COLLATE utf8_general_ci,
`forma_pagamento_id` INTEGER(11),
`total_produtos` FLOAT(10,2),
`total_nota` FLOAT(10,2),
`base_icms` FLOAT(10,2),
`valor_icms` FLOAT(10,2),
`transportadora_id` INTEGER(11),
`vendedor_id` INTEGER(11),
`cancelada` INTEGER(1) COMMENT '0 - Não | 1 - Sim',
`data_cancelada` DATE,
`numero_pedido` INTEGER(11),
`frete` INTEGER(1) COMMENT '0 - Cif Emitente | 1 - Fob Destinatario',
`qtde_volumes` INTEGER(11),
`especie` VARCHAR(45) COLLATE utf8_general_ci,
`base_st` FLOAT(10,2),
`valor_st` FLOAT(10,2),
`base_credito` FLOAT(10,2),
`valor_credito` FLOAT(10,2),
`percentual_tributo` FLOAT(4,2),
`valor_tributo` FLOAT(10,2),
`operacao` INTEGER(1),
`atendimento` INTEGER(1),
`data_hora` VARCHAR(60) COLLATE utf8_general_ci,
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `nota_fiscal_saidas` --


-- Inicio das estrutura da tabela `nota_fiscal_saidas_itens` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `nota_fiscal_saidas_itens` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nota_fiscal_saida_id` INTEGER(11),
`produto_id` INTEGER(11),
`qtde` FLOAT(6,4),
`venda` FLOAT(10,2),
`total` FLOAT(10,2),
`base_icms` FLOAT(10,2),
`valor_icms` FLOAT(10,2),
`ncms_id` INTEGER(11),
`cfop` VARCHAR(6) COLLATE utf8_general_ci,
`origem` VARCHAR(6) COLLATE utf8_general_ci,
`base_credito` FLOAT(10,2),
`valor_credito` FLOAT(10,2),
`base_st` FLOAT(10,2),
`valor_st` FLOAT(10,2),
`valor_tributo` FLOAT(10,2),
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `nota_fiscal_saidas_itens` --


-- Inicio das estrutura da tabela `notas_fiscais_entradas` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `notas_fiscais_entradas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11),
`numero_nota_fiscal` INTEGER(11),
`serie` VARCHAR(4) COLLATE utf8_general_ci,
`pessoa_id` INTEGER(11),
`cfop_id` INTEGER(11),
`data_emissao` DATE,
`data_entrada` DATE,
`total_produtos` FLOAT(10,2),
`total_nota` FLOAT(10,2),
`base_icms` FLOAT(10,2),
`valor_icms` FLOAT(10,2),
`base_st` FLOAT(10,2),
`valor_st` FLOAT(10,2),
`valor_ipi` FLOAT(10,2),
`valor_frete` FLOAT(10,2),
`valor_seguro` FLOAT(10,2),
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `notas_fiscais_entradas` --


-- Inicio das estrutura da tabela `notas_fiscais_entradas_itens` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `notas_fiscais_entradas_itens` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`notas_fiscais_entrada_id` INTEGER(11),
`produto_id` INTEGER(11),
`qtde` FLOAT(6,4),
`compra` FLOAT(10,2),
`total` FLOAT(10,2),
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `notas_fiscais_entradas_itens` --


-- Inicio das estrutura da tabela `notas_fiscais_saidas` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `notas_fiscais_saidas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11),
`numero_nota_fiscal` INTEGER(11),
`serie` VARCHAR(4) COLLATE utf8_general_ci,
`cfop_id` INTEGER(11),
`pessoa_id` INTEGER(11),
`data_emissao` DATE,
`data_saida` DATE,
`hora_saida` VARCHAR(12) COLLATE utf8_general_ci,
`forma_pagamento_id` INTEGER(11),
`total_produtos` FLOAT(10,2),
`total_nota` FLOAT(10,2),
`base_icms` FLOAT(10,2),
`valor_icms` FLOAT(10,2),
`transportadora_id` INTEGER(11),
`vendedor_id` INTEGER(11),
`cancelada` INTEGER(1) COMMENT '0 - Não | 1 - Sim',
`data_cancelada` DATE,
`numero_pedido` INTEGER(11),
`frete` INTEGER(1) COMMENT '0 - Cif Emitente | 1 - Fob Destinatario',
`qtde_volumes` INTEGER(11),
`especie` VARCHAR(45) COLLATE utf8_general_ci,
`base_st` FLOAT(10,2),
`valor_st` FLOAT(10,2),
`base_credito` FLOAT(10,2),
`valor_credito` FLOAT(10,2),
`percentual_tributo` FLOAT(4,2),
`valor_tributo` FLOAT(10,2),
`operacao` INTEGER(1),
`atendimento` INTEGER(1),
`data_hora` VARCHAR(60) COLLATE utf8_general_ci,
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `notas_fiscais_saidas` --


-- Inicio das estrutura da tabela `notas_fiscais_saidas_itens` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `notas_fiscais_saidas_itens` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`notas_fiscais_saida_id` INTEGER(11),
`produto_id` INTEGER(11),
`qtde` FLOAT(6,4),
`venda` FLOAT(10,2),
`total` FLOAT(10,2),
`base_icms` FLOAT(10,2),
`valor_icms` FLOAT(10,2),
`ncms_id` INTEGER(11),
`cfop` VARCHAR(6) COLLATE utf8_general_ci,
`origem` VARCHAR(6) COLLATE utf8_general_ci,
`base_credito` FLOAT(10,2),
`valor_credito` FLOAT(10,2),
`base_st` FLOAT(10,2),
`valor_st` FLOAT(10,2),
`valor_tributo` FLOAT(10,2),
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `notas_fiscais_saidas_itens` --


-- Inicio das estrutura da tabela `parametros` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `parametros` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(255) COLLATE utf8_general_ci,
`chave` VARCHAR(100) COLLATE utf8_general_ci,
`valor` TEXT COLLATE utf8_general_ci,
`tipo` INTEGER(1) COMMENT '1 - Inteiro | 2 - String | 3 - Texto | 4 - Lista | 5 - Float',
`opcoes` TEXT COLLATE utf8_general_ci,
`grupo` VARCHAR(100) COLLATE utf8_general_ci,
`root` INTEGER(1),
`required` INTEGER(1) NOT NULL DEFAULT 0,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `parametros` --


-- Inicio das estrutura da tabela `pedidos` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `pedidos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11),
`data_pedido` DATETIME,
`status` INTEGER(1) COMMENT '1 - Aberto | 2 - Emitido | 3 - Recebido | 4 - Orcamento | 5 - Nota Fiscal | 6 - Cancelado',
`pessoa_id` INTEGER(11),
`condicao_pagamento_id` INTEGER(11),
`vendedor_id` INTEGER(11),
`transportadora_id` INTEGER(11),
`valor_total` FLOAT(10,2),
`numero_cupom` INTEGER(11),
`nota_fiscal` INTEGER(11),
`serie` VARCHAR(4) COLLATE utf8_general_ci,
`caixas_diario_id` INTEGER(11),
`cpf` VARCHAR(18) COLLATE utf8_general_ci,
`data_fechamento` DATETIME,
`created` DATETIME,
`modified` DATETIME,
`parcelas` TEXT COLLATE utf8_general_ci,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pedidos` --


-- Inicio das estrutura da tabela `pedidos_formas_pagamentos` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `pedidos_formas_pagamentos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pedido_id` INTEGER(11),
`formas_pagamento_id` INTEGER(11),
`valor` FLOAT(10,2),
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pedidos_formas_pagamentos` --


-- Inicio das estrutura da tabela `pedidos_itens` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `pedidos_itens` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pedido_id` INTEGER(11),
`produto_id` INTEGER(11),
`qtde` FLOAT(8,4),
`venda` FLOAT(10,2),
`total` FLOAT(10,2),
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pedidos_itens` --


-- Inicio das estrutura da tabela `pessoas` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `pessoas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(255) COLLATE utf8_general_ci,
`tipo_pessoa` INTEGER(1) COMMENT '1 - Fisica | 2 - Juridica',
`status` INTEGER(1) COMMENT '0 - Ativo | 1 - Inativo | 9 - Excluido',
`consumidor_final` INTEGER(1) COMMENT '0 - Não | 1 - Sim',
`tipo_contribuinte` INTEGER(1) COMMENT '1 - Contribuinte Icms | 2 - Contribuinte Isento | 3 - Não Contribuinte',
`created` DATETIME,
`modified` DATETIME,
`observacoes` TEXT COLLATE utf8_general_ci,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pessoas` --


-- Inicio das estrutura da tabela `pessoas_associacoes` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `pessoas_associacoes` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pessoa_id` INTEGER(11),
`tipo_associacao` INTEGER(1) COMMENT '1 - Empresas | 2 - Clientes | 3 - Fornecedores | 4 - Vendedores | 5 - Representantes | 6 - Operadores | 7 - Usuários',
`status` INTEGER(1) COMMENT '0 - Ativo | 1 - Inativo | 9 - Excluido',
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pessoas_associacoes` --


-- Inicio das estrutura da tabela `pessoas_contatos` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `pessoas_contatos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pessoa_id` INTEGER(11),
`tipos_contato_id` INTEGER(11),
`valor` VARCHAR(45) COLLATE utf8_general_ci,
`status` INTEGER(1) COMMENT '0 - Ativo | 1 - Inativo | 9 - Excluido',
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pessoas_contatos` --


-- Inicio das estrutura da tabela `pessoas_enderecos` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `pessoas_enderecos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pessoa_id` INTEGER(11),
`tipo_endereco` INTEGER(1) COMMENT '1 - Comercial | 2 - Residencial | 3 - Entrega | 4 - Cobranca | 9 - Outros',
`cep` VARCHAR(10) COLLATE utf8_general_ci,
`endereco` VARCHAR(255) COLLATE utf8_general_ci,
`numero` VARCHAR(15) COLLATE utf8_general_ci,
`complemento` VARCHAR(45) COLLATE utf8_general_ci,
`bairro` VARCHAR(45) COLLATE utf8_general_ci,
`cidade` VARCHAR(65) COLLATE utf8_general_ci,
`estado` VARCHAR(2) COLLATE utf8_general_ci,
`principal` INTEGER(1) COMMENT '0 - Não | 1 - Sim',
`status` INTEGER(1) COMMENT '0 - Ativo | 1 - Inativo | 9 - Excluido',
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pessoas_enderecos` --


-- Inicio das estrutura da tabela `pessoas_fisicas` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `pessoas_fisicas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pessoa_id` INTEGER(11),
`cpf` VARCHAR(14) COLLATE utf8_general_ci,
`rg` VARCHAR(14) COLLATE utf8_general_ci,
`data_nascimento` DATE,
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pessoas_fisicas` --


-- Inicio das estrutura da tabela `pessoas_juridicas` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `pessoas_juridicas` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pessoa_id` INTEGER(11),
`cnpj` VARCHAR(18) COLLATE utf8_general_ci,
`inscricao_estadual` VARCHAR(18) COLLATE utf8_general_ci,
`inscricao_municipal` VARCHAR(18) COLLATE utf8_general_ci,
`data_abertura` DATE,
`cnai` VARCHAR(45) COLLATE utf8_general_ci,
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `pessoas_juridicas` --


-- Inicio das estrutura da tabela `produtos` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `produtos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`barra` VARCHAR(14) COLLATE utf8_general_ci,
`codigo_interno` VARCHAR(14) COLLATE utf8_general_ci,
`nome` VARCHAR(255) COLLATE utf8_general_ci,
`unidade` VARCHAR(4) COLLATE utf8_general_ci,
`grupo_id` INTEGER(11),
`produto_kit` INTEGER(1) COMMENT '0 - Não | 1 - Sim',
`foto` VARCHAR(65) COLLATE utf8_general_ci,
`descricao` TEXT COLLATE utf8_general_ci,
`created` DATETIME,
`modified` DATETIME,
`status` INTEGER(1) COMMENT '0 - Inativa | 1 - Ativo | 9 - Excluido',
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `produtos` --


-- Inicio das estrutura da tabela `produtos_kits` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `produtos_kits` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11),
`produto_id` INTEGER(11),
`kit_id` INTEGER(11),
`qtde` FLOAT(8,4),
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `produtos_kits` --


-- Inicio das estrutura da tabela `produtos_valores` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `produtos_valores` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`empresa_id` INTEGER(11),
`produto_id` INTEGER(11),
`ncm_id` INTEGER(11),
`estoque_minimo` FLOAT(8,4),
`estoque_atual` FLOAT(8,4),
`valor_compras` FLOAT(10,2),
`margem` FLOAT(6,4),
`valor_vendas` FLOAT(10,2),
`cst_pis` INTEGER(11),
`cst_cofins` INTEGER(11),
`cst_icms` INTEGER(11),
`cst_origem` INTEGER(11),
`percentual_icms` FLOAT(4,2),
`percentual_pis` FLOAT(4,2),
`percentual_cofins` FLOAT(4,2),
`percentual_ipi` FLOAT(4,2),
`percentual_tributacao` FLOAT(4,2),
`created` DATETIME,
`modified` DATETIME,
`origem` VARCHAR(5) COLLATE utf8_general_ci,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `produtos_valores` --


-- Inicio das estrutura da tabela `terminais` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `terminais` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(500) COLLATE utf8_general_ci,
`ip` VARCHAR(255) COLLATE utf8_general_ci,
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `terminais` --


-- Inicio das estrutura da tabela `tipos_contatos` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `tipos_contatos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(60) COLLATE utf8_general_ci,
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `tipos_contatos` --


-- Inicio das estrutura da tabela `transportadoras` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `transportadoras` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(255) COLLATE utf8_general_ci,
`contado` VARCHAR(65) COLLATE utf8_general_ci,
`telefone1` VARCHAR(45) COLLATE utf8_general_ci,
`telefone2` VARCHAR(45) COLLATE utf8_general_ci,
`cnpj` VARCHAR(18) COLLATE utf8_general_ci,
`created` DATETIME,
`modified` DATETIME,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `transportadoras` --


-- Inicio das estrutura da tabela `usuarios` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `usuarios` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`pessoa_id` INTEGER(11),
`nome` VARCHAR(255) COLLATE utf8_general_ci,
`username` VARCHAR(45) COLLATE utf8_general_ci,
`senha` VARCHAR(255) COLLATE utf8_general_ci,
`created` DATETIME,
`modified` DATETIME,
`root` INTEGER(1),
PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- Fim das estrutura da tabela `usuarios` --


-- Inicio das estrutura da tabela `usuarios_grupos` --
/* !40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `usuarios_grupos` (
`id` INTEGER(11) NOT NULL AUTO_INCREMENT,
`grupo_id` INTEGER(11),
`usuario_id` INTEGER(11),
`created` DATETIME,
`modified` DATETIME,
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

