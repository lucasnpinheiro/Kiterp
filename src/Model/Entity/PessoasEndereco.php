<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PessoasEndereco Entity.
 *
 * @property int $id
 * @property int $pessoa_id
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property int $tipo_endereco
 * @property string $cep
 * @property string $endereco
 * @property string $numero
 * @property string $complemento
 * @property string $bairro
 * @property string $cidade
 * @property string $estado
 * @property int $principal
 * @property int $status
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class PessoasEndereco extends Entity
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
