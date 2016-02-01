<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transportadora Entity.
 *
 * @property int $id
 * @property string $nome
 * @property string $contado
 * @property string $telefone1
 * @property string $telefone2
 * @property string $cnpj
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\NotaFiscalSaida[] $nota_fiscal_saidas
 * @property \App\Model\Entity\Pedido[] $pedidos
 */
class Transportadora extends Entity
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
