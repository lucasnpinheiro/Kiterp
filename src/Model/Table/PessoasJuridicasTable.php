<?php
namespace App\Model\Table;

use App\Model\Entity\PessoasJuridica;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PessoasJuridicas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 */
class PessoasJuridicasTable extends Table
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

        $this->table('pessoas_juridicas');
        $this->displayField('id');
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
            ->allowEmpty('cnpj');

        $validator
            ->allowEmpty('inscricao_estadual');

        $validator
            ->allowEmpty('inscricao_municipal');

        $validator
            ->add('data_abertura', 'valid', ['rule' => 'date'])
            ->allowEmpty('data_abertura');

        $validator
            ->allowEmpty('cnai');

        return $validator;
    }

}
