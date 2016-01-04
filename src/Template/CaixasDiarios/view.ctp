<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Caixas Diario'), ['action' => 'edit', $caixasDiario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Caixas Diario'), ['action' => 'delete', $caixasDiario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caixasDiario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Caixas Diarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Caixas Diario'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="caixasDiarios view large-9 medium-8 columns content">
    <h3><?= h($caixasDiario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Operador') ?></th>
            <td><?= h($caixasDiario->operador) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($caixasDiario->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Numero Caixa') ?></th>
            <td><?= $this->Number->format($caixasDiario->numero_caixa) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor Inicial') ?></th>
            <td><?= $this->Number->format($caixasDiario->valor_inicial) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Entradas') ?></th>
            <td><?= $this->Number->format($caixasDiario->total_entradas) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Saidas') ?></th>
            <td><?= $this->Number->format($caixasDiario->total_saidas) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Saldo') ?></th>
            <td><?= $this->Number->format($caixasDiario->total_saldo) ?></td>
        </tr>
        <tr>
            <th><?= __('Encerrado') ?></th>
            <td><?= $this->Number->format($caixasDiario->encerrado) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Real') ?></th>
            <td><?= $this->Number->format($caixasDiario->total_real) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Sobras') ?></th>
            <td><?= $this->Number->format($caixasDiario->total_sobras) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Faltas') ?></th>
            <td><?= $this->Number->format($caixasDiario->total_faltas) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Abertura') ?></th>
            <td><?= h($caixasDiario->data_abertura) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Encerramento') ?></th>
            <td><?= h($caixasDiario->data_encerramento) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($caixasDiario->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($caixasDiario->modified) ?></td>
        </tr>
    </table>
</div>
