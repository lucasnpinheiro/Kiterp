<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Banco Entity.
 *
 * @property int $id
 * @property int $codigo_banco
 * @property string $nome
 * @property string $agencia
 * @property string $conta_corrente
 * @property int $sequencial_arquivo
 * @property string $caminho_arquivo
 * @property string $sacador_avalista
 * @property string $cnpj_sacador
 * @property string $contrato
 * @property string $carteira
 * @property string $convenio
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\ContasPagar[] $contas_pagar
 * @property \App\Model\Entity\ContasReceber[] $contas_receber
 */
class Banco extends Entity
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
