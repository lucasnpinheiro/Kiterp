<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PessoasJuridica Entity.
 *
 * @property int $id
 * @property int $pessoa_id
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property string $cnpj
 * @property string $inscricao_estadual
 * @property string $inscricao_municipal
 * @property \Cake\I18n\Time $data_abertura
 * @property string $cnai
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class PessoasJuridica extends Entity
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
