<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Produtos Valore'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtosValores index large-9 medium-8 columns content">
    <h3><?= __('Produtos Valores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('empresa_id') ?></th>
                <th><?= $this->Paginator->sort('produto_id') ?></th>
                <th><?= $this->Paginator->sort('ncm_id') ?></th>
                <th><?= $this->Paginator->sort('estoque_minimo') ?></th>
                <th><?= $this->Paginator->sort('estoque_atual') ?></th>
                <th><?= $this->Paginator->sort('valor_compras') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtosValores as $produtosValore): ?>
            <tr>
                <td><?= $this->Number->format($produtosValore->id) ?></td>
                <td><?= $this->Number->format($produtosValore->empresa_id) ?></td>
                <td><?= $this->Number->format($produtosValore->produto_id) ?></td>
                <td><?= $this->Number->format($produtosValore->ncm_id) ?></td>
                <td><?= $this->Number->format($produtosValore->estoque_minimo) ?></td>
                <td><?= $this->Number->format($produtosValore->estoque_atual) ?></td>
                <td><?= $this->Number->format($produtosValore->valor_compras) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $produtosValore->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produtosValore->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produtosValore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosValore->id)]) ?>
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
