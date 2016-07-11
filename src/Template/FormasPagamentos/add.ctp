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
                        <?= $this->Form->create($formasPagamento) ?>
                        <?php
                        echo $this->Form->input('nome', ['autofocus' => true, 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->input('abreviado', ['label' => 'Nome abreviado', 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->input('grupo', ['label' => 'Grupo', 'options' => $this->Html->tiposPagamentos(), 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->numero('qtde_dias', ['label' => 'Dias a Receber', 'required' => true, 'value' => 0, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->numero('qtde_taxas', ['label' => 'Quantidade de Parcelas', 'required' => true, 'value' => 0, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->element('FormasPagamentos/taxas');
                        ?>
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
    </div>
</div>
<?php
echo $this->Html->script('/js/formas_pagamentos.js', ['block' => 'script']);
?>