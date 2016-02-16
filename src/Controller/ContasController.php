<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Contas Controller
 *
 * @property \App\Model\Table\ContasTable $Contas
 */
class ContasController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Contas');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query))->order(['Contas.tradutora' => 'ASC'])->contain('SubContas');
        $this->set('contas', $this->paginate($query));
        $this->set('_serialize', ['contas']);
        $this->set('tipo', $this->request->query('tipo') == 1 ? 'Credito' : 'Debito');
    }

    /**
     * View method
     *
     * @param string|null $id Conta id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $conta = $this->Contas->get($id, [
            'contain' => []
        ]);
        $this->set('conta', $conta);
        $this->set('_serialize', ['conta']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $conta = $this->Contas->newEntity();
        if ($this->request->is('post')) {
            $conta = $this->Contas->patchEntity($conta, $this->request->data);
            $Contas = \Cake\ORM\TableRegistry::get('Contas');
            $conta->tradutora = $conta->codigo;
            if ($conta->id_pai > 0) {
                $find = $Contas->get($conta->id_pai);
                $conta->tradutora = $find->codigo . $conta->codigo;
            }
            $find = $Contas->find()->where(['tradutora' => $conta->tradutora])->first();
            if (empty($find)) {
                if ($this->Contas->save($conta)) {
                    $this->Flash->success(__('Registro Salvo com Sucesso.'));
                    return $this->redirect(['action' => 'index', '?' => ['tipo' => $this->request->query('tipo')]]);
                } else {
                    $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
                }
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Código da Conta com a Sub-Conta informada já existe.'));
            }
        }
        $this->set(compact('conta'));
        $this->set('contas', $this->Contas->find()->select(['id', 'nome', 'tradutora'])->where(['tipo' => $this->request->query('tipo'), 'id_pai' => '0'])->order(['id_pai' => 'asc'])->all());
        $this->set('_serialize', ['conta']);
        $this->set('tipo', $this->request->query('tipo') == 1 ? 'Credito' : 'Debito');
    }

    /**
     * Edit method
     *
     * @param string|null $id Conta id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $conta = $this->Contas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $conta = $this->Contas->patchEntity($conta, $this->request->data);
            if ($this->Contas->save($conta)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index', '?' => ['tipo' => $this->request->query('tipo')]]);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $this->set(compact('conta'));
        $this->set('_serialize', ['conta']);
        $this->set('tipo', $this->request->query('tipo') == 1 ? 'Credito' : 'Debito');
    }

    /**
     * Delete method
     *
     * @param string|null $id Conta id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $conta = $this->Contas->get($id);
        if ($this->Contas->delete($conta)) {
            $this->Flash->success(__('Registro Excluido com Sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
        }
        $this->set('tipo', $this->request->query('tipo') == 1 ? 'Credito' : 'Debito');
        return $this->redirect(['action' => 'index', '?' => ['tipo' => $this->request->query('tipo')]]);
    }

}
