<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Impostos Controller
 *
 * @property \App\Model\Table\ImpostosTable $Impostos
 */
class ImpostosController extends AppController
{

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Impostos');
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('impostos', $this->paginate($this->Impostos));
        $this->set('_serialize', ['impostos']);
    }

    /**
     * View method
     *
     * @param string|null $id Imposto id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $imposto = $this->Impostos->get($id, [
            'contain' => []
        ]);
        $this->set('imposto', $imposto);
        $this->set('_serialize', ['imposto']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $imposto = $this->Impostos->newEntity();
        if ($this->request->is('post')) {
            $imposto = $this->Impostos->patchEntity($imposto, $this->request->data);
            if ($this->Impostos->save($imposto)) {
                $this->Flash->success(__('The imposto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The imposto could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('imposto'));
        $this->set('_serialize', ['imposto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Imposto id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $imposto = $this->Impostos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $imposto = $this->Impostos->patchEntity($imposto, $this->request->data);
            if ($this->Impostos->save($imposto)) {
                $this->Flash->success(__('The imposto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The imposto could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('imposto'));
        $this->set('_serialize', ['imposto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Imposto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $imposto = $this->Impostos->get($id);
        if ($this->Impostos->delete($imposto)) {
            $this->Flash->success(__('The imposto has been deleted.'));
        } else {
            $this->Flash->error(__('The imposto could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
