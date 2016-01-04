<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Parametro'), ['action' => 'edit', $parametro->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Parametro'), ['action' => 'delete', $parametro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parametro->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Parametros'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parametro'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="parametros view large-9 medium-8 columns content">
    <h3><?= h($parametro->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($parametro->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Chave') ?></th>
            <td><?= h($parametro->chave) ?></td>
        </tr>
        <tr>
            <th><?= __('Grupo') ?></th>
            <td><?= h($parametro->grupo) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($parametro->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo') ?></th>
            <td><?= $this->Number->format($parametro->tipo) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Valor') ?></h4>
        <?= $this->Text->autoParagraph(h($parametro->valor)); ?>
    </div>
    <div class="row">
        <h4><?= __('Opcoes') ?></h4>
        <?= $this->Text->autoParagraph(h($parametro->opcoes)); ?>
    </div>
</div>
