<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * NotasFiscaisEntradas Controller
 *
 * @property \App\Model\Table\NotasFiscaisEntradasTable $NotasFiscaisEntradas
 */
class NotasFiscaisEntradasController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Notas Fiscais de Entrada');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Empresas', 'Pessoas']
        ];
        $notasFiscaisEntradas = $this->paginate($this->NotasFiscaisEntradas);

        $this->set(compact('notasFiscaisEntradas'));
        $this->set('_serialize', ['notasFiscaisEntradas']);
    }

    /**
     * View method
     *
     * @param string|null $id Notas Fiscais Entrada id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $notasFiscaisEntrada = $this->NotasFiscaisEntradas->get($id, [
            'contain' => ['Empresas', 'Pessoas', 'NotasFiscaisEntradasItens']
        ]);

        $this->set('notasFiscaisEntrada', $notasFiscaisEntrada);
        $this->set('_serialize', ['notasFiscaisEntrada']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $notasFiscaisEntrada = $this->NotasFiscaisEntradas->newEntity();
        if ($this->request->is('post')) {
            $notasFiscaisEntrada = $this->NotasFiscaisEntradas->patchEntity($notasFiscaisEntrada, $this->request->data);
            if ($this->NotasFiscaisEntradas->save($notasFiscaisEntrada)) {
                $this->Flash->success(__('The notas fiscais entrada has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notas fiscais entrada could not be saved. Please, try again.'));
            }
        }
        $empresas = $this->NotasFiscaisEntradas->Empresas->find('list', ['limit' => 200]);
        $pessoas = $this->NotasFiscaisEntradas->Pessoas->find('list', ['limit' => 200]);

        $this->set(compact('notasFiscaisEntrada', 'empresas', 'pessoas'));
        $this->set('_serialize', ['notasFiscaisEntrada']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Notas Fiscais Entrada id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $notasFiscaisEntrada = $this->NotasFiscaisEntradas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notasFiscaisEntrada = $this->NotasFiscaisEntradas->patchEntity($notasFiscaisEntrada, $this->request->data);
            if ($this->NotasFiscaisEntradas->save($notasFiscaisEntrada)) {
                $this->Flash->success(__('The notas fiscais entrada has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notas fiscais entrada could not be saved. Please, try again.'));
            }
        }
        $empresas = $this->NotasFiscaisEntradas->Empresas->find('list', ['limit' => 200]);
        $pessoas = $this->NotasFiscaisEntradas->Pessoas->find('list', ['limit' => 200]);

        $this->set(compact('notasFiscaisEntrada', 'empresas', 'pessoas'));
        $this->set('_serialize', ['notasFiscaisEntrada']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notas Fiscais Entrada id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $notasFiscaisEntrada = $this->NotasFiscaisEntradas->get($id);
        if ($this->NotasFiscaisEntradas->delete($notasFiscaisEntrada)) {
            $this->Flash->success(__('The notas fiscais entrada has been deleted.'));
        } else {
            $this->Flash->error(__('The notas fiscais entrada could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
