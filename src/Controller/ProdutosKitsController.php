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
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query));
        $this->set('produtosKits', $this->paginate($query));
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
                    $this->Flash->success(__('Registro Salvo com Sucesso.'));
                    return $this->redirect(['action' => 'index']);
                } else
                {
                    $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $empresas = $this->ProdutosKits->Empresas->find('list');
        $produtos = $this->ProdutosKits->Produtos->find('list');
        $kits = $this->ProdutosKits->Kits->find('list');
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
                    $this->Flash->success(__('Registro Salvo com Sucesso.'));
                    return $this->redirect(['action' => 'index']);
                } else
                {
                    $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $empresas = $this->ProdutosKits->Empresas->find('list');
        $produtos = $this->ProdutosKits->Produtos->find('list');
        $kits = $this->ProdutosKits->Kits->find('list');
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
            $this->Flash->success(__('Registro Excluido com Sucesso.'));
        } else
        {
            $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
