<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * ContasPagar Controller
 *
 * @property \App\Model\Table\ContasPagarTable $ContasPagar
 */
class ContasPagarController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Contas a Pagar');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query));
        $this->set('contasPagar', $this->paginate($query));
        $this->set('_serialize', ['contasPagar']);
    }

    /**
     * View method
     *
     * @param string|null $id Contas Pagar id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $contasPagar = $this->ContasPagar->get($id, [
            'contain' => ['Empresas', 'Pessoas', 'Bancos', 'Tradutoras']
        ]);
        $this->set('contasPagar', $contasPagar);
        $this->set('_serialize', ['contasPagar']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $contasPagar = $this->ContasPagar->newEntity();
        if ($this->request->is('post')) {
            $contasPagar = $this->ContasPagar->patchEntity($contasPagar, $this->request->data);
            if ($this->ContasPagar->save($contasPagar)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $empresas = $this->ContasPagar->Empresas->find('list');
        $pessoas = $this->ContasPagar->Pessoas->find('list');
        $bancos = $this->ContasPagar->Bancos->find('list');
        $tradutoras = $this->ContasPagar->Tradutoras->find('list');
        $this->set(compact('contasPagar', 'empresas', 'pessoas', 'bancos', 'tradutoras'));
        $this->set('_serialize', ['contasPagar']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contas Pagar id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $contasPagar = $this->ContasPagar->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contasPagar = $this->ContasPagar->patchEntity($contasPagar, $this->request->data);
            if ($this->ContasPagar->save($contasPagar)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $empresas = $this->ContasPagar->Empresas->find('list');
        $pessoas = $this->ContasPagar->Pessoas->find('list');
        $bancos = $this->ContasPagar->Bancos->find('list');
        $tradutoras = $this->ContasPagar->Tradutoras->find('list');
        $this->set(compact('contasPagar', 'empresas', 'pessoas', 'bancos', 'tradutoras'));
        $this->set('_serialize', ['contasPagar']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contas Pagar id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $contasPagar = $this->ContasPagar->get($id);
        if ($this->ContasPagar->delete($contasPagar)) {
            $this->Flash->success(__('Registro Excluido com Sucesso.'));
        } else
        {
            $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
