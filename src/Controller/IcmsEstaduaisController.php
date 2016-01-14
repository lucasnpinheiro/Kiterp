<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * IcmsEstaduais Controller
 *
 * @property \App\Model\Table\IcmsEstaduaisTable $IcmsEstaduais
 */
class IcmsEstaduaisController extends AppController {

    public $paginate = [
        'limit' => 50
    ];

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'ICMS Estaduais');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query))->order('nome');
        $this->set('icmsEstaduais', $this->paginate($query));
        $this->set('_serialize', ['icmsEstaduais']);
    }

    /**
     * View method
     *
     * @param string|null $id Icms Estaduai id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $icmsEstaduai = $this->IcmsEstaduais->get($id, [
            'contain' => []
        ]);
        $this->set('icmsEstaduai', $icmsEstaduai);
        $this->set('_serialize', ['icmsEstaduai']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $icmsEstaduai = $this->IcmsEstaduais->newEntity();
        if ($this->request->is('post')) {
            $icmsEstaduai = $this->IcmsEstaduais->patchEntity($icmsEstaduai, $this->request->data);
            if ($this->IcmsEstaduais->save($icmsEstaduai)) {
                    $this->Flash->success(__('Registro Salvo com Sucesso.'));
                    return $this->redirect(['action' => 'index']);
                } else
                {
                    $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $this->set(compact('icmsEstaduai'));
        $this->set('_serialize', ['icmsEstaduai']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Icms Estaduai id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $icmsEstaduai = $this->IcmsEstaduais->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $icmsEstaduai = $this->IcmsEstaduais->patchEntity($icmsEstaduai, $this->request->data);
            if ($this->IcmsEstaduais->save($icmsEstaduai)) {
                    $this->Flash->success(__('Registro Salvo com Sucesso.'));
                    return $this->redirect(['action' => 'index']);
                } else
                {
                    $this->Flash->error(__('Erro ao Salvar o Registro. Tente Novamente.'));
            }
        }
        $this->set(compact('icmsEstaduai'));
        $this->set('_serialize', ['icmsEstaduai']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Icms Estaduai id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $icmsEstaduai = $this->IcmsEstaduais->get($id);
        if ($this->IcmsEstaduais->delete($icmsEstaduai)) {
            $this->Flash->success(__('Registro Excluido com Sucesso.'));
        } else
        {
            $this->Flash->error(__('Erro ao Excluir o Registro. Tente Novamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
