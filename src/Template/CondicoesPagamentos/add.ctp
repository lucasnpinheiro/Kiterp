<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Condicoes Pagamentos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="condicoesPagamentos form large-9 medium-8 columns content">
    <?= $this->Form->create($condicoesPagamento) ?>
    <fieldset>
        <legend><?= __('Add Condicoes Pagamento') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('qtde_parcelas');
            echo $this->Form->input('qtde_dias');
            echo $this->Form->input('creatde');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
