<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transportadora'), ['action' => 'edit', $transportadora->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transportadora'), ['action' => 'delete', $transportadora->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transportadora->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transportadoras'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transportadora'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nota Fiscal Saidas'), ['controller' => 'NotaFiscalSaidas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nota Fiscal Saida'), ['controller' => 'NotaFiscalSaidas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transportadoras view large-9 medium-8 columns content">
    <h3><?= h($transportadora->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($transportadora->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Contado') ?></th>
            <td><?= h($transportadora->contado) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefone1') ?></th>
            <td><?= h($transportadora->telefone1) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefone2') ?></th>
            <td><?= h($transportadora->telefone2) ?></td>
        </tr>
        <tr>
            <th><?= __('Cnpj') ?></th>
            <td><?= h($transportadora->cnpj) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($transportadora->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($transportadora->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($transportadora->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Nota Fiscal Saidas') ?></h4>
        <?php if (!empty($transportadora->nota_fiscal_saidas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Empresa Id') ?></th>
                <th><?= __('Numero Nota Fiscal') ?></th>
                <th><?= __('Serie') ?></th>
                <th><?= __('Cfop Id') ?></th>
                <th><?= __('Pessoa Id') ?></th>
                <th><?= __('Data Emissao') ?></th>
                <th><?= __('Data Saida') ?></th>
                <th><?= __('Hora Saida') ?></th>
                <th><?= __('Forma Pagamento Id') ?></th>
                <th><?= __('Total Produtos') ?></th>
                <th><?= __('Total Nota') ?></th>
                <th><?= __('Base Icms') ?></th>
                <th><?= __('Valor Icms') ?></th>
                <th><?= __('Transportadora Id') ?></th>
                <th><?= __('Vendedor Id') ?></th>
                <th><?= __('Cancelada') ?></th>
                <th><?= __('Data Cancelada') ?></th>
                <th><?= __('Numero Pedido') ?></th>
                <th><?= __('Frete') ?></th>
                <th><?= __('Qtde Volumes') ?></th>
                <th><?= __('Especie') ?></th>
                <th><?= __('Base St') ?></th>
                <th><?= __('Valor St') ?></th>
                <th><?= __('Base Credito') ?></th>
                <th><?= __('Valor Credito') ?></th>
                <th><?= __('Percentual Tributo') ?></th>
                <th><?= __('Valor Tributo') ?></th>
                <th><?= __('Operacao') ?></th>
                <th><?= __('Atendimento') ?></th>
                <th><?= __('Data Hora') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($transportadora->nota_fiscal_saidas as $notaFiscalSaidas): ?>
            <tr>
                <td><?= h($notaFiscalSaidas->id) ?></td>
                <td><?= h($notaFiscalSaidas->empresa_id) ?></td>
                <td><?= h($notaFiscalSaidas->numero_nota_fiscal) ?></td>
                <td><?= h($notaFiscalSaidas->serie) ?></td>
                <td><?= h($notaFiscalSaidas->cfop_id) ?></td>
                <td><?= h($notaFiscalSaidas->pessoa_id) ?></td>
                <td><?= h($notaFiscalSaidas->data_emissao) ?></td>
                <td><?= h($notaFiscalSaidas->data_saida) ?></td>
                <td><?= h($notaFiscalSaidas->hora_saida) ?></td>
                <td><?= h($notaFiscalSaidas->forma_pagamento_id) ?></td>
                <td><?= h($notaFiscalSaidas->total_produtos) ?></td>
                <td><?= h($notaFiscalSaidas->total_nota) ?></td>
                <td><?= h($notaFiscalSaidas->base_icms) ?></td>
                <td><?= h($notaFiscalSaidas->valor_icms) ?></td>
                <td><?= h($notaFiscalSaidas->transportadora_id) ?></td>
                <td><?= h($notaFiscalSaidas->vendedor_id) ?></td>
                <td><?= h($notaFiscalSaidas->cancelada) ?></td>
                <td><?= h($notaFiscalSaidas->data_cancelada) ?></td>
                <td><?= h($notaFiscalSaidas->numero_pedido) ?></td>
                <td><?= h($notaFiscalSaidas->frete) ?></td>
                <td><?= h($notaFiscalSaidas->qtde_volumes) ?></td>
                <td><?= h($notaFiscalSaidas->especie) ?></td>
                <td><?= h($notaFiscalSaidas->base_st) ?></td>
                <td><?= h($notaFiscalSaidas->valor_st) ?></td>
                <td><?= h($notaFiscalSaidas->base_credito) ?></td>
                <td><?= h($notaFiscalSaidas->valor_credito) ?></td>
                <td><?= h($notaFiscalSaidas->percentual_tributo) ?></td>
                <td><?= h($notaFiscalSaidas->valor_tributo) ?></td>
                <td><?= h($notaFiscalSaidas->operacao) ?></td>
                <td><?= h($notaFiscalSaidas->atendimento) ?></td>
                <td><?= h($notaFiscalSaidas->data_hora) ?></td>
                <td><?= h($notaFiscalSaidas->created) ?></td>
                <td><?= h($notaFiscalSaidas->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'NotaFiscalSaidas', 'action' => 'view', $notaFiscalSaidas->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'NotaFiscalSaidas', 'action' => 'edit', $notaFiscalSaidas->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'NotaFiscalSaidas', 'action' => 'delete', $notaFiscalSaidas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notaFiscalSaidas->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pedidos') ?></h4>
        <?php if (!empty($transportadora->pedidos)): ?>
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
            <?php foreach ($transportadora->pedidos as $pedidos): ?>
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
