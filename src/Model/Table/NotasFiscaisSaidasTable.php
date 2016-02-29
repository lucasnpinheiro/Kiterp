<?php

namespace App\Model\Table;

use App\Model\Entity\NotasFiscaisSaida;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NotasFiscaisSaidas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Empresas
 * @property \Cake\ORM\Association\BelongsTo $Cfops
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 * @property \Cake\ORM\Association\BelongsTo $FormaPagamentos
 * @property \Cake\ORM\Association\BelongsTo $Transportadoras
 * @property \Cake\ORM\Association\BelongsTo $Vendedors
 * @property \Cake\ORM\Association\HasMany $NotasFiscaisSaidasItens
 */
class NotasFiscaisSaidasTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('notas_fiscais_saidas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        /* $this->belongsTo('Cfops', [
          'foreignKey' => 'cfop_id'
          ]); */
        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id'
        ]);
        /* $this->belongsTo('FormaPagamentos', [
          'foreignKey' => 'forma_pagamento_id'
          ]); */
        $this->belongsTo('Transportadoras', [
            'foreignKey' => 'transportadora_id'
        ]);
        $this->belongsTo('Vendedors', [
            'foreignKey' => 'vendedor_id',
            'className' => 'Pessoas'
        ]);
        $this->hasMany('NotasFiscaisSaidasItens', [
            'foreignKey' => 'notas_fiscais_saida_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->integer('numero_nota_fiscal')
                ->allowEmpty('numero_nota_fiscal');

        $validator
                ->allowEmpty('serie');

        $validator
                ->date('data_emissao')
                ->allowEmpty('data_emissao');

        $validator
                ->date('data_saida')
                ->allowEmpty('data_saida');

        $validator
                ->allowEmpty('hora_saida');

        $validator
                ->numeric('total_produtos')
                ->allowEmpty('total_produtos');

        $validator
                ->numeric('total_nota')
                ->allowEmpty('total_nota');

        $validator
                ->numeric('base_icms')
                ->allowEmpty('base_icms');

        $validator
                ->numeric('valor_icms')
                ->allowEmpty('valor_icms');

        $validator
                ->integer('cancelada')
                ->allowEmpty('cancelada');

        $validator
                ->date('data_cancelada')
                ->allowEmpty('data_cancelada');

        $validator
                ->integer('numero_pedido')
                ->allowEmpty('numero_pedido');

        $validator
                ->integer('frete')
                ->allowEmpty('frete');

        $validator
                ->integer('qtde_volumes')
                ->allowEmpty('qtde_volumes');

        $validator
                ->allowEmpty('especie');

        $validator
                ->numeric('base_st')
                ->allowEmpty('base_st');

        $validator
                ->numeric('valor_st')
                ->allowEmpty('valor_st');

        $validator
                ->numeric('base_credito')
                ->allowEmpty('base_credito');

        $validator
                ->numeric('valor_credito')
                ->allowEmpty('valor_credito');

        $validator
                ->numeric('percentual_tributo')
                ->allowEmpty('percentual_tributo');

        $validator
                ->numeric('valor_tributo')
                ->allowEmpty('valor_tributo');

        $validator
                ->integer('operacao')
                ->allowEmpty('operacao');

        $validator
                ->integer('atendimento')
                ->allowEmpty('atendimento');

        $validator
                ->allowEmpty('data_hora');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['cfop_id'], 'Cfops'));
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        $rules->add($rules->existsIn(['forma_pagamento_id'], 'FormaPagamentos'));
        $rules->add($rules->existsIn(['transportadora_id'], 'Transportadoras'));
        $rules->add($rules->existsIn(['vendedor_id'], 'Vendedors'));
        return $rules;
    }

}
