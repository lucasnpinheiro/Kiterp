<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Notas Fiscais Saida'), ['action' => 'edit', $notasFiscaisSaida->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notas Fiscais Saida'), ['action' => 'delete', $notasFiscaisSaida->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notasFiscaisSaida->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notas Fiscais Saidas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notas Fiscais Saida'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transportadoras'), ['controller' => 'Transportadoras', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transportadora'), ['controller' => 'Transportadoras', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Notas Fiscais Saidas Itens'), ['controller' => 'NotasFiscaisSaidasItens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notas Fiscais Saidas Iten'), ['controller' => 'NotasFiscaisSaidasItens', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notasFiscaisSaidas view large-9 medium-8 columns content">
    <h3><?= h($notasFiscaisSaida->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Empresa') ?></th>
            <td><?= $notasFiscaisSaida->has('empresa') ? $this->Html->link($notasFiscaisSaida->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $notasFiscaisSaida->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Serie') ?></th>
            <td><?= h($notasFiscaisSaida->serie) ?></td>
        </tr>
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $notasFiscaisSaida->has('pessoa') ? $this->Html->link($notasFiscaisSaida->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'view', $notasFiscaisSaida->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Hora Saida') ?></th>
            <td><?= h($notasFiscaisSaida->hora_saida) ?></td>
        </tr>
        <tr>
            <th><?= __('Transportadora') ?></th>
            <td><?= $notasFiscaisSaida->has('transportadora') ? $this->Html->link($notasFiscaisSaida->transportadora->id, ['controller' => 'Transportadoras', 'action' => 'view', $notasFiscaisSaida->transportadora->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Especie') ?></th>
            <td><?= h($notasFiscaisSaida->especie) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Hora') ?></th>
            <td><?= h($notasFiscaisSaida->data_hora) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Numero Nota Fiscal') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->numero_nota_fiscal) ?></td>
        </tr>
        <tr>
            <th><?= __('Cfop Id') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->cfop_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Forma Pagamento Id') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->forma_pagamento_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Produtos') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->total_produtos) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Nota') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->total_nota) ?></td>
        </tr>
        <tr>
            <th><?= __('Base Icms') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->base_icms) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Icms') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->valor_icms) ?></td>
        </tr>
        <tr>
            <th><?= __('Vendedor Id') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->vendedor_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Cancelada') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->cancelada) ?></td>
        </tr>
        <tr>
            <th><?= __('Numero Pedido') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->numero_pedido) ?></td>
        </tr>
        <tr>
            <th><?= __('Frete') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->frete) ?></td>
        </tr>
        <tr>
            <th><?= __('Qtde Volumes') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->qtde_volumes) ?></td>
        </tr>
        <tr>
            <th><?= __('Base St') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->base_st) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor St') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->valor_st) ?></td>
        </tr>
        <tr>
            <th><?= __('Base Credito') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->base_credito) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Credito') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->valor_credito) ?></td>
        </tr>
        <tr>
            <th><?= __('Percentual Tributo') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->percentual_tributo) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Tributo') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->valor_tributo) ?></td>
        </tr>
        <tr>
            <th><?= __('Operacao') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->operacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Atendimento') ?></th>
            <td><?= $this->Number->format($notasFiscaisSaida->atendimento) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Emissao') ?></th>
            <td><?= h($notasFiscaisSaida->data_emissao) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Saida') ?></th>
            <td><?= h($notasFiscaisSaida->data_saida) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Cancelada') ?></th>
            <td><?= h($notasFiscaisSaida->data_cancelada) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($notasFiscaisSaida->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($notasFiscaisSaida->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Notas Fiscais Saidas Itens') ?></h4>
        <?php if (!empty($notasFiscaisSaida->notas_fiscais_saidas_itens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Notas Fiscais Saida Id') ?></th>
                <th><?= __('Produto Id') ?></th>
                <th><?= __('Qtde') ?></th>
                <th><?= __('Venda') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Base Icms') ?></th>
                <th><?= __('Valor Icms') ?></th>
                <th><?= __('Ncms Id') ?></th>
                <th><?= __('Cfop') ?></th>
                <th><?= __('Origem') ?></th>
                <th><?= __('Base Credito') ?></th>
                <th><?= __('Valor Credito') ?></th>
                <th><?= __('Base St') ?></th>
                <th><?= __('Valor St') ?></th>
                <th><?= __('Valor Tributo') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($notasFiscaisSaida->notas_fiscais_saidas_itens as $notasFiscaisSaidasItens): ?>
            <tr>
                <td><?= h($notasFiscaisSaidasItens->id) ?></td>
                <td><?= h($notasFiscaisSaidasItens->notas_fiscais_saida_id) ?></td>
                <td><?= h($notasFiscaisSaidasItens->produto_id) ?></td>
                <td><?= h($notasFiscaisSaidasItens->qtde) ?></td>
                <td><?= h($notasFiscaisSaidasItens->venda) ?></td>
                <td><?= h($notasFiscaisSaidasItens->total) ?></td>
                <td><?= h($notasFiscaisSaidasItens->base_icms) ?></td>
                <td><?= h($notasFiscaisSaidasItens->valor_icms) ?></td>
                <td><?= h($notasFiscaisSaidasItens->ncms_id) ?></td>
                <td><?= h($notasFiscaisSaidasItens->cfop) ?></td>
                <td><?= h($notasFiscaisSaidasItens->origem) ?></td>
                <td><?= h($notasFiscaisSaidasItens->base_credito) ?></td>
                <td><?= h($notasFiscaisSaidasItens->valor_credito) ?></td>
                <td><?= h($notasFiscaisSaidasItens->base_st) ?></td>
                <td><?= h($notasFiscaisSaidasItens->valor_st) ?></td>
                <td><?= h($notasFiscaisSaidasItens->valor_tributo) ?></td>
                <td><?= h($notasFiscaisSaidasItens->created) ?></td>
                <td><?= h($notasFiscaisSaidasItens->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link('', ['controller' => 'NotasFiscaisSaidasItens', 'action' => 'view', $notasFiscaisSaidasItens->id]) ?>
                    <?= $this->Html->link('', ['controller' => 'NotasFiscaisSaidasItens', 'action' => 'edit', $notasFiscaisSaidasItens->id]) ?>
                    <?= $this->Form->postLink('', ['controller' => 'NotasFiscaisSaidasItens', 'action' => 'delete', $notasFiscaisSaidasItens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notasFiscaisSaidasItens->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
