<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Icms Estaduai'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="icmsEstaduais index large-9 medium-8 columns content">
    <h3><?= __('Icms Estaduais') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('estado') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('icms_interno') ?></th>
                <th><?= $this->Paginator->sort('icms_externo') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($icmsEstaduais as $icmsEstaduai): ?>
            <tr>
                <td><?= $this->Number->format($icmsEstaduai->id) ?></td>
                <td><?= h($icmsEstaduai->estado) ?></td>
                <td><?= h($icmsEstaduai->nome) ?></td>
                <td><?= $this->Number->format($icmsEstaduai->icms_interno) ?></td>
                <td><?= $this->Number->format($icmsEstaduai->icms_externo) ?></td>
                <td><?= h($icmsEstaduai->created) ?></td>
                <td><?= h($icmsEstaduai->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $icmsEstaduai->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $icmsEstaduai->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $icmsEstaduai->id], ['confirm' => __('Are you sure you want to delete # {0}?', $icmsEstaduai->id)]) ?>
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
