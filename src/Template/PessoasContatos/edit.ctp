<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pessoasContato->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasContato->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pessoas Contatos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoasContatos form large-9 medium-8 columns content">
    <?= $this->Form->create($pessoasContato) ?>
    <fieldset>
        <legend><?= __('Edit Pessoas Contato') ?></legend>
        <?php
            echo $this->Form->input('pessoa_id', ['options' => $pessoas, 'empty' => true]);
            echo $this->Form->input('tipo_contato_id');
            echo $this->Form->input('valor');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
