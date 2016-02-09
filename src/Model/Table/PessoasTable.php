<?php

namespace App\Model\Table;

use App\Model\Entity\Pessoa;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\ORM\Entity;
use ArrayObject;
use Cake\ORM\TableRegistry;
use Search\Manager;

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
class PessoasTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('pessoas');
        $this->displayField('nome');
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
        $this->hasMany('PessoasEnderecos', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('PessoasContatos', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('PessoasFisicas', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('PessoasJuridicas', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('PessoasAssociacoes', [
            'foreignKey' => 'pessoa_id',
            'dependent' => false,
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
        $search->callback('associacao', [
            'callback' => function ($query, $args, $manager) {
                return $query->join([
                            'table' => 'pessoas_associacoes',
                            'alias' => 'PessoasAssociacoesPesquisa',
                            'type' => 'INNER',
                            'conditions' => ['PessoasAssociacoesPesquisa.pessoa_id = Pessoas.id', 'PessoasAssociacoesPesquisa.tipo_associacao' => $args['associacao'], 'PessoasAssociacoesPesquisa.status !=' => 9],
                ]);
            }
                ]);
                return $search;
            }

            /**
             * Default validation rules.
             *
             * @param \Cake\Validation\Validator $validator Validator instance.
             * @return \Cake\Validation\Validator
             */
            public function validationDefault(Validator $validator) {
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

            public function afterSave(Event $event, Entity $entity, ArrayObject $options) {
                $PessoasAssociacoes = TableRegistry::get('PessoasAssociacoes');
                $PessoasFisicas = TableRegistry::get('PessoasFisicas');
                $PessoasJuridicas = TableRegistry::get('PessoasJuridicas');
                $PessoasContatos = TableRegistry::get('PessoasContatos');
                $PessoasEnderecos = TableRegistry::get('PessoasEnderecos');
                $Usuarios = TableRegistry::get('Usuarios');

                if ($entity->tipo_pessoa === 1) {
                    $pessoa = $PessoasFisicas->newEntity();
                    foreach ($entity->PessoasFisica as $key => $value) {
                        $pessoa->{$key} = $value;
                    }
                    $pessoa->pessoa_id = $entity->id;
                    $pessoa->cpf = str_replace(['.', '-'], '', $pessoa->cpf);
                    if ($pessoa->data_nascimento != '') {
                        $pessoa->data_nascimento = implode('-', array_reverse(explode('/', $pessoa->data_nascimento)));
                    }
                    if ($pessoa->id < 1) {
                        unset($pessoa->id);
                    }
                    $PessoasFisicas->save($pessoa);
                } else if ($entity->tipo_pessoa === 2) {
                    $pessoa = $PessoasJuridicas->newEntity();
                    foreach ($entity->PessoasJuridica as $key => $value) {
                        $pessoa->{$key} = $value;
                    }
                    $pessoa->pessoa_id = $entity->id;
                    $pessoa->cnpj = str_replace(['.', '-', '/'], '', $pessoa->cnpj);
                    if ($pessoa->data_abertura != '') {
                        $pessoa->data_abertura = implode('-', array_reverse(explode('/', $pessoa->data_abertura)));
                    }
                    $PessoasJuridicas->save($pessoa);
                }

                $PessoasContatos->updateAll(['status' => 9], ['pessoa_id' => $entity->id]);

                if (count($entity->PessoasContato)) {
                    foreach ($entity->PessoasContato as $key => $value) {
                        $pessoa = $PessoasContatos->newEntity();
                        foreach ($value as $k => $v) {
                            $pessoa->{$k} = $v;
                        }
                        $pessoa->pessoa_id = $entity->id;
                        $pessoa->status = 1;
                        if ($pessoa->valor != '' AND $pessoa->tipos_contato_id != '') {
                            $PessoasContatos->save($pessoa);
                        }
                    }
                }

                $PessoasEnderecos->updateAll(['status' => 9], ['pessoa_id' => $entity->id]);

                if (count($entity->PessoasEndereco)) {
                    foreach ($entity->PessoasEndereco as $key => $value) {
                        $pessoa = $PessoasEnderecos->newEntity();
                        foreach ($value as $k => $v) {
                            $pessoa->{$k} = $v;
                        }
                        $pessoa->pessoa_id = $entity->id;
                        $pessoa->status = 1;
                        $PessoasEnderecos->save($pessoa);
                    }
                }

                if (count($entity->PessoasAssociacao['tipo_associacao']) > 0) {
                    foreach ($entity->PessoasAssociacao as $key => $value) {
                        foreach ($value as $k => $v) {
                            $pessoa = $PessoasAssociacoes->newEntity();
                            $pessoa->tipo_associacao = $v;
                            $pessoa->pessoa_id = $entity->id;
                            $pessoa->status = 1;
                            /* $findAssociacao = $PessoasAssociacoes->find()->where(['PessoasAssociacoes.pessoa_id' => $entity->id, 'PessoasAssociacoes.tipo_associacao' => $v])->first();
                              if (count($findAssociacao) > 0) {
                              $pessoa->id = $findAssociacao->id;
                              } */
                            $PessoasAssociacoes->save($pessoa);
                        }
                    }
                    if (count($entity->Usuario) > 0) {
                        $findAssociacao = $PessoasAssociacoes->find()->where(['PessoasAssociacoes.pessoa_id' => $entity->id, 'PessoasAssociacoes.tipo_associacao' => 7])->first();
                        if (count($findAssociacao) > 0) {
                            if (trim($entity->Usuario['username']) != '') {
                                $pessoa = $Usuarios->newEntity();
                                foreach ($entity->Usuario as $key => $value) {
                                    $pessoa->{$key} = $value;
                                }
                                $pessoa->pessoa_id = $entity->id;
                                $pessoa->nome = $entity->nome;
                                $find = $Usuarios->find('all')->where(['Usuarios.pessoa_id' => $entity->id])->first();
                                if (count($find) > 0) {
                                    $pessoa->id = $find->id;
                                }
                                $Usuarios->save($pessoa);
                            }
                        }
                    }
                }
            }

            public function beforeFind(Event $event, Query $query, ArrayObject $options) {
                if (stripos($query->sql(), 'PessoasAssociacoes.tipo_associacao') !== FALSE) {
                    $query->join([
                        'table' => 'pessoas_associacoes',
                        'alias' => 'PessoasAssociacoes',
                        'type' => 'INNER',
                        'conditions' => ['PessoasAssociacoes.pessoa_id = ' . $this->alias() . '.id', 'PessoasAssociacoes.status !=' => 9],
                    ]);
                } else {
                    $query->join([
                        'table' => 'pessoas_associacoes',
                        'alias' => 'PessoasAssociacoes',
                        'type' => 'INNER',
                        'conditions' => ['PessoasAssociacoes.status !=' => 9],
                    ]);
                }
                $query->group($this->alias() . '.id');
            }

        }
        