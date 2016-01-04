<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Icms Estaduais'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="icmsEstaduais form large-9 medium-8 columns content">
    <?= $this->Form->create($icmsEstaduai) ?>
    <fieldset>
        <legend><?= __('Add Icms Estaduai') ?></legend>
        <?php
            echo $this->Form->input('estado');
            echo $this->Form->input('nome');
            echo $this->Form->input('icms_interno');
            echo $this->Form->input('icms_externo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
