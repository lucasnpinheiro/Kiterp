<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * CaixasMovimentos Controller
 *
 * @property \App\Model\Table\CaixasMovimentosTable $CaixasMovimentos
 */
class CaixasMovimentosController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Caixa Movimentos');
        $this->set('bt_consultar_acao', false);
        $this->set('bt_cadastrar_acao', false);
        $this->set('bt_excluir_acao', false);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id) {
        $this->loadModel('CaixasDiarios');
        $caixasDiarios = $this->CaixasDiarios->get($id, ['contain' => ['Pessoas', 'Terminais']]);
        $caixasMovimento = $this->CaixasMovimentos->newEntity();
        $caixasMovimentos = $this->CaixasMovimentos->find()->where(['caixas_diario_id' => $id])->all();

        $this->set(compact('caixasDiarios', 'caixasMovimento', 'caixasMovimentos'));
        $this->set('caixas_diario_id', $id);
        $this->set('_serialize', ['caixasMovimentos']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null) {
        $caixasMovimento = $this->CaixasMovimentos->newEntity();
        if ($this->request->is('post')) {
            $caixasMovimento = $this->CaixasMovimentos->patchEntity($caixasMovimento, $this->request->data);
            if ($this->CaixasMovimentos->save($caixasMovimento)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index', $caixasMovimento->caixas_diario_id]);
            } else {
                $this->Flash->error(__('O registro não pôde ser salvo. Por favor tente novamente.'));
            }
        }
        $this->set(compact('caixasMovimento'));
        $this->set('_serialize', ['caixasMovimento']);
    }

    public function fechar($id = null) {
        $this->loadModel('CaixasDiarios');
        $this->loadModel('Pedidos');
        $this->loadModel('PedidosFormasPagamentos');
        $this->loadModel('FormasPagamentos');
        $caixasDiarios = $this->CaixasDiarios->get($id, ['contain' => ['Pessoas', 'Terminais']]);
        $caixasMovimentos = $this->CaixasMovimentos->find()->where(['caixas_diario_id' => $id])->all();
        $saldoInicial = $this->CaixasMovimentos->find();
        $saldoInicial = $saldoInicial->select(['grupo_id', 'total' => $saldoInicial->func()->sum('valor')])->where(['caixas_diario_id' => $id])->group('grupo_id')->all();
        $totais = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
        ];
        if (count($saldoInicial) > 0) {
            foreach ($saldoInicial as $key => $value) {
                $totais[$value->grupo_id] = $value->total;
            }
        }

        $vendas = $this->PedidosFormasPagamentos->find();
        $vendas = $vendas
                ->select(['PedidosFormasPagamentos.formas_pagamento_id', 'total' => $vendas->func()->sum('PedidosFormasPagamentos.valor')])
                ->group('PedidosFormasPagamentos.formas_pagamento_id')
                ->join([
                    'Pedidos' => [
                        'table' => 'pedidos',
                        'type' => 'INNER',
                        'conditions' => [
                            'Pedidos.id = PedidosFormasPagamentos.pedido_id'
                        ]
                    ],
                ])
                ->all();


        $find_formas_pagamentos = $this->FormasPagamentos->find()->all();

        $pagamentos = [];
        $pagamentos[0] = ['nome' => 'Vendas', 'valor' => 0];
        foreach ($find_formas_pagamentos as $key => $value) {
            $pagamentos[$value->id] = ['nome' => $value->nome, 'valor' => 0];
        }

        if (count($vendas) > 0) {
            foreach ($vendas as $key => $value) {
                $pagamentos[$value->formas_pagamento_id]['valor'] = $value->total;
                $pagamentos[0]['valor'] += $value->total;
            }
        }
        $this->set(compact('caixasDiarios', 'caixasMovimentos', 'totais', 'pagamentos'));
        $this->set('caixas_diario_id', $id);
        $this->set('_serialize', ['caixasMovimentos']);

        if ($this->request->query('imprimir') === 'S') {
            $this->viewBuilder()->layout('print');
            $this->set('redirect', \Cake\Routing\Router::url(['action' => 'fechar', $id], true));
        }
    }

}
