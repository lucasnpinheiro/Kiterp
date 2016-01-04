<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nota Fiscal Saidas Iten'), ['action' => 'edit', $notaFiscalSaidasIten->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nota Fiscal Saidas Iten'), ['action' => 'delete', $notaFiscalSaidasIten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notaFiscalSaidasIten->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nota Fiscal Saidas Itens'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nota Fiscal Saidas Iten'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nota Fiscal Saidas'), ['controller' => 'NotaFiscalSaidas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nota Fiscal Saida'), ['controller' => 'NotaFiscalSaidas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notaFiscalSaidasItens view large-9 medium-8 columns content">
    <h3><?= h($notaFiscalSaidasIten->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nota Fiscal Saida') ?></th>
            <td><?= $notaFiscalSaidasIten->has('nota_fiscal_saida') ? $this->Html->link($notaFiscalSaidasIten->nota_fiscal_saida->id, ['controller' => 'NotaFiscalSaidas', 'action' => 'view', $notaFiscalSaidasIten->nota_fiscal_saida->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Produto') ?></th>
            <td><?= $notaFiscalSaidasIten->has('produto') ? $this->Html->link($notaFiscalSaidasIten->produto->id, ['controller' => 'Produtos', 'action' => 'view', $notaFiscalSaidasIten->produto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Cfop') ?></th>
            <td><?= h($notaFiscalSaidasIten->cfop) ?></td>
        </tr>
        <tr>
            <th><?= __('Origem') ?></th>
            <td><?= h($notaFiscalSaidasIten->origem) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($notaFiscalSaidasIten->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Qtde') ?></th>
            <td><?= $this->Number->format($notaFiscalSaidasIten->qtde) ?></td>
        </tr>
        <tr>
            <th><?= __('Venda') ?></th>
            <td><?= $this->Number->format($notaFiscalSaidasIten->venda) ?></td>
        </tr>
        <tr>
            <th><?= __('Total') ?></th>
            <td><?= $this->Number->format($notaFiscalSaidasIten->total) ?></td>
        </tr>
        <tr>
            <th><?= __('Base Icms') ?></th>
            <td><?= $this->Number->format($notaFiscalSaidasIten->base_icms) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Icms') ?></th>
            <td><?= $this->Number->format($notaFiscalSaidasIten->valor_icms) ?></td>
        </tr>
        <tr>
            <th><?= __('Ncms Id') ?></th>
            <td><?= $this->Number->format($notaFiscalSaidasIten->ncms_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Base Credito') ?></th>
            <td><?= $this->Number->format($notaFiscalSaidasIten->base_credito) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Credito') ?></th>
            <td><?= $this->Number->format($notaFiscalSaidasIten->valor_credito) ?></td>
        </tr>
        <tr>
            <th><?= __('Base St') ?></th>
            <td><?= $this->Number->format($notaFiscalSaidasIten->base_st) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor St') ?></th>
            <td><?= $this->Number->format($notaFiscalSaidasIten->valor_st) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Tributo') ?></th>
            <td><?= $this->Number->format($notaFiscalSaidasIten->valor_tributo) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($notaFiscalSaidasIten->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($notaFiscalSaidasIten->modified) ?></td>
        </tr>
    </table>
</div>
