<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Saida'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notaFiscalSaidas index large-9 medium-8 columns content">
    <h3><?= __('Nota Fiscal Saidas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('empresa_id') ?></th>
                <th><?= $this->Paginator->sort('numero_nota_fiscal') ?></th>
                <th><?= $this->Paginator->sort('serie') ?></th>
                <th><?= $this->Paginator->sort('cfop_id') ?></th>
                <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                <th><?= $this->Paginator->sort('data_emissao') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notaFiscalSaidas as $notaFiscalSaida): ?>
            <tr>
                <td><?= $this->Number->format($notaFiscalSaida->id) ?></td>
                <td><?= $notaFiscalSaida->has('empresa') ? $this->Html->link($notaFiscalSaida->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $notaFiscalSaida->empresa->id]) : '' ?></td>
                <td><?= $this->Number->format($notaFiscalSaida->numero_nota_fiscal) ?></td>
                <td><?= h($notaFiscalSaida->serie) ?></td>
                <td><?= $this->Number->format($notaFiscalSaida->cfop_id) ?></td>
                <td><?= $notaFiscalSaida->has('pessoa') ? $this->Html->link($notaFiscalSaida->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $notaFiscalSaida->pessoa->id]) : '' ?></td>
                <td><?= h($notaFiscalSaida->data_emissao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $notaFiscalSaida->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notaFiscalSaida->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notaFiscalSaida->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notaFiscalSaida->id)]) ?>
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
