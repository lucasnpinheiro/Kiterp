<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;

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
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query))->order('Produtos.nome')->contain('GruposEstoques');
        $this->set('produtos', $this->paginate($query));
        $this->set('_serialize', ['produtos']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function verifica() {
        $retorno = [
            'cod' => 111,
            'id' => null
        ];
        $valor = str_replace(['.', '-', '/'], '', $this->request->data('valor'));
        $find = $this->Produtos->find('all')->where([$this->request->data('tipo') => $valor])->first();
        if (count($find) > 0) {
            $retorno = [
                'cod' => 999,
                'id' => $find->id
            ];
        }
        echo json_encode($retorno);
        exit;
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
        $sql = 'SELECT 
                        p.id,
                        p.barra,
                        p.codigo_interno,
                        p.nome,
                        p.produto_kit,
                        COALESCE(IF(p.produto_kit = 0,
                                    pv.valor_vendas,
                                    (SELECT 
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
                                            ProdutosKits.kit_id = p.id
                                                AND ProdutosKits.empresa_id = pv.empresa_id
                                        GROUP BY ProdutosKits.empresa_id)),
                                0) AS valor_vendas
                    FROM
                        produtos AS p
                            INNER JOIN
                        produtos_valores AS pv ON pv.produto_id = p.id
                    WHERE
                        pv.empresa_id = "' . $this->request->data('empresa') . '"
                        AND (p.barra = "' . $codigo . '" OR p.codigo_interno = "' . $codigo . '") LIMIT 50';

        $conn = \Cake\Datasource\ConnectionManager::get('default');
        $find = $conn->execute($sql)->fetchAll('assoc');

        if (count($find) > 0) {
            $retorno = [
                'cod' => 999,
                'msg' => 'Produto localizado',
                'produto' => $find[0]
            ];
        }
        $this->set('retorno', $retorno);
    }

    /**
     * Consultar method
     *
     * @return void
     */
    public function consultarCombo() {
        $this->viewBuilder()->layout('ajax');
        $retorno = [
            'cod' => 111,
            'msg' => 'Produto não encontrado',
            'individual' => 1
        ];
        $codigo = trim($this->request->data('codigo'));
        $sql = 'SELECT 
                        p.id,
                        p.barra,
                        p.codigo_interno,
                        p.nome,
                        p.produto_kit,
                        COALESCE(IF(p.produto_kit = 0,
                                    pv.valor_vendas,
                                    (SELECT 
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
                                            ProdutosKits.kit_id = p.id
                                                AND ProdutosKits.empresa_id = pv.empresa_id
                                        GROUP BY ProdutosKits.empresa_id)),
                                0) AS valor_vendas
                    FROM
                        produtos AS p
                            INNER JOIN
                        produtos_valores AS pv ON pv.produto_id = p.id
                    WHERE
                        pv.empresa_id = "' . $this->request->data('empresa') . '"
                        AND p.nome RLIKE "' . $codigo . '" LIMIT 50';

        $conn = \Cake\Datasource\ConnectionManager::get('default');
        $find = $conn->execute($sql)->fetchAll('assoc');

        if (count($find) > 0) {
            $retorno = [
                'cod' => 999,
                'msg' => 'Produto localizado',
                'produto' => $find
            ];
        }
        $this->set('retorno', $retorno);
    }

    /**
     * Consultar method
     *
     * @return void
     */
    public function consultarKit() {
        $this->viewBuilder()->layout('ajax');
        $retorno = [
            'cod' => 111,
            'msg' => 'Produto não encontrado',
            'individual' => 1
        ];
        $codigo = trim($this->request->data('codigo'));
        $kit = [];
        if (!is_null($this->request->data('kit'))) {
            $kit = ['produto_kit' => trim($this->request->data('kit'))];
        }
        if (is_numeric($codigo)) {
            if (strlen($codigo) >= 13) {
                $find = $this->Produtos->find()->where(array_merge($kit, ['Produtos.barra' => $codigo]))->first();
            } else {
                $find = $this->Produtos->find()->where(array_merge($kit, ['Produtos.codigo_interno' => $codigo]))->first();
            }
        } else {
            $find = $this->Produtos->find()->where(array_merge($kit, ['Produtos.nome RLIKE' => $codigo]))->all();
            $retorno['individual'] = '0';
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
            'contain' => ['GruposEstoques', 'NotaFiscalEntradasItens', 'NotaFiscalSaidasItens', 'PedidosItens']
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
                $this->Produtos->updateAll(['foto' => $this->upload($produto->id)], ['id' => $produto->id]);
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $this->loadModel('Empresas');
        $empresas = $this->Empresas->find('all')->where(['produto' => 1])->order('Empresas.id')->contain(['Pessoas'])->all();
        $grupos = $this->Produtos->GruposEstoques->find('list');
        $this->set(compact('produto', 'grupos', 'empresas'));
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
            'contain' => ['ProdutosValores']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produto = $this->Produtos->patchEntity($produto, $this->request->data);
            $u = $this->upload($id);
            if (is_null($u)) {
                unset($produto->foto);
            } else {
                $produto->foto = $u;
            }

            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('Registro Salvo com Sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $this->loadModel('Empresas');
        $empresas = $this->Empresas->find('all')->where(['produto' => 1])->order('Empresas.id')->contain(['Pessoas'])->all();
        $grupos = $this->Produtos->GruposEstoques->find('list');
        $this->set(compact('produto', 'grupos', 'empresas'));
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
            $this->Flash->success(__('Registro Excluido com Sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    private function upload($id) {
        if (isset($this->request->data['foto']) AND count($this->request->data['foto']) > 0 and $this->request->data['foto']['name'] != '') {
            $file = new File($this->request->data['foto']['tmp_name'], true, 0644);
            $ext = explode('/', $this->request->data['foto']['type']);
            $file->copy(ROOT . DS . 'webroot' . DS . 'ImagemProdutos' . DS . $id . '.' . strtolower($ext[1]));
            $file->close();
            return $id . '.' . strtolower($ext[1]);
        } else {
            return null;
        }
    }

}
