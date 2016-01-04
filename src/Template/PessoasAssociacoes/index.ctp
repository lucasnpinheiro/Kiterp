<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pessoas Associaco'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoasAssociacoes index large-9 medium-8 columns content">
    <h3><?= __('Pessoas Associacoes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                <th><?= $this->Paginator->sort('tipo_associacao') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoasAssociacoes as $pessoasAssociaco): ?>
            <tr>
                <td><?= $this->Number->format($pessoasAssociaco->id) ?></td>
                <td><?= $pessoasAssociaco->has('pessoa') ? $this->Html->link($pessoasAssociaco->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pessoasAssociaco->pessoa->id]) : '' ?></td>
                <td><?= $this->Number->format($pessoasAssociaco->tipo_associacao) ?></td>
                <td><?= $this->Number->format($pessoasAssociaco->status) ?></td>
                <td><?= h($pessoasAssociaco->created) ?></td>
                <td><?= h($pessoasAssociaco->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pessoasAssociaco->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pessoasAssociaco->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pessoasAssociaco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasAssociaco->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
