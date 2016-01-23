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
            debug($this->request->data);
            exit;

            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->data);
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $findPedidosAberto = $this->Pedidos->find()->where(['status' => 1])->first();
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
            'contain' => ['FormasPagamentos']
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
        $empresas = $this->Pedidos->Empresas->find('list');
        $pessoas = $this->Pedidos->Pessoas->find('list');
        $condicaoPagamentos = $this->Pedidos->CondicoesPagamentos->find('list');
        $vendedors = $this->Pedidos->Vendedores->find('list');
        $transportadoras = $this->Pedidos->Transportadoras->find('list');
        $formasPagamentos = $this->Pedidos->FormasPagamentos->find('list');
        $this->set(compact('pedido', 'empresas', 'pessoas', 'condicaoPagamentos', 'vendedors', 'transportadoras', 'formasPagamentos'));
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
