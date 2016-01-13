<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Transportadoras Controller
 *
 * @property \App\Model\Table\TransportadorasTable $Transportadoras
 */
class TransportadorasController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Transportadoras');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query))->order('nome');
        $this->set('transportadoras', $this->paginate($query));
        $this->set('_serialize', ['transportadoras']);
    }

    /**
     * View method
     *
     * @param string|null $id Transportadora id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $transportadora = $this->Transportadoras->get($id, [
            'contain' => ['NotaFiscalSaidas', 'Pedidos']
        ]);
        $this->set('transportadora', $transportadora);
        $this->set('_serialize', ['transportadora']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $transportadora = $this->Transportadoras->newEntity();
        if ($this->request->is('post')) {
            $transportadora = $this->Transportadoras->patchEntity($transportadora, $this->request->data);
            if ($this->Transportadoras->save($transportadora)) {
                $this->Flash->success(__('The transportadora has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The transportadora could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('transportadora'));
        $this->set('_serialize', ['transportadora']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Transportadora id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $transportadora = $this->Transportadoras->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transportadora = $this->Transportadoras->patchEntity($transportadora, $this->request->data);
            if ($this->Transportadoras->save($transportadora)) {
                $this->Flash->success(__('The transportadora has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The transportadora could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('transportadora'));
        $this->set('_serialize', ['transportadora']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Transportadora id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $transportadora = $this->Transportadoras->get($id);
        if ($this->Transportadoras->delete($transportadora)) {
            $this->Flash->success(__('The transportadora has been deleted.'));
        } else {
            $this->Flash->error(__('The transportadora could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
