<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Produtos Kit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtosKits index large-9 medium-8 columns content">
    <h3><?= __('Produtos Kits') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('empresa_id') ?></th>
                <th><?= $this->Paginator->sort('produto_id') ?></th>
                <th><?= $this->Paginator->sort('kit_id') ?></th>
                <th><?= $this->Paginator->sort('qtde') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtosKits as $produtosKit): ?>
            <tr>
                <td><?= $this->Number->format($produtosKit->id) ?></td>
                <td><?= $produtosKit->has('empresa') ? $this->Html->link($produtosKit->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $produtosKit->empresa->id]) : '' ?></td>
                <td><?= $produtosKit->has('produto') ? $this->Html->link($produtosKit->produto->id, ['controller' => 'Produtos', 'action' => 'view', $produtosKit->produto->id]) : '' ?></td>
                <td><?= $this->Number->format($produtosKit->kit_id) ?></td>
                <td><?= $this->Number->format($produtosKit->qtde) ?></td>
                <td><?= h($produtosKit->created) ?></td>
                <td><?= h($produtosKit->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $produtosKit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produtosKit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produtosKit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosKit->id)]) ?>
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
