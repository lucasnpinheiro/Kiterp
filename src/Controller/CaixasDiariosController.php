<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * CaixasDiarios Controller
 *
 * @property \App\Model\Table\CaixasDiariosTable $CaixasDiarios
 */
class CaixasDiariosController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Caixa Diario');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {

        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query))
                ->where(['CaixasDiarios.status !=' => 9])
                ->contain(['Pessoas', 'Terminais'])
                ->order(['CaixasDiarios.status' => 'desc', 'CaixasDiarios.created' => 'desc']);
        $this->set('caixasDiarios', $this->paginate($query));
        $this->set('_serialize', ['caixasDiarios']);
        $this->loadModel('Pessoas');
        $this->loadModel('Terminais');
        $vendedor = $this->Pessoas->find('list')->contain(['PessoasAssociacoes' => function($q) {
                return $q->where(['PessoasAssociacoes.tipo_associacao' => 4]);
            }]);
                $terminais = $this->Terminais->find('list');
                $this->set(compact('vendedor', 'terminais'));
                $this->set('_serialize', ['caixasDiario']);
            }

            /**
             * View method
             *
             * @param string|null $id Caixas Diario id.
             * @return void
             * @throws \Cake\Network\Exception\NotFoundException When record not found.
             */
            public function view($id = null) {
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
            public function add() {
                $caixasDiario = $this->CaixasDiarios->newEntity();
                if ($this->request->is('post')) {
                    //$this->request->data['data'] = implode('-', array_reverse(explode('/', $this->request->data('data'))));
                    $find = $this->CaixasDiarios->find()->where(['pessoa_id' => $this->request->data('pessoa_id'), 'terminal_id' => $this->request->data('terminal_id'), 'status' => 1])->first();
                    if (empty($find)) {
                        $caixasDiario = $this->CaixasDiarios->patchEntity($caixasDiario, $this->request->data);
                        if ($this->CaixasDiarios->save($caixasDiario)) {
                            $this->Flash->success(__('Registro Salvo com Sucesso.'));
                            return $this->redirect(['action' => 'index']);
                        } else {
                            $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
                        }
                    } else {
                        $this->Flash->error(__('Erro ao Salvar o Registro. Já existe para este Terminal e Operador um Caixa em Aberto.'));
                    }
                }
                $this->loadModel('Pessoas');
                $this->loadModel('Terminais');
                $vendedor = $this->Pessoas->find('list')->contain(['PessoasAssociacoes' => function($q) {
                        return $q->where(['PessoasAssociacoes.tipo_associacao' => 4]);
                    }]);
                        $terminais = $this->Terminais->find('list');
                        $this->set(compact('caixasDiario', 'vendedor', 'terminais'));
                        $this->set('_serialize', ['caixasDiario']);
                    }

                    /**
                     * Edit method
                     *
                     * @param string|null $id Caixas Diario id.
                     * @return void Redirects on successful edit, renders view otherwise.
                     * @throws \Cake\Network\Exception\NotFoundException When record not found.
                     */
                    public function edit($id = null) {
                        $caixasDiario = $this->CaixasDiarios->get($id, [
                            'contain' => ['Pessoas']
                        ]);
                        if ($this->request->is(['patch', 'post', 'put'])) {
                            //$this->request->data['data'] = implode('-', array_reverse(explode('/', $this->request->data('data'))));
                            $find = $this->CaixasDiarios->find()->where(['pessoa_id' => $this->request->data('pessoa_id'), 'terminal_id' => $this->request->data('terminal_id'), 'status' => 1])->first();
                            if (empty($find) OR $find->id == $id) {
                                $caixasDiario = $this->CaixasDiarios->patchEntity($caixasDiario, $this->request->data);
                                if ($this->CaixasDiarios->save($caixasDiario)) {
                                    $this->Flash->success(__('Registro Salvo com Sucesso.'));
                                    return $this->redirect(['action' => 'index']);
                                } else {
                                    $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
                                }
                            } else {
                                $this->Flash->error(__('Erro ao Salvar o Registro. Já existe para este Terminal e Operador um Caixa em Aberto.'));
                            }
                        }
                        $this->loadModel('Pessoas');
                        $this->loadModel('Terminais');
                        $vendedor = $this->Pessoas->find('list')->contain(['PessoasAssociacoes' => function($q) {
                                return $q->where(['PessoasAssociacoes.tipo_associacao' => 4]);
                            }]);
                                $terminais = $this->Terminais->find('list');
                                $this->set(compact('caixasDiario', 'vendedor', 'terminais'));
                                $this->set('_serialize', ['caixasDiario']);
                            }

                            /**
                             * Delete method
                             *
                             * @param string|null $id Caixas Diario id.
                             * @return \Cake\Network\Response|null Redirects to index.
                             * @throws \Cake\Network\Exception\NotFoundException When record not found.
                             */
                            public function delete($id = null) {
                                $this->request->allowMethod(['post', 'delete']);
                                $caixasDiario = $this->CaixasDiarios->get($id);
                                $caixasDiario->status = 9;
                                if ($this->CaixasDiarios->save($caixasDiario)) {
                                    $this->Flash->success(__('Registro Excluido com Sucesso.'));
                                } else {
                                    $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
                                }
                                return $this->redirect(['action' => 'index']);
                            }

                        }
                        