<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inventario Entity.
 *
 * @property int $id
 * @property int $produto_id
 * @property \App\Model\Entity\Produto $produto
 * @property string $nome
 * @property string $unidade
 * @property string $grupo
 * @property float $estoque
 * @property float $compra
 * @property float $valor
 * @property float $total
 */
class Inventario extends Entity
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
