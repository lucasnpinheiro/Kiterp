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
        $this->paginate = [
                //'contain' => ['Empresas', 'Pessoas', 'CondicoesPagamentos', 'Vendedores', 'Transportadoras']
        ];
        $this->set('pedidos', $this->paginate($this->Pedidos));
        $this->set('_serialize', ['pedidos']);
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
                $this->Flash->success(__('The pedido has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Pessoas');
        $empresas = $this->Pessoas->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 1]);
        $pessoas = $this->Pedidos->Pessoas->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 2]);
        $condicaoPagamentos = $this->Pedidos->CondicoesPagamentos->find('list');
        $vendedors = $this->Pedidos->Vendedores->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 4]);
        $transportadoras = $this->Pedidos->Transportadoras->find('list');
        $formasPagamentos = $this->Pedidos->FormasPagamentos->find('list');
        $this->set(compact('pedido', 'empresas', 'pessoas', 'condicaoPagamentos', 'vendedors', 'transportadoras', 'formasPagamentos'));
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
                $this->Flash->success(__('The pedido has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
            }
        }
        $empresas = $this->Pedidos->Empresas->find('list', ['limit' => 200]);
        $pessoas = $this->Pedidos->Pessoas->find('list', ['limit' => 200]);
        $condicaoPagamentos = $this->Pedidos->CondicoesPagamentos->find('list', ['limit' => 200]);
        $vendedors = $this->Pedidos->Vendedores->find('list', ['limit' => 200]);
        $transportadoras = $this->Pedidos->Transportadoras->find('list', ['limit' => 200]);
        $formasPagamentos = $this->Pedidos->FormasPagamentos->find('list', ['limit' => 200]);
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
            $this->Flash->success(__('The pedido has been deleted.'));
        } else {
            $this->Flash->error(__('The pedido could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
