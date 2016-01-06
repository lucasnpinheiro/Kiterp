<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * NotaFiscalSaidas Controller
 *
 * @property \App\Model\Table\NotaFiscalSaidasTable $NotaFiscalSaidas
 */
class NotaFiscalSaidasController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Notas Fiscais de Saída');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Empresas', 'Cfops', 'Pessoas', 'FormaPagamentos', 'Transportadoras', 'Vendedors']
        ];
        $this->set('notaFiscalSaidas', $this->paginate($this->NotaFiscalSaidas));
        $this->set('_serialize', ['notaFiscalSaidas']);
    }

    /**
     * View method
     *
     * @param string|null $id Nota Fiscal Saida id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $notaFiscalSaida = $this->NotaFiscalSaidas->get($id, [
            'contain' => ['Empresas', 'Cfops', 'Pessoas', 'FormaPagamentos', 'Transportadoras', 'Vendedors']
        ]);
        $this->set('notaFiscalSaida', $notaFiscalSaida);
        $this->set('_serialize', ['notaFiscalSaida']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $notaFiscalSaida = $this->NotaFiscalSaidas->newEntity();
        if ($this->request->is('post')) {
            $notaFiscalSaida = $this->NotaFiscalSaidas->patchEntity($notaFiscalSaida, $this->request->data);
            if ($this->NotaFiscalSaidas->save($notaFiscalSaida)) {
                $this->Flash->success(__('The nota fiscal saida has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The nota fiscal saida could not be saved. Please, try again.'));
            }
        }
        $empresas = $this->NotaFiscalSaidas->Empresas->find('list', ['limit' => 200]);
        $cfops = $this->NotaFiscalSaidas->Cfops->find('list', ['limit' => 200]);
        $pessoas = $this->NotaFiscalSaidas->Pessoas->find('list', ['limit' => 200]);
        $formaPagamentos = $this->NotaFiscalSaidas->FormaPagamentos->find('list', ['limit' => 200]);
        $transportadoras = $this->NotaFiscalSaidas->Transportadoras->find('list', ['limit' => 200]);
        $vendedors = $this->NotaFiscalSaidas->Vendedors->find('list', ['limit' => 200]);
        $this->set(compact('notaFiscalSaida', 'empresas', 'cfops', 'pessoas', 'formaPagamentos', 'transportadoras', 'vendedors'));
        $this->set('_serialize', ['notaFiscalSaida']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Nota Fiscal Saida id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $notaFiscalSaida = $this->NotaFiscalSaidas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notaFiscalSaida = $this->NotaFiscalSaidas->patchEntity($notaFiscalSaida, $this->request->data);
            if ($this->NotaFiscalSaidas->save($notaFiscalSaida)) {
                $this->Flash->success(__('The nota fiscal saida has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The nota fiscal saida could not be saved. Please, try again.'));
            }
        }
        $empresas = $this->NotaFiscalSaidas->Empresas->find('list', ['limit' => 200]);
        $cfops = $this->NotaFiscalSaidas->Cfops->find('list', ['limit' => 200]);
        $pessoas = $this->NotaFiscalSaidas->Pessoas->find('list', ['limit' => 200]);
        $formaPagamentos = $this->NotaFiscalSaidas->FormaPagamentos->find('list', ['limit' => 200]);
        $transportadoras = $this->NotaFiscalSaidas->Transportadoras->find('list', ['limit' => 200]);
        $vendedors = $this->NotaFiscalSaidas->Vendedors->find('list', ['limit' => 200]);
        $this->set(compact('notaFiscalSaida', 'empresas', 'cfops', 'pessoas', 'formaPagamentos', 'transportadoras', 'vendedors'));
        $this->set('_serialize', ['notaFiscalSaida']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Nota Fiscal Saida id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $notaFiscalSaida = $this->NotaFiscalSaidas->get($id);
        if ($this->NotaFiscalSaidas->delete($notaFiscalSaida)) {
            $this->Flash->success(__('The nota fiscal saida has been deleted.'));
        } else {
            $this->Flash->error(__('The nota fiscal saida could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
