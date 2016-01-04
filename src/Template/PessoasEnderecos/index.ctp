<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pessoas Endereco'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoasEnderecos index large-9 medium-8 columns content">
    <h3><?= __('Pessoas Enderecos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                <th><?= $this->Paginator->sort('tipo_endereco') ?></th>
                <th><?= $this->Paginator->sort('cep') ?></th>
                <th><?= $this->Paginator->sort('endereco') ?></th>
                <th><?= $this->Paginator->sort('numero') ?></th>
                <th><?= $this->Paginator->sort('complemento') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoasEnderecos as $pessoasEndereco): ?>
            <tr>
                <td><?= $this->Number->format($pessoasEndereco->id) ?></td>
                <td><?= $pessoasEndereco->has('pessoa') ? $this->Html->link($pessoasEndereco->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pessoasEndereco->pessoa->id]) : '' ?></td>
                <td><?= $this->Number->format($pessoasEndereco->tipo_endereco) ?></td>
                <td><?= h($pessoasEndereco->cep) ?></td>
                <td><?= h($pessoasEndereco->endereco) ?></td>
                <td><?= h($pessoasEndereco->numero) ?></td>
                <td><?= h($pessoasEndereco->complemento) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pessoasEndereco->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pessoasEndereco->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pessoasEndereco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasEndereco->id)]) ?>
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
