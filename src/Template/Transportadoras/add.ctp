<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Transportadoras'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Saidas'), ['controller' => 'NotaFiscalSaidas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Saida'), ['controller' => 'NotaFiscalSaidas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transportadoras form large-9 medium-8 columns content">
    <?= $this->Form->create($transportadora) ?>
    <fieldset>
        <legend><?= __('Add Transportadora') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('contado');
            echo $this->Form->input('telefone1');
            echo $this->Form->input('telefone2');
            echo $this->Form->input('cnpj');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
