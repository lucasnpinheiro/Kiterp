<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $produto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $produto->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Entradas Itens'), ['controller' => 'NotaFiscalEntradasItens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Entradas Iten'), ['controller' => 'NotaFiscalEntradasItens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Saidas Itens'), ['controller' => 'NotaFiscalSaidasItens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Saidas Iten'), ['controller' => 'NotaFiscalSaidasItens', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos Itens'), ['controller' => 'PedidosItens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedidos Iten'), ['controller' => 'PedidosItens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produtos form large-9 medium-8 columns content">
    <?= $this->Form->create($produto) ?>
    <fieldset>
        <legend><?= __('Edit Produto') ?></legend>
        <?php
            echo $this->Form->input('barra');
            echo $this->Form->input('nome');
            echo $this->Form->input('unidade');
            echo $this->Form->input('grupo_id');
            echo $this->Form->input('produto_kit');
            echo $this->Form->input('foto');
            echo $this->Form->input('descricao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
