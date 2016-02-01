<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PessoasJuridicasFixture
 *
 */
class PessoasJuridicasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'pessoa_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cnpj' => ['type' => 'string', 'length' => 18, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'inscricao_estadual' => ['type' => 'string', 'length' => 18, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'inscricao_municipal' => ['type' => 'string', 'length' => 18, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'data_abertura' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'cnai' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'pessoa_id' => 1,
            'cnpj' => 'Lorem ipsum dolo',
            'inscricao_estadual' => 'Lorem ipsum dolo',
            'inscricao_municipal' => 'Lorem ipsum dolo',
            'data_abertura' => '2016-01-04',
            'cnai' => 'Lorem ipsum dolor sit amet',
            'created' => '2016-01-04 19:52:25',
            'modified' => '2016-01-04 19:52:25'
        ],
    ];
}
