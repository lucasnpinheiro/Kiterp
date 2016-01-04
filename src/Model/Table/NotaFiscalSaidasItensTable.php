<?php
namespace App\Model\Table;

use App\Model\Entity\NotaFiscalSaidasIten;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NotaFiscalSaidasItens Model
 *
 * @property \Cake\ORM\Association\BelongsTo $NotaFiscalSaidas
 * @property \Cake\ORM\Association\BelongsTo $Produtos
 * @property \Cake\ORM\Association\BelongsTo $Ncms
 */
class NotaFiscalSaidasItensTable extends Table
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

        $this->table('nota_fiscal_saidas_itens');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('NotaFiscalSaidas', [
            'foreignKey' => 'nota_fiscal_saida_id'
        ]);
        $this->belongsTo('Produtos', [
            'foreignKey' => 'produto_id'
        ]);
        $this->belongsTo('Ncms', [
            'foreignKey' => 'ncms_id'
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
            ->add('qtde', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('qtde');

        $validator
            ->add('venda', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('venda');

        $validator
            ->add('total', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('total');

        $validator
            ->add('base_icms', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('base_icms');

        $validator
            ->add('valor_icms', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('valor_icms');

        $validator
            ->allowEmpty('cfop');

        $validator
            ->allowEmpty('origem');

        $validator
            ->add('base_credito', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('base_credito');

        $validator
            ->add('valor_credito', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('valor_credito');

        $validator
            ->add('base_st', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('base_st');

        $validator
            ->add('valor_st', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('valor_st');

        $validator
            ->add('valor_tributo', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('valor_tributo');

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
        $rules->add($rules->existsIn(['nota_fiscal_saida_id'], 'NotaFiscalSaidas'));
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'));
        $rules->add($rules->existsIn(['ncms_id'], 'Ncms'));
        return $rules;
    }
}
