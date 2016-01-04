<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ncmIva->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ncmIva->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ncm Iva'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ncmIva form large-9 medium-8 columns content">
    <?= $this->Form->create($ncmIva) ?>
    <fieldset>
        <legend><?= __('Edit Ncm Iva') ?></legend>
        <?php
            echo $this->Form->input('ncm_id');
            echo $this->Form->input('icms_estadual_id');
            echo $this->Form->input('iva');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
