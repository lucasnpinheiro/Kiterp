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
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query));
        $this->set('notaFiscalSaidas', $this->paginate($query));
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
                    $this->Flash->success(__('Registro Salvo com Sucesso.'));
                    return $this->redirect(['action' => 'index']);
                } else
                {
                    $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $empresas = $this->NotaFiscalSaidas->Empresas->find('list');
        $cfops = $this->NotaFiscalSaidas->Cfops->find('list');
        $pessoas = $this->NotaFiscalSaidas->Pessoas->find('list');
        $formaPagamentos = $this->NotaFiscalSaidas->FormaPagamentos->find('list');
        $transportadoras = $this->NotaFiscalSaidas->Transportadoras->find('list');
        $vendedors = $this->NotaFiscalSaidas->Vendedors->find('list');
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
                    $this->Flash->success(__('Registro Salvo com Sucesso.'));
                    return $this->redirect(['action' => 'index']);
                } else
                {
                    $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $empresas = $this->NotaFiscalSaidas->Empresas->find('list');
        $cfops = $this->NotaFiscalSaidas->Cfops->find('list');
        $pessoas = $this->NotaFiscalSaidas->Pessoas->find('list');
        $formaPagamentos = $this->NotaFiscalSaidas->FormaPagamentos->find('list');
        $transportadoras = $this->NotaFiscalSaidas->Transportadoras->find('list');
        $vendedors = $this->NotaFiscalSaidas->Vendedors->find('list');
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
            $this->Flash->success(__('Registro Excluido com Sucesso.'));
        } else
        {
            $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
