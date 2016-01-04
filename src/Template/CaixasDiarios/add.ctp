<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Caixas Diarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="caixasDiarios form large-9 medium-8 columns content">
    <?= $this->Form->create($caixasDiario) ?>
    <fieldset>
        <legend><?= __('Add Caixas Diario') ?></legend>
        <?php
            echo $this->Form->input('numero_caixa');
            echo $this->Form->input('operador');
            echo $this->Form->input('data_abertura');
            echo $this->Form->input('data_encerramento');
            echo $this->Form->input('valor_inicial');
            echo $this->Form->input('total_entradas');
            echo $this->Form->input('total_saidas');
            echo $this->Form->input('total_saldo');
            echo $this->Form->input('encerrado');
            echo $this->Form->input('total_real');
            echo $this->Form->input('total_sobras');
            echo $this->Form->input('total_faltas');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
