<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Parametro Entity.
 *
 * @property int $id
 * @property string $nome
 * @property string $chave
 * @property string $valor
 * @property int $tipo
 * @property string $opcoes
 * @property string $grupo
 */
class Parametro extends Entity
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
