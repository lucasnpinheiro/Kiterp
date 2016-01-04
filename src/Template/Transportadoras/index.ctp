<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Transportadora'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Saidas'), ['controller' => 'NotaFiscalSaidas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Saida'), ['controller' => 'NotaFiscalSaidas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transportadoras index large-9 medium-8 columns content">
    <h3><?= __('Transportadoras') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('contado') ?></th>
                <th><?= $this->Paginator->sort('telefone1') ?></th>
                <th><?= $this->Paginator->sort('telefone2') ?></th>
                <th><?= $this->Paginator->sort('cnpj') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transportadoras as $transportadora): ?>
            <tr>
                <td><?= $this->Number->format($transportadora->id) ?></td>
                <td><?= h($transportadora->nome) ?></td>
                <td><?= h($transportadora->contado) ?></td>
                <td><?= h($transportadora->telefone1) ?></td>
                <td><?= h($transportadora->telefone2) ?></td>
                <td><?= h($transportadora->cnpj) ?></td>
                <td><?= h($transportadora->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $transportadora->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transportadora->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transportadora->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transportadora->id)]) ?>
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
