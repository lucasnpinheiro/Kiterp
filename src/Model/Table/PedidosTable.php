<?php

namespace App\Model\Table;

use App\Model\Entity\Pedido;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pedidos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Empresas
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 * @property \Cake\ORM\Association\BelongsTo $CondicaoPagamentos
 * @property \Cake\ORM\Association\BelongsTo $Vendedors
 * @property \Cake\ORM\Association\BelongsTo $Transportadoras
 * @property \Cake\ORM\Association\BelongsToMany $FormasPagamentos
 */
class PedidosTable extends Table
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

        $this->table('pedidos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->belongsTo('CondicaoPagamentos', [
            'foreignKey' => 'condicao_pagamento_id'
        ]);
        $this->belongsTo('Vendedors', [
            'className' => 'Pessoas',
            'foreignKey' => 'pessoa_id'
        ]);
        $this->belongsTo('Transportadoras', [
            'foreignKey' => 'transportadora_id'
        ]);
        $this->belongsToMany('FormasPagamentos', [
            'foreignKey' => 'pedido_id',
            'targetForeignKey' => 'formas_pagamento_id',
            'joinTable' => 'pedidos_formas_pagamentos'
        ]);
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
                ->add('data_pedido', 'valid', ['rule' => 'datetime'])
                ->allowEmpty('data_pedido');

        $validator
                ->add('status', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('status');

        $validator
                ->add('valor_total', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('valor_total');

        $validator
                ->add('numero_cupom', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('numero_cupom');

        $validator
                ->add('nota_fiscal', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('nota_fiscal');

        $validator
                ->allowEmpty('serie');

        $validator
                ->add('numero_caixa', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('numero_caixa');

        $validator
                ->allowEmpty('cpf');

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
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        $rules->add($rules->existsIn(['condicao_pagamento_id'], 'CondicaoPagamentos'));
        $rules->add($rules->existsIn(['vendedor_id'], 'Vendedors'));
        $rules->add($rules->existsIn(['transportadora_id'], 'Transportadoras'));
        return $rules;
    }

}
