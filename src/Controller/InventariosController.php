<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inventarios Controller
 *
 * @property \App\Model\Table\InventariosTable $Inventarios
 */
class InventariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Produtos']
        ];
        $inventarios = $this->paginate($this->Inventarios);

        $this->set(compact('inventarios'));
        $this->set('_serialize', ['inventarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Inventario id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inventario = $this->Inventarios->get($id, [
            'contain' => ['Produtos']
        ]);

        $this->set('inventario', $inventario);
        $this->set('_serialize', ['inventario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inventario = $this->Inventarios->newEntity();
        if ($this->request->is('post')) {
            $inventario = $this->Inventarios->patchEntity($inventario, $this->request->data);
            if ($this->Inventarios->save($inventario)) {
                $this->Flash->success(__('The inventario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inventario could not be saved. Please, try again.'));
            }
        }
        $produtos = $this->Inventarios->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('inventario', 'produtos'));
        $this->set('_serialize', ['inventario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inventario id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inventario = $this->Inventarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inventario = $this->Inventarios->patchEntity($inventario, $this->request->data);
            if ($this->Inventarios->save($inventario)) {
                $this->Flash->success(__('The inventario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inventario could not be saved. Please, try again.'));
            }
        }
        $produtos = $this->Inventarios->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('inventario', 'produtos'));
        $this->set('_serialize', ['inventario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inventario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inventario = $this->Inventarios->get($id);
        if ($this->Inventarios->delete($inventario)) {
            $this->Flash->success(__('The inventario has been deleted.'));
        } else {
            $this->Flash->error(__('The inventario could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
