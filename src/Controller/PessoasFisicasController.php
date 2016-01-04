<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PessoasFisicas Controller
 *
 * @property \App\Model\Table\PessoasFisicasTable $PessoasFisicas
 */
class PessoasFisicasController extends AppController
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
        $this->set('pessoasFisicas', $this->paginate($this->PessoasFisicas));
        $this->set('_serialize', ['pessoasFisicas']);
    }

    /**
     * View method
     *
     * @param string|null $id Pessoas Fisica id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pessoasFisica = $this->PessoasFisicas->get($id, [
            'contain' => ['Pessoas']
        ]);
        $this->set('pessoasFisica', $pessoasFisica);
        $this->set('_serialize', ['pessoasFisica']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pessoasFisica = $this->PessoasFisicas->newEntity();
        if ($this->request->is('post')) {
            $pessoasFisica = $this->PessoasFisicas->patchEntity($pessoasFisica, $this->request->data);
            if ($this->PessoasFisicas->save($pessoasFisica)) {
                $this->Flash->success(__('The pessoas fisica has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pessoas fisica could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->PessoasFisicas->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('pessoasFisica', 'pessoas'));
        $this->set('_serialize', ['pessoasFisica']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pessoas Fisica id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pessoasFisica = $this->PessoasFisicas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoasFisica = $this->PessoasFisicas->patchEntity($pessoasFisica, $this->request->data);
            if ($this->PessoasFisicas->save($pessoasFisica)) {
                $this->Flash->success(__('The pessoas fisica has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pessoas fisica could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->PessoasFisicas->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('pessoasFisica', 'pessoas'));
        $this->set('_serialize', ['pessoasFisica']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pessoas Fisica id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoasFisica = $this->PessoasFisicas->get($id);
        if ($this->PessoasFisicas->delete($pessoasFisica)) {
            $this->Flash->success(__('The pessoas fisica has been deleted.'));
        } else {
            $this->Flash->error(__('The pessoas fisica could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
