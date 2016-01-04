<?php
namespace App\Model\Table;

use App\Model\Entity\Banco;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bancos Model
 *
 * @property \Cake\ORM\Association\HasMany $ContasPagar
 * @property \Cake\ORM\Association\HasMany $ContasReceber
 */
class BancosTable extends Table
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

        $this->table('bancos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ContasPagar', [
            'foreignKey' => 'banco_id'
        ]);
        $this->hasMany('ContasReceber', [
            'foreignKey' => 'banco_id'
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
            ->add('codigo_banco', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('codigo_banco');

        $validator
            ->allowEmpty('nome');

        $validator
            ->allowEmpty('agencia');

        $validator
            ->allowEmpty('conta_corrente');

        $validator
            ->add('sequencial_arquivo', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('sequencial_arquivo');

        $validator
            ->allowEmpty('caminho_arquivo');

        $validator
            ->allowEmpty('sacador_avalista');

        $validator
            ->allowEmpty('cnpj_sacador');

        $validator
            ->allowEmpty('contrato');

        $validator
            ->allowEmpty('carteira');

        $validator
            ->allowEmpty('convenio');

        return $validator;
    }
}
