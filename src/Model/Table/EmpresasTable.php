<?php
namespace App\Model\Table;

use App\Model\Entity\Empresa;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Empresas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 * @property \Cake\ORM\Association\HasMany $ContasPagar
 * @property \Cake\ORM\Association\HasMany $ContasReceber
 * @property \Cake\ORM\Association\HasMany $NotaFiscalEntradas
 * @property \Cake\ORM\Association\HasMany $NotaFiscalSaidas
 * @property \Cake\ORM\Association\HasMany $Pedidos
 * @property \Cake\ORM\Association\HasMany $ProdutosKits
 */
class EmpresasTable extends Table
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

        $this->table('empresas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('ContasPagar', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('ContasReceber', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('NotaFiscalEntradas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('NotaFiscalSaidas', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('Pedidos', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('ProdutosKits', [
            'foreignKey' => 'empresa_id'
        ]);
        $this->hasMany('ProdutosValores', [
            'foreignKey' => 'empresa_id'
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
            ->add('codigo_cidade', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('codigo_cidade');

        $validator
            ->add('regime_tributario', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('regime_tributario');

        $validator
            ->allowEmpty('versao_sefaz');

        $validator
            ->add('perentual_tributo', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('perentual_tributo');

        $validator
            ->allowEmpty('hora_tzd');

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
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        return $rules;
    }
}
