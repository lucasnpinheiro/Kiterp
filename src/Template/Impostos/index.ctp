<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Imposto'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="impostos index large-9 medium-8 columns content">
    <h3><?= __('Impostos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('tipo_imposto') ?></th>
                <th><?= $this->Paginator->sort('codigo') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($impostos as $imposto): ?>
            <tr>
                <td><?= $this->Number->format($imposto->id) ?></td>
                <td><?= $this->Number->format($imposto->tipo_imposto) ?></td>
                <td><?= h($imposto->codigo) ?></td>
                <td><?= h($imposto->nome) ?></td>
                <td><?= h($imposto->created) ?></td>
                <td><?= h($imposto->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $imposto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $imposto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $imposto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imposto->id)]) ?>
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
