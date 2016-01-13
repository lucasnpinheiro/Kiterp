<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Ncm Controller
 *
 * @property \App\Model\Table\NcmTable $Ncm
 */
class NcmController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'NCM');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query));
        $this->set('ncm', $this->paginate($query));
        $this->set('_serialize', ['ncm']);
    }

    /**
     * View method
     *
     * @param string|null $id Ncm id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $ncm = $this->Ncm->get($id, [
            'contain' => ['ProdutosValores']
        ]);
        $this->set('ncm', $ncm);
        $this->set('_serialize', ['ncm']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $ncm = $this->Ncm->newEntity();
        if ($this->request->is('post')) {
            $ncm = $this->Ncm->patchEntity($ncm, $this->request->data);
            if ($this->Ncm->save($ncm)) {
                $this->Flash->success(__('The ncm has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ncm could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('ncm'));
        $this->set('_serialize', ['ncm']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ncm id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $ncm = $this->Ncm->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ncm = $this->Ncm->patchEntity($ncm, $this->request->data);
            if ($this->Ncm->save($ncm)) {
                $this->Flash->success(__('The ncm has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ncm could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('ncm'));
        $this->set('_serialize', ['ncm']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ncm id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $ncm = $this->Ncm->get($id);
        if ($this->Ncm->delete($ncm)) {
            $this->Flash->success(__('The ncm has been deleted.'));
        } else {
            $this->Flash->error(__('The ncm could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
