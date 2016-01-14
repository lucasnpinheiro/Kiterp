<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Parametros Controller
 *
 * @property \App\Model\Table\ParametrosTable $Parametros
 */
class ParametrosController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Parametros');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query));
        $this->set('parametros', $this->paginate($query));
        $this->set('_serialize', ['parametros']);
    }

    /**
     * View method
     *
     * @param string|null $id Parametro id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $parametro = $this->Parametros->get($id, [
            'contain' => []
        ]);
        $this->set('parametro', $parametro);
        $this->set('_serialize', ['parametro']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $parametro = $this->Parametros->newEntity();
        if ($this->request->is('post')) {
            $parametro = $this->Parametros->patchEntity($parametro, $this->request->data);
            if ($this->Parametros->save($parametro)) {
                    $this->Flash->success(__('Registro Salvo com Sucesso.'));
                    return $this->redirect(['action' => 'index']);
                } else
                {
                    $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $this->set(compact('parametro'));
        $this->set('_serialize', ['parametro']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Parametro id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $parametro = $this->Parametros->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parametro = $this->Parametros->patchEntity($parametro, $this->request->data);
            if ($this->Parametros->save($parametro)) {
                    $this->Flash->success(__('Registro Salvo com Sucesso.'));
                    return $this->redirect(['action' => 'index']);
                } else
                {
                    $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $this->set(compact('parametro'));
        $this->set('_serialize', ['parametro']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parametro id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $parametro = $this->Parametros->get($id);
        if ($this->Parametros->delete($parametro)) {
            $this->Flash->success(__('Registro Excluido com Sucesso.'));
        } else
        {
            $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
