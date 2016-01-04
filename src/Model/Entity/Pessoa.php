<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pessoa Entity.
 *
 * @property int $id
 * @property string $nome
 * @property int $tipo_pessoa
 * @property int $status
 * @property int $consumidor_final
 * @property int $tipo_contribuinte
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\ContasPagar[] $contas_pagar
 * @property \App\Model\Entity\ContasReceber[] $contas_receber
 * @property \App\Model\Entity\Empresa[] $empresas
 * @property \App\Model\Entity\NotaFiscalEntrada[] $nota_fiscal_entradas
 * @property \App\Model\Entity\NotaFiscalSaida[] $nota_fiscal_saidas
 * @property \App\Model\Entity\Pedido[] $pedidos
 * @property \App\Model\Entity\Usuario[] $usuarios
 */
class Pessoa extends Entity
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
