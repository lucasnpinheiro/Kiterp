<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Saidas Iten'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Saidas'), ['controller' => 'NotaFiscalSaidas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Saida'), ['controller' => 'NotaFiscalSaidas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notaFiscalSaidasItens index large-9 medium-8 columns content">
    <h3><?= __('Nota Fiscal Saidas Itens') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nota_fiscal_saida_id') ?></th>
                <th><?= $this->Paginator->sort('produto_id') ?></th>
                <th><?= $this->Paginator->sort('qtde') ?></th>
                <th><?= $this->Paginator->sort('venda') ?></th>
                <th><?= $this->Paginator->sort('total') ?></th>
                <th><?= $this->Paginator->sort('base_icms') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notaFiscalSaidasItens as $notaFiscalSaidasIten): ?>
            <tr>
                <td><?= $this->Number->format($notaFiscalSaidasIten->id) ?></td>
                <td><?= $notaFiscalSaidasIten->has('nota_fiscal_saida') ? $this->Html->link($notaFiscalSaidasIten->nota_fiscal_saida->id, ['controller' => 'NotaFiscalSaidas', 'action' => 'view', $notaFiscalSaidasIten->nota_fiscal_saida->id]) : '' ?></td>
                <td><?= $notaFiscalSaidasIten->has('produto') ? $this->Html->link($notaFiscalSaidasIten->produto->id, ['controller' => 'Produtos', 'action' => 'view', $notaFiscalSaidasIten->produto->id]) : '' ?></td>
                <td><?= $this->Number->format($notaFiscalSaidasIten->qtde) ?></td>
                <td><?= $this->Number->format($notaFiscalSaidasIten->venda) ?></td>
                <td><?= $this->Number->format($notaFiscalSaidasIten->total) ?></td>
                <td><?= $this->Number->format($notaFiscalSaidasIten->base_icms) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $notaFiscalSaidasIten->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notaFiscalSaidasIten->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notaFiscalSaidasIten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notaFiscalSaidasIten->id)]) ?>
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
