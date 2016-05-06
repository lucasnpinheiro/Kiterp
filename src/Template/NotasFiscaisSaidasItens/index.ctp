<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Notas Fiscais Saidas Iten'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Notas Fiscais Saidas'), ['controller' => 'NotasFiscaisSaidas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Notas Fiscais Saida'), ['controller' => 'NotasFiscaisSaidas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notasFiscaisSaidasItens index large-9 medium-8 columns content">
    <h3><?= __('Notas Fiscais Saidas Itens') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('notas_fiscais_saida_id') ?></th>
                <th><?= $this->Paginator->sort('produto_id') ?></th>
                <th><?= $this->Paginator->sort('qtde') ?></th>
                <th><?= $this->Paginator->sort('venda') ?></th>
                <th><?= $this->Paginator->sort('total') ?></th>
                <th><?= $this->Paginator->sort('base_icms') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notasFiscaisSaidasItens as $notasFiscaisSaidasIten): ?>
            <tr>
                <td><?= $this->Number->format($notasFiscaisSaidasIten->id) ?></td>
                <td><?= $notasFiscaisSaidasIten->has('notas_fiscais_saida') ? $this->Html->link($notasFiscaisSaidasIten->notas_fiscais_saida->id, ['controller' => 'NotasFiscaisSaidas', 'action' => 'view', $notasFiscaisSaidasIten->notas_fiscais_saida->id]) : '' ?></td>
                <td><?= $notasFiscaisSaidasIten->has('produto') ? $this->Html->link($notasFiscaisSaidasIten->produto->id, ['controller' => 'Produtos', 'action' => 'view', $notasFiscaisSaidasIten->produto->id]) : '' ?></td>
                <td><?= $this->Number->format($notasFiscaisSaidasIten->qtde) ?></td>
                <td><?= $this->Number->format($notasFiscaisSaidasIten->venda) ?></td>
                <td><?= $this->Number->format($notasFiscaisSaidasIten->total) ?></td>
                <td><?= $this->Number->format($notasFiscaisSaidasIten->base_icms) ?></td>
                <td class="actions">
                    <?= $this->Html->link('', ['action' => 'view', $notasFiscaisSaidasIten->id]) ?>
                    <?= $this->Html->link('', ['action' => 'edit', $notasFiscaisSaidasIten->id]) ?>
                    <?= $this->Form->postLink('', ['action' => 'delete', $notasFiscaisSaidasIten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notasFiscaisSaidasIten->id)]) ?>
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
