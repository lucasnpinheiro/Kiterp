<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PessoasEnderecosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PessoasEnderecosTable Test Case
 */
class PessoasEnderecosTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pessoas_enderecos',
        'app.pessoas',
        'app.contas_pagar',
        'app.empresas',
        'app.contas_receber',
        'app.bancos',
        'app.tradutoras',
        'app.nota_fiscal_entrada',
        'app.cfops',
        'app.nota_fiscal_saida',
        'app.pedidos',
        'app.condicao_pagamentos',
        'app.vendedors',
        'app.nota_fiscal_entradas',
        'app.nota_fiscal_saidas',
        'app.forma_pagamentos',
        'app.transportadoras',
        'app.usuarios',
        'app.formas_pagamentos',
        'app.pedidos_formas_pagamentos',
        'app.produtos_kits',
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
        $config = TableRegistry::exists('PessoasEnderecos') ? [] : ['className' => 'App\Model\Table\PessoasEnderecosTable'];
        $this->PessoasEnderecos = TableRegistry::get('PessoasEnderecos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PessoasEnderecos);

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
