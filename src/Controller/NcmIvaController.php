<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NcmIva Controller
 *
 * @property \App\Model\Table\NcmIvaTable $NcmIva
 */
class NcmIvaController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ncms', 'IcmsEstaduals']
        ];
        $this->set('ncmIva', $this->paginate($this->NcmIva));
        $this->set('_serialize', ['ncmIva']);
    }

    /**
     * View method
     *
     * @param string|null $id Ncm Iva id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ncmIva = $this->NcmIva->get($id, [
            'contain' => ['Ncms', 'IcmsEstaduals']
        ]);
        $this->set('ncmIva', $ncmIva);
        $this->set('_serialize', ['ncmIva']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ncmIva = $this->NcmIva->newEntity();
        if ($this->request->is('post')) {
            $ncmIva = $this->NcmIva->patchEntity($ncmIva, $this->request->data);
            if ($this->NcmIva->save($ncmIva)) {
                $this->Flash->success(__('The ncm iva has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ncm iva could not be saved. Please, try again.'));
            }
        }
        $ncms = $this->NcmIva->Ncms->find('list', ['limit' => 200]);
        $icmsEstaduals = $this->NcmIva->IcmsEstaduals->find('list', ['limit' => 200]);
        $this->set(compact('ncmIva', 'ncms', 'icmsEstaduals'));
        $this->set('_serialize', ['ncmIva']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ncm Iva id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
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
        $ncms = $this->NcmIva->Ncms->find('list', ['limit' => 200]);
        $icmsEstaduals = $this->NcmIva->IcmsEstaduals->find('list', ['limit' => 200]);
        $this->set(compact('ncmIva', 'ncms', 'icmsEstaduals'));
        $this->set('_serialize', ['ncmIva']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ncm Iva id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
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
