<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pessoa'), ['action' => 'edit', $pessoa->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pessoa'), ['action' => 'delete', $pessoa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoa->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contas Pagar'), ['controller' => 'ContasPagar', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contas Pagar'), ['controller' => 'ContasPagar', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contas Receber'), ['controller' => 'ContasReceber', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contas Receber'), ['controller' => 'ContasReceber', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nota Fiscal Entradas'), ['controller' => 'NotaFiscalEntradas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nota Fiscal Entrada'), ['controller' => 'NotaFiscalEntradas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nota Fiscal Saidas'), ['controller' => 'NotaFiscalSaidas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nota Fiscal Saida'), ['controller' => 'NotaFiscalSaidas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pessoas view large-9 medium-8 columns content">
    <h3><?= h($pessoa->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($pessoa->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pessoa->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo Pessoa') ?></th>
            <td><?= $this->Number->format($pessoa->tipo_pessoa) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($pessoa->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Consumidor Final') ?></th>
            <td><?= $this->Number->format($pessoa->consumidor_final) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo Contribuinte') ?></th>
            <td><?= $this->Number->format($pessoa->tipo_contribuinte) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pessoa->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pessoa->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Contas Pagar') ?></h4>
        <?php if (!empty($pessoa->contas_pagar)): ?>
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
            <?php foreach ($pessoa->contas_pagar as $contasPagar): ?>
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
        <?php if (!empty($pessoa->contas_receber)): ?>
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
            <?php foreach ($pessoa->contas_receber as $contasReceber): ?>
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
        <h4><?= __('Related Empresas') ?></h4>
        <?php if (!empty($pessoa->empresas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Pessoa Id') ?></th>
                <th><?= __('Codigo Cidade') ?></th>
                <th><?= __('Regime Tributario') ?></th>
                <th><?= __('Versao Sefaz') ?></th>
                <th><?= __('Perentual Tributo') ?></th>
                <th><?= __('Hora Tzd') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pessoa->empresas as $empresas): ?>
            <tr>
                <td><?= h($empresas->id) ?></td>
                <td><?= h($empresas->pessoa_id) ?></td>
                <td><?= h($empresas->codigo_cidade) ?></td>
                <td><?= h($empresas->regime_tributario) ?></td>
                <td><?= h($empresas->versao_sefaz) ?></td>
                <td><?= h($empresas->perentual_tributo) ?></td>
                <td><?= h($empresas->hora_tzd) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Empresas', 'action' => 'view', $empresas->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Empresas', 'action' => 'edit', $empresas->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Empresas', 'action' => 'delete', $empresas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empresas->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Nota Fiscal Entradas') ?></h4>
        <?php if (!empty($pessoa->nota_fiscal_entradas)): ?>
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
            <?php foreach ($pessoa->nota_fiscal_entradas as $notaFiscalEntradas): ?>
            <tr>
                <td><?= h($notaFiscalEntradas->id) ?></td>
                <td><?= h($notaFiscalEntradas->empresa_id) ?></td>
                <td><?= h($notaFiscalEntradas->numero_nota_fiscal) ?></td>
                <td><?= h($notaFiscalEntradas->serie) ?></td>
                <td><?= h($notaFiscalEntradas->pessoa_id) ?></td>
                <td><?= h($notaFiscalEntradas->cfop_id) ?></td>
                <td><?= h($notaFiscalEntradas->data_emissao) ?></td>
                <td><?= h($notaFiscalEntradas->data_entrada) ?></td>
                <td><?= h($notaFiscalEntradas->total_produtos) ?></td>
                <td><?= h($notaFiscalEntradas->total_nota) ?></td>
                <td><?= h($notaFiscalEntradas->base_icms) ?></td>
                <td><?= h($notaFiscalEntradas->valor_icms) ?></td>
                <td><?= h($notaFiscalEntradas->base_st) ?></td>
                <td><?= h($notaFiscalEntradas->valor_st) ?></td>
                <td><?= h($notaFiscalEntradas->valor_ipi) ?></td>
                <td><?= h($notaFiscalEntradas->valor_frete) ?></td>
                <td><?= h($notaFiscalEntradas->valor_seguro) ?></td>
                <td><?= h($notaFiscalEntradas->created) ?></td>
                <td><?= h($notaFiscalEntradas->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'NotaFiscalEntradas', 'action' => 'view', $notaFiscalEntradas->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'NotaFiscalEntradas', 'action' => 'edit', $notaFiscalEntradas->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'NotaFiscalEntradas', 'action' => 'delete', $notaFiscalEntradas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notaFiscalEntradas->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Nota Fiscal Saidas') ?></h4>
        <?php if (!empty($pessoa->nota_fiscal_saidas)): ?>
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
            <?php foreach ($pessoa->nota_fiscal_saidas as $notaFiscalSaidas): ?>
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
        <?php if (!empty($pessoa->pedidos)): ?>
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
            <?php foreach ($pessoa->pedidos as $pedidos): ?>
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
        <h4><?= __('Related Usuarios') ?></h4>
        <?php if (!empty($pessoa->usuarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Pessoa Id') ?></th>
                <th><?= __('Nome') ?></th>
                <th><?= __('Username') ?></th>
                <th><?= __('Senha') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pessoa->usuarios as $usuarios): ?>
            <tr>
                <td><?= h($usuarios->id) ?></td>
                <td><?= h($usuarios->pessoa_id) ?></td>
                <td><?= h($usuarios->nome) ?></td>
                <td><?= h($usuarios->username) ?></td>
                <td><?= h($usuarios->senha) ?></td>
                <td><?= h($usuarios->created) ?></td>
                <td><?= h($usuarios->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Usuarios', 'action' => 'view', $usuarios->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Usuarios', 'action' => 'edit', $usuarios->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Usuarios', 'action' => 'delete', $usuarios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuarios->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
