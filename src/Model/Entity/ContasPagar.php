<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContasPagar Entity.
 *
 * @property int $id
 * @property int $empresa_id
 * @property \App\Model\Entity\Empresa $empresa
 * @property string $numero_documento
 * @property \Cake\I18n\Time $data_vencimento
 * @property float $valor_documento
 * @property int $pessoa_id
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property int $banco_id
 * @property \App\Model\Entity\Banco $banco
 * @property int $tradutora_id
 * @property \App\Model\Entity\Tradutora $tradutora
 * @property int $status
 * @property \Cake\I18n\Time $data_pagamento
 * @property float $valor_pagamento
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class ContasPagar extends Entity
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
