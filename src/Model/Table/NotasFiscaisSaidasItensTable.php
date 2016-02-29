<?php
namespace App\Model\Table;

use App\Model\Entity\NotasFiscaisSaidasIten;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NotasFiscaisSaidasItens Model
 *
 * @property \Cake\ORM\Association\BelongsTo $NotasFiscaisSaidas
 * @property \Cake\ORM\Association\BelongsTo $Produtos
 * @property \Cake\ORM\Association\BelongsTo $Ncms
 */
class NotasFiscaisSaidasItensTable extends Table
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

        $this->table('notas_fiscais_saidas_itens');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('NotasFiscaisSaidas', [
            'foreignKey' => 'notas_fiscais_saida_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->numeric('qtde')
            ->allowEmpty('qtde');

        $validator
            ->numeric('venda')
            ->allowEmpty('venda');

        $validator
            ->numeric('total')
            ->allowEmpty('total');

        $validator
            ->numeric('base_icms')
            ->allowEmpty('base_icms');

        $validator
            ->numeric('valor_icms')
            ->allowEmpty('valor_icms');

        $validator
            ->allowEmpty('cfop');

        $validator
            ->allowEmpty('origem');

        $validator
            ->numeric('base_credito')
            ->allowEmpty('base_credito');

        $validator
            ->numeric('valor_credito')
            ->allowEmpty('valor_credito');

        $validator
            ->numeric('base_st')
            ->allowEmpty('base_st');

        $validator
            ->numeric('valor_st')
            ->allowEmpty('valor_st');

        $validator
            ->numeric('valor_tributo')
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
        $rules->add($rules->existsIn(['notas_fiscais_saida_id'], 'NotasFiscaisSaidas'));
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'));
        $rules->add($rules->existsIn(['ncms_id'], 'Ncms'));
        return $rules;
    }
}
