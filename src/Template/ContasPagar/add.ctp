<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Contas Pagar'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bancos'), ['controller' => 'Bancos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Banco'), ['controller' => 'Bancos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contasPagar form large-9 medium-8 columns content">
    <?= $this->Form->create($contasPagar) ?>
    <fieldset>
        <legend><?= __('Add Contas Pagar') ?></legend>
        <?php
            echo $this->Form->input('empresa_id', ['options' => $empresas, 'empty' => true]);
            echo $this->Form->input('numero_documento');
            echo $this->Form->input('data_vencimento', ['empty' => true]);
            echo $this->Form->input('valor_documento');
            echo $this->Form->input('pessoa_id', ['options' => $pessoas, 'empty' => true]);
            echo $this->Form->input('banco_id', ['options' => $bancos, 'empty' => true]);
            echo $this->Form->input('tradutora_id');
            echo $this->Form->input('status');
            echo $this->Form->input('data_pagamento', ['empty' => true]);
            echo $this->Form->input('valor_pagamento');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
