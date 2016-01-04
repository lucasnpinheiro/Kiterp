<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pessoas Fisica'), ['action' => 'edit', $pessoasFisica->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pessoas Fisica'), ['action' => 'delete', $pessoasFisica->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasFisica->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas Fisicas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoas Fisica'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pessoasFisicas view large-9 medium-8 columns content">
    <h3><?= h($pessoasFisica->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $pessoasFisica->has('pessoa') ? $this->Html->link($pessoasFisica->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pessoasFisica->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Cpf') ?></th>
            <td><?= h($pessoasFisica->cpf) ?></td>
        </tr>
        <tr>
            <th><?= __('Rg') ?></th>
            <td><?= h($pessoasFisica->rg) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pessoasFisica->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Nascimento') ?></th>
            <td><?= h($pessoasFisica->data_nascimento) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pessoasFisica->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pessoasFisica->modified) ?></td>
        </tr>
    </table>
</div>
