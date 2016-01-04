<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Grupos Estoque'), ['action' => 'edit', $gruposEstoque->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Grupos Estoque'), ['action' => 'delete', $gruposEstoque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gruposEstoque->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Grupos Estoques'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grupos Estoque'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gruposEstoques view large-9 medium-8 columns content">
    <h3><?= h($gruposEstoque->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($gruposEstoque->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($gruposEstoque->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($gruposEstoque->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($gruposEstoque->modified) ?></td>
        </tr>
    </table>
</div>
