<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Inventario'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="inventarios index large-9 medium-8 columns content">
    <h3><?= __('Inventarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('produto_id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('unidade') ?></th>
                <th><?= $this->Paginator->sort('grupo') ?></th>
                <th><?= $this->Paginator->sort('estoque') ?></th>
                <th><?= $this->Paginator->sort('compra') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inventarios as $inventario): ?>
            <tr>
                <td><?= $this->Number->format($inventario->id) ?></td>
                <td><?= $inventario->has('produto') ? $this->Html->link($inventario->produto->id, ['controller' => 'Produtos', 'action' => 'view', $inventario->produto->id]) : '' ?></td>
                <td><?= h($inventario->nome) ?></td>
                <td><?= h($inventario->unidade) ?></td>
                <td><?= h($inventario->grupo) ?></td>
                <td><?= $this->Number->format($inventario->estoque) ?></td>
                <td><?= $this->Number->format($inventario->compra) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $inventario->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $inventario->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inventario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventario->id)]) ?>
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
