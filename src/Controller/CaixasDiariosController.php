<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * CaixasDiarios Controller
 *
 * @property \App\Model\Table\CaixasDiariosTable $CaixasDiarios
 */
class CaixasDiariosController extends AppController
{

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null)
    {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Caixa Diario');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query))->contain('Operadores')->order('encerrado')->order('data_abertura','desc')->order('data_encerramento','desc');
        $this->set('caixasDiarios', $this->paginate($query));
        $this->set('_serialize', ['caixasDiarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Caixas Diario id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $caixasDiario = $this->CaixasDiarios->get($id, [
            'contain' => []
        ]);
        $this->set('caixasDiario', $caixasDiario);
        $this->set('_serialize', ['caixasDiario']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $caixasDiario = $this->CaixasDiarios->newEntity();
        if ($this->request->is('post'))
        {
            $caixasDiario = $this->CaixasDiarios->patchEntity($caixasDiario, $this->request->data);
            if ($this->CaixasDiarios->save($caixasDiario))
            {
                $caixasDiario->numero_caixa = $caixasDiario->id;
                $caixasDiario->data_abertura = date('Y-m-d H:i:s');
                $this->CaixasDiarios->save($caixasDiario);
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        } else
        {
            $find = $this->CaixasDiarios->find()->where(['encerrado' => '0'])->all();
            if(count($find) > 0){
                $this->Flash->error(__('Já existe caixa em aberto.'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->loadModel('Pessoas');
        $vendedor = $this->Pessoas->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 4]);
        $this->set(compact('caixasDiario', 'vendedor'));
        $this->set('_serialize', ['caixasDiario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Caixas Diario id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $caixasDiario = $this->CaixasDiarios->get($id, [
            'contain' => ['Operadores']
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $caixasDiario = $this->CaixasDiarios->patchEntity($caixasDiario, $this->request->data);
            $caixasDiario->data_encerramento = date('Y-m-d H:i:s');
            if ($this->CaixasDiarios->save($caixasDiario))
            {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $this->set(compact('caixasDiario'));
        $this->set('_serialize', ['caixasDiario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Caixas Diario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $caixasDiario = $this->CaixasDiarios->get($id);
        if ($this->CaixasDiarios->delete($caixasDiario))
        {
            $this->Flash->success(__('Registro Excluido com Sucesso.'));
        } else
        {
            $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
