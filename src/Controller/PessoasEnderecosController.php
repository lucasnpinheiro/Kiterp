<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PessoasEnderecos Controller
 *
 * @property \App\Model\Table\PessoasEnderecosTable $PessoasEnderecos
 */
class PessoasEnderecosController extends AppController
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
        $this->set('pessoasEnderecos', $this->paginate($this->PessoasEnderecos));
        $this->set('_serialize', ['pessoasEnderecos']);
    }

    /**
     * View method
     *
     * @param string|null $id Pessoas Endereco id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pessoasEndereco = $this->PessoasEnderecos->get($id, [
            'contain' => ['Pessoas']
        ]);
        $this->set('pessoasEndereco', $pessoasEndereco);
        $this->set('_serialize', ['pessoasEndereco']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pessoasEndereco = $this->PessoasEnderecos->newEntity();
        if ($this->request->is('post')) {
            $pessoasEndereco = $this->PessoasEnderecos->patchEntity($pessoasEndereco, $this->request->data);
            if ($this->PessoasEnderecos->save($pessoasEndereco)) {
                $this->Flash->success(__('The pessoas endereco has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pessoas endereco could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->PessoasEnderecos->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('pessoasEndereco', 'pessoas'));
        $this->set('_serialize', ['pessoasEndereco']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pessoas Endereco id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pessoasEndereco = $this->PessoasEnderecos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoasEndereco = $this->PessoasEnderecos->patchEntity($pessoasEndereco, $this->request->data);
            if ($this->PessoasEnderecos->save($pessoasEndereco)) {
                $this->Flash->success(__('The pessoas endereco has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pessoas endereco could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->PessoasEnderecos->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('pessoasEndereco', 'pessoas'));
        $this->set('_serialize', ['pessoasEndereco']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pessoas Endereco id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoasEndereco = $this->PessoasEnderecos->get($id);
        if ($this->PessoasEnderecos->delete($pessoasEndereco)) {
            $this->Flash->success(__('The pessoas endereco has been deleted.'));
        } else {
            $this->Flash->error(__('The pessoas endereco could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
