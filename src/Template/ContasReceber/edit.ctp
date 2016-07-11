<?php
$this->assign('title', $title);
$this->Html->addCrumb($this->fetch('title'), ['controller' => $this->request->params['controller'], 'action' => 'index']);
$this->Html->addCrumb('Alterar', null);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= __('Alterar ' . $this->fetch('title')) ?></h5>
            </div>
            <div class="ibox-content">
                <div class="row conteudo_add">
            <div class="col-xs-12">
                <?php
                echo $this->Form->create($contasReceber);

                echo $this->Form->empresas('empresa_id', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-12']]);
                echo $this->Form->input('pessoa_id', ['disabled' => true, 'label' => 'Cliente', 'options' => $pessoas, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-8']]);
                echo $this->Form->statusContas('status', ['disabled' => true, 'label' => 'Situação', 'div' => ['class' => 'col-xs-12 col-md-4']]);

                echo $this->Form->numero('numero_documento', ['maxlength' => 45, 'disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->numero('parcelas', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                if ($contasReceber->formas_pagamento->grupo == 3) {
                    echo $this->Form->data('data_vencimento', ['disabled' => true, 'empty' => true, 'value' => (!empty($contasReceber->data_vencimento) ? $contasReceber->data_vencimento->format('d/m/Y') : null ), 'div' => ['class' => 'col-xs-12 col-md-3']]);
                    echo $this->Form->moeda('valor_documento', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                } else {
                    if ($this->request->query('baixar') != 1) {
                        echo $this->Form->data('data_vencimento', ['required' => true, 'empty' => true, 'value' => (!empty($contasReceber->data_vencimento) ? $contasReceber->data_vencimento->format('d/m/Y') : null ), 'div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->moeda('valor_documento', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                    } else {
                        echo $this->Form->data('data_vencimento', ['disabled' => true, 'empty' => true, 'value' => (!empty($contasReceber->data_vencimento) ? $contasReceber->data_vencimento->format('d/m/Y') : null ), 'div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->moeda('valor_documento', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                    }
                }
                echo $this->Form->input('banco_id', ['disabled' => true, 'options' => $bancos, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('tradutora_id', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('formas_pagamento_id', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);


                if ($contasReceber->formas_pagamento->grupo == 3) {
                    echo '<h2>Dados referente ao cartão</h2>';
                    echo $this->Form->numero('dias', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                    echo $this->Form->juros('taxa', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                    echo $this->Form->moeda('valor_desconto', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                    echo $this->Form->moeda('valor_liquido', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                } else if ($contasReceber->formas_pagamento->grupo == 2) {
                    echo '<h2>Dados referente ao cheque</h2>';
                    if ($this->request->query('baixar') != 1) {
                        echo $this->Form->numero('cheque_numero', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->input('cheque_banco', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->input('cheque_emitente', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->input('cheque_destino', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                    } else {
                        echo $this->Form->numero('cheque_numero', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->input('cheque_banco', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->input('cheque_emitente', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->input('cheque_destino', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                    }
                }
                echo '<div class="clearfix"></div>';
                echo '<h2>Dados da baixa</h2>';
                if ($this->request->query('baixar') != 1) {
                    echo $this->Form->data('data_recebimento', ['disabled' => true, 'empty' => true, 'value' => (!empty($contasReceber->data_recebimento) ? $contasReceber->data_recebimento->format('d/m/Y') : null ), 'div' => ['class' => 'col-xs-12 col-md-6']]);
                    echo $this->Form->moeda('valor_recebimento', ['disabled' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                } else {
                    echo $this->Form->data('data_recebimento', ['required' => true, 'empty' => true, 'value' => (!empty($contasReceber->data_recebimento) ? $contasReceber->data_recebimento->format('d/m/Y') : null ), 'div' => ['class' => 'col-xs-12 col-md-6']]);
                    echo $this->Form->moeda('valor_recebimento', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                }
                ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <?php
                        if ($contasReceber->status == 1) {
                            echo $this->Form->button(__('Salvar', ['class' => 'btn btn-primary']));
                        }
                        ?>
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