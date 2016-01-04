<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pessoas Endereco'), ['action' => 'edit', $pessoasEndereco->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pessoas Endereco'), ['action' => 'delete', $pessoasEndereco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasEndereco->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas Enderecos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoas Endereco'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pessoasEnderecos view large-9 medium-8 columns content">
    <h3><?= h($pessoasEndereco->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pessoa') ?></th>
            <td><?= $pessoasEndereco->has('pessoa') ? $this->Html->link($pessoasEndereco->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $pessoasEndereco->pessoa->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Cep') ?></th>
            <td><?= h($pessoasEndereco->cep) ?></td>
        </tr>
        <tr>
            <th><?= __('Endereco') ?></th>
            <td><?= h($pessoasEndereco->endereco) ?></td>
        </tr>
        <tr>
            <th><?= __('Numero') ?></th>
            <td><?= h($pessoasEndereco->numero) ?></td>
        </tr>
        <tr>
            <th><?= __('Complemento') ?></th>
            <td><?= h($pessoasEndereco->complemento) ?></td>
        </tr>
        <tr>
            <th><?= __('Bairro') ?></th>
            <td><?= h($pessoasEndereco->bairro) ?></td>
        </tr>
        <tr>
            <th><?= __('Cidade') ?></th>
            <td><?= h($pessoasEndereco->cidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Estado') ?></th>
            <td><?= h($pessoasEndereco->estado) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pessoasEndereco->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo Endereco') ?></th>
            <td><?= $this->Number->format($pessoasEndereco->tipo_endereco) ?></td>
        </tr>
        <tr>
            <th><?= __('Principal') ?></th>
            <td><?= $this->Number->format($pessoasEndereco->principal) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($pessoasEndereco->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pessoasEndereco->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pessoasEndereco->modified) ?></td>
        </tr>
    </table>
</div>
