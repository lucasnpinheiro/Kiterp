<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NotasFiscaisSaidasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NotasFiscaisSaidasTable Test Case
 */
class NotasFiscaisSaidasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NotasFiscaisSaidasTable
     */
    public $NotasFiscaisSaidas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.notas_fiscais_saidas',
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
        'app.nota_fiscal_saidas',
        'app.usuarios',
        'app.pessoas_enderecos',
        'app.pessoas_contatos',
        'app.tipos_contatos',
        'app.pessoas_fisicas',
        'app.pessoas_juridicas',
        'app.pessoas_associacoes',
        'app.transportadoras',
        'app.pedidos_itens',
        'app.produtos',
        'app.grupos_estoques',
        'app.nota_fiscal_entradas_itens',
        'app.nota_fiscal_saidas_itens',
        'app.produtos_valores',
        'app.ncms',
        'app.cst_pis',
        'app.cst_cofins',
        'app.cst_icms',
        'app.cst_origem',
        'app.pedidos_formas_pagamentos',
        'app.forma_pagamentos',
        'app.tradutoras',
        'app.produtos_kits',
        'app.kits',
        'app.cfops',
        'app.vendedors',
        'app.notas_fiscais_saidas_itens'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('NotasFiscaisSaidas') ? [] : ['className' => 'App\Model\Table\NotasFiscaisSaidasTable'];
        $this->NotasFiscaisSaidas = TableRegistry::get('NotasFiscaisSaidas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NotasFiscaisSaidas);

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
