<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CaixasMovimentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CaixasMovimentosTable Test Case
 */
class CaixasMovimentosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CaixasMovimentosTable
     */
    public $CaixasMovimentos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.caixas_movimentos',
        'app.caixa_diarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CaixasMovimentos') ? [] : ['className' => 'App\Model\Table\CaixasMovimentosTable'];
        $this->CaixasMovimentos = TableRegistry::get('CaixasMovimentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CaixasMovimentos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test searchConfiguration method
     *
     * @return void
     */
    public function testSearchConfiguration()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test afterSave method
     *
     * @return void
     */
    public function testAfterSave()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
