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
                echo $this->Form->input('empresa_id', ['options' => $empresas, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->data('data_pedido', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->status('status', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->input('pessoa_id', ['options' => $pessoas, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->input('condicao_pagamento_id', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->input('vendedor_id', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->input('transportadora_id', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->moeda('valor_total', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                //echo $this->Form->numero('numero_cupom', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                //echo $this->Form->numero('nota_fiscal', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                //echo $this->Form->input('serie', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->numero('numero_caixa', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->cpf('cpf', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->input('formas_pagamentos._ids', ['options' => $formasPagamentos, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->input('add_produto', ['type' => 'select', 'label' => 'Adicionar produto', 'class' => 'adicionar-produto', 'div' => ['class' => 'col-xs-12 col-md-12']]);
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