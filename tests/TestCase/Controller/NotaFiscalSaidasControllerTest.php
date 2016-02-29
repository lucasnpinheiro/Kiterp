<?php
namespace App\Test\TestCase\Controller;

use App\Controller\NotaFiscalSaidasController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\NotaFiscalSaidasController Test Case
 */
class NotaFiscalSaidasControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.nota_fiscal_saidas_itens',
        'app.ncms',
        'app.pedidos_itens',
        'app.produtos_valores',
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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
