<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Grupos Controller
 *
 * @property \App\Model\Table\GruposTable $Grupos
 */
class GruposController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'Grupos');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->set('grupos', $this->paginate($this->Grupos));
        $this->set('_serialize', ['grupos']);
    }

    /**
     * View method
     *
     * @param string|null $id Grupo id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $grupo = $this->Grupos->get($id, [
            'contain' => ['Menus', 'Usuarios', 'Produtos']
        ]);
        $this->set('grupo', $grupo);
        $this->set('_serialize', ['grupo']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $grupo = $this->Grupos->newEntity();
        if ($this->request->is('post')) {
            $grupo = $this->Grupos->patchEntity($grupo, $this->request->data);
            if ($this->Grupos->save($grupo)) {
                $this->Flash->success(__('The grupo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The grupo could not be saved. Please, try again.'));
            }
        }
        $menus = $this->Grupos->Menus->find('list');
        $usuarios = $this->Grupos->Usuarios->find('list');
        $this->set(compact('grupo', 'menus', 'usuarios'));
        $this->set('_serialize', ['grupo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Grupo id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $grupo = $this->Grupos->get($id, [
            'contain' => ['Menus', 'Usuarios']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grupo = $this->Grupos->patchEntity($grupo, $this->request->data);
            if ($this->Grupos->save($grupo)) {
                $this->Flash->success(__('The grupo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The grupo could not be saved. Please, try again.'));
            }
        }
        $menus = $this->Grupos->Menus->find('list');
        $usuarios = $this->Grupos->Usuarios->find('list');
        $this->set(compact('grupo', 'menus', 'usuarios'));
        $this->set('_serialize', ['grupo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Grupo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $grupo = $this->Grupos->get($id);
        if ($this->Grupos->delete($grupo)) {
            $this->Flash->success(__('The grupo has been deleted.'));
        } else {
            $this->Flash->error(__('The grupo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
