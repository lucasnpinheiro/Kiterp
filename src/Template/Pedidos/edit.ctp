<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pedido->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formas Pagamentos'), ['controller' => 'FormasPagamentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Formas Pagamento'), ['controller' => 'FormasPagamentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pedidos form large-9 medium-8 columns content">
    <?= $this->Form->create($pedido) ?>
    <fieldset>
        <legend><?= __('Edit Pedido') ?></legend>
        <?php
            echo $this->Form->input('empresa_id', ['options' => $empresas, 'empty' => true]);
            echo $this->Form->input('data_pedido');
            echo $this->Form->input('status');
            echo $this->Form->input('pessoa_id', ['options' => $pessoas, 'empty' => true]);
            echo $this->Form->input('condicao_pagamento_id');
            echo $this->Form->input('vendedor_id');
            echo $this->Form->input('transportadora_id');
            echo $this->Form->input('valor_total');
            echo $this->Form->input('numero_cupom');
            echo $this->Form->input('nota_fiscal');
            echo $this->Form->input('serie');
            echo $this->Form->input('numero_caixa');
            echo $this->Form->input('cpf');
            echo $this->Form->input('formas_pagamentos._ids', ['options' => $formasPagamentos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
