<?php

namespace App\Model\Table;

use App\Model\Entity\ProdutosValore;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProdutosValores Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Empresas
 * @property \Cake\ORM\Association\BelongsTo $Produtos
 * @property \Cake\ORM\Association\BelongsTo $Ncms
 */
class ProdutosValoresTable extends Table
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

        $this->table('produtos_valores');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('Produtos', [
            'foreignKey' => 'produto_id'
        ]);
        $this->belongsTo('Ncms', [
            'foreignKey' => 'ncm_id'
        ]);
        $this->belongsTo('CstPis', [
            'className' => 'Impostos',
            'foreignKey' => 'cst_pis',
            'conditions' => ['Impostos.tipo_imposto' => 4]
        ]);
        $this->belongsTo('CstCofins', [
            'className' => 'Impostos',
            'foreignKey' => 'cst_cofins',
            'conditions' => ['Impostos.tipo_imposto' => 5]
        ]);
        $this->belongsTo('CstIcms', [
            'className' => 'Impostos',
            'foreignKey' => 'cst_icms',
            'conditions' => ['Impostos.tipo_imposto' => array(1, 2)]
        ]);
        $this->belongsTo('CstOrigem', [
            'className' => 'Impostos',
            'foreignKey' => 'cst_origem',
            'conditions' => ['Impostos.tipo_imposto' => 6]
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
                ->add('estoque_minimo', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('estoque_minimo');

        $validator
                ->add('estoque_atual', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('estoque_atual');

        $validator
                ->add('valor_compras', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('valor_compras');

        $validator
                ->add('margem', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('margem');

        $validator
                ->add('valor_vendas', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('valor_vendas');

        $validator
                ->add('cst_pis', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('cst_pis');

        $validator
                ->add('cst_cofins', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('cst_cofins');

        $validator
                ->add('cst_icms', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('cst_icms');

        $validator
                ->add('cst_origem', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('cst_origem');

        $validator
                ->add('percentual_icms', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('percentual_icms');

        $validator
                ->add('percentual_pis', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('percentual_pis');

        $validator
                ->add('percentual_cofins', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('percentual_cofins');

        $validator
                ->add('percentual_ipi', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('percentual_ipi');

        $validator
                ->add('percentuall_tributacao', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('percentuall_tributacao');

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
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'));
        $rules->add($rules->existsIn(['ncm_id'], 'Ncms'));
        return $rules;
    }

}
