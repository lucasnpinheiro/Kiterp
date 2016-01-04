<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nota Fiscal Saida'), ['action' => 'edit', $notaFiscalSaida->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nota Fiscal Saida'), ['action' => 'delete', $notaFiscalSaida->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notaFiscalSaida->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nota Fiscal Saidas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nota Fiscal Saida'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notaFiscalSaidas view large-9 medium-8 columns content">
    <h3><?= h($notaFiscalSaida->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Empresa') ?></th>
            <td><?= $notaFiscalSaida->has('empresa') ? $this->Html->link($notaFiscalSaida->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $notaFiscalSaida->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Serie') ?></th>
            <td><?= h($notaFiscalSaida->serie) ?></td>
        </tr>
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $notaFiscalSaida->has('pessoa') ? $this->Html->link($notaFiscalSaida->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $notaFiscalSaida->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Hora Saida') ?></th>
            <td><?= h($notaFiscalSaida->hora_saida) ?></td>
        </tr>
        <tr>
            <th><?= __('Especie') ?></th>
            <td><?= h($notaFiscalSaida->especie) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Hora') ?></th>
            <td><?= h($notaFiscalSaida->data_hora) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Numero Nota Fiscal') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->numero_nota_fiscal) ?></td>
        </tr>
        <tr>
            <th><?= __('Cfop Id') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->cfop_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Forma Pagamento Id') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->forma_pagamento_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Produtos') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->total_produtos) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Nota') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->total_nota) ?></td>
        </tr>
        <tr>
            <th><?= __('Base Icms') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->base_icms) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Icms') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->valor_icms) ?></td>
        </tr>
        <tr>
            <th><?= __('Transportadora Id') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->transportadora_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Vendedor Id') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->vendedor_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Cancelada') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->cancelada) ?></td>
        </tr>
        <tr>
            <th><?= __('Numero Pedido') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->numero_pedido) ?></td>
        </tr>
        <tr>
            <th><?= __('Frete') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->frete) ?></td>
        </tr>
        <tr>
            <th><?= __('Qtde Volumes') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->qtde_volumes) ?></td>
        </tr>
        <tr>
            <th><?= __('Base St') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->base_st) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor St') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->valor_st) ?></td>
        </tr>
        <tr>
            <th><?= __('Base Credito') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->base_credito) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Credito') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->valor_credito) ?></td>
        </tr>
        <tr>
            <th><?= __('Percentual Tributo') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->percentual_tributo) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Tributo') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->valor_tributo) ?></td>
        </tr>
        <tr>
            <th><?= __('Operacao') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->operacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Atendimento') ?></th>
            <td><?= $this->Number->format($notaFiscalSaida->atendimento) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Emissao') ?></th>
            <td><?= h($notaFiscalSaida->data_emissao) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Saida') ?></th>
            <td><?= h($notaFiscalSaida->data_saida) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Cancelada') ?></th>
            <td><?= h($notaFiscalSaida->data_cancelada) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($notaFiscalSaida->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($notaFiscalSaida->modified) ?></td>
        </tr>
    </table>
</div>
