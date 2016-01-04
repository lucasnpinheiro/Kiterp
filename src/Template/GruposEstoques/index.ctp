<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Grupos Estoque'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gruposEstoques index large-9 medium-8 columns content">
    <h3><?= __('Grupos Estoques') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gruposEstoques as $gruposEstoque): ?>
            <tr>
                <td><?= $this->Number->format($gruposEstoque->id) ?></td>
                <td><?= h($gruposEstoque->nome) ?></td>
                <td><?= h($gruposEstoque->created) ?></td>
                <td><?= h($gruposEstoque->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $gruposEstoque->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gruposEstoque->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gruposEstoque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gruposEstoque->id)]) ?>
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
