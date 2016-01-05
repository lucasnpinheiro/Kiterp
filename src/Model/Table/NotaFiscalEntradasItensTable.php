<?php
namespace App\Model\Table;

use App\Model\Entity\NotaFiscalEntradasIten;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NotaFiscalEntradasItens Model
 *
 * @property \Cake\ORM\Association\BelongsTo $NotaFiscalEntradas
 * @property \Cake\ORM\Association\BelongsTo $Produtos
 */
class NotaFiscalEntradasItensTable extends Table
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

        $this->table('nota_fiscal_entradas_itens');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('NotaFiscalEntradas', [
            'foreignKey' => 'nota_fiscal_entrada_id'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('qtde', 'valid', ['rule' => 'money'])
            ->allowEmpty('qtde');

        $validator
            ->add('compra', 'valid', ['rule' => 'money'])
            ->allowEmpty('compra');

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
        $rules->add($rules->existsIn(['nota_fiscal_entrada_id'], 'NotaFiscalEntradas'));
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'));
        return $rules;
    }
}
