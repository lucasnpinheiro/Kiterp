<?php
namespace App\Model\Table;

use App\Model\Entity\Menu;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Menus Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Grupos
 */
class MenusTable extends Table
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

        $this->table('menus');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Grupos', [
            'foreignKey' => 'menu_id',
            'targetForeignKey' => 'grupo_id',
            'joinTable' => 'menus_grupos'
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
            ->requirePresence('titulo', 'create')
            ->notEmpty('titulo');

        $validator
            ->allowEmpty('plugin');

        $validator
            ->requirePresence('controller', 'create')
            ->notEmpty('controller');

        $validator
            ->requirePresence('action', 'create')
            ->notEmpty('action');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->add('root', 'valid', ['rule' => 'numeric'])
            ->requirePresence('root', 'create')
            ->notEmpty('root');

        $validator
            ->add('item_menu', 'valid', ['rule' => 'numeric'])
            ->requirePresence('item_menu', 'create')
            ->notEmpty('item_menu');

        $validator
            ->allowEmpty('grupos');

        $validator
            ->add('modifield', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('modifield');

        return $validator;
    }
}
