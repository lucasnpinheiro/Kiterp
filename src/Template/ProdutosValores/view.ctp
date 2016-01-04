<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produtos Valore'), ['action' => 'edit', $produtosValore->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produtos Valore'), ['action' => 'delete', $produtosValore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosValore->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produtos Valores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produtos Valore'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produtosValores view large-9 medium-8 columns content">
    <h3><?= h($produtosValore->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($produtosValore->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Empresa Id') ?></th>
            <td><?= $this->Number->format($produtosValore->empresa_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Produto Id') ?></th>
            <td><?= $this->Number->format($produtosValore->produto_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Ncm Id') ?></th>
            <td><?= $this->Number->format($produtosValore->ncm_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Estoque Minimo') ?></th>
            <td><?= $this->Number->format($produtosValore->estoque_minimo) ?></td>
        </tr>
        <tr>
            <th><?= __('Estoque Atual') ?></th>
            <td><?= $this->Number->format($produtosValore->estoque_atual) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Compras') ?></th>
            <td><?= $this->Number->format($produtosValore->valor_compras) ?></td>
        </tr>
        <tr>
            <th><?= __('Margem') ?></th>
            <td><?= $this->Number->format($produtosValore->margem) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Vendas') ?></th>
            <td><?= $this->Number->format($produtosValore->valor_vendas) ?></td>
        </tr>
        <tr>
            <th><?= __('Cst Pis') ?></th>
            <td><?= $this->Number->format($produtosValore->cst_pis) ?></td>
        </tr>
        <tr>
            <th><?= __('Cst Cofins') ?></th>
            <td><?= $this->Number->format($produtosValore->cst_cofins) ?></td>
        </tr>
        <tr>
            <th><?= __('Cst Icms') ?></th>
            <td><?= $this->Number->format($produtosValore->cst_icms) ?></td>
        </tr>
        <tr>
            <th><?= __('Cst Origem') ?></th>
            <td><?= $this->Number->format($produtosValore->cst_origem) ?></td>
        </tr>
        <tr>
            <th><?= __('Percentual Icms') ?></th>
            <td><?= $this->Number->format($produtosValore->percentual_icms) ?></td>
        </tr>
        <tr>
            <th><?= __('Percentual Pis') ?></th>
            <td><?= $this->Number->format($produtosValore->percentual_pis) ?></td>
        </tr>
        <tr>
            <th><?= __('Percentual Cofins') ?></th>
            <td><?= $this->Number->format($produtosValore->percentual_cofins) ?></td>
        </tr>
        <tr>
            <th><?= __('Percentual Ipi') ?></th>
            <td><?= $this->Number->format($produtosValore->percentual_ipi) ?></td>
        </tr>
        <tr>
            <th><?= __('Percentuall Tributacao') ?></th>
            <td><?= $this->Number->format($produtosValore->percentuall_tributacao) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($produtosValore->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($produtosValore->modified) ?></td>
        </tr>
    </table>
</div>
