<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $notaFiscalEntradasIten->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $notaFiscalEntradasIten->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Entradas Itens'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Entradas'), ['controller' => 'NotaFiscalEntradas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Entrada'), ['controller' => 'NotaFiscalEntradas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notaFiscalEntradasItens form large-9 medium-8 columns content">
    <?= $this->Form->create($notaFiscalEntradasIten) ?>
    <fieldset>
        <legend><?= __('Edit Nota Fiscal Entradas Iten') ?></legend>
        <?php
            echo $this->Form->input('nota_fiscal_entrada_id', ['options' => $notaFiscalEntradas, 'empty' => true]);
            echo $this->Form->input('produto_id', ['options' => $produtos, 'empty' => true]);
            echo $this->Form->input('qtde');
            echo $this->Form->input('compra');
            echo $this->Form->input('total');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
