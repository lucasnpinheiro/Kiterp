<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Condicoes Pagamento'), ['action' => 'edit', $condicoesPagamento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Condicoes Pagamento'), ['action' => 'delete', $condicoesPagamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $condicoesPagamento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Condicoes Pagamentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Condicoes Pagamento'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="condicoesPagamentos view large-9 medium-8 columns content">
    <h3><?= h($condicoesPagamento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($condicoesPagamento->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($condicoesPagamento->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Qtde Parcelas') ?></th>
            <td><?= $this->Number->format($condicoesPagamento->qtde_parcelas) ?></td>
        </tr>
        <tr>
            <th><?= __('Qtde Dias') ?></th>
            <td><?= $this->Number->format($condicoesPagamento->qtde_dias) ?></td>
        </tr>
        <tr>
            <th><?= __('Creatde') ?></th>
            <td><?= h($condicoesPagamento->creatde) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($condicoesPagamento->modified) ?></td>
        </tr>
    </table>
</div>
