<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Imposto'), ['action' => 'edit', $imposto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Imposto'), ['action' => 'delete', $imposto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imposto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Impostos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Imposto'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="impostos view large-9 medium-8 columns content">
    <h3><?= h($imposto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Codigo') ?></th>
            <td><?= h($imposto->codigo) ?></td>
        </tr>
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($imposto->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($imposto->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo Imposto') ?></th>
            <td><?= $this->Number->format($imposto->tipo_imposto) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($imposto->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($imposto->modified) ?></td>
        </tr>
    </table>
</div>
