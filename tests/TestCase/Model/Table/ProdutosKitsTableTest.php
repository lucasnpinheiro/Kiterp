<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProdutosKitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProdutosKitsTable Test Case
 */
class ProdutosKitsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.produtos_kits',
        'app.empresas',
        'app.pessoas',
        'app.contas_pagar',
        'app.bancos',
        'app.contas_receber',
        'app.tradutoras',
        'app.nota_fiscal_entradas',
        'app.cfops',
        'app.nota_fiscal_saidas',
        'app.forma_pagamentos',
        'app.transportadoras',
        'app.vendedors',
        'app.pedidos',
        'app.condicao_pagamentos',
        'app.formas_pagamentos',
        'app.pedidos_formas_pagamentos',
        'app.usuarios',
        'app.nota_fiscal_entrada',
        'app.nota_fiscal_saida',
        'app.produtos',
        'app.grupos',
        'app.nota_fiscal_entradas_itens',
        'app.nota_fiscal_saidas_itens',
        'app.ncms',
        'app.pedidos_itens',
        'app.kits'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProdutosKits') ? [] : ['className' => 'App\Model\Table\ProdutosKitsTable'];
        $this->ProdutosKits = TableRegistry::get('ProdutosKits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProdutosKits);

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
