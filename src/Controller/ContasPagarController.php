<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ContasPagar Controller
 *
 * @property \App\Model\Table\ContasPagarTable $ContasPagar
 */
class ContasPagarController extends AppController
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
        $this->set('contasPagar', $this->paginate($this->ContasPagar));
        $this->set('_serialize', ['contasPagar']);
    }

    /**
     * View method
     *
     * @param string|null $id Contas Pagar id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contasPagar = $this->ContasPagar->get($id, [
            'contain' => ['Empresas', 'Pessoas', 'Bancos', 'Tradutoras']
        ]);
        $this->set('contasPagar', $contasPagar);
        $this->set('_serialize', ['contasPagar']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contasPagar = $this->ContasPagar->newEntity();
        if ($this->request->is('post')) {
            $contasPagar = $this->ContasPagar->patchEntity($contasPagar, $this->request->data);
            if ($this->ContasPagar->save($contasPagar)) {
                $this->Flash->success(__('The contas pagar has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contas pagar could not be saved. Please, try again.'));
            }
        }
        $empresas = $this->ContasPagar->Empresas->find('list', ['limit' => 200]);
        $pessoas = $this->ContasPagar->Pessoas->find('list', ['limit' => 200]);
        $bancos = $this->ContasPagar->Bancos->find('list', ['limit' => 200]);
        $tradutoras = $this->ContasPagar->Tradutoras->find('list', ['limit' => 200]);
        $this->set(compact('contasPagar', 'empresas', 'pessoas', 'bancos', 'tradutoras'));
        $this->set('_serialize', ['contasPagar']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contas Pagar id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contasPagar = $this->ContasPagar->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contasPagar = $this->ContasPagar->patchEntity($contasPagar, $this->request->data);
            if ($this->ContasPagar->save($contasPagar)) {
                $this->Flash->success(__('The contas pagar has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contas pagar could not be saved. Please, try again.'));
            }
        }
        $empresas = $this->ContasPagar->Empresas->find('list', ['limit' => 200]);
        $pessoas = $this->ContasPagar->Pessoas->find('list', ['limit' => 200]);
        $bancos = $this->ContasPagar->Bancos->find('list', ['limit' => 200]);
        $tradutoras = $this->ContasPagar->Tradutoras->find('list', ['limit' => 200]);
        $this->set(compact('contasPagar', 'empresas', 'pessoas', 'bancos', 'tradutoras'));
        $this->set('_serialize', ['contasPagar']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contas Pagar id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contasPagar = $this->ContasPagar->get($id);
        if ($this->ContasPagar->delete($contasPagar)) {
            $this->Flash->success(__('The contas pagar has been deleted.'));
        } else {
            $this->Flash->error(__('The contas pagar could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
