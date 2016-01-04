<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Entradas Iten'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Entradas'), ['controller' => 'NotaFiscalEntradas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Entrada'), ['controller' => 'NotaFiscalEntradas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notaFiscalEntradasItens index large-9 medium-8 columns content">
    <h3><?= __('Nota Fiscal Entradas Itens') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nota_fiscal_entrada_id') ?></th>
                <th><?= $this->Paginator->sort('produto_id') ?></th>
                <th><?= $this->Paginator->sort('qtde') ?></th>
                <th><?= $this->Paginator->sort('compra') ?></th>
                <th><?= $this->Paginator->sort('total') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notaFiscalEntradasItens as $notaFiscalEntradasIten): ?>
            <tr>
                <td><?= $this->Number->format($notaFiscalEntradasIten->id) ?></td>
                <td><?= $notaFiscalEntradasIten->has('nota_fiscal_entrada') ? $this->Html->link($notaFiscalEntradasIten->nota_fiscal_entrada->id, ['controller' => 'NotaFiscalEntradas', 'action' => 'view', $notaFiscalEntradasIten->nota_fiscal_entrada->id]) : '' ?></td>
                <td><?= $notaFiscalEntradasIten->has('produto') ? $this->Html->link($notaFiscalEntradasIten->produto->id, ['controller' => 'Produtos', 'action' => 'view', $notaFiscalEntradasIten->produto->id]) : '' ?></td>
                <td><?= $this->Number->format($notaFiscalEntradasIten->qtde) ?></td>
                <td><?= $this->Number->format($notaFiscalEntradasIten->compra) ?></td>
                <td><?= $this->Number->format($notaFiscalEntradasIten->total) ?></td>
                <td><?= h($notaFiscalEntradasIten->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $notaFiscalEntradasIten->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notaFiscalEntradasIten->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notaFiscalEntradasIten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notaFiscalEntradasIten->id)]) ?>
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
