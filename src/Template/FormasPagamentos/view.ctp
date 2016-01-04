<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formas Pagamento'), ['action' => 'edit', $formasPagamento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formas Pagamento'), ['action' => 'delete', $formasPagamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formasPagamento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formas Pagamentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formas Pagamento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formasPagamentos view large-9 medium-8 columns content">
    <h3><?= h($formasPagamento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($formasPagamento->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Abreviado') ?></th>
            <td><?= h($formasPagamento->abreviado) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($formasPagamento->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Qtde Dias') ?></th>
            <td><?= $this->Number->format($formasPagamento->qtde_dias) ?></td>
        </tr>
        <tr>
            <th><?= __('Qtde Taxas') ?></th>
            <td><?= $this->Number->format($formasPagamento->qtde_taxas) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($formasPagamento->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($formasPagamento->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Valor Taxas') ?></h4>
        <?= $this->Text->autoParagraph(h($formasPagamento->valor_taxas)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pedidos') ?></h4>
        <?php if (!empty($formasPagamento->pedidos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Empresa Id') ?></th>
                <th><?= __('Data Pedido') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Pessoa Id') ?></th>
                <th><?= __('Condicao Pagamento Id') ?></th>
                <th><?= __('Vendedor Id') ?></th>
                <th><?= __('Transportadora Id') ?></th>
                <th><?= __('Valor Total') ?></th>
                <th><?= __('Numero Cupom') ?></th>
                <th><?= __('Nota Fiscal') ?></th>
                <th><?= __('Serie') ?></th>
                <th><?= __('Numero Caixa') ?></th>
                <th><?= __('Cpf') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($formasPagamento->pedidos as $pedidos): ?>
            <tr>
                <td><?= h($pedidos->id) ?></td>
                <td><?= h($pedidos->empresa_id) ?></td>
                <td><?= h($pedidos->data_pedido) ?></td>
                <td><?= h($pedidos->status) ?></td>
                <td><?= h($pedidos->pessoa_id) ?></td>
                <td><?= h($pedidos->condicao_pagamento_id) ?></td>
                <td><?= h($pedidos->vendedor_id) ?></td>
                <td><?= h($pedidos->transportadora_id) ?></td>
                <td><?= h($pedidos->valor_total) ?></td>
                <td><?= h($pedidos->numero_cupom) ?></td>
                <td><?= h($pedidos->nota_fiscal) ?></td>
                <td><?= h($pedidos->serie) ?></td>
                <td><?= h($pedidos->numero_caixa) ?></td>
                <td><?= h($pedidos->cpf) ?></td>
                <td><?= h($pedidos->created) ?></td>
                <td><?= h($pedidos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pedidos', 'action' => 'view', $pedidos->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pedidos', 'action' => 'edit', $pedidos->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pedidos', 'action' => 'delete', $pedidos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidos->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
