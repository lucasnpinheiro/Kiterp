<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $inventario->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $inventario->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Inventarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="inventarios form large-9 medium-8 columns content">
    <?= $this->Form->create($inventario) ?>
    <fieldset>
        <legend><?= __('Edit Inventario') ?></legend>
        <?php
            echo $this->Form->input('produto_id', ['options' => $produtos, 'empty' => true]);
            echo $this->Form->input('nome');
            echo $this->Form->input('unidade');
            echo $this->Form->input('grupo');
            echo $this->Form->input('estoque');
            echo $this->Form->input('compra');
            echo $this->Form->input('valor');
            echo $this->Form->input('total');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
