<?php
namespace App\Model\Table;

use App\Model\Entity\Inventario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inventarios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Produtos
 */
class InventariosTable extends Table
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

        $this->table('inventarios');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Produtos', [
            'foreignKey' => 'produto_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('nome');

        $validator
            ->allowEmpty('unidade');

        $validator
            ->allowEmpty('grupo');

        $validator
            ->numeric('estoque')
            ->allowEmpty('estoque');

        $validator
            ->numeric('compra')
            ->allowEmpty('compra');

        $validator
            ->numeric('valor')
            ->allowEmpty('valor');

        $validator
            ->numeric('total')
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
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'));
        return $rules;
    }
}
