<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TerminaisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TerminaisTable Test Case
 */
class TerminaisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TerminaisTable
     */
    public $Terminais;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.terminais'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Terminais') ? [] : ['className' => 'App\Model\Table\TerminaisTable'];
        $this->Terminais = TableRegistry::get('Terminais', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Terminais);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
