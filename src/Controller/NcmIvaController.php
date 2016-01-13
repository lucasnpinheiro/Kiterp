<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * NcmIva Controller
 *
 * @property \App\Model\Table\NcmIvaTable $NcmIva
 */
class NcmIvaController extends AppController {

    public function __construct(\Cake\Network\Request $request = null, \Cake\Network\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->set('title', 'NCM Iva');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $query = $this->NcmIva->find('search', $this->NcmIva->filterParams($this->request->query))->contain(['Ncm', 'IcmsEstaduais']);
        $this->set('ncmIva', $this->paginate($query));
        $this->set('_serialize', ['ncmIva']);
        $this->loadModel('Ncm');
        $this->loadModel('IcmsEstaduais');
        $ncm = $this->Ncm->find('list');
        $icmsEstaduais = $this->IcmsEstaduais->find('list');
        $this->set(compact('ncm', 'icmsEstaduais'));
    }

    /**
     * View method
     *
     * @param string|null $id Ncm Iva id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $ncmIva = $this->NcmIva->get($id, [
            'contain' => ['Ncm', 'IcmsEstaduais']
        ]);
        $this->set('ncmIva', $ncmIva);
        $this->set('_serialize', ['ncmIva']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($estado = null) {
        $ncmIva = $this->NcmIva->newEntity();
        if ($this->request->is('post')) {
            /* $ncmIva = $this->NcmIva->patchEntity($ncmIva, $this->request->data);
              if ($this->NcmIva->save($ncmIva)) {
              $this->Flash->success(__('The ncm iva has been saved.'));
              return $this->redirect(['action' => 'index']);
              } else {
              $this->Flash->error(__('The ncm iva could not be saved. Please, try again.'));
              } */
            $this->saveLote($this->request->data);
            return $this->redirect(['action' => 'add', $estado]);
        }
        $this->loadModel('Ncm');
        $this->loadModel('IcmsEstaduais');
        $ncm = $this->Ncm->find('list');
        $icmsEstaduais = $this->IcmsEstaduais->find('list');
        $ncmIvaLista = null;
        if ($estado > 0) {
            $ncmIvaLista = $this->NcmIva->find('all')->where(['icms_estadual_id' => $estado])->all();
        }
        $this->set(compact('ncmIva', 'ncm', 'icmsEstaduais', 'ncmIvaLista', 'estado'));
        $this->set('_serialize', ['ncmIva']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ncm Iva id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $ncmIva = $this->NcmIva->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ncmIva = $this->NcmIva->patchEntity($ncmIva, $this->request->data);
            if ($this->NcmIva->save($ncmIva)) {
                $this->Flash->success(__('The ncm iva has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ncm iva could not be saved. Please, try again.'));
            }
        }
        $ncm = $this->NcmIva->Ncm->find('list');
        $icmsEstaduais = $this->NcmIva->IcmsEstaduais->find('list');
        $this->set(compact('ncmIva', 'ncm', 'icmsEstaduais'));
        $this->set('_serialize', ['ncmIva']);
    }

    private function saveLote($dados) {
        if (count($dados['ncm']) > 0) {
            foreach ($dados['ncm'] as $key => $value) {
                $ncmIva = $this->NcmIva->newEntity();
                $find = $this->NcmIva->find('all')->where(['ncm_id' => $value['id'], 'icms_estadual_id' => $dados['icms_estadual_id']])->first();
                if (count($find) > 0) {
                    $ncmIva = $this->NcmIva->patchEntity($ncmIva, $find->toArray());
                }
                $ncmIva->iva = str_replace(',', '.', str_replace('.', '', $value['valor']));
                $ncmIva->icms_estadual_id = $dados['icms_estadual_id'];
                $ncmIva->ncm_id = $value['id'];
                $this->NcmIva->save($ncmIva);
            }
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Ncm Iva id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $ncmIva = $this->NcmIva->get($id);
        if ($this->NcmIva->delete($ncmIva)) {
            $this->Flash->success(__('The ncm iva has been deleted.'));
        } else {
            $this->Flash->error(__('The ncm iva could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
