<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProdutosValores Controller
 *
 * @property \App\Model\Table\ProdutosValoresTable $ProdutosValores
 */
class ProdutosValoresController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ncms']
        ];
        $this->set('produtosValores', $this->paginate($this->ProdutosValores));
        $this->set('_serialize', ['produtosValores']);
    }

    /**
     * View method
     *
     * @param string|null $id Produtos Valore id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produtosValore = $this->ProdutosValores->get($id, [
            'contain' => ['Ncms']
        ]);
        $this->set('produtosValore', $produtosValore);
        $this->set('_serialize', ['produtosValore']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produtosValore = $this->ProdutosValores->newEntity();
        if ($this->request->is('post')) {
            $produtosValore = $this->ProdutosValores->patchEntity($produtosValore, $this->request->data);
            if ($this->ProdutosValores->save($produtosValore)) {
                $this->Flash->success(__('The produtos valore has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The produtos valore could not be saved. Please, try again.'));
            }
        }
        $ncms = $this->ProdutosValores->Ncms->find('list', ['limit' => 200]);
        $this->set(compact('produtosValore', 'ncms'));
        $this->set('_serialize', ['produtosValore']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Produtos Valore id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produtosValore = $this->ProdutosValores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produtosValore = $this->ProdutosValores->patchEntity($produtosValore, $this->request->data);
            if ($this->ProdutosValores->save($produtosValore)) {
                $this->Flash->success(__('The produtos valore has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The produtos valore could not be saved. Please, try again.'));
            }
        }
        $ncms = $this->ProdutosValores->Ncms->find('list', ['limit' => 200]);
        $this->set(compact('produtosValore', 'ncms'));
        $this->set('_serialize', ['produtosValore']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Produtos Valore id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produtosValore = $this->ProdutosValores->get($id);
        if ($this->ProdutosValores->delete($produtosValore)) {
            $this->Flash->success(__('The produtos valore has been deleted.'));
        } else {
            $this->Flash->error(__('The produtos valore could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
