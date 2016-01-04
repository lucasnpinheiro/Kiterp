<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Banco'), ['action' => 'edit', $banco->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Banco'), ['action' => 'delete', $banco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $banco->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bancos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Banco'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contas Pagar'), ['controller' => 'ContasPagar', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contas Pagar'), ['controller' => 'ContasPagar', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contas Receber'), ['controller' => 'ContasReceber', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contas Receber'), ['controller' => 'ContasReceber', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bancos view large-9 medium-8 columns content">
    <h3><?= h($banco->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($banco->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Agencia') ?></th>
            <td><?= h($banco->agencia) ?></td>
        </tr>
        <tr>
            <th><?= __('Conta Corrente') ?></th>
            <td><?= h($banco->conta_corrente) ?></td>
        </tr>
        <tr>
            <th><?= __('Caminho Arquivo') ?></th>
            <td><?= h($banco->caminho_arquivo) ?></td>
        </tr>
        <tr>
            <th><?= __('Sacador Avalista') ?></th>
            <td><?= h($banco->sacador_avalista) ?></td>
        </tr>
        <tr>
            <th><?= __('Cnpj Sacador') ?></th>
            <td><?= h($banco->cnpj_sacador) ?></td>
        </tr>
        <tr>
            <th><?= __('Contrato') ?></th>
            <td><?= h($banco->contrato) ?></td>
        </tr>
        <tr>
            <th><?= __('Carteira') ?></th>
            <td><?= h($banco->carteira) ?></td>
        </tr>
        <tr>
            <th><?= __('Convenio') ?></th>
            <td><?= h($banco->convenio) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($banco->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Codigo Banco') ?></th>
            <td><?= $this->Number->format($banco->codigo_banco) ?></td>
        </tr>
        <tr>
            <th><?= __('Sequencial Arquivo') ?></th>
            <td><?= $this->Number->format($banco->sequencial_arquivo) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($banco->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($banco->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Contas Pagar') ?></h4>
        <?php if (!empty($banco->contas_pagar)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Empresa Id') ?></th>
                <th><?= __('Numero Documento') ?></th>
                <th><?= __('Data Vencimento') ?></th>
                <th><?= __('Valor Documento') ?></th>
                <th><?= __('Pessoa Id') ?></th>
                <th><?= __('Banco Id') ?></th>
                <th><?= __('Tradutora Id') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Data Pagamento') ?></th>
                <th><?= __('Valor Pagamento') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($banco->contas_pagar as $contasPagar): ?>
            <tr>
                <td><?= h($contasPagar->id) ?></td>
                <td><?= h($contasPagar->empresa_id) ?></td>
                <td><?= h($contasPagar->numero_documento) ?></td>
                <td><?= h($contasPagar->data_vencimento) ?></td>
                <td><?= h($contasPagar->valor_documento) ?></td>
                <td><?= h($contasPagar->pessoa_id) ?></td>
                <td><?= h($contasPagar->banco_id) ?></td>
                <td><?= h($contasPagar->tradutora_id) ?></td>
                <td><?= h($contasPagar->status) ?></td>
                <td><?= h($contasPagar->data_pagamento) ?></td>
                <td><?= h($contasPagar->valor_pagamento) ?></td>
                <td><?= h($contasPagar->created) ?></td>
                <td><?= h($contasPagar->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ContasPagar', 'action' => 'view', $contasPagar->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'ContasPagar', 'action' => 'edit', $contasPagar->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ContasPagar', 'action' => 'delete', $contasPagar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contasPagar->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Contas Receber') ?></h4>
        <?php if (!empty($banco->contas_receber)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Empresa Id') ?></th>
                <th><?= __('Numero Documento') ?></th>
                <th><?= __('Data Vencimento') ?></th>
                <th><?= __('Valor Documento') ?></th>
                <th><?= __('Pessoa Id') ?></th>
                <th><?= __('Banco Id') ?></th>
                <th><?= __('Tradutora Id') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Data Recebimento') ?></th>
                <th><?= __('Valor Recebimento') ?></th>
                <th><?= __('Numero Pedido') ?></th>
                <th><?= __('Nota Fiscal') ?></th>
                <th><?= __('Serie') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($banco->contas_receber as $contasReceber): ?>
            <tr>
                <td><?= h($contasReceber->id) ?></td>
                <td><?= h($contasReceber->empresa_id) ?></td>
                <td><?= h($contasReceber->numero_documento) ?></td>
                <td><?= h($contasReceber->data_vencimento) ?></td>
                <td><?= h($contasReceber->valor_documento) ?></td>
                <td><?= h($contasReceber->pessoa_id) ?></td>
                <td><?= h($contasReceber->banco_id) ?></td>
                <td><?= h($contasReceber->tradutora_id) ?></td>
                <td><?= h($contasReceber->status) ?></td>
                <td><?= h($contasReceber->data_recebimento) ?></td>
                <td><?= h($contasReceber->valor_recebimento) ?></td>
                <td><?= h($contasReceber->numero_pedido) ?></td>
                <td><?= h($contasReceber->nota_fiscal) ?></td>
                <td><?= h($contasReceber->serie) ?></td>
                <td><?= h($contasReceber->created) ?></td>
                <td><?= h($contasReceber->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ContasReceber', 'action' => 'view', $contasReceber->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'ContasReceber', 'action' => 'edit', $contasReceber->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ContasReceber', 'action' => 'delete', $contasReceber->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contasReceber->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
