<?php

namespace App\Model\Table;

use App\Model\Entity\NotaFiscalSaidas;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;


/**
 * NotaFiscalSaidas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Empresas
 * @property \Cake\ORM\Association\BelongsTo $Cfops
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 * @property \Cake\ORM\Association\BelongsTo $FormaPagamentos
 * @property \Cake\ORM\Association\BelongsTo $Transportadoras
 * @property \Cake\ORM\Association\BelongsTo $Vendedors
 */
class NotaFiscalSaidasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('nota_fiscal_saidas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('Cfops', [
            'foreignKey' => 'cfop_id',
            'className' => 'Impostos',
            'conditions' => ['Impostos.tipo_imposto' => 7]
        ]);
        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->belongsTo('FormaPagamentos', [
            'foreignKey' => 'forma_pagamento_id'
        ]);
        $this->belongsTo('Transportadoras', [
            'foreignKey' => 'transportadora_id'
        ]);
        $this->belongsTo('Vendedors', [
            'foreignKey' => 'vendedor_id',
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
    public function validationDefault(Validator $validator)
    {
        $validator
                ->add('id', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('id', 'create');

        $validator
                ->add('numero_nota_fiscal', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('numero_nota_fiscal');

        $validator
                ->allowEmpty('serie');

        $validator
                ->add('data_emissao', 'valid', ['rule' => 'date'])
                ->allowEmpty('data_emissao');

        $validator
                ->add('data_saida', 'valid', ['rule' => 'date'])
                ->allowEmpty('data_saida');

        $validator
                ->allowEmpty('hora_saida');

        $validator
                ->add('total_produtos', 'valid', ['rule' => 'money'])
                ->allowEmpty('total_produtos');

        $validator
                ->add('total_nota', 'valid', ['rule' => 'money'])
                ->allowEmpty('total_nota');

        $validator
                ->add('base_icms', 'valid', ['rule' => 'money'])
                ->allowEmpty('base_icms');

        $validator
                ->add('valor_icms', 'valid', ['rule' => 'money'])
                ->allowEmpty('valor_icms');

        $validator
                ->add('cancelada', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('cancelada');

        $validator
                ->add('data_cancelada', 'valid', ['rule' => 'date'])
                ->allowEmpty('data_cancelada');

        $validator
                ->add('numero_pedido', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('numero_pedido');

        $validator
                ->add('frete', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('frete');

        $validator
                ->add('qtde_volumes', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('qtde_volumes');

        $validator
                ->allowEmpty('especie');

        $validator
                ->add('base_st', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('base_st');

        $validator
                ->add('valor_st', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('valor_st');

        $validator
                ->add('base_credito', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('base_credito');

        $validator
                ->add('valor_credito', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('valor_credito');

        $validator
                ->add('percentual_tributo', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('percentual_tributo');

        $validator
                ->add('valor_tributo', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('valor_tributo');

        $validator
                ->add('operacao', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('operacao');

        $validator
                ->add('atendimento', 'valid', ['rule' => 'numeric'])
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
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['cfop_id'], 'Cfops'));
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        $rules->add($rules->existsIn(['forma_pagamento_id'], 'FormaPagamentos'));
        $rules->add($rules->existsIn(['transportadora_id'], 'Transportadoras'));
        $rules->add($rules->existsIn(['vendedor_id'], 'Vendedors'));
        return $rules;
    }

}
