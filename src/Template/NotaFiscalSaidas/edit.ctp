<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $notaFiscalSaida->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $notaFiscalSaida->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Saidas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notaFiscalSaidas form large-9 medium-8 columns content">
    <?= $this->Form->create($notaFiscalSaida) ?>
    <fieldset>
        <legend><?= __('Edit Nota Fiscal Saida') ?></legend>
        <?php
            echo $this->Form->input('empresa_id', ['options' => $empresas, 'empty' => true]);
            echo $this->Form->input('numero_nota_fiscal');
            echo $this->Form->input('serie');
            echo $this->Form->input('cfop_id');
            echo $this->Form->input('pessoa_id', ['options' => $pessoas, 'empty' => true]);
            echo $this->Form->input('data_emissao', ['empty' => true]);
            echo $this->Form->input('data_saida', ['empty' => true]);
            echo $this->Form->input('hora_saida');
            echo $this->Form->input('forma_pagamento_id');
            echo $this->Form->input('total_produtos');
            echo $this->Form->input('total_nota');
            echo $this->Form->input('base_icms');
            echo $this->Form->input('valor_icms');
            echo $this->Form->input('transportadora_id');
            echo $this->Form->input('vendedor_id');
            echo $this->Form->input('cancelada');
            echo $this->Form->input('data_cancelada', ['empty' => true]);
            echo $this->Form->input('numero_pedido');
            echo $this->Form->input('frete');
            echo $this->Form->input('qtde_volumes');
            echo $this->Form->input('especie');
            echo $this->Form->input('base_st');
            echo $this->Form->input('valor_st');
            echo $this->Form->input('base_credito');
            echo $this->Form->input('valor_credito');
            echo $this->Form->input('percentual_tributo');
            echo $this->Form->input('valor_tributo');
            echo $this->Form->input('operacao');
            echo $this->Form->input('atendimento');
            echo $this->Form->input('data_hora');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
