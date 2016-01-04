<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Formas Pagamentos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="formasPagamentos form large-9 medium-8 columns content">
    <?= $this->Form->create($formasPagamento) ?>
    <fieldset>
        <legend><?= __('Add Formas Pagamento') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('abreviado');
            echo $this->Form->input('qtde_dias');
            echo $this->Form->input('qtde_taxas');
            echo $this->Form->input('valor_taxas');
            echo $this->Form->input('pedidos._ids', ['options' => $pedidos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
