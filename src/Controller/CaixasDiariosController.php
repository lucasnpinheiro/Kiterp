<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * CaixasDiarios Controller
 *
 * @property \App\Model\Table\CaixasDiariosTable $CaixasDiarios
 */
class CaixasDiariosController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Caixa Diario');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->set('caixasDiarios', $this->paginate($this->CaixasDiarios));
        $this->set('_serialize', ['caixasDiarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Caixas Diario id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $caixasDiario = $this->CaixasDiarios->get($id, [
            'contain' => []
        ]);
        $this->set('caixasDiario', $caixasDiario);
        $this->set('_serialize', ['caixasDiario']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $caixasDiario = $this->CaixasDiarios->newEntity();
        if ($this->request->is('post')) {
            $caixasDiario = $this->CaixasDiarios->patchEntity($caixasDiario, $this->request->data);
            if ($this->CaixasDiarios->save($caixasDiario)) {
                $this->Flash->success(__('The caixas diario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The caixas diario could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('caixasDiario'));
        $this->set('_serialize', ['caixasDiario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Caixas Diario id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $caixasDiario = $this->CaixasDiarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $caixasDiario = $this->CaixasDiarios->patchEntity($caixasDiario, $this->request->data);
            if ($this->CaixasDiarios->save($caixasDiario)) {
                $this->Flash->success(__('The caixas diario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The caixas diario could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('caixasDiario'));
        $this->set('_serialize', ['caixasDiario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Caixas Diario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $caixasDiario = $this->CaixasDiarios->get($id);
        if ($this->CaixasDiarios->delete($caixasDiario)) {
            $this->Flash->success(__('The caixas diario has been deleted.'));
        } else {
            $this->Flash->error(__('The caixas diario could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
