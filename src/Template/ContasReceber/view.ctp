<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contas Receber'), ['action' => 'edit', $contasReceber->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contas Receber'), ['action' => 'delete', $contasReceber->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contasReceber->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contas Receber'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contas Receber'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bancos'), ['controller' => 'Bancos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Banco'), ['controller' => 'Bancos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contasReceber view large-9 medium-8 columns content">
    <h3><?= h($contasReceber->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Empresa') ?></th>
            <td><?= $contasReceber->has('empresa') ? $this->Html->link($contasReceber->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $contasReceber->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Numero Documento') ?></th>
            <td><?= h($contasReceber->numero_documento) ?></td>
        </tr>
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $contasReceber->has('pessoa') ? $this->Html->link($contasReceber->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $contasReceber->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Banco') ?></th>
            <td><?= $contasReceber->has('banco') ? $this->Html->link($contasReceber->banco->id, ['controller' => 'Bancos', 'action' => 'view', $contasReceber->banco->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Serie') ?></th>
            <td><?= h($contasReceber->serie) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($contasReceber->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Documento') ?></th>
            <td><?= $this->Number->format($contasReceber->valor_documento) ?></td>
        </tr>
        <tr>
            <th><?= __('Tradutora Id') ?></th>
            <td><?= $this->Number->format($contasReceber->tradutora_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($contasReceber->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Recebimento') ?></th>
            <td><?= $this->Number->format($contasReceber->valor_recebimento) ?></td>
        </tr>
        <tr>
            <th><?= __('Numero Pedido') ?></th>
            <td><?= $this->Number->format($contasReceber->numero_pedido) ?></td>
        </tr>
        <tr>
            <th><?= __('Nota Fiscal') ?></th>
            <td><?= $this->Number->format($contasReceber->nota_fiscal) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Vencimento') ?></th>
            <td><?= h($contasReceber->data_vencimento) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Recebimento') ?></th>
            <td><?= h($contasReceber->data_recebimento) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($contasReceber->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($contasReceber->modified) ?></td>
        </tr>
    </table>
</div>
