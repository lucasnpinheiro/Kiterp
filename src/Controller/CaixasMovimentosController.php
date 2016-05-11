<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * CaixasMovimentos Controller
 *
 * @property \App\Model\Table\CaixasMovimentosTable $CaixasMovimentos
 */
class CaixasMovimentosController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Caixa Movimentos');
        $this->set('bt_consultar_acao', false);
        $this->set('bt_cadastrar_acao', false);
        $this->set('bt_excluir_acao', false);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id) {
        $this->loadModel('CaixasDiarios');
        $caixasDiarios = $this->CaixasDiarios->get($id, ['contain' => ['Pessoas', 'Terminais']]);
        $caixasMovimento = $this->CaixasMovimentos->newEntity();
        $caixasMovimentos = $this->CaixasMovimentos->find()->where(['caixas_diario_id' => $id])->all();

        $this->set(compact('caixasDiarios', 'caixasMovimento', 'caixasMovimentos'));
        $this->set('caixas_diario_id', $id);
        $this->set('_serialize', ['caixasMovimentos']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null) {
        $caixasMovimento = $this->CaixasMovimentos->newEntity();
        if ($this->request->is('post')) {
            $caixasMovimento = $this->CaixasMovimentos->patchEntity($caixasMovimento, $this->request->data);
            if ($this->CaixasMovimentos->save($caixasMovimento)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index', $caixasMovimento->caixas_diario_id]);
            } else {
                $this->Flash->error(__('O registro não pôde ser salvo. Por favor tente novamente.'));
            }
        }
        $this->set(compact('caixasMovimento'));
        $this->set('_serialize', ['caixasMovimento']);
    }

    public function fechar($id = null) {
        $this->loadModel('CaixasDiarios');
        $this->loadModel('Pedidos');
        $caixasDiarios = $this->CaixasDiarios->get($id, ['contain' => ['Pessoas', 'Terminais']]);
        $caixasMovimentos = $this->CaixasMovimentos->find()->where(['caixas_diario_id' => $id])->all();
        $saldoInicial = $this->CaixasMovimentos->find();
        $saldoInicial = $saldoInicial->select(['total' => $saldoInicial->func()->sum('valor')])->where(['caixas_diario_id' => $id, 'grupo_id' => 1])->first();
        $entradas = $this->CaixasMovimentos->find();
        $entradas = $entradas->select(['total' => $entradas->func()->sum('valor')])->where(['caixas_diario_id' => $id, 'grupo_id' => 2])->first();
        $saidas = $this->CaixasMovimentos->find();
        $saidas = $saidas->select(['total' => $saidas->func()->sum('valor')])->where(['caixas_diario_id' => $id, 'grupo_id' => 3])->first();
        $sangrias = $this->CaixasMovimentos->find();
        $sangrias = $sangrias->select(['total' => $sangrias->func()->sum('valor')])->where(['caixas_diario_id' => $id, 'grupo_id' => 4])->first();

        $vendas = $this->Pedidos->find();
        $vendas = $vendas->select(['total' => $vendas->func()->sum('valor_liquido')])->where(['caixas_diario_id' => $id, 'status' => 1])->first();

        $vendasDinheiro = $this->Pedidos->find();
        $vendasDinheiro = $vendasDinheiro->select(['total' => $vendasDinheiro->func()->sum('valor_dinheiro')])->where(['caixas_diario_id' => $id, 'status' => 1])->first();
        $vendasCheque = $this->Pedidos->find();
        $vendasCheque = $vendasCheque->select(['total' => $vendasCheque->func()->sum('valor_cheque')])->where(['caixas_diario_id' => $id, 'status' => 1])->first();
        $vendasPrazo = $this->Pedidos->find();
        $vendasPrazo = $vendasPrazo->select(['total' => $vendasPrazo->func()->sum('valor_prazo')])->where(['caixas_diario_id' => $id, 'status' => 1])->first();
        $vendasCartao = $this->Pedidos->find();
        $vendasCartao = $vendasCartao->select(['total' => $vendasCartao->func()->sum('valor_cartao')])->where(['caixas_diario_id' => $id, 'status' => 1])->first();


        $this->set(compact('caixasDiarios', 'caixasMovimentos', 'saldoInicial', 'entradas', 'saidas', 'sangrias', 'vendas', 'vendasDinheiro', 'vendasCheque', 'vendasPrazo', 'vendasCartao'));
        $this->set('caixas_diario_id', $id);
        $this->set('_serialize', ['caixasMovimentos']);

        if ($this->request->query('imprimir') === 'S') {
            $this->viewBuilder()->layout('print');
            $redirect = $this->request->query;
            unset($redirect['imprimir']);
            $redirect = array_merge($redirect, $this->request->params['pass']);
            $this->set('redirect', \Cake\Routing\Router::url($redirect, true));
        }
    }

}
