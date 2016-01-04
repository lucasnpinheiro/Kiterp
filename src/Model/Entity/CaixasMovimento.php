<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CaixasMovimento Entity.
 *
 * @property int $id
 * @property int $caixa_diario_id
 * @property \App\Model\Entity\CaixaDiario $caixa_diario
 * @property \Cake\I18n\Time $data_movimento
 * @property string $numero documento
 * @property int $tipo_lancamento
 * @property float $valor
 * @property int $modalidade
 * @property string $historico
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class CaixasMovimento extends Entity
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
