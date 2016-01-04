<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ContasReceber Controller
 *
 * @property \App\Model\Table\ContasReceberTable $ContasReceber
 */
class ContasReceberController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Empresas', 'Pessoas', 'Bancos', 'Tradutoras']
        ];
        $this->set('contasReceber', $this->paginate($this->ContasReceber));
        $this->set('_serialize', ['contasReceber']);
    }

    /**
     * View method
     *
     * @param string|null $id Contas Receber id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contasReceber = $this->ContasReceber->get($id, [
            'contain' => ['Empresas', 'Pessoas', 'Bancos', 'Tradutoras']
        ]);
        $this->set('contasReceber', $contasReceber);
        $this->set('_serialize', ['contasReceber']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contasReceber = $this->ContasReceber->newEntity();
        if ($this->request->is('post')) {
            $contasReceber = $this->ContasReceber->patchEntity($contasReceber, $this->request->data);
            if ($this->ContasReceber->save($contasReceber)) {
                $this->Flash->success(__('The contas receber has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contas receber could not be saved. Please, try again.'));
            }
        }
        $empresas = $this->ContasReceber->Empresas->find('list', ['limit' => 200]);
        $pessoas = $this->ContasReceber->Pessoas->find('list', ['limit' => 200]);
        $bancos = $this->ContasReceber->Bancos->find('list', ['limit' => 200]);
        $tradutoras = $this->ContasReceber->Tradutoras->find('list', ['limit' => 200]);
        $this->set(compact('contasReceber', 'empresas', 'pessoas', 'bancos', 'tradutoras'));
        $this->set('_serialize', ['contasReceber']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contas Receber id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contasReceber = $this->ContasReceber->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contasReceber = $this->ContasReceber->patchEntity($contasReceber, $this->request->data);
            if ($this->ContasReceber->save($contasReceber)) {
                $this->Flash->success(__('The contas receber has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contas receber could not be saved. Please, try again.'));
            }
        }
        $empresas = $this->ContasReceber->Empresas->find('list', ['limit' => 200]);
        $pessoas = $this->ContasReceber->Pessoas->find('list', ['limit' => 200]);
        $bancos = $this->ContasReceber->Bancos->find('list', ['limit' => 200]);
        $tradutoras = $this->ContasReceber->Tradutoras->find('list', ['limit' => 200]);
        $this->set(compact('contasReceber', 'empresas', 'pessoas', 'bancos', 'tradutoras'));
        $this->set('_serialize', ['contasReceber']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contas Receber id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contasReceber = $this->ContasReceber->get($id);
        if ($this->ContasReceber->delete($contasReceber)) {
            $this->Flash->success(__('The contas receber has been deleted.'));
        } else {
            $this->Flash->error(__('The contas receber could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
