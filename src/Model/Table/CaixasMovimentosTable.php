<?php
namespace App\Model\Table;

use App\Model\Entity\CaixasMovimento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CaixasMovimentos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CaixaDiarios
 */
class CaixasMovimentosTable extends Table
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

        $this->table('caixas_movimentos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CaixaDiarios', [
            'foreignKey' => 'caixa_diario_id'
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
            ->add('data_movimento', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('data_movimento');

        $validator
            ->allowEmpty('numero documento');

        $validator
            ->add('tipo_lancamento', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('tipo_lancamento');

        $validator
            ->add('valor', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('valor');

        $validator
            ->add('modalidade', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('modalidade');

        $validator
            ->allowEmpty('historico');

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
        $rules->add($rules->existsIn(['caixa_diario_id'], 'CaixaDiarios'));
        return $rules;
    }
}
