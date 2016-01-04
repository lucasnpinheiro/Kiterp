<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Caixas Movimento'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="caixasMovimentos index large-9 medium-8 columns content">
    <h3><?= __('Caixas Movimentos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('caixa_diario_id') ?></th>
                <th><?= $this->Paginator->sort('data_movimento') ?></th>
                <th><?= $this->Paginator->sort('numero documento') ?></th>
                <th><?= $this->Paginator->sort('tipo_lancamento') ?></th>
                <th><?= $this->Paginator->sort('valor') ?></th>
                <th><?= $this->Paginator->sort('modalidade') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($caixasMovimentos as $caixasMovimento): ?>
            <tr>
                <td><?= $this->Number->format($caixasMovimento->id) ?></td>
                <td><?= $this->Number->format($caixasMovimento->caixa_diario_id) ?></td>
                <td><?= h($caixasMovimento->data_movimento) ?></td>
                <td><?= h($caixasMovimento->numero_documento) ?></td>
                <td><?= $this->Number->format($caixasMovimento->tipo_lancamento) ?></td>
                <td><?= $this->Number->format($caixasMovimento->valor) ?></td>
                <td><?= $this->Number->format($caixasMovimento->modalidade) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $caixasMovimento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $caixasMovimento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $caixasMovimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caixasMovimento->id)]) ?>
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
