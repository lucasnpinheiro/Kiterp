<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MenusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MenusTable Test Case
 */
class MenusTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.menus',
        'app.grupos',
        'app.produtos',
        'app.nota_fiscal_entradas_itens',
        'app.nota_fiscal_entradas',
        'app.empresas',
        'app.pessoas',
        'app.contas_pagar',
        'app.bancos',
        'app.contas_receber',
        'app.tradutoras',
        'app.nota_fiscal_saidas',
        'app.cfops',
        'app.forma_pagamentos',
        'app.transportadoras',
        'app.pedidos',
        'app.condicao_pagamentos',
        'app.vendedores',
        'app.usuarios',
        'app.formas_pagamentos',
        'app.pedidos_formas_pagamentos',
        'app.vendedors',
        'app.produtos_kits',
        'app.kits',
        'app.nota_fiscal_saidas_itens',
        'app.ncms',
        'app.pedidos_itens',
        'app.produtos_valores',
        'app.cst_pis',
        'app.cst_cofins',
        'app.cst_icms',
        'app.cst_origem',
        'app.menus_grupos',
        'app.usuarios_grupos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Menus') ? [] : ['className' => 'App\Model\Table\MenusTable'];
        $this->Menus = TableRegistry::get('Menus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Menus);

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
