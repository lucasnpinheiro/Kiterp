<?php


namespace App\Controller;

use App\Controller\AppController;

/**
 * Pessoas Controller
 *
 * @property \App\Model\Table\PessoasTable $Pessoas
 */
class FornecedoresController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Fornecedores');
        $this->loadModel('Pessoas');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->loadModel('PessoasAssociacoes');
        $find = $this->PessoasAssociacoes->find()->select('pessoa_id')->where(['tipo_associacao' => 3])->all();
        $_pessoas = [];
        if (count($find) > 0) {
            foreach ($find as $key => $value) {
                $_pessoas[$value->pessoa_id] = $value->pessoa_id;
            }
        } else {
            $_pessoas[0] = -1;
        }

        $query = $this->Pessoas->find('search', $this->Pessoas->filterParams($this->request->query))->where(['id IN' => $_pessoas, 'status !=' => 9]);
        $this->set('pessoas', $this->paginate($query));
        $this->set('_serialize', ['pessoas']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function verifica() {
        $this->loadModel('PessoasFisicas');
        $this->loadModel('PessoasJuridicas');
        $retorno = [
            'cod' => 111,
            'id' => null
        ];
        $find = [];
        $valor = str_replace(['.', '-', '/'], '', $this->request->data('valor'));
        if ($this->request->data('tipo') === 'fisica') {
            $find = $this->PessoasFisicas->find('all')->where(['PessoasFisicas.cpf' => $valor])->first();
        } else {
            $find = $this->PessoasJuridicas->find('all')->where(['PessoasJuridicas.cnpj' => $valor])->first();
        }
        if (count($find) > 0) {
            $retorno = [
                'cod' => 999,
                'id' => $find->pessoa_id
            ];
        }
        echo json_encode($retorno);
        exit;
    }

    /**
     * View method
     *
     * @param string|null $id Pessoa id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $pessoa = $this->Pessoas->get($id, [
            'contain' => ['ContasPagar', 'ContasReceber', 'Empresas', 'NotaFiscalEntradas', 'NotaFiscalSaidas', 'Pedidos', 'Usuarios']
        ]);
        $this->set('pessoa', $pessoa);
        $this->set('_serialize', ['pessoa']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $pessoa = $this->Pessoas->newEntity();
        if ($this->request->is('post')) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->data);
            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $this->loadModel('TiposContatos');
        $tipos_contatos = $this->TiposContatos->find('list')->order('nome');
        $this->set(compact('pessoa', 'tipos_contatos'));
        $this->set('_serialize', ['pessoa']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pessoa id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $pessoa = $this->Pessoas->get($id, [
            'contain' => ['Usuarios', 'PessoasContatos', 'PessoasEnderecos', 'PessoasFisicas', 'PessoasJuridicas', 'PessoasAssociacoes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->data);
            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $this->loadModel('TiposContatos');
        $tipos_contatos = $this->TiposContatos->find('list')->order('nome');
        $this->set(compact('pessoa', 'tipos_contatos'));
        $this->set('_serialize', ['pessoa']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $pessoa = $this->Pessoas->get($id);
        $pessoa->status = 9;
        if ($this->Pessoas->save($pessoa)) {
            $this->Flash->success(__('Registro Excluido com Sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
