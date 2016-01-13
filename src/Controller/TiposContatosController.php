<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TiposContatos Controller
 *
 * @property \App\Model\Table\TiposContatosTable $TiposContatos
 */
class TiposContatosController extends AppController
{

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Tipos de Contatos');
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $query = $this->{$this->modelClass}->find('search', $this->{$this->modelClass}->filterParams($this->request->query));
        $this->set('tiposContatos', $this->paginate($query));
        $this->set('_serialize', ['tiposContatos']);
    }

    /**
     * View method
     *
     * @param string|null $id Tipos Contato id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tiposContato = $this->TiposContatos->get($id, [
            'contain' => []
        ]);
        $this->set('tiposContato', $tiposContato);
        $this->set('_serialize', ['tiposContato']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tiposContato = $this->TiposContatos->newEntity();
        if ($this->request->is('post')) {
            $tiposContato = $this->TiposContatos->patchEntity($tiposContato, $this->request->data);
            if ($this->TiposContatos->save($tiposContato)) {
                $this->Flash->success(__('The tipos contato has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tipos contato could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tiposContato'));
        $this->set('_serialize', ['tiposContato']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipos Contato id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tiposContato = $this->TiposContatos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tiposContato = $this->TiposContatos->patchEntity($tiposContato, $this->request->data);
            if ($this->TiposContatos->save($tiposContato)) {
                $this->Flash->success(__('The tipos contato has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tipos contato could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tiposContato'));
        $this->set('_serialize', ['tiposContato']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipos Contato id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tiposContato = $this->TiposContatos->get($id);
        if ($this->TiposContatos->delete($tiposContato)) {
            $this->Flash->success(__('The tipos contato has been deleted.'));
        } else {
            $this->Flash->error(__('The tipos contato could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
