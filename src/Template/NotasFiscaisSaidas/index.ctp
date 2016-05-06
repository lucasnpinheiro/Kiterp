<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Notas Fiscais Saida'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transportadoras'), ['controller' => 'Transportadoras', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transportadora'), ['controller' => 'Transportadoras', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Notas Fiscais Saidas Itens'), ['controller' => 'NotasFiscaisSaidasItens', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Notas Fiscais Saidas Iten'), ['controller' => 'NotasFiscaisSaidasItens', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notasFiscaisSaidas index large-9 medium-8 columns content">
    <h3><?= __('Notas Fiscais Saidas') ?></h3>
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
            <?php foreach ($notasFiscaisSaidas as $notasFiscaisSaida): ?>
            <tr>
                <td><?= $this->Number->format($notasFiscaisSaida->id) ?></td>
                <td><?= $notasFiscaisSaida->has('empresa') ? $this->Html->link($notasFiscaisSaida->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $notasFiscaisSaida->empresa->id]) : '' ?></td>
                <td><?= $this->Number->format($notasFiscaisSaida->numero_nota_fiscal) ?></td>
                <td><?= h($notasFiscaisSaida->serie) ?></td>
                <td><?= $this->Number->format($notasFiscaisSaida->cfop_id) ?></td>
                <td><?= $notasFiscaisSaida->has('pessoa') ? $this->Html->link($notasFiscaisSaida->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'view', $notasFiscaisSaida->pessoa->id]) : '' ?></td>
                <td><?= h($notasFiscaisSaida->data_emissao) ?></td>
                <td class="actions">
                    <?= $this->Html->link('', ['action' => 'view', $notasFiscaisSaida->id]) ?>
                    <?= $this->Html->link('', ['action' => 'edit', $notasFiscaisSaida->id]) ?>
                    <?= $this->Form->postLink('', ['action' => 'delete', $notasFiscaisSaida->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notasFiscaisSaida->id)]) ?>
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
