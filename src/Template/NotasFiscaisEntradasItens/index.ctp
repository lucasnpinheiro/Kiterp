<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Notas Fiscais Entradas Iten'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Notas Fiscais Entradas'), ['controller' => 'NotasFiscaisEntradas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Notas Fiscais Entrada'), ['controller' => 'NotasFiscaisEntradas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notasFiscaisEntradasItens index large-9 medium-8 columns content">
    <h3><?= __('Notas Fiscais Entradas Itens') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('notas_fiscais_entrada_id') ?></th>
                <th><?= $this->Paginator->sort('produto_id') ?></th>
                <th><?= $this->Paginator->sort('qtde') ?></th>
                <th><?= $this->Paginator->sort('compra') ?></th>
                <th><?= $this->Paginator->sort('total') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notasFiscaisEntradasItens as $notasFiscaisEntradasIten): ?>
            <tr>
                <td><?= $this->Number->format($notasFiscaisEntradasIten->id) ?></td>
                <td><?= $notasFiscaisEntradasIten->has('notas_fiscais_entrada') ? $this->Html->link($notasFiscaisEntradasIten->notas_fiscais_entrada->id, ['controller' => 'NotasFiscaisEntradas', 'action' => 'view', $notasFiscaisEntradasIten->notas_fiscais_entrada->id]) : '' ?></td>
                <td><?= $notasFiscaisEntradasIten->has('produto') ? $this->Html->link($notasFiscaisEntradasIten->produto->id, ['controller' => 'Produtos', 'action' => 'view', $notasFiscaisEntradasIten->produto->id]) : '' ?></td>
                <td><?= $this->Number->format($notasFiscaisEntradasIten->qtde) ?></td>
                <td><?= $this->Number->format($notasFiscaisEntradasIten->compra) ?></td>
                <td><?= $this->Number->format($notasFiscaisEntradasIten->total) ?></td>
                <td><?= h($notasFiscaisEntradasIten->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link('', ['action' => 'view', $notasFiscaisEntradasIten->id]) ?>
                    <?= $this->Html->link('', ['action' => 'edit', $notasFiscaisEntradasIten->id]) ?>
                    <?= $this->Form->postLink('', ['action' => 'delete', $notasFiscaisEntradasIten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notasFiscaisEntradasIten->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
