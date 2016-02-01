<?php
$this->assign('title', $title);
$this->Html->addCrumb($this->fetch('title'), ['controller' => $this->request->params['controller'], 'action' => 'index']);
$this->Html->addCrumb('Cadastrar', null);
?>
<?= $this->Form->create($pedido) ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= __($this->fetch('title')) ?></h5>
                <div class="ibox-tools">
                    <?= $this->Form->button(__('Orçamento'), ['bootstrap-type' => 'info', 'type' => 'submit', 'value' => 'orcamento', 'icon' => 'print']) ?>
                    <?= $this->Form->button(__('Imprimir'), ['bootstrap-type' => 'primary', 'type' => 'submit', 'icon' => 'print']) ?>
                </div>
            </div>
            <div class="ibox-content">

                <?php
                echo $this->Form->input('id', ['class' => 'pedido-id-registro', 'type' => 'hidden']);
                echo $this->Form->input('pedido_id', ['class' => 'pedido-id-registro', 'type' => 'hidden']);
                echo $this->Form->input('transportadora_id', ['type' => 'hidden', 'value' => 1]);
                echo $this->Form->numero('numero_caixa', ['type' => 'hidden', 'value' => 1]);
                echo $this->Form->numero('status', ['type' => 'hidden', 'value' => 1]);

                $count_empresas = $empresas;
                $count_empresas = $count_empresas->toArray();
                if (count($count_empresas) > 1) {
                    echo $this->Form->empresas('empresa_id', ['required' => true, 'class' => 'auto-select2-cake', 'div' => ['class' => 'col-xs-12 col-md-3']]);
                    echo $this->Form->select2Auto('pessoa_id', ['label' => 'Cliente', 'required' => true, 'options' => $pessoas, 'empty' => 'Selecione um Cliente', 'div' => ['class' => 'col-xs-12 col-md-3']]);
                    echo $this->Form->select2Auto('condicao_pagamento_id', ['required' => true, 'empty' => 'Selecione uma opção de pagamento', 'div' => ['class' => 'col-xs-12 col-md-3']]);
                    echo $this->Form->select2Auto('vendedor_id', ['value' => $this->request->session()->read('Auth.User.id'), 'empty' => 'Selecione um vendedor', 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                } else {
                    foreach ($empresas as $key => $value) {
                        echo $this->Form->input('empresa_id', ['value' => $key, 'type' => 'hidden']);
                    }
                    echo $this->Form->select2Auto('pessoa_id', ['label' => 'Cliente', 'required' => true, 'options' => $pessoas, 'empty' => 'Selecione um Cliente', 'div' => ['class' => 'col-xs-12 col-md-4']]);
                    echo $this->Form->select2Auto('condicao_pagamento_id', ['required' => true, 'empty' => 'Selecione uma opção de pagamento', 'div' => ['class' => 'col-xs-12 col-md-4']]);
                    echo $this->Form->select2Auto('vendedor_id', ['value' => $this->request->session()->read('Auth.User.id'), 'empty' => 'Selecione um vendedor', 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                }
                echo $this->Form->cpf('cpf', ['div' => ['class' => 'col-xs-12 col-md-2']]);
                echo $this->Form->inputStatic('data_pedido', ($pedido->data_pedido != '' ? $pedido->data_pedido->format('d/m/Y H:i:s') : date('d/m/Y H:i:s')), ['label' => 'Data do Pedido', 'div' => ['class' => 'col-xs-12 col-md-2']]);
                echo $this->Form->inputStatic('status', $this->Html->label('Aberto', 'info'), ['label' => 'Situação', 'div' => ['class' => 'col-xs-12 col-md-2']]);
                echo '<div class="col-xs-12 col-md-3"><h2 class="seta-total">Total: ' . $this->Html->moeda($pedido->valor_total) . '</h2></div>';
                echo '<div class="col-xs-12 col-md-3"><h2 class="seta-pedido">Pedido: ' . $pedido->pedido_id . '</h2></div>';
                ?>
                <div class="clearfix"></div>
                <div class="hr-line-dashed"></div>
                <?php echo $this->element('Pedidos/itens'); ?>
                <div class="clearfix"></div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <?= $this->Form->button(__('Orçamento'), ['bootstrap-type' => 'info', 'type' => 'submit', 'value' => 'orcamento', 'icon' => 'print']) ?>
                        <?= $this->Form->button(__('Imprimir'), ['bootstrap-type' => 'primary', 'type' => 'submit', 'icon' => 'print']) ?>
                    </div>
                </div>
                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<?php
echo $this->Html->script('/js/pedido.js', ['block' => 'script']);
?>