<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pessoas Fisica'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoasFisicas index large-9 medium-8 columns content">
    <h3><?= __('Pessoas Fisicas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                <th><?= $this->Paginator->sort('cpf') ?></th>
                <th><?= $this->Paginator->sort('rg') ?></th>
                <th><?= $this->Paginator->sort('data_nascimento') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoasFisicas as $pessoasFisica): ?>
            <tr>
                <td><?= $this->Number->format($pessoasFisica->id) ?></td>
                <td><?= $pessoasFisica->has('pessoa') ? $this->Html->link($pessoasFisica->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pessoasFisica->pessoa->id]) : '' ?></td>
                <td><?= h($pessoasFisica->cpf) ?></td>
                <td><?= h($pessoasFisica->rg) ?></td>
                <td><?= h($pessoasFisica->data_nascimento) ?></td>
                <td><?= h($pessoasFisica->created) ?></td>
                <td><?= h($pessoasFisica->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pessoasFisica->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pessoasFisica->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pessoasFisica->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasFisica->id)]) ?>
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
