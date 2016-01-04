<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Contas Receber'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bancos'), ['controller' => 'Bancos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Banco'), ['controller' => 'Bancos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contasReceber index large-9 medium-8 columns content">
    <h3><?= __('Contas Receber') ?></h3>
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
            <?php foreach ($contasReceber as $contasReceber): ?>
            <tr>
                <td><?= $this->Number->format($contasReceber->id) ?></td>
                <td><?= $contasReceber->has('empresa') ? $this->Html->link($contasReceber->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $contasReceber->empresa->id]) : '' ?></td>
                <td><?= h($contasReceber->numero_documento) ?></td>
                <td><?= h($contasReceber->data_vencimento) ?></td>
                <td><?= $this->Number->format($contasReceber->valor_documento) ?></td>
                <td><?= $contasReceber->has('pessoa') ? $this->Html->link($contasReceber->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $contasReceber->pessoa->id]) : '' ?></td>
                <td><?= $contasReceber->has('banco') ? $this->Html->link($contasReceber->banco->id, ['controller' => 'Bancos', 'action' => 'view', $contasReceber->banco->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contasReceber->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contasReceber->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contasReceber->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contasReceber->id)]) ?>
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
