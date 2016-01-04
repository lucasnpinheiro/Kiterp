<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nota Fiscal Entrada'), ['action' => 'edit', $notaFiscalEntrada->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nota Fiscal Entrada'), ['action' => 'delete', $notaFiscalEntrada->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notaFiscalEntrada->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nota Fiscal Entradas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nota Fiscal Entrada'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notaFiscalEntradas view large-9 medium-8 columns content">
    <h3><?= h($notaFiscalEntrada->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Empresa') ?></th>
            <td><?= $notaFiscalEntrada->has('empresa') ? $this->Html->link($notaFiscalEntrada->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $notaFiscalEntrada->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Serie') ?></th>
            <td><?= h($notaFiscalEntrada->serie) ?></td>
        </tr>
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $notaFiscalEntrada->has('pessoa') ? $this->Html->link($notaFiscalEntrada->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $notaFiscalEntrada->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($notaFiscalEntrada->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Numero Nota Fiscal') ?></th>
            <td><?= $this->Number->format($notaFiscalEntrada->numero_nota_fiscal) ?></td>
        </tr>
        <tr>
            <th><?= __('Cfop Id') ?></th>
            <td><?= $this->Number->format($notaFiscalEntrada->cfop_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Produtos') ?></th>
            <td><?= $this->Number->format($notaFiscalEntrada->total_produtos) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Nota') ?></th>
            <td><?= $this->Number->format($notaFiscalEntrada->total_nota) ?></td>
        </tr>
        <tr>
            <th><?= __('Base Icms') ?></th>
            <td><?= $this->Number->format($notaFiscalEntrada->base_icms) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Icms') ?></th>
            <td><?= $this->Number->format($notaFiscalEntrada->valor_icms) ?></td>
        </tr>
        <tr>
            <th><?= __('Base St') ?></th>
            <td><?= $this->Number->format($notaFiscalEntrada->base_st) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor St') ?></th>
            <td><?= $this->Number->format($notaFiscalEntrada->valor_st) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Ipi') ?></th>
            <td><?= $this->Number->format($notaFiscalEntrada->valor_ipi) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Frete') ?></th>
            <td><?= $this->Number->format($notaFiscalEntrada->valor_frete) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Seguro') ?></th>
            <td><?= $this->Number->format($notaFiscalEntrada->valor_seguro) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Emissao') ?></th>
            <td><?= h($notaFiscalEntrada->data_emissao) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Entrada') ?></th>
            <td><?= h($notaFiscalEntrada->data_entrada) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($notaFiscalEntrada->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($notaFiscalEntrada->modified) ?></td>
        </tr>
    </table>
</div>
