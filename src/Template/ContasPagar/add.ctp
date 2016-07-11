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
                        <?= $this->Form->create($contasPagar) ?>
                        <?php
                        echo $this->Form->empresas('empresa_id', ['required' => true, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-8']]);
                        echo $this->Form->numero('numero_documento', ['maxlength' => 45, 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->data('data_vencimento', ['required' => true, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->moeda('valor_documento', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->input('pessoa_id', ['required' => true, 'label' => 'Fornecedor', 'options' => $pessoas, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->input('banco_id', ['required' => true, 'options' => $bancos, 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->input('tradutora_id', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->statusContas('status', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4'], 'value' => 1]);
                        echo $this->Form->data('data_pagamento', ['empty' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->moeda('valor_pagamento', ['div' => ['class' => 'col-xs-12 col-md-4']]);
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