<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Icms Estaduai'), ['action' => 'edit', $icmsEstaduai->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Icms Estaduai'), ['action' => 'delete', $icmsEstaduai->id], ['confirm' => __('Are you sure you want to delete # {0}?', $icmsEstaduai->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Icms Estaduais'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Icms Estaduai'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="icmsEstaduais view large-9 medium-8 columns content">
    <h3><?= h($icmsEstaduai->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Estado') ?></th>
            <td><?= h($icmsEstaduai->estado) ?></td>
        </tr>
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($icmsEstaduai->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($icmsEstaduai->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Icms Interno') ?></th>
            <td><?= $this->Number->format($icmsEstaduai->icms_interno) ?></td>
        </tr>
        <tr>
            <th><?= __('Icms Externo') ?></th>
            <td><?= $this->Number->format($icmsEstaduai->icms_externo) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($icmsEstaduai->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($icmsEstaduai->modified) ?></td>
        </tr>
    </table>
</div>
