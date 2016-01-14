<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * CondicoesPagamentos Controller
 *
 * @property \App\Model\Table\CondicoesPagamentosTable $CondicoesPagamentos
 */
class CondicoesPagamentosController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Condições de Pagamentos');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query));
        $this->set('condicoesPagamentos', $this->paginate($query));
        $this->set('_serialize', ['condicoesPagamentos']);
    }

    /**
     * View method
     *
     * @param string|null $id Condicoes Pagamento id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $condicoesPagamento = $this->CondicoesPagamentos->get($id, [
            'contain' => []
        ]);
        $this->set('condicoesPagamento', $condicoesPagamento);
        $this->set('_serialize', ['condicoesPagamento']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $condicoesPagamento = $this->CondicoesPagamentos->newEntity();
        if ($this->request->is('post')) {
            $condicoesPagamento = $this->CondicoesPagamentos->patchEntity($condicoesPagamento, $this->request->data);
            if ($this->CondicoesPagamentos->save($condicoesPagamento)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $this->set(compact('condicoesPagamento'));
        $this->set('_serialize', ['condicoesPagamento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Condicoes Pagamento id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $condicoesPagamento = $this->CondicoesPagamentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $condicoesPagamento = $this->CondicoesPagamentos->patchEntity($condicoesPagamento, $this->request->data);
            if ($this->CondicoesPagamentos->save($condicoesPagamento)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $this->set(compact('condicoesPagamento'));
        $this->set('_serialize', ['condicoesPagamento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Condicoes Pagamento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $condicoesPagamento = $this->CondicoesPagamentos->get($id);
        if ($this->CondicoesPagamentos->delete($condicoesPagamento)) {
            $this->Flash->success(__('Registro Excluido com Sucesso.'));
        } else
        {
            $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
