<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ncm'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Produtos Valores'), ['controller' => 'ProdutosValores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produtos Valore'), ['controller' => 'ProdutosValores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ncm form large-9 medium-8 columns content">
    <?= $this->Form->create($ncm) ?>
    <fieldset>
        <legend><?= __('Add Ncm') ?></legend>
        <?php
            echo $this->Form->input('ncm');
            echo $this->Form->input('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
