<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pedido'), ['action' => 'edit', $pedido->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pedido'), ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formas Pagamentos'), ['controller' => 'FormasPagamentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formas Pagamento'), ['controller' => 'FormasPagamentos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pedidos view large-9 medium-8 columns content">
    <h3><?= h($pedido->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Empresa') ?></th>
            <td><?= $pedido->has('empresa') ? $this->Html->link($pedido->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $pedido->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $pedido->has('pessoa') ? $this->Html->link($pedido->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pedido->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Serie') ?></th>
            <td><?= h($pedido->serie) ?></td>
        </tr>
        <tr>
            <th><?= __('Cpf') ?></th>
            <td><?= h($pedido->cpf) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pedido->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($pedido->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Condicao Pagamento Id') ?></th>
            <td><?= $this->Number->format($pedido->condicao_pagamento_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Vendedor Id') ?></th>
            <td><?= $this->Number->format($pedido->vendedor_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Transportadora Id') ?></th>
            <td><?= $this->Number->format($pedido->transportadora_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Total') ?></th>
            <td><?= $this->Number->format($pedido->valor_total) ?></td>
        </tr>
        <tr>
            <th><?= __('Numero Cupom') ?></th>
            <td><?= $this->Number->format($pedido->numero_cupom) ?></td>
        </tr>
        <tr>
            <th><?= __('Nota Fiscal') ?></th>
            <td><?= $this->Number->format($pedido->nota_fiscal) ?></td>
        </tr>
        <tr>
            <th><?= __('Numero Caixa') ?></th>
            <td><?= $this->Number->format($pedido->numero_caixa) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Pedido') ?></th>
            <td><?= h($pedido->data_pedido) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pedido->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pedido->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Formas Pagamentos') ?></h4>
        <?php if (!empty($pedido->formas_pagamentos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nome') ?></th>
                <th><?= __('Abreviado') ?></th>
                <th><?= __('Qtde Dias') ?></th>
                <th><?= __('Qtde Taxas') ?></th>
                <th><?= __('Valor Taxas') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pedido->formas_pagamentos as $formasPagamentos): ?>
            <tr>
                <td><?= h($formasPagamentos->id) ?></td>
                <td><?= h($formasPagamentos->nome) ?></td>
                <td><?= h($formasPagamentos->abreviado) ?></td>
                <td><?= h($formasPagamentos->qtde_dias) ?></td>
                <td><?= h($formasPagamentos->qtde_taxas) ?></td>
                <td><?= h($formasPagamentos->valor_taxas) ?></td>
                <td><?= h($formasPagamentos->created) ?></td>
                <td><?= h($formasPagamentos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FormasPagamentos', 'action' => 'view', $formasPagamentos->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'FormasPagamentos', 'action' => 'edit', $formasPagamentos->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FormasPagamentos', 'action' => 'delete', $formasPagamentos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formasPagamentos->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
