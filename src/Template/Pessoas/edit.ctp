<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pessoa->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pessoa->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contas Pagar'), ['controller' => 'ContasPagar', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contas Pagar'), ['controller' => 'ContasPagar', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contas Receber'), ['controller' => 'ContasReceber', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contas Receber'), ['controller' => 'ContasReceber', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Entradas'), ['controller' => 'NotaFiscalEntradas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Entrada'), ['controller' => 'NotaFiscalEntradas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Saidas'), ['controller' => 'NotaFiscalSaidas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Saida'), ['controller' => 'NotaFiscalSaidas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoas form large-9 medium-8 columns content">
    <?= $this->Form->create($pessoa) ?>
    <fieldset>
        <legend><?= __('Edit Pessoa') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('tipo_pessoa');
            echo $this->Form->input('status');
            echo $this->Form->input('consumidor_final');
            echo $this->Form->input('tipo_contribuinte');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
