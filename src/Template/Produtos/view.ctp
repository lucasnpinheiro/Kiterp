<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produto'), ['action' => 'edit', $produto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produto'), ['action' => 'delete', $produto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nota Fiscal Entradas Itens'), ['controller' => 'NotaFiscalEntradasItens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nota Fiscal Entradas Iten'), ['controller' => 'NotaFiscalEntradasItens', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nota Fiscal Saidas Itens'), ['controller' => 'NotaFiscalSaidasItens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nota Fiscal Saidas Iten'), ['controller' => 'NotaFiscalSaidasItens', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos Itens'), ['controller' => 'PedidosItens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedidos Iten'), ['controller' => 'PedidosItens', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produtos view large-9 medium-8 columns content">
    <h3><?= h($produto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Barra') ?></th>
            <td><?= h($produto->barra) ?></td>
        </tr>
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($produto->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Unidade') ?></th>
            <td><?= h($produto->unidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Foto') ?></th>
            <td><?= h($produto->foto) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($produto->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Grupo Id') ?></th>
            <td><?= $this->Number->format($produto->grupo_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Produto Kit') ?></th>
            <td><?= $this->Number->format($produto->produto_kit) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($produto->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($produto->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($produto->descricao)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Nota Fiscal Entradas Itens') ?></h4>
        <?php if (!empty($produto->nota_fiscal_entradas_itens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nota Fiscal Entrada Id') ?></th>
                <th><?= __('Produto Id') ?></th>
                <th><?= __('Qtde') ?></th>
                <th><?= __('Compra') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($produto->nota_fiscal_entradas_itens as $notaFiscalEntradasItens): ?>
            <tr>
                <td><?= h($notaFiscalEntradasItens->id) ?></td>
                <td><?= h($notaFiscalEntradasItens->nota_fiscal_entrada_id) ?></td>
                <td><?= h($notaFiscalEntradasItens->produto_id) ?></td>
                <td><?= h($notaFiscalEntradasItens->qtde) ?></td>
                <td><?= h($notaFiscalEntradasItens->compra) ?></td>
                <td><?= h($notaFiscalEntradasItens->total) ?></td>
                <td><?= h($notaFiscalEntradasItens->created) ?></td>
                <td><?= h($notaFiscalEntradasItens->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'NotaFiscalEntradasItens', 'action' => 'view', $notaFiscalEntradasItens->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'NotaFiscalEntradasItens', 'action' => 'edit', $notaFiscalEntradasItens->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'NotaFiscalEntradasItens', 'action' => 'delete', $notaFiscalEntradasItens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notaFiscalEntradasItens->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Nota Fiscal Saidas Itens') ?></h4>
        <?php if (!empty($produto->nota_fiscal_saidas_itens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nota Fiscal Saida Id') ?></th>
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
            <?php foreach ($produto->nota_fiscal_saidas_itens as $notaFiscalSaidasItens): ?>
            <tr>
                <td><?= h($notaFiscalSaidasItens->id) ?></td>
                <td><?= h($notaFiscalSaidasItens->nota_fiscal_saida_id) ?></td>
                <td><?= h($notaFiscalSaidasItens->produto_id) ?></td>
                <td><?= h($notaFiscalSaidasItens->qtde) ?></td>
                <td><?= h($notaFiscalSaidasItens->venda) ?></td>
                <td><?= h($notaFiscalSaidasItens->total) ?></td>
                <td><?= h($notaFiscalSaidasItens->base_icms) ?></td>
                <td><?= h($notaFiscalSaidasItens->valor_icms) ?></td>
                <td><?= h($notaFiscalSaidasItens->ncms_id) ?></td>
                <td><?= h($notaFiscalSaidasItens->cfop) ?></td>
                <td><?= h($notaFiscalSaidasItens->origem) ?></td>
                <td><?= h($notaFiscalSaidasItens->base_credito) ?></td>
                <td><?= h($notaFiscalSaidasItens->valor_credito) ?></td>
                <td><?= h($notaFiscalSaidasItens->base_st) ?></td>
                <td><?= h($notaFiscalSaidasItens->valor_st) ?></td>
                <td><?= h($notaFiscalSaidasItens->valor_tributo) ?></td>
                <td><?= h($notaFiscalSaidasItens->created) ?></td>
                <td><?= h($notaFiscalSaidasItens->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'NotaFiscalSaidasItens', 'action' => 'view', $notaFiscalSaidasItens->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'NotaFiscalSaidasItens', 'action' => 'edit', $notaFiscalSaidasItens->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'NotaFiscalSaidasItens', 'action' => 'delete', $notaFiscalSaidasItens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notaFiscalSaidasItens->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pedidos Itens') ?></h4>
        <?php if (!empty($produto->pedidos_itens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Pedido Id') ?></th>
                <th><?= __('Produto Id') ?></th>
                <th><?= __('Qtde') ?></th>
                <th><?= __('Venda') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($produto->pedidos_itens as $pedidosItens): ?>
            <tr>
                <td><?= h($pedidosItens->id) ?></td>
                <td><?= h($pedidosItens->pedido_id) ?></td>
                <td><?= h($pedidosItens->produto_id) ?></td>
                <td><?= h($pedidosItens->qtde) ?></td>
                <td><?= h($pedidosItens->venda) ?></td>
                <td><?= h($pedidosItens->total) ?></td>
                <td><?= h($pedidosItens->created) ?></td>
                <td><?= h($pedidosItens->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PedidosItens', 'action' => 'view', $pedidosItens->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'PedidosItens', 'action' => 'edit', $pedidosItens->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PedidosItens', 'action' => 'delete', $pedidosItens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidosItens->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
