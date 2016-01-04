<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produtos Kit'), ['action' => 'edit', $produtosKit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produtos Kit'), ['action' => 'delete', $produtosKit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosKit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produtos Kits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produtos Kit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produtosKits view large-9 medium-8 columns content">
    <h3><?= h($produtosKit->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Empresa') ?></th>
            <td><?= $produtosKit->has('empresa') ? $this->Html->link($produtosKit->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $produtosKit->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Produto') ?></th>
            <td><?= $produtosKit->has('produto') ? $this->Html->link($produtosKit->produto->id, ['controller' => 'Produtos', 'action' => 'view', $produtosKit->produto->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($produtosKit->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Kit Id') ?></th>
            <td><?= $this->Number->format($produtosKit->kit_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Qtde') ?></th>
            <td><?= $this->Number->format($produtosKit->qtde) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($produtosKit->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($produtosKit->modified) ?></td>
        </tr>
    </table>
</div>
