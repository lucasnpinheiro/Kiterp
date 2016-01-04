<?php
namespace App\Model\Table;

use App\Model\Entity\FormasPagamento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FormasPagamentos Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Pedidos
 */
class FormasPagamentosTable extends Table
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

        $this->table('formas_pagamentos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Pedidos', [
            'foreignKey' => 'formas_pagamento_id',
            'targetForeignKey' => 'pedido_id',
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
            ->allowEmpty('nome');

        $validator
            ->allowEmpty('abreviado');

        $validator
            ->add('qtde_dias', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('qtde_dias');

        $validator
            ->add('qtde_taxas', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('qtde_taxas');

        $validator
            ->allowEmpty('valor_taxas');

        return $validator;
    }
}
