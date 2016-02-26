<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Inventario'), ['action' => 'edit', $inventario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Inventario'), ['action' => 'delete', $inventario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Inventarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Inventario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="inventarios view large-9 medium-8 columns content">
    <h3><?= h($inventario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Produto') ?></th>
            <td><?= $inventario->has('produto') ? $this->Html->link($inventario->produto->id, ['controller' => 'Produtos', 'action' => 'view', $inventario->produto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($inventario->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Unidade') ?></th>
            <td><?= h($inventario->unidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Grupo') ?></th>
            <td><?= h($inventario->grupo) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($inventario->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Estoque') ?></th>
            <td><?= $this->Number->format($inventario->estoque) ?></td>
        </tr>
        <tr>
            <th><?= __('Compra') ?></th>
            <td><?= $this->Number->format($inventario->compra) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor') ?></th>
            <td><?= $this->Number->format($inventario->valor) ?></td>
        </tr>
        <tr>
            <th><?= __('Total') ?></th>
            <td><?= $this->Number->format($inventario->total) ?></td>
        </tr>
    </table>
</div>
