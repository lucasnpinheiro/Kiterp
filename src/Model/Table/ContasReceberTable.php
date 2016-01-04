<?php
namespace App\Model\Table;

use App\Model\Entity\ContasReceber;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContasReceber Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Empresas
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 * @property \Cake\ORM\Association\BelongsTo $Bancos
 * @property \Cake\ORM\Association\BelongsTo $Tradutoras
 */
class ContasReceberTable extends Table
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

        $this->table('contas_receber');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->belongsTo('Bancos', [
            'foreignKey' => 'banco_id'
        ]);
        $this->belongsTo('Tradutoras', [
            'className' => 'Contas',
            'foreignKey' => 'tradutora_id',
            'conditions' => ['Contas.tipo' => 1]
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
            ->allowEmpty('numero_documento');

        $validator
            ->add('data_vencimento', 'valid', ['rule' => 'date'])
            ->allowEmpty('data_vencimento');

        $validator
            ->add('valor_documento', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('valor_documento');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

        $validator
            ->add('data_recebimento', 'valid', ['rule' => 'date'])
            ->allowEmpty('data_recebimento');

        $validator
            ->add('valor recebimento', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('valor recebimento');

        $validator
            ->add('numero_pedido', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('numero_pedido');

        $validator
            ->add('nota_fiscal', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('nota_fiscal');

        $validator
            ->allowEmpty('serie');

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
        $rules->add($rules->existsIn(['banco_id'], 'Bancos'));
        $rules->add($rules->existsIn(['tradutora_id'], 'Tradutoras'));
        return $rules;
    }
}
