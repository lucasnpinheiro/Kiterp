<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Contas Pagar'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bancos'), ['controller' => 'Bancos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Banco'), ['controller' => 'Bancos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contasPagar index large-9 medium-8 columns content">
    <h3><?= __('Contas Pagar') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('empresa_id') ?></th>
                <th><?= $this->Paginator->sort('numero_documento') ?></th>
                <th><?= $this->Paginator->sort('data_vencimento') ?></th>
                <th><?= $this->Paginator->sort('valor_documento') ?></th>
                <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                <th><?= $this->Paginator->sort('banco_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contasPagar as $contasPagar): ?>
            <tr>
                <td><?= $this->Number->format($contasPagar->id) ?></td>
                <td><?= $contasPagar->has('empresa') ? $this->Html->link($contasPagar->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $contasPagar->empresa->id]) : '' ?></td>
                <td><?= h($contasPagar->numero_documento) ?></td>
                <td><?= h($contasPagar->data_vencimento) ?></td>
                <td><?= $this->Number->format($contasPagar->valor_documento) ?></td>
                <td><?= $contasPagar->has('pessoa') ? $this->Html->link($contasPagar->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $contasPagar->pessoa->id]) : '' ?></td>
                <td><?= $contasPagar->has('banco') ? $this->Html->link($contasPagar->banco->id, ['controller' => 'Bancos', 'action' => 'view', $contasPagar->banco->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contasPagar->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contasPagar->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contasPagar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contasPagar->id)]) ?>
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
