<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pessoas Contato'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoasContatos index large-9 medium-8 columns content">
    <h3><?= __('Pessoas Contatos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                <th><?= $this->Paginator->sort('tipo_contato_id') ?></th>
                <th><?= $this->Paginator->sort('valor') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoasContatos as $pessoasContato): ?>
            <tr>
                <td><?= $this->Number->format($pessoasContato->id) ?></td>
                <td><?= $pessoasContato->has('pessoa') ? $this->Html->link($pessoasContato->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pessoasContato->pessoa->id]) : '' ?></td>
                <td><?= $this->Number->format($pessoasContato->tipo_contato_id) ?></td>
                <td><?= h($pessoasContato->valor) ?></td>
                <td><?= $this->Number->format($pessoasContato->status) ?></td>
                <td><?= h($pessoasContato->created) ?></td>
                <td><?= h($pessoasContato->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pessoasContato->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pessoasContato->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pessoasContato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasContato->id)]) ?>
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
