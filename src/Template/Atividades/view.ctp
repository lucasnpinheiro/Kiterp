<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Atividade'), ['action' => 'edit', $atividade->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Atividade'), ['action' => 'delete', $atividade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $atividade->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Atividades'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Atividade'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="atividades view large-9 medium-8 columns content">
    <h3><?= h($atividade->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($atividade->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($atividade->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($atividade->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($atividade->modified) ?></td>
        </tr>
    </table>
</div>
