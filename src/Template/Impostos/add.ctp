<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Impostos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="impostos form large-9 medium-8 columns content">
    <?= $this->Form->create($imposto) ?>
    <fieldset>
        <legend><?= __('Add Imposto') ?></legend>
        <?php
            echo $this->Form->input('tipo_imposto');
            echo $this->Form->input('codigo');
            echo $this->Form->input('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
