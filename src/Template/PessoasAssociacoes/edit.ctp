<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pessoasAssociaco->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasAssociaco->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pessoas Associacoes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoasAssociacoes form large-9 medium-8 columns content">
    <?= $this->Form->create($pessoasAssociaco) ?>
    <fieldset>
        <legend><?= __('Edit Pessoas Associaco') ?></legend>
        <?php
            echo $this->Form->input('pessoa_id', ['options' => $pessoas, 'empty' => true]);
            echo $this->Form->input('tipo_associacao');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
