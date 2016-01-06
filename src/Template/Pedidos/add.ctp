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
                echo $this->Form->input('empresa_id', ['options' => $empresas, 'empty' => true]);
                echo $this->Form->input('data_pedido');
                echo $this->Form->input('status');
                echo $this->Form->input('pessoa_id', ['options' => $pessoas, 'empty' => true]);
                echo $this->Form->input('condicao_pagamento_id');
                echo $this->Form->input('vendedor_id');
                echo $this->Form->input('transportadora_id');
                echo $this->Form->input('valor_total');
                echo $this->Form->input('numero_cupom');
                echo $this->Form->input('nota_fiscal');
                echo $this->Form->input('serie');
                echo $this->Form->input('numero_caixa');
                echo $this->Form->input('cpf');
                echo $this->Form->input('formas_pagamentos._ids', ['options' => $formasPagamentos]);
                ?>
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
