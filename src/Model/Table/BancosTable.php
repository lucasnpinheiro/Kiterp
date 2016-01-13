<?php

namespace App\Model\Table;

use App\Model\Entity\Banco;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Entity;
use Cake\Event\Event;
use Search\Manager;

/**
 * Bancos Model
 *
 * @property \Cake\ORM\Association\HasMany $ContasPagar
 * @property \Cake\ORM\Association\HasMany $ContasReceber
 */
class BancosTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('bancos');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ContasPagar', [
            'foreignKey' => 'banco_id'
        ]);
        $this->hasMany('ContasReceber', [
            'foreignKey' => 'banco_id'
        ]);
        $this->addBehavior('Search.Search');
    }

    public function searchConfiguration() {
        return $this->searchConfigurationDynamic();
    }

    private function searchConfigurationDynamic() {
        $search = new Manager($this);
        $c = $this->schema()->columns();
        foreach ($c as $key => $value) {
            $t = $this->schema()->columnType($value);
            if ($t != 'string' AND $t != 'text') {
                $search->value($value, ['field' => $this->aliasField($value)]);
            } else {
                $search->like($value, ['before' => true, 'after' => true, 'field' => $this->aliasField($value)]);
            }
        }

        return $search;
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator->provider('extra', new \App\Model\Validation\ExtraValidator());
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
                ->add('cnpj_sacador', 'valid', ['provider' => 'extra', 'rule' => 'moeda', 'message' => __('CNPJ Informado esta invalido')])
                ->allowEmpty('cnpj_sacador');

        $validator
                ->allowEmpty('contrato');

        $validator
                ->allowEmpty('carteira');

        $validator
                ->allowEmpty('convenio');

        return $validator;
    }

    public function beforeSave(Event $event, Entity $entity) {
        $entity->cnpj_sacador = str_replace(['.', '-', '/'], '', $entity->cnpj_sacador);
    }

}
