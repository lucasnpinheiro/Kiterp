<?php
namespace App\Model\Table;

use App\Model\Entity\Produto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;


/**
 * Produtos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Grupos
 * @property \Cake\ORM\Association\HasMany $NotaFiscalEntradasItens
 * @property \Cake\ORM\Association\HasMany $NotaFiscalSaidasItens
 * @property \Cake\ORM\Association\HasMany $PedidosItens
 */
class ProdutosTable extends Table
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

        $this->table('produtos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Grupos', [
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
    public function validationDefault(Validator $validator)
    {
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
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['grupo_id'], 'Grupos'));
        return $rules;
    }
}
