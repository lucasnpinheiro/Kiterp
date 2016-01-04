<?php
namespace App\Model\Table;

use App\Model\Entity\Conta;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contas Model
 *
 */
class ContasTable extends Table
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

        $this->table('contas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

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
            ->allowEmpty('codigo');

        $validator
            ->allowEmpty('nome');

        $validator
            ->add('tipo', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('tipo');

        $validator
            ->add('id_pai', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id_pai');

        $validator
            ->add('tradutora', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('tradutora');

        return $validator;
    }
}
