<?php
namespace App\Model\Table;

use App\Model\Entity\PedidosIten;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;


/**
 * PedidosItens Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pedidos
 * @property \Cake\ORM\Association\BelongsTo $Produtos
 */
class PedidosItensTable extends Table
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

        $this->table('pedidos_itens');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pedidos', [
            'foreignKey' => 'pedido_id'
        ]);
        $this->belongsTo('Produtos', [
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
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('qtde', 'valid', ['rule' => 'money'])
            ->allowEmpty('qtde');

        $validator
            ->add('venda', 'valid', ['rule' => 'money'])
            ->allowEmpty('venda');

        $validator
            ->add('total', 'valid', ['rule' => 'money'])
            ->allowEmpty('total');

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
        $rules->add($rules->existsIn(['pedido_id'], 'Pedidos'));
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'));
        return $rules;
    }
}
