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
                <?= $this->Form->create($contasReceber) ?>
                <?php
                echo $this->Form->empresas('empresa_id', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-8']]);
                echo $this->Form->numero('numero_documento', ['maxlength' => 45, 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->data('data_vencimento', ['required' => true, 'empty' => true, 'value' => (!empty($contasReceber->data_vencimento) ? $contasReceber->data_vencimento->format('d/m/Y') : null ), 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->moeda('valor_documento', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('pessoa_id', ['label' => 'Cliente', 'required' => true, 'options' => $pessoas, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('banco_id', ['required' => true, 'options' => $bancos, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('tradutora_id', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->statusContas('status', ['required' => true, 'label' => 'Situação', 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->data('data_recebimento', ['required' => true, 'empty' => true, 'value' => (!empty($contasReceber->data_recebimento) ? $contasReceber->data_recebimento->format('d/m/Y') : null ), 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->moeda('valor_recebimento', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->moeda('valor_desconto', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->moeda('valor_liquido', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('formas_pagamento_id', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->numero('parcelas', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->numero('dias', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->numero('cheque_numero', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->numero('cheque_banco', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('cheque_emitente', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('cheque_destino', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('numero_pedido', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->numero('nota_fiscal', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('serie', ['div' => ['class' => 'col-xs-12 col-md-4']]);
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