<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pedido Entity.
 *
 * @property int $id
 * @property int $empresa_id
 * @property \App\Model\Entity\Empresa $empresa
 * @property \Cake\I18n\Time $data_pedido
 * @property int $status
 * @property int $pessoa_id
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property int $condicao_pagamento_id
 * @property \App\Model\Entity\CondicaoPagamento $condicao_pagamento
 * @property int $vendedor_id
 * @property \App\Model\Entity\Vendedor $vendedor
 * @property int $transportadora_id
 * @property \App\Model\Entity\Transportadora $transportadora
 * @property float $valor_total
 * @property int $numero_cupom
 * @property int $nota_fiscal
 * @property string $serie
 * @property int $numero_caixa
 * @property string $cpf
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\FormasPagamento[] $formas_pagamentos
 */
class Pedido extends Entity
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
    ];
}
