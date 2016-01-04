<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $empresa->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $empresa->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas'), ['controller' => 'Pessoas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoa'), ['controller' => 'Pessoas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contas Pagar'), ['controller' => 'ContasPagar', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contas Pagar'), ['controller' => 'ContasPagar', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contas Receber'), ['controller' => 'ContasReceber', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contas Receber'), ['controller' => 'ContasReceber', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Entrada'), ['controller' => 'NotaFiscalEntrada', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Entrada'), ['controller' => 'NotaFiscalEntrada', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nota Fiscal Saida'), ['controller' => 'NotaFiscalSaida', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nota Fiscal Saida'), ['controller' => 'NotaFiscalSaida', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos Kits'), ['controller' => 'ProdutosKits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produtos Kit'), ['controller' => 'ProdutosKits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="empresas form large-9 medium-8 columns content">
    <?= $this->Form->create($empresa) ?>
    <fieldset>
        <legend><?= __('Edit Empresa') ?></legend>
        <?php
            echo $this->Form->input('pessoa_id', ['options' => $pessoas, 'empty' => true]);
            echo $this->Form->input('codigo_cidade');
            echo $this->Form->input('regime_tributario');
            echo $this->Form->input('versao_sefaz');
            echo $this->Form->input('perentual_tributo');
            echo $this->Form->input('hora_tzd');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
