<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ProdutosKitsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ProdutosKitsController Test Case
 */
class ProdutosKitsControllerTest extends IntegrationTestCase
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
