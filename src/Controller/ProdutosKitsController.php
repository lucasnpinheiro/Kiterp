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
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query))->group('ProdutosKits.kit_id')->contain('Kits');
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
    public function add($kit = null) {
        $produtosKit = $this->ProdutosKits->newEntity();
        if ($this->request->is('post')) {
            $this->saveLote();
            $this->Flash->success(__('Registro Salvo com Sucesso.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->loadModel('Produtos');
        $kits = $this->Produtos->find()->where(['produto_kit' => 1])->all();
        $listaLits = $empresas = [];
        if (!is_null($kit)) {
            $listaKits = $this->ProdutosKits->find('all')->where(['kit_id' => $kit])->group('ProdutosKits.produto_id')->contain('Produtos')->all();
            $sql = 'SELECT 
                        Pessoas.nome,
                        SUM(ProdutosValores.valor_compras * ProdutosKits.qtde) AS custo,
                        SUM(ProdutosValores.valor_vendas * ProdutosKits.qtde) AS venda
                    FROM
                        produtos_kits AS ProdutosKits
                            INNER JOIN
                        produtos AS Produtos ON Produtos.id = ProdutosKits.produto_id
                            INNER JOIN
                        produtos_valores AS ProdutosValores ON Produtos.id = ProdutosValores.produto_id
                            INNER JOIN
                        empresas AS Empresas ON Empresas.id = ProdutosKits.empresa_id
                            INNER JOIN
                        pessoas AS Pessoas ON Pessoas.id = Empresas.pessoa_id
                    WHERE
                        ProdutosKits.kit_id = ' . $kit . '
                            AND ProdutosValores.empresa_id = ProdutosKits.empresa_id
                    GROUP BY ProdutosKits.empresa_id';
            $conn = \Cake\Datasource\ConnectionManager::get('default');
            $empresas = $conn->execute($sql)->fetchAll('assoc');
        }
        $this->set(compact('produtosKit', 'kits', 'kit', 'listaKits', 'empresas'));
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
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $empresas = $this->ProdutosKits->Empresas->find('list');
        $produtos = $this->ProdutosKits->Produtos->find('list');
        $kits = $this->ProdutosKits->Kits->find('list');
        $this->set(compact('produtosKit', 'empresas', 'produtos', 'kits'));
        $this->set('_serialize', ['produtosKit']);
    }

    private function saveLote() {
        $this->loadModel('Empresas');
        $find = $this->Empresas->find('list');
        $kits = [];
        //`empresa_id`, `produto_id`, `kit_id`, `qtde`
        foreach ($this->request->data['Produto'] as $key => $value) {
            foreach ($find as $k => $v) {
                if (!empty($value['produto_id'])) {
                    if (!isset($kits[$value['produto_id'] . '-' . $k])) {
                        $kits[$value['produto_id'] . '-' . $k]['empresa_id'] = $k;
                        $kits[$value['produto_id'] . '-' . $k]['produto_id'] = $value['produto_id'];
                        $kits[$value['produto_id'] . '-' . $k]['qtde'] = 0;
                        $kits[$value['produto_id'] . '-' . $k]['kit_id'] = $this->request->data['kit_id'];
                    }
                    $kits[$value['produto_id'] . '-' . $k]['qtde'] += $value['quantidade'];
                }
            }
        }

        if (count($kits) > 0) {
            foreach ($kits as $key => $value) {
                $produtosKit = $this->ProdutosKits->newEntity();
                $produtosKit = $this->ProdutosKits->patchEntity($produtosKit, $value);
                $find = $this->ProdutosKits->find('all')->where(['empresa_id' => $value['empresa_id'], 'produto_id' => $value['produto_id']])->first();
                if (count($find) > 0) {
                    $produtosKit->id = $find->id;
                }
                $this->ProdutosKits->save($produtosKit);
            }
        }
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
        } else {
            $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
