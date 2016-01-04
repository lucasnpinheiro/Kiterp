<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PedidosFormasPagamentos Controller
 *
 * @property \App\Model\Table\PedidosFormasPagamentosTable $PedidosFormasPagamentos
 */
class PedidosFormasPagamentosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pedidos', 'FormaPagamentos', 'FormasPagamentos']
        ];
        $this->set('pedidosFormasPagamentos', $this->paginate($this->PedidosFormasPagamentos));
        $this->set('_serialize', ['pedidosFormasPagamentos']);
    }

    /**
     * View method
     *
     * @param string|null $id Pedidos Formas Pagamento id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedidosFormasPagamento = $this->PedidosFormasPagamentos->get($id, [
            'contain' => ['Pedidos', 'FormaPagamentos', 'FormasPagamentos']
        ]);
        $this->set('pedidosFormasPagamento', $pedidosFormasPagamento);
        $this->set('_serialize', ['pedidosFormasPagamento']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pedidosFormasPagamento = $this->PedidosFormasPagamentos->newEntity();
        if ($this->request->is('post')) {
            $pedidosFormasPagamento = $this->PedidosFormasPagamentos->patchEntity($pedidosFormasPagamento, $this->request->data);
            if ($this->PedidosFormasPagamentos->save($pedidosFormasPagamento)) {
                $this->Flash->success(__('The pedidos formas pagamento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pedidos formas pagamento could not be saved. Please, try again.'));
            }
        }
        $pedidos = $this->PedidosFormasPagamentos->Pedidos->find('list', ['limit' => 200]);
        $formaPagamentos = $this->PedidosFormasPagamentos->FormaPagamentos->find('list', ['limit' => 200]);
        $formasPagamentos = $this->PedidosFormasPagamentos->FormasPagamentos->find('list', ['limit' => 200]);
        $this->set(compact('pedidosFormasPagamento', 'pedidos', 'formaPagamentos', 'formasPagamentos'));
        $this->set('_serialize', ['pedidosFormasPagamento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedidos Formas Pagamento id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pedidosFormasPagamento = $this->PedidosFormasPagamentos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedidosFormasPagamento = $this->PedidosFormasPagamentos->patchEntity($pedidosFormasPagamento, $this->request->data);
            if ($this->PedidosFormasPagamentos->save($pedidosFormasPagamento)) {
                $this->Flash->success(__('The pedidos formas pagamento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pedidos formas pagamento could not be saved. Please, try again.'));
            }
        }
        $pedidos = $this->PedidosFormasPagamentos->Pedidos->find('list', ['limit' => 200]);
        $formaPagamentos = $this->PedidosFormasPagamentos->FormaPagamentos->find('list', ['limit' => 200]);
        $formasPagamentos = $this->PedidosFormasPagamentos->FormasPagamentos->find('list', ['limit' => 200]);
        $this->set(compact('pedidosFormasPagamento', 'pedidos', 'formaPagamentos', 'formasPagamentos'));
        $this->set('_serialize', ['pedidosFormasPagamento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedidos Formas Pagamento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pedidosFormasPagamento = $this->PedidosFormasPagamentos->get($id);
        if ($this->PedidosFormasPagamentos->delete($pedidosFormasPagamento)) {
            $this->Flash->success(__('The pedidos formas pagamento has been deleted.'));
        } else {
            $this->Flash->error(__('The pedidos formas pagamento could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
