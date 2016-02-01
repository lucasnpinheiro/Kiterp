<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * NotaFiscalEntradas Controller
 *
 * @property \App\Model\Table\NotaFiscalEntradasTable $NotaFiscalEntradas
 */
class NotaFiscalEntradasController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Notas Fiscais de Entrada');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query));
        $this->set('notaFiscalEntradas', $this->paginate($query));
        $this->set('_serialize', ['notaFiscalEntradas']);
    }

    /**
     * View method
     *
     * @param string|null $id Nota Fiscal Entrada id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $notaFiscalEntrada = $this->NotaFiscalEntradas->get($id, [
            'contain' => ['Empresas', 'Pessoas', 'Cfops']
        ]);
        $this->set('notaFiscalEntrada', $notaFiscalEntrada);
        $this->set('_serialize', ['notaFiscalEntrada']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $notaFiscalEntrada = $this->NotaFiscalEntradas->newEntity();
        if ($this->request->is('post')) {
            $notaFiscalEntrada = $this->NotaFiscalEntradas->patchEntity($notaFiscalEntrada, $this->request->data);
            if ($this->NotaFiscalEntradas->save($notaFiscalEntrada)) {
                    $this->Flash->success(__('Registro Salvo com Sucesso.'));
                    return $this->redirect(['action' => 'index']);
                } else
                {
                    $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $empresas = $this->NotaFiscalEntradas->Empresas->find('list');
        $pessoas = $this->NotaFiscalEntradas->Pessoas->find('list');
        $cfops = $this->NotaFiscalEntradas->Cfops->find('list');
        $this->set(compact('notaFiscalEntrada', 'empresas', 'pessoas', 'cfops'));
        $this->set('_serialize', ['notaFiscalEntrada']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Nota Fiscal Entrada id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $notaFiscalEntrada = $this->NotaFiscalEntradas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notaFiscalEntrada = $this->NotaFiscalEntradas->patchEntity($notaFiscalEntrada, $this->request->data);
            if ($this->NotaFiscalEntradas->save($notaFiscalEntrada)) {
                    $this->Flash->success(__('Registro Salvo com Sucesso.'));
                    return $this->redirect(['action' => 'index']);
                } else
                {
                    $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $empresas = $this->NotaFiscalEntradas->Empresas->find('list');
        $pessoas = $this->NotaFiscalEntradas->Pessoas->find('list');
        $cfops = $this->NotaFiscalEntradas->Cfops->find('list');
        $this->set(compact('notaFiscalEntrada', 'empresas', 'pessoas', 'cfops'));
        $this->set('_serialize', ['notaFiscalEntrada']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Nota Fiscal Entrada id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $notaFiscalEntrada = $this->NotaFiscalEntradas->get($id);
        if ($this->NotaFiscalEntradas->delete($notaFiscalEntrada)) {
            $this->Flash->success(__('Registro Excluido com Sucesso.'));
        } else
        {
            $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
