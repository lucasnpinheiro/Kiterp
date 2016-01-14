<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * FormasPagamentos Controller
 *
 * @property \App\Model\Table\FormasPagamentosTable $FormasPagamentos
 */
class FormasPagamentosController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Formas de Pagamentos');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
         $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query));
        $this->set('formasPagamentos', $this->paginate($query));
        $this->set('_serialize', ['formasPagamentos']);
    }

    /**
     * View method
     *
     * @param string|null $id Formas Pagamento id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $formasPagamento = $this->FormasPagamentos->get($id);
        $this->set('formasPagamento', $formasPagamento);
        $this->set('_serialize', ['formasPagamento']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $formasPagamento = $this->FormasPagamentos->newEntity();
        if ($this->request->is('post')) {
            $formasPagamento = $this->FormasPagamentos->patchEntity($formasPagamento, $this->request->data);
            if ($this->FormasPagamentos->save($formasPagamento)) {
                    $this->Flash->success(__('Registro Salvo com Sucesso.'));
                    return $this->redirect(['action' => 'index']);
                } else
                {
                    $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $pedidos = $this->FormasPagamentos->Pedidos->find('list');
        $this->set(compact('formasPagamento', 'pedidos'));
        $this->set('_serialize', ['formasPagamento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Formas Pagamento id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $formasPagamento = $this->FormasPagamentos->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formasPagamento = $this->FormasPagamentos->patchEntity($formasPagamento, $this->request->data);
            if ($this->FormasPagamentos->save($formasPagamento)) {
                    $this->Flash->success(__('Registro Salvo com Sucesso.'));
                    return $this->redirect(['action' => 'index']);
                } else
                {
                    $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $pedidos = $this->FormasPagamentos->Pedidos->find('list');
        $this->set(compact('formasPagamento', 'pedidos'));
        $this->set('_serialize', ['formasPagamento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Formas Pagamento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $formasPagamento = $this->FormasPagamentos->get($id);
        if ($this->FormasPagamentos->delete($formasPagamento)) {
            $this->Flash->success(__('Registro Excluido com Sucesso.'));
        } else
        {
            $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
