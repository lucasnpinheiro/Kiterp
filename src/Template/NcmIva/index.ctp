<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ncm Iva'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ncmIva index large-9 medium-8 columns content">
    <h3><?= __('Ncm Iva') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('ncm_id') ?></th>
                <th><?= $this->Paginator->sort('icms_estadual_id') ?></th>
                <th><?= $this->Paginator->sort('iva') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ncmIva as $ncmIva): ?>
            <tr>
                <td><?= $this->Number->format($ncmIva->id) ?></td>
                <td><?= $this->Number->format($ncmIva->ncm_id) ?></td>
                <td><?= $this->Number->format($ncmIva->icms_estadual_id) ?></td>
                <td><?= $this->Number->format($ncmIva->iva) ?></td>
                <td><?= h($ncmIva->created) ?></td>
                <td><?= h($ncmIva->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ncmIva->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ncmIva->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ncmIva->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ncmIva->id)]) ?>
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
