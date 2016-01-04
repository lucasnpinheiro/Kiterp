<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Parametros'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="parametros form large-9 medium-8 columns content">
    <?= $this->Form->create($parametro) ?>
    <fieldset>
        <legend><?= __('Add Parametro') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('chave');
            echo $this->Form->input('valor');
            echo $this->Form->input('tipo');
            echo $this->Form->input('opcoes');
            echo $this->Form->input('grupo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
