<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NotaFiscalSaida Entity.
 *
 * @property int $id
 * @property int $empresa_id
 * @property \App\Model\Entity\Empresa $empresa
 * @property int $numero_nota_fiscal
 * @property string $serie
 * @property int $cfop_id
 * @property \App\Model\Entity\Cfop $cfop
 * @property int $pessoa_id
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property \Cake\I18n\Time $data_emissao
 * @property \Cake\I18n\Time $data_saida
 * @property string $hora_saida
 * @property int $forma_pagamento_id
 * @property \App\Model\Entity\FormaPagamento $forma_pagamento
 * @property float $total_produtos
 * @property float $total_nota
 * @property float $base_icms
 * @property float $valor_icms
 * @property int $transportadora_id
 * @property \App\Model\Entity\Transportadora $transportadora
 * @property int $vendedor_id
 * @property \App\Model\Entity\Vendedor $vendedor
 * @property int $cancelada
 * @property \Cake\I18n\Time $data_cancelada
 * @property int $numero_pedido
 * @property int $frete
 * @property int $qtde_volumes
 * @property string $especie
 * @property float $base_st
 * @property float $valor_st
 * @property float $base_credito
 * @property float $valor_credito
 * @property float $percentual_tributo
 * @property float $valor_tributo
 * @property int $operacao
 * @property int $atendimento
 * @property string $data_hora
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class NotaFiscalSaida extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
