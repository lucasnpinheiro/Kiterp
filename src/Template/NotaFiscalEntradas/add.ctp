<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Entradas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notaFiscalEntradas form large-9 medium-8 columns content">
    <?= $this->Form->create($notaFiscalEntrada) ?>
    <fieldset>
        <legend><?= __('Add Nota Fiscal Entrada') ?></legend>
        <?php
            echo $this->Form->input('empresa_id', ['options' => $empresas, 'empty' => true]);
            echo $this->Form->input('numero_nota_fiscal');
            echo $this->Form->input('serie');
            echo $this->Form->input('pessoa_id', ['options' => $pessoas, 'empty' => true]);
            echo $this->Form->input('cfop_id');
            echo $this->Form->input('data_emissao', ['empty' => true]);
            echo $this->Form->input('data_entrada', ['empty' => true]);
            echo $this->Form->input('total_produtos');
            echo $this->Form->input('total_nota');
            echo $this->Form->input('base_icms');
            echo $this->Form->input('valor_icms');
            echo $this->Form->input('base_st');
            echo $this->Form->input('valor_st');
            echo $this->Form->input('valor_ipi');
            echo $this->Form->input('valor_frete');
            echo $this->Form->input('valor_seguro');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
