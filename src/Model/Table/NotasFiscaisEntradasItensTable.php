<?php
namespace App\Model\Table;

use App\Model\Entity\NotasFiscaisEntradasIten;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NotasFiscaisEntradasItens Model
 *
 * @property \Cake\ORM\Association\BelongsTo $NotasFiscaisEntradas
 * @property \Cake\ORM\Association\BelongsTo $Produtos
 */
class NotasFiscaisEntradasItensTable extends Table
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

        $this->table('notas_fiscais_entradas_itens');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('NotasFiscaisEntradas', [
            'foreignKey' => 'notas_fiscais_entrada_id'
        ]);
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
            ->numeric('qtde')
            ->allowEmpty('qtde');

        $validator
            ->numeric('compra')
            ->allowEmpty('compra');

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
        $rules->add($rules->existsIn(['notas_fiscais_entrada_id'], 'NotasFiscaisEntradas'));
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'));
        return $rules;
    }
}
