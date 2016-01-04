<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PessoasAssociaco Entity.
 *
 * @property int $id
 * @property int $pessoa_id
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property int $tipo_associacao
 * @property int $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class PessoasAssociaco extends Entity
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
