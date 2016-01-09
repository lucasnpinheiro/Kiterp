<?php

namespace App\Model\Table;

use App\Model\Entity\Pessoa;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Datasource\EntityInterface;
use ArrayObject;
use Cake\ORM\TableRegistry;

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
            'foreignKey' => 'pessoa_id'
        ]);
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

    public function afterSave(Event $event, EntityInterface $entity, ArrayObject $options) {
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
            $pessoa->data_nascimento = implode('-', array_reverse(explode('/', $pessoa->data_nascimento)));
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
            $pessoa->data_abertura = implode('-', array_reverse(explode('/', $pessoa->data_abertura)));
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
                $pessoa->tipos_contato_id = $pessoa->tipo_contato_id;
                unset($pessoa->tipo_contato_id);
                $PessoasContatos->save($pessoa);
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
        $PessoasAssociacoes->updateAll(['status' => 9], ['pessoa_id' => $entity->id]);
        if (count($entity->PessoasAssociacao)) {
            foreach ($entity->PessoasAssociacao as $key => $value) {
                foreach ($value as $k => $v) {
                    $pessoa = $PessoasAssociacoes->newEntity();
                    $pessoa->tipo_associacao = $v;
                    $pessoa->pessoa_id = $entity->id;
                    $pessoa->status = 1;
                    $find = $PessoasAssociacoes->find('all')->where(['pessoa_id' => $entity->id, 'tipo_associacao' => $v])->first();
                    if (count($find) > 0) {
                        $pessoa->id = $find->id;
                    }
                    $PessoasAssociacoes->save($pessoa);
                }
            }
        }
        if (count($entity->Usuario)) {
            $pessoa = $Usuarios->newEntity();
            foreach ($entity->Usuario as $key => $value) {
                $pessoa->{$key} = $value;
            }
            $pessoa->pessoa_id = $entity->id;
            $Usuarios->save($pessoa);
        }
    }

    public function beforeFind(Event $event, Query $query, ArrayObject $options) {
        $query->join([
            'table' => 'pessoas_associacoes',
            'alias' => 'PessoasAssociacoes',
            'type' => 'INNER',
            'conditions' => ['PessoasAssociacoes.pessoa_id = Pessoas.id', 'PessoasAssociacoes.tipo_associacao !=' => 1, 'PessoasAssociacoes.status !=' => 9],
        ]);
        $query->group('Pessoas.id');
    }

}
