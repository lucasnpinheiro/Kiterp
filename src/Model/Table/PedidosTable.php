<?php

namespace App\Model\Table;

use App\Model\Entity\Pedido;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;
use Cake\Event\Event;
use ArrayObject;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Pedidos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Empresas
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 * @property \Cake\ORM\Association\BelongsTo $CondicoesPagamentos
 * @property \Cake\ORM\Association\BelongsTo $Vendedores
 * @property \Cake\ORM\Association\BelongsTo $Transportadoras
 * @property \Cake\ORM\Association\BelongsToMany $FormasPagamentos
 */
class PedidosTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('pedidos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id',
                //'conditions' => ['PessoasAssociacoes.tipo_associacao' => 2, 'Pessoas.status' => 1],
        ]);
        $this->belongsTo('CondicoesPagamentos', [
            'foreignKey' => 'condicao_pagamento_id'
        ]);
        $this->belongsTo('Vendedores', [
            'className' => 'Pessoas',
            'foreignKey' => 'vendedor_id',
                //'conditions' => ['PessoasAssociacoes.tipo_associacao' => 4, 'Vendedores.status' => 1],
        ]);
        $this->belongsTo('Transportadoras', [
            'foreignKey' => 'transportadora_id'
        ]);
        $this->hasMany('PedidosItens', [
            'foreignKey' => 'pedido_id'
        ]);
        $this->belongsToMany('FormasPagamentos', [
            'foreignKey' => 'pedido_id',
            'targetForeignKey' => 'formas_pagamento_id',
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
                ->add('data_pedido', 'valid', ['rule' => 'datetime'])
                ->allowEmpty('data_pedido');

        $validator
                ->add('status', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('status');

        $validator
                ->add('valor_total', 'valid', ['rule' => 'money'])
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
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        $rules->add($rules->existsIn(['condicao_pagamento_id'], 'CondicoesPagamentos'));
        $rules->add($rules->existsIn(['vendedor_id'], 'Vendedores'));
        $rules->add($rules->existsIn(['transportadora_id'], 'Transportadoras'));
        return $rules;
    }

    public function afterSave(Event $event, Entity $entity) {
        $ProdutosValores = TableRegistry::get('ProdutosValores');
        $Pedidos = TableRegistry::get('Pedidos');
        $PedidosItens = TableRegistry::get('PedidosItens');
        $PedidosFormasPagamentos = TableRegistry::get('PedidosFormasPagamentos');
        $total = 0;
        /*if (isset($entity->Produto) and ! empty($entity->Produto)) {
            foreach ($entity->Produto as $key => $value) {
                $itens = $PedidosItens->newEntity();
                $itens->pedido_id = $entity->id;
                $itens->produto_id = $value['produto_id'];
                $itens->qtde = $value['quantidade'];
                $itens->venda = $value['valor_unitario'];
                $itens->total = ((float) $value['quantidade'] * (float) $value['valor_unitario']);
                $total += (float) $itens->total;
                $PedidosItens->save($itens);
            }
        }*/

        /*if ($entity->status < 3) {
            $Pedidos->updateAll(['valor_total' => $total], ['id' => $entity->id]);
            if ($entity->status == 1) {
                $Pedidos->updateAll(['status' => '2', 'valor_total' => $total], ['id' => $entity->id]);
            }
        } else*/
        if ($entity->status === 3) {
            foreach ($entity->opcao as $key => $value) {
                $formas = $PedidosFormasPagamentos->newEntity();
                $formas->pedido_id = $entity->id;
                $formas->formas_pagamento_id = $key;
                $formas->valor = str_replace(',', '.', str_replace('.', '', $value));
                $PedidosFormasPagamentos->save($formas);
            }
            $find = $PedidosItens->find()->where(['pedido_id' => $entity->id])->all();
            foreach ($find as $key => $value) {
                $prod = $ProdutosValores->find()->where(['produto_id' => $value->produto_id, 'empresa_id' => $entity->empresa_id])->contain('Produtos')->first();
                $prod->estoque_atual = ((float) $prod->estoque_atual - (float) $value->qtde);
                $ProdutosValores->save($prod);
            }
        }

        return true;
    }

}
