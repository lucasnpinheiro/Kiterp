<?php
namespace App\Model\Table;

use App\Model\Entity\Grupo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Grupos Model
 *
 * @property \Cake\ORM\Association\HasMany $Produtos
 * @property \Cake\ORM\Association\BelongsToMany $Menus
 * @property \Cake\ORM\Association\BelongsToMany $Usuarios
 */
class GruposTable extends Table
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

        $this->table('grupos');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Produtos', [
            'foreignKey' => 'grupo_id'
        ]);
        $this->belongsToMany('Menus', [
            'foreignKey' => 'grupo_id',
            'targetForeignKey' => 'menu_id',
            'joinTable' => 'menus_grupos'
        ]);
        $this->belongsToMany('Usuarios', [
            'foreignKey' => 'grupo_id',
            'targetForeignKey' => 'usuario_id',
            'joinTable' => 'usuarios_grupos'
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
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

        return $validator;
    }
}
