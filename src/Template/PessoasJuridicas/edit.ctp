<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pessoasJuridica->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasJuridica->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pessoas Juridicas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoasJuridicas form large-9 medium-8 columns content">
    <?= $this->Form->create($pessoasJuridica) ?>
    <fieldset>
        <legend><?= __('Edit Pessoas Juridica') ?></legend>
        <?php
            echo $this->Form->input('pessoa_id', ['options' => $pessoas, 'empty' => true]);
            echo $this->Form->input('cnpj');
            echo $this->Form->input('inscricao_estadual');
            echo $this->Form->input('inscricao_municipal');
            echo $this->Form->input('data_abertura', ['empty' => true]);
            echo $this->Form->input('cnai');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
