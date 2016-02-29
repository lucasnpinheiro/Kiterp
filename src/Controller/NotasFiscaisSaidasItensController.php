<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NotasFiscaisSaidasItens Controller
 *
 * @property \App\Model\Table\NotasFiscaisSaidasItensTable $NotasFiscaisSaidasItens
 */
class NotasFiscaisSaidasItensController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['NotasFiscaisSaidas', 'Produtos', 'Ncms']
        ];
        $notasFiscaisSaidasItens = $this->paginate($this->NotasFiscaisSaidasItens);

        $this->set(compact('notasFiscaisSaidasItens'));
        $this->set('_serialize', ['notasFiscaisSaidasItens']);
    }

    /**
     * View method
     *
     * @param string|null $id Notas Fiscais Saidas Iten id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notasFiscaisSaidasIten = $this->NotasFiscaisSaidasItens->get($id, [
            'contain' => ['NotasFiscaisSaidas', 'Produtos', 'Ncms']
        ]);

        $this->set('notasFiscaisSaidasIten', $notasFiscaisSaidasIten);
        $this->set('_serialize', ['notasFiscaisSaidasIten']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notasFiscaisSaidasIten = $this->NotasFiscaisSaidasItens->newEntity();
        if ($this->request->is('post')) {
            $notasFiscaisSaidasIten = $this->NotasFiscaisSaidasItens->patchEntity($notasFiscaisSaidasIten, $this->request->data);
            if ($this->NotasFiscaisSaidasItens->save($notasFiscaisSaidasIten)) {
                $this->Flash->success(__('The notas fiscais saidas iten has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notas fiscais saidas iten could not be saved. Please, try again.'));
            }
        }
        $notasFiscaisSaidas = $this->NotasFiscaisSaidasItens->NotasFiscaisSaidas->find('list', ['limit' => 200]);
        $produtos = $this->NotasFiscaisSaidasItens->Produtos->find('list', ['limit' => 200]);
        $ncms = $this->NotasFiscaisSaidasItens->Ncms->find('list', ['limit' => 200]);
        $this->set(compact('notasFiscaisSaidasIten', 'notasFiscaisSaidas', 'produtos', 'ncms'));
        $this->set('_serialize', ['notasFiscaisSaidasIten']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Notas Fiscais Saidas Iten id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notasFiscaisSaidasIten = $this->NotasFiscaisSaidasItens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notasFiscaisSaidasIten = $this->NotasFiscaisSaidasItens->patchEntity($notasFiscaisSaidasIten, $this->request->data);
            if ($this->NotasFiscaisSaidasItens->save($notasFiscaisSaidasIten)) {
                $this->Flash->success(__('The notas fiscais saidas iten has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notas fiscais saidas iten could not be saved. Please, try again.'));
            }
        }
        $notasFiscaisSaidas = $this->NotasFiscaisSaidasItens->NotasFiscaisSaidas->find('list', ['limit' => 200]);
        $produtos = $this->NotasFiscaisSaidasItens->Produtos->find('list', ['limit' => 200]);
        $ncms = $this->NotasFiscaisSaidasItens->Ncms->find('list', ['limit' => 200]);
        $this->set(compact('notasFiscaisSaidasIten', 'notasFiscaisSaidas', 'produtos', 'ncms'));
        $this->set('_serialize', ['notasFiscaisSaidasIten']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notas Fiscais Saidas Iten id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notasFiscaisSaidasIten = $this->NotasFiscaisSaidasItens->get($id);
        if ($this->NotasFiscaisSaidasItens->delete($notasFiscaisSaidasIten)) {
            $this->Flash->success(__('The notas fiscais saidas iten has been deleted.'));
        } else {
            $this->Flash->error(__('The notas fiscais saidas iten could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
