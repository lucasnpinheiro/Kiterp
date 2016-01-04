<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NotaFiscalEntradasIten Entity.
 *
 * @property int $id
 * @property int $nota_fiscal_entrada_id
 * @property \App\Model\Entity\NotaFiscalEntrada $nota_fiscal_entrada
 * @property int $produto_id
 * @property \App\Model\Entity\Produto $produto
 * @property float $qtde
 * @property float $compra
 * @property float $total
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class NotaFiscalEntradasIten extends Entity
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
