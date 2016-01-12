<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Produtos Controller
 *
 * @property \App\Model\Table\ProdutosTable $Produtos
 */
class ProdutosController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Produtos');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Grupos']
        ];
        $this->set('produtos', $this->paginate($this->Produtos));
        $this->set('_serialize', ['produtos']);
    }

    /**
     * Consultar method
     *
     * @return void
     */
    public function consultar() {
        $this->viewBuilder()->layout('ajax');
        $retorno = [
            'cod' => 111,
            'msg' => 'Produto não encontrado',
            'individual' => 1
        ];
        $codigo = trim($this->request->data('codigo'));
        if (is_numeric($codigo)) {
            if (strlen($codigo) >= 13) {
                $find = $this->Produtos->find()->where(['Produtos.barra' => $codigo])->contain('ProdutosValores')->first();
            } else {
                $find = $this->Produtos->find()->where(['Produtos.codigo_interno' => $codigo])->contain('ProdutosValores')->first();
            }
        } else {
            $find = $this->Produtos->find()->where(['Produtos.nome RLIKE' => $codigo])->contain('ProdutosValores')->all();
            $retorno['individual'] = 0;
        }
        if (count($find) > 0) {
            $retorno = [
                'cod' => 999,
                'msg' => 'Produto localizado',
                'individual' => (string) $retorno['individual'],
                'produto' => $find->toArray()
            ];
        }
        $this->set('retorno', $retorno);
    }

    /**
     * View method
     *
     * @param string|null $id Produto id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $produto = $this->Produtos->get($id, [
            'contain' => ['Grupos', 'NotaFiscalEntradasItens', 'NotaFiscalSaidasItens', 'PedidosItens']
        ]);
        $this->set('produto', $produto);
        $this->set('_serialize', ['produto']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $produto = $this->Produtos->newEntity();
        if ($this->request->is('post')) {
            $produto = $this->Produtos->patchEntity($produto, $this->request->data);
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('The produto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The produto could not be saved. Please, try again.'));
            }
        }
        $grupos = $this->Produtos->Grupos->find('list', ['limit' => 200]);
        $this->set(compact('produto', 'grupos'));
        $this->set('_serialize', ['produto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Produto id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $produto = $this->Produtos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produto = $this->Produtos->patchEntity($produto, $this->request->data);
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('The produto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The produto could not be saved. Please, try again.'));
            }
        }
        $grupos = $this->Produtos->Grupos->find('list', ['limit' => 200]);
        $this->set(compact('produto', 'grupos'));
        $this->set('_serialize', ['produto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $produto = $this->Produtos->get($id);
        if ($this->Produtos->delete($produto)) {
            $this->Flash->success(__('The produto has been deleted.'));
        } else {
            $this->Flash->error(__('The produto could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
