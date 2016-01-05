<?php
namespace App\Model\Table;

use App\Model\Entity\CaixasDiario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CaixasDiarios Model
 *
 */
class CaixasDiariosTable extends Table
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

        $this->table('caixas_diarios');
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
            ->add('numero_caixa', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('numero_caixa');

        $validator
            ->allowEmpty('operador');

        $validator
            ->add('data_abertura', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('data_abertura');

        $validator
            ->add('data_encerramento', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('data_encerramento');

        $validator
            ->add('valor_inicial', 'valid', ['rule' => 'money'])
            ->allowEmpty('valor_inicial');

        $validator
            ->add('total_entradas', 'valid', ['rule' => 'money'])
            ->allowEmpty('total_entradas');

        $validator
            ->add('total_saidas', 'valid', ['rule' => 'money'])
            ->allowEmpty('total_saidas');

        $validator
            ->add('total_saldo', 'valid', ['rule' => 'money'])
            ->allowEmpty('total_saldo');

        $validator
            ->add('encerrado', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('encerrado');

        $validator
            ->add('total_real', 'valid', ['rule' => 'money'])
            ->allowEmpty('total_real');

        $validator
            ->add('total_sobras', 'valid', ['rule' => 'money'])
            ->allowEmpty('total_sobras');

        $validator
            ->add('total_faltas', 'valid', ['rule' => 'money'])
            ->allowEmpty('total_faltas');

        return $validator;
    }
}
