<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PessoasAssociacoes Controller
 *
 * @property \App\Model\Table\PessoasAssociacoesTable $PessoasAssociacoes
 */
class PessoasAssociacoesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pessoas']
        ];
        $this->set('pessoasAssociacoes', $this->paginate($this->PessoasAssociacoes));
        $this->set('_serialize', ['pessoasAssociacoes']);
    }

    /**
     * View method
     *
     * @param string|null $id Pessoas Associaco id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pessoasAssociaco = $this->PessoasAssociacoes->get($id, [
            'contain' => ['Pessoas']
        ]);
        $this->set('pessoasAssociaco', $pessoasAssociaco);
        $this->set('_serialize', ['pessoasAssociaco']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pessoasAssociaco = $this->PessoasAssociacoes->newEntity();
        if ($this->request->is('post')) {
            $pessoasAssociaco = $this->PessoasAssociacoes->patchEntity($pessoasAssociaco, $this->request->data);
            if ($this->PessoasAssociacoes->save($pessoasAssociaco)) {
                $this->Flash->success(__('The pessoas associaco has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pessoas associaco could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->PessoasAssociacoes->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('pessoasAssociaco', 'pessoas'));
        $this->set('_serialize', ['pessoasAssociaco']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pessoas Associaco id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pessoasAssociaco = $this->PessoasAssociacoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoasAssociaco = $this->PessoasAssociacoes->patchEntity($pessoasAssociaco, $this->request->data);
            if ($this->PessoasAssociacoes->save($pessoasAssociaco)) {
                $this->Flash->success(__('The pessoas associaco has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pessoas associaco could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->PessoasAssociacoes->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('pessoasAssociaco', 'pessoas'));
        $this->set('_serialize', ['pessoasAssociaco']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pessoas Associaco id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoasAssociaco = $this->PessoasAssociacoes->get($id);
        if ($this->PessoasAssociacoes->delete($pessoasAssociaco)) {
            $this->Flash->success(__('The pessoas associaco has been deleted.'));
        } else {
            $this->Flash->error(__('The pessoas associaco could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
