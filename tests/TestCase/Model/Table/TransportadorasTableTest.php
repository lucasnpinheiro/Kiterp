<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransportadorasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransportadorasTable Test Case
 */
class TransportadorasTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.transportadoras',
        'app.nota_fiscal_saidas',
        'app.empresas',
        'app.pessoas',
        'app.contas_pagar',
        'app.bancos',
        'app.contas_receber',
        'app.tradutoras',
        'app.nota_fiscal_entradas',
        'app.cfops',
        'app.pedidos',
        'app.condicao_pagamentos',
        'app.vendedors',
        'app.formas_pagamentos',
        'app.pedidos_formas_pagamentos',
        'app.forma_pagamentos',
        'app.usuarios',
        'app.nota_fiscal_entrada',
        'app.nota_fiscal_saida',
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
        $config = TableRegistry::exists('Transportadoras') ? [] : ['className' => 'App\Model\Table\TransportadorasTable'];
        $this->Transportadoras = TableRegistry::get('Transportadoras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Transportadoras);

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
