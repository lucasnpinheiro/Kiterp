<?php
namespace App\Model\Table;

use App\Model\Entity\Transportadora;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transportadoras Model
 *
 * @property \Cake\ORM\Association\HasMany $NotaFiscalSaidas
 * @property \Cake\ORM\Association\HasMany $Pedidos
 */
class TransportadorasTable extends Table
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

        $this->table('transportadoras');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('NotaFiscalSaidas', [
            'foreignKey' => 'transportadora_id'
        ]);
        $this->hasMany('Pedidos', [
            'foreignKey' => 'transportadora_id'
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
            ->allowEmpty('contado');

        $validator
            ->allowEmpty('telefone1');

        $validator
            ->allowEmpty('telefone2');

        $validator
            ->allowEmpty('cnpj');

        return $validator;
    }
}
