<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ncm'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos Valores'), ['controller' => 'ProdutosValores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produtos Valore'), ['controller' => 'ProdutosValores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ncm index large-9 medium-8 columns content">
    <h3><?= __('Ncm') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('ncm') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ncm as $ncm): ?>
            <tr>
                <td><?= $this->Number->format($ncm->id) ?></td>
                <td><?= h($ncm->ncm) ?></td>
                <td><?= h($ncm->nome) ?></td>
                <td><?= h($ncm->created) ?></td>
                <td><?= h($ncm->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ncm->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ncm->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ncm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ncm->id)]) ?>
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
