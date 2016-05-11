<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake \Validation\Validator;
use Cake\Event\Event;
use Cake\Database\Query;
use ArrayObject;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Search\Manager;

/**
 * Usuarios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 */
class UsuariosTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('usuarios');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id'
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
        $validator
                ->add('id', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('id', 'create');

        $validator
                ->allowEmpty('nome');

        $validator
                ->allowEmpty('username');

        $validator
                ->allowEmpty('senha');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        return $rules;
    }

    public function beforeSave(Event $event, Entity $entity) {
        if (!empty($entity->senha)) {
            $senha = (new \Cake\Auth\DefaultPasswordHasher())->hash($entity->senha);
            $entity->senha = $senha;
        } else {
            unset($entity->senha);
        }
        return true;
    }

    public function afterSave(Event $event, Entity $entity, ArrayObject $options) {
        $UsuariosGrupos = TableRegistry::get('UsuariosGrupos');

        if (isset($entity->grupo_id) AND empty($entity->grupo_id)) {
            $UsuariosGrupos->deleteAll(['usuario_id' => (int) $entity->id]);
        }
        if (isset($entity->grupo_id) AND ! empty($entity->grupo_id)) {
            foreach ($entity->grupo_id as $key => $value) {
                $usuario = $UsuariosGrupos->newEntity();
                $usuario->usuario_id = (int) $entity->id;
                $usuario->grupo_id = (int) $value;
                $UsuariosGrupos->save($usuario);
            }
        }
    }

    public function beforeFind(Event $event, Query $query, ArrayObject $options) {
        $query->join([
            'table' => 'pessoas_associacoes',
            'alias' => 'PessoasAssociacoes',
            'type' => 'INNER',
            'conditions' => ['PessoasAssociacoes.pessoa_id = ' . $this->aliasField('pessoa_id'), 'PessoasAssociacoes.tipo_associacao' => 7, 'PessoasAssociacoes.status !=' => 9],
        ]);
        $query->group($this->aliasField('pessoa_id'));
    }

}
