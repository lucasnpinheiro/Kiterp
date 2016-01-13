<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;


/**
 * CaixasDiarios Model
 *
 */
class CaixasDiariosTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('caixas_diarios');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Operadores', [
            'foreignKey' => 'operador',
            'className' => 'Pessoas'
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
        $validator->provider('extra', new \App\Model\Validation\ExtraValidator());
        $validator
                ->add('id', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('id', 'create');

        $validator
                ->add('numero_caixa', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('numero_caixa');

        $validator
                ->allowEmpty('operador');

        $validator
                ->add('data_abertura', 'valid', ['rule' => 'datetime'])
                ->allowEmpty('data_abertura');

        $validator
                ->add('data_encerramento', 'valid', ['rule' => 'datetime'])
                ->allowEmpty('data_encerramento');

        $validator
                ->add('valor_inicial', 'valid', ['provider' => 'extra', 'rule' => 'moeda'])
                ->allowEmpty('valor_inicial');

        $validator
                ->add('total_entradas', 'valid', ['provider' => 'extra', 'rule' => 'moeda'])
                ->allowEmpty('total_entradas');

        $validator
                ->add('total_saidas', 'valid', ['provider' => 'extra', 'rule' => 'moeda'])
                ->allowEmpty('total_saidas');

        $validator
                ->add('total_saldo', 'valid', ['provider' => 'extra', 'rule' => 'moeda'])
                ->allowEmpty('total_saldo');

        $validator
                ->add('encerrado', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('encerrado');

        $validator
                ->add('total_real', 'valid', ['provider' => 'extra', 'rule' => 'moeda'])
                ->allowEmpty('total_real');

        $validator
                ->add('total_sobras', 'valid', ['provider' => 'extra', 'rule' => 'moeda'])
                ->allowEmpty('total_sobras');

        $validator
                ->add('total_faltas', 'valid', ['provider' => 'extra', 'rule' => 'moeda'])
                ->allowEmpty('total_faltas');

        return $validator;
    }

}
