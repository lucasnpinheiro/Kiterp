<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pessoas Contato'), ['action' => 'edit', $pessoasContato->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pessoas Contato'), ['action' => 'delete', $pessoasContato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasContato->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas Contatos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoas Contato'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pessoasContatos view large-9 medium-8 columns content">
    <h3><?= h($pessoasContato->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $pessoasContato->has('pessoa') ? $this->Html->link($pessoasContato->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pessoasContato->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Valor') ?></th>
            <td><?= h($pessoasContato->valor) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pessoasContato->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo Contato Id') ?></th>
            <td><?= $this->Number->format($pessoasContato->tipo_contato_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($pessoasContato->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pessoasContato->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pessoasContato->modified) ?></td>
        </tr>
    </table>
</div>
