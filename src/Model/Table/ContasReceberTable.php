<?php

namespace App\Model\Table;

use App\Model\Entity\ContasReceber;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;

/**
 * ContasReceber Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Empresas
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 * @property \Cake\ORM\Association\BelongsTo $Bancos
 * @property \Cake\ORM\Association\BelongsTo $Tradutoras
 */
class ContasReceberTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('contas_receber');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->belongsTo('Bancos', [
            'foreignKey' => 'banco_id'
        ]);
        $this->belongsTo('Tradutoras', [
            'className' => 'Contas',
            'foreignKey' => 'tradutora_id',
            'conditions' => ['Contas.tipo' => 1]
        ]);
        $this->addBehavior('Search.Search');
    }

    public function searchConfiguration() {
        return $this->searchConfigurationDynamic();
    }

    private function searchConfigurationDynamic() {
        $search = new Manager($this);
        $c = $this->schema()->columns();
        foreach ($c as $key => $value) {
            $t = $this->schema()->columnType($value);
            if ($t != 'string' AND $t != 'text' AND $t != 'date' AND $t != 'datetime') {
                $search->value($value, ['field' => $this->aliasField($value)]);
            } else {
                $search->like($value, ['before' => true, 'after' => true, 'field' => $this->aliasField($value)]);
            }
        }
        return $search;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        //$rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        //$rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        //$rules->add($rules->existsIn(['banco_id'], 'Bancos'));
        //$rules->add($rules->existsIn(['tradutora_id'], 'Tradutoras'));
        return $rules;
    }

}
