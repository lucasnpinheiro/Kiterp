<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Caixas Diario'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="caixasDiarios index large-9 medium-8 columns content">
    <h3><?= __('Caixas Diarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('numero_caixa') ?></th>
                <th><?= $this->Paginator->sort('operador') ?></th>
                <th><?= $this->Paginator->sort('data_abertura') ?></th>
                <th><?= $this->Paginator->sort('data_encerramento') ?></th>
                <th><?= $this->Paginator->sort('valor_inicial') ?></th>
                <th><?= $this->Paginator->sort('total_entradas') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($caixasDiarios as $caixasDiario): ?>
            <tr>
                <td><?= $this->Number->format($caixasDiario->id) ?></td>
                <td><?= $this->Number->format($caixasDiario->numero_caixa) ?></td>
                <td><?= h($caixasDiario->operador) ?></td>
                <td><?= h($caixasDiario->data_abertura) ?></td>
                <td><?= h($caixasDiario->data_encerramento) ?></td>
                <td><?= $this->Number->format($caixasDiario->valor_inicial) ?></td>
                <td><?= $this->Number->format($caixasDiario->total_entradas) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $caixasDiario->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $caixasDiario->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $caixasDiario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caixasDiario->id)]) ?>
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
