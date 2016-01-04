<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Caixas Movimento'), ['action' => 'edit', $caixasMovimento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Caixas Movimento'), ['action' => 'delete', $caixasMovimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caixasMovimento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Caixas Movimentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Caixas Movimento'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="caixasMovimentos view large-9 medium-8 columns content">
    <h3><?= h($caixasMovimento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Numero Documento') ?></th>
            <td><?= h($caixasMovimento->numero_documento) ?></td>
        </tr>
        <tr>
            <th><?= __('Historico') ?></th>
            <td><?= h($caixasMovimento->historico) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($caixasMovimento->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Caixa Diario Id') ?></th>
            <td><?= $this->Number->format($caixasMovimento->caixa_diario_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo Lancamento') ?></th>
            <td><?= $this->Number->format($caixasMovimento->tipo_lancamento) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor') ?></th>
            <td><?= $this->Number->format($caixasMovimento->valor) ?></td>
        </tr>
        <tr>
            <th><?= __('Modalidade') ?></th>
            <td><?= $this->Number->format($caixasMovimento->modalidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Movimento') ?></th>
            <td><?= h($caixasMovimento->data_movimento) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($caixasMovimento->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($caixasMovimento->modified) ?></td>
        </tr>
    </table>
</div>
