<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pedidos Formas Pagamento'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formas Pagamentos'), ['controller' => 'FormasPagamentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formas Pagamento'), ['controller' => 'FormasPagamentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pedidosFormasPagamentos index large-9 medium-8 columns content">
    <h3><?= __('Pedidos Formas Pagamentos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('pedido_id') ?></th>
                <th><?= $this->Paginator->sort('forma_pagamento_id') ?></th>
                <th><?= $this->Paginator->sort('valor') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidosFormasPagamentos as $pedidosFormasPagamento): ?>
            <tr>
                <td><?= $this->Number->format($pedidosFormasPagamento->id) ?></td>
                <td><?= $pedidosFormasPagamento->has('pedido') ? $this->Html->link($pedidosFormasPagamento->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $pedidosFormasPagamento->pedido->id]) : '' ?></td>
                <td><?= $this->Number->format($pedidosFormasPagamento->forma_pagamento_id) ?></td>
                <td><?= $this->Number->format($pedidosFormasPagamento->valor) ?></td>
                <td><?= h($pedidosFormasPagamento->created) ?></td>
                <td><?= h($pedidosFormasPagamento->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pedidosFormasPagamento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pedidosFormasPagamento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedidosFormasPagamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidosFormasPagamento->id)]) ?>
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
