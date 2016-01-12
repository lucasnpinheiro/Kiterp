<?php

namespace App\Model\Table;

use App\Model\Entity\CondicoesPagamento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CondicoesPagamentos Model
 *
 */
class CondicoesPagamentosTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('condicoes_pagamentos');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
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
                ->allowEmpty('nome');

        $validator
                ->add('qtde_parcelas', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('qtde_parcelas');

        $validator
                ->add('qtde_dias', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('qtde_dias');

        return $validator;
    }

}
