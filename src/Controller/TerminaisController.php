<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Terminais Controller
 *
 * @property \App\Model\Table\TerminaisTable $Terminais
 */
class TerminaisController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Terminais');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $terminais = $this->paginate($this->Terminais);

        $this->set(compact('terminais'));
        $this->set('_serialize', ['terminais']);
    }

    /**
     * View method
     *
     * @param string|null $id Terminai id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $terminai = $this->Terminais->get($id, [
            'contain' => []
        ]);

        $this->set('terminai', $terminai);
        $this->set('_serialize', ['terminai']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $terminai = $this->Terminais->newEntity();
        if ($this->request->is('post')) {
            $terminai = $this->Terminais->patchEntity($terminai, $this->request->data);
            if ($this->Terminais->save($terminai)) {
                $this->Flash->success(__('The terminai has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The terminai could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('terminai'));
        $this->set('_serialize', ['terminai']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Terminai id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $terminai = $this->Terminais->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $terminai = $this->Terminais->patchEntity($terminai, $this->request->data);
            if ($this->Terminais->save($terminai)) {
                $this->Flash->success(__('The terminai has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The terminai could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('terminai'));
        $this->set('_serialize', ['terminai']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Terminai id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $terminai = $this->Terminais->get($id);
        if ($this->Terminais->delete($terminai)) {
            $this->Flash->success(__('The terminai has been deleted.'));
        } else {
            $this->Flash->error(__('The terminai could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
