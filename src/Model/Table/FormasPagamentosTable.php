<?php

namespace App\Model\Table;

use App\Model\Entity\FormasPagamento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;
use Cake\Event\Event;
use Cake\ORM\Entity;

/**
 * FormasPagamentos Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Pedidos
 */
class FormasPagamentosTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
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

    public function beforeSave(Event $event, Entity $entity) {
        $entity->valor_taxas = null;
        if (isset($entity->valor) AND count($entity->valor) > 0) {
            $taxas = [];
            foreach ($entity->valor as $key => $value) {
                $taxas[] = str_replace(',', '.', str_replace('.', '', $value['taxa']));
            }
            $entity->valor_taxas = json_encode($taxas);
        }
        return true;
    }

}
