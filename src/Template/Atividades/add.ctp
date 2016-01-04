<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Atividades'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="atividades form large-9 medium-8 columns content">
    <?= $this->Form->create($atividade) ?>
    <fieldset>
        <legend><?= __('Add Atividade') ?></legend>
        <?php
            echo $this->Form->input('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
