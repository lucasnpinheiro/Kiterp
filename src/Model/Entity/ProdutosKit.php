<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProdutosKit Entity.
 *
 * @property int $id
 * @property int $empresa_id
 * @property \App\Model\Entity\Empresa $empresa
 * @property int $produto_id
 * @property \App\Model\Entity\Produto $produto
 * @property int $kit_id
 * @property \App\Model\Entity\Kit $kit
 * @property float $qtde
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class ProdutosKit extends Entity
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
