<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Condicoes Pagamento'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="condicoesPagamentos index large-9 medium-8 columns content">
    <h3><?= __('Condicoes Pagamentos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('qtde_parcelas') ?></th>
                <th><?= $this->Paginator->sort('qtde_dias') ?></th>
                <th><?= $this->Paginator->sort('creatde') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($condicoesPagamentos as $condicoesPagamento): ?>
            <tr>
                <td><?= $this->Number->format($condicoesPagamento->id) ?></td>
                <td><?= h($condicoesPagamento->nome) ?></td>
                <td><?= $this->Number->format($condicoesPagamento->qtde_parcelas) ?></td>
                <td><?= $this->Number->format($condicoesPagamento->qtde_dias) ?></td>
                <td><?= h($condicoesPagamento->creatde) ?></td>
                <td><?= h($condicoesPagamento->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $condicoesPagamento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $condicoesPagamento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $condicoesPagamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $condicoesPagamento->id)]) ?>
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
