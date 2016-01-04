<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ncm Iva'), ['action' => 'edit', $ncmIva->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ncm Iva'), ['action' => 'delete', $ncmIva->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ncmIva->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ncm Iva'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ncm Iva'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ncmIva view large-9 medium-8 columns content">
    <h3><?= h($ncmIva->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($ncmIva->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Ncm Id') ?></th>
            <td><?= $this->Number->format($ncmIva->ncm_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Icms Estadual Id') ?></th>
            <td><?= $this->Number->format($ncmIva->icms_estadual_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Iva') ?></th>
            <td><?= $this->Number->format($ncmIva->iva) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($ncmIva->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($ncmIva->modified) ?></td>
        </tr>
    </table>
</div>
