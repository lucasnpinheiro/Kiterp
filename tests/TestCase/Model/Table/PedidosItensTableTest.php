<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PedidosItensTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PedidosItensTable Test Case
 */
class PedidosItensTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pedidos_itens',
        'app.pedidos',
        'app.empresas',
        'app.pessoas',
        'app.contas_pagar',
        'app.bancos',
        'app.contas_receber',
        'app.tradutoras',
        'app.nota_fiscal_entrada',
        'app.cfops',
        'app.nota_fiscal_saida',
        'app.produtos_kits',
        'app.condicao_pagamentos',
        'app.vendedors',
        'app.transportadoras',
        'app.formas_pagamentos',
        'app.pedidos_formas_pagamentos',
        'app.forma_pagamentos',
        'app.produtos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PedidosItens') ? [] : ['className' => 'App\Model\Table\PedidosItensTable'];
        $this->PedidosItens = TableRegistry::get('PedidosItens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PedidosItens);

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
