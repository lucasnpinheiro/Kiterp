<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $notasFiscaisSaidasIten->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $notasFiscaisSaidasIten->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Notas Fiscais Saidas Itens'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Notas Fiscais Saidas'), ['controller' => 'NotasFiscaisSaidas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Notas Fiscais Saida'), ['controller' => 'NotasFiscaisSaidas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notasFiscaisSaidasItens form large-9 medium-8 columns content">
    <?= $this->Form->create($notasFiscaisSaidasIten) ?>
    <fieldset>
        <legend><?= __('Edit Notas Fiscais Saidas Iten') ?></legend>
        <?php
            echo $this->Form->input('notas_fiscais_saida_id', ['options' => $notasFiscaisSaidas, 'empty' => true]);
            echo $this->Form->input('produto_id', ['options' => $produtos, 'empty' => true]);
            echo $this->Form->input('qtde');
            echo $this->Form->input('venda');
            echo $this->Form->input('total');
            echo $this->Form->input('base_icms');
            echo $this->Form->input('valor_icms');
            echo $this->Form->input('ncms_id');
            echo $this->Form->input('cfop');
            echo $this->Form->input('origem');
            echo $this->Form->input('base_credito');
            echo $this->Form->input('valor_credito');
            echo $this->Form->input('base_st');
            echo $this->Form->input('valor_st');
            echo $this->Form->input('valor_tributo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
