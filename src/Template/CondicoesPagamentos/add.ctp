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
                        <?= $this->Form->create($condicoesPagamento) ?>
                        <?php
                        echo $this->Form->input('nome', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->numero('qtde_dias', ['required' => true, 'label' => 'Dias corridos', 'div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->input('qtde_parcelas', ['options' => $this->Form->gerarOptions(1, (int) Cake\Core\Configure::read('Parametros.CMaxParcelas')), 'required' => true, 'label' => 'Parcelas', 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->simNao('avista', ['value' => '0', 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->simNao('principal', ['value' => '0', 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->element('CondicoesPagamentos/parcelas');
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
echo $this->Html->script('/js/condicoes_pagamentos.js', ['block' => 'script']);
?>