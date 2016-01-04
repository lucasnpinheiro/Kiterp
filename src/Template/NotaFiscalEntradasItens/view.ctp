<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nota Fiscal Entradas Iten'), ['action' => 'edit', $notaFiscalEntradasIten->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nota Fiscal Entradas Iten'), ['action' => 'delete', $notaFiscalEntradasIten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notaFiscalEntradasIten->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nota Fiscal Entradas Itens'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nota Fiscal Entradas Iten'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nota Fiscal Entradas'), ['controller' => 'NotaFiscalEntradas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nota Fiscal Entrada'), ['controller' => 'NotaFiscalEntradas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notaFiscalEntradasItens view large-9 medium-8 columns content">
    <h3><?= h($notaFiscalEntradasIten->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nota Fiscal Entrada') ?></th>
            <td><?= $notaFiscalEntradasIten->has('nota_fiscal_entrada') ? $this->Html->link($notaFiscalEntradasIten->nota_fiscal_entrada->id, ['controller' => 'NotaFiscalEntradas', 'action' => 'view', $notaFiscalEntradasIten->nota_fiscal_entrada->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Produto') ?></th>
            <td><?= $notaFiscalEntradasIten->has('produto') ? $this->Html->link($notaFiscalEntradasIten->produto->id, ['controller' => 'Produtos', 'action' => 'view', $notaFiscalEntradasIten->produto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($notaFiscalEntradasIten->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Qtde') ?></th>
            <td><?= $this->Number->format($notaFiscalEntradasIten->qtde) ?></td>
        </tr>
        <tr>
            <th><?= __('Compra') ?></th>
            <td><?= $this->Number->format($notaFiscalEntradasIten->compra) ?></td>
        </tr>
        <tr>
            <th><?= __('Total') ?></th>
            <td><?= $this->Number->format($notaFiscalEntradasIten->total) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($notaFiscalEntradasIten->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($notaFiscalEntradasIten->modified) ?></td>
        </tr>
    </table>
</div>
