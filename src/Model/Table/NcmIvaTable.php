<?php
namespace App\Model\Table;

use App\Model\Entity\NcmIva;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NcmIva Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Ncms
 * @property \Cake\ORM\Association\BelongsTo $IcmsEstaduals
 */
class NcmIvaTable extends Table
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

        $this->table('ncm_iva');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ncms', [
            'foreignKey' => 'ncm_id'
        ]);
        $this->belongsTo('IcmsEstaduals', [
            'foreignKey' => 'icms_estadual_id'
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
            ->add('iva', 'valid', ['rule' => 'money'])
            ->allowEmpty('iva');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['ncm_id'], 'Ncms'));
        $rules->add($rules->existsIn(['icms_estadual_id'], 'IcmsEstaduals'));
        return $rules;
    }
}
