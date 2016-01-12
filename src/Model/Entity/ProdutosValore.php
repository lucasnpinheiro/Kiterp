<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProdutosValore Entity.
 *
 * @property int $id
 * @property int $empresa_id
 * @property int $produto_id
 * @property int $ncm_id
 * @property \App\Model\Entity\Ncm $ncm
 * @property float $estoque_minimo
 * @property float $estoque_atual
 * @property float $valor_compras
 * @property float $margem
 * @property float $valor_vendas
 * @property int $cst_pis
 * @property int $cst_cofins
 * @property int $cst_icms
 * @property int $cst_origem
 * @property float $percentual_icms
 * @property float $percentual_pis
 * @property float $percentual_cofins
 * @property float $percentual_ipi
 * @property float $percentuall_tributacao
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class ProdutosValore extends Entity {

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
    protected $_virtual = ['valor_vendas_formatado'];

    protected function _getValorVendasFormatado() {
        return number_format($this->_properties['valor_vendas'], 2, ',', '.');
    }

}
