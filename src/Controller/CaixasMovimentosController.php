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
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query))
                //->contain(['CaixasDiarios'])
                ->order(['CaixasMovimentos.caixas_diario_id' => 'desc', 'CaixasMovimentos.created' => 'asc']);
        $this->set('caixasMovimentos', $this->paginate($query));
        $this->set('_serialize', ['caixasMovimentos']);
        
    }

    /**
     * View method
     *
     * @param string|null $id Caixas Movimento id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $caixasMovimento = $this->CaixasMovimentos->get($id, [
            'contain' => ['CaixasDiarios']
        ]);

        $this->set('caixasMovimento', $caixasMovimento);
        $this->set('_serialize', ['caixasMovimento']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $caixasMovimento = $this->CaixasMovimentos->newEntity();
        if ($this->request->is('post')) {
            $caixasMovimento = $this->CaixasMovimentos->patchEntity($caixasMovimento, $this->request->data);
            if ($this->CaixasMovimentos->save($caixasMovimento)) {
                $this->Flash->success(__('The caixas movimento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The caixas movimento could not be saved. Please, try again.'));
            }
        }
        $caixaDiarios = $this->CaixasMovimentos->CaixasDiarios->find('list', ['limit' => 200]);
        $this->set(compact('caixasMovimento', 'caixaDiarios'));
        $this->set('_serialize', ['caixasMovimento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Caixas Movimento id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $caixasMovimento = $this->CaixasMovimentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $caixasMovimento = $this->CaixasMovimentos->patchEntity($caixasMovimento, $this->request->data);
            if ($this->CaixasMovimentos->save($caixasMovimento)) {
                $this->Flash->success(__('The caixas movimento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The caixas movimento could not be saved. Please, try again.'));
            }
        }
        $caixaDiarios = $this->CaixasMovimentos->CaixasDiarios->find('list', ['limit' => 200]);
        $this->set(compact('caixasMovimento', 'caixaDiarios'));
        $this->set('_serialize', ['caixasMovimento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Caixas Movimento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $caixasMovimento = $this->CaixasMovimentos->get($id);
        if ($this->CaixasMovimentos->delete($caixasMovimento)) {
            $this->Flash->success(__('The caixas movimento has been deleted.'));
        } else {
            $this->Flash->error(__('The caixas movimento could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
