<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CaixasDiario Entity.
 *
 * @property int $id
 * @property int $numero_caixa
 * @property string $operador
 * @property \Cake\I18n\Time $data_abertura
 * @property \Cake\I18n\Time $data_encerramento
 * @property float $valor_inicial
 * @property float $total_entradas
 * @property float $total_saidas
 * @property float $total_saldo
 * @property int $encerrado
 * @property float $total_real
 * @property float $total_sobras
 * @property float $total_faltas
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class CaixasDiario extends Entity
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
