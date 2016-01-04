<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Empresa'), ['action' => 'edit', $empresa->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Empresa'), ['action' => 'delete', $empresa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empresa->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contas Pagar'), ['controller' => 'ContasPagar', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contas Pagar'), ['controller' => 'ContasPagar', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contas Receber'), ['controller' => 'ContasReceber', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contas Receber'), ['controller' => 'ContasReceber', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nota Fiscal Entrada'), ['controller' => 'NotaFiscalEntrada', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nota Fiscal Entrada'), ['controller' => 'NotaFiscalEntrada', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nota Fiscal Saida'), ['controller' => 'NotaFiscalSaida', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nota Fiscal Saida'), ['controller' => 'NotaFiscalSaida', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos Kits'), ['controller' => 'ProdutosKits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produtos Kit'), ['controller' => 'ProdutosKits', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="empresas view large-9 medium-8 columns content">
    <h3><?= h($empresa->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $empresa->has('pessoa') ? $this->Html->link($empresa->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $empresa->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Versao Sefaz') ?></th>
            <td><?= h($empresa->versao_sefaz) ?></td>
        </tr>
        <tr>
            <th><?= __('Hora Tzd') ?></th>
            <td><?= h($empresa->hora_tzd) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($empresa->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Codigo Cidade') ?></th>
            <td><?= $this->Number->format($empresa->codigo_cidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Regime Tributario') ?></th>
            <td><?= $this->Number->format($empresa->regime_tributario) ?></td>
        </tr>
        <tr>
            <th><?= __('Perentual Tributo') ?></th>
            <td><?= $this->Number->format($empresa->perentual_tributo) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Contas Pagar') ?></h4>
        <?php if (!empty($empresa->contas_pagar)): ?>
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
            <?php foreach ($empresa->contas_pagar as $contasPagar): ?>
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
        <?php if (!empty($empresa->contas_receber)): ?>
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
            <?php foreach ($empresa->contas_receber as $contasReceber): ?>
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
    <div class="related">
        <h4><?= __('Related Nota Fiscal Entrada') ?></h4>
        <?php if (!empty($empresa->nota_fiscal_entrada)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Empresa Id') ?></th>
                <th><?= __('Numero Nota Fiscal') ?></th>
                <th><?= __('Serie') ?></th>
                <th><?= __('Pessoa Id') ?></th>
                <th><?= __('Cfop Id') ?></th>
                <th><?= __('Data Emissao') ?></th>
                <th><?= __('Data Entrada') ?></th>
                <th><?= __('Total Produtos') ?></th>
                <th><?= __('Total Nota') ?></th>
                <th><?= __('Base Icms') ?></th>
                <th><?= __('Valor Icms') ?></th>
                <th><?= __('Base St') ?></th>
                <th><?= __('Valor St') ?></th>
                <th><?= __('Valor Ipi') ?></th>
                <th><?= __('Valor Frete') ?></th>
                <th><?= __('Valor Seguro') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->nota_fiscal_entrada as $notaFiscalEntrada): ?>
            <tr>
                <td><?= h($notaFiscalEntrada->id) ?></td>
                <td><?= h($notaFiscalEntrada->empresa_id) ?></td>
                <td><?= h($notaFiscalEntrada->numero_nota_fiscal) ?></td>
                <td><?= h($notaFiscalEntrada->serie) ?></td>
                <td><?= h($notaFiscalEntrada->pessoa_id) ?></td>
                <td><?= h($notaFiscalEntrada->cfop_id) ?></td>
                <td><?= h($notaFiscalEntrada->data_emissao) ?></td>
                <td><?= h($notaFiscalEntrada->data_entrada) ?></td>
                <td><?= h($notaFiscalEntrada->total_produtos) ?></td>
                <td><?= h($notaFiscalEntrada->total_nota) ?></td>
                <td><?= h($notaFiscalEntrada->base_icms) ?></td>
                <td><?= h($notaFiscalEntrada->valor_icms) ?></td>
                <td><?= h($notaFiscalEntrada->base_st) ?></td>
                <td><?= h($notaFiscalEntrada->valor_st) ?></td>
                <td><?= h($notaFiscalEntrada->valor_ipi) ?></td>
                <td><?= h($notaFiscalEntrada->valor_frete) ?></td>
                <td><?= h($notaFiscalEntrada->valor_seguro) ?></td>
                <td><?= h($notaFiscalEntrada->created) ?></td>
                <td><?= h($notaFiscalEntrada->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'NotaFiscalEntrada', 'action' => 'view', $notaFiscalEntrada->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'NotaFiscalEntrada', 'action' => 'edit', $notaFiscalEntrada->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'NotaFiscalEntrada', 'action' => 'delete', $notaFiscalEntrada->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notaFiscalEntrada->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Nota Fiscal Saida') ?></h4>
        <?php if (!empty($empresa->nota_fiscal_saida)): ?>
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
            <?php foreach ($empresa->nota_fiscal_saida as $notaFiscalSaida): ?>
            <tr>
                <td><?= h($notaFiscalSaida->id) ?></td>
                <td><?= h($notaFiscalSaida->empresa_id) ?></td>
                <td><?= h($notaFiscalSaida->numero_nota_fiscal) ?></td>
                <td><?= h($notaFiscalSaida->serie) ?></td>
                <td><?= h($notaFiscalSaida->cfop_id) ?></td>
                <td><?= h($notaFiscalSaida->pessoa_id) ?></td>
                <td><?= h($notaFiscalSaida->data_emissao) ?></td>
                <td><?= h($notaFiscalSaida->data_saida) ?></td>
                <td><?= h($notaFiscalSaida->hora_saida) ?></td>
                <td><?= h($notaFiscalSaida->forma_pagamento_id) ?></td>
                <td><?= h($notaFiscalSaida->total_produtos) ?></td>
                <td><?= h($notaFiscalSaida->total_nota) ?></td>
                <td><?= h($notaFiscalSaida->base_icms) ?></td>
                <td><?= h($notaFiscalSaida->valor_icms) ?></td>
                <td><?= h($notaFiscalSaida->transportadora_id) ?></td>
                <td><?= h($notaFiscalSaida->vendedor_id) ?></td>
                <td><?= h($notaFiscalSaida->cancelada) ?></td>
                <td><?= h($notaFiscalSaida->data_cancelada) ?></td>
                <td><?= h($notaFiscalSaida->numero_pedido) ?></td>
                <td><?= h($notaFiscalSaida->frete) ?></td>
                <td><?= h($notaFiscalSaida->qtde_volumes) ?></td>
                <td><?= h($notaFiscalSaida->especie) ?></td>
                <td><?= h($notaFiscalSaida->base_st) ?></td>
                <td><?= h($notaFiscalSaida->valor_st) ?></td>
                <td><?= h($notaFiscalSaida->base_credito) ?></td>
                <td><?= h($notaFiscalSaida->valor_credito) ?></td>
                <td><?= h($notaFiscalSaida->percentual_tributo) ?></td>
                <td><?= h($notaFiscalSaida->valor_tributo) ?></td>
                <td><?= h($notaFiscalSaida->operacao) ?></td>
                <td><?= h($notaFiscalSaida->atendimento) ?></td>
                <td><?= h($notaFiscalSaida->data_hora) ?></td>
                <td><?= h($notaFiscalSaida->created) ?></td>
                <td><?= h($notaFiscalSaida->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'NotaFiscalSaida', 'action' => 'view', $notaFiscalSaida->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'NotaFiscalSaida', 'action' => 'edit', $notaFiscalSaida->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'NotaFiscalSaida', 'action' => 'delete', $notaFiscalSaida->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notaFiscalSaida->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pedidos') ?></h4>
        <?php if (!empty($empresa->pedidos)): ?>
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
            <?php foreach ($empresa->pedidos as $pedidos): ?>
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
    <div class="related">
        <h4><?= __('Related Produtos Kits') ?></h4>
        <?php if (!empty($empresa->produtos_kits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Empresa Id') ?></th>
                <th><?= __('Produto Id') ?></th>
                <th><?= __('Kit Id') ?></th>
                <th><?= __('Qtde') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($empresa->produtos_kits as $produtosKits): ?>
            <tr>
                <td><?= h($produtosKits->id) ?></td>
                <td><?= h($produtosKits->empresa_id) ?></td>
                <td><?= h($produtosKits->produto_id) ?></td>
                <td><?= h($produtosKits->kit_id) ?></td>
                <td><?= h($produtosKits->qtde) ?></td>
                <td><?= h($produtosKits->created) ?></td>
                <td><?= h($produtosKits->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProdutosKits', 'action' => 'view', $produtosKits->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProdutosKits', 'action' => 'edit', $produtosKits->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProdutosKits', 'action' => 'delete', $produtosKits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosKits->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
