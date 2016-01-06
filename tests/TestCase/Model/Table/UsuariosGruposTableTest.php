<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsuariosGruposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsuariosGruposTable Test Case
 */
class UsuariosGruposTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.usuarios_grupos',
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
        'app.menus',
        'app.menus_grupos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsuariosGrupos') ? [] : ['className' => 'App\Model\Table\UsuariosGruposTable'];
        $this->UsuariosGrupos = TableRegistry::get('UsuariosGrupos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsuariosGrupos);

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
