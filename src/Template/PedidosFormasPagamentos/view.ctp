<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pedidos Formas Pagamento'), ['action' => 'edit', $pedidosFormasPagamento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pedidos Formas Pagamento'), ['action' => 'delete', $pedidosFormasPagamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidosFormasPagamento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos Formas Pagamentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedidos Formas Pagamento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formas Pagamentos'), ['controller' => 'FormasPagamentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formas Pagamento'), ['controller' => 'FormasPagamentos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pedidosFormasPagamentos view large-9 medium-8 columns content">
    <h3><?= h($pedidosFormasPagamento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pedido') ?></th>
            <td><?= $pedidosFormasPagamento->has('pedido') ? $this->Html->link($pedidosFormasPagamento->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $pedidosFormasPagamento->pedido->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pedidosFormasPagamento->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Forma Pagamento Id') ?></th>
            <td><?= $this->Number->format($pedidosFormasPagamento->forma_pagamento_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor') ?></th>
            <td><?= $this->Number->format($pedidosFormasPagamento->valor) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pedidosFormasPagamento->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pedidosFormasPagamento->modified) ?></td>
        </tr>
    </table>
</div>
