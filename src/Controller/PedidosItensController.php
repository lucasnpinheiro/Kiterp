<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PedidosItens Controller
 *
 * @property \App\Model\Table\PedidosItensTable $PedidosItens
 */
class PedidosItensController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pedidos', 'Produtos']
        ];
        $this->set('pedidosItens', $this->paginate($this->PedidosItens));
        $this->set('_serialize', ['pedidosItens']);
    }

    /**
     * View method
     *
     * @param string|null $id Pedidos Iten id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedidosIten = $this->PedidosItens->get($id, [
            'contain' => ['Pedidos', 'Produtos']
        ]);
        $this->set('pedidosIten', $pedidosIten);
        $this->set('_serialize', ['pedidosIten']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pedidosIten = $this->PedidosItens->newEntity();
        if ($this->request->is('post')) {
            $pedidosIten = $this->PedidosItens->patchEntity($pedidosIten, $this->request->data);
            if ($this->PedidosItens->save($pedidosIten)) {
                $this->Flash->success(__('The pedidos iten has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pedidos iten could not be saved. Please, try again.'));
            }
        }
        $pedidos = $this->PedidosItens->Pedidos->find('list', ['limit' => 200]);
        $produtos = $this->PedidosItens->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('pedidosIten', 'pedidos', 'produtos'));
        $this->set('_serialize', ['pedidosIten']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedidos Iten id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pedidosIten = $this->PedidosItens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedidosIten = $this->PedidosItens->patchEntity($pedidosIten, $this->request->data);
            if ($this->PedidosItens->save($pedidosIten)) {
                $this->Flash->success(__('The pedidos iten has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pedidos iten could not be saved. Please, try again.'));
            }
        }
        $pedidos = $this->PedidosItens->Pedidos->find('list', ['limit' => 200]);
        $produtos = $this->PedidosItens->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('pedidosIten', 'pedidos', 'produtos'));
        $this->set('_serialize', ['pedidosIten']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedidos Iten id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pedidosIten = $this->PedidosItens->get($id);
        if ($this->PedidosItens->delete($pedidosIten)) {
            $this->Flash->success(__('The pedidos iten has been deleted.'));
        } else {
            $this->Flash->error(__('The pedidos iten could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
