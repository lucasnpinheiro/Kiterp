<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contas Pagar'), ['action' => 'edit', $contasPagar->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contas Pagar'), ['action' => 'delete', $contasPagar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contasPagar->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contas Pagar'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contas Pagar'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bancos'), ['controller' => 'Bancos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Banco'), ['controller' => 'Bancos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contasPagar view large-9 medium-8 columns content">
    <h3><?= h($contasPagar->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Empresa') ?></th>
            <td><?= $contasPagar->has('empresa') ? $this->Html->link($contasPagar->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $contasPagar->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Numero Documento') ?></th>
            <td><?= h($contasPagar->numero_documento) ?></td>
        </tr>
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $contasPagar->has('pessoa') ? $this->Html->link($contasPagar->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $contasPagar->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Banco') ?></th>
            <td><?= $contasPagar->has('banco') ? $this->Html->link($contasPagar->banco->id, ['controller' => 'Bancos', 'action' => 'view', $contasPagar->banco->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($contasPagar->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Documento') ?></th>
            <td><?= $this->Number->format($contasPagar->valor_documento) ?></td>
        </tr>
        <tr>
            <th><?= __('Tradutora Id') ?></th>
            <td><?= $this->Number->format($contasPagar->tradutora_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($contasPagar->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Pagamento') ?></th>
            <td><?= $this->Number->format($contasPagar->valor_pagamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Vencimento') ?></th>
            <td><?= h($contasPagar->data_vencimento) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Pagamento') ?></th>
            <td><?= h($contasPagar->data_pagamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($contasPagar->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($contasPagar->modified) ?></td>
        </tr>
    </table>
</div>
