<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PessoasController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\PessoasController Test Case
 */
class PessoasControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
