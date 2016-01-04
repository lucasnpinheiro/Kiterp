<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tipos Contato'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tiposContatos index large-9 medium-8 columns content">
    <h3><?= __('Tipos Contatos') ?></h3>
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
            <?php foreach ($tiposContatos as $tiposContato): ?>
            <tr>
                <td><?= $this->Number->format($tiposContato->id) ?></td>
                <td><?= h($tiposContato->nome) ?></td>
                <td><?= h($tiposContato->created) ?></td>
                <td><?= h($tiposContato->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tiposContato->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tiposContato->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tiposContato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tiposContato->id)]) ?>
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
