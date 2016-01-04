<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Parametro'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parametros index large-9 medium-8 columns content">
    <h3><?= __('Parametros') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('chave') ?></th>
                <th><?= $this->Paginator->sort('tipo') ?></th>
                <th><?= $this->Paginator->sort('grupo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parametros as $parametro): ?>
            <tr>
                <td><?= $this->Number->format($parametro->id) ?></td>
                <td><?= h($parametro->nome) ?></td>
                <td><?= h($parametro->chave) ?></td>
                <td><?= $this->Number->format($parametro->tipo) ?></td>
                <td><?= h($parametro->grupo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $parametro->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $parametro->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $parametro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parametro->id)]) ?>
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
