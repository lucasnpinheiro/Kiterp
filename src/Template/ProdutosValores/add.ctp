<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Produtos Valores'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="produtosValores form large-9 medium-8 columns content">
    <?= $this->Form->create($produtosValore) ?>
    <fieldset>
        <legend><?= __('Add Produtos Valore') ?></legend>
        <?php
            echo $this->Form->input('empresa_id');
            echo $this->Form->input('produto_id');
            echo $this->Form->input('ncm_id');
            echo $this->Form->input('estoque_minimo');
            echo $this->Form->input('estoque_atual');
            echo $this->Form->input('valor_compras');
            echo $this->Form->input('margem');
            echo $this->Form->input('valor_vendas');
            echo $this->Form->input('cst_pis');
            echo $this->Form->input('cst_cofins');
            echo $this->Form->input('cst_icms');
            echo $this->Form->input('cst_origem');
            echo $this->Form->input('percentual_icms');
            echo $this->Form->input('percentual_pis');
            echo $this->Form->input('percentual_cofins');
            echo $this->Form->input('percentual_ipi');
            echo $this->Form->input('percentuall_tributacao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
