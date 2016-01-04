<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $caixasMovimento->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $caixasMovimento->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Caixas Movimentos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="caixasMovimentos form large-9 medium-8 columns content">
    <?= $this->Form->create($caixasMovimento) ?>
    <fieldset>
        <legend><?= __('Edit Caixas Movimento') ?></legend>
        <?php
            echo $this->Form->input('caixa_diario_id');
            echo $this->Form->input('data_movimento');
            echo $this->Form->input('numero documento');
            echo $this->Form->input('tipo_lancamento');
            echo $this->Form->input('valor');
            echo $this->Form->input('modalidade');
            echo $this->Form->input('historico');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
