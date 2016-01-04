<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pessoas Juridica'), ['action' => 'edit', $pessoasJuridica->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pessoas Juridica'), ['action' => 'delete', $pessoasJuridica->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasJuridica->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas Juridicas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoas Juridica'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pessoasJuridicas view large-9 medium-8 columns content">
    <h3><?= h($pessoasJuridica->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $pessoasJuridica->has('pessoa') ? $this->Html->link($pessoasJuridica->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pessoasJuridica->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Cnpj') ?></th>
            <td><?= h($pessoasJuridica->cnpj) ?></td>
        </tr>
        <tr>
            <th><?= __('Inscricao Estadual') ?></th>
            <td><?= h($pessoasJuridica->inscricao_estadual) ?></td>
        </tr>
        <tr>
            <th><?= __('Inscricao Municipal') ?></th>
            <td><?= h($pessoasJuridica->inscricao_municipal) ?></td>
        </tr>
        <tr>
            <th><?= __('Cnai') ?></th>
            <td><?= h($pessoasJuridica->cnai) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pessoasJuridica->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Abertura') ?></th>
            <td><?= h($pessoasJuridica->data_abertura) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pessoasJuridica->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pessoasJuridica->modified) ?></td>
        </tr>
    </table>
</div>
