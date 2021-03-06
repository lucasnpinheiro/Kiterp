<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NotaFiscalEntradaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NotaFiscalEntradaTable Test Case
 */
class NotaFiscalEntradaTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nota_fiscal_entrada',
        'app.empresas',
        'app.pessoas',
        'app.contas_pagar',
        'app.bancos',
        'app.contas_receber',
        'app.tradutoras',
        'app.nota_fiscal_saida',
        'app.pedidos',
        'app.produtos_kits',
        'app.cfops'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('NotaFiscalEntrada') ? [] : ['className' => 'App\Model\Table\NotaFiscalEntradaTable'];
        $this->NotaFiscalEntrada = TableRegistry::get('NotaFiscalEntrada', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NotaFiscalEntrada);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
