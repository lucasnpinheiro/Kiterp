<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * NotasFiscaisSaidas Controller
 *
 * @property \App\Model\Table\NotasFiscaisSaidasTable $NotasFiscaisSaidas
 */
class NotasFiscaisSaidasController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Empresas', 'Pessoas', 'Transportadoras', 'Vendedors']
        ];
        $notasFiscaisSaidas = $this->paginate($this->NotasFiscaisSaidas);

        $this->set(compact('notasFiscaisSaidas'));
        $this->set('_serialize', ['notasFiscaisSaidas']);
    }

    /**
     * View method
     *
     * @param string|null $id Notas Fiscais Saida id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $notasFiscaisSaida = $this->NotasFiscaisSaidas->get($id, [
            'contain' => ['Empresas', 'Pessoas', 'Transportadoras', 'Vendedors', 'NotasFiscaisSaidasItens']
        ]);

        $this->set('notasFiscaisSaida', $notasFiscaisSaida);
        $this->set('_serialize', ['notasFiscaisSaida']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $notasFiscaisSaida = $this->NotasFiscaisSaidas->newEntity();
        if ($this->request->is('post')) {
            $notasFiscaisSaida = $this->NotasFiscaisSaidas->patchEntity($notasFiscaisSaida, $this->request->data);
            if ($this->NotasFiscaisSaidas->save($notasFiscaisSaida)) {
                $this->Flash->success(__('The notas fiscais saida has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notas fiscais saida could not be saved. Please, try again.'));
            }
        }
        $empresas = $this->NotasFiscaisSaidas->Empresas->find('list', ['limit' => 200]);

        $pessoas = $this->NotasFiscaisSaidas->Pessoas->find('list', ['limit' => 200]);
        
        $transportadoras = $this->NotasFiscaisSaidas->Transportadoras->find('list', ['limit' => 200]);
        $vendedors = $this->NotasFiscaisSaidas->Vendedors->find('list', ['limit' => 200]);
        $this->set(compact('notasFiscaisSaida', 'empresas', 'pessoas', 'transportadoras', 'vendedors'));
        $this->set('_serialize', ['notasFiscaisSaida']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Notas Fiscais Saida id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $notasFiscaisSaida = $this->NotasFiscaisSaidas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notasFiscaisSaida = $this->NotasFiscaisSaidas->patchEntity($notasFiscaisSaida, $this->request->data);
            if ($this->NotasFiscaisSaidas->save($notasFiscaisSaida)) {
                $this->Flash->success(__('The notas fiscais saida has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notas fiscais saida could not be saved. Please, try again.'));
            }
        }
        $empresas = $this->NotasFiscaisSaidas->Empresas->find('list', ['limit' => 200]);

        $pessoas = $this->NotasFiscaisSaidas->Pessoas->find('list', ['limit' => 200]);
        
        $transportadoras = $this->NotasFiscaisSaidas->Transportadoras->find('list', ['limit' => 200]);
        $vendedors = $this->NotasFiscaisSaidas->Vendedors->find('list', ['limit' => 200]);
        $this->set(compact('notasFiscaisSaida', 'empresas', 'pessoas', 'transportadoras', 'vendedors'));
        $this->set('_serialize', ['notasFiscaisSaida']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notas Fiscais Saida id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $notasFiscaisSaida = $this->NotasFiscaisSaidas->get($id);
        if ($this->NotasFiscaisSaidas->delete($notasFiscaisSaida)) {
            $this->Flash->success(__('The notas fiscais saida has been deleted.'));
        } else {
            $this->Flash->error(__('The notas fiscais saida could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
