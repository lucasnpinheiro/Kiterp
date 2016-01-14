<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CondicoesPagamento Entity.
 *
 * @property int $id
 * @property string $nome
 * @property int $qtde_parcelas
 * @property int $qtde_dias
 * @property \Cake\I18n\Time $creatde
 * @property \Cake\I18n\Time $modified
 */
class CondicoesPagamento extends Entity {

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
    protected $_virtual = ['parcelas'];

    protected function _getParcelas() {
        if (isset($this->_properties['avista'])) {
            $parcelas = [];
            if ($this->_properties['avista'] == 1) {
                for ($i = 0; $i < (int) $this->_properties['qtde_parcelas']; $i++) {
                    $parcelas[] = ($i * (int) $this->_properties['qtde_dias']);
                }
            } else {
                for ($i = 0; $i < (int) $this->_properties['qtde_parcelas']; $i++) {
                    $parcelas[] = (($i + 1) * (int) $this->_properties['qtde_dias']);
                }
            }
            return $parcelas;
        }
    }

}
