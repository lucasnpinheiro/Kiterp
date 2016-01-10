<?php
namespace App\Model\Table;

use App\Model\Entity\PessoasAssociaco;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PessoasAssociacoes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 */
class PessoasAssociacoesTable extends Table
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

        $this->table('pessoas_associacoes');
        $this->displayField('tipo_associacao');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id'
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
            ->add('tipo_associacao', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('tipo_associacao');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

        return $validator;
    }

}
