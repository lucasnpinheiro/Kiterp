<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Pedidos Controller
 *
 * @property \App\Model\Table\PedidosTable $Pedidos
 */
class PedidosController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Pedidos');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query))->contain(['Pessoas', 'Vendedores', 'Empresas' => function($q) {
                        return $q->contain('Pessoas')->autoFields(true);
                    }])->order(['Pedidos.id' => 'desc']);
        $this->loadModel('Pessoas');
        $this->loadModel('Empresas');
        $empresas = $this->Empresas->find('list');
        $pessoas = $this->Pessoas->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 2]);
        $vendedors = $this->Pessoas->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 4]);
        $this->set(compact('empresas', 'pessoas', 'vendedors'));
        $this->set('pedidos', $this->paginate($query));
        $this->set('_serialize', ['pedidos']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function bloqueados() {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query))->where(['Pedidos.status' => 7])->contain(['Pessoas', 'Vendedores', 'Empresas' => function($q) {
                return $q->contain('Pessoas')->autoFields(true);
            }]);

        $this->loadModel('Pessoas');
        $this->loadModel('Empresas');
        $empresas = $this->Empresas->find('list');
        $pessoas = $this->Pessoas->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 2]);
        $vendedors = $this->Pessoas->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 4]);
        $this->set(compact('empresas', 'pessoas', 'vendedors'));
        $this->set('pedidos', $this->paginate($query));
        $this->set('_serialize', ['pedidos']);
    }

    public function gerar() {
        $dados = [
            'id' => $this->request->data('pedido_id'),
            'empresa_id' => $this->request->data('empresa_id'),
            'vendedor_id' => $this->request->data('vendedor_id'),
            'pessoa_id' => $this->request->data('cliente_id'),
            'condicao_pagamento_id' => $this->request->data('condicao_pagamento_id'),
            'data_pedido' => date('Y-m-d H:i:s'),
            'transportadora_id' => 1,
            'status' => 1
        ];
        if ($dados['id'] == '') {
            unset($dados['id']);
        }
        $pedido = $this->Pedidos->newEntity();
        foreach ($dados as $key => $value) {
            $pedido{$key} = $value;
        }
        $retorno = [
            'cod' => 111,
            'id' => 0,
        ];
        if ($this->Pedidos->save($pedido)) {
            $retorno = [
                'cod' => 999,
                'id' => $pedido->id,
            ];
        }
        echo json_encode($retorno);
        exit;
    }

    public function item() {
        $dados = [
            'pedido_id' => $this->request->data('pedido_id'),
            'produto_id' => $this->request->data('produto_id'),
            'qtde' => (float) $this->request->data('quantidade'),
            'venda' => (float) $this->request->data('valor_unitario'),
            'total' => ((float) $this->request->data('quantidade') * (float) $this->request->data('valor_unitario')),
        ];

        $this->loadModel('PedidosItens');

        $itens = $this->PedidosItens->newEntity();
        foreach ($dados as $key => $value) {
            $itens->{$key} = $value;
        }
        $retorno = [
            'cod' => 111,
        ];
        if ($this->PedidosItens->save($itens)) {
            $retorno = [
                'cod' => 999,
                'id' => $itens->id,
            ];
        }
        $sql = 'UPDATE pedidos 
                SET 
                    data_pedido = "' . date('Y-m-d H:i:s') . '",
                    valor_total = (SELECT 
                            COALESCE(SUM(qtde * venda), 0) AS total
                        FROM
                            pedidos_itens
                        WHERE
                            pedido_id = ' . $this->request->data('pedido_id') . ')
                WHERE
                    id = ' . $this->request->data('pedido_id');

        $conn = \Cake\Datasource\ConnectionManager::get('default');
        $conn->execute($sql);

        $pedido = $this->Pedidos->get($this->request->data('pedido_id'), []);
        $retorno['total'] = $pedido->valor_total;
        echo json_encode($retorno);
        exit;
    }

    public function itemRemover() {
        $this->loadModel('PedidosItens');

        $itens = $this->PedidosItens->get($this->request->data('id'));
        $retorno = [
            'cod' => 111,
        ];
        if ($this->PedidosItens->delete($itens)) {
            $retorno = [
                'cod' => (999),
            ];
        }
        $sql = 'UPDATE pedidos 
                SET 
                    data_pedido = "' . date('Y-m-d H:i:s') . '",
                    valor_total = (SELECT 
                            COALESCE(SUM(qtde * venda), 0) AS total
                        FROM
                            pedidos_itens
                        WHERE
                            pedido_id = ' . $this->request->data('pedido_id') . ')
                WHERE
                    id = ' . $this->request->data('pedido_id');

        $conn = \Cake\Datasource\ConnectionManager::get('default');
        $conn->execute($sql);

        $pedido = $this->Pedidos->get($this->request->data('pedido_id'), []);
        $retorno['total'] = $pedido->valor_total;
        echo json_encode($retorno);
        exit;
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function receber($id = null) {
        $pedido = $this->Pedidos->get($id, [
            'contain' => ['Empresas' => function($q) {
                    return $q->contain('Pessoas')->autoFields(true);
                }, 'Pessoas', 'CondicoesPagamentos', 'Vendedores', 'Transportadoras', 'PedidosItens' => function($q) {
                    return $q->contain('Produtos')->autoFields(true);
                }]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            foreach ($this->request->data['parcelas'] as $key => $value) {
                $this->request->data['parcelas'][$key]['data'] = implode('-', array_reverse(explode('/', $value['data'])));
            }
            $this->request->data['parcelas'] = json_encode($this->request->data['parcelas']);
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->data);
            if ($this->Pedidos->save($pedido)) {
                $numero_documento = $pedido->id;
                $this->loadModel('ContasReceber');
                $this->loadModel('Bancos');
                $this->loadModel('FormasPagamentos');
                $this->loadModel('FormasPagamentos');
                $banco = $this->Bancos->find()->first();
                $parcelas = json_decode($this->request->data('parcelas'), true);

                if (!empty($this->request->data('opcoes.1.valor'))) {
                    $_parcela = $this->getParcelas($parcelas);
                    $formasPagamentos = $this->FormasPagamentos->find()->where(['grupo' => 1])->first();
                    $valor = (float) str_replace(',', '.', str_replace('.', '', $this->request->data('opcoes.1.valor')));
                    $contasReceber = $this->ContasReceber->newEntity();
                    $contasReceber->empresa_id = $pedido->empresa_id;
                    $contasReceber->numero_documento = $numero_documento;
                    $contasReceber->data_vencimento = date('Y-m-d');
                    $contasReceber->valor_documento = $valor;
                    $contasReceber->pessoa_id = $pedido->pessoa_id;
                    $contasReceber->banco_id = $banco->id;
                    $contasReceber->tradutora_id = 2;
                    $contasReceber->status = 2;
                    $contasReceber->data_recebimento = date('Y-m-d');
                    $contasReceber->valor_recebimento = $valor;
                    $contasReceber->numero_pedido = $pedido->id;
                    $contasReceber->valor_desconto = 0;
                    $contasReceber->valor_liquido = $valor;
                    $contasReceber->formas_pagamento_id = $formasPagamentos->id;
                    $contasReceber->parcelas = $_parcela['titulo'];
                    $this->ContasReceber->save($contasReceber);
                    array_shift($parcelas);
                }

                if (!empty($this->request->data('opcoes.2.valor'))) {
                    if (!empty($this->request->data('opcoes.2.tipo'))) {
                        $formasPagamentos = $this->FormasPagamentos->find()->where(['id' => (int) $this->request->data('opcoes.2.tipo')])->first();
                    } else {
                        $formasPagamentos = $this->FormasPagamentos->find()->where(['grupo' => 2])->first();
                    }
                    $valor = (float) str_replace(',', '.', str_replace('.', '', $this->request->data('opcoes.2.valor')));
                    $valor = $valor / (int) $this->request->data('opcoes.2.parcelas');
                    for ($i = 0; $i < (int) $this->request->data('opcoes.2.parcelas'); $i++) {
                        $_parcela = $this->getParcelas($parcelas);
                        $contasReceber = $this->ContasReceber->newEntity();
                        $contasReceber->empresa_id = $pedido->empresa_id;
                        $contasReceber->numero_documento = $numero_documento;
                        $contasReceber->data_vencimento = date('Y-m-d', mktime(0, 0, 0, date('m') + $i));
                        $contasReceber->valor_documento = $valor;
                        $contasReceber->pessoa_id = $pedido->pessoa_id;
                        $contasReceber->banco_id = $banco->id;
                        $contasReceber->tradutora_id = 4;
                        $contasReceber->status = 1;
                        $contasReceber->data_recebimento = null;
                        $contasReceber->valor_recebimento = $valor;
                        $contasReceber->numero_pedido = $pedido->id;
                        $contasReceber->valor_desconto = 0;
                        $contasReceber->valor_liquido = $valor;
                        $contasReceber->formas_pagamento_id = $formasPagamentos->id;
                        $contasReceber->parcelas = $_parcela['titulo'];
                        $this->ContasReceber->save($contasReceber);
                        array_shift($parcelas);
                    }
                }

                if (!empty($this->request->data('opcoes.3.valor'))) {
                    $formasPagamentos = $this->FormasPagamentos->find()->where(['id' => (int) $this->request->data('opcoes.3.tipo')])->first();
                    $taxas = json_decode($formasPagamentos->valor_taxas, true);
                    $valor = (float) str_replace(',', '.', str_replace('.', '', $this->request->data('opcoes.3.valor')));
                    $valor = $valor / (int) $this->request->data('opcoes.3.parcelas');
                    for ($i = 0; $i < (int) $this->request->data('opcoes.3.parcelas'); $i++) {
                        $_parcela = $this->getParcelas($parcelas);
                        $desconto = $valor;
                        $diferenca = 0;
                        if (!empty($taxas[$i])) {
                            $desconto = (float) str_replace('%', '', $taxas[$i]);
                            $diferenca = (float) number_format(((float) $desconto / 100) * $valor, 2);
                            $desconto = (float) ($valor - $diferenca);
                        }

                        $contasReceber = $this->ContasReceber->newEntity();
                        $contasReceber->empresa_id = $pedido->empresa_id;
                        $contasReceber->numero_documento = $numero_documento;
                        $contasReceber->data_vencimento = date('Y-m-d', mktime(0, 0, 0, date('m') + $i));
                        $contasReceber->valor_documento = $valor;
                        $contasReceber->pessoa_id = $pedido->pessoa_id;
                        $contasReceber->banco_id = $banco->id;
                        $contasReceber->tradutora_id = 5;
                        $contasReceber->status = 1;
                        $contasReceber->data_recebimento = null;
                        $contasReceber->valor_recebimento = $valor;
                        $contasReceber->numero_pedido = $pedido->id;
                        $contasReceber->valor_desconto = $diferenca;
                        $contasReceber->valor_liquido = $desconto;
                        $contasReceber->formas_pagamento_id = (int) $formasPagamentos->id;
                        $contasReceber->parcelas = $_parcela['titulo'];
                        $contasReceber->dias = (int) $formasPagamentos->qtde_dias;
                        $this->ContasReceber->save($contasReceber);
                        array_shift($parcelas);
                    }
                }

                if (!empty($this->request->data('opcoes.4.valor'))) {
                    if (!empty($parcelas)) {
                        $formasPagamentos = $this->FormasPagamentos->find()->where(['grupo' => 4])->first();
                        foreach ($parcelas as $key => $value) {
                            $valor = (float) str_replace(',', '.', str_replace(array('.', 'R$ '), '', $value['valor']));
                            if ($valor > 0) {
                                $_parcela = $this->getParcelas($parcelas);
                                $contasReceber = $this->ContasReceber->newEntity();
                                $contasReceber->empresa_id = $pedido->empresa_id;
                                $contasReceber->numero_documento = $numero_documento;
                                $contasReceber->data_vencimento = $value['data'];
                                $contasReceber->valor_documento = $valor;
                                $contasReceber->pessoa_id = $pedido->pessoa_id;
                                $contasReceber->banco_id = $banco->id;
                                $contasReceber->tradutora_id = 3;
                                $contasReceber->status = 1;
                                $contasReceber->data_recebimento = null;
                                $contasReceber->valor_recebimento = $valor;
                                $contasReceber->numero_pedido = $pedido->id;
                                $contasReceber->valor_desconto = 0;
                                $contasReceber->valor_liquido = $valor;
                                $contasReceber->formas_pagamento_id = (int) $formasPagamentos->id;
                                $contasReceber->parcelas = $_parcela['titulo'];
                                $contasReceber->dias = (int) $formasPagamentos->qtde_dias;
                                $this->ContasReceber->save($contasReceber);
                            }
                        }
                    }
                }
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index', '?' => ['status' => [2, 7]]]);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        } else {
            $pedido = $this->Pedidos->patchEntity($pedido, ['status' => 7]);
            $this->Pedidos->save($pedido);
        }
        $this->loadModel('FormasPagamentos');
        $formasPagamentos = $this->FormasPagamentos->find()->order(['nome' => 'asc'])->all();
        $this->set('pedido', $pedido);
        $this->set('formasPagamentos', $formasPagamentos);
        $this->set('_serialize', ['pedido']);
    }

    private function getParcelas($parcelas) {
        $chave = array_keys($parcelas);
        if (!empty($chave)) {
            return $parcelas[$chave[0]];
        }
        return null;
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $pedido = $this->Pedidos->get($id, [
            'contain' => ['Empresas', 'Pessoas', 'CondicoesPagamentos', 'Vendedores', 'Transportadoras', 'FormasPagamentos']
        ]);
        $this->set('pedido', $pedido);
        $this->set('_serialize', ['pedido']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $pedido = $this->Pedidos->newEntity();
        if ($this->request->is('post')) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->data);
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'imprimir', $pedido->id]);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $findPedidosAberto = $this->Pedidos->find()->where(['status' => 1, 'vendedor_id' => $this->Auth->user('id')])->contain(['PedidosItens' => function($q) {
                        return $q->contain('Produtos');
                    }])->first();
        if (count($findPedidosAberto) > 0) {
            $pedido->pedido_id = $findPedidosAberto->id;
            $pedido = $this->Pedidos->patchEntity($pedido, $findPedidosAberto->toArray());
        }
        $this->loadModel('Pessoas');
        $this->loadModel('Empresas');
        $this->loadModel('Produtos');
        $empresas = $this->Empresas->find('list');
        $produtos = $this->Produtos->find()->select(['barra'])->where(['status' => 1])->order(['nome' => 'asc'])->all();
        $pessoas = $this->Pedidos->Pessoas->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 2]);
        $condicaoPagamentos = $this->Pedidos->CondicoesPagamentos->find('list', [
            'order' => ['principal' => 'desc', 'nome' => 'asc']
        ]);
        $vendedors = $this->Pedidos->Vendedores->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 4]);
        $this->set(compact('pedido', 'empresas', 'pessoas', 'condicaoPagamentos', 'vendedors', 'produtos'));
        $this->set('_serialize', ['pedido']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedido id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $pedido = $this->Pedidos->get($id, [
            'contain' => ['PedidosItens' => function($q) {
                    return $q->contain('Produtos');
                }]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->data);
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'imprimir', $pedido->id]);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $pedido->pedido_id = $pedido->id;
        $this->loadModel('Pessoas');
        $this->loadModel('Empresas');
        $this->loadModel('Produtos');
        $empresas = $this->Empresas->find('list');
        $produtos = $this->Produtos->find()->select(['barra'])->where(['status' => 1])->order(['nome' => 'asc'])->all();
        $pessoas = $this->Pedidos->Pessoas->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 2]);
        $condicaoPagamentos = $this->Pedidos->CondicoesPagamentos->find('list', [
            'order' => ['principal' => 'desc', 'nome' => 'asc']
        ]);
        $vendedors = $this->Pedidos->Vendedores->find('list')->where(['PessoasAssociacoes.tipo_associacao' => 4]);
        $this->set(compact('pedido', 'empresas', 'pessoas', 'condicaoPagamentos', 'vendedors', 'produtos'));
        $this->set('_serialize', ['pedido']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $pedido = $this->Pedidos->get($id);
        if ($this->Pedidos->delete($pedido)) {
            $this->Flash->success(__('Registro Excluido com Sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function desbloquear($id = null) {
        $pedido = $this->Pedidos->get($id);
        $pedido->status = 1;
        $this->Pedidos->save($pedido);
        return $this->redirect($this->referer());
    }

    public function imprimir($id = null) {
        $this->viewBuilder()->layout('limpo');
        $pedido = $this->Pedidos->get($id, [
            'contain' => [
                'PedidosItens' => function($q) {
                    return $q->contain('Produtos');
                },
                'Vendedores',
                'CondicoesPagamentos',
                'Transportadoras',
                'Pessoas' => function($q) {
                    return $q->contain('PessoasEnderecos');
                },
                'Empresas' => function($q) {
                    return $q->contain(['Pessoas' => function($q) {
                                    return $q->contain(
                                                    [
                                                        'PessoasEnderecos',
                                                        'PessoasContatos' => function($q) {
                                                            return $q->where(['PessoasContatos.tipos_contato_id' => 2])->contain('TiposContatos');
                                                        },
                                                                'PessoasFisicas',
                                                                'PessoasJuridicas'
                                                            ]
                                            );
                                        }]);
                                },
                                        'Pessoas' => function($q) {
                                    return $q->contain('PessoasEnderecos');
                                },
                                    ]
                                ]);
                                $this->set(compact('pedido'));
                                $this->set('_serialize', ['pedido']);
                            }

                            public function redireciona($id = null) {
                                if (\Cake\Core\Configure::read('Parametros.PTelaPagamento') == 1) {
                                    return $this->redirect(['action' => 'receber', $id]);
                                } else {
                                    return $this->redirect(['action' => 'add']);
                                }
                                exit;
                            }

                        }
                        