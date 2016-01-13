<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Atividades Controller
 *
 * @property \App\Model\Table\AtividadesTable $Atividades
 */
class AtividadesController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Atividades');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query))->order('nome');
        $this->set('atividades', $this->paginate($query));
        $this->set('_serialize', ['atividades']);
    }

    /**
     * View method
     *
     * @param string|null $id Atividade id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $atividade = $this->Atividades->get($id, [
            'contain' => []
        ]);
        $this->set('atividade', $atividade);
        $this->set('_serialize', ['atividade']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $atividade = $this->Atividades->newEntity();
        if ($this->request->is('post')) {
            $atividade = $this->Atividades->patchEntity($atividade, $this->request->data);
            if ($this->Atividades->save($atividade)) {
                $this->Flash->success(__('The atividade has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The atividade could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('atividade'));
        $this->set('_serialize', ['atividade']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Atividade id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $atividade = $this->Atividades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $atividade = $this->Atividades->patchEntity($atividade, $this->request->data);
            if ($this->Atividades->save($atividade)) {
                $this->Flash->success(__('The atividade has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The atividade could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('atividade'));
        $this->set('_serialize', ['atividade']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Atividade id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $atividade = $this->Atividades->get($id);
        if ($this->Atividades->delete($atividade)) {
            $this->Flash->success(__('The atividade has been deleted.'));
        } else {
            $this->Flash->error(__('The atividade could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
