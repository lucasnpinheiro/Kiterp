<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NotaFiscalSaidasItensTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NotaFiscalSaidasItensTable Test Case
 */
class NotaFiscalSaidasItensTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NotaFiscalSaidasItensTable
     */
    public $NotaFiscalSaidasItens;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nota_fiscal_saidas_itens',
        'app.nota_fiscal_saidas',
        'app.empresas',
        'app.pessoas',
        'app.contas_pagar',
        'app.bancos',
        'app.contas_receber',
        'app.formas_pagamentos',
        'app.pedidos',
        'app.condicoes_pagamentos',
        'app.vendedores',
        'app.nota_fiscal_entradas',
        'app.cfops',
        'app.nota_fiscal_entradas_itens',
        'app.produtos',
        'app.grupos_estoques',
        'app.pedidos_itens',
        'app.produtos_valores',
        'app.ncms',
        'app.cst_pis',
        'app.cst_cofins',
        'app.cst_icms',
        'app.cst_origem',
        'app.usuarios',
        'app.pessoas_enderecos',
        'app.pessoas_contatos',
        'app.tipos_contatos',
        'app.pessoas_fisicas',
        'app.pessoas_juridicas',
        'app.pessoas_associacoes',
        'app.transportadoras',
        'app.pedidos_formas_pagamentos',
        'app.forma_pagamentos',
        'app.tradutoras',
        'app.produtos_kits',
        'app.kits',
        'app.vendedors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('NotaFiscalSaidasItens') ? [] : ['className' => 'App\Model\Table\NotaFiscalSaidasItensTable'];
        $this->NotaFiscalSaidasItens = TableRegistry::get('NotaFiscalSaidasItens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NotaFiscalSaidasItens);

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
}
