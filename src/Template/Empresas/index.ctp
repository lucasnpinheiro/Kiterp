<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contas Pagar'), ['controller' => 'ContasPagar', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contas Pagar'), ['controller' => 'ContasPagar', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contas Receber'), ['controller' => 'ContasReceber', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contas Receber'), ['controller' => 'ContasReceber', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Entrada'), ['controller' => 'NotaFiscalEntrada', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Entrada'), ['controller' => 'NotaFiscalEntrada', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Saida'), ['controller' => 'NotaFiscalSaida', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Saida'), ['controller' => 'NotaFiscalSaida', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos Kits'), ['controller' => 'ProdutosKits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produtos Kit'), ['controller' => 'ProdutosKits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="empresas index large-9 medium-8 columns content">
    <h3><?= __('Empresas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                <th><?= $this->Paginator->sort('codigo_cidade') ?></th>
                <th><?= $this->Paginator->sort('regime_tributario') ?></th>
                <th><?= $this->Paginator->sort('versao_sefaz') ?></th>
                <th><?= $this->Paginator->sort('perentual_tributo') ?></th>
                <th><?= $this->Paginator->sort('hora_tzd') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empresas as $empresa): ?>
            <tr>
                <td><?= $this->Number->format($empresa->id) ?></td>
                <td><?= $empresa->has('pessoa') ? $this->Html->link($empresa->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $empresa->pessoa->id]) : '' ?></td>
                <td><?= $this->Number->format($empresa->codigo_cidade) ?></td>
                <td><?= $this->Number->format($empresa->regime_tributario) ?></td>
                <td><?= h($empresa->versao_sefaz) ?></td>
                <td><?= $this->Number->format($empresa->perentual_tributo) ?></td>
                <td><?= h($empresa->hora_tzd) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $empresa->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $empresa->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $empresa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empresa->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
