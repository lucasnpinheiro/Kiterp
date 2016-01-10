<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Empresas Controller
 *
 * @property \App\Model\Table\EmpresasTable $Empresas
 */
class EmpresasController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Empresas');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Pessoas']
        ];
        $this->set('empresas', $this->paginate($this->Empresas));
        $this->set('_serialize', ['empresas']);
    }

    /**
     * View method
     *
     * @param string|null $id Empresa id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $empresa = $this->Empresas->get($id, [
            'contain' => ['Pessoas', 'ContasPagar', 'ContasReceber', 'NotaFiscalEntradas', 'NotaFiscalSaidas', 'Pedidos', 'ProdutosKits']
        ]);
        $this->set('empresa', $empresa);
        $this->set('_serialize', ['empresa']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null) {
        $this->loadModel('Pessoas');

        $empresa = $this->Empresas->newEntity();
        $pessoa = $this->Pessoas->get($id, [
            'contain' => ['Usuarios', 'PessoasContatos', 'PessoasEnderecos', 'PessoasFisicas', 'PessoasJuridicas', 'PessoasAssociacoes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->data);
            if ($this->Pessoas->save($pessoa)) {
                $this->request->data['Empresa']['pessoa_id'] = $pessoa->id;
                $empresa = $this->Empresas->patchEntity($empresa, $this->request->data['Empresa']);
                if ($this->Empresas->save($empresa)) {
                    $this->Flash->success(__('The empresa has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('TiposContatos');
        $tipos_contatos = $this->TiposContatos->find('list');
        $this->set(compact('empresa', 'pessoa', 'tipos_contatos'));
        $this->set('_serialize', ['empresa']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Empresa id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $this->loadModel('Pessoas');
        $empresa = $this->Empresas->get($id, [
            'contain' => []
        ]);

        $pessoa = $this->Pessoas->get($empresa->pessoa_id, [
            'contain' => ['Usuarios', 'PessoasContatos', 'PessoasEnderecos', 'PessoasFisicas', 'PessoasJuridicas', 'PessoasAssociacoes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->data);
            if ($this->Pessoas->save($pessoa)) {
                $this->request->data['Empresa']['pessoa_id'] = $pessoa->id;
                $empresa = $this->Empresas->patchEntity($empresa, $this->request->data['Empresa']);
                if ($this->Empresas->save($empresa)) {
                    $this->Flash->success(__('The empresa has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('TiposContatos');
        $tipos_contatos = $this->TiposContatos->find('list');
        $this->set(compact('empresa', 'pessoa', 'tipos_contatos'));
        $this->set('_serialize', ['pessoa']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $empresa = $this->Empresas->get($id);
        if ($this->Empresas->delete($empresa)) {
            $this->Flash->success(__('The empresa has been deleted.'));
        } else {
            $this->Flash->error(__('The empresa could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
