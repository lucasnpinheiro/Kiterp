<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ncm'), ['action' => 'edit', $ncm->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ncm'), ['action' => 'delete', $ncm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ncm->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ncm'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ncm'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produtos Valores'), ['controller' => 'ProdutosValores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produtos Valore'), ['controller' => 'ProdutosValores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ncm view large-9 medium-8 columns content">
    <h3><?= h($ncm->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Ncm') ?></th>
            <td><?= h($ncm->ncm) ?></td>
        </tr>
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($ncm->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($ncm->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($ncm->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($ncm->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Produtos Valores') ?></h4>
        <?php if (!empty($ncm->produtos_valores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Empresa Id') ?></th>
                <th><?= __('Produto Id') ?></th>
                <th><?= __('Ncm Id') ?></th>
                <th><?= __('Estoque Minimo') ?></th>
                <th><?= __('Estoque Atual') ?></th>
                <th><?= __('Valor Compras') ?></th>
                <th><?= __('Margem') ?></th>
                <th><?= __('Valor Vendas') ?></th>
                <th><?= __('Cst Pis') ?></th>
                <th><?= __('Cst Cofins') ?></th>
                <th><?= __('Cst Icms') ?></th>
                <th><?= __('Cst Origem') ?></th>
                <th><?= __('Percentual Icms') ?></th>
                <th><?= __('Percentual Pis') ?></th>
                <th><?= __('Percentual Cofins') ?></th>
                <th><?= __('Percentual Ipi') ?></th>
                <th><?= __('Percentuall Tributacao') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ncm->produtos_valores as $produtosValores): ?>
            <tr>
                <td><?= h($produtosValores->id) ?></td>
                <td><?= h($produtosValores->empresa_id) ?></td>
                <td><?= h($produtosValores->produto_id) ?></td>
                <td><?= h($produtosValores->ncm_id) ?></td>
                <td><?= h($produtosValores->estoque_minimo) ?></td>
                <td><?= h($produtosValores->estoque_atual) ?></td>
                <td><?= h($produtosValores->valor_compras) ?></td>
                <td><?= h($produtosValores->margem) ?></td>
                <td><?= h($produtosValores->valor_vendas) ?></td>
                <td><?= h($produtosValores->cst_pis) ?></td>
                <td><?= h($produtosValores->cst_cofins) ?></td>
                <td><?= h($produtosValores->cst_icms) ?></td>
                <td><?= h($produtosValores->cst_origem) ?></td>
                <td><?= h($produtosValores->percentual_icms) ?></td>
                <td><?= h($produtosValores->percentual_pis) ?></td>
                <td><?= h($produtosValores->percentual_cofins) ?></td>
                <td><?= h($produtosValores->percentual_ipi) ?></td>
                <td><?= h($produtosValores->percentuall_tributacao) ?></td>
                <td><?= h($produtosValores->created) ?></td>
                <td><?= h($produtosValores->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProdutosValores', 'action' => 'view', $produtosValores->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProdutosValores', 'action' => 'edit', $produtosValores->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProdutosValores', 'action' => 'delete', $produtosValores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosValores->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
