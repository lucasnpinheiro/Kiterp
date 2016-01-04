<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PessoasContatos Controller
 *
 * @property \App\Model\Table\PessoasContatosTable $PessoasContatos
 */
class PessoasContatosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pessoas', 'TipoContatos']
        ];
        $this->set('pessoasContatos', $this->paginate($this->PessoasContatos));
        $this->set('_serialize', ['pessoasContatos']);
    }

    /**
     * View method
     *
     * @param string|null $id Pessoas Contato id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pessoasContato = $this->PessoasContatos->get($id, [
            'contain' => ['Pessoas', 'TipoContatos']
        ]);
        $this->set('pessoasContato', $pessoasContato);
        $this->set('_serialize', ['pessoasContato']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pessoasContato = $this->PessoasContatos->newEntity();
        if ($this->request->is('post')) {
            $pessoasContato = $this->PessoasContatos->patchEntity($pessoasContato, $this->request->data);
            if ($this->PessoasContatos->save($pessoasContato)) {
                $this->Flash->success(__('The pessoas contato has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pessoas contato could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->PessoasContatos->Pessoas->find('list', ['limit' => 200]);
        $tipoContatos = $this->PessoasContatos->TipoContatos->find('list', ['limit' => 200]);
        $this->set(compact('pessoasContato', 'pessoas', 'tipoContatos'));
        $this->set('_serialize', ['pessoasContato']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pessoas Contato id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pessoasContato = $this->PessoasContatos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoasContato = $this->PessoasContatos->patchEntity($pessoasContato, $this->request->data);
            if ($this->PessoasContatos->save($pessoasContato)) {
                $this->Flash->success(__('The pessoas contato has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pessoas contato could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->PessoasContatos->Pessoas->find('list', ['limit' => 200]);
        $tipoContatos = $this->PessoasContatos->TipoContatos->find('list', ['limit' => 200]);
        $this->set(compact('pessoasContato', 'pessoas', 'tipoContatos'));
        $this->set('_serialize', ['pessoasContato']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pessoas Contato id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoasContato = $this->PessoasContatos->get($id);
        if ($this->PessoasContatos->delete($pessoasContato)) {
            $this->Flash->success(__('The pessoas contato has been deleted.'));
        } else {
            $this->Flash->error(__('The pessoas contato could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
