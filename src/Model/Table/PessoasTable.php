<?php
namespace App\Model\Table;

use App\Model\Entity\Pessoa;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pessoas Model
 *
 * @property \Cake\ORM\Association\HasMany $ContasPagar
 * @property \Cake\ORM\Association\HasMany $ContasReceber
 * @property \Cake\ORM\Association\HasMany $Empresas
 * @property \Cake\ORM\Association\HasMany $NotaFiscalEntradas
 * @property \Cake\ORM\Association\HasMany $NotaFiscalSaidas
 * @property \Cake\ORM\Association\HasMany $Pedidos
 * @property \Cake\ORM\Association\HasMany $Usuarios
 */
class PessoasTable extends Table
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

        $this->table('pessoas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ContasPagar', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('ContasReceber', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('Empresas', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('NotaFiscalEntradas', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('NotaFiscalSaidas', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('Pedidos', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('Usuarios', [
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
            ->allowEmpty('nome');

        $validator
            ->add('tipo_pessoa', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('tipo_pessoa');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

        $validator
            ->add('consumidor_final', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('consumidor_final');

        $validator
            ->add('tipo_contribuinte', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('tipo_contribuinte');

        return $validator;
    }
}
