<?php
$this->assign('title', $title);
$this->Html->addCrumb($this->fetch('title'), ['controller' => $this->request->params['controller'], 'action' => 'index']);
$this->Html->addCrumb('Cadastrar', null);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= __('Cadastrar ' . $this->fetch('title')) ?></h5>
            </div>
            <div class="ibox-content">
                <?= $this->Form->create($pedido) ?>
                <?php
                echo $this->Form->input('pedido_id', ['type' => 'hidden']);
                echo $this->Form->input('transportadora_id', ['type' => 'hidden', 'value' => 1]);
                echo $this->Form->numero('numero_caixa', ['type' => 'hidden', 'value' => 1]);

                $count_empresas = $empresas;
                $count_empresas = $count_empresas->toArray();
                if (count($count_empresas) > 1) {
                    echo $this->Form->input('empresa_id', ['required' => true, 'options' => $empresas, 'empty' => 'Selecione uma Empresa', 'div' => ['class' => 'col-xs-12 col-md-3']]);
                    echo $this->Form->input('pessoa_id', ['label' => 'Cliente', 'required' => true, 'options' => $pessoas, 'empty' => 'Selecione um Cliente', 'div' => ['class' => 'col-xs-12 col-md-3']]);
                    echo $this->Form->input('condicao_pagamento_id', ['required' => true, 'empty' => 'Selecione uma opção de pagamento', 'div' => ['class' => 'col-xs-12 col-md-3']]);
                    echo $this->Form->input('vendedor_id', ['value' => $this->request->session()->read('Auth.User.id'), 'empty' => 'Selecione um vendedor', 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                } else {
                    foreach ($empresas as $key => $value) {
                        echo $this->Form->input('empresa_id', ['value' => $key, 'type' => 'hidden']);
                    }
                    echo $this->Form->input('pessoa_id', ['label' => 'Cliente', 'required' => true, 'options' => $pessoas, 'empty' => 'Selecione um Cliente', 'div' => ['class' => 'col-xs-12 col-md-4']]);
                    echo $this->Form->input('condicao_pagamento_id', ['required' => true, 'empty' => 'Selecione uma opção de pagamento', 'div' => ['class' => 'col-xs-12 col-md-4']]);
                    echo $this->Form->input('vendedor_id', ['value' => $this->request->session()->read('Auth.User.id'), 'empty' => 'Selecione um vendedor', 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                }
                echo $this->Form->cpf('cpf', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->inputStatic('data_pedido', ($pedido->data_pedido != '' ? $pedido->data_pedido->format('d/m/Y H:i:s') : date('d/m/Y H:i:s')), ['label' => 'Data do Pedido', 'div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->inputStatic('status', $this->Html->label('Aberto', 'info'), ['label' => 'Situação', 'div' => ['class' => 'col-xs-12 col-md-3']]);
                echo '<div class="col-xs-12 col-md-3"><h2 class="seta-pedido">Pedido: ' . $pedido->id . '</h2></div>';
                ?>
                <div class="clearfix"></div>
                <div class="hr-line-dashed"></div>
                <?php echo $this->element('Pedidos/itens'); ?>
                <div class="clearfix"></div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <?= $this->Form->button(__('Salvar', ['class' => 'btn btn-primary'])) ?>
                    </div>
                </div>
                <div class="clearfix"></div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<?php
echo $this->Html->css('/js/plugins/select2/select2.min.css', ['block' => 'css']);
echo $this->Html->script('/js/plugins/select2/select2.full.min.js', ['block' => 'script']);
echo $this->Html->script('/js/plugins/select2/i18n/pt-BR.js', ['block' => 'script']);
echo $this->Html->script('/js/pedido.js', ['block' => 'script']);
?>