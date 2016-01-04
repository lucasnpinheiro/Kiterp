<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NotaFiscalSaidasItens Controller
 *
 * @property \App\Model\Table\NotaFiscalSaidasItensTable $NotaFiscalSaidasItens
 */
class NotaFiscalSaidasItensController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['NotaFiscalSaidas', 'Produtos', 'Ncms']
        ];
        $this->set('notaFiscalSaidasItens', $this->paginate($this->NotaFiscalSaidasItens));
        $this->set('_serialize', ['notaFiscalSaidasItens']);
    }

    /**
     * View method
     *
     * @param string|null $id Nota Fiscal Saidas Iten id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notaFiscalSaidasIten = $this->NotaFiscalSaidasItens->get($id, [
            'contain' => ['NotaFiscalSaidas', 'Produtos', 'Ncms']
        ]);
        $this->set('notaFiscalSaidasIten', $notaFiscalSaidasIten);
        $this->set('_serialize', ['notaFiscalSaidasIten']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notaFiscalSaidasIten = $this->NotaFiscalSaidasItens->newEntity();
        if ($this->request->is('post')) {
            $notaFiscalSaidasIten = $this->NotaFiscalSaidasItens->patchEntity($notaFiscalSaidasIten, $this->request->data);
            if ($this->NotaFiscalSaidasItens->save($notaFiscalSaidasIten)) {
                $this->Flash->success(__('The nota fiscal saidas iten has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The nota fiscal saidas iten could not be saved. Please, try again.'));
            }
        }
        $notaFiscalSaidas = $this->NotaFiscalSaidasItens->NotaFiscalSaidas->find('list', ['limit' => 200]);
        $produtos = $this->NotaFiscalSaidasItens->Produtos->find('list', ['limit' => 200]);
        $ncms = $this->NotaFiscalSaidasItens->Ncms->find('list', ['limit' => 200]);
        $this->set(compact('notaFiscalSaidasIten', 'notaFiscalSaidas', 'produtos', 'ncms'));
        $this->set('_serialize', ['notaFiscalSaidasIten']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Nota Fiscal Saidas Iten id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notaFiscalSaidasIten = $this->NotaFiscalSaidasItens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notaFiscalSaidasIten = $this->NotaFiscalSaidasItens->patchEntity($notaFiscalSaidasIten, $this->request->data);
            if ($this->NotaFiscalSaidasItens->save($notaFiscalSaidasIten)) {
                $this->Flash->success(__('The nota fiscal saidas iten has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The nota fiscal saidas iten could not be saved. Please, try again.'));
            }
        }
        $notaFiscalSaidas = $this->NotaFiscalSaidasItens->NotaFiscalSaidas->find('list', ['limit' => 200]);
        $produtos = $this->NotaFiscalSaidasItens->Produtos->find('list', ['limit' => 200]);
        $ncms = $this->NotaFiscalSaidasItens->Ncms->find('list', ['limit' => 200]);
        $this->set(compact('notaFiscalSaidasIten', 'notaFiscalSaidas', 'produtos', 'ncms'));
        $this->set('_serialize', ['notaFiscalSaidasIten']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Nota Fiscal Saidas Iten id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notaFiscalSaidasIten = $this->NotaFiscalSaidasItens->get($id);
        if ($this->NotaFiscalSaidasItens->delete($notaFiscalSaidasIten)) {
            $this->Flash->success(__('The nota fiscal saidas iten has been deleted.'));
        } else {
            $this->Flash->error(__('The nota fiscal saidas iten could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
