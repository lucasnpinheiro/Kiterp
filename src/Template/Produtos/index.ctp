<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Entradas Itens'), ['controller' => 'NotaFiscalEntradasItens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Entradas Iten'), ['controller' => 'NotaFiscalEntradasItens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Saidas Itens'), ['controller' => 'NotaFiscalSaidasItens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Saidas Iten'), ['controller' => 'NotaFiscalSaidasItens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos Itens'), ['controller' => 'PedidosItens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedidos Iten'), ['controller' => 'PedidosItens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtos index large-9 medium-8 columns content">
    <h3><?= __('Produtos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('barra') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('unidade') ?></th>
                <th><?= $this->Paginator->sort('grupo_id') ?></th>
                <th><?= $this->Paginator->sort('produto_kit') ?></th>
                <th><?= $this->Paginator->sort('foto') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?= $this->Number->format($produto->id) ?></td>
                <td><?= h($produto->barra) ?></td>
                <td><?= h($produto->nome) ?></td>
                <td><?= h($produto->unidade) ?></td>
                <td><?= $this->Number->format($produto->grupo_id) ?></td>
                <td><?= $this->Number->format($produto->produto_kit) ?></td>
                <td><?= h($produto->foto) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $produto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id)]) ?>
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
