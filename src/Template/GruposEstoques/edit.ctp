<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $gruposEstoque->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $gruposEstoque->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Grupos Estoques'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="gruposEstoques form large-9 medium-8 columns content">
    <?= $this->Form->create($gruposEstoque) ?>
    <fieldset>
        <legend><?= __('Edit Grupos Estoque') ?></legend>
        <?php
            echo $this->Form->input('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
