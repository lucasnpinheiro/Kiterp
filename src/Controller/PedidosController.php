<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Pedidos Controller
 *
 * @property \App\Model\Table\PedidosTable $Pedidos
 */
class PedidosController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Pedidos');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query))->contain(['Pessoas', 'Vendedores', 'Empresas' => function($q) {
                return $q->contain('Pessoas')->autoFields(true);
            }]);

        $this->loadModel('Pessoas');
        $this->loadModel('Empresas');
        $empresas = $this->Empresas->find('list');
        $pessoas = $this->Pessoas->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 2]);
        $vendedors = $this->Pessoas->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 4]);
        $this->set(compact('empresas', 'pessoas', 'vendedors'));
        $this->set('pedidos', $this->paginate($query));
        $this->set('_serialize', ['pedidos']);
    }

    public function gerar() {
        $dados = [
            'id' => $this->request->data('pedido_id'),
            'empresa_id' => $this->request->data('empresa_id'),
            'vendedor_id' => $this->request->data('vendedor_id'),
            'pessoa_id' => $this->request->data('cliente_id'),
            'condicao_pagamento_id' => $this->request->data('condicao_pagamento_id'),
            'data_pedido' => date('Y-m-d H:i:s'),
            'transportadora_id' => 1,
            'status' => 1
        ];
        $pedido = $this->Pedidos->newEntity();
        foreach ($dados as $key => $value) {
            $pedido{$key} = $value;
        }
        $retorno = [
            'cod' => 111,
            'id' => 0,
        ];
        if ($this->Pedidos->save($pedido)) {
            $retorno = [
                'cod' => ($dados['id'] != '' ? 222 : 999),
                'id' => $pedido->id,
            ];
        }
        echo json_encode($retorno);
        exit;
    }

    public function item() {

        $dados = [
            'pedido_id' => $this->request->data('pedido_id'),
            'produto_id' => $this->request->data('produto_id'),
            'qtde' => $this->request->data('quantidade'),
            'venda' => $this->request->data('valor_unitario'),
            'total' => ((float) $this->request->data('quantidade') * (float) $this->request->data('valor_unitario')),
        ];

        $this->loadModel('PedidosItens');

        $itens = $this->PedidosItens->newEntity();
        foreach ($dados as $key => $value) {
            $itens->{$key} = $value;
        }
        $retorno = [
            'cod' => 111,
        ];
        if ($this->PedidosItens->save($itens)) {
            $retorno = [
                'cod' => (999),
            ];
        }
        $sql = 'UPDATE pedidos 
                SET 
                    valor_total = (SELECT 
                            COALESCE(SUM(qtde * venda), 0) AS total
                        FROM
                            pedidos_itens
                        WHERE
                            pedido_id = ' . $this->request->data('pedido_id') . ')
                WHERE
                    id = ' . $this->request->data('pedido_id');

        $conn = \Cake\Datasource\ConnectionManager::get('default');
        $conn->execute($sql);

        $pedido = $this->Pedidos->get($this->request->data('pedido_id'), []);
        $retorno['total'] = $pedido->valor_total;
        echo json_encode($retorno);
        exit;
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function receber($id = null) {
        $pedido = $this->Pedidos->get($id, [
            'contain' => ['Empresas' => function($q) {
                    return $q->contain('Pessoas')->autoFields(true);
                }, 'Pessoas', 'CondicoesPagamentos', 'Vendedores', 'Transportadoras', 'PedidosItens' => function($q) {
                    return $q->contain('Produtos')->autoFields(true);
                }]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->data);
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }

        $this->loadModel('FormasPagamentos');

        $formasPagamentos = $this->FormasPagamentos->find('list');

        $this->set('pedido', $pedido);
        $this->set('formasPagamentos', $formasPagamentos);
        $this->set('_serialize', ['pedido']);
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $pedido = $this->Pedidos->get($id, [
            'contain' => ['Empresas', 'Pessoas', 'CondicoesPagamentos', 'Vendedores', 'Transportadoras', 'FormasPagamentos']
        ]);
        $this->set('pedido', $pedido);
        $this->set('_serialize', ['pedido']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $pedido = $this->Pedidos->newEntity();
        if ($this->request->is('post')) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->data);
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $findPedidosAberto = $this->Pedidos->find()->where(['status' => 1, 'vendedor_id' => $this->Auth->user('id')])->contain('PedidosItens')->first();
        if (count($findPedidosAberto) > 0) {
            $pedido->pedido_id = $findPedidosAberto->id;
            $pedido = $this->Pedidos->patchEntity($pedido, $findPedidosAberto->toArray());
        }
        $this->loadModel('Pessoas');
        $this->loadModel('Empresas');
        $empresas = $this->Empresas->find('list');
        $pessoas = $this->Pedidos->Pessoas->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 2]);
        $condicaoPagamentos = $this->Pedidos->CondicoesPagamentos->find('list');
        $vendedors = $this->Pedidos->Vendedores->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 4]);
        $this->set(compact('pedido', 'empresas', 'pessoas', 'condicaoPagamentos', 'vendedors'));
        $this->set('_serialize', ['pedido']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedido id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $pedido = $this->Pedidos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->data);
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $pedido->pedido_id = $pedido->id;
        $this->loadModel('Pessoas');
        $this->loadModel('Empresas');
        $empresas = $this->Empresas->find('list');
        $pessoas = $this->Pedidos->Pessoas->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 2]);
        $condicaoPagamentos = $this->Pedidos->CondicoesPagamentos->find('list');
        $vendedors = $this->Pedidos->Vendedores->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 4]);
        $this->set(compact('pedido', 'empresas', 'pessoas', 'condicaoPagamentos', 'vendedors'));
        $this->set('_serialize', ['pedido']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $pedido = $this->Pedidos->get($id);
        if ($this->Pedidos->delete($pedido)) {
            $this->Flash->success(__('Registro Excluido com Sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
