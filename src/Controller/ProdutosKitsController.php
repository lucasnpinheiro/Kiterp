<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * ProdutosKits Controller
 *
 * @property \App\Model\Table\ProdutosKitsTable $ProdutosKits
 */
class ProdutosKitsController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Kits');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Empresas', 'Produtos', 'Kits']
        ];
        $this->set('produtosKits', $this->paginate($this->ProdutosKits));
        $this->set('_serialize', ['produtosKits']);
    }

    /**
     * View method
     *
     * @param string|null $id Produtos Kit id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $produtosKit = $this->ProdutosKits->get($id, [
            'contain' => ['Empresas', 'Produtos', 'Kits']
        ]);
        $this->set('produtosKit', $produtosKit);
        $this->set('_serialize', ['produtosKit']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $produtosKit = $this->ProdutosKits->newEntity();
        if ($this->request->is('post')) {
            $produtosKit = $this->ProdutosKits->patchEntity($produtosKit, $this->request->data);
            if ($this->ProdutosKits->save($produtosKit)) {
                $this->Flash->success(__('The produtos kit has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The produtos kit could not be saved. Please, try again.'));
            }
        }
        $empresas = $this->ProdutosKits->Empresas->find('list', ['limit' => 200]);
        $produtos = $this->ProdutosKits->Produtos->find('list', ['limit' => 200]);
        $kits = $this->ProdutosKits->Kits->find('list', ['limit' => 200]);
        $this->set(compact('produtosKit', 'empresas', 'produtos', 'kits'));
        $this->set('_serialize', ['produtosKit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Produtos Kit id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $produtosKit = $this->ProdutosKits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produtosKit = $this->ProdutosKits->patchEntity($produtosKit, $this->request->data);
            if ($this->ProdutosKits->save($produtosKit)) {
                $this->Flash->success(__('The produtos kit has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The produtos kit could not be saved. Please, try again.'));
            }
        }
        $empresas = $this->ProdutosKits->Empresas->find('list', ['limit' => 200]);
        $produtos = $this->ProdutosKits->Produtos->find('list', ['limit' => 200]);
        $kits = $this->ProdutosKits->Kits->find('list', ['limit' => 200]);
        $this->set(compact('produtosKit', 'empresas', 'produtos', 'kits'));
        $this->set('_serialize', ['produtosKit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Produtos Kit id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $produtosKit = $this->ProdutosKits->get($id);
        if ($this->ProdutosKits->delete($produtosKit)) {
            $this->Flash->success(__('The produtos kit has been deleted.'));
        } else {
            $this->Flash->error(__('The produtos kit could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
