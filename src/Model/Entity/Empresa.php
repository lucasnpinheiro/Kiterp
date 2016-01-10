<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Empresa Entity.
 *
 * @property int $id
 * @property int $pessoa_id
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property int $codigo_cidade
 * @property int $regime_tributario
 * @property string $versao_sefaz
 * @property float $perentual_tributo
 * @property string $hora_tzd
 * @property \App\Model\Entity\ContasPagar[] $contas_pagar
 * @property \App\Model\Entity\ContasReceber[] $contas_receber
 * @property \App\Model\Entity\NotaFiscalEntrada[] $nota_fiscal_entrada
 * @property \App\Model\Entity\NotaFiscalSaida[] $nota_fiscal_saida
 * @property \App\Model\Entity\Pedido[] $pedidos
 * @property \App\Model\Entity\ProdutosKit[] $produtos_kits
 */
class Empresa extends Entity
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
