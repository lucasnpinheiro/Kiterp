<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Bancos Controller
 *
 * @property \App\Model\Table\BancosTable $Bancos
 */
class BancosController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Bancos');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query))->order('nome')->order('codigo_banco');
        $this->set('bancos', $this->paginate($query));
        $this->set('codigos', $this->Bancos->find('list')->group('codigo_banco'));
        $this->set('_serialize', ['bancos']);
    }

    /**
     * View method
     *
     * @param string|null $id Banco id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $banco = $this->Bancos->get($id, [
            'contain' => ['ContasPagar', 'ContasReceber']
        ]);
        $this->set('banco', $banco);
        $this->set('_serialize', ['banco']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $banco = $this->Bancos->newEntity();
        if ($this->request->is('post')) {
            $banco = $this->Bancos->patchEntity($banco, $this->request->data);
            if ($this->Bancos->save($banco)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $this->set(compact('banco'));
        $this->set('_serialize', ['banco']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Banco id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $banco = $this->Bancos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $banco = $this->Bancos->patchEntity($banco, $this->request->data);
            if ($this->Bancos->save($banco)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $this->set(compact('banco'));
        $this->set('_serialize', ['banco']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Banco id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $banco = $this->Bancos->get($id);
        if ($this->Bancos->delete($banco)) {
            $this->Flash->success(__('Registro Excluido com Sucesso.'));
        } else
        {
            $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
