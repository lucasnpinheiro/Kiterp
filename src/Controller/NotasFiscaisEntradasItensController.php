<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NotasFiscaisEntradasItens Controller
 *
 * @property \App\Model\Table\NotasFiscaisEntradasItensTable $NotasFiscaisEntradasItens
 */
class NotasFiscaisEntradasItensController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['NotasFiscaisEntradas', 'Produtos']
        ];
        $notasFiscaisEntradasItens = $this->paginate($this->NotasFiscaisEntradasItens);

        $this->set(compact('notasFiscaisEntradasItens'));
        $this->set('_serialize', ['notasFiscaisEntradasItens']);
    }

    /**
     * View method
     *
     * @param string|null $id Notas Fiscais Entradas Iten id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notasFiscaisEntradasIten = $this->NotasFiscaisEntradasItens->get($id, [
            'contain' => ['NotasFiscaisEntradas', 'Produtos']
        ]);

        $this->set('notasFiscaisEntradasIten', $notasFiscaisEntradasIten);
        $this->set('_serialize', ['notasFiscaisEntradasIten']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notasFiscaisEntradasIten = $this->NotasFiscaisEntradasItens->newEntity();
        if ($this->request->is('post')) {
            $notasFiscaisEntradasIten = $this->NotasFiscaisEntradasItens->patchEntity($notasFiscaisEntradasIten, $this->request->data);
            if ($this->NotasFiscaisEntradasItens->save($notasFiscaisEntradasIten)) {
                $this->Flash->success(__('The notas fiscais entradas iten has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notas fiscais entradas iten could not be saved. Please, try again.'));
            }
        }
        $notasFiscaisEntradas = $this->NotasFiscaisEntradasItens->NotasFiscaisEntradas->find('list', ['limit' => 200]);
        $produtos = $this->NotasFiscaisEntradasItens->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('notasFiscaisEntradasIten', 'notasFiscaisEntradas', 'produtos'));
        $this->set('_serialize', ['notasFiscaisEntradasIten']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Notas Fiscais Entradas Iten id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notasFiscaisEntradasIten = $this->NotasFiscaisEntradasItens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notasFiscaisEntradasIten = $this->NotasFiscaisEntradasItens->patchEntity($notasFiscaisEntradasIten, $this->request->data);
            if ($this->NotasFiscaisEntradasItens->save($notasFiscaisEntradasIten)) {
                $this->Flash->success(__('The notas fiscais entradas iten has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notas fiscais entradas iten could not be saved. Please, try again.'));
            }
        }
        $notasFiscaisEntradas = $this->NotasFiscaisEntradasItens->NotasFiscaisEntradas->find('list', ['limit' => 200]);
        $produtos = $this->NotasFiscaisEntradasItens->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('notasFiscaisEntradasIten', 'notasFiscaisEntradas', 'produtos'));
        $this->set('_serialize', ['notasFiscaisEntradasIten']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notas Fiscais Entradas Iten id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notasFiscaisEntradasIten = $this->NotasFiscaisEntradasItens->get($id);
        if ($this->NotasFiscaisEntradasItens->delete($notasFiscaisEntradasIten)) {
            $this->Flash->success(__('The notas fiscais entradas iten has been deleted.'));
        } else {
            $this->Flash->error(__('The notas fiscais entradas iten could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
