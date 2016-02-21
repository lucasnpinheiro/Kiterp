<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * ContasReceber Controller
 *
 * @property \App\Model\Table\ContasReceberTable $ContasReceber
 */
class ContasReceberController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Contas a Receber');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        if (!empty($this->request->query('data_vencimento'))) {
            $this->request->query['data_vencimento'] = implode('-', array_reverse(explode('/', $this->request->query('data_vencimento'))));
        }
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query))->order(['ContasReceber.status' => 'asc', 'ContasReceber.data_vencimento' => 'desc'])->contain(['FormasPagamentos', 'Empresas' => function($q) {
                return $q->contain('Pessoas');
            }, 'Pessoas', 'Bancos']);
        $this->set('contasReceber', $this->paginate($query));
        $this->set('_serialize', ['contasReceber']);
        $pessoas = $this->ContasReceber->Pessoas->find('list')->contain(['PessoasAssociacoes' => function($q) {
                return $q->where(['tipo_associacao' => 2, 'status' => 1]);
            }]);
                $bancos = $this->ContasReceber->Bancos->find('list');
                $this->set(compact(['pessoas', 'bancos']));
            }

            /**
             * View method
             *
             * @param string|null $id Contas Receber id.
             * @return void
             * @throws \Cake\Network\Exception\NotFoundException When record not found.
             */
            public function view($id = null) {
                $contasReceber = $this->ContasReceber->get($id, [
                    'contain' => ['Empresas', 'Pessoas', 'Bancos', 'Tradutoras']
                ]);
                $this->set('contasReceber', $contasReceber);
                $this->set('_serialize', ['contasReceber']);
            }

            /**
             * Add method
             *
             * @return void Redirects on successful add, renders view otherwise.
             */
            public function add() {
                $contasReceber = $this->ContasReceber->newEntity();
                if ($this->request->is('post')) {
                    $contasReceber = $this->ContasReceber->patchEntity($contasReceber, $this->request->data);
                    if ($this->ContasReceber->save($contasReceber)) {
                        $this->Flash->success(__('Registro Salvo com Sucesso.'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
                    }
                }
                $pessoas = $this->ContasReceber->Pessoas->find('list')->contain(['PessoasAssociacoes' => function($q) {
                        return $q->where(['tipo_associacao' => 2, 'status' => 1]);
                    }]);
                        $bancos = $this->ContasReceber->Bancos->find('list');
                        $formasPagamentos = $this->ContasReceber->FormasPagamentos->find('list');
                        $tradutoras = $this->ContasReceber->Tradutoras->find('list');
                        $this->set(compact('contasReceber', 'empresas', 'pessoas', 'bancos', 'formasPagamentos', 'tradutoras'));
                        $this->set('_serialize', ['contasReceber']);
                    }

                    /**
                     * Edit method
                     *
                     * @param string|null $id Contas Receber id.
                     * @return void Redirects on successful edit, renders view otherwise.
                     * @throws \Cake\Network\Exception\NotFoundException When record not found.
                     */
                    public function edit($id = null) {
                        $contasReceber = $this->ContasReceber->get($id, [
                            'contain' => []
                        ]);
                        if ($this->request->is(['patch', 'post', 'put'])) {
                            $contasReceber = $this->ContasReceber->patchEntity($contasReceber, $this->request->data);
                            if ($this->ContasReceber->save($contasReceber)) {
                                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                                return $this->redirect(['action' => 'index']);
                            } else {
                                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
                            }
                        }
                        $pessoas = $this->ContasReceber->Pessoas->find('list')->contain(['PessoasAssociacoes' => function($q) {
                                return $q->where(['tipo_associacao' => 2, 'status' => 1]);
                            }]);
                                $bancos = $this->ContasReceber->Bancos->find('list');
                                $formasPagamentos = $this->ContasReceber->FormasPagamentos->find('list');
                                $tradutoras = $this->ContasReceber->Tradutoras->find('list');
                                $this->set(compact('contasReceber', 'empresas', 'pessoas', 'bancos', 'formasPagamentos', 'tradutoras'));
                                $this->set('_serialize', ['contasReceber']);
                            }

                            /**
                             * Delete method
                             *
                             * @param string|null $id Contas Receber id.
                             * @return \Cake\Network\Response|null Redirects to index.
                             * @throws \Cake\Network\Exception\NotFoundException When record not found.
                             */
                            public function delete($id = null) {
                                $this->request->allowMethod(['post', 'delete']);
                                $contasReceber = $this->ContasReceber->get($id);
                                $contasReceber->status = 3;
                                if ($this->ContasReceber->save($contasReceber)) {
                                    $this->Flash->success(__('Registro Excluido com Sucesso.'));
                                } else {
                                    $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
                                }
                                return $this->redirect($this->referer());
                            }

                        }
                        