<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InventariosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InventariosTable Test Case
 */
class InventariosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InventariosTable
     */
    public $Inventarios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inventarios',
        'app.produtos',
        'app.grupos_estoques',
        'app.nota_fiscal_entradas_itens',
        'app.nota_fiscal_entradas',
        'app.empresas',
        'app.pessoas',
        'app.contas_pagar',
        'app.bancos',
        'app.contas_receber',
        'app.formas_pagamentos',
        'app.pedidos',
        'app.condicoes_pagamentos',
        'app.vendedores',
        'app.nota_fiscal_saidas',
        'app.cfops',
        'app.forma_pagamentos',
        'app.transportadoras',
        'app.vendedors',
        'app.usuarios',
        'app.pessoas_enderecos',
        'app.pessoas_contatos',
        'app.tipos_contatos',
        'app.pessoas_fisicas',
        'app.pessoas_juridicas',
        'app.pessoas_associacoes',
        'app.pedidos_itens',
        'app.pedidos_formas_pagamentos',
        'app.tradutoras',
        'app.produtos_kits',
        'app.kits',
        'app.nota_fiscal_saidas_itens',
        'app.ncms',
        'app.produtos_valores',
        'app.cst_pis',
        'app.cst_cofins',
        'app.cst_icms',
        'app.cst_origem'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Inventarios') ? [] : ['className' => 'App\Model\Table\InventariosTable'];
        $this->Inventarios = TableRegistry::get('Inventarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Inventarios);

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
