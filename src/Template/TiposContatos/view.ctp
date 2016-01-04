<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tipos Contato'), ['action' => 'edit', $tiposContato->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tipos Contato'), ['action' => 'delete', $tiposContato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tiposContato->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tipos Contatos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipos Contato'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tiposContatos view large-9 medium-8 columns content">
    <h3><?= h($tiposContato->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($tiposContato->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($tiposContato->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($tiposContato->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($tiposContato->modified) ?></td>
        </tr>
    </table>
</div>
