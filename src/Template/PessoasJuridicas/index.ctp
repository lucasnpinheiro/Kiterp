<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pessoas Juridica'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoasJuridicas index large-9 medium-8 columns content">
    <h3><?= __('Pessoas Juridicas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                <th><?= $this->Paginator->sort('cnpj') ?></th>
                <th><?= $this->Paginator->sort('inscricao_estadual') ?></th>
                <th><?= $this->Paginator->sort('inscricao_municipal') ?></th>
                <th><?= $this->Paginator->sort('data_abertura') ?></th>
                <th><?= $this->Paginator->sort('cnai') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoasJuridicas as $pessoasJuridica): ?>
            <tr>
                <td><?= $this->Number->format($pessoasJuridica->id) ?></td>
                <td><?= $pessoasJuridica->has('pessoa') ? $this->Html->link($pessoasJuridica->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pessoasJuridica->pessoa->id]) : '' ?></td>
                <td><?= h($pessoasJuridica->cnpj) ?></td>
                <td><?= h($pessoasJuridica->inscricao_estadual) ?></td>
                <td><?= h($pessoasJuridica->inscricao_municipal) ?></td>
                <td><?= h($pessoasJuridica->data_abertura) ?></td>
                <td><?= h($pessoasJuridica->cnai) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pessoasJuridica->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pessoasJuridica->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pessoasJuridica->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasJuridica->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
