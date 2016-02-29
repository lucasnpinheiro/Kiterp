<?php
namespace App\Model\Table;

use App\Model\Entity\NotasFiscaisEntrada;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NotasFiscaisEntradas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Empresas
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 * @property \Cake\ORM\Association\BelongsTo $Cfops
 * @property \Cake\ORM\Association\HasMany $NotasFiscaisEntradasItens
 */
class NotasFiscaisEntradasTable extends Table
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

        $this->table('notas_fiscais_entradas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id'
        ]);
        /*$this->belongsTo('Cfops', [
            'foreignKey' => 'cfop_id'
        ]);*/
        $this->hasMany('NotasFiscaisEntradasItens', [
            'foreignKey' => 'notas_fiscais_entrada_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('numero_nota_fiscal')
            ->allowEmpty('numero_nota_fiscal');

        $validator
            ->allowEmpty('serie');

        $validator
            ->date('data_emissao')
            ->allowEmpty('data_emissao');

        $validator
            ->date('data_entrada')
            ->allowEmpty('data_entrada');

        $validator
            ->numeric('total_produtos')
            ->allowEmpty('total_produtos');

        $validator
            ->numeric('total_nota')
            ->allowEmpty('total_nota');

        $validator
            ->numeric('base_icms')
            ->allowEmpty('base_icms');

        $validator
            ->numeric('valor_icms')
            ->allowEmpty('valor_icms');

        $validator
            ->numeric('base_st')
            ->allowEmpty('base_st');

        $validator
            ->numeric('valor_st')
            ->allowEmpty('valor_st');

        $validator
            ->numeric('valor_ipi')
            ->allowEmpty('valor_ipi');

        $validator
            ->numeric('valor_frete')
            ->allowEmpty('valor_frete');

        $validator
            ->numeric('valor_seguro')
            ->allowEmpty('valor_seguro');

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
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        $rules->add($rules->existsIn(['cfop_id'], 'Cfops'));
        return $rules;
    }
}
