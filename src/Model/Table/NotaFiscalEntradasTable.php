<?php

namespace App\Model\Table;

use App\Model\Entity\NotaFiscalEntradas;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NotaFiscalEntradas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Empresas
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 * @property \Cake\ORM\Association\BelongsTo $Cfops
 */
class NotaFiscalEntradasTable extends Table
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

        $this->table('nota_fiscal_entradas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->belongsTo('Cfops', [
            'foreignKey' => 'cfop_id',
            'className' => 'Impostos',
            'conditions' => ['Impostos.tipo_imposto' => 7]
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
                ->add('numero_nota_fiscal', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('numero_nota_fiscal');

        $validator
                ->allowEmpty('serie');

        $validator
                ->add('data_emissao', 'valid', ['rule' => 'date'])
                ->allowEmpty('data_emissao');

        $validator
                ->add('data_entrada', 'valid', ['rule' => 'date'])
                ->allowEmpty('data_entrada');

        $validator
                ->add('total_produtos', 'valid', ['rule' => 'money'])
                ->allowEmpty('total_produtos');

        $validator
                ->add('total_nota', 'valid', ['rule' => 'money'])
                ->allowEmpty('total_nota');

        $validator
                ->add('base_icms', 'valid', ['rule' => 'money'])
                ->allowEmpty('base_icms');

        $validator
                ->add('valor_icms', 'valid', ['rule' => 'money'])
                ->allowEmpty('valor_icms');

        $validator
                ->add('base_st', 'valid', ['rule' => 'money'])
                ->allowEmpty('base_st');

        $validator
                ->add('valor_st', 'valid', ['rule' => 'money'])
                ->allowEmpty('valor_st');

        $validator
                ->add('valor_ipi', 'valid', ['rule' => 'money'])
                ->allowEmpty('valor_ipi');

        $validator
                ->add('valor_frete', 'valid', ['rule' => 'money'])
                ->allowEmpty('valor_frete');

        $validator
                ->add('valor_seguro', 'valid', ['rule' => 'money'])
                ->allowEmpty('valor_seguro');

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
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        $rules->add($rules->existsIn(['cfop_id'], 'Cfops'));
        return $rules;
    }

}
