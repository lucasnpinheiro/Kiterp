<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pessoas Associaco'), ['action' => 'edit', $pessoasAssociaco->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pessoas Associaco'), ['action' => 'delete', $pessoasAssociaco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasAssociaco->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas Associacoes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoas Associaco'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pessoasAssociacoes view large-9 medium-8 columns content">
    <h3><?= h($pessoasAssociaco->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $pessoasAssociaco->has('pessoa') ? $this->Html->link($pessoasAssociaco->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pessoasAssociaco->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pessoasAssociaco->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo Associacao') ?></th>
            <td><?= $this->Number->format($pessoasAssociaco->tipo_associacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($pessoasAssociaco->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pessoasAssociaco->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pessoasAssociaco->modified) ?></td>
        </tr>
    </table>
</div>
