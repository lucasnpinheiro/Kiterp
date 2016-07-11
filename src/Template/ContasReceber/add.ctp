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
                <div class="row conteudo_add">
            <div class="col-xs-12">
                <?= $this->Form->create($contasReceber) ?>
                <?php
                echo $this->Form->empresas('empresa_id', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-12']]);
                echo $this->Form->input('pessoa_id', ['required' => true, 'label' => 'Cliente', 'options' => $pessoas, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-8']]);
                echo $this->Form->statusContas('status', ['required' => true, 'label' => 'Situação', 'div' => ['class' => 'col-xs-12 col-md-4']]);

                echo $this->Form->numero('numero_documento', ['required' => true, 'maxlength' => 45, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->numero('parcelas', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->data('data_vencimento', ['required' => true, 'empty' => true, 'value' => (!empty($contasReceber->data_vencimento) ? $contasReceber->data_vencimento->format('d/m/Y') : null ), 'div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->moeda('valor_documento', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->input('banco_id', ['options' => $bancos, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('tradutora_id', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('formas_pagamento_id', ['div' => ['class' => 'col-xs-12 col-md-4']]);


                echo '<h2>Dados referente ao cartão</h2>';
                echo $this->Form->numero('dias', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->juros('taxa', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->moeda('valor_desconto', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->moeda('valor_liquido', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                echo '<h2>Dados referente ao cheque</h2>';
                echo $this->Form->numero('cheque_numero', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                echo $this->Form->input('cheque_banco', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                echo $this->Form->input('cheque_emitente', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                echo $this->Form->input('cheque_destino', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                echo '<div class="clearfix"></div>';
                echo '<h2>Dados da baixa</h2>';
                echo $this->Form->data('data_recebimento', ['empty' => true, 'value' => (!empty($contasReceber->data_recebimento) ? $contasReceber->data_recebimento->format('d/m/Y') : null ), 'div' => ['class' => 'col-xs-12 col-md-6']]);
                echo $this->Form->moeda('valor_recebimento', ['div' => ['class' => 'col-xs-12 col-md-6']]);
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
    </div>
</div>

<?php
echo $this->Html->script('/js/contas_receber.js', ['block' => 'script']);
?>