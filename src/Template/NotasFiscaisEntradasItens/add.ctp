<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Notas Fiscais Entradas Itens'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Notas Fiscais Entradas'), ['controller' => 'NotasFiscaisEntradas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Notas Fiscais Entrada'), ['controller' => 'NotasFiscaisEntradas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notasFiscaisEntradasItens form large-9 medium-8 columns content">
    <?= $this->Form->create($notasFiscaisEntradasIten) ?>
    <fieldset>
        <legend><?= __('Add Notas Fiscais Entradas Iten') ?></legend>
        <?php
            echo $this->Form->input('notas_fiscais_entrada_id', ['options' => $notasFiscaisEntradas, 'empty' => true]);
            echo $this->Form->input('produto_id', ['options' => $produtos, 'empty' => true]);
            echo $this->Form->input('qtde');
            echo $this->Form->input('compra');
            echo $this->Form->input('total');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
