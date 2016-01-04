<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Formas Pagamento'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formasPagamentos index large-9 medium-8 columns content">
    <h3><?= __('Formas Pagamentos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('abreviado') ?></th>
                <th><?= $this->Paginator->sort('qtde_dias') ?></th>
                <th><?= $this->Paginator->sort('qtde_taxas') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formasPagamentos as $formasPagamento): ?>
            <tr>
                <td><?= $this->Number->format($formasPagamento->id) ?></td>
                <td><?= h($formasPagamento->nome) ?></td>
                <td><?= h($formasPagamento->abreviado) ?></td>
                <td><?= $this->Number->format($formasPagamento->qtde_dias) ?></td>
                <td><?= $this->Number->format($formasPagamento->qtde_taxas) ?></td>
                <td><?= h($formasPagamento->created) ?></td>
                <td><?= h($formasPagamento->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $formasPagamento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $formasPagamento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $formasPagamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formasPagamento->id)]) ?>
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
