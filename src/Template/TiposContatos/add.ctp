<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tipos Contatos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tiposContatos form large-9 medium-8 columns content">
    <?= $this->Form->create($tiposContato) ?>
    <fieldset>
        <legend><?= __('Add Tipos Contato') ?></legend>
        <?php
            echo $this->Form->input('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
