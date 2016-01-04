<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NotaFiscalEntradasItens Controller
 *
 * @property \App\Model\Table\NotaFiscalEntradasItensTable $NotaFiscalEntradasItens
 */
class NotaFiscalEntradasItensController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['NotaFiscalEntradas', 'Produtos']
        ];
        $this->set('notaFiscalEntradasItens', $this->paginate($this->NotaFiscalEntradasItens));
        $this->set('_serialize', ['notaFiscalEntradasItens']);
    }

    /**
     * View method
     *
     * @param string|null $id Nota Fiscal Entradas Iten id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notaFiscalEntradasIten = $this->NotaFiscalEntradasItens->get($id, [
            'contain' => ['NotaFiscalEntradas', 'Produtos']
        ]);
        $this->set('notaFiscalEntradasIten', $notaFiscalEntradasIten);
        $this->set('_serialize', ['notaFiscalEntradasIten']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notaFiscalEntradasIten = $this->NotaFiscalEntradasItens->newEntity();
        if ($this->request->is('post')) {
            $notaFiscalEntradasIten = $this->NotaFiscalEntradasItens->patchEntity($notaFiscalEntradasIten, $this->request->data);
            if ($this->NotaFiscalEntradasItens->save($notaFiscalEntradasIten)) {
                $this->Flash->success(__('The nota fiscal entradas iten has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The nota fiscal entradas iten could not be saved. Please, try again.'));
            }
        }
        $notaFiscalEntradas = $this->NotaFiscalEntradasItens->NotaFiscalEntradas->find('list', ['limit' => 200]);
        $produtos = $this->NotaFiscalEntradasItens->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('notaFiscalEntradasIten', 'notaFiscalEntradas', 'produtos'));
        $this->set('_serialize', ['notaFiscalEntradasIten']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Nota Fiscal Entradas Iten id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notaFiscalEntradasIten = $this->NotaFiscalEntradasItens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notaFiscalEntradasIten = $this->NotaFiscalEntradasItens->patchEntity($notaFiscalEntradasIten, $this->request->data);
            if ($this->NotaFiscalEntradasItens->save($notaFiscalEntradasIten)) {
                $this->Flash->success(__('The nota fiscal entradas iten has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The nota fiscal entradas iten could not be saved. Please, try again.'));
            }
        }
        $notaFiscalEntradas = $this->NotaFiscalEntradasItens->NotaFiscalEntradas->find('list', ['limit' => 200]);
        $produtos = $this->NotaFiscalEntradasItens->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('notaFiscalEntradasIten', 'notaFiscalEntradas', 'produtos'));
        $this->set('_serialize', ['notaFiscalEntradasIten']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Nota Fiscal Entradas Iten id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notaFiscalEntradasIten = $this->NotaFiscalEntradasItens->get($id);
        if ($this->NotaFiscalEntradasItens->delete($notaFiscalEntradasIten)) {
            $this->Flash->success(__('The nota fiscal entradas iten has been deleted.'));
        } else {
            $this->Flash->error(__('The nota fiscal entradas iten could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
