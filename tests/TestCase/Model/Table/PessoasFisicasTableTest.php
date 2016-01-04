<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PessoasFisicasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PessoasFisicasTable Test Case
 */
class PessoasFisicasTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pessoas_fisicas',
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
        'app.transportadoras',
        'app.formas_pagamentos',
        'app.pedidos_formas_pagamentos',
        'app.forma_pagamentos',
        'app.produtos_kits',
        'app.nota_fiscal_entradas',
        'app.nota_fiscal_saidas',
        'app.usuarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PessoasFisicas') ? [] : ['className' => 'App\Model\Table\PessoasFisicasTable'];
        $this->PessoasFisicas = TableRegistry::get('PessoasFisicas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PessoasFisicas);

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
