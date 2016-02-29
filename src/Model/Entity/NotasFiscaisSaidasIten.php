<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NotasFiscaisSaidasIten Entity.
 *
 * @property int $id
 * @property int $notas_fiscais_saida_id
 * @property \App\Model\Entity\NotasFiscaisSaida $notas_fiscais_saida
 * @property int $produto_id
 * @property \App\Model\Entity\Produto $produto
 * @property float $qtde
 * @property float $venda
 * @property float $total
 * @property float $base_icms
 * @property float $valor_icms
 * @property int $ncms_id
 * @property \App\Model\Entity\Ncm $ncm
 * @property string $cfop
 * @property string $origem
 * @property float $base_credito
 * @property float $valor_credito
 * @property float $base_st
 * @property float $valor_st
 * @property float $valor_tributo
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class NotasFiscaisSaidasIten extends Entity
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
