<?php

namespace App\Model\Table;

use App\Model\Entity\Conta;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;

/**
 * Contas Model
 *
 */
class ContasTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('contas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('Search.Search');
        $this->belongsTo('SubContas', [
            'foreignKey' => 'id_pai',
            'className' => 'Contas'
        ]);
    }

    public function searchConfiguration() {
        return $this->searchConfigurationDynamic();
    }

    private function searchConfigurationDynamic() {
        $search = new Manager($this);
        $c = $this->schema()->columns();
        foreach ($c as $key => $value) {
            $t = $this->schema()->columnType($value);
            if ($t != 'string' AND $t != 'text') {
                $search->value($value, ['field' => $this->aliasField($value)]);
            } else {
                $search->like($value, ['before' => true, 'after' => true, 'field' => $this->aliasField($value)]);
            }
        }

        return $search;
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->add('id', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('id', 'create');

        $validator
                ->add('codigo', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('codigo');

        $validator
                ->allowEmpty('nome');

        $validator
                ->add('tipo', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('tipo');

        $validator
                ->add('id_pai', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('id_pai');

        $validator
                ->add('tradutora', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('tradutora');

        return $validator;
    }

    public function beforeSave(\Cake\Event\Event $event, \Cake\ORM\Entity $entity) {
        $Contas = \Cake\ORM\TableRegistry::get('Contas');
        $entity->tradutora = $entity->codigo;
        if ($entity->id_pai > 0) {
            $find = $Contas->get($entity->id_pai);
            $entity->tradutora = $find->codigo . $entity->codigo;
        }
        return true;
    }

}
