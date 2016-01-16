<?php

namespace App\Model\Table;

use App\Model\Entity\Produto;
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
 * Produtos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Grupos
 * @property \Cake\ORM\Association\HasMany $NotaFiscalEntradasItens
 * @property \Cake\ORM\Association\HasMany $NotaFiscalSaidasItens
 * @property \Cake\ORM\Association\HasMany $PedidosItens
 */
class ProdutosTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('produtos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('GruposEstoques', [
            'foreignKey' => 'grupo_id'
        ]);
        $this->hasMany('NotaFiscalEntradasItens', [
            'foreignKey' => 'produto_id'
        ]);
        $this->hasMany('NotaFiscalSaidasItens', [
            'foreignKey' => 'produto_id'
        ]);
        $this->hasMany('PedidosItens', [
            'foreignKey' => 'produto_id'
        ]);
        $this->hasMany('ProdutosValores', [
            'foreignKey' => 'produto_id'
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
                ->allowEmpty('barra');

        $validator
                ->allowEmpty('nome');

        $validator
                ->allowEmpty('unidade');

        $validator
                ->add('produto_kit', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('produto_kit');

        $validator
                ->allowEmpty('foto');

        $validator
                ->allowEmpty('descricao');

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
        $rules->add($rules->existsIn(['grupo_id'], 'GruposEstoques'));
        return $rules;
    }

    public function beforeSave(Event $event, Entity $entity) {
        $entity->unidade = strtoupper($entity->unidade);
    }

    public function afterSave(Event $event, Entity $entity) {
        $ProdutosValores = TableRegistry::get('ProdutosValores');
        $Produtos = TableRegistry::get('Produtos');
        foreach ($entity->ProdutosValor as $key => $value) {
            $valores = $ProdutosValores->newEntity();
            foreach ($value as $k => $v) {
                $valores->{$k} = $v;
            }
            $valores->produto_id = $entity->id;
            if ($entity->produto_kit == 1) {
                unset($valores->estoque_minimo, $valores->estoque_atual, $valores->valor_compras, $valores->margem, $valores->valor_vendas);
            } else {
                $valores->estoque_minimo = str_replace(',', '.', str_replace('.', '', $valores->estoque_minimo));
                $valores->estoque_atual = str_replace(',', '.', str_replace('.', '', $valores->estoque_atual));
                $valores->valor_compras = str_replace(',', '.', str_replace('.', '', $valores->valor_compras));
                $valores->margem = 0;
                $valores->valor_vendas = str_replace(',', '.', str_replace('.', '', $valores->valor_vendas));
            }
            $valores->percentual_icms = str_replace(',', '.', str_replace('.', '', $valores->percentual_icms));
            $valores->percentual_pis = str_replace(',', '.', str_replace('.', '', $valores->percentual_pis));
            $valores->percentual_cofins = str_replace(',', '.', str_replace('.', '', $valores->percentual_cofins));
            $valores->percentual_ipi = str_replace(',', '.', str_replace('.', '', $valores->percentual_ipi));
            $valores->percentual_tributacao = str_replace(',', '.', str_replace('.', '', $valores->percentual_tributacao));

            $ProdutosValores->save($valores);
        }
        if (trim($entity->barra) == '') {
            $Produtos->updateAll(['barra' => $entity->id], ['id' => $entity->id]);
        }
        if (trim($entity->codigo_interno) == '') {
            $Produtos->updateAll(['codigo_interno' => $entity->id], ['id' => $entity->id]);
        }
        return true;
    }

}
