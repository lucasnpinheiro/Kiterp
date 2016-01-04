<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Grupos Estoques'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="gruposEstoques form large-9 medium-8 columns content">
    <?= $this->Form->create($gruposEstoque) ?>
    <fieldset>
        <legend><?= __('Add Grupos Estoque') ?></legend>
        <?php
            echo $this->Form->input('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
