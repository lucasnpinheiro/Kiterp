<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PessoasJuridicas Controller
 *
 * @property \App\Model\Table\PessoasJuridicasTable $PessoasJuridicas
 */
class PessoasJuridicasController extends AppController
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
        $this->set('pessoasJuridicas', $this->paginate($this->PessoasJuridicas));
        $this->set('_serialize', ['pessoasJuridicas']);
    }

    /**
     * View method
     *
     * @param string|null $id Pessoas Juridica id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pessoasJuridica = $this->PessoasJuridicas->get($id, [
            'contain' => ['Pessoas']
        ]);
        $this->set('pessoasJuridica', $pessoasJuridica);
        $this->set('_serialize', ['pessoasJuridica']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pessoasJuridica = $this->PessoasJuridicas->newEntity();
        if ($this->request->is('post')) {
            $pessoasJuridica = $this->PessoasJuridicas->patchEntity($pessoasJuridica, $this->request->data);
            if ($this->PessoasJuridicas->save($pessoasJuridica)) {
                $this->Flash->success(__('The pessoas juridica has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pessoas juridica could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->PessoasJuridicas->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('pessoasJuridica', 'pessoas'));
        $this->set('_serialize', ['pessoasJuridica']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pessoas Juridica id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pessoasJuridica = $this->PessoasJuridicas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoasJuridica = $this->PessoasJuridicas->patchEntity($pessoasJuridica, $this->request->data);
            if ($this->PessoasJuridicas->save($pessoasJuridica)) {
                $this->Flash->success(__('The pessoas juridica has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pessoas juridica could not be saved. Please, try again.'));
            }
        }
        $pessoas = $this->PessoasJuridicas->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('pessoasJuridica', 'pessoas'));
        $this->set('_serialize', ['pessoasJuridica']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pessoas Juridica id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoasJuridica = $this->PessoasJuridicas->get($id);
        if ($this->PessoasJuridicas->delete($pessoasJuridica)) {
            $this->Flash->success(__('The pessoas juridica has been deleted.'));
        } else {
            $this->Flash->error(__('The pessoas juridica could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
