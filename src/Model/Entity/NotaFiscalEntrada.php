<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NotaFiscalEntrada Entity.
 *
 * @property int $id
 * @property int $empresa_id
 * @property \App\Model\Entity\Empresa $empresa
 * @property int $numero_nota_fiscal
 * @property string $serie
 * @property int $pessoa_id
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property int $cfop_id
 * @property \App\Model\Entity\Cfop $cfop
 * @property \Cake\I18n\Time $data_emissao
 * @property \Cake\I18n\Time $data_entrada
 * @property float $total_produtos
 * @property float $total_nota
 * @property float $base_icms
 * @property float $valor_icms
 * @property float $base_st
 * @property float $valor_st
 * @property float $valor_ipi
 * @property float $valor_frete
 * @property float $valor_seguro
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class NotaFiscalEntrada extends Entity
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
